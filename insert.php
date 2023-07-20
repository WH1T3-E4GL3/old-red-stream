<?php
include 'database.php';
if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Check if form is submitted
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $passwd = $_POST['passwd'];
    $bloodgrp = $_POST['bloodgrp'];
    $gender = $_POST['gender'];
    $birthdate = $_POST['birthdate'];
    $weight = $_POST['weight'];
    $showmobile = $_POST['showmobile'];
    $state = $_POST['state'];
    $smsalert = $_POST['smsalert'];
    $zipcode = $_POST['zipcode'];
    $district = $_POST['district'];
    $area = $_POST['area'];
    $landmark = $_POST['landmark'];
    $sql = "INSERT INTO credentials (id, name, email, phone, passwd, bloodgrp, gender, birthdate, weight, showmobile, state, smsalert, zipcode, district, area, landmark) VALUES ('$id', '$name', '$email', '$phone', '$passwd', '$bloodgrp', '$gender', '$birthdate', '$weight', '$showmobile', '$state', '$smsalert', '$zipcode', '$district', '$area', '$landmark')";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Data inserted successfully');</script>";
    } else {
        echo "<script>alert('Error inserting data: " . mysqli_error($con) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Insert Data</title>
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
                        echo "<td>" . $row['id']."</td>";
                        echo "<td>" . $row['name']."</td>";
                        echo "<td>" . $row['email']."</td>";
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
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No data found</td></tr>";
                }
                ?>
            </tbody>
        </table>
    <div class="container mt-5">
        <h1>Insert Data into Credentials Table</h1>
        <form method="post" action="">
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" name="id" placeholder="Enter ID">
            </div>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email">
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone">
            </div>
            <div class="form-group">
                <label for="passwd">Password</label>
                <input type="password" class="form-control" id="passwd" name="passwd" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <label for="bloodgrp">Blood Group</label>
                <input type="text" class="form-control" id="bloodgrp" name="bloodgrp" placeholder="Enter Blood Group">
            </div>
            <div class="form-group">
                <label for="gender">Gender</label>
                <select class="form-control" id="gender" name="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>
            <div class="form-group">
                <label for="birthdate">Birthdate</label>
                <input type="date" class="form-control" id="birthdate" name="birthdate">
            </div>
            <div class="form-group">
                <label for="weight">Weight</label>
                <input type="number" class="form-control" id="weight" name="weight" placeholder="Enter Weight">
            </div>
            <div class="form-group">
                <label for="showmobile">Show Mobile</label>
                <input type="checkbox" class="form-control" id="showmobile" name="showmobile">
            </div>
            <div class="form-group">
                <label for="state">State</label>
                <input type="text" class="form-control" id="state" name="state" placeholder="Enter State">
            </div>
            <div class="form-group">
                <label for="smsalert">SMS Alert</label>
                <input type="checkbox" class="form-control" id="smsalert" name="smsalert">
            </div>
            <div class="form-group">
                <label for="zipcode">Zipcode</label>
                <input type="text" class="form-control" id="zipcode" name="zipcode" placeholder="Enter Zipcode">
            </div>
            <div class="form-group">
                <label for="district">District</label>
                <input type="text" class="form-control" id="district" name="district" placeholder="Enter District">
            </div>
            <div class="form-group">
                <label for="area">Area</label>
                <input type="text" class="form-control" id="area" name="area" placeholder="Enter Area">
            </div>
            <div class="form-group">
                <label for="landmark">Landmark</label>
                <input type="text" class="form-control" id="landmark" name="landmark" placeholder="Enter Landmark">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>