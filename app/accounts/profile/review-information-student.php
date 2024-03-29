<?php
  session_start();
  // if ($_SERVER["REQUEST_METHOD"] == "POST") {
  //   $student_number = $_SESSION['student_number'];
  //   $role = $_SESSION['role'];
  //   $firstname = $_POST['firstname'];
  //   $middlename = $_POST['middlename'];
  //   $lastname = $_POST['lastname'];
  //   $birthdate = $_POST['birthdate'];
  //   $gender = $_POST['gender'];
  //   $email = $_POST['email'];
  //   $phone = $_POST['phone'];
  //   $academicprogram = $_POST['academicprogram'];
  //   $yearlevel = $_POST['yearlevel'];
  //   $homeaddress = $_POST['homeaddress'];
  //   $barangay = $_POST['barangay'];
  //   $city = $_POST['city'];
    
  // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EPAY | Review Information</title>
  <link rel="icon" type="image/x-icon" href="../../../res/images/logo.ico">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="../../../styles/global.css">
  <style>
    *, *::after, *::before {
      font-family: 'San Francisco Rounded Regular';
    }
    .currentProgress {
      font-family: 'San Francisco Rounded Heavy';
    }
    .steps .step-secondary+.step-secondary:before, .steps .step-secondary:after {
      background-color: #536F16;
    }
    #personalInformationForm {
      scrollbar-color: #FF6BB3 transparent;
      scrollbar-width: thin;
      scrollbar-arrow-color: transparent;
    }
  </style>
</head>
<body class="bg-[#F7EFD8] flex justify-center min-h-screen overflow-hidden relative w-full">
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
      <a href="./login.php" class="link hover:cursor text-[#FF6BB3]">Log In Instead?</a>
    </div>
  </div>

  <main class="w-full">
    <div class="hero w-full min-h-screen">
      <div class="hero-content flex-col w-11/12 gap-10 lg:gap-20 lg:justify-between lg:flex-row">
        <div class="text-center flex flex-col-reverse">
          <ul class="steps">
            <li class="currentProgress step step-secondary">Register</li>
            <li class="currentProgress step step-secondary">Role</li>
            <li class="currentProgress step step-secondary">Information</li>
            <li class="currentProgress step step-secondary">Review</li>
          </ul>
          <div>
            <h1 class="text-3xl text-center font-bold currentProgress">Review Your Information</h1>
            <p class="py-6 text-center">Please double check before continuing.</p>
          </div>
        </div>

        <div id="personalInformationForm" class="card shrink-0 w-full max-h-96 overflow-scroll overflow-x-hidden max-w-sm shadow-2xl backdrop-blur">
          <form action="./review-info.php" method="post" class="card-body">
            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Student Number</span>
              </div>
              <input aria-disabled="true" disabled name="student_number" value="<?php echo $student_number; ?>" id="firstname" type="text" class="input input-bordered input-secondary w-full max-w-xs" required aria-required=true/>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <div class="form-control">
              <label class="label">
                <span class="label-text">Your Role</span>
              </label>
              <input disabled class="input input-bordered input-secondary w-full max-w-xs" aria-disabled="true" value="<?php echo $role; ?>" required aria-required="true" value="<?php echo $role?>" type="text">
            </div>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Firstname</span>
              </div>
              <input name="firstname" id="firstname" value="<?php echo $firstname; ?>" disabled aria-disabled="true" type="text" class="input input-bordered input-secondary w-full max-w-xs" required aria-required=true/>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>


            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Middle Name</span>
              </div>
              <input name="middlename" id="middlename" value="<?php echo $middlename; ?>" type="text" class="input input-bordered input-secondary w-full max-w-xs" disabled aria-disabled="true" required aria-required=true/>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Last Name</span>
              </div>
              <input name="lastname" id="lastname" type="text" value="<?php echo $lastname; ?>" aria-disabled="true" disabled class="input input-bordered input-secondary w-full max-w-xs" required aria-required=true/>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Birth Date</span>
              </div>
              <input name="birthdate" id="birthdate" type="date" value="<?php echo $birthdate; ?>" aria-disabled="true" disabled class="input input-bordered input-secondary w-full max-w-xs" required aria-required=true/>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Gender</span>
              </div>
              <input name="gender" id="gender" type="text" value="<?php echo $gender; ?>" aria-disabled="true" disabled class="input input-bordered input-secondary w-full max-w-xs" required aria-required=true/>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Email</span>
              </div>
              <input disabled aria-disabled="true" name="email" id="email" value="<?php echo $email; ?>" type="email" class="input input-bordered input-secondary w-full max-w-xs" required aria-required=true/>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Phone</span>
              </div>
              <input disabled aria-disabled="true" value="<?php echo $phone?>" name="phone" id="phone" type="tel" class="input input-bordered input-secondary w-full max-w-xs" required aria-required=true/>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Academic Program</span>
              </div>
              <input disabled aria-disabled="true" name="academicprogram" id="academicprogram" type="text" class="input input-bordered input-secondary w-full max-w-xs" required aria-required="true" value="<?php echo $academicprogram; ?>" />
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Year Level:</span>
              </div>
              <input disabled aria-disabled="true" name="yearlevel" id="yearlevel" type="text" class="input input-bordered input-secondary w-full max-w-xs" required aria-required="true" value="<?php echo $yearlevel; ?>" />
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Home Address</span>
              </div>
              <input disabled aria-disabled="true" value="<?php echo $homeaddress; ?>" name="homeaddress" id="homeaddress" type="text" class="input input-bordered input-secondary w-full max-w-xs" required aria-required=true/>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Barangay</span>
              </div>
              <input disabled aria-disabled="true" name="barangay" value="<?php echo $barangay; ?>" id="barangay" type="text" class="input input-bordered input-secondary w-full max-w-xs" required aria-required=true/>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">City</span>
              </div>
              <input disabled aria-disabled="true" name="city" id="city" type="text" value="<?php echo $city; ?>" class="input input-bordered input-secondary w-full max-w-xs" required aria-required=true/>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <div class="form-control gap-5 mt-6">
              <button type="submit" class="btn btn-secondary border-[#FF6BB3] bg-[#FF6BB3] hover:scale-105">
                FINALIZE
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
      $("#backButton").click(e => {
        e.preventDefault()
        window.location.href = "./student-information.php"
      })
    })
  </script>
</body>
</html>