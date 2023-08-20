console.log('WIP')
const express = require('express');
const router = express.Router()
const url = require('url');

router.get('/login', function (req, res) {
    let followPath = req.query.path;
    if (req.session.isAuthenticated()) {
        let safePath = url.parse('http://example.com/' + followPath).pathname;
        res.redirect('http://example.com/' + safePath);
    } else {
        res.redirect('/');
    }
});

router.get('/goto', function (req, res) {
    let url = encodeURI(req.query.url);
    let safeUrl = url.parse(url).pathname;
    res.redirect(safeUrl);
});

module.exports = router