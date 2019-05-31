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

  if(isset($_POST['submit'])){
    $query = "SELECT exam_weight, quiz_weight, assignment_weight FROM subject WHERE subject_id = ".$_GET['id'];
    $result = mysqli_query($conn, $query);
    $weights = mysqli_fetch_assoc($result);

    $exam_weight = $weights['exam_weight'];
    $quiz_weight = $weights['quiz_weight'];
    $assignment_weight = $weights['assignment_weight'];

    $exam_ave = 0;
    $quiz_ave = 0;
    $assignment_ave = 0;

    $students = array();

    $students_sql = "SELECT student_id FROM student_record WHERE subject_id = ".$_GET['id'];
    $result = mysqli_query($conn, $students_sql);

    while($row = mysqli_fetch_assoc($result)){
      array_push($students, $row['student_id']);
    }

    for($i = 0; $i < count($students); $i++){
      $exam_sql = "SELECT student_id, AVG(grade) as ave FROM requirement_record JOIN requirement ON requirement_record.requirement_id = requirement.requirement_id WHERE student_id = ".$students[$i]." AND requirement_type = 'exam'";
      $exam_result = mysqli_query($conn, $exam_sql);

      if(mysqli_num_rows($exam_result) > 0){
        $exam_row = mysqli_fetch_assoc($exam_result);
        $exam_ave = $exam_row['ave'];
      }

      $quiz_sql = "SELECT student_id, AVG(grade) as ave FROM requirement_record JOIN requirement ON requirement_record.requirement_id = requirement.requirement_id WHERE student_id = ".$students[$i]." AND requirement_type = 'quiz'";
      $quiz_result = mysqli_query($conn, $quiz_sql);

      if(mysqli_num_rows($quiz_result) > 0){
        $quiz_row = mysqli_fetch_assoc($quiz_result);
        $quiz_ave = $quiz_row['ave'];
      }

      $assignment_sql = "SELECT student_id, AVG(grade) as ave FROM requirement_record JOIN requirement ON requirement_record.requirement_id = requirement.requirement_id WHERE student_id = ".$students[$i]." AND requirement_type = 'assignment'";
      $assignment_result = mysqli_query($conn, $assignment_sql);

      if(mysqli_num_rows($assignment_result) > 0){
        $assignment_row = mysqli_fetch_assoc($assignment_result);
        $assignment_ave = $assignment_row['ave'];
      }

      $exam_score = $exam_weight * $exam_ave;
      $quiz_score = $quiz_weight * $quiz_ave;
      $assignment_score = $assignment_weight * $assignment_ave;

      $final_score = $exam_score + $quiz_score + $assignment_score;
      $final_grade = (($final_score * 4) - 5) * -1;

      $final_sql = "UPDATE student_record SET final_grade = ".$final_grade." WHERE student_id = ".$students[$i];
      mysqli_query($conn, $final_sql);
    }
    header("location: viewcomputedgrades.php?id=".$_GET['id']);
  }
?>
<!DOCTYPE html>
<html>
  <title>Student List</title>
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
    <h2>Students of <?php
      $class_sql = "SELECT * FROM subject WHERE subject_id = ".$_GET['id'];
      $class_result = mysqli_query($conn, $class_sql);
      $row = mysqli_fetch_assoc($class_result);
      echo $row['subject_code']." - ".$row['subject_name'];
    ?></h2>
    <form action="viewcomputedgrades.php?id=<?php echo $_GET['id']?>" method="post">
      <button id="add" class="btn w3-purple" type="submit" name="submit" value="submit">Compute Grades Now</button>
    </form>
    <button id="back" class="btn w3-dark-gray" onClick="Javascript:window.location.href= 'classoptions.php?id=<?php echo $_GET['id'];?>';">Back</button>
    <div class="table-responsive">
    <table class="table">
      <thead>
        <tr>
          <th>Student ID number</th>
          <th>Student Name</th>
          <th>Final Grade</th>
        </tr>
      </thead>
      <tbody>
        <?php
          $sql = "SELECT * FROM student_record JOIN student ON student.student_id = student_record.student_id WHERE subject_id = ".$_GET['id'];
          $result = mysqli_query($conn, $sql);
          if ($result->num_rows  >  0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>".$row['id_number']."</td>";
                echo "<td>".$row['first_name']. " " .$row['last_name']."</td>";
                echo "<td>".($row['final_grade'] == 0 ? "NG" : $row['final_grade']) ."</td>";
            }
          }
          else {
              echo "<tr>";
              echo "<h3> No student has been recorded yet.</h3>";
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
