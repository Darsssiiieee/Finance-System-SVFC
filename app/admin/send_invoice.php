<?php
session_start();
if (!isset($_SESSION['user_number']) || ($_SESSION['role'] !== 'Admin')) {
  header('Location: ./../utils/logout.php');
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
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
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

    .select2-container .select2-selection--single {
      border: 1px solid #d9d9d9;
      border-radius: 20px;
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
      color: #444;
      line-height: 28px;
    }

    .select2-container .select2-selection--single .select2-selection__arrow {
      height: 26px;
    }

    .select2-dropdown {
      border: 1px solid #d9d9d9;
      border-radius: 20px;
    }

    .select2-results__option {
      padding: 6px;
      user-select: none;
      -webkit-user-select: none;
      background-color: #fff;
      color: #444;
      cursor: pointer;
    }

    .select2-results__option[aria-selected="true"] {
      background-color: #f2f2f2;
    }

    .select2-results__option--highlighted[aria-selected] {
      background-color: #3875d7;
      color: #fff;
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
  <dialog id="info-modal" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
      <h3 id="info-title" class="font-bold text-lg">Hello!</h3>
      <p id="info-message" class="py-4">Press ESC key or click the button below to close</p>
      <div class="modal-action">
        <form method="dialog">
          <button class="btn">Close</button>
        </form>
      </div>
    </div>
  </dialog>

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
      <div class="min-h-screen">
        <h1 class="text-xl lg:text-2xl xl:text-4xl text-left font-bold">Send A Bill Invoice</h1>
        <div class="hero-content flex-col w-full">

          <div class="card shrink-0 w-full max-w-7xl shadow-2xl bg-base-100">
            <form id="bill-form" class="card-body w-full grid place-content-center gap-5">
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
                      echo "<option value='" . $row['student_number'] . "'>" . $row['user_number'] . ': ' . $row['firstname'] . ' ' . $row['middlename'] . ' ' . $row['lastname'] . "</option>";
                    }
                    ?>
                  </select>
                </label>

                <label class="form-control w-full max-w-full">
                  <div class="label">
                    <span class="label-text">Select Semester</span>
                  </div>
                  <select id="semester_select" class="select select-primary w-full" disabled>
                    <option disabled selected>Select Semester</option>
                  </select>
                </label>



                <label class="form-control w-full max-w-full">
                  <div class="label">
                    <span class="label-text">Number of Units</span>
                  </div>
                  <input type="number" name="units" placeholder="Number of Units" class="input input-bordered w-full" />
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
    const openLogoutModal = () => document.getElementById("logout_modal").showModal();
    const closeLogoutModal = () => document.getElementById("logout_modal").close();
    const logout = () => window.location.href = "./../utils/logout.php";
    $(document).ready(function() {
      $('#student_id').select2();
      const showMessage = (title, message) => {
        $('#info-title').text(title);
        $('#info-message').text(message);
        document.getElementById('info-modal').showModal();
      }
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

      $('#student_id').change(function() {
        var studentNumber = $(this).val();
        $.ajax({
          url: 'http://127.0.0.1:5000/api-svfc-fetch_semesters',
          method: 'POST',
          contentType: 'application/json',
          data: JSON.stringify({
            student_number: studentNumber
          }),
          success: function(response) {
            $('#semester_select').prop('disabled', false);
            $('#semester_select').empty();
            response.forEach(function(semester) {
              $('#semester_select').append('<option value="' + semester.semester + '">' + semester.semester + '</option>');
            });
          },
          error: function(xhr, status, error) {
            console.log(error);
          }
        });
      });

      $('#bill-form').submit(e => {
        e.preventDefault();
        var allDisabledBills = document.querySelectorAll('input[disabled]');
        var units = document.querySelector('input[name="units"]').value;
        $.ajax({
          url: 'http://127.0.0.1:5000/dashboard/post-bill',
          method: 'POST',
          contentType: 'application/json',
          data: JSON.stringify({
            student_number: $('#student_id').val(),
            semester: $('#semester_select').val(),
            number_of_units: $('input[name="units"]').val(),
            internet_connectivity: $('input[name="internet_connectivity"]').val(),
            modules_ebook: $('input[name="modules_ebook"]').val(),
            portal: $('input[name="portal"]').val(),
            e_library: $('input[name="e_library"]').val(),
            admission_registration: $('input[name="admission_registration"]').val(),
            library: $('input[name="library"]').val(),
            student_org: $('input[name="student_org"]').val(),
            medical_dental: $('input[name="medical_dental"]').val(),
            guidance: $('input[name="guidance"]').val(),
            student_affairs: $('input[name="student_affairs"]').val(),
            org_t_shirt: $('input[name="org_t_shirt"]').val(),
            school_uniform_1_set: $('input[name="school_uniform_1_set"]').val(),
            pe_activity_uniform_1_set: $('input[name="pe_activity_uniform_1_set"]').val(),
            major_uniform_1_set: $('input[name="major_uniform_1_set"]').val(),
            major_laboratory: $('input[name="major_laboratory"]').val(),
            insurance: $('input[name="insurance"]').val(),
            students_development_programs_activities: $('input[name="students_development_programs_activities"]').val(),
            misc_fees: (function() {
              var miscFees = [];
              var allMiscFees = document.querySelectorAll('.misc-fee');
              allMiscFees.forEach(function(miscFee) {
                var miscFeeAmount = miscFee.querySelector('input[type="number"]').value;
                var miscFeeRemarks = miscFee.querySelector('input[type="text"]').value;
                miscFees.push({
                  amount: miscFeeAmount,
                  remarks: miscFeeRemarks
                });
              });
              return miscFees;
            })()

          }),
          success: function(response) {
            if (response.message === 'Bill inserted successfully.') {
              showMessage('Success', 'Bill posted successfully.');
            }
          },
          error: function(xhr, status, error) {
            if (xhr.responseJSON.message === 'Remarks is required for every misc fee item') {
              showMessage('Error', 'Remarks is required for every misc fee item');
            } else if (xhr.responseJSON.message === 'Missing Fields Detected.') {
              showMessage('Error', 'Missing Fields Detected.');
            } else if (xhr.responseJSON.message === 'Semester already billed.') {
              showMessage('Error', 'Semester already billed.');
            } else {
              showMessage('Error', 'An error occurred.');
            }
          }
        });
      })
    });
  </script>
</body>

</html>