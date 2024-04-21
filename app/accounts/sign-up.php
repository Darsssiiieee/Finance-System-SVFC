<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if ($password !== $confirmPassword) {
    echo "<script>alert('Passwords do not match')</script>";
    exit();
  } else {
    $_SESSION['username'] =  $_POST['username'];
    $_SESSION['password'] = $_POST['password'];
    header('Location: ./profile/role-selection.php');
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../../res/images/logo.ico">
  <title>EPAY | Sign Up</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="preconnect" href="https://rsms.me/">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <style>
    *,
    *::before,
    *::after {
      box-sizing: border-box;
      padding: 0;
      margin: 0;
      font-family: "InterVariable";
    }
  </style>
</head>

<body class="bg-[#F7EFD8] min-h-screen overflow-hidden relative w-full flex justify-center">
  <div class="absolute w-full h-screen flex flex-col gap-1 overflow-hidden">
    <img src="./../../res/images/7848733_8241.png" class="bg-cover bg-repeat" alt="">
    <img src="./../../res/images/7848733_8241.png" class="bg-cover bg-repeat" alt="">
    <img src="./../../res/images/7848733_8241.png" class="bg-cover bg-repeat" alt="">
  </div>
  <img src="./../../res/images/Logologo.png" class="w-16 bottom-5 absolute self-center" alt="">
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
      <a href="./login.php" class="link hover:cursor text-[#FF6BB3]">Log In Instead?</a>
    </div>
  </div>
  <main class="w-full">
    <div class="hero w-full min-h-screen">
      <div class="hero-content flex-col lg:flex-row w-11/12 lg:w-3/4 lg:justify-between">
        <div class="text-center flex flex-col-reverse gap-5 lg:gap-20">
          <ul class="steps">
            <li class="currentProgress step step-secondary">Register</li>
            <li class="step">Role</li>
            <li class="step">Information</li>
            <li class="step">Review</li>
          </ul>
          <div>
            <h1 class="text-3xl text-center font-bold currentProgress">Sign Up</h1>
            <p class="py-6 text-center">Sign Up to continue.</p>
          </div>
        </div>
        <div class="card backdrop-blur shrink-0 w-full max-w-sm shadow-2xl">
          <form method="post" class="card-body">
            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Username</span>
              </div>
              <input name="username" minlength="4" maxlength="50" id="username" type="text" placeholder="Username" class="input input-bordered input-secondary w-full max-w-xs border-[#FF6BB3]" required aria-required=true />
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Password</span>
              </div>
              <input name="password" minlength="8" id="password" type="password" placeholder="Password" class="input input-bordered input-secondary w-full max-w-xs border-[#FF6BB3]" required aria-required=true />
              <div class="label">
                <span id="errorLabelPassword" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Confirm Password</span>
              </div>
              <input name="confirmPassword" id="confirmPassword" type="password" placeholder="Password" class="input input-bordered border-[#FF6BB3] input-secondary w-full max-w-xs" required aria-required=true />
              <div class="label">
                <span id="errorLabelConfirm" class="label-text-alt"></span>
              </div>
            </label>

            <div class="form-control">
              <label class="cursor-pointer label">
                <span class="label-text">Show Password</span>
                <input type="checkbox" class="checkbox checkbox-secondary border-[#FF6BB3]" />
              </label>
            </div>
            <div class="form-control gap-5 mt-6">
              <button type="submit" class="btn btn-secondary border-[#FF6BB3] bg-[#FF6BB3] hover:scale-105">
                CONTINUE
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z" />
                </svg>
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
  <script>
    $(document).ready(() => {
      const usernameInput = document.getElementById('username')
      const storedUsername = sessionStorage.getItem('username')
      if (storedUsername) usernameInput.value = storedUsername
      const passwordInput = document.getElementById('password')
      const confirmPasswordInput = document.getElementById('confirmPassword')
      const storedPassword = sessionStorage.getItem('password')
      if (storedPassword) {
        passwordInput.value = storedPassword
        confirmPasswordInput.value = storedPassword
      }
      const checkbox = document.querySelector('input[type="checkbox"]')
      checkbox.addEventListener('change', () => {
        password.type = checkbox.checked ? 'text' : 'password';
      })

      $("form").submit((e) => {
        const password = $("#password").val();
        const confirmPassword = $("#confirmPassword").val()
        if (password.length < 8) {
          alert("Password must be at least 8 characters long")
          e.preventDefault()
        } else if (password !== confirmPassword) {
          alert("Passwords do not match")
          e.preventDefault()
        }
        sessionStorage.setItem("username", $("#username").val())
        sessionStorage.setItem("password", $("#password").val())
      })

      $("#password").on("input", () => {
        const password = $("#password").val();
        const confirmPassword = $("#confirmPassword").val()
        if (password !== confirmPassword) {
          $("#confirmPassword").addClass("input-error")
          $("#confirmPassword").removeClass("input-secondary")
          $("#errorLabelPassword").text("Passwords do not match")
          $("#errorLabelPassword").addClass("text-red-600")
        } else {
          $("#confirmPassword").removeClass("input-error")
          $("#confirmPassword").addClass("input-secondary")
          $("#errorLabelPassword").text("")
          $("#errorLabelPassword").removeClass("text-red-600")
          $("#errorLabelConfirm").text("")
          $("#errorLabelConfirm").removeClass("text-red-600")
        }
      })

      $("#confirmPassword").on("input", () => {
        const password = $("#password").val()
        const confirmPassword = $("#confirmPassword").val()
        if (password !== confirmPassword) {
          $("#confirmPassword").addClass("input-error");
          $("#confirmPassword").removeClass("input-secondary")
          $("#errorLabelConfirm").text("Passwords do not match")
          $("#errorLabelConfirm").addClass("text-red-600")
        } else {
          $("#confirmPassword").removeClass("input-error")
          $("#confirmPassword").addClass("input-secondary")
          $("#errorLabelConfirm").text("")
          $("#errorLabelConfirm").removeClass("text-red-600")
          $("#errorLabelPassword").text("")
          $("#errorLabelPassword").removeClass("text-red-600")
        }
      })

      $("#username").on("input", () => {
        const username = $("#username").val();
        if (username.length < 4) {
          $("#username").addClass("input-error")
          $("#username").removeClass("input-secondary")
          $("#errorLabel").text("Username must be at least 4 characters long")
          $("#errorLabel").addClass("text-red-600")
        } else {
          $("#username").removeClass("input-error")
          $("#username").addClass("input-secondary")
          $("#errorLabel").text("")
          $("#errorLabel").removeClass("text-red-600")
        }
      })
    })
  </script>
</body>

</html>