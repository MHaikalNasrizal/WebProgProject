<?php
// Start session
session_start();

// Check if user is logged in
if ((isset($_SESSION['username'])) && $_SESSION['role'] == 'Participant') {
} else {
  echo "<script>alert('Session Ended .Please Login');document.location.href='Index.html';</script>";
  die();
}

$conn = mysqli_connect("localhost", "root", "", "database1");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user details from database
$username = $_SESSION['username'];

$sql = 
"SELECT table1.id_User, table1.Username, table1.Email, table1.Role, table1.age, table1.phone, table1.gender, 
table1.address, table1.occupation, category1.id_Category, category1.Category 
FROM table1 JOIN category1 
ON table1.id_Category = category1.id_Category 
WHERE Username = '$username';";

$result = mysqli_query($conn, $sql);

// Check if user exists in database
if (mysqli_num_rows($result) == 0) {
    echo "User not found.";
    exit;
}

// Fetch user data
$row = mysqli_fetch_assoc($result);
$id = $row['id_User'];
$username = $row['Username'];
$email = $row['Email'];
$role = $row['Role'];
$age = $row['age'];
$gender = $row['gender'];
$phone = $row['phone'];
$address = $row['address'];
$occupation = $row['occupation'];
$category = $row['Category'];
?>

<!DOCTYPE html>
<html>

<head>
    <title>View Profile || The Cook-Off Cooking Competition</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"><link rel="stylesheet" href="styles.css" />
    
</head>

<body>
    <?php include 'header.php'; ?>
    <div class="container mt-5">
    <div class="bg-light p-5 rounded-5 border border-dark shadow">
        <h1>View Profile</h1>
        <hr>
        <div class="row">
            <div class="col-sm-3">
                <strong>User ID:</strong>
            </div>
            <div class="col-sm-9">
                <?php echo $id; ?>
            </div>
        </div>
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
                <strong>Phone:</strong>
            </div>
            <div class="col-sm-9">
                <?php echo $phone; ?>
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
        <div class="row">
            <div class="col-sm-3">
                <strong>Category:</strong>
            </div>
            <div class="col-sm-9">
                <?php echo $category; ?>
            </div>
        </div>
        <div class="row">
            <form method="get" action="editprofile.php">
            <div class="mb-3 p-4 text-center">
                <button type="submit" class="btn btn-primary">Edit Profile</button>
            </div>
        </div>
    </form>
        </div>
    </div>


    

</body>

</html>