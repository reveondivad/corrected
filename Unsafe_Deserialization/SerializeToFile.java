var express = require('express');
var cookieParser = require('cookie-parser');
var escape = require('escape-html');
var app = express();
app.use(cookieParser())

app.get('/', function(req, res) {
 if (req.cookies.profile) {
   var str = Buffer.from(req.cookies.profile, 'base64').toString();
   try {
     var obj = JSON.parse(str);
     if (obj.username) {
       res.send(""Hello "" + escape(obj.username));
     }
   } catch (e) {
     res.clearCookie('profile');
   }
 } else {
     var obj = {
       username: ""ajin"",
       country: ""india"",
       city: ""bangalore""
     }
     var str = Buffer.from(JSON.stringify(obj)).toString('base64');
     res.cookie('profile', str, {
       maxAge: 900000,
       httpOnly: true
     });
 }
 res.send(""Hello World"");
});
app.listen(3000);