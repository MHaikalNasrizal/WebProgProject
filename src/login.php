<?php
session_start();
$servername = "localhost";
$userdb = "root";
$passworddb = "";
$dbname = "database1";
$conn = mysqli_connect($servername, $userdb, $passworddb, $dbname);


if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$username = $_POST['username'];
$pwd = $_POST['password'];

$sql = "SELECT * FROM table1 WHERE `Username` ='$username' AND `Role` = 'Admin' AND `Password` ='" . md5($pwd) . "' ";
$result1 = mysqli_query($conn, $sql);

if (mysqli_num_rows($result1) > 0) {
    header("Location:adminmain.php");
    $_SESSION['username'] = $username;
    $_SESSION['role'] = 'Admin';
}

$sql = "SELECT * FROM table1 WHERE `Username` ='$username' AND `Role` = 'Participant' AND `Password` ='" . md5($pwd) . "' ";
$result2 = mysqli_query($conn, $sql);

if (mysqli_num_rows($result2) > 0) {
    header("Location:main.php");
    $_SESSION['username'] = $username;
    $_SESSION['role'] = 'Participant';
}


echo "<script>alert('Wrong Username Or Password');document.location.href='index.html';</script>";

?>