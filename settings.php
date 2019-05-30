<!DOCTYPE html>
<html>
  <title>Settings</title>
  <meta charset="UTF-8">

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

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
    .form-elegant .font-small {
      font-size: 0.8rem; }

    .form-elegant .z-depth-1a {
        -webkit-box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25);
        box-shadow: 0 2px 5px 0 rgba(55, 161, 255, 0.26), 0 4px 12px 0 rgba(121, 155, 254, 0.25); }

    .form-elegant .z-depth-1-half,
    .form-elegant .btn:hover {
        -webkit-box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15);
        box-shadow: 0 5px 11px 0 rgba(85, 182, 255, 0.28), 0 4px 15px 0 rgba(36, 133, 255, 0.15); }

    .form-elegant .modal-header {
        border-bottom: none; }

    .modal-dialog .form-elegant .btn .fab {
        color: #2196f3!important; }

    .form-elegant .modal-body, .form-elegant .modal-footer {
        font-weight: 400; }
    .w3-row-padding img {margin-bottom: 12px}
    /* Set the width of the sidebar to 120px */
    .w3-sidebar {width: 100px;background: #222;}
    /* Add a left margin to the "page content" that matches the width of the sidebar (120px) */
    #main {margin-left: 120px}
    /* Remove margins from "page content" on small screens */
    @media only screen and (max-width: 600px) {#main {margin-left: 0}}
    /* The Modal (background) */
    /*.modal {
      display: none; /* Hidden by default
      position: fixed; /* Stay in place
      z-index: 1; /* Sit on top
      padding-top: 100px; /* Location of the box
      left: 0;
      top: 0;
      width: 100%; /* Full width
      height: 100%; /* Full height
      overflow: auto; /* Enable scroll if needed
      background-color: rgb(0,0,0); /* Fallback color
      background-color: rgba(0,0,0,0.4); /* Black w/ opacity
    }

    /* Modal Content */
    /*.modal-content {
      position: relative;
      background-color: #fefefe;
      margin: auto;
      padding: 0;
      border: 1px solid #888;
      width: 80%;
      box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2),0 6px 20px 0 rgba(0,0,0,0.19);
      -webkit-animation-name: animatetop;
      -webkit-animation-duration: 0.4s;
      animation-name: animatetop;
      animation-duration: 0.4s
    }*/
  </style>

<body class="w3-black">

<!-- Icon Bar (Sidebar - hidden on small screens) -->
<nav class="w3-sidebar w3-bar-block w3-small w3-hide-small w3-center">
  <a href="welcome.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-home w3-large"></i>
    <p>HOME</p>
  </a>
  <a href="class.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-graduation-cap w3-large"></i>
    <p>CLASS</p>
  </a>
  <a href="settings.php" class="w3-bar-item w3-button w3-padding-large w3-black">
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
    <a href="class.php" class="w3-bar-item w3-button" style="width:25% !important">CLASS</a>
    <a href="" class="w3-bar-item w3-button" style="width:25% !important">PHOTOS</a>
    <a href="settings.php" class="w3-bar-item w3-button" style="width:25% !important">SETTINGS</a>
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
        <button id="cclassbtn" class="w3-button w3-wide w3-round-xlarge form-btn semibold" onClick="Javascript:window.location.href= 'createclass.php';">Create Class</button>
        <br>
        <button id="rclassbtn" class="w3-button w3-wide w3-round-xlarge form-btn semibold" onClick="Javascript:window.location.href= 'class.php';" >Rename Class</button>
        <br>
        <button id="dclassbtn" class="w3-button w3-wide w3-round-xlarge form-btn semibold" onClick="Javascript:window.location.href= 'class.php';" >Delete Class</button>
      </fieldset>
    </div>
  </header>

      <br>

  <header class="w3-container w3-padding-32 w3-center w3-black">
    <div class="relative fullwidth col-xs-12">
      <fieldset class="fieldset-auto-width">
        <h2><span>Student Options</span><br>___________________________</h2>
        <button id="astudbtn" class="w3-button w3-wide w3-round-xlarge form-btn semibold" onClick="Javascript:window.location.href= 'addstudent.php';">Add Student Profile</button>
        <br>
        <button id="sstudbtn" class="w3-button w3-wide w3-round-xlarge form-btn semibold" onClick="Javascript:window.location.href= 'searchstudent.php';">Search Student Profile</button>
        <br>
        <button id="dstudbtn" class="w3-button w3-wide w3-round-xlarge form-btn semibold" onClick="Javascript:window.location.href= 'deletestudent.php';">Delete Student Profile </button>
      </fieldset>
    </div>
  </header>

    <br>

    <header class="w3-container w3-padding-32 w3-center w3-black">
      <div class="relative fullwidth col-xs-12">
        <fieldset class="fieldset-auto-width">
          <h2><span>Requirement Options</span><br>___________________________</h2>
          <button id="aebtn" class="w3-button w3-wide w3-round-xlarge form-btn semibold" onClick="Javascript:window.location.href= 'addrequirement.php';">Add (Exam/Quiz/Assignment)</button><!--
          <br>
          <button id="uebtn" class="w3-button w3-wide w3-round-xlarge form-btn semibold" onClick="Javascript:window.location.href= 'updaterequirement.php';">Update (Exam/Quiz/Assignment)</button>  -->
          <br>
          <button id="debtn" class="w3-button w3-wide w3-round-xlarge form-btn semibold" onClick="Javascript:window.location.href= 'deleterequirement.php';">Delete (Exam/Quiz/Assignment)</button>
        </fieldset>
      </div>
    </header>

  <!-- END PAGE CONTENT -->

</body>
</html>
