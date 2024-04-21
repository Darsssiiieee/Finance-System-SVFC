<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EPAY | Report a Bug</title>
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

    </section>
</body>

</html>