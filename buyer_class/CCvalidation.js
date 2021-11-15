const validateCardNumber = number => {
    const regex = new RegExp("^[0-9]{13,19}$");
    number = number.replace (/\s/g, "");

    if (!regex.test(number)){
        console.log("invalid number");
        return false;
    }
    console.log("valid number");
    return luhnCheck(number);
}

const luhnCheck = val => {
    let checksum = 0;
    let j = 1;

    for (let i = val.length - 1; i >= 0; i--) {
      let calc = 0;
      calc = Number(val.charAt(i)) * j;

      if (calc > 9) {
        checksum = checksum + 1;
        calc = calc - 10;
      }

      checksum = checksum + calc;

      if (j == 1) {
        j = 2;
      } else {
        j = 1;
      }
    }

    return (checksum % 10) == 0;
}

validateCardNumber("0123 7654 4321 0190");
validateCardNumber("584 8484 8");
