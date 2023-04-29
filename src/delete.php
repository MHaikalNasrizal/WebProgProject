<?php
/*session_start();
if(isset($_SESSION['username'])){
}else{
echo "<script>alert('Session Ended .Please Login');document.location.href='login.html';</script>";
die();
} */

$servername = "localhost";
$userdb = "root";
$passworddb = "";
$dbname = "database1";
$conn = mysqli_connect($servername, $userdb, $passworddb, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (isset($_POST['delete'])) {
    $id = $_POST['delete'];
    $sql = "DELETE FROM table1 WHERE id_User = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Sucessfully Deleted'); history.back();</script>";

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


}

if (isset($_POST['delete1'])) {
    $id1 = $_POST['delete1'];
    $sql1 = "DELETE FROM category1 WHERE id_Category = $id1";

    if ($conn->query($sql1) === TRUE) {
        echo "<script>alert('Sucessfully Deleted'); document.location.href = 'adminmain1.php';</script>";

    } else {
        echo "Error: " . $sql1 . "<br>" . $conn->error;
    }

}




?>