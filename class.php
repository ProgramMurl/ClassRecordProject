<!DOCTYPE html>
<html>
  <title>Class</title>
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
  div.a {
    /* Just to center the form on the page */
    margin: 0 auto;
    width: 400px;
    /* To see the outline of the form */
    padding: 1em;
    border: 1px solid #CCC;
    border-radius: 1em;
    }
    .fieldset-auto-width { 
      display: inline-block;
    }
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
  <a href="welcome.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-home w3-large"></i>
    <p>HOME</p>
  </a>
  <a href="class.php" class="w3-bar-item w3-button w3-padding-large w3-black">
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
<div class="w3-padding-large" id="a">
  <!-- Header/Home -->  
  <header class="w3-container w3-padding-32 w3-center w3-black">
     <div class="relative fullwidth col-xs-12">
      <fieldset class="fieldset-auto-width">
        <h2><span>Class Options</span><br>___________________________</h2>
        <button id="cclassbtn" class="w3-button w3-wide w3-round-xlarge form-btn semibold" >Create Class</button> 
        <br>
        <button id="rclassbtn" class="w3-button w3-wide w3-round-xlarge form-btn semibold" >Rename Class</button>
        <br>
        <button id="dclassbtn" class="w3-button w3-wide w3-round-xlarge form-btn semibold" >Delete Class</button>
      </fieldset>
    </div>
  </header>

      <br> 

  <header class="w3-container w3-padding-32 w3-center w3-black">
    <div class="relative fullwidth col-xs-12">
      <fieldset class="fieldset-auto-width">
        <h2><span>Student Options</span><br>___________________________</h2>
        <button id="astudbtn" class="w3-button w3-wide w3-round-xlarge form-btn semibold" >Add Student Profile</button> 
        <br>
        <button id="ustudbtn" class="w3-button w3-wide w3-round-xlarge form-btn semibold" >Update Student Profile</button> 
        <br>
        <button id="sstudbtn" class="w3-button w3-wide w3-round-xlarge form-btn semibold" >Search Student Profile</button>
        <br>
        <button id="dstudbtn" class="w3-button w3-wide w3-round-xlarge form-btn semibold" >Delete Student Profile</button>
      </fieldset>
    </div>
  </header>

    <br>

    <header class="w3-container w3-padding-32 w3-center w3-black">
      <div class="relative fullwidth col-xs-12">
        <fieldset class="fieldset-auto-width">
          <h2><span>Requirement Options</span><br>___________________________</h2>
          <button class="w3-button w3-wide w3-round-xlarge form-btn semibold" >Add Exam</button> 
          <br>
          <button class="w3-button w3-wide w3-round-xlarge form-btn semibold" >Delete Exam</button> 
          <br>
          <button class="w3-button w3-wide w3-round-xlarge form-btn semibold" >Add Assignment</button> 
          <br>
          <button class="w3-button w3-wide w3-round-xlarge form-btn semibold" >Delete Assignment</button> 
          <br>
          <button class="w3-button w3-wide w3-round-xlarge form-btn semibold" >Add Quiz</button> 
          <br>
          <button class="w3-button w3-wide w3-round-xlarge form-btn semibold" >Delete Quiz</button> 
        </fieldset>
      </div>
    </header>
<!-- END PAGE CONTENT -->
  </div>
</body>
</html>
