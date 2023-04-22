<?php
include 'database.php';

if(isset($_POST['submit'])) {
    $name=$_POST['regsitername'];
    $email=$_POST['registeremail'];
    $number=$_POST['registernumber'];
    $password=$_POST['registerpassword'];
    $bloodgroup=$_POST['registerbloodgroup'];
    $gender=$_POST['registergender'];
    $birthdate=$_POST['registerbirthdate'];
    $weight=$_POST['registerweight'];
    $showmobile=$_POST['registershowmobile'];
    $state=$_POST['registerstate'];
    $smsalert=$_POST['registersmsalert'];
    $zipcode=$_POST['registerzipcode'];
    $district=$_POST['registerdistrict'];
    $area=$_POST['registerarea'];
    $landmarks=$_POST['registerlandmarks'];
    
    // Check if email already exists in database
    $email_check_query = "SELECT * FROM credentials WHERE email='$email' LIMIT 1";
    $result = mysqli_query($con, $email_check_query);
    $user = mysqli_fetch_assoc($result);
    $email_exists = false;
    if ($user) { // If email exists, set flag to true
        $email_exists = true;
        echo "<script>alert('This email address is already registered')</script>";
        echo "<script>window.open('registration.php','_self')</script>"; // Redirect to the same registration page if registration fails
    }

    if (!$email_exists) {
        $sql="INSERT INTO credentials(name,email,phone,passwd,bloodgrp,gender,birthdate,weight,showmobile,state,smsalert,zipcode,district,area,landmark) VALUES('$name','$email','$number','$password','$bloodgroup','$gender','$birthdate','$weight','$showmobile','$state','$smsalert','$zipcode','$district','$area','$landmarks')";
    
        if(mysqli_query($con,$sql)) {
            echo "<script>alert('Registration Successfull')</script>";
            header('location:signupsuccess.php'); // Redirect to signed up success page
        } else {
            echo "Error:".mysqli_error($con);
        }
    }

    mysqli_close($con);
}
?>
