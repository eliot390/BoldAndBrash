function Order(buyer, artist, painting, address, payment, confirmation, email) {
    
    this.email = email;
    this.buyer = buyer;
    this.artist = artist;
    this.painting = painting;
    this.address = address;
    this.paymentMethod = payment;
    this.confirmationNumber = confirmation;

    Order.prototype.setOrder = function() {
        console.log(this.buyer + ", thank you for your purchase of " + 
                    this.painting + " by the artist " + 
                    this.artist + ". Your confirmation number will be #" + 
                    this.confirmationNumber);
        console.log("Method of payment: " + this.paymentMethod);
    }

    var userChoice;

    console.log("The email under your account is: " + this.email);

    if (confirm("Please confirm that your email is correct.") == true) {
        userChoice = "A copy of your recepit has been sent to your email.";
    } else {
        userChoice = "Email confirmation error occured.";
    }
}
