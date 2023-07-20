<!DOCTYPE html>
<html>
<head>
    <title>Data Display Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Registered Donors</h1>
        <div class="table-responsive mt-4">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Blood Group</th>
                        <th>Gender</th>
                        <th>Birthdate</th>
                        <th>Weight</th>
                        <th>Show Mobile</th>
                        <th>State</th>
                        <th>SMS Alert</th>
                        <th>Zipcode</th>
                        <th>District</th>
                        <th>Area</th>
                        <th>Landmark</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mysqli = new mysqli("localhost", "root", "", "authentication");
                    if ($mysqli->connect_error) {
                        die("Connection failed: " . $mysqli->connect_error);
                    }
                    $sql = "SELECT * FROM credentials";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
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
                    $mysqli->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="container mt-5">
        <h1>Recipients Registered blood for an upcoming day</h1>
        <div class="table-responsive mt-4">
            <table class="table table-striped table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Blood Group</th>
                        <th>Gender</th>
                        <th>Birthdate</th>
                        <th>Weight</th>
                        <th>Show Mobile</th>
                        <th>State</th>
                        <th>SMS Alert</th>
                        <th>Zipcode</th>
                        <th>District</th>
                        <th>Area</th>
                        <th>Landmark</th>
                        <th>blood wanted date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $mysqli = new mysqli("localhost", "root", "", "authentication");
                    if ($mysqli->connect_error) {
                        die("Connection failed: " . $mysqli->connect_error);
                    }
                    $sql = "SELECT * FROM upcoming";
                    $result = $mysqli->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["id"] . "</td>";
                            echo "<td>" . $row["name"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
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
                            echo "<td>" . $row["blood_date"] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='15'>No data found</td></tr>";
                    }
                    $mysqli->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper