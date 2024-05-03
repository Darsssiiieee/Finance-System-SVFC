<?php
function landingNavBar()
{
  echo '
  <div id="navBar" class="z-50 navbar border border-slate-900/10 backdrop-blur top-0 sticky">
    <div class="navbar-start">
      <div class="dropdown">
        <div tabindex="0" role="button" class="btn btn-ghost btn-circle">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h7" />
          </svg>
        </div>
        <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
          <li><a href="./app/accounts/sign-up.php">Get Started</a></li>
          <li><a href="./app/accounts/login.php">Log In to My Account</a></li>
          <li><a href="./AboutUS.html">About Us</a></li>
        </ul>
      </div>
    </div>
    <div class="navbar-center">
      <a class="btn btn-ghost text-xl">EPAY</a>
    </div>
  </div>
  ';
}
