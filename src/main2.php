<?php
session_start();
if ((isset($_SESSION['username'])) && $_SESSION['role'] == 'Participant') {
  $name = $_SESSION['username'];
} else {
  echo "<script>alert('Session Ended .Please Login');document.location.href='Index.html';</script>";
  die();
}
$servername = "localhost";
$userdb = "root";
$passworddb = "";
$dbname = "database1";
$conn = mysqli_connect($servername, $userdb, $passworddb, $dbname);



if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
if (isset($_POST['update'])) {
  $user = $_SESSION['username'];
  $id_update = $_POST['update'];


  $sql = "UPDATE `table1` SET id_Category = '$id_update' WHERE Username='$user'";
  if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Sucessfully Join'); document.location.href = 'main2.php';</script>";

  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

}


$sql = "SELECT * FROM category1 WHERE NOT id_Category=1";
$result = mysqli_query($conn, $sql);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous"><link rel="stylesheet" href="styles.css" />

  <title>Register Category || The Cook-Off Cooking Competition</title>
  
</head>

<body>
  <script>
    function myconfirmed() {
      if (confirm("Are you sure you to Join This Event?") == true) {
      } else {
        return false;
      }
    }
  </script>
  <?php include 'header.php'; ?>
  <div class="container-fluid m-3 bg-light col-3 rounded-2">
    <h1>Event List</h1>
    <div class=lead>User can only join only 1 event</div>
  </div>

  <?php if (mysqli_num_rows($result) > 0) {

    while ($table = mysqli_fetch_array($result, MYSQLI_NUM)) {
      $id = $table[0];
      $Name = $table[1];
      $Quota = $table[2];
      $Dercription = $table[3];

      $sql_count = "SELECT * FROM table1 WHERE id_Category = $id ";
      $count = mysqli_num_rows(mysqli_query($conn, $sql_count));

      ?>


      <div class="row m-3 ">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">
              <?php echo "$Name" ?> Event
            </h5>
            <p class="card-text">
              <?php echo "$Dercription" ?>
            </p>
            <p class="card-text">
              Limit to <strong>
                <?php echo "$Quota" ?>
              </strong> People!
            </p>
            <p class="card-text">
              Participanting : <strong>
                <?php echo "$count" ?>
              </strong>
            </p>
            <?php
            if ($count >= $Quota) {
              echo "<button href='#' class='btn btn-primary' disabled>Full!</button>";
            } else {
              echo "<form method='POST' action='main2.php'><button class='btn btn-primary'name='update'type='submit' onclick='return myconfirmed()' value='$id'>Join Now!</button></form>";
            }

            ?>
          </div>
        </div>
      </div>



      <?php
    }
  } else {
    echo "<h1>No Upcoming/Ongoing Event</h1>";
  }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
</body>

</html>