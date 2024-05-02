<?php
session_start();
$_SESSION['user_number'] = $_POST['user_number'];
$_SESSION['role'] = $_POST['role'];
$_SESSION['first_name'] = $_POST['first_name'];
$_SESSION['middle_name'] = $_POST['middle_name'];
$_SESSION['last_name'] = $_POST['last_name'];
$_SESSION['email'] = $_POST['email'];
$_SESSION['phone'] = $_POST['phone'];
$_SESSION['birthdate'] = $_POST['birthdate'];
$_SESSION['home_address'] = $_POST['home_address'];
$_SESSION['barangay'] = $_POST['barangay'];
$_SESSION['city'] = $_POST['city'];
$_SESSION['avatar'] = $_POST['avatar'];
$_SESSION['initials'] = $_POST['initials'];
