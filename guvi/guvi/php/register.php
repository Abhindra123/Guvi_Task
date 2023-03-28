<?php
// Set database credentials
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "dummy";
$password = "abi123abi";
$dbname = "guvi";

// Connect to the MySQL database
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$uname = $_POST["uname"];
$email = $_POST["email"];
$pwd = $_POST["pwd"];
$confirmpwd = $_POST["confirmpwd"];

// Validate input fields
if (empty($uname) || empty($email) || empty($pwd) || empty($confirmpwd)) {
    echo "All fields are required!";
    exit;
} else if ($pwd != $confirmpwd) {
    echo "Passwords do not match!";
    exit;
}

// Hash the password before saving to the database
//$hashed_pwd = password_hash($pwd, PASSWORD_DEFAULT);

// Insert data into the MySQL database
$sql = "INSERT INTO register (name, email, pwd) VALUES ('$uname', '$email', '$pwd')";

if (mysqli_query($conn, $sql)) {
    // Return success response
    echo "Data inserted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
