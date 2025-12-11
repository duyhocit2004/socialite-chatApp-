// const axios = require('axios');
import axios from 'axios';
// const FormData = require('form-data');
import FormData from 'form-data';
// const fs = require('fs');
import fs from 'fs';

export const index = async (req, res) => {
    try {
        const API_URL = "http://127.0.0.1:8000/api/user";
        const response = await axios.get(API_URL);
        const users = response.data.users;
        
        return res.render('admins/user/index.ejs', { users });
    } catch (error) {
        return res.render('admins/user/index.ejs', { users:[] });
    }
}
export const create = (req, res) => {
    try {
        return res.render('admins/user/create.ejs');
    } catch (error) {
        return console.log(error);
    }
}
export const store = async (req, res) => {
    // try {
        const API_URL = "http://127.0.0.1:8000/api/user/store";
        const { email, password, status, role, name, titleProfile, gender} = req.body;
        const file = req.files.avatar.name;
        const response = await axios.post(API_URL, {email, password, status, role, name, titleProfile, gender, file});
        
        if(response.data.success == 200) {
            return res.redirect('/admin/user-management');
        }else {
            return res.redirect('/admin/user-management/create');
        }
    // } catch (error) {
    //     return res.redirect('/admin/user-management/create', );
    // }
}
export const detroy = async (req, res) => {
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
export const edit = async (req, res) => {
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
export const update = async (req, res) => {
    const { email, password, status, role, name, titleProfile, gender} = req.body;
    var file = "";
    if (!req.files || Object.keys(req.files).length === 0) {
        file = req.body.avatarOld;
    }else {
        file = req.files.avatar.name;
    }
    const id = req.body.id;
    const API_URL = "http://127.0.0.1:8000/api/user/update/"+id;
    const response = await axios.put(API_URL, {email, password, status, role, name, titleProfile, gender, file});
    console.log(response.data);
    
    if (response.data.success == 200) {
        return res.redirect('/admin/user-management');
    }    
}