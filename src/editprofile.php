<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />

    <link rel="stylesheet" href="styles.css" />

    <title>Edit Profile</title>
</head>

<body>
    <?php
    session_start();
    // Check if user is logged in
    if (isset($_SESSION['username'])) {
        // Connect to database
        $conn = mysqli_connect("localhost", "root", "", "database1");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        // Retrieve user data from database
        $username = $_SESSION['username'];
        $sql2 = "SELECT * FROM category1";
        $sql = "SELECT * FROM table1 WHERE username='$username'";
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);
        $row = mysqli_fetch_assoc($result);

        // Set default values for form inputs
        $username_val = $row['Username'];
        $Email_val = $row['Email'];
        $gender_val = $row['gender'];
        $age_val = $row['age'];
        $address_val = $row['address'];
        $occupation_val = $row['occupation'];



        // Handle form submission
        if (isset($_POST['submit'])) {
            // Retrieve updated form inputs
            $Email_val = $_POST['Email'];
            $gender_val = $_POST['gender'];
            $age_val = $_POST['age'];
            $category_val = $_POST['category'];
            $address_val = $_POST['address'];
            $occupation_val = $_POST['occupation'];

            // Update user data in database
            $sql = "UPDATE table1 SET Email='$Email_val', address = '$address_val', gender='$gender_val', age='$age_val', occupation='$occupation_val', id_Category='$category_val' WHERE username='$username'";
            if (mysqli_query($conn, $sql)) {
                echo "Profile updated successfully";
            } else {
                echo "Error updating profile: " . mysqli_error($conn);
            }
        }
    } else {
        // Redirect to login page if user is not logged in
        header("Location: login.php");
    }
    ?>
    <?php include 'header.php'; ?>
    <div class="container p-4">
        <h1>Edit Profile</h1>
        <form method="post" action="editprofile.php">
            <label>Username:</label>
            <input class="form-control" type="text" value="<?php echo $username_val ?>" readonly><br>

            <label>Email:</label>
            <input class="form-control" type="Email" name="Email" value="<?php echo $Email_val ?>" required><br>

            <label>gender:</label>
            <br>
            <label>Male</label>
            <input class="form-check" type="radio" name="gender" value="Male" <?php if ($gender_val == 'Male')
                echo 'checked' ?>required>
                <label>Female</label>
                <input class="form-check" type="radio" name="gender" value="Female" <?php if ($gender_val == 'Female')
                echo 'checked' ?> required><br>

                <label>Age:</label>
                <input class="form-control" type="number" name="age" value="<?php echo $age_val ?>" required><br>

            <label>Address:</label>
            <input class="form-control" type="text" name="address" value="<?php echo $address_val ?>"><br>

            <label>Category:</label>
            <select class="form-control" name="category">
                <?php

                if (mysqli_num_rows($result2) > 0) {

                    while ($table = mysqli_fetch_array($result2, MYSQLI_NUM)) {
                        $id = $table[0];
                        $Name = $table[1];
                        $Quota = $table[2];

                        $sql_count = "SELECT * FROM table1 WHERE id_Category = $id ";
                        $count = mysqli_num_rows(mysqli_query($conn, $sql_count));

                        if ($count >= $Quota) {
                            echo "<option value='1' disabled>$Name -Full-</option>";
                        } else {
                            echo "<option value='$id'>$Name</option>";
                        }

                    }
                }
                ?>
            </select>

            <label>Occupation:</label>
            <input class="form-control" type="text" name="occupation" value="<?php echo $occupation_val ?>"><br>

            <div class="col d-flex justify-content-center">
                <input class="btn btn-primary" type="submit" name="submit" value="Update Profile">
            </div>

        </form>
        <form method="get" action="main3.php">
            <div class="mb-3 p-4 text-center">
                <button type="submit" class="btn btn-primary">Back to Profile</button>
            </div>

        </form>

    </div>


</body>

</html>