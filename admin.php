
<?php
include_once 'dbh/dbh_conn.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" type="text/css" rel="stylesheet">
    <title>Admin</title>
</head>
<body>

<div class="form">
    <form method="get" id="admin" name="admin">
        <table>
            <th>
                PETS
            </th>
            <tr>
                <td>What do you want to do:</td>
                <td><select id="admin" name="admin">
                    <option value='none' selected>choices</option>
                    <option value="adopted_pets_list.php">See our pets' list</option>
                    <option value="adopt.php">Adopt a pet</option>
                    <option value="manage_pet.php">Manage Pet</option>
                    </select>
                </td>
            </tr>
        </table>
        <input type="submit" name="submit" value="Enter"/>
    </form>
</div>
</body>
<?php

// INSERTING VALUES TO DB
if(isset($_GET['submit'])) {
    $location = $_GET['admin'];
    header("Location: ".$location);
}


?>


</div>
</html>