<?php 
    /*session_start(); 
    if(isset($_SESSION['username'])){
    


    }else{
        echo "<script>alert('Session Ended .Please Login');document.location.href='login.html';</script>";
        die();

    }
    */
    $servername = "localhost";
    $userdb = "root";
    $passworddb = "";
    $dbname = "database1";
    $conn = mysqli_connect($servername,$userdb,$passworddb, $dbname);

    if (!$conn){
        die("Connection failed: " . mysqli_connect_error());
    }
    
    
    $sql = "SELECT * FROM table1 ";
    $result = mysqli_query($conn, $sql);
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <link rel="stylesheet" href="styles.css">

  <title>Admin page</title>

</head>

<body>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
<div class="container-fluid p-0">
  <div class="d-flex flex-column d-flex flex-column flex-shrink-0 p-3 text-white bg-dark p-3 text-white bg-dark position-fixed" style="width: 280px; height: 100vh;">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">

      <span class="fs-4">Admin</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="adminmain.html" class="nav-link active" aria-current="page">

          Home
        </a>
      </li>
      <li>
        <a href="adminmain2.html" class="nav-link text-white">

          View & Search user

        </a>
      </li>
      <li>
        <a href="adminmain3.html" class="nav-link text-white">

          Add Category
        </a>
      </li>
      <li>
        <a href="adminmain4.html" class="nav-link text-white">

          Set quota
        </a>
      </li>
    </ul>
    <hr>
    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
        data-bs-toggle="dropdown" aria-expanded="false">

        <strong>mdo</strong>
      </a>
      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1" style="">

        <li><a class="dropdown-item" href="#">Sign out</a></li>
      </ul>
    </div>
  </div>
  
  <div class="container p-3">
    <h1>List of Registered User</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">id_book</th>
          <th scope="col">title</th>
          <th scope="col">author</th>
          <th scope="col">published_date</th>
          <th scope="col">id_member (Added by/Last updated)</th>
          <th scope="col">Update</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
      <tbody>
        <?php 
          while($table = mysqli_fetch_array($result,MYSQLI_NUM)){
            $book = $table[0];
            $title = $table[1];
            $author = $table[2];
            $published = $table[3];
            $member = $table[4];

            echo"<tr>";
            echo "<td>$book</td>";
            echo "<td>$title</td>";
            echo "<td>$author</td>";
            echo "<td>$published</td>";
            echo "<td>$member</td>";
            echo "<td><form method='POST' action='update.php'><button name='update'type='submit' value='$book'>Update</button></form></td>";
            echo "<td><form method='POST' action='delete.php'><button name='delete'type='submit' onclick='return myconfirmed()' value='$book'>Delete</button></form></td>";
            echo"</tr>";
        
          }      
        ?>
      </tbody>
    </table>
  </div>
</div>

</body>

</html>