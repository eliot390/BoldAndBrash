
const {Painting} = require('./TestPainting.js');
function Buyer(fullName, username, address, password) {

    const bidArrays = [];
    this.fullName = fullName;
    this.username = username;
    this.address = address;
    this.password = password;

    Buyer.prototype.printBuyer = function(){

        console.log("Full Name: " + fullName);
        console.log("Username: " + username);
        console.log("Address: " + address);
        console.log("Password: " + password);
        console.log("Paintings with successful bids: ");
        for(let i = 0; i < bidArrays.length; i++){
            console.log(bidArrays[i].name);
        }

    }

    Buyer.prototype.insertBidItem = function(painting) {

            bidArrays.push(painting);

    }

    Buyer.prototype.removeBidItem = function(painting) {

        for(let i = 0; i < bidArrays.length; i++) {
            if(painting === bidArrays[i].name){
                console.log(bidArrays[i].name + " has been removed");
                bidArrays.splice(i,1);

            }
        }
    }

}

let Dave = new Buyer("Dave Baptist","daveB", "263564 Merrylane Road", "12345");
console.log(Dave.username);
console.log(Dave.address);
console.log(Dave.password);
let MonaLisa = new Painting("Mona Lisa", 40000, 0);
let Scream = new Painting("Scream", 25000, 12000);
let ObamaPortrait = new Painting("Painting of Obama", 100000, 0);
let LincolnPortrait = new Painting("Painting of Abraham Lincoln", 20000000, 0);
Dave.insertBidItem(MonaLisa);
Dave.insertBidItem(Scream);
Dave.insertBidItem(ObamaPortrait);
Dave.insertBidItem(LincolnPortrait);
Dave.printBuyer();
console.log("~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~");
Dave.removeBidItem("Scream");
Dave.printBuyer();