<?php
  include("config.php");
  session_start();

  if(isset($_POST['login_user'])) {
    // username and password sent from form

    $myusername = $_POST['usern'];
    $mypassword = $_POST['passw'];

    if(empty($myusername)) {
      die("Username is required" );
    }else if(empty($mypassword)) {
      die("Password is required" );
    }else{
      $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";
      $result = $conn->query($sql);

      if($result->num_rows >0){
        while($row=$result->fetch_assoc()){
          $_SESSION['username'] = $username;
          $_SESSION['success'] = "You are now logged in";
          header('location: welcome.php');
        }
      }else{
        header('location: index.php');
      }
    }
  }
?>

<!--
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
   <h2>Login</h2>
  </div>

  <form method="post" action="login.php">
   <div class="input-group">
      <label>Username</label>
      <input type="text" name="username" >
   </div>
   <div class="input-group">
      <label>Password</label>
      <input type="password" name="password">
   </div>
   <div class="input-group">
      <button type="submit" class="btn" name="login_user">Login</button>
   </div>
   <p>
      Not yet a member? <a href="register.php">Sign up</a>
   </p>
  </form>
</body>
</html> -->
