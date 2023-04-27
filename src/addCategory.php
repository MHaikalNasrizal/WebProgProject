<?php 
    $servername = "localhost";
    $userdb = "root";
    $passworddb = "";
    $dbname = "database1";
    $conn = mysqli_connect($servername,$userdb,$passworddb, $dbname);

    if (!$conn){
     die("Connection failed: " . mysqli_connect_error());
    }

    $Category=$_POST['category'];
    $Quota=$_POST['quota'];
    $Descrip=$_POST['description'];

    $sql = "INSERT INTO `category1`(`Category`,`CategoryQuota`,`Descrip`) VALUES('$Category','$Quota','$Descrip') ";
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Sucessfully Added Category');document.location.href='adminmain3.php';</script>";
        
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }  
?>