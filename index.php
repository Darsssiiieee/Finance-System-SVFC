<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EPAY | Home</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="styles/global.css">
</head>

<body class="flex flex-col items-center">
  <?php
  include './public/component/landingNavBar.php';
  landingNavBar();
  ?>

  <main class="w-full max-w-screen-2xl lg:w-11/12 xl:w-3/4 flex flex-col p-5 gap-10">
    <div class="flex flex-col lg:flex-row lg:items-center gap-5">
      <div>
        <img src="./res/images/svfc_logo.png" />
      </div>
      <div class="flex flex-col gap-3">
        <h1 class="font-bold text-3xl text-emerald-700"><span class="text-[#ff00ff]">Pay Digitally</span> - EPAY</h1>
        <p>Welcome to EPAY, your one-stop solution for all digital payments. Get started today, digital payments at your fingertips.</p>
        <a class="btn btn-secondary" href="./app/accounts/sign-up.php">Get Started</a>
      </div>
    </div>

    <div class="flex flex-col gap-4">
      <h1 class="whyText text-3xl text-center text-emerald-700">Why EPAY?</h1>

      <div class="grid grid-rows- gap-3 grid-cols-2">
        <div class="border flex flex-col gap-3 border-black rounded-xl p-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-aperture">
            <circle cx="12" cy="12" r="10"></circle>
            <line x1="14.31" y1="8" x2="20.05" y2="17.94"></line>
            <line x1="9.69" y1="8" x2="21.17" y2="8"></line>
            <line x1="7.38" y1="12" x2="13.12" y2="2.06"></line>
            <line x1="9.69" y1="16" x2="3.95" y2="6.06"></line>
            <line x1="14.31" y1="16" x2="2.83" y2="16"></line>
            <line x1="16.62" y1="12" x2="10.88" y2="21.94"></line>
          </svg>
          <h1>Secure Transactions</h1>
          <p>With EPAY, your transactions are secure and encrypted to the highest standards. You can trust us with your money.</p>
        </div>

        <div class="border flex flex-col gap-3 border-black rounded-xl p-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chrome">
            <circle cx="12" cy="12" r="10"></circle>
            <circle cx="12" cy="12" r="4"></circle>
            <line x1="21.17" y1="8" x2="12" y2="8"></line>
            <line x1="3.95" y1="6.06" x2="8.54" y2="14"></line>
            <line x1="10.88" y1="21.94" x2="15.46" y2="14"></line>
          </svg>
          <h1>Fast Transfers</h1>
          <p>EPAY ensures your transfers are fast and instantaneous. No more waiting for hours for your transactions to complete.</p>
        </div>

        <div class="border flex flex-col gap-3 border-black rounded-xl p-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-code">
            <polyline points="16 18 22 12 16 6"></polyline>
            <polyline points="8 6 2 12 8 18"></polyline>
          </svg>
          <h1>Reliable Infrastructure</h1>
          <p>Our robust and reliable infrastructure ensures that our services are always available when you need them.</p>
        </div>

        <div class="border flex flex-col gap-3 border-black rounded-xl p-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card">
            <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
            <line x1="1" y1="10" x2="23" y2="10"></line>
          </svg>
          <h1>User-Friendly Interface</h1>
          <p>Our user-friendly interface makes it easy for anyone to use EPAY. Making transactions has never been easier.</p>
        </div>

        <div class="border flex flex-col gap-3 border-black rounded-xl p-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database">
            <ellipse cx="12" cy="5" rx="9" ry="3"></ellipse>
            <path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path>
            <path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path>
          </svg>
          <h1>User-Friendly Interface</h1>
          <p>Our user-friendly interface makes it easy for anyone to use EPAY. Making transactions has never been easier.</p>
        </div>

        <div class="border flex flex-col gap-3 border-black rounded-xl p-3">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send">
            <line x1="22" y1="2" x2="11" y2="13"></line>
            <polygon points="22 2 15 22 11 13 2 9 22 2"></polygon>
          </svg>
          <h1>Modern Interface</h1>
          <p>Our modern interface incorporates the latest design trends, providing a fresh and contemporary user experience.</p>
        </div>
      </div>
    </div>

    <div class="flex flex-col gap-5">
      <h1 class="testimonialHeading text-3xl text-center text-emerald-700">Testimonials</h1>

      <div class="grid grid-cols-1 gap-5">
        <div class="flex flex-col border-2 rounded-lg border-black p-5">
          <h1>Modern Interface</h1>
          <p>Our modern interface incorporates the latest design trends, providing a fresh and contemporary user experience.</p>
          <div class="rating">
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" checked />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
          </div>
        </div>
        <div class="flex flex-col border-2 rounded-lg border-black p-5">
          <h1>Jane Smith</h1>
          <p>"I love the low fees and fast transfers. EPAY is now my go-to for all online transactions."</p>
          <div class="rating">
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" checked />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
          </div>
        </div>
        <div class="flex flex-col border-2 rounded-lg border-black p-5">
          <h1>Robert Johnson</h1>
          <p>"The 24/7 support is fantastic. I had an issue and it was resolved quickly. Great service!"</p>
          <div class="rating">
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" checked />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
          </div>
        </div>
        <div class="flex flex-col border-2 rounded-lg border-black p-5">
          <h1>Mary Davis</h1>
          <p>"I appreciate the secure transactions and the peace of mind it gives me. EPAY is trustworthy."</p>
          <div class="rating">
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" checked />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
          </div>
        </div>
        <div class="flex flex-col border-2 rounded-lg border-black p-5">
          <h1>James Miller</h1>
          <p>"The modern interface is sleek and easy to navigate. EPAY has made online payments a breeze."</p>
          <div class="rating">
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" checked />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
          </div>
        </div>
        <div class="flex flex-col border-2 rounded-lg border-black p-5">
          <h1>Patricia Wilson</h1>
          <p>"EPAY's global reach is impressive. I can send money to my family overseas with no issues."</p>
          <div class="rating">
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" checked />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
            <input type="radio" name="rating-4" class="mask mask-star-2 bg-green-500" />
          </div>
        </div>
      </div>
    </div>


    <div>
      <h1>Developers & Creators</h1>
      <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        <?php
        $cards = [
          [
            'imgSrc' => './res/images/froilan.jpg',
            'title' => 'Froilan J. Aquino',
            'description' => 'Measure what can be measured, and make measurable what cannot be',
            'badge' => 'Developer'
          ],
          [
            'imgSrc' => './res/images/Princess.png',
            'title' => 'Princess T. Villaester',
            'description' => '"Learn to rest not to quit!"',
            'badge' => 'Fashion'
          ],
          [
            'imgSrc' => './res/images/Darsie.jpg',
            'title' => 'Darsie L. Lotino',
            'description' => 'Don\'t be disappointed if people refuse to help you Remember the words of Einstein: "I am thankful to all those who said no, Because of them, I did it Myself."',
            'badge' => 'Fashion'
          ],
          [
            'imgSrc' => './res/images/KC.jpg',
            'title' => 'Kc Angelo B. Magabo',
            'description' => '"Life is like a rainbow, you need both sunshine and rain to see the beauty of it."',
            'badge' => 'Design'
          ],
          [
            'imgSrc' => './res/images/Harvey.jpg',
            'title' => 'Mark Harvey D. Funda',
            'description' => 'Don\'t limit yourself. Many people limit themselves to what they think they can do. You can go as far as your mind lets you. What you believe, remember, you can achieve.',
            'badge' => 'Fashion'
          ]
        ];

        foreach ($cards as $card) {
          echo
          '<div class="flex items-center justify-center">
          <div class="card w-96 bg-base-100 shadow-xl">
              <figure>
                  <div class="avatar">
                      <div class="w-32 rounded">
                          <img src="' . $card['imgSrc'] . '" alt="developer and entities images" />
                      </div>
                  </div>
              </figure>
              <div class="card-body">
                  <h2 class="card-title">' . $card['title'] . '</h2>
                  <p>' . $card['description'] . '</p>
                  <div class="card-actions justify-end">
                      <div class="badge badge-outline">' . $card['badge'] . '</div>
                  </div>
              </div>
          </div>
        </div>';
        }
        ?>
      </div>
    </div>
  </main>

  <footer class="footer p-10 bg-base-300 text-base-content">
    <nav>
      <h6 class="footer-title">Services</h6>
      <a class="link link-hover">Branding</a>
      <a class="link link-hover">Design</a>
      <a class="link link-hover">Marketing</a>
      <a class="link link-hover">Advertisement</a>
    </nav>
    <nav>
      <h6 class="footer-title">Company</h6>
      <a class="link link-hover">About us</a>
      <a class="link link-hover">Contact</a>
      <a class="link link-hover">SVFC</a>
    </nav>
    <nav>
      <h6 class="footer-title">Social</h6>
      <div class="grid grid-flow-col gap-4">
        <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
            <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"></path>
          </svg></a>
        <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
            <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"></path>
          </svg></a>
        <a><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" class="fill-current">
            <path d="M9 8h-3v4h3v12h5v-12h3.642l.358-4h-4v-1.667c0-.955.192-1.333 1.115-1.333h2.885v-5h-3.808c-3.596 0-5.192 1.583-5.192 4.615v3.385z"></path>
          </svg></a>
      </div>
    </nav>
  </footer>
</body>

</html>
