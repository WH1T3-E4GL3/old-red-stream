<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){ // Check if user is logged in
    header("location: index.html");
    exit;
}
include 'database.php';
$email = $_SESSION["email"]; // Retrieve user profile information
$sql = "SELECT * FROM credentials WHERE email = '$email'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) { // Output data of each row
?>

<!DOCTYPE html>
<html>
<head>
<title>User Profile</title>
</head>
<body>
    <h1>Welcome <?php echo $row["name"]; ?>!</h1>
    <p>Here's your profile information:</p>
    <ul>
                <li>Name: <?php echo $row["name"]; ?></li>
                <li>Email: <?php echo $row["email"]; ?></li>
                <li>Phone: <?php echo $row["phone"]; ?></li>
                <li>Blood Group: <?php echo $row["bloodgrp"]; ?></li>
                <li>Gender: <?php echo $row["gender"]; ?></li>
                <li>Date of Birth: <?php echo $row["birthdate"]; ?></li>
                <li>Weight: <?php echo $row["weight"]; ?></li>
                <li>Show Mobile: <?php echo $row["showmobile"]; ?></li>
                <li>State: <?php echo $row["state"]; ?></li>
                <li>SMS Alert: <?php echo $row["smsalert"]; ?></li>
                <li>Zipcode: <?php echo $row["zipcode"]; ?></li>
                <li>District: <?php echo $row["district"]; ?></li>
                <li>Area: <?php echo $row["area"]; ?></li>
                <li>Landmark: <?php echo $row["landmark"]; ?></li>
     </ul>
</body>
</html>
<?php
    }
} else {
    echo "0 results";
}
mysqli_close($con);
?>