<?php
  session_start();
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $role = $_POST['role'];
    function generateRandomNumber($role) {
      if ($role === "Admin") {
        return 'A-' . str_pad(mt_rand(0, 9999999), 7, '0', STR_PAD_LEFT);
      }
      return 'S-' . str_pad(mt_rand(0, 9999999), 7, '0', STR_PAD_LEFT);
    }

    $valid_roles = array("Admin", "Student");
    if (!in_array($role, $valid_roles)) {
      echo "<script>alert('Invalid role selected') window.location.href='./role-selection.php'</script>";
      exit();
    }
    
    else if ($role === "Admin") {
      $_SESSION['role'] = $role;
      $_SESSION['admin_id'] = generateRandomNumber($role);
      header('Location: ./admin-information.php');
    }

    else if ($role === "Student"){
      $_SESSION['role'] = $role;
      $_SESSION['student_id'] = generateRandomNumber($role);
      header('Location: ./student-information.php');
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/x-icon" href="../../../res/images/logo.ico">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="./../../../styles/global.css">
  <title>EPAY | Role Select</title>
  <style>
    .currentProgress {
      font-family: 'San Francisco Rounded Heavy';
    }
  </style>
</head>
<body class="relative">
  <div id="navBar" class="z-50 navbar border border-slate-900/10 backdrop-blur top-0 absolute">
    <div class="navbar-start">
      <div class="dropdown">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
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
      <a href="./login.php" class="link hover:cursor link-secondary">Log In Instead?</a>
    </div>
  </div>

  <main>
    <div class="hero min-h-screen bg-base-200">
      <div class="hero-content flex-col w-11/12 gap-20 lg:justify-between lg:flex-row">
        <div class="text-center gap-20 flex flex-col-reverse">
          <ul class="steps">
            <li class="currentProgress step step-secondary">Register</li>
            <li class="currentProgress step step-secondary">Select Role</li>
            <li class="step">Personal Info</li>
            <li class="step">Your Info</li>
          </ul>
          <div>
            <h1 class="text-3xl text-center font-bold">Select Appropriate Role</h1>
            <p class="py-6 text-center">Select a Role to continue.</p>
          </div>
        </div>
        <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
          <form id="roleForm" method="post" class="card-body">
            <div class="form-control">
              <label class="label">
                <span class="label-text">Select a Role</span>
              </label>
              <select id="roleSelect" name="role" required aria-required="true" class="select select-bordered w-full max-w-xs">
                <option disabled selected>Your Role</option>
                <option value="Admin">Admin</option>
                <option value="Student">Student</option>
              </select>
            </div>
            <div class="form-control gap-5 mt-6">
              <button type="submit" class="btn btn-secondary bg-[#ff00d3] hover:scale-105">
                CONTINUE
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z" />
                </svg>
              </button>
              <button id="backButton" class="btn btn-ghost bg-zinc-300 hover:scale-105">
                BACK
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
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
      const roleSelect = $("#roleSelect")
      if (sessionStorage.getItem("role")) {
        roleSelect.val(sessionStorage.getItem("role"))
      }
      if (sessionStorage.getItem("role")) {
        roleSelect.val(sessionStorage.getItem("role"))
      }
      $("#roleForm").submit(e => {
        if (roleSelect.val() === "Your Role") {
          e.preventDefault()
          alert("Please select a role")
        } else {
          sessionStorage.setItem("role", roleSelect.val())
        }
      })


      $("#backButton").click(e => {
        e.preventDefault()
        window.location.href = "./../sign-up.php"
      })
    })
  </script>
</body>
</html>