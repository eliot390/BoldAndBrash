
const {Painting} = require('./TestPainting.js');
function Buyer(fullName, username, address, password) {

    const bidArrays = [];           //For bids on paintings
    const orders = [];              //For successful orders
    this.fullName = fullName;       //Full name for buyer
    this.username = username;       //Username for buyer
    this.address = address;         //Address for buyer
    this.password = password;       //Password for buyer

    Buyer.prototype.printOrders = function() {
        for(let i = 0; i < orders.length; i++) {
            console.log(orders[i].name);
        }
    }

    Buyer.prototype.insertOrders = function(painting) {
        orders.push(painting);
    }

    Buyer.prototype.printBuyer = function() {

        console.log("Full Name: " + fullName);
        console.log("Username: " + username);
        console.log("Address: " + address);
        console.log("Password: " + password);
        console.log("Paintings with successful bids: ");
        for(let i = 0; i < bidArrays.length; i++){
            console.log(bidArrays[i].name + " with a bid of " + bidArrays[i].highestBid);
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


    Buyer.prototype.setBidder = function(bid, painting) {
        for(let i = 0; i < bidArrays.length; i++){
            if(painting ===bidArrays[i].name && bidArrays[i].price < bid){
                bidArrays[i].setBidder(bid);
                console.log("Successfully bid " + bid + " on " + bidArrays[i].name);
            } else if(painting ===bidArrays[i].name && bidArrays[i].price > bid) {
                console.log("Sorry, your bid of " + bid + " is under " + bidArrays[i].price);
            }
        }
    }

}

let Dave = new Buyer("Dave Baptist","daveB", "263564 Merrylane Road", "12345");
console.log(Dave.username);
console.log(Dave.address);
console.log(Dave.password);
let MonaLisa = new Painting("Mona Lisa", 40000, 40000);
let Scream = new Painting("Scream", 25000, 12000);
let ObamaPortrait = new Painting("Painting of Obama", 100000, 0);
let LincolnPortrait = new Painting("Painting of Abraham Lincoln", 20000000, 0);
Dave.insertBidItem(MonaLisa);
Dave.insertBidItem(Scream);
Dave.insertBidItem(ObamaPortrait);
Dave.insertBidItem(LincolnPortrait);
Dave.printBuyer();
console.log("~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~");
Dave.setBidder(6900000, "Painting of Obama");
Dave.setBidder(420, "Mona Lisa");
Dave.removeBidItem("Scream");
Dave.insertOrders(Scream);
Dave.printOrders();
