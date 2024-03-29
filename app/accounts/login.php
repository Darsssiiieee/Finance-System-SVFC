<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EPAY | Log In</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="styles/global.css">
</head>
<body>
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
      <a href="./login.php" class="link hover:cursor link-secondary">Log In Instead?</a>
    </div>
  </div>
  <main>
    <div class="hero min-h-screen w-full bg-base-200">
      <div class="hero-content flex-col w-full lg:flex-row justify-between items-center">
        <div class="text-center lg:text-left">
          <h1 class="text-3xl font-bold">Login now!</h1>
          <p class="py-6">Log In to continue.</p>
        </div>
        <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
          <form class="card-body">
            <div class="form-control">
              <label class="label">
                <span class="label-text">Admin or Student number:</span>
              </label>
              <input name="loginCode" type="email" placeholder="User Number" class="input input-bordered" required />
            </div>
            <div class="form-control">
              <label class="label">
                <span class="label-text">Password</span>
              </label>
              <input type="password" placeholder="Password" class="input input-bordered" required />
            </div>

            <label class="form-control w-full max-w-xs">
              <div class="label">
                <span class="label-text">Login As:</span>
              </div>
              <select class="select select-bordered">
                <option disabled selected>Select Login Role:</option>
                <option>Admin</option>
                <option>Student</option>
              </select>
              <div class="label">
              </div>
            </label>
            <div class="form-control mt-6">
              <button class="btn btn-secondary">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
</body>
</html>