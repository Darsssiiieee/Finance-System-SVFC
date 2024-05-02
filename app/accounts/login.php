<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EPAY | Log In</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="./../../styles/global.css">
</head>

<body>
  <dialog id="info_modal" class="modal modal-bottom sm:modal-middle">
    <div class="modal-box">
      <h3 id="info-title" class="font-bold text-lg">Hello!</h3>
      <p id="info-desc" class="py-4">Press ESC key or click the button below to close</p>
      <div class="modal-action">
        <form method="dialog">
          <!-- if there is a button in form, it will close the modal -->
          <button class="btn">Close</button>
        </form>
      </div>
    </div>
  </dialog>
  <div class="bg-[#F7EFD8] min-h-screen overflow-hidden w-full relative flex justify-center">
    <div class="absolute w-full h-screen flex flex-col gap-1 overflow-hidden">
      <img src="./../../res/images/7848733_8241.png" class="bg-cover bg-repeat" alt="">
      <img src="./../../res/images/7848733_8241.png" class="bg-cover bg-repeat" alt="">
      <img src="./../../res/images/7848733_8241.png" class="bg-cover bg-repeat" alt="">
    </div>
    <img src="./../../res/images/Logologo.png" class="w-16 absolute bottom-5" alt="">

    <main class="w-full">
      <div class="hero min-h-screen w-full">
        <div class="hero-content flex-col w-11/12 gap-5 lg:justify-between lg:flex-row">
          <div class="text-center">
            <h1 class="text-3xl text-center font-bold">LOGIN</h1>
            <p class="py-6">Log In to continue.</p>
          </div>
          <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
            <form method="post" class="card-body">
              <label class="form-control w-full max-w-xs">
                <div class="label">
                  <span class="label-text">Login As:</span>
                </div>
                <select name="role" aria-required="true" required class="mode select border-[#FF6BB3] select-bordered">
                  <option disabled selected>Select Login Role:</option>
                  <option value="Admin">Admin</option>
                  <option value="Student">Student</option>
                </select>
                <div class="label">
                </div>
              </label>
              <div class="form-control">
                <label class="label">
                  <span class="label-text">Admin or Student number:</span>
                </label>
                <input aria-required="true" name="usernumber" type="text" placeholder="User Number" class="input input-bordered border-[#FF6BB3]" required />
              </div>
              <div class="form-control">
                <label class="label">
                  <span class="label-text">Password</span>
                </label>
                <input name="password" type="password" placeholder="Password" class="input input-bordered border-[#FF6BB3]" required aria-required="true" />
              </div>
              <div class="form-control mt-6 gap-5">
                <button id="loginUser" type="submit" class="btn text-white bg-[#FF6BB3]">
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                  </svg>
                  LOGIN
                </button>
                <a href="./sign-up.php" class="btn btn-ghost hover:cursor text-[#FF6BB3]">Sign Up Instead?</a>

              </div>
            </form>
          </div>
        </div>
      </div>
    </main>
  </div>
  <script>
    $(document).ready(function() {
      const infoModal = document.getElementById('info_modal');
      const showModalAndInfoTitle = (title, desc) => {
        const infoTitle = document.getElementById('info-title');
        const infoDesc = document.getElementById('info-desc');
        infoTitle.innerText = title;
        infoDesc.innerText = desc;
        infoModal.showModal();
      };


      $('#loginUser').click(function(e) {
        e.preventDefault();
        let role = $('select[name="role"]').val();
        let usernumber = $('input[name="usernumber"]').val();
        let password = $('input[name="password"]').val();
        $.ajax({
          url: 'http://127.0.0.1:5000/login',
          type: 'POST',
          contentType: 'application/json',
          data: JSON.stringify({
            role: role,
            user_number: usernumber,
            password: password
          }),
          success: function(response) {
            sessionStorage.setItem('role', role);
            sessionStorage.setItem('first_name', response.first_name);
            sessionStorage.setItem('middle_name', response.middle_name);
            sessionStorage.setItem('last_name', response.last_name);
            sessionStorage.setItem('email', response.email);
            sessionStorage.setItem('phone', response.phone);
            sessionStorage.setItem('birthdate', response.birthdate);
            sessionStorage.setItem('home_address', response.home_address);
            sessionStorage.setItem('barangay', response.barangay);
            sessionStorage.setItem('city', response.city);
            sessionStorage.setItem('avatar', response.avatar);
            sessionStorage.setItem('initials', (response.first_name[0] + response.last_name[0]).toUpperCase())
            if (role == 'Admin') {
              setTimeout(() => {
                sessionStorage.setItem('admin_number', response.user_number);
                window.location.href = './../../app/admin/dashboard.php';
              }, 5000);
              showModalAndInfoTitle('Success', 'Login successful. Redirecting to admin dashboard...');
            } else if (role == 'Student') {
              sessionStorage.setItem('student_number', response.user_number);
              sessionStorage.setItem('academic_program', response.academic_program);
              sessionStorage.setItem('year_level', response.year_level);
              setTimeout(() => {
                window.location.href = './../../app/student/dashboard.php';
              }, 5000);
              showModalAndInfoTitle('Success', 'Login successful. Redirecting to student dashboard...');
            }
          },
          error: function(error) {
            if (error.responseJSON.error == 'Incorrect password') {
              showModalAndInfoTitle('Error', 'Incorrect password. Please try again.');
            } else if (error.responseJSON.error == 'User not found') {
              showModalAndInfoTitle('Error', 'User not found. Please try again.');
            } else if (error.responseJSON.error == 'Invalid role') {
              showModalAndInfoTitle('Error', 'Invalid role. Please try again.');
            } else if (error.responseJSON.error == 'Missing parameters') {
              showModalAndInfoTitle('Error', 'Missing parameters. Please try again.');
            } else {
              showModalAndInfoTitle('Error', 'An error occurred. Please try again later.');
            }
          }
        });
      });
    });
  </script>
</body>

</html>