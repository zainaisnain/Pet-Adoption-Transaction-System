<?php
include_once 'dbh/dbh_conn.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" type="text/css" rel="stylesheet">
    <title>Adopted Pets List</title>
</head>
<body>

<div class="container">
    <table>
        <tr>
            <th>Pet Name</th>
            <th>Pet ID</th>
            <th>Adopter</th>
        </tr>
        <?php
        $result = $conn -> query ("SELECT pet_name, pet_id, adopter FROM pet_info WHERE is_adopted ='yes';");
                while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                    echo "<tr><td>".$row['pet_name']."</td>"; 
                    echo "<td>".$row['pet_id']."</td>";
                    echo "<td>".$row['adopter']."</td></tr>";
                 }
        ?> 



    </table>
</div>
</body>
</div>
</html>