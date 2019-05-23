<?php
  // notes: include checking if user is already logged in or not -- do that later
  // notes: replace SESSION data with POST data
  // notes: record duplication checking should be added
  // notes: set error messages in sessions
  include("config.php");

  // -- TEST SECTION
  // test values, remove section in actual usage
  $_SESSION['username'] = "user8";
  $_SESSION['password'] = "password";
  $_SESSION['email'] = "user@email.com";
  $_SESSION['usertype'] = "student";

  $_SESSION['firstname'] = "Bob";
  $_SESSION['lastname'] = "Ong";
  // -- END OF TEST SECTION

  if(isset($_SESSION['username']) && isset($_SESSION['password']) && isset($_SESSION['email']) && isset($_SESSION['usertype'])){
    if(mysqli_num_rows(mysqli_query($conn, "SELECT id FROM users WHERE username = '".$_SESSION['username']."'")) == 0){
      $insert_sql = "INSERT INTO users (username, password, email, usertype) VALUES ('".$_SESSION['username']."', '".$_SESSION['password']."', '".$_SESSION['email']."', '".$_SESSION['usertype']."')";
      echo(mysqli_query($conn, $insert_sql) ? "User successfully added to the database": "Failed to update database");

      $row = mysqli_fetch_array(mysqli_query($conn, "SELECT id FROM users WHERE username = '".$_SESSION['username']."'"), MYSQLI_ASSOC);
      if($row){
        if($_SESSION['usertype'] == "student"){
          $student_sql = "INSERT INTO student (first_name, last_name, user_id) VALUES ('".$_SESSION['firstname']."', '".$_SESSION['lastname']."', '".$row['id']."')";
          echo("<br>");
          echo(mysqli_query($conn, $student_sql) ? "Student successfully added to the database": "Failed to update database");
        }else if($_SESSION['usertype'] == "teacher"){
          $teacher_sql = "INSERT INTO teacher (first_name, last_name, user_id) VALUES ('".$_SESSION['firstname']."', '".$_SESSION['lastname']."', '".$row['id']."')";
          echo("<br>");
          echo(mysqli_query($conn, $teacher_sql) ? "Teacher successfully added to the database": "Failed to update database");
        }
      }
    }else{
      echo("Username is already in use!");
    }
  }
?>
