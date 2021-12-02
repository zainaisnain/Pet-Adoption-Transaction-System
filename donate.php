
<?php
include_once 'dbh/dbh_conn.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" type="text/css" rel="stylesheet">
    <title>Donate</title>
</head>
<body>

<div class="form">
    <form method="get" id="donations-form" name="donations-form">
        <table>
            <th>
                YOUR INFORMATION
            </th>
            <tr>
                <td>First Name:</td>
                <td><input type="text" name="fname"></td>
            </tr>
            <tr>
                <td>Last Name:</td>
                <td><input type="text" name="lname"></td>
            </tr>
            <tr>
                <td>Address:</td>
                <td><input type="text" name="address"></td>
            </tr>
            <tr>
                <td>Contact Number:</td>
                <td><input type="text" name="phone_number"></td>
            </tr>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Amount:</td>
                <td><input type="number" name="amount"></td>
            </tr>
            <tr>
                <td>Recipient:</td>
                <td><select id="recipient" name="recipient">
                        <option disabled selected value> -- select an option -- </option>
                        <option value="dogs">dogs</option>
                        <option value="cats">cats</option>
                        <option value="special pets">special pets</option>
                        <option value="all pets">all pets</option>
                    </select></td>
            </tr>
            <th>
                PAYMENT INFORMATION
            </th>
            <tr>
                <td>Card Type </td>
                <td>
                    <select id="cardtype" name="card type">
                        <option disabled selected value> -- select an option -- </option>
                        <option value="mastercard">mastercard</option>
                        <option value="visa">visa</option>
                        <option value="maestro">maestro</option>
                        <option value="american express">american express</option>
                    </select>
                </td>

            </tr>
            <tr>
                <td>Card Number</td>
                <td><input id="ccn" type="tel" inputmode="numeric" pattern="[0-9\s]{13,19}" maxlength="19"></td>
            </tr>
            <tr>
                <td>Expiration Date</td>
                <td>
                    <select id="MM" name="MM">
                        <option disabled selected value> MM </option>
                        <option value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select>
                    /
                    <select id="YY" name="YY">
                        <option disabled selected value> YY </option>
                        <option value="21">21</option>
                        <option value="22">22</option>
                        <option value="23">23</option>
                        <option value="24">24</option>
                        <option value="25">25</option>
                        <option value="26">26</option>
                        <option value="27">27</option>
                        <option value="28">28</option>
                        <option value="29">29</option>
                        <option value="30">30</option>
                        <option value="31">31</option>
                    </select>
            <tr>
                <td>
                    CVV
                </td>
                <td>
                    <input id="cvv" type="tel" inputmode="numeric" maxlength="3">
                </td>
            </tr>

            </tr>


        </table>
        <input type="submit" name="submit" value="DONATE"/>
    </form>
</div>
</body>
<?php
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// INSERTING VALUES TO DB
if(isset($_GET['submit'])) {
    $fname = $_GET['fname'];
    $lname = $_GET['lname'];
    $address = $_GET['address'];
    $phone_number = $_GET['phone_number'];
    $email = $_GET['email'];
    $amount = $_GET['amount'];
    $recipient = $_GET['recipient'];


    $sql = "INSERT INTO donations (firstname, lastname, address, phone_number, email, donated_amount, recipient)
                VALUES ('$fname', '$lname', '$address', '$phone_number', '$email', '$amount', '$recipient');";


    if($conn->query($sql)==TRUE) {
        echo "Thank you for donating";
    }
    else {
        echo "Your donation couln't be processed. Please try again. ".$sql.$conn->error;
    }
    $conn->close();
}


?>
</div>
</html>