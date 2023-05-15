const fs = require('fs');
const http = require('http');

const port = process.env.PORT || 3000;

const server = http.createServer((req, res) =>{
    
    res.setHeader('Content-Type', 'text/html')

    if(req.url == '/'){
        res.statusCode = 200;
        res.end('<h1> Hello from Ankit Yadav </h1>');
    }
    else if(req.url == '/about'){
        res.statusCode = 200;
        res.end('<h1> This is the information about <i>Ankit Yadav</i> </h1>');
    }
    else if(req.url == '/hello'){
        res.statusCode = 200;
        const data = fs.readFileSync('index.html');
        res.end(data.toString());
    }
    else{
        // res.ankit(); 
        res.statusCode = 404;
        res.end('<h1> Page Not Found</h1>');
    }
})

server.listen(port, ()=>{
    console.log(`Server is listening on port ${port}`);
});