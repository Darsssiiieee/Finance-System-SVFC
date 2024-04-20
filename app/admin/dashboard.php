<?php
session_start();
if ($_SESSION['role'] !== 'Admin') {
  header('Location: ./../accounts/login.php');
  exit();
}
$admin_number = $_SESSION['admin_number'];
$firstname_initial = substr($_SESSION['first_name'], 0, 1);
$lastname_initial = substr($_SESSION['last_name'], 0, 1);
$user_initial = $firstname_initial . $lastname_initial;
$admin_dashboard_url = '/finance-system-svfc/app/admin/dashboard.php';
$current_url = $_SERVER['REQUEST_URI'];
$is_admin_dashboard_page = ($current_url === $admin_dashboard_url);

include './../utils/databaseConnection.php';



$all = 0;
$program_bsit_count = 0;
$program_beed_count = 0;
$program_bsa_count = 0;
$program_bshm_count = 0;
$program_bsed_count = 0;

$programs = [
  'all' => 'All Programs',
  'Bachelor of Science in Information Technology' => 'BSIT',
  'Bachelor of Elementary Education' => 'BEED',
  'Bachelor of Science in Accountancy' => 'BSA',
  'Bachelor of Science in Hotel and Restaurant Management' => 'BSHM',
  'Bachelor of Secondary Education' => 'BSE'
];

$results = [];

foreach ($programs as $programName => $alias) {
  $stmt = $conn->prepare("CALL get_student_by_program(?, @count)");
  $stmt->bind_param("s", $programName);
  $stmt->execute();

  $conn->next_result();
  $selectCount = $conn->query("SELECT @count AS student_count");
  $rowCount = $selectCount->fetch_assoc()['student_count'];

  $results[$alias] = $rowCount;

  $stmt->close();
}

foreach ($results as $alias => $count) {
  switch ($alias) {
    case 'all':
      $all = $count;
      break;
    case 'BSIT':
      $program_bsit_count = $count;
      break;
    case 'BEED':
      $program_beed_count = $count;
      break;
    case 'BSA':
      $program_bsa_count = $count;
      break;
    case 'BSHM':
      $program_bshm_count = $count;
      break;
    case 'BSE':
      $program_bsed_count = $count;
      break;
  }
}
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EPAY | Admin Dashboard</title>
  <link rel="icon" type="image/x-icon" href="./../../res/images/logo.ico">
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <link rel="preconnect" href="https://rsms.me/">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <link rel="stylesheet" href="./../../styles/global.css">
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

