<?php
  // notes: include checking if user is already logged in or not -- do that later
  // notes: replace SESSION data with POST data
  // notes: record duplication checking should be added
  // notes: set error messages in sessions
  session_start();
  include("config.php");
  define('RESPONSE_1', 'User successfully added to the database!');
  define('RESPONSE_2', 'Error updating the database, please contact the IT administrator.');
  define('RESPONSE_3', 'Username is already in use!');

  if(isset($_SESSION['active_user_id']) && isset($_SESSION['active_user_id'])){
    header("location: welcome.php"); // redirects user to homepage if logged in already
  }

  if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['first_name']) && isset($_POST['last_name'])){
    // check if username is not in use yet
    unset($_SESSION['response_msg']);
    if(mysqli_num_rows(mysqli_query($conn, "SELECT teacher_id FROM teacher WHERE username = '".$_POST['username']."'")) == 0){
      $insert_sql = "INSERT INTO teacher (username, password, email, first_name, last_name) VALUES ('".$_POST['username']."', '".$_POST['password']."', '".$_POST['email']."', '".$_POST['first_name']."', '".$_POST['last_name']."')";
      $result = mysqli_query($conn, $insert_sql);
      if($result){
        $_SESSION['response_msg'] = RESPONSE_1;
      }else{
        $_SESSION['response_msg'] = RESPONSE_2;
      }
    }else{
      $_SESSION['response_msg'] = RESPONSE_3;
    }
  }
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Sign Up</title>
<style>
body, p {font-family: Arial, Helvetica, sans-serif;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  box-sizing: border-box;
}
.bg-img {
  background-image: url("resources/blue.jpg");
  min-height: 500px;
  background-position: center;
  background-repeat: no-repeat;
  background-size: cover;
  position: relative;
}

/* Set a style for all buttons */
button {
  background-color: #004080;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 40%;
}

button:hover {
  opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
  width: 40%;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
  text-align: center;
  margin: 24px 0 12px 0;
  position: relative;
}

img.avatar {
  width: 40%;
  border-radius: 50%;
}

.container {
  padding: 16px;
  max-width: 100%;
}

span.psw {
  float: right;
  padding-top: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 520px; /* Could be more or less, depending on screen size */
  height: 620px;
  position: relative;
  box-sizing: border-box;
}


/* Add Zoom Animation */
.animate {
  -webkit-animation: animatezoom 0.6s;
  animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
  from {-webkit-transform: scale(0)}
  to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
  from {transform: scale(0)}
  to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
  span.psw {
     display: block;
     float: none;
  }
  .cancelbtn {
     width: 100%;
  }
}

.form-content{
  height: 75%;
  background-color: white;
}

#content{
  background-color: white;
  margin-top: 2%;
  margin-bottom: 2%;
  border-radius: 15px;
  padding-top: 15px;
  padding-bottom: 15px;
}
</style>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body class="bg-img">
  <div class="container-fluid">
    <div class="row justify-content-md-center">
      <div class="col-md-5" id="content">
        <form method="post" action="add_user.php">
          <p class="text-center <?php echo(isset($_SESSION['response_msg']) && ($_SESSION['response_msg'] == RESPONSE_1) ? "text-success" : "text-danger");?>"><?php echo(isset($_SESSION['response_msg']) ? $_SESSION['response_msg'] : "");?></p>
          <div class="imgcontainer">
            <img src="resources/noavatar.png" alt="Circle" class="avatar" style="width: 170px; height: 100px;">
          </div>
          <div class="container">
            <label for="username"><b>Username</b></label>
            <input type="text" placeholder="Enter Username" name="username" required>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="first_name"><b>First Name</b></label>
            <input type="text" placeholder="Enter First Name" name="first_name" required>

            <label for="last_name"><b>Last Name</b></label>
            <input type="text" placeholder="Enter Last Name" name="last_name" required>

            <label for="password"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="password" required>

            <label for="repeat_password"><b>Repeat Password</b></label>
            <input type="password" placeholder="Repeat Password" name="repeat_password" required>

            <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

            <div class="row justify-content-md-center">
              <button class="btn btn-primary" name="sign_up" type="submit">Sign Up</button>
              <span>&nbsp;</span>
              <button class="btn btn-danger" name="back" onClick="window.location.href= 'viewstudents.php';">Back</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<?php
  unset($_SESSION['response_msg']);
?>
