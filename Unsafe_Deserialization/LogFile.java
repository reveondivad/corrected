from flask import Flask, request, make_response, redirect, url_for, session
from flask import render_template, flash
from werkzeug.security import safe_str_cmp
from base64 import b64encode as b64e
from hashlib import sha256
from io import BytesIO
import random
import string

import os

import json

SECRET_KEY = 'you will never guess'

if not os.path.exists('.secret'):
    with open("".secret"", ""w"") as f:
        secret = ''.join(random.choice(string.ascii_letters + string.digits)
                         for x in range(4))
        f.write(secret)
with open("".secret"", ""r"") as f:
    cookie_secret = f.read().strip()

app = Flask(__name__)
app.config.from_object(__name__)

@app.before_request
def count():
    session['cnt'] = 0

@app.route('/')
def home():
    remembered_str = 'Hello, here\'s what we remember for you. And you can change, delete or extend it.'
    location = getlocation()
    if location == False:
        return redirect(url_for(""clear""))
    return render_template('index.html', txt=remembered_str, location=location)

@app.route('/clear')
def clear():
    flash(""Reminder cleared!"")
    response = redirect(url_for('home'))
    response.set_cookie('location', max_age=0)
    return response

@app.route('/reminder', methods=['POST', 'GET'])
def reminder():
    if request.method == 'POST':
        location = request.form[""reminder""]
        if location == '':
            flash(""Message cleared, tell us when you have found more brains."")
        else:
            flash(""We will remember where you find your brains."")
        location = b64e(json.dumps(location).encode())
        cookie = make_cookie(location, cookie_secret)
        response = redirect(url_for('home'))
        response.set_cookie('location', cookie)
        return response
    location = getlocation()
    if location == False:
        return redirect(url_for(""clear""))
    return render_template('reminder.html')

def getlocation():
    cookie = request.cookies.get('location')
    if not cookie:
        return ''
    (digest, location) = cookie.split(""!"")
    if not safe_str_cmp(calc_digest(location, cookie_secret), digest):
        flash(""Hey! This is not a valid cookie! Leave me alone."")
        return False
    location = json.loads(b64e(location).decode())
    return location

def make_cookie(location, secret):
    return ""%s!%s"" % (calc_digest(location, secret), location)

def calc_digest(location, secret):
    return sha256(""%s%s"" % (location, secret)).hexdigest()

if __name__ == '__main__':
    app.run(host=""0.0.0.0"", port=5051)