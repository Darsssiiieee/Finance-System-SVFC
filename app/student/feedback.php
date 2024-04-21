<?php
session_start();
if ($_SESSION['role'] !== 'Student') {
  header('Location: ./../accounts/login.php');
  exit();
}
$student_number = $_SESSION['student_number'];
$firstname_initial = substr($_SESSION['first_name'], 0, 1);
$lastname_initial = substr($_SESSION['last_name'], 0, 1);
$user_initial = $firstname_initial . $lastname_initial;
$student_feedback_url = '/finance-system-svfc/app/student/feedback.php';
$current_url = $_SERVER['REQUEST_URI'];
$is_student_feedback_page = ($current_url === $student_feedback_url);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student - Feedback</title>
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

    .count,
    .stat-value,
    .title-overview,
    .empty-message,
    .menuButton {
      font-family: 'San Francisco Rounded Heavy';
    }

    .overview-title,
    .stat-title {
      font-family: 'San Francisco Rounded Bold';
    }

    .stat-desc {
      font-family: 'San Francisco Rounded Medium';
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

<body class="bg-[#F7EFD8] flex flex-col items-center w-full min-h-screen">
  <?php
  include './components/student_navbar_sm.php';
  $currentPage = './' . basename(__FILE__);
  student_navbar_sm($currentPage);
  ?>
  <main class="w-11/12 max-w-screen-2xl xl:w-10/12 h-full flex mt-10 flex-row justify-between gap-5">
    <?php
    include './components/student_navbar_lg.php';
    student_navbar_lg($currentPage);
    ?>

    <div class="w-3/4 flex flex-col items-center">
      <div class="hero-content flex-col">
        <div class="text-center">
          <h1 class="text-5xl font-bold">Feedback</h1>
          <p class="py-6">Have something to say about this system? Feel free to send a feedback to admins.</p>
        </div>
        <div class="card shrink-0 w-full max-w-xl shadow-2xl bg-base-100">
          <form method="post" class="card-body">
            <input type="hidden" name="student_number" value="<?php echo $_SESSION['student_number'] ?>">
            <div class="form-control">
              <label class="label">
                <span class="label-text">Your Message</span>
              </label>
              <textarea name="feeback_content" class="textarea textarea-primary" placeholder="Your Feedback"></textarea>
            </div>
            <div class="form-control mt-6">
              <button id='submit-feedback' type="submit" class="btn btn-primary">Send</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <script>
    const openLogoutModal = () => document.getElementById("logout_modal").showModal();
    const closeLogoutModal = () => document.getElementById("logout_modal").close();
    const logout = () => window.location.href = "./../utils/logout.php";
    $(document).ready(() => {
      $('#submit-feedback').click((e) => {
        e.preventDefault();
        const feedback = $('textarea[name="feeback_content"]').val();
        const student_number = $('input[name="student_number"]').val();
        if (feedback.length < 10) {
          alert('Feedback must be at least 10 characters long');
          return;
        }
        $.ajax({
          url: 'http://127.0.0.1:5000/api-svfc-send-feedback',
          method: 'POST',
          contentType: 'application/json',
          data: JSON.stringify({
            student_number: student_number,
            content: feedback
          }),
          success: (data) => {
            alert(data);
          },
          error: (err) => {
            console.log(err);
            alert('An error occured while sending feedback');
          }

        })
      })
    })
  </script>
</body>

</html>