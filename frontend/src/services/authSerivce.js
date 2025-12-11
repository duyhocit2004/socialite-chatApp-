const { param } = require('../routes/admin/test');
const API_URL = require('./api');
const axios = require('axios');

 const SendPostLogin = (email ,password)=>{

    return axios.post(`${API_URL}/login`,{
        email,
        password
    });
}

const sendProfile = (token)=>{
    return axios.get(`${API_URL}/profile`,{
        headers:{
            Authorization: `Bearer ${token}`
        }
    })
}

const deleteToken = (token)=>{
    return axios.post(`${API_URL}/logout`,{
        headers:{
            Authorization: `Bearer ${token}`
        }
    })
}

const postRegister = (name, phone, email, password) => {

    return axios.post(`${API_URL}/register`,{ name,
            phone,
            email,
            password 
          });
};
module.exports = {
    SendPostLogin,
    sendProfile,
    deleteToken,
    postRegister
}