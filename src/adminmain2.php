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
    
    if(isset($_POST['search'])){
      
    }else{

    }
    $value=$_POST['search'];
    
    $sql = "SELECT * FROM table1 WHERE `Username` LIKE '%$value%' ";
    $result = mysqli_query($conn, $sql);

   
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="styles.css" />

    <title>Admin page</title>
  </head>

  <body class="d-flex flex-nowrap">
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
      crossorigin="anonymous"
    ></script>
    <div
      class="d-flex flex-column d-flex flex-column flex-shrink-0 p-3 text-white bg-dark p-3 text-white bg-dark "
      style="width: 280px; height: 100vh"
    >
      <a
        href="#"
        class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none"
      >
        <span class="fs-4">Admin</span>
      </a>
      <hr />
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="adminmain.php" class="nav-link text-white"> Home </a>
        </li>
        <li>
          <a href="adminmain2.php" class="nav-link active" aria-current="page">
            View & Search user
          </a>
        </li>

        <li>
          <a href="adminmain3.php" class="nav-link text-white">
            Add Category
          </a>
        </li>
        <li>
          <a href="adminmain4.php" class="nav-link text-white"> Set quota </a>
        </li>
      </ul>
      <hr />
      <div class="dropdown">
        <a
          href="#"
          class="d-flex align-items-center text-white text-decoration-none dropdown-toggle"
          id="dropdownUser1"
          data-bs-toggle="dropdown"
          aria-expanded="false"
        >
          <strong>mdo</strong>
        </a>
        <ul
          class="dropdown-menu dropdown-menu-dark text-small shadow"
          aria-labelledby="dropdownUser1"
          style=""
        >
          <li><a class="dropdown-item" href="#">Sign out</a></li>
        </ul>
      </div>
    </div>
    <div class="container offset-2 p-3">
      <h1>Search User</h1>
      <form action="adminmain2.php" method="POST">
        <input id="search" name="search" type="text" placeholder="Type here">
        <input id="submit" type="submit" value="Search">
      </form>
    </div>
  </body>
</html>