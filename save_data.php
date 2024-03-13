<?php
// Assuming you have already established a connection to your MySQL database
// and you have sanitized and validated the input data.
// Replace 'your_host', 'your_username', 'your_password', and 'your_database' with your actual database credentials.

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'your_database';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = $_POST['data'];

$sql = "INSERT INTO your_table_name (column_name) VALUES ('$data')";

if ($conn->query($sql) === TRUE) {
    echo "Data saved successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
