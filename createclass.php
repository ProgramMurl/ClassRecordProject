<?php
  include("config.php");
  session_start();

  define('RESPONSE_1', 'Class successfully added to the database!');
  define('RESPONSE_2', 'Error updating the database, please contact the IT administrator.');

  // -- TEST SECTION
  // test values, remove section in actual usage
  // $_SESSION['active_user_id'] = 1;
  // $_POST['cname'] = 'Data Structures';
  // $_POST['ccode'] = 'CpE 123';
  // $_POST['tname'] = 'Pena';
  // -- END OF TEST SECTION

  if(!isset($_SESSION['active_user_id']) && !isset($_SESSION['active_user_username'])){
    session_unset();
    session_destroy(); // destroy any other existing sessions
    header("location: index.php"); // redirect users back to login page
  }

  if(isset($_POST['cname']) && isset($_POST['ccode']) && isset($_SESSION['active_user_id'])){
    $insert_class = "INSERT INTO subject (subject_name, subject_code, teacher_id) VALUES ('".$_POST['cname']."', '".$_POST['ccode']."', ".$_SESSION['active_user_id'].")";
    $result = mysqli_query($conn, $insert_class);

    if($result){
      $_SESSION['response_msg'] = RESPONSE_1;
    }else{
      $_SESSION['response_msg'] = RESPONSE_2;
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
    <form action="createclass.php" method="post">
      <fieldset>
        <legend><h4>Create Class</h4></legend> <br>
        <div class="w3-center"> Course Name  <input type="text" name="cname" required="required" placeholder="Course Name"> </div>
        <div class="w3-center" > Course Code  <input type="text" name="ccode" required="required" placeholder="Course Code"></div>
        <p class="text-center"><?php echo(isset($_SESSION['response_msg']) ? $_SESSION['response_msg'] : "");?></p>
        <!-- <div class="w3-center"> Teacher's Name  <input type="text" name="tname" required="required" placeholder="Teacher's Surname"></div> -->
      </fieldset> <br>
      <input class="submit w3-button w3-round-xlarge form-btn semibold" name="submit" type="submit" value="Submit">
      <button type="button" id="back" name="back" class="w3-button w3-round-xlarge form-btn semibold" onClick="Javascript:window.location.href= 'class.php';">Back</button>
    </form>
  </div>
</header>
<!-- END PAGE CONTENT -->
</div>
</body>
</html>
<?php unset($_SESSION['response_msg']);?>
