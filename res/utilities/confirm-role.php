<?php
  session_start();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role = $_POST['role'];

    $valid_roles = array("Admin", "Student");
    if (!in_array($role, $valid_roles)) {
      echo "<script>alert('Invalid role selected')</script>";
      exit();
    } else {
      $_SESSION['role'] = $role;
      header('Location: ./../../../res/utilities/confirm-role.php');
    }
  }
?>
