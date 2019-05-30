<?php
  // notes: include checking if user is already logged in or not -- do that later
  // notes: replace SESSION data with POST data
  //no sessioning yet

  include("config.php");

  // -- TEST SECTION
  // test values, remove section in actual usage
  // $_POST['cname'] = 'Data Structures';
  // $_POST['ccode'] = 'CpE 123';
  // $_POST['tname'] = 'Pena';
  // -- END OF TEST SECTION

  if(isset($_POST['cname']) && isset($_POST['ccode'])){
    // query to get teacher ID from teacher surname
    $search_teacher = "SELECT teacher_id FROM teacher WHERE last_name = 'Uy'";
    $teacher_result = mysqli_query($conn, $search_teacher);

    $row = mysqli_fetch_array($teacher_result);

    $insert_class = "INSERT INTO subject (subject_name, subject_code, teacher_id) VALUES ('".$_POST['cname']."','".$_POST['ccode']."', ".$row[0].")";
    echo mysqli_query($conn, $insert_class) ? header("location: class.php") : "Failed to update database";
    // change true value of above ternary operation to redirect to previous class
  }
?>
