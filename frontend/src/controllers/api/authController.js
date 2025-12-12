const authService = require('../../services/authSerivce');
const validator = require('validator');

 const login = (req,res)=>{
    return res.render('auth/clients/login',{errorEmail : null , errorPassword : null});
}
 const PostLogin = async (req,res)=>{
    try {
        email , password
        const {email} = req.body;
        
        const respon = await authService.SendPostLogin(email ,password);
        // console.log(respon);
        if(respon.data?.notification?.status !== 200 ){
            return res.render('auth/clients/login',{errorEmail : respon,errorPassword : null})
        }

        // console.log('')
        const token = respon.data.token.codeToken;
        
        if(req.cookies.auth_token){
            delete req.cookies.auth_token
        }

        res.cookie('auth_token',token,{
            httpOnly: true,
            secure: false, // true nếu chạy HTTPS
            maxAge: 30 * 24 * 60 * 60 * 1000 // 1 ngày
        });

        res.redirect('/profile');
    } catch (error) {
        console.log("lỗi" + error)
        return res.redirect('/login')
    }
}

const profile = async (req,res)=>{
    try {

        const codetoken = req.cookies.auth_token;
        if(!codetoken) return res.redirect('/login');

         const response = await authService.sendProfile(codetoken);
        // chỉ lưu phần dữ liệu thuần (thường là response.data hoặc response.data.user)
        const profileData = response?.data ?? response;

        req.session.user = profileData;

        return res.redirect('/home');
    
    } catch (error) {
        console.log("lỗi"+error)
        return res.redirect('/login');
    }
}
 const register = (req,res)=>{
    res.render('auth/clients/register',{name:null,phone:null,email:null,password:null,ConfirmPassword : null});
}
 const PostRegister = async (req,res)=>{
    var notificationName = null;
    var notificationPhone = null;
    var notificationEmail = null;
    var notificationPassword = null;
    var notificationConfirmPassword = null;
    try {
        const {name,phone,email,password,ConfirmPassword} = req.body;

        console.log(name,phone,email,password,ConfirmPassword);
        if(!validator.isLength(name,{min:5 , max:100})){
            notificationName = "ký tối thiểu phải trên 5";
        }

        if(!validator.isMobilePhone(phone,['vi-VN'])){
            notificationPhone = "Số điện thoại phải là số điện thoại việt nam";
        }

        if(!validator.isEmail(email)){
            notificationEmail = "Phải nhập đúng email";
        }

        if(!validator.isStrongPassword(password,{minLength: 10,minNumbers: 1,minUppercase:1,}) && !validator.isLength(password,{max:120})){
            notificationPassword = "Mật khẩu phải có 1 số , 1 chữ cái viết hoa,và ký tự tối thiểu phải trên 10"
        }

        if(ConfirmPassword !== password ){
            notificationConfirmPassword = "Mật khẩu hông trùng khớp"
        }

        if(notificationName !== null ||notificationPhone !== null || notificationEmail !== null||
            notificationPassword !== null || notificationConfirmPassword !== null)
        {
            return res.render('auth/clients/register',{name:notificationName,phone:notificationPhone,
                email:notificationEmail,password:notificationPassword,ConfirmPassword : notificationConfirmPassword});
        }

        const data = await authService.postRegister(name,phone,email,password,ConfirmPassword);
        console.log(data);
        if(data.status !== 201 && data.data.status !== true  ){
            return res.redirect('/home');
        }

        return res.redirect('/login');

    } catch (error) {
        console.log('lỗi'+error);
        return res.redirect('/home');
        
    }
}
 const logout = async (req,res)=>{
    try {
        const token =req.cookies.auth_token;
        if(!token) {
            return res.redirect('/login')
        }

        const user = res.session.user;

        console.log(user);
        if(!user){
            return res.redirect('/login')
        }
        const respon = await authService.deleteToken(token);

        if(respon.status === 201){
            return res.redirect('/login')
        }

       

        req.session.destroy(function(err) {
             req.clearCookie("auth_token",{path : "/"});
        })

        return res.redirect('/login')
    } catch (error) {
        return res.redirect('/login');
    }
}

module.exports = {
    login,
    PostLogin,
    register,
    PostRegister,
    logout,
    profile
};