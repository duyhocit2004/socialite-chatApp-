const express = require('express')
const app = express()
const fileUpload = require('express-fileupload');
const engine = require('ejs-mate');

app.use(express.json());
app.use(express.urlencoded({ extended: true }));
app.use(fileUpload());

const RouterAdmin = require('./routes/admin/test');
const RouterClient = require('./routes/client/home');


require('dotenv').config()

app.engine('ejs', engine);

app.set('view engine','ejs');
app.set('views',`${__dirname}/views/`)

app.use(express.static(`${__dirname}/public`));

app.use('/admin',RouterAdmin);

app.use('/',RouterClient);

app.listen(process.env.PORT || 3000, () => {
  console.log(`Example app listening on port ${process.env.PORT}`)
})