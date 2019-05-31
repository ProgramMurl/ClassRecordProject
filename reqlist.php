<?php
  include("config.php");
  session_start();

  if(!isset($_SESSION['active_user_id']) && !isset($_SESSION['active_user_username'])){
    session_unset();
    session_destroy(); // destroy any other existing sessions
    header("location: index.php"); // redirect users back to login page
  }

  if(!isset($_GET['id'])){
    header('location: classoptions.php');
  }

   if(isset($_GET['id']) && isset($_GET['requirement_id'])){
     $delete_sql = "DELETE FROM requirement WHERE subject_id = ".$_GET['id']." AND requirement_id = ".$_GET['requirement_id'];
     mysqli_query($conn, $delete_sql);
     header("location: reqlist.php?id=".$_GET['id']);
  }
?>
<!DOCTYPE html>
<html>
  <title>Requirements</title>
  <meta charset="UTF-8">

  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

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

  <!-- Header/Home -->
  <div class="container">
    <h2>Requirements of <?php
      $class_sql = "SELECT * FROM subject WHERE subject_id = ".$_GET['id'];
      $class_result = mysqli_query($conn, $class_sql);
      $row = mysqli_fetch_assoc($class_result);
      echo $row['subject_code']." - ".$row['subject_name'];
    ?></h2>
    <a href='addreqrecord.php?id=<?php echo $_GET['id']?>'><button id="add" class="btn w3-deep-orange">Add Requirement</button> </a>
    <button id="back" class="btn w3-dark-gray" onClick="Javascript:window.location.href= 'classoptions.php?id=<?php echo $_GET['id'];?>';">Back</button>
    <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Requirement Type</th>
          <th>Requirement Name</th>
          <th>Total Score</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
          <?php
            $sql = "SELECT * FROM requirement WHERE subject_id = ".$_GET['id'];
            $result = mysqli_query($conn, $sql);
            if ($result->num_rows  >  0) {
              while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>".$row['requirement_type']."</td>";
                  echo "<td>".$row['requirement_name']."</td>";
                  echo "<td>".$row['total_score']."</td>";
                  echo "<td><a href='updaterequirement.php?id=".$row['requirement_id']."'>
                       <button class='btn btn-warning' value=".$row['requirement_id'].">
                         <i class='fa fa-pencil' aria-hidden='true'></i>
                       </button></a></td>";
                  echo "<td><a href='reqlist.php?id=".$_GET['id']."&requirement_id=".$row['requirement_id']."'><button class='btn btn-danger'  value='".$row['requirement_id']."'><i class='fa fa-trash-o' aria-hidden='true'></i></button></a></td>";
              }
            } else {
              echo "<tr>";
              echo "<h3> No requirement has been recorded yet.</h3>";
            }
            echo "</tr>";
          ?>
      </tbody>
    </table>
    </div>
  </div>
<!-- END PAGE CONTENT -->
</div>
</body>
</html>
