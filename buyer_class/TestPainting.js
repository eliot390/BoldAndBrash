function Painting(name, price, highestBid, artist, dimensions, medium, stock) {

    this.namePainting = name;
    this.price = price;
    this.highestBid = highestBid;
    this.artist = artist;
    this.dimensions = dimensions;
    this.medium = medium;
    this.stock = stock;

    Painting.prototype.setPainting = function() {
        console.log("Title: " + this.namePainting);
        console.log("Artist: " + this.artist);
        console.log("Cost: " + this.price);
        console.log("Highest Bidder: " + this.highestBid);
        console.log("Stock remaining: " + this.stock);
        console.log("Dimensions: " + this.dimensions);
        console.log("Medium: " + this.medium);
    }
    
    set setBid(newBid, newHighest) {
        this.newBid = newBid;
        this.highestBid = newHighest;        // Painting.setBid = '0000000000'; 
    }
    
    get getBid() {
        return this.highestBid;          // console.log(Painting.getBid);
    }
}
module.exports = {Painting};