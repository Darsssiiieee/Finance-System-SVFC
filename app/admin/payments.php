<?php
session_start();
if (!isset($_SESSION['user_number']) || ($_SESSION['role'] !== 'Admin')) {
  header('Location: ./../utils/logout.php');
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Payments</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <link rel="icon" type="image/x-icon" href="./../../res/images/logo.ico">
  <link rel="preconnect" href="https://rsms.me/">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link rel="stylesheet" href="../../styles/global.css">
</head>

<body class="bg-[#F7EFD8] flex flex-col justify-center items-center">
  <?php
  include './components/admin_navbar.php';
  $currentPage = './' . basename(__FILE__);
  navbar($currentPage);
  ?>

  <main class="w-11/12 xl:w-10/12 h-full flex mt-10 flex-row justify-center gap-5">
    <?php
    include './components/admin_navbar_large.php';
    navbarLargeScreen($currentPage);
    ?>
    <section class="flex flex-col w-11/12 gap-5 justify-center items-center lg:items-start lg:grid lg:grid-cols-1 lg:gap-2">
      <table class="table">
        <thead>
          <tr>
            <th>Amount</th>
            <th>Semester</th>
            <th>Student Number</th>
            <th>Payment Method</th>
            <th>Payment Date</th>
          </tr>
        </thead>
        <tbody></tbody>
      </table>
    </section>
  </main>
  <script>
    $(document).ready(() => {
      $.ajax({
        url: 'http://127.0.0.1:5000/dashboard/transactions/all',
        type: 'GET',
        success: (response) => {
          response.forEach((transaction) => {
            $('tbody').append(`
              <tr>
                <td>${transaction.amount}</td>
                <td>${transaction.semester}</td>
                <td>${transaction.student_number}</td>
                <td>${transaction.payment_method}</td>
                <td>${transaction.payment_date}</td>
              </tr>
            `);
          });
        },
        error: (error) => {
          console.log(error);
        }
      });
    })
  </script>
</body>

</html>