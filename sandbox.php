<?php
  // this page serves no significant functional purpose
  // this is only used for testing purposes
  session_start();

  $_SESSION['error'] = "blah";
  unset($_SESSION['error']);
  var_dump(isset($_SESSION['error']));
?>
