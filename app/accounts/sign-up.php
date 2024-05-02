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
  <link rel="stylesheet" href="./../../styles/global.css">
  <script src="./js/signup.js"></script>
</head>

<body class="bg-[#F7EFD8] min-h-screen overflow-hidden relative w-full flex flex-col justify-center">
  <dialog id="status_modal" class="backdrop-blur modal modal-bottom sm:modal-middle">
    <div class="modal-box">
      <h3 id="status_message" class="font-bold text-lg"></h3>
      <p id="status_info" class="py-4"></p>
      <div class="modal-action">
        <form method="dialog">
          <button class="btn">OKAY</button>
        </form>
      </div>
    </div>
  </dialog>
  <div class="navbar">
    <div class="flex-1">
      <a class="btn btn-ghost text-xl">EPAY</a>
    </div>
    <div class="flex-none">
      <ul class="menu menu-horizontal px-1">
        <li><a href="./login.php">Login Instead</a></li>
      </ul>
    </div>
  </div>
  <main class="w-full">
    <div class="hero w-full min-h-screen">
      <div class="hero-content flex-col lg:flex-row w-11/12 lg:w-3/4 lg:justify-between">
        <div class="text-center flex flex-col-reverse gap-5 lg:gap-20">
          <ul class="steps">
            <li class="step step-secondary">Role</li>
            <li class="step">Password Creation</li>
            <li class="step">Avatar</li>
            <li class="step">Information</li>
            <li class="step">Review</li>
          </ul>
          <div>
            <h1 id="currentPage" class="text-3xl text-center font-bold currentProgress">Sign Up</h1>
            <p id="currentPageMiscText" class="py-6 text-center">Sign Up to continue.</p>
          </div>
        </div>
        <div class="card bg-base-100 shrink-0 w-full max-w-sm shadow-2xl max-h-96 overflow-scroll overflow-x-hidden p-3">
          <?php
          include './components/sign-up-forms/step-1-form.php';
          include './components/sign-up-forms/step-2-form.php';
          include './components/sign-up-forms/step-3-form.php';
          include './components/sign-up-forms/step-4-admin-form.php';
          include './components/sign-up-forms/step-4-student-form.php';
          include './components/sign-up-forms/step-5-review-admin-form.php';
          include './components/sign-up-forms/step-5-review-student-form.php';
          step_1_form();
          step_2_form();
          step_3_form();
          step_4_admin_form();
          step_4_student_form();
          step_5_review_admin_form();
          step_5_review_student_form();
          ?>
        </div>
      </div>
    </div>
  </main>
</body>

</html>