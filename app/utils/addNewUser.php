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
    $avatar = $_POST['avatar'];

    try {
      $stmt = $conn->prepare("CALL insert_user_profile(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssssssssssssss", $adminnumber, $password, $role, $avatar, $firstname, $middlename, $lastname, $email, $phonenumber, $birthdate, $gender, $homeaddress, $barangay, $city, $academicprogram, $yearlevel);
      $stmt->execute();
      if ($stmt->affected_rows === 1) {
        http_response_code(200);
        echo "200";
      } else {
        http_response_code(500);
        echo "500";
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
    $password = hash('sha256', $_POST['password']);
    $avatar = $_POST['avatar'];

    try {
      $stmt = $conn->prepare("CALL insert_user_profile(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
      $stmt->bind_param("ssssssssssssssss", $studentnumber, $password, $role, $avatar, $firstname, $middlename, $lastname, $email, $phone, $birthdate, $gender, $homeaddress, $barangay, $city, $academicprogram, $yearlevel);
      $stmt->execute();
      if ($stmt->affected_rows === 1) {
        http_response_code(200);
        echo "200";
      } else {
        http_response_code(500);
        echo "500";
      }
    } catch (\Throwable $th) {
      error_log($th->getMessage());
      echo $th->getMessage();
      exit('Error processing the request');
    }
  }
}
