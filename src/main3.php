<?php
// Start session
session_start();

// Check if user is logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$conn = mysqli_connect("localhost", "root", "", "database1");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user details from database
$username = $_SESSION['username'];
$sql = "SELECT Username, Email, Role, age, gender, address, occupation FROM table1 WHERE Username = '$username'";
$result = mysqli_query($conn, $sql);

// Check if user exists in database
if (mysqli_num_rows($result) == 0) {
    echo "User not found.";
    exit;
}

// Fetch user data
$row = mysqli_fetch_assoc($result);
$username = $row['Username'];
$email = $row['Email'];
$role = $row['Role'];
$age = $row['age'];
$gender = $row['gender'];
$address = $row['address'];
$occupation = $row['occupation'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Profile</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        crossorigin="anonymous">

</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
        <h1>View Profile</h1>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <strong>Username:</strong>
            </div>
            <div class="col-sm-9">
                <?php echo $username; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <strong>Email:</strong>
            </div>
            <div class="col-sm-9">
                <?php echo $email; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <strong>Role:</strong>
            </div>
            <div class="col-sm-9">
                <?php echo $role; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <strong>Age:</strong>
            </div>
            <div class="col-sm-9">
                <?php echo $age; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <strong>Gender:</strong>
            </div>
            <div class="col-sm-9">
                <?php echo $gender; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <strong>Address:</strong>
            </div>
            <div class="col-sm-9">
                <?php echo $address; ?>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <strong>Occupation:</strong>
            </div>
            <div class="col-sm-9">
                <?php echo $occupation; ?>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
        crossorigin="anonymous"></script>
    <form method="get" action="editprofile.php">
        <div class="mb-3 p-4 text-center">
            <button type="submit" class="btn btn-primary">Edit Profile</button>
        </div>

    </form>

</body>

</html>