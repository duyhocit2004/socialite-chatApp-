const API_URL = require('./api');
const axios = require('axios');

const getPost = async (filter,token)=>{
    return await axios.get(`${API_URL}/getpost`,{
        params :filter,
        Headers : { 
            Authorization : `Bearer ${token}`,
        },
        
    })
}

module.exports = {getPost};