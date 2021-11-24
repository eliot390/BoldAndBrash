const {Painting} = require('./TestPainting.js');
const {Buyer} = require('./Buyer.js');
const {Artist} = require('./Artist.js');
const {Order} = require('./order.js');


let squid = new Buyer("Squidward Tentacles", "STentacles", "18234 Bikini Bottom Road", "iamthebestmusician");
let sponge = new Buyer("Spongebob Squarepants", "SSPants", "18235 Bikini Bottom Road", "squidwardisthebest");
let crab = new Artist("Eugene Krabs", "Money", "I want");
let squirrel = new Artist("Sandy Cheeks", "Karate queen", "s1mpf0rsp0ngeb0b");

let MonaLisa = new Painting("Mona Lisa", 40000, 40000, crab, "21x4", "Painting", 1);
let Scream = new Painting("Scream", 25000, 12000, crab, "12x12", "Painting", 1);
let ObamaPortrait = new Painting("Painting of Obama", 100000, 0, squirrel, "64x128", "Painting", 200);
let LincolnPortrait = new Painting("Painting of Abraham Lincoln", 20000000, 0, squirrel, "128x64","Painting" , 100);
let boldandBrash = new Painting("Bold and Brash", 99999999999999, 0, crab, "420x69", "A masterpiece", 1);

//const temp = [MonaLisa.name, Scream.name, ObamaPortrait.name, LincolnPortrait.name, boldandBrash.name];
//const tempPaint = [MonaLisa, Scream, ObamaPortrait, LincolnPortrait, boldandBrash];

const user = squid; //Placeholder, change squid to the user when they log in

const paintingList = [MonaLisa, Scream, ObamaPortrait, LincolnPortrait, boldandBrash];    //Used as the database for painting
const artistList = [crab, squirrel];      //Used as the database for artists
crab.addPainting(MonaLisa);
crab.addPainting(Scream);
crab.addPainting(boldandBrash);
squirrel.addPainting(ObamaPortrait);
squirrel.addPainting(LincolnPortrait);

function createNewPainting(name, cost, bid, dimension, medium, stock) {     //Allows artist to upload painting

    let temp = new Painting(name, cost, bid, user, dimension, medium, stock);
    user.addPainting(temp);
    paintingList.push(temp);
}

function deletePainting(painting){      //Allows artist to remove painting from website
    user.removePainting(painting);
}

function searchPainting(name) {
    for(let i = 0; i < paintingList.length; i++){
        if(paintingList[i].name == name || paintingList.at[i].artist.getFullname() == name){
            paintingList[i].setPainting();
        }
    }

    for(let i = 0; i < artistList.length; i++){
        if(artistList[i].getFullname() == name){
            artistList[i].printArtist();
        }
    }
}

function viewAll(){
    for(let i = 0; i < paintingList.length; i++){
        paintingList[i].setPainting();
    }

    for(let i = 0; i < artistList.length; i++){
        artistList[i].setPainting();
    }
}

/*
//Taken from Eliot's CC Validation
const validateCardNumber = number => {
    //Check if the number contains only numeric value
    //and is of between 13 to 19 digits
    const regex = new RegExp("^[0-9]{13,19}$");

    // Now remove any spaces from the credit card number
    // Update this if there are any other special characters like -
    number = number.replace(/\s/g, "");

    if (!regex.test(number)){
        console.log("invalid number");
        return false;
    }
    console.log("valid number");
    return luhnCheck(number);
}

const luhnCheck = val => {
    let checksum = 0; // running checksum total
    let j = 1; // takes value of 1 or 2

    // Process each digit one by one starting from the last
    for (let i = val.length - 1; i >= 0; i--) {
        let calc = 0;
        // Extract the next digit and multiply by 1 or 2 on alternative digits.
        calc = Number(val.charAt(i)) * j;

        // If the result is in two digits add 1 to the checksum total
        if (calc > 9) {
            checksum = checksum + 1;
            calc = calc - 10;
        }

        // Add the units element to the checksum total
        checksum = checksum + calc;

        // Switch the value of j
        if (j == 1) {
            j = 2;
        } else {
            j = 1;
        }
    }

    //Check if it is divisible by 10 or not.
    return (checksum % 10) == 0;
}
*/
//




function buyPainting(painting, cardNumber) {        //Allows buyer to buy painting
    if(/* validateCardNumber(cardNumber) && */painting.stock > 0) {
       /* user.insertOrders(painting.artist.getFullname(), painting.name, "card", "1"); */
        painting.stock--;
    }
}

function bidOnPainting(painting, cardNumber, bidAmount) {   //Allows buyer to bid on painting
    if(validateCardNumber(cardNumber)) {
        user.setBidder(bidAmount, painting);
    }
}

function removeBid(painting) {      //Allows buyer to remove their bid
    user.removeBidItem(painting);
}

function sellToBuyer(){     //May need painting to include highest bidder

}
ObamaPortrait.setPainting();
squirrel.printArtist();

console.log("***********************************");

buyPainting(ObamaPortrait, 4235128399121223);
ObamaPortrait.setPainting();
squirrel.printArtist();
