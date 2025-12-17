const cloudinary = require('./cloudinary');

const Cloudinary = async (image)=>{
    let ImageCloud = null ;
    let FormatImage =  [ 'JPG', 'JPEG','PNG'];

    const img = image.name.split('.').pop().toUpperCase();

    if(FormatImage.includes(img)){
       ImageCloud = await cloudinary.uploader.upload(image.tempFilePath);
       return ImageCloud.secure_url;
    }else{
        ImageCloud = " ";
        return ImageCloud
    }
}

module.exports = {Cloudinary};