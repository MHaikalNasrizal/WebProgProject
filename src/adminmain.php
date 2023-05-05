<?php
session_start();
// Check if user is logged in
if ((isset($_SESSION['username'])) && $_SESSION['role'] == 'Admin') {
} else {
  echo "<script>alert('Session Ended .Please Login');document.location.href='Index.html';</script>";
  die();
}

$name = $_SESSION['username'];
$servername = "localhost";
$userdb = "root";
$passworddb = "";
$dbname = "database1";
$conn = mysqli_connect($servername, $userdb, $passworddb, $dbname);

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


$sql = 

"SELECT table1.id_User,table1.Username,table1.Email, table1.Role, table1.phone, table1.age, table1.address, table1.occupation, category1.Category 
FROM table1 LEFT JOIN category1 
ON table1.id_Category = category1.id_Category ;";

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

  <title>Admin Page || The Cook-Off Cooking Competition</title>
</head>

<body class="d-flex flex-nowrap">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <script>
    function myconfirmed() {
      if (confirm("Are you sure you want to Delete?") == true) {
      } else {
        return false;
      }
    }
  </script>

  <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark " style="width: 280px; min-height: 100vh;">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <span class="fs-4">Admin</span>
    </a>

    <hr />

    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="adminmain.php" class="nav-link active" aria-current="page">Home</a>
      </li>
      <li>
        <a href="adminmain2.php" class="nav-link text-white">View & Search user</a>
      </li>
      <li>
        <a href="adminmain3.php" class="nav-link text-white">Add Category</a>
      </li>
      <li>
        <a href="adminmain4.php" class="nav-link text-white">Set & Edit Quota</a>
      </li>
    </ul>

    <hr />

    <div class="dropdown">
      <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1"
        data-bs-toggle="dropdown" aria-expanded="false">
        <strong>
          <?php echo $name; ?>
        </strong>
      </a>

      <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
        <li><a class="dropdown-item" href="logout.php">Sign out</a></li>
      </ul>
    </div>
  </div>

  <div class="container-fluid m-3 p-3 rounded-3 border shadow-lg">
    <div>
      <?php if (mysqli_num_rows($result) > 0) { ?>
        <h1>List of Registered User</h1>
        <table class="table">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Username</th>
              <th scope="col">Email</th>
              <th scope="col">Role</th>
              <th scope="col">Category</th>
              <th scope="col">View Details</th>
              <th scope="col">Delete</th>
            </tr>
          </thead>

          <tbody>
            <?php

            while ($table = mysqli_fetch_array($result, MYSQLI_NUM)) {
              $id = $table[0];
              $username = $table[1];
              $email = $table[2];
              $Role = $table[3];
              $phone = $table[4];
              $age = $table[5];
              $address = $table[6];
              $occupation = $table[7];
              $Category = $table[8];

              /*
              "SELECT table1.id_User,table1.Username,table1.Email, table1.Role, table1.phone, table1.age, table1.address, table1.occupation, category1.Category 
              FROM table1 LEFT JOIN category1 
              ON table1.id_Category = category1.id_Category ;";
              */

              echo "<tr>";
              echo "<td>$id</td>";
              echo "<td>$username</td>";
              echo "<td>$email</td>";
              echo "<td>$Role</td>";
              echo "<td>$Category</td>";
              echo "<td><button class='btn btn-secondary'name='update'type='submit' data-bs-toggle='modal' data-bs-target='#exampleModal$id' value='$id'>View</button></form></td>";
              echo "<td><form method='POST' action='delete.php'><button class='btn btn-danger'name='delete'type='submit' onclick='return myconfirmed()' value='$id'>Delete</button></form></td>";
              echo "</tr>";


              ?>

              <div class="modal fade" id="exampleModal<?php echo $id; ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">View User Details</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                      <div class="row m-3">
                        <strong>User Id:</strong>
                        <p>
                          <?php echo "$table[0]"; ?>
                        </p>
                      </div>
                      <div class="row m-3">
                        <strong>Username :</strong>
                        <p>
                          <?php echo "$table[1]"; ?>
                        </p>
                      </div>
                      <div class="row m-3">
                        <strong>Email :</strong>
                        <p>
                          <?php echo "$table[2]"; ?>
                        </p>
                      </div>
                      <div class="row m-3">
                        <strong>Role :</strong>
                        <p>
                          <?php echo "$table[3]"; ?>
                        </p>
                      </div>
                      <div class="row m-3">
                        <strong>Phone :</strong>
                        <p>
                          <?php echo "$table[4]"; ?>
                        </p>
                      </div>
                      <div class="row m-3">
                        <strong>Age :</strong>
                        <p>
                          <?php echo "$table[5]"; ?>
                        </p>
                      </div>
                      <div class="row m-3">
                        <strong>Address :</strong>
                        <p>
                          <?php echo "$table[6]"; ?>
                        </p>
                      </div>
                      <div class="row m-3">
                        <strong>Occupation :</strong>
                        <p>
                          <?php echo "$table[7]"; ?>
                        </p>
                      </div>
                      <div class="row m-3">
                        <strong>Category :</strong>
                        <p>
                          <?php echo "$table[8]"; ?>
                        </p>
                      </div>
                      <div class="row m-3">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <?php
            }
      }
      ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>