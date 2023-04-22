<?php
include 'database.php';

if(isset($_POST['submit'])) {
    $email=$_POST['loginusername'];
    $password=$_POST['loginpassword'];
    $sql="select * from credentials where email='$email' and passwd='$password' ";
    $que=mysqli_query($con,$sql);
    if(mysqli_num_rows($que)>0)
    {
        echo "<script>alert('login ok')</script>";
        echo "<script>window.open('signupsuccess.php','_self')</script>";
    }
    else{
        echo "<script>alert('wrong username and password')</script>";
        echo "<script>window.open('index.html','_self')</script>";
    }
}

?>
