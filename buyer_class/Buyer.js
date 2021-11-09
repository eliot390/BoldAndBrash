function Buyer(fullName, username, address, password) {

    this.bidArrays = [];           //For bids on paintings
    this.orders = [];              //For successful orders
    this.fullName = fullName;       //Full name for buyer
    this.username = username;       //Username for buyer
    this.address = address;         //Address for buyer
    this.password = password;       //Password for buyer

    Buyer.prototype.printOrders = function() {
        console.log("Orders: ");
        if(this.orders.length === 0) {
            console.log("N/A");
        } else
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
        if(this.bidArrays.length === 0) {
            console.log("N/A");
        } else {
            for (let i = 0; i < this.bidArrays.length; i++) {
                console.log(this.bidArrays[i].name + " with a bid of " + this.bidArrays[i].highestBid);
            }
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

        for(let i = 0; i < this.bidArrays.length; i++){     //Checks to see if the buyer has a bid and wants to update it
            if(painting.name === this.bidArrays[i].name && this.bidArrays[i].price < bid){
                this.bidArrays.splice(i, 1);
                this.bidArrays.push(painting);
                console.log("Successfully bid " + bid + " on " + painting.name);
                return painting.setBidder(bid);
            } else if(painting === this.bidArrays[i].name && this.bidArrays[i].price > bid) {
                console.log("Sorry, your bid of " + bid + " is under " + this.bidArrays[i].price);
                return;
            }
        }

        if(bid > painting.highestBid) {
            this.bidArrays.push(painting);
            console.log('Successfully bid ' + bid + ' on ' + painting.name);
            return painting.setBidder(bid);
        } else {
            console.log("Sorry, your bid of " + bid + " is under " + painting.highestBid);
        }

    }

    Buyer.prototype.setPassword = function(password) {
        this.password = password;
        console.log("Successfully changed password");
    }

    Buyer.prototype.getOrderList = function() {
        return this.orders;
    }

    Buyer.prototype.getBidList = function() {
        return this.bidArrays;
    }

    Buyer.prototype.setAddress = function(address) {
        this.address = address;
    }

    Buyer.prototype.getAddress = function() {
        return this.address;
    }

    Buyer.prototype.setUsername = function(username) {
        this.username = username;
    }

    Buyer.prototype.getUsername = function() {
        return this.username;
    }

    Buyer.prototype.getFullname = function(){
        return this.fullName;
    }

    Buyer.prototype.setFullname = function(fullName) {
        this.fullName = fullName;
    }

}

module.exports = {Buyer};