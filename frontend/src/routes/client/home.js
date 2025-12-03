const express = require('express');
const Routers = express.Router();

const homecontrollers = require('../../controllers/homeController');

Routers.get('/',homecontrollers.home);

module.exports = Routers ;