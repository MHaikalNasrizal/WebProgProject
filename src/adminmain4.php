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
    if(isset($_POST['id_cat'])){
      $id_Cat = $_POST['id_cat'];
      $updatecategory = $_POST['category'];
      $updateQuota = $_POST['quota'];
      $updateDecription = $_POST['description'];

      $sql = "UPDATE `category1` SET Category = '$updatecategory',CategoryQuota = '$updateQuota',Descrip ='$updateDecription' WHERE id_Category='$id_Cat'";
      if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Sucessfully Updated'); document.location.href = 'adminmain4.php';</script>";
    
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }  

    }
    
    $sql = "SELECT * FROM category1";
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

<body class="d-flex flex-nowrap">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
    crossorigin="anonymous"></script>
  <div class="d-flex flex-column flex-shrink-0 p-3 text-white bg-dark " style="width: 280px; height: 100vh;">
    <a href="#" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
      <span class="fs-4">Admin</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
      <li class="nav-item">
        <a href="adminmain.php" class="nav-link text-white">Home</a>
      </li>
      <li>
        <a href="adminmain2.php" class="nav-link text-white"> View & Search user</a>
      </li>
      <li>
        <a href="adminmain3.php" class="nav-link text-white"> Add Category</a>
      </li>
      <li>
        <a href="adminmain4.php" class="nav-link active" aria-current="page">Set quota</a>
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
  <div class="container-fluid m-3 p-4 rounded-3 border shadow-lg">
    <div>
      <?php if(mysqli_num_rows($result)>0){ ?>
      <h1>List of Category Open</h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Category Name</th>
            <th scope="col">Quota</th>
            <th scope="col">Description</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
          </tr>
        </thead>

        <tbody>
          <?php 
            
              while($table = mysqli_fetch_array($result,MYSQLI_NUM)){
              $id = $table[0];
              $name = $table[1];
              $Quota = $table[2];
              $Descrip = $table[3];
            

              echo"<tr>";
              echo "<td>$id</td>";
              echo "<td>$name</td>";
              echo "<td>$Quota</td>";
              echo "<td>$Descrip</td>";
              echo "<td><button class='btn btn-secondary'name='update'type='submit' data-bs-toggle='modal' data-bs-target='#exampleModal$id' value='$id'>Edit</button></td>";
              echo "<td><form method='POST' action='delete.php'><button class='btn btn-secondary'name='delete'type='submit' onclick='return myconfirmed()' value='$id'>Delete</button></form></td>";
              echo"</tr>";

              ?>

          <div class="modal fade" id="exampleModal<?php echo$id;?>" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <form method="POST" action="adminmain4.php">
                    <div class="row m-3">
                      <label>Category Id :</label>
                      <input class="form-control" name="id_cat" readonly value="<?php echo "$table[0]";?>">
                    </div>
                    <div class="row m-3">
                      <label>Category name :</label>
                      <input class="form-control" name="category" required value="<?php echo "$table[1]";?>">
                    </div>
                    <div class="row m-3">
                      <label>Quota :</label>
                      <input class="form-control" type="number" name="quota" required value="<?php echo "$table[2]";?>">
                    </div>
                    <div class="row m-3">
                      <label>Description :</label>
                      <textarea class="form-control" name="description" required><?php echo "$table[3]";?></textarea>
                    </div>
                    <div class="row m-3">
                      <button class="btn btn-primary">Submit</button>
                    </div>
                  </form>
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