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
  <title>EPAY | Announcement</title>
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
  <dialog id="announcement_modal" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
      <h3 class="font-bold text-lg">Add New Announcement!</h3>
      <p class="py-4">This will send to all enrolled student.</p>
      <div class="modal-action">
        <form class="w-full justify-center items-center flex flex-col" method="post">
          <input required aria-required="true" type="hidden" id="admin_number" value="<?php echo $_SESSION['user_number'] ?>" name="admin_number">
          <label class="form-control w-full">
            <div class="label">
              <span class="label-text">Title</span>
            </div>
            <input required aria-required="true" id="announcement_title" type="text" placeholder="Title of the announcement..." class="input input-bordered w-full" />
          </label>

          <label class="form-control w-full">
            <div class="label">
              <span class="label-text">Content</span>
            </div>
            <textarea required aria-required="true" placeholder="Announcement message...." id="announcement_content" class="textarea textarea-bordered w-full"></textarea>
          </label>
          <button id="submit_announcement" type="button" class="mt-3 w-full btn btn-success">Submit</button>
          <button onclick='announcement_modal.close()' type="button" class="mt-3 w-full btn">Close</button>
        </form>
      </div>
    </div>
  </dialog>
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
    <section class="w-full">
      <div class="w-full flex flex-col items-center">
        <div class="hero-content w-full flex-col">
          <div class="w-full flex flex-row justify-between items-center">
            <h1 class="text-xl lg:text-2xl xl:text-4xl text-left font-bold">Announcements</h1>
            <button onclick="announcement_modal.showModal()" id="add_new_annoucement" class="btn btn-success rounded-full shadow-sm">New Announcement <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
              </svg>
            </button>
          </div>
          <div id="announcement_container" class="card shrink-0 w-full gap-5">
            <div class="loading-container w-full flex flex-col justify-center items-center gap-5"><span class="loading loading-spinner loading-lg"></span>
              <h1>Getting Announcements, please wait...</h1>
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
      const announcement_title = document.getElementById('announcement_title');
      const announcement_content = document.getElementById('announcement_content');
      const submit_announcement = document.getElementById('submit_announcement');
      const announcement_container = document.getElementById('announcement_container');
      const loadingSpinner = document.querySelector('.loading-container');
      const socket = io('http://127.0.0.1:5000')
      socket.on('new_announcements', (data) => {
        const announcements = data.announcements;
        loadingSpinner.classList.remove('hidden');
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
      });

      const fetchAnnouncements = () => {
        $.ajax({
          url: 'http://127.0.0.1:5000/api/admin/announcements',
          method: 'GET',
          success: (data) => {
            console.log(data);
            const announcements = data
            loadingSpinner.classList.remove('hidden');
            announcement_container.innerHTML = '';
            if (data.announcements && data.announcements.length === 0) {
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
    <div><button data-id=${announcement.announcement_id} class="btn btn-error rounded-full shadow-sm delete-btn">Delete</button></div>
        <h1 class="font-bold">${announcement.title}</h1>
        <p>${announcement.content}</p>
    </div>
  `;
                announcement_container.innerHTML += announcementCard;
              });
            }

            loadingSpinner.classList.add('hidden');

            $('.delete-btn').click((e) => {
              const announcementId = $(e.target).data('id');
              console.log('Delete button clicked for announcement id:', announcementId);
              $.ajax({
                url: 'http://127.0.0.1:5000/api/announcement/delete',
                method: 'DELETE',
                contentType: 'application/json',
                data: JSON.stringify({
                  announcement_id: announcementId
                }),
                success: (data) => {
                  alert('Announcement deleted successfully.')
                  console.log(data);
                  fetchAnnouncements();
                },
                error: (error) => {
                  alert('Something went wrong');
                  console.log(error);
                }
              })
            });
          },
        });
      }

      $(submit_announcement).on('click', (e) => {
        e.preventDefault();
        if (announcement_title.value === '' || announcement_content.value === '') {
          alert('Please fill all fields');
          return;
        }
        if (announcement_title.value.length > 255) {
          alert('Title must be less than 255 characters');
          return;
        }
        if (announcement_title.value.length < 5 || announcement_content.value.length < 10) {
          alert('Title must be at least 5 characters and content must be at least 10 characters');
          return;
        }

        $.ajax({
          url: 'http://127.0.0.1:5000/api/create_announcement',
          method: 'POST',
          contentType: 'application/json',
          data: JSON.stringify({
            title: announcement_title.value,
            content: announcement_content.value,
            admin_number: $('#admin_number').val()
          }),
          success: (data) => {
            alert('Announcement created successfully.')
            console.log(data);
          },
          error: (error) => {
            alert('Something went wrong');
            console.log(error);
          }
        })
      });


      // Call the function initially to fetch announcements
      fetchAnnouncements();
    });
  </script>
</body>

</html>
