console.log("Just need to make sure this works");
function Buyer(fullName, username, address, password) {
    this.fullName = fullName;
    this.username = username;
    this.address = address;
    this.password = password;
    Buyer.prototype.printBuyer = function(){
        console.log("Full Name: " + fullName);
        console.log("Username: " + username);
        console.log("Address: " + address);
        console.log("Password: " + password);
    }
}

let Dave = new Buyer("Dave Baptist","daveB", "263564 Merrylane Road", "12345");
console.log(Dave.username);
console.log(Dave.address);
console.log(Dave.password);
Dave.printBuyer();



