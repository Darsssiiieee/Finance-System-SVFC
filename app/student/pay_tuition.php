<?php
session_start();
if ($_SESSION['role'] !== 'Student') {
  header('Location: ./../accounts/login.php');
  exit();
}
$bill_id = 0;
$bill_amount = 0;
$bill_semester = '';
if (isset($_GET['bill_id']) || !empty($_GET['bill_id']) || isset($_GET['bill_semester'])) {
  $bill_id = $_GET['bill_id'];
  $bill_amount = $_GET['bill_amount'];
  $bill_semester = $_GET['bill_semester'];
} else {
  header('Location: ./student/pay_now.php');
  exit();
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EPAY | Pay My Bill</title>
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

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
    }

    /* Firefox */
    input[type=number] {
      -moz-appearance: textfield;
      appearance: textfield;
    }
  </style>
</head>

<body class="relative">
  <svg id="blob" class="absolute left-[-48%] top-[-15rem]" width="800px" height="800px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" aria-labelledby="flowerIconTitle" stroke="#000000" stroke-width="1" stroke-linecap="square" stroke-linejoin="miter" color="#000000">
    <path d="M12 22C13.5819 22 14.8778 20.7757 14.9918 19.223C16.1704 20.2403 17.9525 20.1896 19.0711 19.0711C20.1896 17.9525 20.2402 16.1705 19.2229 14.9918C20.7757 14.8778 22 13.5819 22 12C22 10.4181 20.7757 9.12224 19.223 9.00816C20.2403 7.82955 20.1896 6.04748 19.0711 4.92894C17.9525 3.81038 16.1705 3.75976 14.9918 4.77708C14.8778 3.22433 13.5819 2 12 2C10.4181 2 9.12224 3.22431 9.00816 4.77704C7.82955 3.75974 6.04749 3.81036 4.92894 4.92891C3.81038 6.04747 3.75977 7.82955 4.77708 9.00816C3.22433 9.12221 2 10.4181 2 12C2 13.5819 3.2243 14.8778 4.77703 14.9918C3.75974 16.1704 3.81037 17.9525 4.92891 19.0711C6.04747 20.1896 7.82955 20.2402 9.00816 19.2229C9.12221 20.7757 10.4181 22 12 22Z" />
    <path d="M12 14C10.8954 14 10 13.1046 10 12C10 10.8954 10.8954 10 12 10C13.1046 10 14 10.8954 14 12C14 13.1046 13.1046 14 12 14Z" />
  </svg>
  <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle backdrop-blur">
    <div class="modal-box">
      <h3 class="font-bold text-lg">Checkout</h3>
      <p class="py-4">You're about to pay the tuition for <?php echo $bill_semester ?></p>
      <div class="modal-action">
        <form class="w-full flex flex-col gap-5" method="post">
          <input type="hidden" name="bill_id" value="<?php echo $bill_id ?>">
          <label class="form-control w-full">
            <div class="label">
              <span class="label-text">Amount Payable: </span>
            </div>
            <input value="<?php echo $bill_amount ?>" type="text" class="input input-bordered w-full" />
          </label>

          <label class="form-control w-full">
            <div class="label">
              <span class="label-text">How Much Do You Want To Pay: </span>
            </div>
            <input name="amount_to_be_paid" maxlength="<?php echo $bill_amount ?>" type="number" class="input input-bordered w-full" />
          </label>

          <div>
            <h1>How Do you want to Pay?</h1>
            <?php
            $payment_methods = [
              ['label' => 'Bank', 'name' => 'bank', 'icon' => '<svg fill="#000000" class="w-6 h-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M3,22H21a1,1,0,0,0,1-1V17a1,1,0,0,0-1-1H20V11h1a1,1,0,0,0,1-1V7a1,1,0,0,0-.594-.914l-9-4a1,1,0,0,0-.812,0l-9,4A1,1,0,0,0,2,7v3a1,1,0,0,0,1,1H4v5H3a1,1,0,0,0-1,1v4A1,1,0,0,0,3,22ZM4,7.65l8-3.556L20,7.65V9H4ZM18,11v5H15.333V11Zm-4.667,0v5H10.667V11ZM8.667,11v5H6V11ZM4,18H20v2H4ZM14,7a1,1,0,0,1-1,1H11a1,1,0,0,1,0-2h2A1,1,0,0,1,14,7Z"/></svg>'],
              ['label' => 'Credit Card', 'name' => 'creditcard', 'icon' => '<svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M5 16C5 15.4477 5.44772 15 6 15H8C8.55229 15 9 15.4477 9 16C9 16.5523 8.55229 17 8 17H6C5.44772 17 5 16.5523 5 16Z" fill="#0F1729"/><path d="M11 15C10.4477 15 10 15.4477 10 16C10 16.5523 10.4477 17 11 17H12C12.5523 17 13 16.5523 13 16C13 15.4477 12.5523 15 12 15H11Z" fill="#0F1729"/><path fill-rule="evenodd" clip-rule="evenodd" d="M6.788 3C5.96948 2.99999 5.29393 2.99998 4.74393 3.04565C4.17258 3.0931 3.64774 3.19496 3.1561 3.45035C2.42553 3.82985 1.82985 4.42553 1.45035 5.1561C1.19496 5.64774 1.0931 6.17258 1.04565 6.74393C0.999977 7.29393 0.999988 7.96946 1 8.78798V15.212C0.999988 16.0305 0.999977 16.7061 1.04565 17.2561C1.0931 17.8274 1.19496 18.3523 1.45035 18.8439C1.82985 19.5745 2.42553 20.1702 3.1561 20.5497C3.64774 20.805 4.17258 20.9069 4.74393 20.9544C5.29394 21 5.96949 21 6.78803 21H17.212C18.0305 21 18.7061 21 19.2561 20.9544C19.8274 20.9069 20.3523 20.805 20.8439 20.5497C21.5745 20.1702 22.1702 19.5745 22.5497 18.8439C22.805 18.3523 22.9069 17.8274 22.9544 17.2561C23 16.7061 23 16.0305 23 15.212V8.78802C23 7.96949 23 7.29394 22.9544 6.74393C22.9069 6.17258 22.805 5.64774 22.5497 5.1561C22.1702 4.42553 21.5745 3.82985 20.8439 3.45035C20.3523 3.19496 19.8274 3.0931 19.2561 3.04565C18.7061 2.99998 18.0305 2.99999 17.212 3H6.788ZM4.07805 5.22517C4.23663 5.1428 4.46402 5.07578 4.90945 5.03879C5.36686 5.00081 5.95898 5 6.83 5H17.17C18.041 5 18.6331 5.00081 19.0906 5.03879C19.536 5.07578 19.7634 5.1428 19.922 5.22517C20.2872 5.41493 20.5851 5.71277 20.7748 6.07805C20.8572 6.23663 20.9242 6.46402 20.9612 6.90945C20.9857 7.20418 20.9947 7.55484 20.9981 8H3.00194C3.00528 7.55484 3.01431 7.20418 3.03879 6.90945C3.07578 6.46402 3.1428 6.23663 3.22517 6.07805C3.41493 5.71277 3.71277 5.41493 4.07805 5.22517ZM3 10V15.17C3 16.041 3.00081 16.6331 3.03879 17.0906C3.07578 17.536 3.1428 17.7634 3.22517 17.922C3.41493 18.2872 3.71277 18.5851 4.07805 18.7748C4.23663 18.8572 4.46402 18.9242 4.90945 18.9612C5.36686 18.9992 5.95898 19 6.83 19H17.17C18.041 19 18.6331 18.9992 19.0906 18.9612C19.536 18.9242 19.7634 18.8572 19.922 18.7748C20.2872 18.5851 20.5851 18.2872 20.7748 17.922C20.8572 17.7634 20.9242 17.536 20.9612 17.0906C20.9992 16.6331 21 16.041 21 15.17V10H3Z" fill="#0F1729"/></svg>'],
              ['label' => 'G-Cash', 'name' => 'gcash', 'icon' => '<svg class="w-6 h-6" viewBox="0 0 192 192" xmlns="http://www.w3.org/2000/svg" fill="none"><path stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="12" d="M84 96h36c0 19.882-16.118 36-36 36s-36-16.118-36-36 16.118-36 36-36c9.941 0 18.941 4.03 25.456 10.544"/><path fill="#000000" d="M145.315 66.564a6 6 0 0 0-10.815 5.2l10.815-5.2ZM134.5 120.235a6 6 0 0 0 10.815 5.201l-10.815-5.201Zm-16.26-68.552a6 6 0 1 0 7.344-9.49l-7.344 9.49Zm7.344 98.124a6 6 0 0 0-7.344-9.49l7.344 9.49ZM84 152c-30.928 0-56-25.072-56-56H16c0 37.555 30.445 68 68 68v-12ZM28 96c0-30.928 25.072-56 56-56V28c-37.555 0-68 30.445-68 68h12Zm106.5-24.235C138.023 79.09 140 87.306 140 96h12c0-10.532-2.399-20.522-6.685-29.436l-10.815 5.2ZM140 96c0 8.694-1.977 16.909-5.5 24.235l10.815 5.201C149.601 116.522 152 106.532 152 96h-12ZM84 40c12.903 0 24.772 4.357 34.24 11.683l7.344-9.49A67.733 67.733 0 0 0 84 28v12Zm34.24 100.317C108.772 147.643 96.903 152 84 152v12a67.733 67.733 0 0 0 41.584-14.193l-7.344-9.49Z"/><path stroke="#000000" stroke-linecap="round" stroke-linejoin="round" stroke-width="12" d="M161.549 58.776C166.965 70.04 170 82.666 170 96c0 13.334-3.035 25.96-8.451 37.223"/></svg>']
            ];

            foreach ($payment_methods as $payment_method) {
            ?>
              <div class="form-control">
                <label class="label cursor-pointer">
                  <span class="label-text flex items-center gap-2"><?php echo $payment_method['icon'] . $payment_method['label'] ?></span>
                  <input type="radio" name="payment_method" value="<?php echo $payment_method['name'] ?>" class="radio checked:bg-red-500" />
                </label>
              </div>
            <?php
            }
            ?>
          </div>

          <div class="flex flex-col gap-3 justify-center w-full ">
            <button type="button" id="confirm" class="btn btn-success">Confirm</button>
            <button type="button" id="close_modal" class="btn btn-ghost">Cancel</button>
          </div>
        </form>
      </div>
    </div>
  </dialog>
  <script>
    const redirect = () => window.location.href = './pay_now.php';
    $(document).ready(function() {
      var dialog = document.getElementById('my_modal_5');
      var close_modal = document.getElementById('close_modal');
      const spinSvg = document.getElementById('blob');
      let angle = 0;
      let speed = 10; // Initial angular velocity
      dialog.showModal();

      function animateSpin(timestamp) {
        angle += speed;
        spinSvg.style.transform = `rotate(${angle}deg)`;

        speed *= 0.99;

        if (speed > 0.1) {
          requestAnimationFrame(animateSpin);
        }
      }
      requestAnimationFrame(animateSpin);

      $(close_modal).on('click', function() {
        dialog.close();
        redirect();
      });
      $(window).on('keyup', function(e) {
        if (e.key === 'Escape') {
          dialog.close();
          redirect();
        }
      });

      $('#confirm').on('click', function() {
        if ($('input[name="amount_to_be_paid"]').val() === '') {
          alert('Please enter the amount you want to pay');
          return;
        }

        if (!$('input[name="payment_method"]').is(':checked')) {
          alert('Please select a payment method');
          return;
        }

        if ($('input[name="amount_to_be_paid"]').val() > <?php echo $bill_amount ?>) {
          alert('Amount to be paid should not exceed the amount payable');
          return;
        }

        switch ($('input[name="payment_method"]:checked').val()) {
          case 'bank':
            var newTab = window.open('', '_blank');

            $.ajax({
              url: 'http://127.0.0.1:5000/payment/bank',
              type: 'POST',
              target: '_blank',
              contentType: 'application/json',
              data: {
                bill_id: $('input[name="bill_id"]').val(),
                amount_to_be_paid: $('input[name="amount_to_be_paid"]').val(),
                payment_method: $('input[name="payment_method"]:checked').val()
              },
              beforeSend: function() {
                alert('Processing payment...');
              },
              success: function(response) {
                $newTab.document.write(response.html);
              },
              error: function(error) {
                alert('An error occurred');
                console.log(error);
              }
            });
            break;
          case 'creditcard':
            var formData = {
              bill_id: $('input[name="bill_id"]').val(),
              amount_to_be_paid: $('input[name="amount_to_be_paid"]').val(),
              payment_method: $('input[name="payment_method"]:checked').val()
            };
            var newTab = window.open('', '_blank');
            $.ajax({
              url: 'http://127.0.0.1:5000/payment/card',
              type: 'POST',
              contentType: 'application/json',
              data: JSON.stringify(formData),
              success: function(response) {
                newTab.document.open();
                newTab.document.write(response);
                newTab.document.close();
              },
              error: function(xhr, status, error) {
                newTab.document.write('<p>An error occurred while processing payment</p>');
                console.log('AJAX Error:', error);
              }
            });
            alert('Processing payment...');
            break;
          case 'gcash':
            var newTab = window.open('about:blank', '_blank');
            var formData = {
              bill_id: $('input[name="bill_id"]').val(),
              amount_to_be_paid: $('input[name="amount_to_be_paid"]').val(),
              payment_method: $('input[name="payment_method"]:checked').val()
            };
            $.ajax({
              url: 'http://127.0.0.1:5000/payment/gcash',
              type: 'POST',
              contentType: 'application/json',
              data: JSON.stringify(formData),
              success: function(response) {
                newTab.document.open();
                newTab.document.write(response);
                newTab.document.close();
              },
              error: function(xhr, status, error) {
                newTab.document.write('<p>An error occurred while processing payment</p>');
                console.log('AJAX Error:', error);
              }
            });
            alert('Processing payment...');
            break;
          default:
            alert('Please select a payment method');
            break;
        }
      });
    });
  </script>
</body>

</html>