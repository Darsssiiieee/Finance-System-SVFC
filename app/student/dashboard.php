<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EPAY | Student Dashboard</title>
  <link rel="icon" type="image/x-icon" href="./../../res/images/logo.ico">
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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

    .main-course {
      margin-top: 20px;
      text-transform: capitalize;
    }

    .course-box {
      width: 100%;
      height: 300px;
      padding: 10px 10px 30px 10px;
      margin-top: 10px;
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
    }

    .course-box ul {
      list-style: none;
      display: flex;
    }

    .course-box ul li {
      margin: 10px;
      color: gray;
      cursor: pointer;
    }

    .course-box ul .active {
      color: #000;
      border-bottom: 1px solid #000;
    }

    .course-box .course {
      display: flex;
    }

    .box {
      width: 33%;
      padding: 10px;
      margin: 10px;
      border-radius: 10px;
      background: rgb(235, 233, 233);
      box-shadow: 0 20px 35px rgba(0, 0, 0, 0.1);
    }

    .box p {
      font-size: 12px;
      margin-top: 5px;
    }

    .box button {
      background: #000;
      color: #fff;
      padding: 7px 10px;
      border-radius: 10px;
      margin-top: 3rem;
      cursor: pointer;
    }

    .box button:hover {
      background: rgba(0, 0, 0, 0.842);
    }

    .box i {
      font-size: 7rem;
      float: right;
      margin: -20px 20px 20px 0;
    }

    #clock {
      max-width: 600px;
    }
  </style>
</head>

<body class="bg-[#F7EFD8] w-full flex flex-col justify-center items-center">
  <?php
  session_start();
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
      <div class="flex flex-col w-full gap-5 justify-center">
        <div class="flex flex-col md:flex-row justify-between md:items-center">
          <h1 class="text-xl text-gray-600 font-bold lg:text-2xl xl:text-4xl text-left title-overview">Student Overview</h1>
          <h1 class="text-xs text-black text-left title-overview" id="date-time"></h1>
        </div>

        <div class="bg-red-400 p-5 w-full rounded-xl flex flex-row justify-between items-center">
          <div class="w-1/2 flex-col flex">
            <h1 class="text-xl font-bold text-white xl:text-4xl text-left title-overview">
              Hello, <?php echo $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] ?>!
            </h1>

          </div>
          <?php
          $avatar = $_SESSION['avatar'];
          echo "<img src=\"./../../res/images/avatar/$avatar\" class=\"w-20 h-20 md:w-52 md:h-52 rounded-md shadow-xl\" alt=\"\">";
          ?>
        </div>
        <h1 class="text-xl text-gray-600 font-bold lg:text-2xl xl:text-4xl text-left">Finance</h1>
        <div class=" flex flex-col justify-center items-center w-full gap-5 lg:grid lg:grid-cols-2 xl:grid-cols-3">

          <div class="bg-[#166dbb] p-5 w-full rounded-xl flex flex-col">
            <img class="w-1/2" src="./../../res/images/payable.png" alt="">
            <h1 class="overview-title flex text-white font-bold gap-5"> Total Payable</h1>
            <h1 class="text-lg font-bold  xl:text-4xl text-white" id="totalBill">
              <div class="skeleton w-32 h-10"></div>
            </h1>
          </div>

          <div class="bg-[#53bf19] p-5 w-full rounded-xl flex flex-col">
            <img class="w-1/2" src="./../../res/images/paid.png" alt="">
            <h1 class="overview-title flex font-bold gap-5">Total Paid</h1>
            <h1 class="text-lg font-bold  xl:text-4xl text-black" id="totalPaid">
              <div class="skeleton w-32 h-10"></div>
            </h1>
          </div>

        </div>
    </section>
    </div>
    </section>

  </main>
  <script>
    const openLogoutModal = () => document.getElementById("logout_modal").showModal();
    const closeLogoutModal = () => document.getElementById("logout_modal").close();
    const logout = () => window.location.href = "./../utils/logout.php";
    $(document).ready(() => {
      const student_number = '<?php echo $_SESSION['user_number'] ?>';

      function clock() {
        const today = new Date();
        const hours = today.getHours();
        const minutes = today.getMinutes();
        const seconds = today.getSeconds();
        const hour = hours < 10 ? "0" + hours : hours;
        const minute = minutes < 10 ? "0" + minutes : minutes;
        const second = seconds < 10 ? "0" + seconds : seconds;
        const hourTime = hour > 12 ? hour - 12 : hour;
        const ampm = hour < 12 ? "AM" : "PM";
        const month = today.getMonth();
        const year = today.getFullYear();
        const day = today.getDate();
        const monthList = [
          "January",
          "February",
          "March",
          "April",
          "May",
          "June",
          "July",
          "August",
          "September",
          "October",
          "November",
          "December"
        ];
        const date = monthList[month] + " " + day + ", " + year;
        const time = hourTime + ":" + minute + ":" + second + ' ' + ampm;
        const dateTime = date + " - " + time;
        document.getElementById("date-time").innerHTML = dateTime;
        setTimeout(clock, 1000);
      }
      clock();

      $.ajax({
        url: 'http://127.0.0.1:5000/api-svfc-total-student-bills',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({
          student_number: student_number
        }),
        success: (response) => {
          $('#totalBill').text('PHP: ' + response.total_bill.toLocaleString());
          $('.skeleton').addClass('hidden');
          console.log(response);
        },
        error: (error) => {
          alert('An error occured while fetching student bills');
          console.log(error);
        }
      })
      $.ajax({
        url: 'http://127.0.0.1:5000/api-svfc-get-student-transactions',
        method: 'POST',
        contentType: 'application/json',
        data: JSON.stringify({
          student_number: student_number
        }),
        success: (response) => {
          var totalTransactions = 0;
          for (let i = 0; i < response.transactions.length; i++) {
            totalTransactions += response.transactions[i].amount;
          }
          $('#totalPaid').text('PHP: ' + totalTransactions.toLocaleString())
        },
        error: (error) => {
          alert('An error occured while fetching student transactions');
        }
      })
    })
  </script>
</body>

</html>