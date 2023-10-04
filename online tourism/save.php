<?php
$servername = "localhost";
$username = "root"; // default XAMPP username
$password = ""; // default XAMPP password is empty
$dbname = "personal_details";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['age'])) {
    $stmt = $conn->prepare("INSERT INTO details (name, email, age) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $_POST['name'], $_POST['email'], $_POST['age']);

    if ($stmt->execute()) {
        header('Location: view.php');
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}

$conn->close();
?>

