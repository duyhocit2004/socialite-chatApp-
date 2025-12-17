const middleware = (req, res, next) => {
    try {
        let url = req.originalUrl;

        if(!req.session.user){
            return res.redirect('/login');
        }

        if (url.replace('/admin/')) {
            if (req.session.user.role === "admin") {
                return next();
            } else {
                return res.redirect('/login');
            }
        }

        if (req.session.user.role === "user") {
            return next();
        } else {
            return res.redirect('/login');
        }
    } catch (error) {
        return res.redirect('/login');
    }
}

module.exports = {middleware}
