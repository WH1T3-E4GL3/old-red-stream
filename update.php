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
    $sql = "UPDATE credentials SET name='$name', email='$email', phone='$phone', bloodgrp='$bloodgrp', gender='$gender', birthdate='$birthdate', weight='$weight', showmobile='$showmobile', state='$state', smsalert='$smsalert', zipcode='$zipcode', district='$district', area='$area', landmark='$landmark' WHERE id='$id'";
    if (mysqli_query($con, $sql)) {
        echo "<script>alert('Data updated successfully');</script>";
    } else {
        echo "<script>alert('Error updating data: " . mysqli_error($con) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Display Data</title>
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
                    }
                } else {
                    echo "<tr><td colspan='15'>No data found</td></tr>";
                }
                ?>
            </tbody>
        </table>
        <h1>Update Data</h1>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="id">ID</label>
                    <input type="text" class="form-control" id="id" name="id" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="phone">Phone</label>
                    <input type="text" class="form-control" id="phone" name="phone" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="passwd">Password</label>
                    <input type="password" class="form-control" id="passwd" name="passwd" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="bloodgrp">Blood Group</label>
                    <input type="text" class="form-control" id="bloodgrp" name="bloodgrp" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="gender">Gender</label>
                    <select id="gender" class="form-control" name="gender" required>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Other">Other</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="birthdate">Birthdate</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="weight">Weight</label>
                    <input type="text" class="form-control" id="weight" name="weight" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="showmobile">Show Mobile</label>
                    <select id="showmobile" class="form-control" name="showmobile" required>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="smsalert">SMS Alert</label>
                    <select id="smsalert" class="form-control" name="smsalert" required>
                        <option value="Yes">Yes</option>
                        <option value="No">No</option>
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="zipcode">Zip Code</label>
                    <input type="text" class="form-control" id="zipcode" name="zipcode" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="district">District</label>
                    <input type="text" class="form-control" id="district" name="district" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="area">Area</label>
                    <input type="text" class="form-control" id="area" name="area" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="landmark">Landmark</label>
                    <input type="text" class="form-control" id="landmark" name="landmark" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="update">Update</button>
        </form>
    </div>
</body>
</html>