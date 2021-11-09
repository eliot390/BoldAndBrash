/* pull request */

function Painting(name, price, highestBid){

    this.name = name;
    this.price = price;
    this.highestBid = highestBid;

    Painting.prototype.setBidder = function(highestBid){
        this.price = highestBid;
        this.highestBid = highestBid;
    }

}
module.exports = {Painting};
