<?php
  include("config.php");
  session_start();

  define('RESPONSE_1', 'Score successfully updated in the database!');
  define('RESPONSE_2', 'Error updating the database, please contact the IT administrator.');

  if(!isset($_SESSION['active_user_id']) && !isset($_SESSION['active_user_username'])){
    session_unset();
    session_destroy(); // destroy any other existing sessions
    header("location: index.php"); // redirect users back to login page
  }

  if(isset($_POST['requirement_id']) && isset($_POST['student_id']) && isset($_POST['score'])){
    $update_sql = "UPDATE requirement_record SET score = ".$_POST['score'].", grade = ".($_POST['score'] / $_POST['total_score'])." WHERE requirement_id = ".$_POST['requirement_id']." AND student_id = ".$_POST['student_id'];
    $result = mysqli_query($conn, $update_sql);
    if($result){
        $_SESSION['response_msg'] = RESPONSE_1;
    }else{
        $_SESSION['response_msg'] = RESPONSE_1;
    }
  }

  if(!isset($_GET['requirement_id']) && !isset($_GET['student_id'])){
    header("location: class.php");
  }else{
    $query_sql = "SELECT * FROM requirement JOIN requirement_record ON requirement.requirement_id = requirement_record.requirement_id JOIN student ON requirement_record.student_id = student.student_id WHERE requirement_record.requirement_id = ".$_GET['requirement_id']." AND requirement_record.student_id = ".$_GET['student_id'];
    $result = mysqli_query($conn, $query_sql);
    if($result){
      $row = mysqli_fetch_assoc($result);
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
  <a href="class.php" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-graduation-cap w3-large"></i>
    <p>CLASS</p>
  </a>
  <a href="" class="w3-bar-item w3-button w3-padding-large w3-hover-black">
    <i class="fa fa-eye w3-large"></i>
    <p>PHOTOS</p>
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
<div class="w3-padding-large" id="main">
  <!-- Header/Home -->
  <header class="w3-container w3-padding-32 w3-center w3-black">
     <div class="relative fullwidth col-xs-12">
      	<form action="updatescore.php?requirement_id=<?php echo $_GET['requirement_id'];?>&student_id=<?php echo $_GET['student_id']?>" method="post">
          <fieldset>
      		 <legend><h4>Update Requirement</h4></legend>
           <div class="w3-center"> Student Name  <input type="text" name="student_name" value="<?php echo $row['first_name']." ".$row['last_name'];?>" disabled> </div>
           <input type="hidden" name="student_id" value="<?php echo $_GET['student_id']?>">
           <div class="w3-center"> Requirement Name  <input type="text" name="requirement_name" value="<?php echo $row['requirement_name'];?>" disabled> </div>
           <input type="hidden" name="requirement_id" value="<?php echo $_GET['requirement_id']?>">
           <div class="w3-center"> Score  <input type="text" name="score" required="required" value="<?php echo $row['score'];?>"> </div>
           <input type="hidden" name="total_score" value="<?php echo $row['total_score']?>">
           <p class="text-center"><?php echo(isset($_SESSION['response_msg']) ? $_SESSION['response_msg'] : "");?></p>
          </fieldset> <br>
      		<input class="submit w3-button w3-round-xlarge form-btn semibold" name="submit" type="submit" value="Submit">
      		<button type="button" id="back" name="back" class="w3-button w3-round-xlarge form-btn semibold" onClick="Javascript:window.location.href= 'submitgrade.php?id=<?php echo $row['subject_id']?>';">Back</button>
    		</form>
    </div>
  </header>
<!-- END PAGE CONTENT -->
</div>
</body>
</html>
<?php unset($_SESSION['response_msg']);?>
