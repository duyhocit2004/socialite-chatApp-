const axios = require('axios');
const FormData = require('form-data');
const fs = require('fs');
const helper = require('../../config/helper');

 const index = async (req, res) => {
    try {
        const API_URL = "http://127.0.0.1:8000/api/user";
        const response = await axios.get(API_URL);
        const users = response.data.users;
        
        return res.render('admins/user/index.ejs', { users });
    } catch (error) {
        return res.render('admins/user/index.ejs', { users:[] });
    }
}
 const create = (req, res) => {
    try {
        return res.render('admins/user/create.ejs');
    } catch (error) {
        return console.log(error);
    }
}
 const store = async (req, res) => {

        const API_URL = "http://127.0.0.1:8000/api/user/store";
        const {email, password, status, role, name, titleProfile, gender} = req.body;
        
        const dataImage = req.files.avatar;
        const file = await helper.Cloudinary(dataImage);

        const response = await axios.post(API_URL, {email, password, status, role, name, titleProfile, gender, file});

        if(response.data.success == 200) {
            return res.redirect('/admin/user-management');
        }else {
            return res.redirect('/admin/user-management/create');
        }
    
}
 const detroy = async (req, res) => {
    try {
        const API_URL = "http://127.0.0.1:8000/api/user/destroi";
        const id = req.body.id;
        const response = await axios.post(API_URL,{id});
        if (response.data.success == 200) {
            return res.redirect('/admin/user-management');
        }
    } catch (error) {
        console.log(error);
    }
}
 const edit = async (req, res) => {
    try {
        const id = req.params.id;
        const API_URL = "http://127.0.0.1:8000/api/user/edit/"+id;
        const response = await axios.get(API_URL);
        if (response.data.success == 200) {
            res.render('admins/user/edit.ejs', {'user':response.data.data});
        }
        
    } catch (error) {
        console.log(error);
    }
}
 const update = async (req, res) => {
    const { email, password, status, role, name, titleProfile, gender} = req.body;
    var file = "";
    if (!req.files || Object.keys(req.files).length === 0) {
        file = req.body.avatarOld;
    }else {
        const data = await helper.Cloudinary(req.files.avatar);
        file = data;
    }
    const id = req.body.id;
    const API_URL = "http://127.0.0.1:8000/api/user/update/"+id;
    const response = await axios.put(API_URL, {email, password, status, role, name, titleProfile, gender, file});
    console.log(response.data);
    
    if (response.data.success == 200) {
        return res.redirect('/admin/user-management');
    }    
}

module.exports = {index,
create,
store,
detroy,
edit,
update,}