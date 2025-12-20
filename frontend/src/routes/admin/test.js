const express = require('express');
const Routers = express.Router() ;

const dashboardController = require('../../controllers/admins/dashboardController');
const userController = require('../../controllers/admins/userController');
const categoryContrller = require('../../controllers/admins/categoryContrller');
const postController = require('../../controllers/admins/postController');

Routers.get('/', dashboardController.index);
Routers.get('/user-management', userController.index);
Routers.get('/user-management/create-user', userController.create);
Routers.post('/user-management/store', userController.store);
Routers.post('/user-management/delete', userController.detroy);
Routers.get('/user-management/edit/:id', userController.edit);
Routers.post('/user-management/update', userController.update);

Routers.get('/market/category', categoryContrller.index);
Routers.get('/market/category/create', categoryContrller.create);
Routers.post('/market/category/store', categoryContrller.store);

Routers.get('/PostUser',postController.getPost);
module.exports = Routers;