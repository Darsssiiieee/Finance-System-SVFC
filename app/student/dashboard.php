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
$student_dashboard_url = '/finance-system-svfc/app/student/dashboard.php';
$current_url = $_SERVER['REQUEST_URI'];
$is_student_dashboard_page = ($current_url === $student_dashboard_url);
?>

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
            <h1 class="text-lg font-bold  xl:text-4xl text-white" id="totalBill">
              <div class="skeleton w-32 h-10"></div>
            </h1>
          </div>
          <img src="./../../res/images/avatar/avatar_5.png" class="w-20 h-20 md:w-52 md:h-52 rounded-md shadow-xl" alt="">
        </div>
        <h1 class="text-xl lg:text-2xl xl:text-4xl text-left title-overview">Finance</h1>
        <div class="flex flex-col justify-center items-center w-full gap-5 lg:grid lg:grid-cols-2 xl:grid-cols-3">

          <div class="bg-gray-400 p-5 w-full rounded-xl flex flex-col">
            <svg height="160px" width="160px" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 179.006 179.006" xml:space="preserve" fill="#000000" stroke="#000000" stroke-width="1.2530420000000002">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <g>
                  <g>
                    <path style="fill:#dbbe00;" d="M153.784,21.027c-1.426-0.477-3.109-0.704-5-0.704c-2.971,0-5.257,0.638-6.802,1.903 c-0.913,0.722-1.772,1.957-2.608,3.664h18.879C158.068,23.545,156.589,21.922,153.784,21.027z">
                    </path>
                    <path style="fill:#dbbe00;" d="M117.995,31.744c1.808,0.776,3.682,1.146,5.651,1.146c2.363,0,4.201-0.442,5.549-1.366 c1.343-0.901,2.285-2.13,2.798-3.664h-16.85C115.256,29.679,116.205,30.968,117.995,31.744z"></path>
                    <path style="fill:#dbbe00;" d="M137.769,3.168c-22.787,0-41.243,10.615-41.243,23.73s18.456,23.742,41.243,23.742 c22.782,0,41.237-10.627,41.237-23.742S160.551,3.168,137.769,3.168z M170.521,27.865h-6.969 c-0.453,3.998-2.906,6.725-7.393,8.151c-2.429,0.794-5.68,1.181-9.798,1.181v-3.664c3.288-0.119,5.651-0.406,7.166-0.883 c2.703-0.871,4.219-2.464,4.571-4.785h-19.559c-0.973,2.977-2.625,5.191-4.911,6.605c-2.321,1.426-5.49,2.13-9.541,2.13 c-3.652,0-6.945-0.752-9.851-2.297c-2.9-1.528-4.392-3.682-4.451-6.444h-4.779V25.89h4.72c0.34-2.727,1.736-4.833,4.195-6.313 c2.488-1.462,5.734-2.22,9.804-2.303v3.616c-1.838,0.101-3.395,0.376-4.708,0.859c-2.399,0.871-3.688,2.25-3.801,4.135h17.471 c1.575-3.186,3.037-5.352,4.368-6.504c2.261-1.862,5.597-2.781,10-2.781c6.367,0,10.878,1.181,13.557,3.568 c1.486,1.331,2.464,3.234,2.942,5.716h6.969C170.521,25.884,170.521,27.865,170.521,27.865z"></path>
                    <path style="fill:#dbbe00;" d="M137.769,53.815c-20.926,0-38.134-8.962-40.837-20.568c-0.239,1.044-0.406,2.1-0.406,3.174 c0,13.109,18.456,23.742,41.243,23.742c22.782,0,41.237-10.627,41.237-23.742c0-1.08-0.173-2.13-0.406-3.174 C175.897,44.853,158.683,53.815,137.769,53.815z"></path>
                    <path style="fill:#dbbe00;" d="M137.769,63.332c-20.926,0-38.134-8.962-40.837-20.568c-0.239,1.044-0.406,2.1-0.406,3.174 c0,13.109,18.456,23.742,41.243,23.742c22.782,0,41.237-10.627,41.237-23.742c0-1.08-0.173-2.13-0.406-3.174 C175.897,54.37,158.683,63.332,137.769,63.332z"></path>
                    <path style="fill:#dbbe00;" d="M137.769,72.855c-20.926,0-38.134-8.962-40.837-20.568c-0.239,1.044-0.406,2.1-0.406,3.168 c0,13.115,18.456,23.742,41.243,23.742c22.782,0,41.237-10.627,41.237-23.742c0-1.074-0.173-2.124-0.406-3.168 C175.897,63.893,158.683,72.855,137.769,72.855z"></path>
                    <path style="fill:#dbbe00;" d="M137.769,82.373c-20.926,0-38.134-8.956-40.837-20.568c-0.239,1.044-0.406,2.1-0.406,3.174 c0,13.115,18.456,23.742,41.243,23.742c22.782,0,41.237-10.621,41.237-23.742c0-1.08-0.173-2.13-0.406-3.174 C175.897,73.416,158.683,82.373,137.769,82.373z"></path>
                    <path style="fill:#dbbe00;" d="M137.769,93.298c-20.926,0-38.134-8.962-40.837-20.568c-0.239,1.044-0.406,2.1-0.406,3.174 c0,13.109,18.456,23.742,41.243,23.742c22.782,0,41.237-10.627,41.237-23.742c0-1.08-0.173-2.13-0.406-3.174 C175.897,84.336,158.683,93.298,137.769,93.298z"></path>
                    <path style="fill:#dbbe00;" d="M137.769,102.809c-20.926,0-38.134-8.962-40.837-20.562c-0.239,1.044-0.406,2.1-0.406,3.174 c0,13.115,18.456,23.742,41.243,23.742c22.782,0,41.237-10.627,41.237-23.742c0-1.08-0.173-2.13-0.406-3.174 C175.897,93.853,158.683,102.809,137.769,102.809z"></path>
                    <path style="fill:#dbbe00;" d="M137.769,112.338c-20.926,0-38.134-8.968-40.837-20.568c-0.239,1.038-0.406,2.106-0.406,3.168 c0,13.103,18.456,23.742,41.243,23.742c22.782,0,41.237-10.639,41.237-23.742c0-1.08-0.173-2.124-0.406-3.168 C175.897,103.37,158.683,112.338,137.769,112.338z"></path>
                    <path style="fill:#dbbe00;" d="M137.769,121.855c-20.926,0-38.134-8.962-40.837-20.556c-0.239,1.038-0.406,2.094-0.406,3.162 c0,13.109,18.456,23.742,41.243,23.742c22.782,0,41.237-10.633,41.237-23.742c0-1.08-0.173-2.124-0.406-3.162 C175.897,112.893,158.683,121.855,137.769,121.855z"></path>
                    <path style="fill:#dbbe00;" d="M57.27,108.144c-1.432-0.471-3.109-0.698-5.006-0.698c-2.966,0-5.251,0.638-6.796,1.903 c-0.919,0.722-1.772,1.945-2.608,3.658h18.879C61.542,110.662,60.063,109.033,57.27,108.144z"></path>
                    <path style="fill:#dbbe00;" d="M21.481,118.86c1.808,0.776,3.682,1.14,5.651,1.14c2.363,0,4.195-0.436,5.549-1.36 c1.343-0.901,2.285-2.136,2.798-3.664H18.617C18.742,116.79,19.679,118.09,21.481,118.86z"></path>
                    <path style="fill:#dbbe00;" d="M41.237,90.291C18.45,90.291,0,100.9,0,114.015c0,13.121,18.45,23.742,41.237,23.742 s41.243-10.621,41.243-23.742C82.48,100.9,64.025,90.291,41.237,90.291z M73.989,114.988H67.02 c-0.448,3.986-2.9,6.713-7.387,8.145c-2.429,0.794-5.68,1.175-9.804,1.175v-3.658c3.288-0.119,5.651-0.406,7.166-0.883 c2.709-0.871,4.231-2.464,4.571-4.779H42.013c-0.973,2.971-2.631,5.185-4.911,6.593c-2.321,1.432-5.49,2.13-9.547,2.13 c-3.652,0-6.939-0.758-9.845-2.297c-2.906-1.533-4.398-3.682-4.457-6.444H8.479v-1.969h4.714c0.352-2.727,1.742-4.839,4.201-6.313 c2.482-1.468,5.734-2.22,9.798-2.303v3.61c-1.832,0.101-3.401,0.37-4.708,0.859c-2.393,0.871-3.682,2.25-3.801,4.129h17.483 c1.569-3.18,3.031-5.346,4.362-6.504c2.255-1.862,5.597-2.781,9.995-2.781c6.373,0,10.884,1.181,13.563,3.574 c1.48,1.337,2.458,3.24,2.936,5.71h6.969V114.988z"></path>
                    <path style="fill:#dbbe00;" d="M41.237,140.931c-20.926,0-38.128-8.968-40.831-20.568C0.161,121.402,0,122.458,0,123.532 c0,13.109,18.45,23.742,41.237,23.742s41.243-10.627,41.243-23.742c0-1.086-0.173-2.13-0.406-3.168 C79.377,131.963,62.157,140.931,41.237,140.931z"></path>
                    <path style="fill:#dbbe00;" d="M41.237,150.449c-20.926,0-38.128-8.962-40.831-20.562C0.161,130.919,0,131.981,0,133.055 c0,13.109,18.45,23.742,41.237,23.742S82.48,146.17,82.48,133.055c0-1.08-0.173-2.13-0.406-3.168 C79.377,141.486,62.157,150.449,41.237,150.449z"></path>
                    <path style="fill:#dbbe00;" d="M41.237,159.978c-20.926,0-38.128-8.962-40.831-20.568C0.161,140.448,0,141.504,0,142.578 c0,13.109,18.45,23.742,41.237,23.742s41.243-10.627,41.243-23.742c0-1.08-0.173-2.124-0.406-3.168 C79.377,151.015,62.157,159.978,41.237,159.978z"></path>
                    <path style="fill:#dbbe00;" d="M41.237,169.489c-20.926,0-38.128-8.968-40.831-20.568C0.161,149.959,0,151.027,0,152.096 c0,13.109,18.45,23.742,41.237,23.742s41.243-10.627,41.243-23.742c0-1.086-0.173-2.136-0.406-3.174 C79.377,160.521,62.157,169.489,41.237,169.489z"></path>
                    <path style="fill:#dbbe00;" d="M57.27,34.852c-1.432-0.477-3.109-0.704-5-0.704c-2.971,0-5.257,0.638-6.802,1.903 c-0.913,0.722-1.772,1.957-2.608,3.664h18.879C61.542,37.371,60.063,35.742,57.27,34.852z"></path>
                    <path style="fill:#dbbe00;" d="M21.481,45.569c1.808,0.77,3.688,1.146,5.651,1.146c2.363,0,4.201-0.442,5.549-1.366 c1.349-0.901,2.285-2.13,2.798-3.664H18.617C18.742,43.498,19.679,44.793,21.481,45.569z"></path>
                    <path style="fill:#dbbe00;" d="M41.237,16.994C18.456,16.994,0,27.609,0,40.724s18.456,23.742,41.237,23.742 c22.787,0,41.243-10.627,41.243-23.742S64.025,16.994,41.237,16.994z M74.001,41.685H67.02c-0.448,3.998-2.9,6.719-7.387,8.151 c-2.429,0.788-5.68,1.181-9.804,1.181v-3.664c3.288-0.119,5.651-0.406,7.166-0.883c2.709-0.871,4.231-2.464,4.571-4.785H42.013 c-0.973,2.977-2.619,5.191-4.911,6.605c-2.315,1.426-5.49,2.13-9.547,2.13c-3.652,0-6.939-0.758-9.845-2.297 c-2.906-1.528-4.398-3.682-4.457-6.444H8.479V39.71h4.714c0.352-2.727,1.742-4.833,4.201-6.313c2.482-1.462,5.74-2.22,9.798-2.303 v3.616c-1.832,0.095-3.401,0.376-4.708,0.859c-2.393,0.871-3.682,2.25-3.801,4.135h17.483c1.575-3.186,3.031-5.352,4.362-6.51 c2.255-1.856,5.597-2.775,9.995-2.775c6.373,0,10.884,1.181,13.563,3.568c1.48,1.331,2.458,3.234,2.936,5.716h6.981L74.001,41.685 L74.001,41.685z"></path>
                    <path style="fill:#dbbe00;" d="M41.237,67.634c-20.914,0-38.128-8.962-40.831-20.568C0.173,48.111,0,49.167,0,50.241 C0,63.35,18.456,73.983,41.237,73.983c22.787,0,41.243-10.627,41.243-23.742c0-1.08-0.167-2.13-0.406-3.174 C79.377,58.672,62.163,67.634,41.237,67.634z"></path>
                    <path style="fill:#dbbe00;" d="M41.237,77.158c-20.914,0-38.128-8.962-40.831-20.568C0.173,57.634,0,58.69,0,59.758 C0,72.873,18.456,83.5,41.237,83.5c22.787,0,41.243-10.627,41.243-23.742c0-1.074-0.167-2.124-0.406-3.168 C79.377,68.195,62.163,77.158,41.237,77.158z"></path>
                  </g>
                </g>
              </g>
            </svg>
            <h1 class="overview-title flex font-bold gap-5"> Total Payable
            </h1>
            <span class="count font-bold text-2xl text-right"></span>
          </div>

          <div class="bg-amber-400 p-5 w-full rounded-xl flex flex-col">
            <svg height="160px" width="160px" version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512.00 512.00" xml:space="preserve" fill="#000000" stroke="#000000" stroke-width="2.559985">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <circle style="fill:#FF5B62;" cx="255.999" cy="255.999" r="255.999"></circle>
                <path style="fill:#EDB937;" d="M261.618,61.037c0,0,15.289-10.647,24.805-10.083c9.513,0.564,20.763,13.831,33.742,7.488 c12.979-6.345,13.844-6.919,19.613-1.729c5.768,5.191,3.751,15.572,3.751,15.572l-18.458,27.398l-24.224,2.885l-34.32-20.478 l-4.905-21.055C261.622,61.037,261.618,61.037,261.618,61.037z"></path>
                <path style="fill:#FAD24D;" d="M274.914,124.79c-0.076,3.599-0.525,7.198-1.54,10.497c-2.773,9.025-143.286,127.706-32.082,186.385 c85.985,45.367,236.117-23.565,145.53-128.181l-47.838-55.246c0,0-1.133-5.826-1.737-13.456c-0.047-1.883-0.372-10.432-0.299-12.334 c0.475-3.24-0.73-7.282,3.008-15.468c3.738-8.189,26.046-25.411,26.046-25.411s-14.545-16.94-20.686-15.103 c-6.14,1.838-25.538,37.197-25.538,37.197s-4.983-6.987-1.753-17.671c3.232-10.686,12.286-26.888,12.286-26.888 s-17.773-6.267-21.978-1.479c-4.205,4.793-12.286-6.259-17.136-1.466c-4.847,4.787-11.961,12.152-11.961,12.152 s11.961,9.209,15.192,17.314c3.232,8.105-0.968,13.999-0.968,13.999s0.325,0-6.789-5.893s-13.576-30.204-21.976-28.73 c-8.405,1.466-28.449,8.102-13.952,16.932l20.365,27.998c0,0,2.049,8.929,2.885,12.519c0.285,1.804,0.745,10.353,0.918,12.334 L274.914,124.79L274.914,124.79z"></path>
                <g>
                  <path style="fill:#EDB937;" d="M414.854,254.591c-20.57,74.451-128.574,79.776-189.252,57.176c4.564,3.452,9.747,6.77,15.688,9.905 C309.003,357.397,416.462,322.236,414.854,254.591z"> </path>
                  <circle style="fill:#EDB937;" cx="304.753" cy="225.548" r="58.036"></circle>
                </g>
                <g>
                  <path style="fill:#FFFFFF;" d="M324.468,202.97c0,0-4.598-6.319-13.723-7.675v-8.292h-9.687v8.777 c-0.667,0.155-1.345,0.33-2.038,0.54c-16.913,5.089-13.217,18.143-13.054,20.194c0.166,2.051,3.778,7.47,11.494,11.247 c7.717,3.778,16.583,6.815,17.241,10.507c0.656,3.693-2.547,8.947-9.278,8.292c-6.731-0.656-14.941-6.895-14.941-6.895 l-6.649,7.883c0,0,5.252,6.72,17.225,8.213v8.331h9.687v-8.391c12.389-1.946,14.259-11.355,14.259-11.355 s3.365-10.591-5.007-16.666c-8.373-6.075-20.853-7.72-22.904-13.792c-2.051-6.075,4.682-11.247,10.673-9.278 c5.993,1.97,10.92,6.24,10.92,6.24l5.787-7.88L324.468,202.97L324.468,202.97z"></path>
                  <path style="fill:#FFFFFF;" d="M216.416,162.797c2.539-32.874,31.442-33.887,45.231-39.324c1.718-0.677,3.352-1.217,4.848-1.632 c0.543-5.403,5.333-9.632,11.166-9.632c2.497,0,4.806,0.779,6.67,2.088l53.21-1.356c3.984,1.479,2.146,6.61,0.184,7.444 l-48.924,1.249c0.047,0.401,0.074,0.81,0.074,1.225c0,1.005-0.15,1.978-0.42,2.895l49.902-1.275 c3.982,1.477,2.146,6.613,0.181,7.446l-59.684,1.521c-0.393,0.039-0.792,0.06-1.194,0.06l-0.569-0.013l-0.055-0.003l-0.74,0.021 l-0.116-0.097c-0.69-0.087-1.361-0.231-2.004-0.43c-3.237,4.664-8.427,7.885-13.984,11.334 c-10.754,6.676-31.012,10.314-29.975,32.52l-5.212,0.226c-1.181-25.26,20.465-29.753,32.43-37.184 c4.865-3.022,9.409-5.842,12.168-9.611c-0.952-0.934-1.729-2.033-2.272-3.25c-1.168,0.346-2.442,0.776-3.788,1.311 c-12.532,4.944-39.589,4.682-41.921,34.844l-5.212-0.385L216.416,162.797z"></path>
                  <path style="fill:#FFFFFF;" d="M99.574,338.95l92.353,75.92l-21.863,20.15L83.3,353.785L99.574,338.95z"></path>
                </g>
                <path style="fill:#FED298;" d="M257.594,286.569c26.241,7.614,74.638,15.578,74.638,15.578s-2.734,17.396-17.383,20.745 c-14.649,3.352-53.838-4.341-53.838-4.341s-7.145,7.024,5.458,9.367s74.299,1.01,74.299,1.01s63.338-30.01,74.242-34.028 c10.907-4.018,17.377,6.02,17.377,6.02s-72.885,57.709-79.703,62.734c-6.818,5.02-120.241,14.791-120.241,14.791l-33.608,3.415 l-13.288,14.211l-5.964,8.648l-60.62-49.831l48.357-34.341c19.067-31.979,64.028-41.598,90.27-33.981L257.594,286.569z"></path>
                <path style="fill:#F0BA7D;" d="M422.476,308.764c-20.17,15.956-64.542,51.023-69.79,54.888 c-6.818,5.02-120.241,14.791-120.241,14.791l-33.608,3.415l-13.288,14.211l-5.964,8.648l-5.542-4.556 c13.881-13.514,23.945-22.285,21.48-20.903c-2.468,1.382,143.787-12.454,154.99-18.256c11.203-5.803,64.474-48.731,66.813-51.655 c2.339-2.924,5.149-0.585,5.149-0.585l0,0L422.476,308.764L422.476,308.764z"></path>
                <path style="fill:#0F7986;" d="M38.128,390.455l41.808-39.578l102.617,88.81l-34.618,48.431 C102.499,466.923,64.316,432.795,38.128,390.455z"></path>
                <g>
                  <path style="fill:#FFFFFF;" d="M312.657,300.777l-1.343,6.481l15.084,0.894c1.107-1.262,1.909-2.76,1.408-5.275L312.657,300.777z"></path>
                  <path style="fill:#FFFFFF;" d="M420.801,305.679l1.851,1.957l8.094-5.784c0.535-1.154-1.986-1.503-1.986-1.503L420.801,305.679z"></path>
                </g>
              </g>
            </svg>
            <h1 class="overview-title flex font-bold gap-5">
              Total Paid
            </h1>
            <span class="count font-bold text-2xl text-right"></span>
          </div>

          <div class="bg-emerald-400 p-5 w-full rounded-xl flex flex-col">
            <svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve" width="160px" height="160px" fill="#000000" stroke="#000000" stroke-width="1.024">
              <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
              <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
              <g id="SVGRepo_iconCarrier">
                <circle style="fill:#6af967;" cx="256" cy="256" r="256"></circle>
                <path style="fill:#298e2b;" d="M512,256c0-10.512-0.648-20.873-1.879-31.053l-92.936-92.936l-59.316,23.343l-23.343-23.343 l-61.062,21.595l-21.595-21.595l-61.388,21.271l-21.271-21.271l-19.153,21.957l-55.241,2.841l28.181,28.181l-1.767,2.026 l-26.414,1.676l13.328,13.328l1.901,9.733l-0.862,4.884l-14.367,3.939l23.295,23.295l-23.295,8.587l23.05,23.05l-23.05,8.833 l21.501,21.501l-21.501,10.381l22.654,22.654l-22.654,9.228l20.978,20.978l-20.978,10.905l130.132,130.132 C235.127,511.352,245.488,512,256,512C397.384,512,512,397.384,512,256z"></path>
                <g>
                  <rect x="94.815" y="132.017" style="fill:#FFFFFF;" width="74.387" height="24.798"></rect>
                  <rect x="94.815" y="163.892" style="fill:#FFFFFF;" width="74.387" height="24.798"></rect>
                  <rect x="94.815" y="195.784" style="fill:#FFFFFF;" width="74.387" height="24.798"></rect>
                  <rect x="94.815" y="227.659" style="fill:#FFFFFF;" width="74.387" height="24.798"></rect>
                  <rect x="94.815" y="259.551" style="fill:#FFFFFF;" width="74.387" height="24.798"></rect>
                </g>
                <g>
                  <rect x="94.815" y="291.426" style="fill:#386895;" width="74.387" height="24.798"></rect>
                  <rect x="94.815" y="323.301" style="fill:#386895;" width="74.387" height="24.798"></rect>
                  <rect x="94.815" y="355.194" style="fill:#386895;" width="74.387" height="24.798"></rect>
                </g>
                <g>
                  <rect x="177.476" y="132.017" style="fill:#FFFFFF;" width="74.387" height="24.798"></rect>
                  <rect x="177.476" y="163.892" style="fill:#FFFFFF;" width="74.387" height="24.798"></rect>
                </g>
                <g>
                  <rect x="177.476" y="195.784" style="fill:#FF5419;" width="74.387" height="24.798"></rect>
                  <rect x="177.476" y="227.659" style="fill:#FF5419;" width="74.387" height="24.798"></rect>
                  <rect x="177.476" y="259.551" style="fill:#FF5419;" width="74.387" height="24.798"></rect>
                  <rect x="177.476" y="291.426" style="fill:#FF5419;" width="74.387" height="24.798"></rect>
                  <rect x="177.476" y="323.301" style="fill:#FF5419;" width="74.387" height="24.798"></rect>
                  <rect x="177.476" y="355.194" style="fill:#FF5419;" width="74.387" height="24.798"></rect>
                </g>
                <g>
                  <rect x="260.137" y="132.017" style="fill:#FFFFFF;" width="74.387" height="24.798"></rect>
                  <rect x="260.137" y="163.892" style="fill:#FFFFFF;" width="74.387" height="24.798"></rect>
                  <rect x="260.137" y="195.784" style="fill:#FFFFFF;" width="74.387" height="24.798"></rect>
                  <rect x="260.137" y="227.659" style="fill:#FFFFFF;" width="74.387" height="24.798"></rect>
                </g>
                <g>
                  <rect x="260.137" y="259.551" style="fill:#273B7A;" width="74.387" height="24.798"></rect>
                  <rect x="260.137" y="291.426" style="fill:#273B7A;" width="74.387" height="24.798"></rect>
                  <rect x="260.137" y="323.301" style="fill:#273B7A;" width="74.387" height="24.798"></rect>
                  <rect x="260.137" y="355.194" style="fill:#273B7A;" width="74.387" height="24.798"></rect>
                </g>
                <g>
                  <rect x="342.799" y="132.017" style="fill:#FFFFFF;" width="74.387" height="24.798"></rect>
                  <rect x="342.799" y="163.892" style="fill:#FFFFFF;" width="74.387" height="24.798"></rect>
                  <rect x="342.799" y="195.784" style="fill:#FFFFFF;" width="74.387" height="24.798"></rect>
                  <rect x="342.799" y="227.659" style="fill:#FFFFFF;" width="74.387" height="24.798"></rect>
                  <rect x="342.799" y="259.551" style="fill:#FFFFFF;" width="74.387" height="24.798"></rect>
                </g>
                <g>
                  <rect x="342.799" y="291.426" style="fill:#386895;" width="74.387" height="24.798"></rect>
                  <rect x="342.799" y="323.301" style="fill:#386895;" width="74.387" height="24.798"></rect>
                  <rect x="342.799" y="355.194" style="fill:#386895;" width="74.387" height="24.798"></rect>
                </g>
                <g>
                  <rect x="131.31" y="132.017" style="fill:#D0D1D3;" width="37.904" height="24.798"></rect>
                  <rect x="131.31" y="163.892" style="fill:#D0D1D3;" width="37.904" height="24.798"></rect>
                  <rect x="131.31" y="195.784" style="fill:#D0D1D3;" width="37.904" height="24.798"></rect>
                  <rect x="131.31" y="227.659" style="fill:#D0D1D3;" width="37.904" height="24.798"></rect>
                  <rect x="131.31" y="259.551" style="fill:#D0D1D3;" width="37.904" height="24.798"></rect>
                </g>
                <g>
                  <rect x="131.31" y="291.426" style="fill:#273B7A;" width="37.904" height="24.798"></rect>
                  <rect x="131.31" y="323.301" style="fill:#273B7A;" width="37.904" height="24.798"></rect>
                  <rect x="131.31" y="355.194" style="fill:#273B7A;" width="37.904" height="24.798"></rect>
                </g>
                <g>
                  <rect x="214.057" y="132.017" style="fill:#D0D1D3;" width="37.816" height="24.798"></rect>
                  <rect x="214.057" y="163.892" style="fill:#D0D1D3;" width="37.816" height="24.798"></rect>
                </g>
                <g>
                  <rect x="214.057" y="195.784" style="fill:#C92F00;" width="37.816" height="24.798"></rect>
                  <rect x="214.057" y="227.659" style="fill:#C92F00;" width="37.816" height="24.798"></rect>
                  <rect x="214.057" y="259.551" style="fill:#C92F00;" width="37.816" height="24.798"></rect>
                  <rect x="214.057" y="291.426" style="fill:#C92F00;" width="37.816" height="24.798"></rect>
                  <rect x="214.057" y="323.301" style="fill:#C92F00;" width="37.816" height="24.798"></rect>
                  <rect x="214.057" y="355.194" style="fill:#C92F00;" width="37.816" height="24.798"></rect>
                </g>
                <g>
                  <rect x="296.374" y="132.017" style="fill:#D0D1D3;" width="38.15" height="24.798"></rect>
                  <rect x="296.374" y="163.892" style="fill:#D0D1D3;" width="38.15" height="24.798"></rect>
                  <rect x="296.374" y="195.784" style="fill:#D0D1D3;" width="38.15" height="24.798"></rect>
                  <rect x="296.374" y="227.659" style="fill:#D0D1D3;" width="38.15" height="24.798"></rect>
                </g>
                <g>
                  <rect x="296.374" y="259.551" style="fill:#121149;" width="38.15" height="24.798"></rect>
                  <rect x="296.374" y="291.426" style="fill:#121149;" width="38.15" height="24.798"></rect>
                  <rect x="296.374" y="323.301" style="fill:#121149;" width="38.15" height="24.798"></rect>
                  <rect x="296.374" y="355.194" style="fill:#121149;" width="38.15" height="24.798"></rect>
                </g>
                <g>
                  <rect x="378.69" y="132.017" style="fill:#D0D1D3;" width="38.5" height="24.798"></rect>
                  <rect x="378.69" y="163.892" style="fill:#D0D1D3;" width="38.5" height="24.798"></rect>
                  <rect x="378.69" y="195.784" style="fill:#D0D1D3;" width="38.5" height="24.798"></rect>
                  <rect x="378.69" y="227.659" style="fill:#D0D1D3;" width="38.5" height="24.798"></rect>
                  <rect x="378.69" y="259.551" style="fill:#D0D1D3;" width="38.5" height="24.798"></rect>
                </g>
                <g>
                  <rect x="378.69" y="291.426" style="fill:#273B7A;" width="38.5" height="24.798"></rect>
                  <rect x="378.69" y="323.301" style="fill:#273B7A;" width="38.5" height="24.798"></rect>
                  <rect x="378.69" y="355.194" style="fill:#273B7A;" width="38.5" height="24.798"></rect>
                </g>
              </g>
            </svg>
            <h1 class="overview-title flex font-bold gap-5">
              Others Fee
            </h1>
            <span class="count font-bold text-2xl text-right"></span>
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
      const student_number = '<?php echo $_SESSION['student_number'] ?>';

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
    })
  </script>
</body>

</html>