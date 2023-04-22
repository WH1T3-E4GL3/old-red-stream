<?php
include 'database.php';

if(isset($_POST['submit'])) {
    #This is necessary for finding donors
    $bloodgroup=$_POST['findbloodgroup'];


    $sql = "SELECT * FROM credentials WHERE bloodgrp='$bloodgroup'";
    $result = mysqli_query($con, $sql);
    
    if(mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            // Do something with the row data, e.g. display it on the page
            echo "Name: " . $row["name"] . "<br>";
            echo "Blood Group: " . $row["bloodgrp"] . "<br>";
            echo "State: " . $row["state"] . "<br>";
            echo "City: " . $row["area"] . "<br>";
            // etc.
        }
    } else {
        // Handle case where no matching donors were found
        echo "No donors found.";
    }
}
?>    
