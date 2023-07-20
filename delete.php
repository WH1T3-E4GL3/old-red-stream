<?php
include 'database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Check if form is submitted
    if (isset($_POST['delete'])) { // Check if delete button is clicked
        $id = $_POST['id'];
        $sql = "DELETE FROM credentials WHERE id='$id'";
        if (mysqli_query($con, $sql)) {
            echo "<script>alert('Data deleted successfully');</script>";
        } else {
            echo "<script>alert('Error deleting data: " . mysqli_error($con) . "');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display Data</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Data from Credentials Table</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Blood group</th>
                    <th>Gender</th>
                    <th>Birthdate</th>
                    <th>Weight</th>
                    <th>Show mobile</th>
                    <th>State</th>
                    <th>Sms alert</th>
                    <th>Zip code</th>
                    <th>District</th>
                    <th>Area</th>
                    <th>Landmark</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM credentials";
                $result = mysqli_query($con, $sql);
                if(mysqli_num_rows($result) > 0) {
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>".$row['id']."</td>";
                        echo "<td>".$row['name']."</td>";
                        echo "<td>".$row['email']."</td>";
                        echo "<td>" . $row["phone"] . "</td>";
                        echo "<td>" . $row["bloodgrp"] . "</td>";
                        echo "<td>" . $row["gender"] . "</td>";
                        echo "<td>" . $row["birthdate"] . "</td>";
                        echo "<td>" . $row["weight"] . "</td>";
                        echo "<td>" . $row["showmobile"] . "</td>";
                        echo "<td>" . $row["state"] . "</td>";
                        echo "<td>" . $row["smsalert"] . "</td>";
                        echo "<td>" . $row["zipcode"] . "</td>";
                        echo "<td>" . $row["district"] . "</td>";
                        echo "<td>" . $row["area"] . "</td>";
                        echo "<td>" . $row["landmark"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No data found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <h2>Delete Data</h2>
        <form method="post" action="">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" name="id" placeholder="Enter ID">
            </div>
            <button type="submit" class="btn btn-danger" name="delete">Delete Data</button>
        </form>
    </div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php
mysqli_close($con);
?>