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
    $pwd=$_POST['password'];
    $email=$_POST['email'];

    $sql = "INSERT INTO `table1`(`Username`,`Password`,`Email`,`Role`,`Category`) VALUES('$username','$pwd','$email','Participant','N/A') ";
    if ($conn->query($sql) === TRUE) {
        echo "<script>if(confirm('Sucessfully Register. Now Login')){document.location.href='index.html'};</script>";
        //header("Location:http://localhost/ProjectWeb/WebProgProject/index.html");
        
        
        
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      
      $conn->close();
      

?>