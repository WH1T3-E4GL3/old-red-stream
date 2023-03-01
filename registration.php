<?php
$connection = mysqli_connect('localhost', 'root'); // Establishes connection to the MySQL server and selects database
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

mysqli_select_db($connection, 'authentication'); //select the database named 'authentication' and connect to ittest.py

// Sanitize and validate user input
$name = mysqli_real_escape_string($connection, htmlentities($_POST['registername']));
$email = filter_var($_POST['registeremail'], FILTER_SANITIZE_EMAIL);
$number = mysqli_real_escape_string($connection, $_POST['registernumber']);
$password = mysqli_real_escape_string($connection, $_POST['registerpassword']);
$bloodgroup = mysqli_real_escape_string($connection, $_POST['registerbloodgroup']);
$birthdate = mysqli_real_escape_string($connection, $_POST['registerbirthdate']);
$gender = mysqli_real_escape_string($connection, $_POST['registergender']);
$weight = mysqli_real_escape_string($connection, $_POST['registerweight']);
$showmobile = mysqli_real_escape_string($connection, $_POST['registershowmobile']);
$smsalert = mysqli_real_escape_string($connection, $_POST['registersmsalert']);
$zipcode = mysqli_real_escape_string($connection, $_POST['registerzipcode']);
$state = mysqli_real_escape_string($connection, $_POST['registerstate']);
$area = mysqli_real_escape_string($connection, $_POST['registerarea']);
$landmarkings = mysqli_real_escape_string($connection, $_POST['registerlandmarks']);

$data = "INSERT INTO credentials (Name, Email, `Mobile-number`, Password, `Blood-group`, Gender, Birthday, Weight, `Show-number`, `Sms-alert`, State, District, Area, Landmarks, `Zip-code`) VALUES ('$name', '$email', '$number', '$password', '$bloodgroup', '$gender', '$birthdate', '$weight', '$showmobile', '$smsalert', '$state', '$area', '$landmarkings', '$zipcode')";

if (mysqli_query($connection, $data)) {
    header('location:signupsuccessful.php');
} else {
    die("Error: " . mysqli_error($connection));
}
?>
