<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EPAY | System Announcement & Messages</title>
  <link rel="preconnect" href="https://rsms.me/">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/4.7.5/socket.io.js" integrity="sha512-luMnTJZ7oEchNDZAtQhgjomP1eZefnl82ruTH/3Oj/Yu5qYtwL7+dVRccACS/Snp1lFXq188XFipHKYE75IaQQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
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
  <main class="w-11/12 max-w-screen-2xl xl:w-10/12 h-full flex mt-10 flex-row justify-between gap-5">
    <?php
    include './components/student_navbar_lg.php';
    student_navbar_lg($currentPage);
    ?>
    <section class="w-full">
      <h1 class="text-xl text-gray-600 font-bold lg:text-2xl xl:text-4xl self-start">Announcements</h1>
      <div class="w-full flex flex-col items-center">
        <div class="hero-content w-full flex-col">
          <div id="announcement_container" class="card flex flex-col shrink-0 w-full gap-10">

            <div class="flex w-full flex-col items-center gap-2">
              <h1 class="text-xl text-gray-600 font-bold lg:text-xl xl:text-2xl self-start">Unread Announcements</h1>
              <div class="w-full flex flex-col gap-5 justify-center items-center" id="unread_container" class="flex flex-col gap-3">

                <div class="loading-container w-full flex flex-col justify-center items-center gap-5">
                  <img id="error_icon" class="hidden w-3/4 lg:w-1/2" src="../../res/images/error.png" alt="">
                  <span id="loading-circle" class="loading loading-spinner loading-lg">
                  </span>
                  <h1 class="note text-center">Getting Unread Announcements, please wait...</h1>
                </div>
              </div>
            </div>

            <div class="flex w-full flex-col items-center gap-2">
              <h1 class="text-xl text-gray-600 font-bold lg:text-xl xl:text-2xl self-start">Read Announcements</h1>
              <div class="w-full flex flex-col gap-5 justify-center items-center" id="read_container">

                <div class="loading-container w-full flex flex-col justify-center items-center gap-5">
                  <img id="error_icon" class="hidden w-3/4 lg:w-1/2" src="../../res/images/error.png" alt="">
                  <span id="loading-circle" class="loading loading-spinner loading-lg">
                  </span>
                  <h1 class="note text-center">Getting Read Announcements, please wait...</h1>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </section>
  </main>
  <script>
    const openLogoutModal = () => document.getElementById("logout_modal").showModal();
    const closeLogoutModal = () => document.getElementById("logout_modal").close();
    const logout = () => window.location.href = "./../utils/logout.php";
    $(document).ready(() => {
      const error_icon = document.getElementById('error_icon');
      const note = document.querySelector('.note');
      const announcement_container = document.getElementById('announcement_container');
      const loadingSpinner = document.querySelector('.loading-container');
      const loadingCircle = document.getElementById('loading-circle');
      const studentNumber = '<?php echo $_SESSION['user_number']; ?>';
      const unread_container = document.getElementById('unread_container');
      const read_container = document.getElementById('read_container');
      const socket = io('http://127.0.0.1:5000')

      const updateUnreadAnnouncementContainer = (unread_announcements, index) => {
        unread_container.innerHTML = '';
        unread_announcements.forEach(announcement => {
          unread_container.innerHTML += `
            <div class="card w-full bg-base-100 shadow-xl p-5 flex flex-col gap-5">
              <div class='w-full flex flex-row justify-between items-center gap-3'>
                <div class="dropdown">
                  <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
                    </svg>
                  </div>
                  <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><button class="mark-as-read" data-id="${announcement.announcement_id}">Mark as Read</button></li>
                  </ul>
                </div>
                <p>Created by Admin: <span class='font-bold'>${announcement.admin_number}</span></p>
              </div>
              <h1 class="text-xl font-bold">${announcement.title}</h1>
              <p class="text-sm">${announcement.content}</p>
            </div>`;

          const buttons = document.querySelectorAll('.mark-as-read');
          buttons.forEach(button => {
            button.addEventListener('click', () => {
              console.log('Mark as read clicked');
              const data = {
                user_number: studentNumber,
                announcement_id: event.target.getAttribute('data-id')
              };
              console.log(data);
              $.ajax({
                url: 'http://127.0.0.1:5000/mark_as_read',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify(data),
                success: (response) => {
                  console.log(response);
                  socket.emit('request_announcements');

                },
                error: (error) => {
                  console.log(error);
                }
              })
            });
          });
        });
        if (unread_announcements.length == 0) {
          unread_container.innerHTML = `
            <div class="card w-full bg-base-100 shadow-xl p-5 flex flex-col gap-5">
              <img src='../../res/images/tumbleweed_8073584.png' alt='tumbleweed'>
              <h1 class="text-xl font-bold">No Unread Announcements</h1>
            </div>`;
        }
      }
      const updateReadAnnouncementContainer = (announcements) => {
        read_container.innerHTML = '';
        announcements.forEach(announcement => {
          read_container.innerHTML += `
            <div class="card w-full bg-base-100 shadow-xl p-5 flex flex-col gap-5">
              <div class='w-full flex flex-row justify-end items-center gap-3'>
                <p class='text-right'>Created by Admin: <span class='font-bold'>${announcement.admin_number}</span></p>
              </div>
              <h1 class="text-xl font-bold">${announcement.title}</h1>
              <p class="text-sm">${announcement.content}</p>
            </div>`;
        });
        if (announcements.length == 0) {
          read_container.innerHTML = `
            <div class="card flex flex-col justify-center items-center w-full bg-base-100 shadow-xl p-5 flex flex-col gap-5">
              <img class='w-1/4' src='../../res/images/tumbleweed_8073584.png' alt='tumbleweed'>
              <h1 class="text-xl font-bold">No Read Announcements.</h1>
            </div>`;
        }
      }
      const socketFetch = () => {
        socket.on('connect', () => {
          console.log('Connected to server');
          socket.emit('request_announcements');
        });

        socket.on('receive_announcements', (announcements) => {
          updateUnreadAnnouncementContainer(announcements.unread_announcements);
          updateReadAnnouncementContainer(announcements.announcements);
          console.log(announcements);
          $(loadingSpinner).addClass('hidden');
        });
      }

      socketFetch();

    });
  </script>
</body>

</html>