<?php 
    $servername = "localhost";
    $userdb = "root";
    $passworddb = "";
    $dbname = "database1";
    $conn = mysqli_connect($servername,$userdb,$passworddb, $dbname);

    if (!$conn){
     die("Connection failed: " . mysqli_connect_error());
    }

    $username=$_POST['username'];
    $pwd=md5($_POST['password']);
    $email=$_POST['email'];

    $sql = "SELECT * FROM table1 WHERE Username ='$username'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result)>0){
        echo "<script>if(confirm('Unsucessfully Register. Username has been taken')){document.location.href='register.html'};</script>";
    }else{
        $sql = "INSERT INTO `table1`(`Username`,`Password`,`Email`,`Role`,`Category`) VALUES('$username','$pwd','$email','Participant','N/A') ";
        if ($conn->query($sql) === TRUE) {
            echo "<script>if(confirm('Sucessfully Register. Now Login')){document.location.href='index.html'};</script>";
        
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }  
        $conn->close();

    }

?>