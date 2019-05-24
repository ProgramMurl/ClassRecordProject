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
  background-image: url("blue.jpg");
  min-height: 380px;
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
</style>
</head>

<body class="bg-img">

    <div class="modal">
     <h2>Sign Up</h2>
    </div>

    <form class="modal-content animate" method="post" action="login.php">
    <div class="imgcontainer">
      <img src="noavatar.png" alt="Circle" class="avatar" style="width: 170px; height: 100px;">
    </div>

     <div class="container">
        <label for="usern"><b>Username</b></label>
        <input type="text" placeholder="Enter Username" name="usern" required>

        <label for="usern"><b>Email</b></label>
        <input type="text" placeholder="Enter Username" name="mail" required>

        <label for="passw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="passw" required>

        <label for="psw-repeat"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="passw-repeat" required>

        <p>By creating an account you agree to our <a href="#" style="color:dodgerblue">Terms & Privacy</a>.</p>

        <div class="clearfix">

        <button type="submit" class="btn" name="sign_up">Sign Up</button>
        <button class="cancelbtn" name="cancel" onClick="Javascript:window.location.href= 'index.php';"> Cancel </button>
        </div>
        <label>
           <input type="checkbox" checked="checked" name="remember"> Remember me
        </label>
     </div>
    </form>

</body>
</html>


<?php
  // notes: include checking if user is already logged in or not -- do that later
  // notes: replace SESSION data with POST data
  // notes: record duplication checking should be added
  // notes: set error messages in sessions
  include("config.php");
  // -- TEST SECTION
  // test values, remove section in actual usage
  $_POST['username'] = "user8";
  $_POST['password'] = "password";
  $_POST['email'] = "user@email.com";
  $_POST['usertype'] = "student";
  $_POST['firstname'] = "Bob";
  $_POST['lastname'] = "Ong";
  // -- END OF TEST SECTION

  if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['usertype'])){

    if(mysqli_num_rows(mysqli_query($conn, "SELECT id FROM users WHERE username = '".$_POST['username']."'")) == 0){

      $insert_sql = "INSERT INTO users (username, password, email, usertype) VALUES ('".$_POST['username']."', '".$_POST['password']."', '".$_POST['email']."', '".$_POST['usertype']."')";

      echo(mysqli_query($conn, $insert_sql) ? "User successfully added to the database": "Failed to update database");

      $row = mysqli_fetch_array(mysqli_query($conn, "SELECT id FROM users WHERE username = '".$_POST['username']."'"), MYSQLI_ASSOC);

      if($row){

        if($_POST['usertype'] == "student"){

          $student_sql = "INSERT INTO student (first_name, last_name, user_id) VALUES ('".$_POST['firstname']."', '".$_POST['lastname']."', '".$row['id']."')";
          echo("<br>");
          echo(mysqli_query($conn, $student_sql) ? "Student successfully added to the database": "Failed to update database");
        }

        else if($_POST['usertype'] == "teacher"){

          $teacher_sql = "INSERT INTO teacher (first_name, last_name, user_id) VALUES ('".$_POST['firstname']."', '".$_POST['lastname']."', '".$row['id']."')";
          echo("<br>");
          echo(mysqli_query($conn, $teacher_sql) ? "Teacher successfully added to the database": "Failed to update database");
        }
      }
    }else{
      echo("Username is already in use!");
    }
  }
?>
