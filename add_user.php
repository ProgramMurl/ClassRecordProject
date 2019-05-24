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
        }else if($_POST['usertype'] == "teacher"){
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
