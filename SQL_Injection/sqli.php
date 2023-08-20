const express = require('express');
const router = express.Router()
const request = require('request');
const urlModule = require('url');

router.post('/download-url', (req, res) => {
  if (!isValidUrl(req.body.url)) {
    res.status(400).send('Invalid URL');
    return;
  }

  downloadURL(req.body.url, () => {
    res.send('Done')
  })
});

const downloadURL = (url, onend) => {
  const opts = {
    uri: url,
    method: 'GET',
    followAllRedirects: true
  }

  request(opts)
    .on('data', () => { })
    .on('end', () => onend())
    .on('error', (err) => console.log(err, 'controller.url.download.error'))
}

const isValidUrl = (url) => {
  try {
    new urlModule.URL(url);
    return true;
  } catch (err) {
    return false;
  }
}

module.exports = router