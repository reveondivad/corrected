const express = require('express');
const config = require('../config')
const router = express.Router()

const MongoClient = require('mongodb').MongoClient;
const url = config.MONGODB_URI;

router.post('/customers/register', async (req, res) => {

    const client = new MongoClient(url, { useNewUrlParser: true, useUnifiedTopology: true });

    try {
        await client.connect();
        const db = client.db(config.MONGODB_DB_NAME);
        const customers = db.collection(""customers"")

        let myobj = { name: req.body.name, address: req.body.address };
        await customers.insertOne(myobj);
        console.log(""user registered"");
        res.json({ status: ""success"", ""message"": ""user inserted"" })
    } catch (err) {
        console.log(err);
        res.json({ status: ""Error"" });
    } finally {
        await client.close();
    }

})

// Search function
router.post('/customers/find', async (req, res) => {

    const client = new MongoClient(url, { useNewUrlParser: true, useUnifiedTopology: true });

    try {
        await client.connect();
        const db = client.db(config.MONGODB_DB_NAME);
        const customers = db.collection(""customers"")

        let name = req.body.name
        let myobj = { name: name };
        const result = await customers.findOne(myobj);
        res.json(result)
    } catch (err) {
        console.log(err);
        res.json({ status: ""Error"" });
    } finally {
        await client.close();
    }

})

// Authentication
router.post('/customers/login', async (req, res) => {

    const client = new MongoClient(url, { useNewUrlParser: true, useUnifiedTopology: true });

    try {
        await client.connect();
        const db = client.db(config.MONGODB_DB_NAME);
        const customers = db.collection(""customers"")

        let myobj = { email: req.body.email, password: req.body.password };
        const result = await customers.findOne(myobj);
        res.json(result)
    } catch (err) {
        console.log(err);
        res.json({ status: ""Error"" });
    } finally {
        await client.close();
    }

})

module.exports = router