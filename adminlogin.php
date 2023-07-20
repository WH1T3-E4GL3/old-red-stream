<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Check if the form is submitted
    $username = $_POST['username'];
    $password = $_POST['password'];
    $servername = 'localhost';
    $usernameDB = 'root';
    $passwordDB = '';
    $dbname = 'authentication';
    $conn = new mysqli($servername, $usernameDB, $passwordDB, $dbname);
    if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
    }
    $sql = "SELECT * FROM admin WHERE admin_email = ? AND admin_pass = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ss', $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($result->num_rows == 1) {
        $_SESSION['admin_username'] = $username;
        header('Location: admin.html');
        exit();
    } else {
        echo '<h1 style="color: red; background-color: black; padding: 400px; border-radius: 5px; text-align: center;">Invalid username or password. Please try again.</h1>';
    }
    $conn->close();
}
?>