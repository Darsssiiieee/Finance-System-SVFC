<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EPAY | Sign Up</title>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="styles/global.css">
</head>
<body>
  <main>
    <nav class="bg-base-200 p-5 flex flex-row justify-between">
      <a href="../index.html"><img class="w-1/6" src="../res/images/logo.png" alt=""></a>
      <a class="text-xs link link-neutral" href="./login.html">Log In Instead?</a>
    </nav>
    <div class="hero w-full min-h-screen bg-base-200">
      <div class="hero-content flex-col">
        <div class="text-center lg:text-left">
          <h1 class="text-3xl font-bold">Sign Up</h1>
          <p class="py-6">Sign Up to continue.</p>
        </div>
        <div class="card shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
          <form class="card-body">
            <div class="form-control">
              <label class="label">
                <span class="label-text">Email</span>
              </label>
              <input type="email" placeholder="email" class="input input-bordered" required />
            </div>
            <div class="form-control">
              <label class="label">
                <span class="label-text">Password</span>
              </label>
              <input type="password" placeholder="password" class="input input-bordered" required />
              <label class="label">
                <a href="#" class="label-text-alt link link-hover">Forgot password?</a>
              </label>
            </div>
            <div class="form-control mt-6">
              <button class="btn btn-secondary">LOGIN</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </main>
</body>
</html>