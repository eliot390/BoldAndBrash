const {Painting} = require('./TestPainting.js');
const {Buyer} = require('./Buyer.js');

let squid = new Buyer("Squidward Tentacles", "STentacles", "18234 Bikini Bottom Road", "iamthebestmusician");
let sponge = new Buyer("Spongebob Squarepants", "SSPants", "18235 Bikini Bottom Road", "squidwardisthebest");

let MonaLisa = new Painting("Mona Lisa", 40000, 40000);
let Scream = new Painting("Scream", 25000, 12000);
let ObamaPortrait = new Painting("Painting of Obama", 100000, 0);
let LincolnPortrait = new Painting("Painting of Abraham Lincoln", 20000000, 0);
let boldandBrash = new Painting("Bold and Brash", 99999999999999, 0);

squid.insertOrders(boldandBrash);
squid.insertOrders(MonaLisa);
squid.setBidder(3000000, ObamaPortrait);
squid.printBuyer();
console.log("~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~");
sponge.printBuyer();
console.log("~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~~");
squid.setBidder(50, ObamaPortrait);
console.log(squid.getOrderList());
console.log(squid.getBidList());