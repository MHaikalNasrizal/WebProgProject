<?php
    session_start();
    $servername = "localhost";
    $userdb = "root";
    $passworddb = "";
    $dbname = "database1";
    $conn = mysqli_connect($servername,$userdb,$passworddb, $dbname);
 
 
    if (!$conn){
      die("Connection failed: " . mysqli_connect_error());
    }
 
 
    $username=$_POST['username'];
    $pwd=$_POST['password'];

    echo 'Name: '.$username;

    echo '<br>Age:  '.$pwd;




    $sql = "SELECT * FROM table1 WHERE `Username` ='$username' AND `Role` = 'Admin' AND `Password` ='".md5($pwd)."' ";
    $result1 = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result1)>0){
        header("Location:http://localhost/ProjectWeb/WebProgProject/adminmain.html");
        $_SESSION['username'] = $username;
    }

    $sql = "SELECT * FROM table1 WHERE `Username` ='$username' AND `Role` = 'Participant' AND `Password` ='".md5($pwd)."' ";
    $result2 = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result2)>0){
        header("Location:http://localhost/ProjectWeb/WebProgProject/main.html");
        $_SESSION['username'] = $username;
    }



 
?>