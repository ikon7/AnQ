const express = require('express');

const router = express.Router();

router.get('/', (req, res) => {
    res.render('index', { title: 'AnQ'});
});

router.get('/tag', (req, res) => {
    res.render('tag', { title: 'AnQ'});
});

router.get('/Ask', (req, res) => {
    res.render('ask', { title: 'AnQ'});
});

router.get('/Question', (req, res) => {
    res.render('question', { title: 'AnQ'});
});

module.exports = router;