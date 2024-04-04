<?php
  session_start();
  $role = $_SESSION['role'];
  $admin_number = $_SESSION['admin_number'];
  $firstname = $_SESSION['firstname'];
  $middlename = $_SESSION['middlename'];
  $lastname = $_SESSION['lastname'];
  $email = $_SESSION['email'];
  $phonenumber = $_SESSION['phonenumber'];
  $birthdate = $_SESSION['birthdate'];
  $gender = $_SESSION['gender'];
  $homeaddress = $_SESSION['homeaddress'];
  $barangay = $_SESSION['barangay'];
  $city = $_SESSION['city'];
  $username = $_SESSION['username'];
  $password = $_SESSION['password'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EPAY | Personal Information</title>
  <link rel="icon" type="image/x-icon" href="../../../res/images/logo.ico">
  <title>EPAY | Sign Up</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="./../../../styles/global.css">
  <style>
    *, *::after, *::before {
      font-family: 'San Francisco Rounded Regular';
    }
    .currentProgress {
      font-family: 'San Francisco Rounded Heavy';
    }
    #personalInformationForm {
      scrollbar-color: #ff00d3 transparent;
      scrollbar-width: thin;
    }
    .steps .step-secondary+.step-secondary:before, .steps .step-secondary:after {
      background-color: #536F16;
    }
  </style>
</head>
<body class="bg-[#F7EFD8] min-h-screen overflow-hidden relative w-full flex justify-center">
  <div class="absolute w-full h-screen flex flex-col gap-1 overflow-hidden">
    <img src="./../../../res/images/7848733_8241.png" class="bg-cover bg-repeat" alt="">
    <img src="./../../../res/images/7848733_8241.png" class="bg-cover bg-repeat" alt="">
    <img src="./../../../res/images/7848733_8241.png" class="bg-cover bg-repeat" alt="">
  </div>
  <img src="./../../../res/images/Logologo.png" class="w-16 bottom-5 absolute self-center" alt="">
  <div id="navBar" class="z-50 navbar border absolute top-0 border-slate-900/10 backdrop-blur">
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
      <a href="./../login.php" class="link hover:cursor text-[#FF6BB3]">Log In Instead?</a>
    </div>
  </div>

  <main class="w-full">
    <div class="hero min-h-screen">
      <div class="hero-content flex-col w-11/12 lg:justify-between lg:flex-row">
        <div class="text-center flex flex-col-reverse gap-5">
          <ul class="steps">
            <li class="currentProgress step step-secondary">Register</li>
            <li class="currentProgress step step-secondary">Role</li>
            <li class="currentProgress step step-secondary">Info</li>
            <li class="currentProgress step step-secondary">Review</li>
          </ul>
          <div>
            <h1 class="text-3xl currentProgress text-center font-bold">Review Admin's Personal Information</h1>
            <p class="py-6 text-center">Review All Information.</p>
          </div>
        </div>
        <div id="personalInformationForm" class="card shrink-0 w-full max-h-96 overflow-scroll overflow-x-hidden max-w-sm shadow-2xl bg-base-100">
          <form method="post" action="./../../utils/addNewUser.php" class="card-body">
            <input type="hidden" name="adminnumber" value="<?php echo $admin_number ?>" />
            <input type="hidden" value="<?php echo $role ?>" name="role" />
            <input type="hidden" value="<?php echo $username ?>" name="username" />
            <input type="hidden" value="<?php echo $password ?>" name="password" />
            
            <div class="form-control">
              <label class="label">
                <span class="label-text">First Name</span>
              </label>
              <input type="text" name="firstname" value="<?php echo $firstname ?>" class="input border-[#FF6BB3] input-bordered" required aria-required="true"  />
            </div>
            <div class="form-control">
              <label class="label">
                <span class="label-text
                ">Middle Name</span>
              </label>
              <input type="text" name="middlename" value="<?php echo $middlename ?>" class="input border-[#FF6BB3] input-bordered" required aria-required="true"  />
            </div>
            <div class="form-control">
              <label class="label">
                <span class="label-text
                ">Last Name</span>
              </label>
              <input type="text" name="lastname" value="<?php echo $lastname?>" class="input border-[#FF6BB3] input-bordered" required aria-required="true"  />
            </div>
            <div class="form-control">
              <label class="label">
                <span class="label-text
                ">Email</span>
              </label>
              <input type="email" name="email" value="<?php echo $email ?>" class="input border-[#FF6BB3] input-bordered" required aria-required="true"  />
            </div>
            <div class="form-control">
              <label class="label">
                <span class="label-text
                ">Phone Number</span>
              </label>
              <input name="phonenumber" value="<?php echo $phonenumber ?>" type="tel" class="input border-[#FF6BB3] input-bordered" required aria-required="true"  />
            </div>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Birth Date</span>
              </div>
              <input name="birthdate" value="<?php echo $birthdate ?>" id="birthdate" type="date" class="input input-bordered border-[#FF6BB3] w-full max-w-xs" required aria-required="true"  />
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Gender</span>
              </div>
              <input name="gender" value="<?php echo $gender ?>" id="birthdate" type="text" class="input input-bordered border-[#FF6BB3] w-full max-w-xs" required aria-required="true"  />
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Home Address</span>
              </div>
              <input name="homeaddress" value="<?php echo $homeaddress ?>" id="homeaddress" type="text" class="input input-bordered border-[#FF6BB3] w-full max-w-xs"  required aria-required="true" />
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Barangay</span>
              </div>
              <input name="barangay" value="<?php echo $barangay ?>" id="barangay" type="text" class="input input-bordered border-[#FF6BB3] w-full max-w-xs" required aria-required="true" />
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">City</span>
              </div>
              <input name="city" id="city" value="<?php echo $city ?>" type="text" class="input input-bordered border-[#FF6BB3] w-full max-w-xs" required aria-required="true" />
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <div class="form-control gap-5 mt-6">
              <button type="submit" class="btn bg-[#FF6BB3] hover:scale-105">
                SUBMIT
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z" />
                </svg>

              </button>
              <button type="button" id="backButton" class="btn btn-ghost bg-zinc-300 hover:scale-105">
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
      $("#backButton").click(e => {
        e.preventDefault()
        window.location.href = "./admin-information.php"
      })
    })
  </script>
</body>
</html>