<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  include './databaseConnection.php';
  $role = $_POST['role'];
  if ($role == 'Admin') {
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
    echo $username;

    try {
      $stmt = $conn->prepare("CALL create_admin_profile(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssssssssssss", $adminnumber, $firstname, $middlename, $lastname, $email, $phonenumber, $birthdate, $gender, $homeaddress, $barangay, $city, $username, $password, $role);
      $stmt->execute();
      if ($stmt->affected_rows === 1) {
        echo "<script>alert('Admin added successfully') window.location.href='../accounts/login.php'</script>";
        session_destroy();
        unset($adminnumber, $firstname, $middlename, $lastname, $email, $phonenumber, $birthdate, $gender, $homeaddress, $barangay, $city, $username, $password, $role);
      } else {
        echo "<script>alert('Failed to add admin') window.location.href='./../../accounts/profile/role-selection.php'</script>";
      }
    } catch (\Throwable $th) {
      error_log($th->getMessage());
      echo $th->getMessage();
      exit('Error processing the request');
    }
  } else if ($role == 'Student') {
    $studentnumber = $_POST['studentnumber'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $academicprogram = $_POST['academicprogram'];
    $yearlevel = $_POST['yearlevel'];
    $homeaddress = $_POST['homeaddress'];
    $barangay = $_POST['barangay'];
    $city = $_POST['city'];
    $username = $_POST['username'];
    $password = hash('sha256', $_POST['password']);
    $profile_photo = null;
    echo $studentnumber;

    try {
      $stmt = $conn->prepare("CALL create_student_profile(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("sssssssssssssssss", $studentnumber, $firstname, $middlename, $lastname, $birthdate, $gender, $email, $phone, $academicprogram, $yearlevel, $profile_photo, $homeaddress, $barangay, $city, $username, $password, $role);
      $stmt->execute();
      if ($stmt->affected_rows === 1) {
        echo "<script>alert('Student added successfully') window.location.href='../accounts/login.php'</script>";
        session_destroy();
        unset($studentnumber, $firstname, $middlename, $lastname, $birthdate, $gender, $email, $phone, $academicprogram, $yearlevel, $homeaddress, $barangay, $city, $username, $password, $role);
      } else {
        echo "<script>alert('Failed to add student') window.location.href='./../../accounts/profile/role-selection.php'</script>";
      }
    } catch (\Throwable $th) {
      error_log($th->getMessage());
      echo $th->getMessage();
      exit('Error processing the request');
    }
  }
}
