
const test = async (req,res)=>{
     try {
        const response = await axios.get("http://localhost:8000/api/test");
        return res.json(response.data); // gửi JSON về client
    } catch (error) {
        return res.status(500).json({ error: error.message });
    }
}

module.exports = {test} // common js