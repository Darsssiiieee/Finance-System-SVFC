<?php
  session_start();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    function generateRandomNumber() {
      return str_pad(mt_rand(0, 99999), 5, '0', STR_PAD_LEFT);
    }
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    $student_number = "C-" . generateRandomNumber();
    $_SESSION['username'] = $username;
    $_SESSION['password'] = $password;
    $_SESSION['student_number'] = $student_number;
    if ($password !== $confirmPassword) {
      echo "<script>alert('Passwords do not match')</script>";
      exit();
    } else {
      header('Location: ./../../pages/accounts/profile/role-selection.php');
    }
  }
?>