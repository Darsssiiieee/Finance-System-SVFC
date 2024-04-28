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
      <div class="w-full flex flex-col items-center">
        <div class="hero-content w-full flex-col">
          <div class="text-center">
            <h1 class="text-xl font-bold">System Announcement</h1>
          </div>
          <div id="announcement_container" class="card shrink-0 w-full gap-5">
            <div class="loading-container w-full flex flex-col justify-center items-center gap-5"><span class="loading loading-spinner loading-lg"></span>
              <h1 class="note">Getting Announcements, please wait...</h1>
            </div>
          </div>
        </div>
      </div>

      <div class=" w-full flex flex-col items-center">
        <div class="hero-content w-full gap-5 flex-col">
          <div class="text-center">
            <h1 class="text-xl font-bold">Conversations</h1>
          </div>
          <div class="card shrink-0 w-full gap-5">
            <div class="card w-full flex-row bg-base-100 shadow-xl p-1">
              <div class="avatar flex items-center pl-4 justify-center">
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                  <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                </div>
              </div>
              <div class="card-body p-3 flex flex-row w-full justify-between items-center text-center">
                <div>
                  <h2 class="card-title text-sm">Juan Dela Cruz</h2>
                  <p class="text-xs text-left">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum, accusamus.</p>
                </div>
                <div class="card-actions">
                  <button class="btn btn-primary">View</button>
                </div>
              </div>
            </div>

            <div class="card w-full flex-row bg-base-100 shadow-xl p-1">
              <div class="avatar flex items-center pl-4 justify-center">
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                  <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                </div>
              </div>
              <div class="card-body p-3 flex flex-row w-full justify-between items-center text-center">
                <div>
                  <h2 class="card-title text-sm">Juan Dela Cruz</h2>
                  <p class="text-xs text-left">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum, accusamus.</p>
                </div>
                <div class="card-actions">
                  <button class="btn btn-primary">View</button>
                </div>
              </div>
            </div>

            <div class="card w-full flex-row bg-base-100 shadow-xl p-1">
              <div class="avatar flex items-center pl-4 justify-center">
                <div class="w-8 h-8 md:w-10 md:h-10 rounded-full ring ring-primary ring-offset-base-100 ring-offset-2">
                  <img src="https://daisyui.com/images/stock/photo-1534528741775-53994a69daeb.jpg" />
                </div>
              </div>
              <div class="card-body p-3 flex flex-row w-full justify-between items-center text-center">
                <div>
                  <h2 class="card-title text-sm">Juan Dela Cruz</h2>
                  <p class="text-xs text-left">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Cum, accusamus.</p>
                </div>
                <div class="card-actions">
                  <button class="btn btn-primary">View</button>
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
      const socket = io('http://127.0.0.1:5000')
      const note = document.querySelector('.note');
      const announcement_container = document.getElementById('announcement_container');
      const loadingSpinner = document.querySelector('.loading-container');
      const updateAnnouncementContainer = (announcements) => {
        announcement_container.innerHTML = '';
        if (announcements.length === 0) {
          announcement_container.innerHTML = `
            <div class="card shadow-xl bg-base-100 gap-5 p-3 w-full">
                <h1 class="font-bold">No Announcement Found</h1>
                <p>There are no announcements at the moment.</p>
            </div>
        `;
        } else {
          announcements.forEach(announcement => {
            const announcementCard = `
                <div class="card shadow-xl bg-base-100 gap-5 p-5 md:p-8 lg:p-10 w-full">
                    <h1 class="font-bold">${announcement.title}</h1>
                    <p>${announcement.content}</p>
                </div>
            `;
            announcement_container.innerHTML += announcementCard;
          });
        }
        loadingSpinner.classList.add('hidden');
        loadingSpinner.classList.remove('flex')
      }

      $.ajax({
        url: 'http://127.0.0.1:5000/handle_initial_announcements_on_connect',
        type: 'GET',
        success: (data) => {
          console.log('Initial Announcements:', data.announcements);
          updateAnnouncementContainer(data.announcements);
        },
        error: (error) => {
          console.log('Error:', error);
          note.innerHTML = 'An error occurred while fetching announcements';
        }
      });

      socket.on('new_announcement', (data) => {
        console.log('New Announcement:', data.announcements);
        updateAnnouncementContainer(data.announcements);
      });

      socket.emit('handle_initial_announcements_on_connect');

      socket.on('connect', () => {
        console.log('Connected to server');
      });

      socket.on('disconnect', () => {
        console.log('Disconnected from server');
      });
    });
  </script>
</body>

</html>