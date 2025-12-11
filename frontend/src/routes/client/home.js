const express = require('express');
const Routers = express.Router();

const homecontrollers = require('../../controllers/homeController');

Routers.get('/home',homecontrollers.home);


module.exports = Routers ;