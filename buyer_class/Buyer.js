console.log("Just need to make sure this works");
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
        console.log("Paintings with successful bids: " + bidArrays)

    }

    Buyer.prototype.insertBidItem = function(painting) {

            bidArrays.push(painting);

    }

    Buyer.prototype.removeBidItem = function(painting) {

        for(let i = 0; i < bidArrays.length; i++) {
            if(painting == bidArrays[i]){
                console.log(bidArrays[i] + " has been removed");
                bidArrays.splice(i,1);

            }
        }
    }

}

let Dave = new Buyer("Dave Baptist","daveB", "263564 Merrylane Road", "12345");
console.log(Dave.username);
console.log(Dave.address);
console.log(Dave.password);
Dave.insertBidItem("Mona Lisa");
Dave.insertBidItem("The Scream");
Dave.insertBidItem("Octopus");
Dave.insertBidItem("Obama");
Dave.insertBidItem("Lincoln");
Dave.printBuyer();
Dave.removeBidItem("Octopus");
Dave.printBuyer();
