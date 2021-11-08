
const {Painting} = require('./TestPainting.js');
function Buyer(fullName, username, address, password) {

    this.bidArrays = [];           //For bids on paintings
    this.orders = [];              //For successful orders
    this.fullName = fullName;       //Full name for buyer
    this.username = username;       //Username for buyer
    this.address = address;         //Address for buyer
    this.password = password;       //Password for buyer

    Buyer.prototype.printOrders = function() {
        for(let i = 0; i < this.orders.length; i++) {
            console.log(this.orders[i].name);
        }
    }

    Buyer.prototype.insertOrders = function(painting) {
        this.orders.push(painting);
    }

    Buyer.prototype.printBuyer = function() {

        console.log("Full Name: " + this.fullName);
        console.log("Username: " + this.username);
        console.log("Address: " + this.address);
        console.log("Password: " + this.password);
        console.log("Paintings with successful bids: ");
        for(let i = 0; i < this.bidArrays.length; i++){
            console.log(this.bidArrays[i].name + " with a bid of " + this.bidArrays[i].highestBid);
        }
        this.printOrders();
    }

    Buyer.prototype.insertBidItem = function(painting) {

            this.bidArrays.push(painting);

    }

    Buyer.prototype.removeBidItem = function(painting) {

        for(let i = 0; i < this.bidArrays.length; i++) {
            if(painting === this.bidArrays[i].name){
                console.log(this.bidArrays[i].name + " has been removed");
                this.bidArrays.splice(i,1);

            }
        }
    }


    Buyer.prototype.setBidder = function(bid, painting) {
        for(let i = 0; i < this.bidArrays.length; i++){
            if(painting ===this.bidArrays[i].name && this.bidArrays[i].price < bid){
                this.bidArrays[i].setBidder(bid);
                console.log("Successfully bid " + bid + " on " + this.bidArrays[i].name);
            } else if(painting === this.bidArrays[i].name && this.bidArrays[i].price > bid) {
                console.log("Sorry, your bid of " + bid + " is under " + this.bidArrays[i].price);
            }
        }
    }

}

let Dave = new Buyer("Dave Baptist","daveB", "263564 Merrylane Road", "12345");
let Mike = new Buyer("Mike Lee Torres", "mLee", "12345 Something Road", "iamcool69");
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
Dave.printBuyer();
console.log("~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~");
Mike.printBuyer();
console.log("~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~");
Dave.printBuyer();

Mike.printBuyer();