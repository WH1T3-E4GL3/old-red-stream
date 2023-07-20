<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "authentication";
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$name = $_POST['fullname'];
$email = $_POST['email'];
$phone = $_POST['mobile'];
$passwd = $_POST['password'];
$bloodgrp = $_POST['bloodgroup'];
$gender = $_POST['gender'];
$birthdate = $_POST['birthdate'];
$weight = $_POST['weight'];
$showmobile = isset($_POST['showmobile']) ? 1 : 0;
$state = $_POST['state'];
$smsalert = isset($_POST['smsalert']) ? 1 : 0;
$zipcode = $_POST['zipcode'];
$district = $_POST['district'];
$area = $_POST['area'];
$landmark = $_POST['landmarks'];
$blooday = $_POST['booddate'];
$sql = "INSERT INTO upcoming (name, email, phone, passwd, bloodgrp, gender, birthdate, weight, showmobile, state, smsalert, zipcode, district, area, landmark, blood_date)
VALUES ('$name', '$email', '$phone', '$passwd', '$bloodgrp', '$gender', '$birthdate', '$weight', '$showmobile', '$state', '$smsalert', '$zipcode', '$district', '$area', '$landmark', '$blooday')";
if (mysqli_query($conn, $sql)) {
    echo '<h1 style="color: green; background-color: #343634; padding: 400px; border-radius: 5px; text-align: center;">You are successfully registered for getting blood for an upcoming day, we will contact you for confirmation as soon as possible.</h1>';
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);
?>