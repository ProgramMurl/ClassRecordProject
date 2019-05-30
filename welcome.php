<?php
  session_start();

  if(!isset($_SESSION['active_user_id']) && !isset($_SESSION['active_user_username'])){
    session_unset();
    session_destroy(); // destroy any other existing sessions
    header("location: index.php"); // redirect users back to login page
  }
?>
<!DOCTYPE html>
<html>
<head>
  <title>Welcome</title>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <style>
    body, h1,h2,h3,h4,h5,h6{
      font-family: "Montserrat", sans-serif;
    }

    .header{
      /*background-image: url('resources/headerback.jpg');*/
      background-attachment: fixed;
      background-size: cover;
      background-position: center;
    }

    .btn{
      display: flex;
      align-items: center;
      justify-content: center;
      background:#F97300;
      color:#fff;
    }

    .card{
       background-color: #1f2530;
    }

    .w3-row-padding img{
      margin-bottom: 12px;
    }

    /* Set the width of the sidebar to 120px */
    .w3-sidebar{
      width: 100px;
      background: #222;
    }

    /* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
    #main{
      margin-left: 120px;
    }

    /* Remove margins from "page content" on small screens */
    @media only screen and (max-width: 600px) {
      #main {
        margin-left: 0
      }
    }
  </style>
</head>
<body class="w3-black">
  <!-- Icon Bar (Sidebar - hidden on small screens) -->
  <nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
    <a href="#home" class="w3-bar-item w3-button w3-padding-large w3-black">
      <i class="fa fa-home w3-large"></i>
      <p>HOME</p>
    </a>
    <a href="class.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
      <i class="fa fa-graduation-cap w3-large"></i>
      <p>CLASS</p>
    </a>
    <a href="settings.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
      <i class="fa fa-cog w3-large"></i>
      <p>SETTINGS</p>
    </a>
    <a href="kill_session.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
      <i class="fa fa-sign-out w3-large"></i>
      <p>LOGOUT</p>
    </a>
  </nav>

  <!--  Navbar on small screens (Hidden on medium and large screens)  -->
  <div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
    <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
      <a href="#home" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
      <a href="class.php" class="w3-bar-item w3-button" style="width:25% !important">CLASS</a>
      <a href="settings.php" class="w3-bar-item w3-button" style="width:25% !important">SETTINGS</a>
      <a href="kill_session.php" class="w3-bar-item w3-button"style="width:25% !important">LOGOUT</a>
    </div>
  </div>

  <!-- Page Content -->
  <div class="w3-padding-large" id="main">
    <!-- Header/Home -->
    <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
     <!--  <div class="overlay"></div>
      <div class="container" style="background-image:'resources/headerback.jpg'">
        <div class="description">
           <h1>    Hello ,Welcome To My official Website
            <p>    cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non    proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </p>
             <button class="btn btn-outline-secondary btn-lg">See more</button>  </h1>
        </div>
      </div> -->
    <!-- </header> -->
      <!-- <h1 class="w3-jumbo"><span class="w3-hide-small"></span> Welcome back!</h1> -->
      <!-- <img src="resources/space.png" alt="space" class="w3-image" width="1002" height="1208"> -->
      <br>
      <div id="actions">
      <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-auto mb-3">
              <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="resources/desk.jpg" alt="Card image cap">
                <div class="card-body">
                  <!-- <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                  <a href="#" class="btn">Go somewhere</a>
                </div>
              </div>
            </div>
            <div class="col-auto mb-3">
              <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="resources/class.jpg " alt="Card image cap">
                <div class="card-body">
                  <!-- <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                  <a href="class.php" class="btn">Class</a>
                </div>
              </div>
            </div>
            <div class="col-auto mb-3">
              <div class="card" style="width: 20rem;">
                <img class="card-img-top" src="resources/test.jpg " alt="Card image cap">
                <div class="card-body">
                  <!-- <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                  <a href="#" class="btn">Grades</a>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
</header>
  <!-- END PAGE CONTENT -->
</body>
</html>
