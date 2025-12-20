const postService = require('../../services/postSerivce');


const getPost  = async (req,res)=>{
    try {

        // lấy data ở form trên url
        const SearchContent = req.query.content ?? '';
        const typePost = req.query.typeContent ?? '';
        const postStatus = req.query.post_status_id ?? 1;

        // lấy token trên cookie
        const token = req.cookies.auth_token
        const data = await postService({SearchContent,typePost,postStatus},token);

        // if()
    } catch (error) {
        
    }
}

module.exports = {getPost}