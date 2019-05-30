<?php
  include("config.php");
  session_start();

  if(!isset($_SESSION['active_user_id']) && !isset($_SESSION['active_user_username'])){
    session_unset();
    session_destroy(); // destroy any other existing sessions
    header("location: index.php"); // redirect users back to login page
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
	  body, h1,h2,h3,h4,h5,h6 {font-family: "Montserrat", sans-serif; color: white;}
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
  <header class="w3-container w3-padding-32 w3-center w3-black">
     <div class="relative fullwidth col-xs-12">
      	<form action="addstudent.php" method="post" enctype="multipart/form-data">
      		<fieldset>
            <?php
              $text=" ";
              $first="";
              $last="";
              $idno=0;
              $course="";
            ?>
    		    <legend><h4>Add Student Profile</h4></legend> <br>
            <div class="w3-center"> ID number  <input type="text" name="idnum" required="required" placeholder="ID number"> </div>
      			<div class="w3-center"> First Name  <input type="text" name="fname" required="required" placeholder="First Name"> </div>
      			<div class="w3-center"> Last Name  <input type="text" name="lname" required="required" placeholder="Last Name"></div>
            <div class="w3-center"> Course Code  <input type="text" name="ccode" required="required" placeholder="Course Code"></div><br>
      			<input type="hidden" name="size" value="1000000">
              <div>
                <input type="file" name="image">
              </div>
      		</fieldset> <br>
    		<input class="submit w3-button w3-round-xlarge form-btn semibold" name="submit" type="submit" value="Submit" onClick="return confirm('Are you sure?')">
    		<button type="button" id="back" name="back" class="w3-button w3-round-xlarge form-btn semibold" onClick="Javascript:window.location.href= 'settings.php';">Back</button>
    		</form>
    </div>
  </header>
<!-- END PAGE CONTENT -->
</div>
</body>
</html>
<?php
  $target_dir = "images/";
  if(isset($_POST['submit']) && !empty($_FILES["image"]["name"])){
    $first=$_POST['fname'];
    $last=$_POST['lname'] ;
    $idno= $_POST['idnum'];
    $course=$_POST['ccode'];
    $file_name = basename($_FILES['image']['name']);
    $file_tmp_name = $_FILES['image']['tmp_name'];
    $temp = $target_dir."".$file_name;
    $file_type = pathinfo($temp,PATHINFO_EXTENSION);
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');

    if(in_array($file_type, $allowTypes)){
      if(move_uploaded_file($file_tmp_name,$target_dir.$file_name)){
        $conn = mysqli_connect('localhost','root','','classrecord1') or die("Could not connect to database");
        $sql = "INSERT INTO student (id_number,first_name,last_name,image) VALUES ('$idno','$first', '$last','$temp')";
        $result = mysqli_query($conn,$sql);
        //echo "<p align=center>$temp</p>";
        //echo "<p align=center>$result</p>";

        if(mysqli_affected_rows($conn) == 1){
          echo "<p align=center style='color:green'><b>File has been successfully uploaded</b></p>";
        }else{
          echo "<p align=center>A system error has occured</p>".mysqli_error($conn);
        }
      }else{
        $text = "Sorry, there was an error uploading your file.";
      }
    }else{
      $text = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
  }else{
    $text = 'Please select a file to upload.';
  }
  echo "<p align=center>$text</p>";
?>
