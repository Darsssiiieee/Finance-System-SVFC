<?php
session_start();
if (!isset($_SESSION['admin_number'])) {
  header('location:login.php');
  exit();
}
include './../utils/databaseConnection.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EPAY | Send Invoice</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <link rel="icon" type="image/x-icon" href="./../../res/images/logo.ico">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <style>
    @font-face {
      font-family: 'San Francisco Rounded Bold';
      src: url('./../../font/SF-Pro-Rounded-Bold.otf');
    }

    @font-face {
      font-family: 'San Francisco Rounded Heavy';
      src: url('./../../font/SF-Pro-Rounded-Heavy.otf');
    }

    @font-face {
      font-family: 'San Francisco Rounded Medium';
      src: url('./../../font/SF-Pro-Rounded-Medium.otf');
    }

    @font-face {
      font-family: 'San Francisco Rounded Regular';
      src: url('./../../font/SF-Pro-Rounded-Regular.otf');
    }

    h1,
    h2,
    h3,
    h4,
    h5,
    h6,
    p,
    a,
    li,
    button,
    label,
    input,
    select,
    option,
    textarea {
      font-family: 'San Francisco Rounded Regular';
    }

    .nav-link {
      font-family: 'San Francisco Rounded Heavy';
    }

    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
      appearance: textfield;
    }
  </style>
</head>

<body class="bg-[#F7EFD8] flex flex-col justify-center items-center">
  <div class="toast hidden toast-end">
    <div class="alert alert-info">
      <span>New mail arrived.</span>
    </div>
    <div class="alert alert-success">
      <span>Message sent successfully.</span>
    </div>
    <div class="alert alert-error">
      <span>Message sent successfully.</span>
    </div>
  </div>

  <?php
  include './components/admin_navbar.php';
  $currentPage = './' . basename(__FILE__);
  navbar($currentPage);
  ?>

  <main class="w-11/12 max-w-screen-2xl h-full flex mt-10 flex-row justify-between gap-5">
    <?php
    include './components/admin_navbar_large.php';
    navbarLargeScreen($currentPage);
    ?>
    <section class="flex flex-col gap-5 justify-center items-center w-full lg:items-start lg:grid lg:grid-cols-1 lg:gap-2">
      <div class="hero min-h-screen">
        <div class="hero-content flex-col w-full">
          <div class="text-center lg:text-left">
            <h1 class="text-5xl font-bold">Send A Bill Invoice</h1>
            <p class="py-6">This will send a notification on their email regarding this bill.</p>
          </div>

          <div class="card shrink-0 w-full max-w-7xl shadow-2xl bg-base-100">
            <form class="card-body w-full grid place-content-center gap-5">
              <div class="w-full flex flex-col md:flex-row justify-around gap-5 items-center">
                <label class="form-control w-full max-w-full">
                  <div class="label">
                    <span class="label-text">Select a Student</span>
                  </div>
                  <select id="student_id" class="select select-primary w-full">
                    <option disabled selected>Select a Student</option>
                    <?php
                    $query = "CALL get_student_profiles()";
                    $result = $conn->query($query);

                    while ($row = mysqli_fetch_assoc($result)) {
                      echo "<option value='" . $row['student_id'] . "'>" . $row['user_number'] . ': ' . $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'] . "</option>";
                    }
                    ?>
                  </select>
                </label>

                <label class="form-control w-full max-w-full">
                  <div class="label">
                    <span class="label-text">Number of Units</span>
                  </div>
                  <input type="number" placeholder="Number of Units" class="input input-bordered w-full" />
                </label>
              </div>
              <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
                <?php
                $billItems = [
                  ['label' => 'Internet Connectivity', 'name' => 'internet_connectivity', 'value' => 7500],
                  ['label' => 'Modules eBook', 'name' => 'modules_ebook', 'value' => 2500],
                  ['label' => 'Portal', 'name' => 'portal', 'value' => 1500],
                  ['label' => 'E-Library', 'name' => 'e_library', 'value' => 2500],
                  ['label' => 'Admission Registration', 'name' => 'admission_registration', 'value' => 500],
                  ['label' => 'Library', 'name' => 'library', 'value' => 2500],
                  ['label' => 'Student Organization', 'name' => 'student_org', 'value' => 250],
                  ['label' => 'Medical/Dental', 'name' => 'medical_dental', 'value' => 800],
                  ['label' => 'Guidance', 'name' => 'guidance', 'value' => 800],
                  ['label' => 'Student Affairs', 'name' => 'student_affairs', 'value' => 800],
                  ['label' => 'Organization T-Shirt', 'name' => 'org_t_shirt', 'value' => 650],
                  ['label' => 'School Uniform (1 Set)', 'name' => 'school_uniform_1_set', 'value' => 1500],
                  ['label' => 'PE Activity Uniform (1 Set)', 'name' => 'pe_activity_uniform_1_set', 'value' => 1500],
                  ['label' => 'Major Uniform (1 Set)', 'name' => 'major_uniform_1_set', 'value' => 1500],
                  ['label' => 'Major Laboratory', 'name' => 'major_laboratory', 'value' => 2000],
                  ['label' => 'Insurance', 'name' => 'insurance', 'value' => 500],
                  ['label' => 'Students Development Programs/Activities', 'name' => 'students_development_programs_activities', 'value' => 5000]
                ];

                foreach ($billItems as $item) {
                  $itemLabel = $item['label'];
                  $itemName = $item['name'];
                  $itemPrice = $item['value'];
                  echo '<label class="form-control w-full max-w-xs">';
                  echo '<div class="label">';
                  echo '<span class="label-text">' . $itemLabel . '</span>';
                  echo '</div>';
                  echo '<input type="text" placeholder="' . $itemLabel . '" class="input input-bordered w-full max-w-xs" disabled name="' . $itemName . '" id="' . $itemName . '" value="' . $itemPrice . '" />';
                  echo '</label>';
                }
                ?>
              </div>

              <button id="add_misc" class="btn btn-info" type="button">Add Miscellaneous Fees</button>

              <div id="misc_fees" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">

              </div>
              <div class="form-control flex items-end mt-6">
                <button class="max-w-xs btn btn-success">Send</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script>
    $(document).ready(function() {
      $('#add_misc').click(function() {
        $('#misc_fees').append('<div class="misc-fee border-2 rounded-xl p-5">' +
          '<label class="form-control w-full max-w-xs">' +
          '<div class="label">' +
          '<span class="label-text">Miscellaneous Fee</span>' +
          '</div>' +
          '<input type="number" placeholder="Miscellaneous Fee" class="input input-bordered w-full max-w-xs" required />' +
          '</label>' +
          '<label class="form-control w-full max-w-xs">' +
          '<div class="label">' +
          '<span class="label-text">Remarks</span>' +
          '</div>' +
          '<input type="text" placeholder="Remarks" class="input input-bordered w-full max-w-xs" required />' +
          '</label>' +
          '<button class="btn btn-error mt-5 delete-misc-fee">Delete</button>' +
          '</div>');

        $('.delete-misc-fee').click(function() {
          $(this).parent('.misc-fee').remove();
        });
      });
    });
  </script>
</body>

</html>