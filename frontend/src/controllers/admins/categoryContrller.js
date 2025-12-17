const axios = require('axios');

const index = (req,res) => {
    return res.render('admins/market/category/index.ejs');
}
const create = (req, res) => {
    return res.render('admins/market/category/create.ejs');
}
const store = async (req, res) => {
    const API_URL = "http://127.0.0.1:8000/api/category/store";
    
    const {name} = req.body;
    const response = await axios.post(API_URL, {name});
    return res.redirect('/admin/market/category');
}

module.exports = {index, create, store};