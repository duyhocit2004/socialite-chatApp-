const express = require('express');
const Router = express.Router() ;

const controllers = require('../../controllers/homeController');

Router.get('/xinchao',controllers.xinchao);

module.exports = Router;