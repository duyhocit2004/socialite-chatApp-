const express = require('express')
const app = express()

const RouterAdmin = require('./routes/admin/test');

require('dotenv').config()

app.set('view engine','ejs');
app.set('views','./views')

app.use(express.static('/public'));

app.use('/admin',RouterAdmin);

app.listen(process.env.PORT || 3000, () => {
  console.log(`Example app listening on port ${process.env.PORT}`)
})