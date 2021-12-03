<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "PATS";


// Create connection
$conn = new mysqli($servername, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//sql to create table
$user_sql = "CREATE TABLE user_info (
                    user_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    firstname VARCHAR(150) NOT NULL,
                    lastname VARCHAR(150) NOT NULL,
                    birthday DATE,
                    gender VARCHAR(150),
                    address VARCHAR(350),
                    phone_number VARCHAR(11),
                    email VARCHAR(150),
                    username VARCHAR(150) NOT NULL UNIQUE,
                    user_password VARCHAR(150) NOT NULL,
                    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                    )";

$pet_sql = "CREATE TABLE pet_info (
                    pet_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    pet_name VARCHAR(150) NOT NULL,
                    animal VARCHAR(150),
                    breed VARCHAR(150),
                    age INT(2),
                    sex VARCHAR(6),
                    is_adopted VARCHAR(6),
                    adopter VARCHAR(150),
                    size VARCHAR(50),
                    color VARCHAR(150),
                    needs_category VARCHAR(50), 
                    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    affectionate INT(3),
                    playful INT(3),
                    friendly INT(3), 
                    energy INT(3),
                    kid_friendly INT(3)
                    )";

$admin_sql = "CREATE TABLE admin_info (
                    admin_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                    firstname VARCHAR(150) NOT NULL,
                    lastname VARCHAR(150) NOT NULL,
                    birthday DATE,
                    gender VARCHAR(150),
                    address VARCHAR(350),
                    phone_number VARCHAR(11),
                    email VARCHAR(150),
                    job_title VARCHAR(150),
                    username VARCHAR(150) NOT NULL UNIQUE,
                    user_password VARCHAR(150) NOT NULL,
                    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                    )";

$donations_sql = "CREATE TABLE donations (
                    firstname VARCHAR(150) NOT NULL,
                    lastname VARCHAR(150) NOT NULL,
                    address VARCHAR(350),
                    phone_number VARCHAR(11),
                    email VARCHAR(150),
                    donation_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                    donated_amount INT(7),
                    recipient VARCHAR(150)
                    )";

$adoption_sql = "CREATE TABLE adoption_info (
                    firstname VARCHAR(150) NOT NULL,
                    lastname VARCHAR(150) NOT NULL,
                    user_id INT(6) UNSIGNED,
                    pet_id INT(6) UNSIGNED,
                    adoption_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
                    )";

if ($conn->query($user_sql)  === TRUE) {
    echo "Tables created successfully!";
} else {
    echo "Error creating user_info table: " . $conn->error;
}

if ($conn->query($pet_sql) === TRUE) {
    echo "pet_info table created successfully!";
} else {
    echo "Error creating pet_info table: " . $conn->error;
}

if ($conn->query($admin_sql)  === TRUE) {
    echo "admin_info table created successfully!";
} else {
    echo "Error creating admin_info table: " . $conn->error;
}
if ($conn->query($donations_sql) === TRUE) {
    echo "donations table created successfully!";
} else {
    echo "Error creating donations table: " . $conn->error;
}

if ($conn->query($adoption_sql) === TRUE) {
    echo "adoption table created successfully!";
} else {
    echo "Error creating adoption table: " . $conn->error;
}

$conn->close();

?>
