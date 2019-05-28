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
  <?php 
    include("config.php");
    $sql = "SELECT * FROM subject";
    $result = $conn->query("SELECT * FROM subject JOIN teacher on subject.teacher_id = teacher.teacher_id") or die($conn->error);
    // $sql1 = "SELECT * FROM teacher";
    // $result1 = $conn->query("SELECT * FROM users WHERE usertype = 'teacher' ") or die($conn->error);
    // $row1 = $result1->fetch_assoc();
    // echo $row1;
  ?>

  <!-- Header/Home -->  
  <div class="container">
    <h2>Class</h2>
    <a href='createclass.php'><button id="add" class="btn btn-primary">Add Class</button></a>
    <div class="table-responsive">          
    <table class="table">
      <thead>
        <tr>
          <th>Class Name</th>
          <th>Class Code</th>
          <th>Teacher ID</th>
          <th>Teacher's Surname</th>
          <th>View</th>
          <th>Edit</th>
          <th>Delete</th>
        </tr>
      </thead>
      <tbody>
          <?php 
            if ($result->num_rows  >  0) {
              while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>".$row['subject_name']."</td>";
                  echo "<td>".$row['subject_code']."</td>";
                  echo "<td>".$row['teacher_id']."</td>";
                  echo "<td>".$row['first_name']. " " .$row['last_name']."</td>";
                  echo "<td>
                       <button class='btn btn-success' value=".$row['subject_id'].">
                         <i class='fa fa-eye' aria-hidden='true'></i>
                       </button></td>";
                  echo "<td><a href='editclass.php?id=".$row['subject_id']."'>
                       <button class='btn btn-warning' value=".$row['subject_id'].">
                         <i class='fa fa-pencil' aria-hidden='true'></i>
                       </button></a></td>";
                  echo "<td><a href='delete_class.php?id=".$row['subject_id']."'><button class='btn btn-danger'  value='".$row['subject_id']."'><i class='fa fa-trash-o' aria-hidden='true'></i></button></a></td>";
              }
              
            }
            else {
                echo "<tr>";
                echo "<h3> No Classes have been recorded yet.</h3>";
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