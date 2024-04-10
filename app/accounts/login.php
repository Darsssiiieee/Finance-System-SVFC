<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  require_once './../../res/database/database_connection.php';

  $role = $_POST['role'];
  $usernumber = $_POST['usernumber'];
  $password = hash('sha256', $_POST['password']);

  $stmt = $conn->prepare("CALL login_user(?, ?, ?, @result, @user_number_out, @role_out)");
  $stmt->bind_param("sss", $usernumber, $password, $role);
  $stmt->execute();

  $result = $conn->query("SELECT @result AS result, @user_number_out AS user_number_out, @role_out AS role_out");
  $row = $result->fetch_assoc();

  if ($row['result'] === 'Login successful') {
    $user_number_out = $row['user_number_out'];
    $role_out = $row['role_out'];

    $_SESSION['user_number'] = $usernumber;
    $_SESSION['role'] = $role_out;

    if ($role_out === 'Admin') {

      $stmt = $conn->prepare("CALL fetch_user_info(?, ?)");
      $stmt->bind_param("ss", $user_number_out, $role_out);
      $stmt->execute();

      $result = $stmt->get_result();
      if ($result->num_rows > 0) {
        $admin_info = $result->fetch_assoc();

        $_SESSION['admin_id'] = $admin_info['admin_id'];
        $_SESSION['admin_number'] = $admin_info['admin_number'];
        $_SESSION['first_name'] = $admin_info['first_name'];
        $_SESSION['middle_name'] = $admin_info['middle_name'];
        $_SESSION['last_name'] = $admin_info['last_name'];
        $_SESSION['email'] = $admin_info['email'];
        $_SESSION['phone_number'] = $admin_info['phone_number'];
        $_SESSION['birthdate'] = $admin_info['birthdate'];
        $_SESSION['gender'] = $admin_info['gender'];
        $_SESSION['home_address'] = $admin_info['home_address'];
        $_SESSION['barangay'] = $admin_info['barangay'];
        $_SESSION['city'] = $admin_info['city'];

        header('Location: ./../admin/dashboard.php');
        exit;
      } else {
        echo "Admin profile not found.";
      }
      $stmt->close();
    } else {
      echo "Admin profile not found.";
    }
  } else {
    echo $role_out;
  }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EPAY | Log In</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="./../../styles/global.css">
  <style>
    *,
    *::after,
    *::before {
      font-family: 'San Francisco Rounded Regular';
    }

    .titlePage {
      font-family: 'San Francisco Rounded Heavy';
    }
  </style>
</head>
<div class="bg-[#F7EFD8] min-h-screen overflow-hidden w-full relative flex justify-center">
  <div class="absolute w-full h-screen flex flex-col gap-1 overflow-hidden">
    <img src="./../../res/images/7848733_8241.png" class="bg-cover bg-repeat" alt="">
    <img src="./../../res/images/7848733_8241.png" class="bg-cover bg-repeat" alt="">
    <img src="./../../res/images/7848733_8241.png" class="bg-cover bg-repeat" alt="">
  </div>
  <img src="./../../res/images/Logologo.png" class="w-16 absolute bottom-5" alt="">
  <div id="navBar" class="z-50 navbar border border-slate-900/10 backdrop-blur top-0 absolute">
    <div class="navbar-start">
      <div class="dropdown">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
          </svg>
        </div>
        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
          <li><a href="./pages/accounts/sign-up.php">Get Started</a></li>
          <li><a>Testimony</a></li>
          <li><a>SVFC</a></li>
          <li><a>Contact Us</a></li>
          <li><a>About Us</a></li>
        </ul>
      </div>
    </div>
    <div class="navbar-center">
      <a class="btn btn-ghost text-xl">EPAY</a>
    </div>
    <div class="navbar-end">
      <a href="./sign-up.php" class="link hover:cursor text-[#FF6BB3]">Sign Up Instead?</a>
    </div>
  </div>
  <main class="w-full">
    <div class="hero min-h-screen w-full">
      <div class="hero-content flex-col w-11/12 gap-5 lg:justify-between lg:flex-row">
        <div class="text-center">
          <h1 class="text-3xl titlePage">LOGIN</h1>
          <p class="py-6">Log In to continue.</p>
        </div>
        <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
          <form method="post" class="card-body">
            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Login As:</span>
              </div>
              <select name="role" aria-required="true" required class="mode select border-[#FF6BB3] select-bordered">
                <option disabled selected>Select Login Role:</option>
                <option value="Admin">Admin</option>
                <option value="Student">Student</option>
              </select>
              <div class="label">
              </div>
            </label>
            <div class="form-control">
              <label class="label">
                <span class="label-text">Admin or Student number:</span>
              </label>
              <input aria-required="true" name="usernumber" type="text" placeholder="User Number" class="input input-bordered border-[#FF6BB3]" required />
            </div>
            <div class="form-control">
              <label class="label">
                <span class="label-text">Password</span>
              </label>
              <input name="password" type="password" placeholder="Password" class="input input-bordered border-[#FF6BB3]" required aria-required="true" />
            </div>
            <div class="form-control mt-6">
              <button type="submit" class="btn text-white bg-[#FF6BB3]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                LOGIN
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <script>
    $(document).ready(function() {
      console.log('ready');
      $('.mode').on('mouseover', 'option', function() {
        $(this).css('background-color', 'pink');
        console.log('hovered');
      });
      $('.mode').on('mouseout', 'option', function() {
        $(this).css('background-color', '');
        console.log('hovered');
      });
    });
  </script>
  </body>

</html>