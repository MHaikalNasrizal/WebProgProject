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
$conn = mysqli_connect($servername, $userdb, $passworddb, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT * FROM category1";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link rel="stylesheet" href="styles.css" />

  <title>Main</title>
</head>

<body>
  <header class="top-fixed">
    <div class="px-3 py-2 bg-dark">
      <div class="container">
        <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
          <a href="#" class="d-flex align-items-center my-2 my-lg-0 me-lg-auto text-white text-decoration-none">
            <img src="../public/logo.png" alt="logo" width="100" height="100" />
          </a>
          <ul class="nav col-12 col-lg-auto my-2 justify-content-center my-md-0 text-small">
            <li>
              <a href="main.php" class="nav-link text-white"> Main </a>
            </li>
            <li>
              <a href="main2.php" class="nav-link text-white active">
                Register Category
              </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white"> View/Edit Profile </a>
            </li>
            <li>
              <a href="#" class="nav-link text-white"> Log-out</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </header>
  <?php if (mysqli_num_rows($result) > 0) {

    while ($table = mysqli_fetch_array($result, MYSQLI_NUM)) {
      $id = $table[0];
      $Name = $table[1];
      $Quota = $table[2];
      $Dercription = $table[3];




      ?>

      <div class="row m-3">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">
              <?php echo "$Name" ?> Event
            </h5>
            <p class="card-text">
              <?php echo "$Dercription" ?>
            </p>
            <a href="#" class="btn btn-primary">Join Now!</a>
          </div>
        </div>
      </div>



      <?php
    }
  } else {
    echo "<h1>No Upcoming/Ongoing Event</h1>";
  }
  ?>
</body>

</html>