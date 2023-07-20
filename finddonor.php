<?php
include 'database.php';
if(isset($_POST['submit'])) {
    $bloodgroup=$_POST['bloodtype'];
    $sql = "SELECT * FROM credentials WHERE bloodgrp='$bloodgroup'";
    $result = mysqli_query($con, $sql);
    if(mysqli_num_rows($result) > 0) {
        echo "<h1>Matching Donors:</h1>";
        echo "<table style='border-collapse: collapse; width: 50%;'>";
        echo "<thead>";
        echo "<tr style='background-color: #343a40; color:white;'>";
        echo "<th style='border: 1px solid black; padding: 18px; text-align: left;'>Name</th>";
        echo "<th style='border: 1px solid black; padding: 18px; text-align: left;'>Blood Group</th>";
        echo "<th style='border: 1px solid black; padding: 18px; text-align: left;'>Gender</th>";
        echo "<th style='border: 1px solid black; padding: 18px; text-align: left;'>Phone</th>";
        echo "<th style='border: 1px solid black; padding: 18px; text-align: left;'>State</th>";
        echo "<th style='border: 1px solid black; padding: 18px; text-align: left;'>Area</th>";
        //echo "<th style='border: 1px solid black; padding: 18px; text-align: left;'>Availabe</th>";
        echo "</tr>";
        echo "</thead>";
        echo "<tbody>";
        $count = 0; // initialize count variable
        while($row = mysqli_fetch_assoc($result)) {
            $bg_color = ($count % 2 == 0) ? 'white' : ' #dee2e6';
            echo "<tr style='border: 1px solid black; background-color: $bg_color;'>";
            echo "<td style='border: 1px solid black; padding: 18px;'>" . $row["name"] . "</td>";
            echo "<td style='border: 1px solid black; padding: 18px;'>" . $row["bloodgrp"] . "</td>";
            echo "<td style='border: 1px solid black; padding: 18px;'>" . $row["gender"] . "</td>";
            echo "<td style='border: 1px solid black; padding: 18px;'>" . $row["phone"] . "</td>";
            echo "<td style='border: 1px solid black; padding: 18px;'>" . $row["state"] . "</td>";
            echo "<td style='border: 1px solid black; padding: 18px;'>" . $row["area"] . "</td>";
            //missing row...need to add available or not option
            echo "</tr>";
            $count++; // increment count variable
        }
        echo "</tbody>";
        echo "</table>";
        echo"<h2><b>Please note that</b></h2><h3>these are the persons which are registered in our website as willing donors themselfs. You can contact them directly by the contact informations provided by them.</h3>";
    } else {
        // Handle case where no matching donors were found
        echo '<h1 style="color: red; background-color: black; padding: 400px; border-radius: 5px; text-align: center;">We Are Sorry !!<br>Currently there are no donors available for this blood group</h1>';
    }
}
?>