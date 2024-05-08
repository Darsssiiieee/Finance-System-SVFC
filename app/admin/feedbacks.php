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
  <title>EPAY | Feedback & Bug Reporting</title>
  <link rel="preconnect" href="https://rsms.me/">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.7.5/socket.io.js" integrity="sha512-luMnTJZ7oEchNDZAtQhgjomP1eZefnl82ruTH/3Oj/Yu5qYtwL7+dVRccACS/Snp1lFXq188XFipHKYE75IaQQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
  include './components/admin_navbar.php';
  $currentPage = './' . basename(__FILE__);
  navbar($currentPage);
  ?>
  <main class="w-11/12 max-w-screen-2xl xl:w-10/12 h-full flex mt-10 flex-row justify-between gap-5">
    <?php
    include './components/admin_navbar_large.php';
    navbarLargeScreen($currentPage);
    ?>
    <div class="w-full flex flex-col items-center">
      <div class="hero-content w-full flex-col">
        <div class="w-full flex flex-row justify-between items-center">
          <h1 class="text-xl lg:text-2xl xl:text-4xl text-left font-bold">Feedbacks</h1>
        </div>
        <div id="announcement_container" class="card shrink-0 w-full gap-5">
          <div class="loading-container w-full flex flex-col justify-center items-center gap-5"><span class="loading loading-spinner loading-lg"></span>
            <h1>Getting Feedbacks, please wait...</h1>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script>
    $(document).ready(() => {
      const announcement_container = document.getElementById('announcement_container');
      const loadingSpinner = document.querySelector('.loading-container');
      // from flask
      // import Blueprint, make_response, jsonify
      // from mysql.connector
      // import Error, connect, errorcode
      // import dotenv
      // import os
      // import logging
      // from flask_cors
      // import CORS

      // dotenv.load_dotenv()
      // feedback_routes = Blueprint('feedback_routes', __name__)
      // CORS(feedback_routes, resources = {
      //   r "/*": {
      //     "origins": "*"
      //   }
      // })
      // file_handler = logging.FileHandler('feedback_routes.log')
      // file_handler.setLevel(logging.WARNING)

      // console_handler = logging.StreamHandler()
      // console_handler.setLevel(logging.WARNING)

      // logger = logging.getLogger()
      // logger.setLevel(logging.WARNING)
      // logger.addHandler(file_handler)
      // logger.addHandler(console_handler)

      // @feedback_routes.route('/get_feedbacks', methods = ['POST'])
      // def get_feedbacks():
      //   try:
      //   connection = connect(
      //     user = os.getenv('USER'),
      //     password = os.getenv('PASSWORD'),
      //     port = os.getenv('PORT'),
      //     database = 'svfc_finance'
      //   )
      // cursor = connection.cursor()
      // cursor.execute('SELECT * FROM feedbacks_table')
      // feedbacks = cursor.fetchall()
      // cursor.close()
      // connection.close()

      // return make_response(jsonify(feedbacks), 200)
      // except Error as e:
      //   logger.error(f 'Error: {e}')
      // return make_response(jsonify({
      //   'error': str(e)
      // }), 500)

      $.ajax({
        url: 'http://127.0.0.1:5000/get_feedbacks',
        method: 'GET',
        success: (data) => {
          console.log(data);
          const feedbacks = data;
          loadingSpinner.classList.remove('hidden');
          announcement_container.innerHTML = '';
          if (feedbacks && feedbacks.length === 0) {
            announcement_container.innerHTML = `
                <div class="card shadow-xl bg-base-100 gap-5 p-3 w-full">
                    <h1 class="font-bold">No Feedback Found</h1>
                    <p>There are no feedbacks at the moment.</p>
                </div>
            `;
          } else {
            feedbacks.forEach(feedback => {
              const feedbackCard = `
        <div class="card shadow-xl bg-base-100 gap-5 p-5 md:p-8 lg:p-10 w-full">
            <h1 class="font-bold">${feedback[1]}</h1>
            <p>${feedback[2]}</p>
        </div>
        `;
              announcement_container.innerHTML += feedbackCard;
            });
          }

          loadingSpinner.classList.add('hidden');
        }
      });


    });
  </script>
</body>

</html>
