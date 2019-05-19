<!DOCTYPE html>
<html>
  <title>Welcome</title>
  <meta charset="UTF-8">

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


  <style>
  body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
  .w3-row-padding img {margin-bottom: 12px}
  /* Set the width of the sidebar to 120px */
  .w3-sidebar {width: 100px;background: #222;}
  /* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
  #main {margin-left: 120px}
  /* Remove margins from "page content" on small screens */
  @media only screen and (max-width: 600px) {#main {margin-left: 0}}
  </style>

<body class="w3-black">

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <a href="" class="w3-bar-item w3-button w3-padding-large w3-black">
    <i class="fa fa-home w3-large"></i>
    <p>HOME</p>
  </a>
  <a href="#home" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-graduation-cap w3-large"></i>
    <p>CLASS</p>
  </a>
  <a href="" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-eye w3-large"></i>
    <p>PHOTOS</p>
  </a>
  <a href="" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-cog w3-large"></i>
    <p>SETTINGS</p>
  </a>
  <a href="index.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-sign-out w3-large"></i>
    <p>LOGOUT</p>
  </a>
</nav>

<!--  Navbar on small screens (Hidden on medium and large screens)  -->
<div class="w3-top w3-hide-large w3-hide-medium" id="myNavbar">
  <div class="w3-bar w3-black w3-opacity w3-hover-opacity-off w3-center w3-small">
    <a href="#home" class="w3-bar-item w3-button" style="width:25% !important">HOME</a>
    <a href="" class="w3-bar-item w3-button" style="width:25% !important">CLASS</a>
    <a href="" class="w3-bar-item w3-button" style="width:25% !important">PHOTOS</a>
    <a href="" class="w3-bar-item w3-button" style="width:25% !important">SETTINGS</a>
    <a href="index.php" class="w3-bar-item w3-button"style="width:25% !important">
    LOGOUT</a>
  </div>
</div>

<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black" id="home">
    <br>
    <h1 class="w3-jumbo"><span class="w3-hide-small"></span> Welcome back!</h1>
    <img src="space.png" alt="space" class="w3-image" width="1002" height="1208">
  </header>

<!-- END PAGE CONTENT -->
</div>


</body>
</html>
