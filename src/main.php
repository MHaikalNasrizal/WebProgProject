<?php
session_start();
if ((isset($_SESSION['username'])) && $_SESSION['role'] == 'Participant') {
  $name = $_SESSION['username'];
} else {
  echo "<script>alert('Session Ended .Please Login');document.location.href='Index.html';</script>";
  die();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous" />
  <link rel="stylesheet" href="styles.css"/>
  <title>Home || The Cook-Off Cooking Competition</title>
  <style>
      body {
        background-image: url('../public/chef6.webp');
        color: #FFFFFF;
        background-repeat: no-repeat;
        background-size: cover;
      }
    </style>
</head>

<body>
  <?php include 'header.php'; ?>  

    <div class="container-fluid p-3">
        <div class="container-fluid bg-light rounded-3">
          <h1 class="col fw-bold bg-light "><em><strong>Welcome to The Cook-Off</strong></em> </h1>
          <p class="col fs-4 bg-light">
            <em>
            In here you will show off your cooking skill !<br>
            Cook with your own style with different themes and category!
            <br>Fight with other participant in our tournament to win our prizepool !
            </em>
          </p>
        </div>
     <div><br><br></div>
      <div class="row align-items-md-stretch">
        <div class="col-md-6">
          <div class="h-100 p-5 text-bg-dark rounded-3">
          <img src="https://wallpapers.com/images/hd/spoonful-of-spices-cooking-vwodnnl3zzdsqhbo.jpg" class="d-block w-100" height="300" alt="...">
            <h2><em>Choose your category</em></h2>
            <p>
              In this Cook-Off you can choose your favourite category 
              <br>that you think you can show off your skill.
              <br>Category that available are :
              <li>Asian</li>
              <li>Western</li>
              <li>Malaysian</li>
            </p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="h-100 p-5 bg-dark rounded-3">
          <img src="https://c1.wallpaperflare.com/preview/345/487/799/kitchen-cook-flame-food.jpg" class="d-block w-100" height="300" alt="...">
            <h2>Cook Now !</h2>
            <p>
             Register Now !
             <br>There are limits of participants for each event ! 
             <br>Register before its full !
            </p>
            <button class="button" style="vertical-align:middle" onclick="window.location.href='main2.php';">
              <span>Click Here to Register</span>
            </button>
          </div>
        </div>
      </div>
    <script>
      let mybutton = document.getElementById("myBtn");
      window.onscroll = function() {scrollFunction()};
      function scrollFunction() {
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
          mybutton.style.display = "block";
        } else {
          mybutton.style.display = "none";
        }
      }
      function topFunction() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
      }
    </script>
      <div class="container-fluid">
            <hr>
            <p class="text-center">&copy; 2023 TheCook-Off </p>
      </div>
    </div>
</body>

</html>