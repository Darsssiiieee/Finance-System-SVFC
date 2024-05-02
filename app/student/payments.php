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
$student_payments_url = '/finance-system-svfc/app/student/payments.php';
$current_url = $_SERVER['REQUEST_URI'];
$is_student_payments_page = ($current_url === $student_payments_url);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student | Payments</title>
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

    <section class="flex flex-col w-11/12 gap-5 items-center">
      <h1 class="text-xl text-gray-600 font-bold lg:text-2xl xl:text-4xl text-left">Your Payment Transactions</h1>
      <div class="card w-full min-h-96 p-5 bg-base-100 shadow-xl">
        <div class="overflow-x-auto w-full flex flex-col gap-5">
          <table id="payments_table" class="table">
            <thead>
              <tr class="text-center font-bold text-sm">
                <th>Payment ID</th>
                <th>Payment Date</th>
                <th>Amount</th>
                <th>Semester</th>
                <th>Payment Method</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
          <div id="loading-container" class="w-full flex flex-col justify-center items-center gap-5">
            <img id="error_icon" class="hidden w-3/4 lg:w-1/2" src="../../res/images/error.png" alt="">
            <span id="loading-circle" class="loading loading-spinner loading-lg">
            </span>
            <h1 class="note text-center">Getting your payment transactions, hang tight...</h1>
          </div>
        </div>
      </div>
    </section>
  </main>

  <script>
    const openLogoutModal = () => document.getElementById("logout_modal").showModal();
    const closeLogoutModal = () => document.getElementById("logout_modal").close();
    const logout = () => window.location.href = "./../utils/logout.php";
    $(document).ready(function() {
      const error_icon = document.getElementById('error_icon');
      const note = document.querySelector('.note');
      const announcement_container = document.getElementById('announcement_container');
      const loading_container = document.getElementById('loading-container');
      const loadingCircle = document.getElementById('loading-circle');
      const table = document.getElementById('payments_table');
      const student_number = '<?php echo $_SESSION['user_number']; ?>';
      $.ajax({
        url: 'http://127.0.0.1:5000/api-svfc-get-student-transactions',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({
          student_number: student_number
        }),
        success: function(response) {
          $('#skeleton_container').addClass('hidden');
          $('#payments_table tbody').empty();
          $('#payments_table').removeClass('hidden');
          $(loading_container).addClass('hidden');
          $(loading_container).removeClass('flex');
          response.transactions.forEach(transaction => {
            $('#payments_table tbody').append(`
              <tr class='text-center'>
                <td>${transaction.payment_id}</td>
                <td>${transaction.payment_date}</td>
                <td>${transaction.amount}</td>
                <td>${transaction.semester}</td>
                <td>${transaction.payment_method}</td>
              </tr>
            `);
          });
        },
        error: function(error) {
          error_icon.classList.remove('hidden');
          note.innerText = 'An error occurred while fetching your bills. Please try again later.';
          loadingCircle.classList.add('hidden');
          table.classList.add('hidden');
        }
      });

    });
  </script>
</body>

</html>