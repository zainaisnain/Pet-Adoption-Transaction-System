<?php
include_once 'dbh/dbh_conn.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" type="text/css" rel="stylesheet">
    <title>Adopt a Pet</title>
</head>
<body>

<div class="form">
    <form method="get" id="donations-form" name="donations-form">
        <table>
            <th>
                ADOPTER INFORMATION
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
                <td>User ID:</td>
                <td><input type="text" name="userid"></td>
            </tr>
            <th>
                PET'S INFORMATION
            </th>
            <tr>
                <td>Pet ID:</td>
                <td><input type="text" name="petid"></td>
            </tr>

        </table>
        <input type="submit" name="submit" value="Adopt"/>
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
    $user_id = $_GET['userid'];
    $pet_id = $_GET['petid'];


    $userCheck = $conn -> query("select user_id from user_info where user_id = '$user_id';");
    $petCheck = $conn -> query("select pet_id from pet_info where pet_id = '$pet_id';");
    $is_adopted_check = $conn -> query("select is_adopted from pet_info where is_adopted = 'no';");
    $user_name_check = $conn -> query("select first_name from user_info where user_id = '$user_id';");
    
    if($is_adopted_check->num_rows > 0) {
        if($userCheck->num_rows > 0) {
            if($user_name_check == $fname) {
                if($petCheck->num_rows > 0) {
                    $sql = "INSERT INTO adoption_info (firstname, lastname, user_id, pet_id)
                            VALUES ('$fname', '$lname',  '$user_id', '$pet_id');";
                    if($conn->query($sql) == TRUE) {
                        $alter_status = $conn -> query("UPDATE pet_info
                        SET is_adopted = 'yes', adopter = '$fname' 
                        WHERE pet_id = '$pet_id';");
                            echo '<script>alert("Thank you for adopting")</script>';
                            // echo "Thank you for adopting";
                    }
                } else {
                    echo '<script>alert("Pet not found")</script>';
                    // echo "Pet not found";
                }
            }else {
                echo '<script>alert("name does not match user id")</script>';
                // echo "name does not match user id";
            }
        } else {
            echo '<script>alert("User does not exist. Please sign up first.")</script>';
            // echo "User does not exist. Please sign up first.";
        }
    }else {
        echo '<script>alert("Pet already adopted")</script>';
        // echo "Pet already adopted";
    }

    
    

    // if($conn->query($sql) == TRUE) {
    //     echo "Thank you for adopting";
    // }
    // else {
    //     echo "Your adoption couln't be processed. Please try again. ".$sql.$conn->error;
    // }
    $conn->close();
}


?>
</div>
</html>