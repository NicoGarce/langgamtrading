<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $password = $_POST['password'];
  $confirm = $_POST['confirm'];

  if ($password === $confirm) {
    echo "<span style='color:green'>Password Matched.</span>";
  } else {
    echo "<span style='color:red'>Password does not match..</span>";
  }
}

?>
