
<?php
include_once 'dbh/dbh_conn.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" type="text/css" rel="stylesheet">
    <title>Manage Pet</title>
</head>
<body>

<div class="form">
    <form method="get" id="pet-form" name="pet-form">
        <table>
            <th>
                PET INFORMATION
            </th>
            <tr>
                <td>Pet Name:</td>
                <td><input type="text" name="petname"></td>
            </tr>
            <tr>
                <td>Animal:</td>
                <td>
                    <select id="cardtype" name="animal">
                        <option disabled selected value> -- select an option -- </option>
                        <option value="dog">dog</option>
                        <option value="cat">cat</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Breed:</td>
                <td><input type="text" name="breed"></td>
            </tr>
            <tr>
                <td>Age:</td>
                <td><input type="text" name="age"></td>
            </tr>
            <tr>
                <td>Sex:</td>
                <td>
                    <select id="cardtype" name="sex">
                        <option disabled selected value> -- select an option -- </option>
                        <option value="female">female</option>
                        <option value="male">male</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Is Adopted:</td>
                <td>
                    <select id="cardtype" name="isadopted">
                        <option disabled selected value> -- select an option -- </option>
                        <option value="yes">yes</option>
                        <option value="no">no</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>If adopted, Enter adopter user ID:</td>
                <td><input type="number" name="userid"></td>
            </tr>

            <th>
            PET CHARACTERISTICS
            </th>

            <tr>
                <td>Size:</td>
                <td><input type="text" name="size"></td>
            </tr>
            <tr>
                <td>Color:</td>
                <td><input type="text" name="color"></td>
            </tr>
            <tr>
                <td>Special Needs:</td>
                <td><input type="text" name="needs"></td>
            </tr>
            <tr>
                <td>affectionate:</td>
                <td><input type="tel" inputmode="numeric" maxlength="3" name="affectionate">%</td>
            </tr>
            <tr>
                <td>playful:</td>
                <td><input type="tel" inputmode="numeric" maxlength="3" name="playful">%</td>
            </tr>
            <tr>
                <td>friendly:</td>
                <td><input type="tel" inputmode="numeric" maxlength="3" name="friendly">%</td>
            </tr>
            <tr>
                <td>Energetic:</td>
                <td><input type="tel" inputmode="numeric" maxlength="3" name="energetic">%</td>
            </tr>
            <tr>
                <td>Kid friendly:</td>
                <td><input type="tel" inputmode="numeric" maxlength="3" name="kidfriendly">%</td>
            </tr>
        </table>
        <input type="submit" name="submit" value="SUBMIT"/>
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
    $pet_name = $_GET['petname'];
    $animal= $_GET['animal'];
    $breed = $_GET['breed'];
    $age = $_GET['age'];
    $sex = $_GET['sex'];
    $is_adopted = $_GET['isadopted'];
    $adopter = $_GET['userid'];
    $size = $_GET['size'];
    $color = $_GET['color'];
    $needs = $_GET['needs'];
    $affectionate = $_GET['affectionate'];
    $playful = $_GET['playful'];
    $friendly = $_GET['friendly'];
    $energy = $_GET['energetic'];
    $kid_friendly = $_GET['kidfriendly'];

    // $petCheck = $conn -> query("select pet_id from pet_info where pet_id = '$pet_id';");



    $sql = "INSERT INTO pet_info (pet_name, animal, breed, age, sex, is_adopted, adopter, size, color, needs_category, affectionate, playful, friendly, energy, kid_friendly)
    VALUES ('$pet_name', '$animal', '$breed', '$age', '$sex', '$is_adopted', '$adopter', '$size', '$color', '$needs', '$affectionate', '$playful', '$friendly', '$energy', '$kid_friendly');";


   
    if($conn->query($sql)==TRUE) {
        echo '<script>alert("Pet added to database")</script>';
        // echo "Pet added to database";
    }
    else {
        echo "Error occurred. ".$sql.$conn->error;
    }
    $conn->close();
}


?>
</div>
</html>