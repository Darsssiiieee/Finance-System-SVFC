<?php
  session_start();
  // $role = $_SESSION['role'];
  // $student_number = $_SESSION['student_number'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EPAY | Personal Information</title>
  <link rel="icon" type="image/x-icon" href="../../../res/images/logo.ico">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="./../../../styles/global.css">
  <style>
    #personalInformationForm {
      scrollbar-color: #FF6BB3 transparent;
      scrollbar-width: thin;
    }
    *, *::after, *::before {
      font-family: 'San Francisco Rounded Regular';
    }
    .currentProgress {
      font-family: 'San Francisco Rounded Heavy';
    }
    .steps .step-secondary+.step-secondary:before, .steps .step-secondary:after {
      background-color: #FF6BB3;
    }
    </style>
</head>
<body class="bg-[#F7EFD8] min-h-screen overflow-hidden relative w-full flex justify-center">
  <div class="absolute w-full h-screen flex flex-col gap-1 overflow-hidden">
    <img src="./../../../res/images/7848733_8241.png" class="bg-cover bg-repeat" alt="">
    <img src="./../../../res/images/7848733_8241.png" class="bg-cover bg-repeat" alt="">
    <img src="./../../../res/images/7848733_8241.png" class="bg-cover bg-repeat" alt="">
  </div>
  <img src="./../../../res/images/Logologo.png" class="w-16 absolute bottom-5" alt="">
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
    <div class="hero w-full min-h-screen">
      <div class="hero-content flex-col w-11/12 gap-5 lg:gap-20 lg:justify-between lg:flex-row">
        <div class="text-center flex flex-col-reverse">
          <ul class="steps">
            <li class="currentProgress step step-secondary">Register</li>
            <li class="currentProgress step step-secondary">Role</li>
            <li class="currentProgress step step-secondary">Information</li>
            <li class="step">Review</li>
          </ul>
          <div>
            <h1 class="text-3xl text-center font-bold currentProgress">Student Personal Information</h1>
            <p class="py-6 text-center">Please fill up all the fields to continue.</p>
          </div>
        </div>

        <div id="personalInformationForm" class="card backdrop-blur shrink-0 w-full max-h-96 overflow-scroll overflow-x-hidden p-3 max-w-sm shadow-2xl">
          <form action="./review-information-student.php" method="post" class="card-body">
            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Student Number</span>
              </div>
              <input disabled name="student_number" value="<?php echo $student_number; ?>" id="firstname" type="text" class="input input-bordered input-secondary w-full max-w-xs" required aria-required=true/>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <div class="form-control">
              <label class="label">
                <span class="label-text">Your Role</span>
              </label>
              <input disabled name="role" class="input input-bordered border-[#FF6BB3] w-full max-w-xs" required aria-required="true" value="" type="text">
            </div>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Firstname</span>
              </div>
              <input name="firstname" id="firstname" type="text" placeholder="First Name" class="input input-bordered border-[#FF6BB3] w-full max-w-xs" required aria-required=true/>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>


            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Middle Name</span>
              </div>
              <input name="middlename" id="middlename" type="text" placeholder="Middle Name" class="input input-bordered border-[#FF6BB3] w-full max-w-xs" required aria-required=true/>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Last Name</span>
              </div>
              <input name="lastname" id="middlename" type="text" placeholder="Last Name" class="input input-bordered border-[#FF6BB3] w-full max-w-xs" required aria-required=true/>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Birth Date</span>
              </div>
              <input name="birthdate" id="birthdate" type="date" class="input input-bordered border-[#FF6BB3] w-full max-w-xs" required aria-required=true/>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Gender</span>
              </div>
              <select name="gender" required aria-required="true" class="select border-[#FF6BB3] w-full max-w-xs">
                <option disabled selected>Your Gender</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
                <option value="Non-Binary">Non-Binary</option>
                <option value="Others">Others</option>
              </select>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Email</span>
              </div>
              <input name="email" id="email" type="email" class="input input-bordered border-[#FF6BB3] w-full max-w-xs" placeholder="youremail@gmail.com" required aria-required=true/>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Phone</span>
              </div>
              <input name="phone" id="phone" type="tel" class="input input-bordered border-[#FF6BB3] w-full max-w-xs" placeholder="09123456789" required aria-required=true/>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Academic Program</span>
              </div>
              <select name="academicprogram" required aria-required="true" class="select border-[#FF6BB3] w-full max-w-xs">
                <option disabled selected>Your Academic Program</option>
                <option value="Bachelor of Elementary Education">Bachelor of Elementary Education</option>
                <option value="Bachelor of Science in Accountancy">Bachelor of Science in Accountancy</option>
                <option value="Bachelor of Science in Hotel and Restaurant Management">Bachelor of Science in Hotel and Restaurant Management</option>
                <option value="Bachelor of Science in Information Technology">Bachelor of Science in Information Technology</option>
                <option value="Bachelor of Secondary Education">Bachelor of Secondary Education</option>
              </select>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Year Level:</span>
              </div>
              <select name="yearlevel" required aria-required="true" class="select border-[#FF6BB3] w-full max-w-xs">
                <option disabled selected>Year Level</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Home Address</span>
              </div>
              <input name="homeaddress" id="homeaddress" type="text" class="input input-bordered border-[#FF6BB3] w-full max-w-xs" placeholder="123 Main Street" required aria-required=true/>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Barangay</span>
              </div>
              <input name="barangay" id="barangay" type="text" class="input input-bordered border-[#FF6BB3] w-full max-w-xs" placeholder="Barangay 176" required aria-required=true/>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">City</span>
              </div>
              <input name="city" id="city" type="text" class="input input-bordered border-[#FF6BB3] w-full max-w-xs" placeholder="New York City" required aria-required=true/>
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>


            <div class="form-control gap-5 mt-6">
              <button type="submit" class="btn text-white bg-[#FF6BB3] hover:scale-105">
                FINALIZE
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z" />
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
        window.location.href = "./role-selection.php"
      })
      
      const firstnameInput = document.getElementById('firstname')
      const middlenameInput = document.getElementById('middlename')
      const lastnameInput = document.getElementById('lastname')
      const birthdateInput = document.getElementById('birthdate')
      const genderInput = document.getElementById('gender')
      const emailInput = document.getElementById('email')
      const phoneInput = document.getElementById('phone')
      const academicprogramInput = document.getElementById('academicprogram')
      const yearlevelInput = document.getElementById('yearlevel')
      const homeaddressInput = document.getElementById('homeaddress')
      const barangayInput = document.getElementById('barangay')
      const cityInput = document.getElementById('city')

      firstnameInput.value = sessionStorage.getItem("firstname")
      middlenameInput.value = sessionStorage.getItem("middlename")
      lastnameInput.value = sessionStorage.getItem("lastname")
      birthdateInput.value = sessionStorage.getItem("birthdate")
      genderInput.value = sessionStorage.getItem("gender")
      emailInput.value = sessionStorage.getItem("email")
      phoneInput.value = sessionStorage.getItem("phone")
      academicprogramInput.value = sessionStorage.getItem("academicprogram")
      yearlevelInput.value = sessionStorage.getItem("yearlevel")
      homeaddressInput.value = sessionStorage.getItem("homeaddress")
      barangayInput.value = sessionStorage.getItem("barangay")
      cityInput.value = sessionStorage.getItem("city")

      

      

      $("#personalInformationForm").submit(e => {
        const firstname = $("#firstname").val()
        const middlename = $("#middlename").val()
        const lastname = $("#lastname").val()
        const birthdate = $("#birthdate").val()
        const gender = $("#gender").val()
        const email = $("#email").val()
        const phone = $("#phone").val()
        const academicprogram = $("#academicprogram").val()
        const yearlevel = $("#yearlevel").val()
        const homeaddress = $("#homeaddress").val()
        const barangay = $("#barangay").val()
        const city = $("#city").val()

        // Check if any of the fields are empty
        if (!firstname || !middlename || !lastname || !birthdate || !gender || !email || !phone || !academicprogram || !yearlevel || !homeaddress || !barangay || !city) {
          alert("Please fill in all fields.");
          e.preventDefault();
          return;
        }

        // Check if email is valid
        const emailRegex = /^[\w-]+(\.[\w-]+)*@([\w-]+\.)+[a-zA-Z]{2,7}$/;
        if (!emailRegex.test(email)) {
          alert("Please enter a valid email address.");
          e.preventDefault();
          return;
        }

        // Check if phone number is valid
        const phoneRegex = /^\d{10}$/;
        if (!phoneRegex.test(phone)) {
          alert("Please enter a valid phone number.");
          e.preventDefault();
          return;
        }

        // Check if birthdate is valid
        const birthdateRegex = /^\d{4}-\d{2}-\d{2}$/;
        if (!birthdateRegex.test(birthdate)) {
          alert("Please enter a valid birthdate.");
          e.preventDefault();
          return;
        }

        // Check if year level is valid
        if (yearlevel < 1 || yearlevel > 5) {
          alert("Please enter a valid year level.");
          e.preventDefault();
          return;
        }

        sessionStorage.setItem("firstname", firstname)
        sessionStorage.setItem("middlename", middlename)
        sessionStorage.setItem("lastname", lastname)
        sessionStorage.setItem("birthdate", birthdate)
        sessionStorage.setItem("gender", gender)
        sessionStorage.setItem("email", email)
        sessionStorage.setItem("phone", phone)
        sessionStorage.setItem("academicprogram", academicprogram)
        sessionStorage.setItem("yearlevel", yearlevel)
        sessionStorage.setItem("homeaddress", homeaddress)
        sessionStorage.setItem("barangay", barangay)
        sessionStorage.setItem("city", city)
      })
    })
  </script>
</body>
</html>