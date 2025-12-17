const cloudinary = require('cloudinary').v2;
require('dotenv').config();

cloudinary.config({
    api_key : process.env.API_KEY ,
    api_secret : process.env.API_SECRET,
    cloud_name : process.env.CLOUD_NAME
    
});
// cloudinary.api.ping()
//     .then(() => console.log('Cloudinary OK'))
//     .catch(err => console.error(err));
module.exports = cloudinary;


