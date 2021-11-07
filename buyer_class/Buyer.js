console.log("Just need to make sure this works");
function Buyer(username, address, password) {
    this.username = username;
    this.address = address;
    this.password = password;
}

let Dave = new Buyer("daveB", "263564 Merrylane Road", "12345");
console.log(Dave.username);
console.log(Dave.address);
console.log(Dave.password);
