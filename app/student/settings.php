<?php
session_start();
if ($_SESSION['role'] !== 'Student') {
  header('Location: ./../accounts/login.php');
  exit();
}
$student_number = $_SESSION['user_number'];
$firstname_initial = substr($_SESSION['first_name'], 0, 1);
$lastname_initial = substr($_SESSION['last_name'], 0, 1);
$user_initial = $firstname_initial . $lastname_initial;
$student_settings_url = '/finance-system-svfc/app/student/settings.php';
$current_url = $_SERVER['REQUEST_URI'];
$is_student_settings_page = ($current_url === $student_settings_url);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student | Settings</title>
  <link rel="icon" type="image/x-icon" href="./../../res/images/logo.ico">
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <link rel="preconnect" href="https://rsms.me/">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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


<body class="bg-[#F7EFD8] flex flex-col items-center w-full min-h-screen">
  <?php
  include './components/student_navbar_sm.php';
  $currentPage = './' . basename(__FILE__);
  student_navbar_sm($currentPage);
  ?>

  <main class="w-11/12 max-w-screen-2xl xl:w-10/12 h-full flex mt-10 flex-row justify-center gap-5">
    <?php
    include './components/student_navbar_lg.php';
    student_navbar_lg($currentPage);
    ?>

    <section class="flex flex-col w-11/12 gap-5 justify-center items-center lg:items-start lg:grid lg:grid-cols-1 lg:gap-2">


      <div id="personalInformationForm" class="card shrink-0 w-full h-auto w-full shadow-2xl bg-base-100 mb-6 p-5 lg:p-10">
        <h1 class="labelTitle text-3xl text-center">Student Personal Information</h1>
        <form method="post" action="./review-information-admin.php" class="card-body flex flex-col justify-center gap-10 items-end">
          <div class="grid-cols-1 lg:grid-cols-3 grid gap-10 w-full">
            <div class="form-control">
              <label class="label">
                <span class="label-text">First Name</span>
              </label>
              <input value="<?php echo $_SESSION['first_name'] ?>" type="text" name="firstname" placeholder="First Name" class="input border-[#FF6BB3] input-bordered" required />
            </div>
            <div class="form-control">
              <label class="label">
                <span class="label-text
          ">Middle Name</span>
              </label>
              <input value="<?php echo $_SESSION['middle_name'] ?>" type="text" name="middlename" placeholder="Middle Name" class="input border-[#FF6BB3] input-bordered" required />
            </div>
            <div class="form-control">
              <label class="label">
                <span class="label-text
          ">Last Name</span>
              </label>
              <input value="<?php echo $_SESSION['last_name'] ?>" type="text" name="lastname" placeholder="Last Name" class="input border-[#FF6BB3] input-bordered" required />
            </div>
            <div class="form-control">
              <label class="label">
                <span class="label-text
          ">Email</span>
              </label>
              <input value="<?php echo $_SESSION['email'] ?>" type="email" class="input border-[#FF6BB3] input-bordered" placeholder="Email" class="input input-bordered" required />
            </div>
            <div class="form-control">
              <label class="label">
                <span class="label-text
       ">Phone Number</span>
              </label>
              <input value="<?php echo $_SESSION['phone_number'] ?>" name="phone_number" type="tel" placeholder="Phone Number" class="input border-[#FF6BB3] input-bordered" required />
            </div>

            <label class="form-control w-full">
              <div class="label">
                <span class="label-text">Birth Date</span>
              </div>
              <input value="<?php echo $_SESSION['birthdate'] ?>" disabled aria-disabled="true" name="birthdate" id="birthdate" type="date" class="input input-bordered input-secondary w-full border-[#FF6BB3]" required aria-required=true />
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full">
              <div class="label">
                <span class="label-text">Gender</span>
              </div>
              <input value="<?php echo $_SESSION['gender'] ?>" disabled aria-disabled="true" name="gender" id="gender" type="text" class="input input-bordered input-secondary w-full border-[#FF6BB3]" required aria-required=true />
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full">
              <div class="label">
                <span class="label-text">Home Address</span>
              </div>
              <input value="<?php echo $_SESSION['home_address'] ?>" name="homeaddress" id="homeaddress" type="text" class="input input-bordered input-secondary w-full border-[#FF6BB3]" placeholder="123 Main Street" required aria-required=true />
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full">
              <div class="label">
                <span class="label-text">Barangay</span>
              </div>
              <input value="<?php echo $_SESSION['barangay'] ?>" name="barangay" id="barangay" type="text" class="input input-bordered input-secondary w-full border-[#FF6BB3]" placeholder="Barangay 176" required aria-required=true />
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>

            <label class="form-control w-full">
              <div class="label">
                <span class="label-text">City</span>
              </div>
              <input value="<?php echo $_SESSION['city'] ?>" name="city" id="city" type="text" class="input border-[#FF6BB3] input-bordered input-secondary w-full" placeholder="New York City" required aria-required=true />
              <div class="label">
                <span id="errorLabel" class="label-text-alt"></span>
              </div>
            </label>
          </div>
          <div class="form-control w-full md:w-1/3 gap-5 mt-6">
            <button type="submit" class="saveChanges btn w-auto font-bold btn-secondary border-none bg-[#FF6BB3] hover:scale-105">
              SAVE CHANGES
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z" />
              </svg>
            </button>
          </div>
        </form>
      </div>
    </section>
  </main>
  <script>
    const openLogoutModal = () => document.getElementById("logout_modal").showModal();
    const closeLogoutModal = () => document.getElementById("logout_modal").close();
    const logout = () => window.location.href = "./../utils/logout.php";
    $(document).ready(() => {

    })
  </script>
</body>

</html>