<!--purchase.php
// form of payment
// card info
// name - buyer
// shipping info - buyer
// email - buyer
// confirmation email -->
<?php
error_reporting(0);
include('session.php');

echo "<body>
<div class='container-fluid'>
    <div class='creditCardForm'>
        <div class='heading'>
            <h1>Confirm Purchase</h1>
        </div>
        <div class='payment'>
            <form>
                <div class='form-group owner'>
                    <label for='owner'>Owner</label>
                    <input type='text' class='form-control' id='owner'>
                </div>
                <div class='form-group CVV'>
                    <label for='cvv'>CVV</label>
                    <input type='text' class='form-control' id='cvv'>
                </div>
                <div class='form-group' id='card-number-field'>
                    <label for='cardNumber'>Card Number</label>
                    <input type='text' class='form-control' id='cardNumber'>
                </div>
                <div class='form-group' id='expiration-date'>
                    <label>Expiration Date</label>
                    <select>
                        <option value='01'>Jan</option>
                        <option value='02'>Feb</option>
                        <option value='03'>Ma</option>
                        <option value='04'>Apr</option>
                        <option value='05'>May</option>
                        <option value='06'>Jun</option>
                        <option value='07'>Jul</option>
                        <option value='08'>Aug</option>
                        <option value='09'>Sep</option>
                        <option value='10'>Oct</option>
                        <option value='11'>Nov</option>
                        <option value='12'>Dec</option>
                    </select>
                    <select>
                        <option value='16'> 2026</option>
                        <option value='17'> 2025</option>
                        <option value='18'> 2024</option>
                        <option value='19'> 2023</option>
                        <option value='20'> 2022</option>
                        <option value='21'> 2021</option>
                    </select>
                </div>
                <div class='form-group' id='credit_cards'>
                    <img src='Wet_Painters_085.jpg' id='card1'>
                    <img src='fposter.jpg' id='card2'>
                </div>
                <div class='form-group' id='pay-now'>
                    <button type='submit' class='btn btn-default' id='confirm-purchase'>Confirm</button>
                </div>
            </form>
        </div>
    </div>

    <div>
      <div class='col-md-4' id='cancelSave'>
        <a class='btn btn-primary' href='index.php' role='button'>Main Menu</a>
      </div>
    </div

</div>
</body>" 
?>

<!DOCTYPE>
<html>

<head>
  <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="CCform.css">
  <link rel="stylesheet" href="bnb.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
  
</head>

<script type="text/javascript" src="CCvalidation.js"></script>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js'></script>
  <script src='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js'></script>
  <script src='jquery.payform.min.js' charset='utf-8'></script>
  <script src='script.js'></script>

</html>
