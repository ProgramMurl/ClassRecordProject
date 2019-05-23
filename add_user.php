<?php
  // notes: include checking if user is already logged in or not -- do that later
  // notes: replace SESSION data with POST data
  // notes: record duplication checking should be added
  // notes: set error messages in sessions
  include("config.php");

  // -- TEST SECTION
  // test values, remove section in actual usage
  $_SESSION['username'] = "user3";
  $_SESSION['password'] = "password";
  $_SESSION['email'] = "user@email.com";
  $_SESSION['usertype'] = "teacher";
  // -- END OF TEST SECTION

  if(isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['email']) && isset($_SESSION['usertype'])){
    if(mysqli_num_rows(mysqli_query($conn, "SELECT id FROM users WHERE username = '".$_SESSION['username']."'")) == 0){
      $insert_sql = "INSERT INTO users (username, password, email, usertype) VALUES ('".$_SESSION['username']."', '".$_SESSION['password']."', '".$_SESSION['email']."', '".$_SESSION['usertype']."')";
      echo(mysqli_query($conn, $insert_sql) ? "Record successfully added to the database": "Failed to update database");
    }else{
      echo("Username is already in use!");
    }
  }
?>
