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
  <title>EPAY | Admin Account Settings</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <link rel="icon" type="image/x-icon" href="./../../res/images/logo.ico">
  <link rel="preconnect" href="https://rsms.me/">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
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
      <div id="personalInformationForm" class="card shrink-0 w-full h-auto w-full shadow-2xl bg-base-100 mb-6 p-5 lg:p-10">
        <h1 class="labelTitle text-3xl text-center font-extrabold">Admin Personal Information</h1>
        <form method="post" action="./review-information-admin.php" class="card-body flex flex-col justify-center gap-10 items-end">
          <div class="grid-cols-1 lg:grid-cols-3 grid gap-10 w-full">
            <?php
            $fields = [
              ['name' => 'First Name', 'value' => $_SESSION['first_name'], 'type' => 'text', 'placeholder' => 'First Name'],
              ['name' => 'Middle Name', 'value' => $_SESSION['middle_name'], 'type' => 'text', 'placeholder' => 'Middle Name'],
              ['name' => 'Last Name', 'value' => $_SESSION['last_name'], 'type' => 'text', 'placeholder' => 'Last Name'],
              ['name' => 'Email', 'value' => $_SESSION['email'], 'type' => 'email', 'placeholder' => 'Email'],
              ['name' => 'Phone Number', 'value' => $_SESSION['phone_number'], 'type' => 'tel', 'placeholder' => 'Phone Number'],
              ['name' => 'Birth Date', 'value' => $_SESSION['birthdate'], 'type' => 'date', 'placeholder' => 'Birth Date', 'disabled' => true],
              ['name' => 'Gender', 'value' => $_SESSION['gender'], 'type' => 'text', 'placeholder' => 'Gender', 'disabled' => true],
              ['name' => 'Home Address', 'value' => $_SESSION['home_address'], 'type' => 'text', 'placeholder' => 'Home Address'],
              ['name' => 'Barangay', 'value' => $_SESSION['barangay'], 'type' => 'text', 'placeholder' => 'Barangay'],
              ['name' => 'City', 'value' => $_SESSION['city'], 'type' => 'text', 'placeholder' => 'City'],
            ];

            foreach ($fields as $field) {
              $labelText = $field['name'];
              $inputValue = $field['value'];
              $inputType = $field['type'];
              $inputPlaceholder = $field['placeholder'];
              $isDisabled = isset($field['disabled']) && $field['disabled'] ? 'disabled aria-disabled="true"' : '';

              echo <<<HTML
              <div class="form-control">
                <label class="label">
                  <span class="label-text">$labelText</span>
                </label>
                <input value="$inputValue" type="$inputType" name="$labelText" placeholder="$inputPlaceholder" class="input border-[#FF6BB3] input-bordered" required $isDisabled />
              </div>
            HTML;
            }
            ?>

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
    function openLogoutModal() {
      document.getElementById("logout_modal").showModal();
    }

    function closeLogoutModal() {
      document.getElementById("logout_modal").close();
    }

    function logout() {
      // Redirect to logout.php
      window.location.href = "../utils/logout.php";
    }
  </script>
</body>

</html>