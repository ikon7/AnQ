const express = require('express');

const router = express.Router();

router.get('/', (req, res) => {
    res.render('homepage', { title: 'AnQ'});
});

router.get('views/tag', (req, res) => {
    res.render('tag', { title: 'AnQ'});
});

router.get('views/Ask', (req, res) => {
    res.render('ask', { title: 'AnQ'});
});

router.get('views/Question.html', (req, res) => {
    res.render('question', { title: 'AnQ'});
});

module.exports = router;