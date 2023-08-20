from jinja2 import Template, escape
from flask import request

import flask

app = flask.Flask(__name__)
app.config['DEBUG'] = True

@app.route('/', methods=['GET'])
def home():
    name = escape(request.args.get('name', ''))
    renderer = Template('Hello, ' + name)
    return renderer.render()

app.run()