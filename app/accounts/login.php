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
    <style>
      *, *::after, *::before {
        font-family: 'San Francisco Rounded Regular';
      }
      .titlePage {
        font-family: 'San Francisco Rounded Heavy';
      }
      
    </style>
</head>
<div class="bg-[#F7EFD8] min-h-screen overflow-hidden w-full relative flex justify-center">
  <div class="absolute w-full h-screen flex flex-col gap-1 overflow-hidden">
    <img src="./../../res/images/7848733_8241.png" class="bg-cover bg-repeat" alt="">
    <img src="./../../res/images/7848733_8241.png" class="bg-cover bg-repeat" alt="">
    <img src="./../../res/images/7848733_8241.png" class="bg-cover bg-repeat" alt="">
  </div>
  <img src="./../../res/images/Logologo.png" class="w-16 absolute bottom-5" alt="">
  <div id="navBar" class="z-50 navbar border border-slate-900/10 backdrop-blur top-0 absolute">
    <div class="navbar-start">
      <div class="dropdown">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" /></svg>
        </div>
        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
          <li><a href="./pages/accounts/sign-up.php">Get Started</a></li>
          <li><a>Testimony</a></li>
          <li><a>SVFC</a></li>
          <li><a>Contact Us</a></li>
          <li><a>About Us</a></li>
        </ul>
      </div>
    </div>
    <div class="navbar-center">
      <a class="btn btn-ghost text-xl">EPAY</a>
    </div>
    <div class="navbar-end">
      <a href="./sign-up.php" class="link hover:cursor text-[#FF6BB3]">Sign Up Instead?</a>
    </div>
  </div>
  <main class="w-full">
    <div class="hero min-h-screen w-full">
      <div class="hero-content flex-col w-11/12 gap-5 lg:justify-between lg:flex-row">
        <div class="text-center">
          <h1 class="text-3xl titlePage">LOGIN</h1>
          <p class="py-6">Log In to continue.</p>
        </div>
        <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
          <form class="card-body">
            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Login As:</span>
              </div>
              <select class="mode select border-[#FF6BB3] select-bordered">
                <option disabled selected>Select Login Role:</option>
                <option>Admin</option>
                <option>Student</option>
              </select>
              <div class="label">
              </div>
            </label>
            <div class="form-control">
              <label class="label">
                <span class="label-text">Admin or Student number:</span>
              </label>
              <input name="loginCode" type="email" placeholder="User Number" class="input input-bordered border-[#FF6BB3]" required />
            </div>
            <div class="form-control">
              <label class="label">
                <span class="label-text">Password</span>
              </label>
              <input type="password" placeholder="Password" class="input input-bordered border-[#FF6BB3]" required />
            </div>
            <div class="form-control mt-6">
              <button class="btn text-white bg-[#FF6BB3]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                </svg>
                LOGIN
              </button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>

  <script>
    $(document).ready(function() {
      console.log('ready');
      $('.mode').on('mouseover', 'option', function() {
        $(this).css('background-color', 'pink');
        console.log('hovered');
      });
      $('.mode').on('mouseout', 'option', function() {
        $(this).css('background-color', '');
        console.log('hovered');
      });
    });
  </script>
</body>
</html>