<body class="bg-[#F7EFD8] flex flex-col justify-center items-center">
  <?php
  include './components/admin_navbar.php';
  $currentPage = './' . basename(__FILE__);
  navbar($currentPage);
  ?>

  <main class="w-11/12 xl:w-10/12 h-full max-w-screen-2xl flex mt-10 flex-row justify-center gap-5">
    <?php
    include './components/admin_navbar_large.php';
    navbarLargeScreen($currentPage);
    ?>

    <section class="flex flex-col w-11/12 gap-5 justify-center items-center lg:items-start lg:grid lg:grid-cols-1 lg:gap-2">
      <div class="flex flex-col w-full gap-5 justify-center">
        <h1 class="text-xl lg:text-2xl xl:text-4xl text-left title-overview">Student Overview</h1>
        <div class="flex flex-col justify-center items-center w-full gap-5 lg:grid lg:grid-cols-2 xl:grid-cols-3">
          <div class="bg-green-400 p-5 w-full rounded-xl flex flex-col">
            <h1 class="overview-title flex font-bold gap-5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5" />
              </svg>
              Total Students Enrolled
            </h1>
            <span class="count font-bold text-2xl text-right"><?php echo $all ?></span>
          </div>

          <div class="bg-red-400 p-5 w-full rounded-xl flex flex-col">
            <h1 class="overview-title flex font-bold gap-5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 3v1.5M4.5 8.25H3m18 0h-1.5M4.5 12H3m18 0h-1.5m-15 3.75H3m18 0h-1.5M8.25 19.5V21M12 3v1.5m0 15V21m3.75-18v1.5m0 15V21m-9-1.5h10.5a2.25 2.25 0 0 0 2.25-2.25V6.75a2.25 2.25 0 0 0-2.25-2.25H6.75A2.25 2.25 0 0 0 4.5 6.75v10.5a2.25 2.25 0 0 0 2.25 2.25Zm.75-12h9v9h-9v-9Z" />
              </svg>
              Total BSIT Students Enrolled
            </h1>
            <span class="count font-bold text-2xl text-right"><?php echo $program_bsit_count ?></span>
          </div>

          <div class="bg-orange-400 p-5 w-full rounded-xl flex flex-col">
            <h1 class="overview-title flex font-bold gap-5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21" />
              </svg>
              Total BSHM Students Enrolled
            </h1>
            <span class="count font-bold text-2xl text-right"><?php echo $program_bshm_count ?></span>
          </div>

          <div class="bg-gray-400 p-5 w-full rounded-xl flex flex-col">
            <h1 class="overview-title flex font-bold gap-5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
              </svg>
              Total BECED Students Enrolled
            </h1>
            <span class="count font-bold text-2xl text-right"><?php echo $program_beed_count ?></span>
          </div>

          <div class="bg-amber-400 p-5 w-full rounded-xl flex flex-col">
            <h1 class="overview-title flex font-bold gap-5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z" />
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5H21A7.5 7.5 0 0 0 13.5 3v7.5Z" />
              </svg>
              Total BSA Students Enrolled
            </h1>
            <span class="count font-bold text-2xl text-right"><?php echo $program_bsa_count ?></span>
          </div>

          <div class="bg-emerald-400 p-5 w-full rounded-xl flex flex-col">
            <h1 class="overview-title flex font-bold gap-5">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25" />
              </svg>

              Total BSED Students Enrolled
            </h1>
            <span class="count font-bold text-2xl text-right"><?php echo $program_bsed_count ?></span>
          </div>
        </div>
      </div>

      <div class="flex flex-col w-full gap-5 justify-center">
        <h1 class="text-xl lg:text-2xl xl:text-4xl text-left title-overview">Quick Statistics</h1>
        <div class="stats shadow">
          <div class="stat">
            <div class="stat-figure text-primary">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0 1 15.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 0 1 3 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 0 0-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 0 1-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 0 0 3 15h-.75M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm3 0h.008v.008H18V10.5Zm-12 0h.008v.008H6V10.5Z" />
              </svg>
            </div>
            <div class="stat-title">Total Payment:</div>
            <div class="stat-value text-primary">25.6K</div>
            <div class="stat-desc">21% more than last month</div>
          </div>

          <div class="stat">
            <div class="stat-figure text-secondary">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block w-8 h-8 stroke-current">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
              </svg>
            </div>
            <div class="stat-title">Page Views</div>
            <div class="stat-value  text-[#FF6BB3]">2.6M</div>
            <div class="stat-desc">21% more than last month</div>
          </div>

          <div class="stat">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
            </svg>
            <div class="stat-value text-[#FF6BB3]">86%</div>
            <div class="stat-title">Tasks done</div>
            <div class="stat-desc text-[#FF6BB3]">31 tasks remaining</div>
          </div>

        </div>
      </div>

      <div class="flex flex-col justify-center items-center w-full lg:w-1/2 gap-5">
        <h1 class="text-xl title-overview">Recent Payments</h1>
        <div class="overflow-x-auto">
          <table class="table">
            <!-- head -->
            <thead>
              <tr>
                <th>Student Name</th>
                <th>Amount</th>
                <th>Date</th>
              </tr>
            </thead>
            <tbody>
              <?php
              include './../utils/databaseConnection.php';

              $result = $conn->query("CALL get_recent_transactions()");

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td>" . $row["student_name"] . "</td>";
                  echo "<td>" . $row["amount"] . "</td>";
                  echo "<td>" . $row["date_of_transaction"] . "</td>";
                  echo "</tr>";
                }
              } else {
                echo "<td colspan='3' class='empty-message font-bold text-center'>No recent transactions</td>";
              }
              ?>
            </tbody>
          </table>
        </div>
      </div>
    </section>

  </main>

  <script>
    function openLogoutModal() {
      document.getElementById("logout_modal").showModal();
    }

    function closeLogoutModal() {
      document.getElementById("logout_modal").close();
    }

    function logout() {
      // Redirect to logout.php
      window.location.href = "./../utils/logout.php";
    }
  </script>
</body>

</html>