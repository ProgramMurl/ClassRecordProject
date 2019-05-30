<?php
  include('config.php');
  session_start();

  if(!isset($_SESSION['active_user_id']) && !isset($_SESSION['active_user_username'])){
    session_unset();
    session_destroy(); // destroy any other existing sessions
    header("location: index.php"); // redirect users back to login page
  }

  if(!isset($_GET['id'])){
    header("location: class.php");
  }else{
    // verify that user is the teacher of the class
    $verify_sql = "SELECT * FROM subject WHERE subject_id = ".$_GET['id']." AND teacher_id = ".$_SESSION['active_user_id'];
    $result = mysqli_query($conn, $verify_sql);

    if(mysqli_num_rows($result) < 1){
      header("location: class.php");
    }
  }
?>
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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  <style>
    body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif}
    form {
    /* Just to center the form on the page */
    margin: 0 auto;
    width: 400px;
    /* To see the outline of the form */
    padding: 1em;
    border: 1px solid #CCC;
    border-radius: 1em;
    display: inline-block;
    }
  form div + div {
    margin-top: 1em;
  }
  .btn{
      display: flex;
      align-items: center;
      justify-content: center;
      background:#299e30;
      color:#fff;
    }

    .card{
       background-color: #1f2530;
    }

  #add{
    margin-left: 70em;
    margin-bottom: 2em;
    margin-top:-3em;
    position: absolute
  }

  input[type=text], input[type=date], input[type=tel], select, textarea {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      display: inline-block;
      border: 1px solid #ccc;
      border-radius: 4px;
      box-sizing: border-box;
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
  <a href="settings.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
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
    <a href="settings.php" class="w3-bar-item w3-button" style="width:25% !important">SETTINGS</a>
    <a href="index.php" class="w3-bar-item w3-button"style="width:25% !important">
    LOGOUT</a>
  </div>
</div>

<!-- Page Content -->
<div class="w3-padding-large" id="main">
  <header class="w3-container w3-padding-32 w3-center w3-black">
    <!-- <div class="simpl-btn">
      <button type="button" class="btn btn-primary btn-lg ">Students</button>
      <button type="button" class="btn btn-danger btn-lg ">Grades</button>
    </div> -->
    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-auto mb-3">
              <div class="card" style="width: 24rem;">
                <img class="card-img-top" src="resources/students.jpg" alt="students">
                <div class="card-body">
                  <!-- <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                  <a href="<?php echo "studentlist.php?id=".$_GET['id']?>" class="btn">Students</a>
                </div>
              </div>
            </div>
            <div class="col-auto mb-3">
              <div class="card" style="width: 24rem;">
                <img class="card-img-top" src="resources/grades.jpeg " alt="test">
                <div class="card-body">
                  <!-- <h5 class="card-title">Card title</h5>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p> -->
                  <a href="#" class="btn">Grades</a>
                </div>
              </div>
            </div>
        </div>
        <a href="class.php"><button class="btn-danger btn-lg w3-center">Back</button></a>
      </div>
  </header>
</div>
<!-- END PAGE CONTENT -->

</body>
</html>
