const fs = require('fs');

// const a = fs.readFileSync('file.txt')
//     console.log(a.toString());


// fs.writeFile('file2.txt',"entering data into new file sdsds", ()=>{
//     console.log("written to the file");
// });
b = fs.writeFileSync('file2.txt',"this is the new data entered");
console.log(b);

console.log("asdsfdfdsf");