<?php
  session_start();
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include './databaseConnection.php';
    $role = $_POST['role'];
    if ($role == 'admin') {
      $adminnumber = $_POST['adminnumber'];
      $firstname = $_POST['firstname'];
      $middlename = $_POST['middlename'];
      $lastname = $_POST['lastname'];
      $email = $_POST['email'];
      $phonenumber = $_POST['phonenumber'];
      $birthdate = $_POST['birthdate'];
      $gender = $_POST['gender'];
      $homeaddress = $_POST['homeaddress'];
      $barangay = $_POST['barangay'];
      $city = $_POST['city'];
      $username = $_POST['username'];
      $password = hash('sha256', $_POST['password']);

      try {
        $stmt = $conn->prepare("CALL create_admin_profile(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssssssssssss", $adminnumber, $firstname, $middlename, $lastname, $email, $phonenumber, $birthdate, $gender, $homeaddress, $barangay, $city, $username, $password, $role);
        $stmt->execute();
        if ($stmt->affected_rows === 1) {
          echo "<script>alert('Admin added successfully') window.location.href='../'</script>";
          session_destroy();
          unset($adminnumber, $firstname, $middlename, $lastname, $email, $phonenumber, $birthdate, $gender, $homeaddress, $barangay, $city, $username, $password, $role);
        }
        else {
          echo "<script>alert('Failed to add admin') window.location.href='./../../accounts/profile/role-selection.php'</script>";
        }
      }
      catch (\Throwable $th) {
        error_log($th->getMessage());
        echo $th->getMessage();
        exit('Error processing the request');
      }
    }
    else if ($role == 'student') {
      
    }

    try {
      

      $stmt = $conn->prepare("CALL insert_student_profile_and_user(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sssssssssssssssss", $adminnumber, $firstname, $middlename, $lastname, $birthdate, $gender, $email, $phonenumber, $role, $yearlevel, $profilephoto, $homeaddress, $barangay, $city, $username, $password, $role);
      $stmt->execute();
      if ($stmt->affected_rows === 1) {
        echo "<script>alert('User added successfully') window.location.href='../'</script>";
      } else {
        echo "<script>alert('Failed to add user') window.location.href='./../../accounts/profile/role-selection.php'</script>";
      }
    } catch (Exception $e) {
      error_log($e->getMessage());
      echo $e->getMessage();
      exit('Error processing the request');
    }
  }
?>