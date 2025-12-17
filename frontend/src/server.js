const express = require('express')
const app = express()
const fileUpload = require('express-fileupload');
const engine = require('ejs-mate');
var cookieParser = require('cookie-parser')
var session = require('express-session');
app.use(cookieParser())



app.use(express.json());
app.use(express.urlencoded({ extended: true }));

const {middleware} = require('./middleware/middle.js')

const RouterAdmin = require('./routes/admin/test');
const RouterClient = require('./routes/client/home');
const authController = require('./controllers/api/authController.js')
require('dotenv').config()

app.use(session({
  secret : process.env.SECRET_SESSION,
  resave :false,
  saveUninitialized: false,  
  cookie : {
    maxAge:30*24*60*60*1000,
    httpOnly : true,
    secure : true
  }
}))

app.use(fileUpload({
  createParentPath: true,
  abortOnLimit : true,
  limits: { fileSize: 5 * 1024 * 1024 },
  useTempFiles : true
}))

app.engine('ejs', engine);

app.set('view engine','ejs');
app.set('views',`${__dirname}/views/`)

app.use(express.static(`${__dirname}/public`));

app.get('/Login',authController.login);
app.post('/PostLogin',authController.PostLogin);
app.get('/register',authController.register);
app.post('/PostRegister',authController.PostRegister);
app.post('/logout',authController.logout)
app.get('/profile',authController.profile);

app.use('/admin',RouterAdmin);

app.use('/',RouterClient);

app.listen(process.env.PORT || 3000, () => {
  console.log(`Example app listening on port ${process.env.PORT}`)
})