<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EPAY | System Announcement & Messages</title>
  <link rel="preconnect" href="https://rsms.me/">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
          <div class="card shrink-0 w-full gap-5">
            <div class="card shadow-xl bg-base-100 gap-5 p-3 w-full">
              <h1 class="font-bold">Lorem, ipsum dolor.</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam exercitationem expedita eaque perspiciatis vel aliquid nihil praesentium deserunt iusto delectus iure modi saepe hic autem at reiciendis doloribus ipsum facilis, distinctio asperiores, est voluptatibus. Nemo exercitationem minus alias quos enim quo, autem vero quae? Aliquid doloribus vel ipsam perferendis repellat?</p>
            </div>
            <div class="card shadow-xl bg-base-100 gap-5 p-3 w-full">
              <h1 class="font-bold">Lorem, ipsum dolor.</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam exercitationem expedita eaque perspiciatis vel aliquid nihil praesentium deserunt iusto delectus iure modi saepe hic autem at reiciendis doloribus ipsum facilis, distinctio asperiores, est voluptatibus. Nemo exercitationem minus alias quos enim quo, autem vero quae? Aliquid doloribus vel ipsam perferendis repellat?</p>
            </div>
            <div class="card shadow-xl bg-base-100 gap-5 p-3 w-full">
              <h1 class="font-bold">Lorem, ipsum dolor.</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam exercitationem expedita eaque perspiciatis vel aliquid nihil praesentium deserunt iusto delectus iure modi saepe hic autem at reiciendis doloribus ipsum facilis, distinctio asperiores, est voluptatibus. Nemo exercitationem minus alias quos enim quo, autem vero quae? Aliquid doloribus vel ipsam perferendis repellat?</p>
            </div>
            <div class="card shadow-xl bg-base-100 gap-5 p-3 w-full">
              <h1 class="font-bold">Lorem, ipsum dolor.</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam exercitationem expedita eaque perspiciatis vel aliquid nihil praesentium deserunt iusto delectus iure modi saepe hic autem at reiciendis doloribus ipsum facilis, distinctio asperiores, est voluptatibus. Nemo exercitationem minus alias quos enim quo, autem vero quae? Aliquid doloribus vel ipsam perferendis repellat?</p>
            </div>
            <div class="card shadow-xl bg-base-100 gap-5 p-3 w-full">
              <h1 class="font-bold">Lorem, ipsum dolor.</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam exercitationem expedita eaque perspiciatis vel aliquid nihil praesentium deserunt iusto delectus iure modi saepe hic autem at reiciendis doloribus ipsum facilis, distinctio asperiores, est voluptatibus. Nemo exercitationem minus alias quos enim quo, autem vero quae? Aliquid doloribus vel ipsam perferendis repellat?</p>
            </div>
            <div class="card shadow-xl bg-base-100 gap-5 p-3 w-full">
              <h1 class="font-bold">Lorem, ipsum dolor.</h1>
              <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquam exercitationem expedita eaque perspiciatis vel aliquid nihil praesentium deserunt iusto delectus iure modi saepe hic autem at reiciendis doloribus ipsum facilis, distinctio asperiores, est voluptatibus. Nemo exercitationem minus alias quos enim quo, autem vero quae? Aliquid doloribus vel ipsam perferendis repellat?</p>
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
</body>

</html>