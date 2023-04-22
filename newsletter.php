<?php
include 'database.php';
if(isset($_POST['submit']))
{

$newsletteremail=$_POST['footeremail'];
$newsletter_sql="INSERT INTO newsletter (news_email) VALUES ('$newsletteremail')"; #news letter subscription

if(mysqli_query($con,$newsletter_sql))
    {
        echo "<script>alert('Newsletter subscription successful')</script>";
    }
    else
    {
        echo "Error:".mysqli_error($con);
    }
}