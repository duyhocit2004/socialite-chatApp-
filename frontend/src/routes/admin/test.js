const express = require('express');
const Routers = express.Router() ;

const dashboardController = require('../../controllers/dashboardController');

Routers.get('/admin', dashboardController.index);

module.exports = Routers;