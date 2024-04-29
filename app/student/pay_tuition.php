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
  <svg id="blob" class="absolute left-[-48%] top-[-15rem]" fill="#000000" width="800px" height="800px" viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
    <path d="M606.867 527.324c0-52.874-42.86-95.734-95.734-95.734-52.865 0-95.724 42.862-95.724 95.734s42.859 95.734 95.724 95.734c52.874 0 95.734-42.86 95.734-95.734zm40.96 0c0 75.495-61.199 136.694-136.694 136.694-75.487 0-136.684-61.201-136.684-136.694S435.646 390.63 511.133 390.63c75.495 0 136.694 61.199 136.694 136.694z" />
    <path d="M735.472 265.659c118.81 0 215.122 96.312 215.122 215.122 0 72.662-36.376 138.927-94.997 178.411 9.689 24.717 14.767 51.002 14.767 77.937 0 118.81-96.312 215.122-215.122 215.122-54.129 0-105.007-20.233-144.106-55.678-39.091 35.444-89.969 55.678-144.099 55.678-118.81 0-215.122-96.312-215.122-215.122 0-26.935 5.078-53.22 14.767-77.937-58.621-39.484-94.997-105.749-94.997-178.411 0-118.809 96.31-215.122 215.112-215.122 3.384 0 6.778.097 10.214.29C307.5 156.928 399.367 71.683 511.135 71.683c111.774 0 203.636 85.242 214.124 194.266a182.75 182.75 0 0110.214-.29zm-422.006 43.239c-9.78-1.512-18.398-2.279-26.67-2.279-96.18 0-174.152 77.975-174.152 174.162 0 64.026 34.865 121.891 89.921 152.398 9.568 5.302 13.281 17.186 8.432 26.991-11.862 23.988-18.123 50.069-18.123 76.959 0 96.189 77.973 174.162 174.162 174.162 49.727 0 96.007-21.074 128.92-57.403 8.128-8.972 22.224-8.973 30.354-.002 32.925 36.333 79.206 57.405 128.932 57.405 96.189 0 174.162-77.973 174.162-174.162 0-26.89-6.261-52.971-18.123-76.959-4.848-9.805-1.136-21.69 8.432-26.991 55.056-30.507 89.921-88.372 89.921-152.398 0-96.189-77.973-174.162-174.162-174.162-8.269 0-16.875.766-26.66 2.279-12.545 1.939-23.814-7.883-23.606-20.575-.123-97.918-78.015-175.68-174.073-175.68-96.022 0-173.903 77.718-174.161 173.682.307 14.689-10.962 24.512-23.507 22.573z" />
  </svg>
  <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle backdrop-blur">
    <div class="modal-box">
      <h3 class="font-bold text-lg">Checkout</h3>
      <p class="py-4">You're about to pay the tuition for <span class="font-extrabold"><?php echo $bill_semester ?></span>. This will open a new tab for payment processing.</p>
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
            <button type="button" id="close_modal" class="btn btn-ghost">Close</button>
          </div>
        </form>
      </div>
    </div>
  </dialog>
  <script>
    const redirect = () => window.location.href = './pay_now.php';
    $(document).ready(() => {
      var dialog = document.getElementById('my_modal_5');
      var close_modal = document.getElementById('close_modal');
      const spinSvg = document.getElementById('blob');
      let angle = 0;
      let speed = 10;
      dialog.showModal();

      const animateSpin = (timestamp) => {
        angle += speed;
        spinSvg.style.transform = `rotate(${angle}deg)`;
        speed *= 0.98;
        if (speed > 0.1) {
          requestAnimationFrame(animateSpin);
        }
      }
      requestAnimationFrame(animateSpin);

      $(close_modal).on('click', () => {
        dialog.close();
        redirect();
      });
      $(window).on('keyup', e => {
        if (e.key === 'Escape') {
          dialog.close();
          redirect();
        }
      });

      $('#confirm').on('click', () => {
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
            var formData = {
              bill_id: $('input[name="bill_id"]').val(),
              amount_to_be_paid: $('input[name="amount_to_be_paid"]').val(),
              payment_method: $('input[name="payment_method"]:checked').val()
            };
            var newTab = window.open('', '_blank');
            $.ajax({
              url: 'http://127.0.0.1:5000/payment/bank',
              type: 'POST',
              contentType: 'application/json',
              data: JSON.stringify(formData),
              success: (response) => {
                newTab.document.open();
                newTab.document.write(response);
                newTab.document.close();
              },
              error: (xhr, status, error) => {
                alert('An error occurred while processing payment');
                console.log('AJAX Error:', error);
              },
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
              success: (response) => {
                newTab.document.open();
                newTab.document.write(response);
                newTab.document.close();
              },
              error: (xhr, status, error) => {
                alert('An error occurred while processing payment');
                console.log('AJAX Error:', error);
              }
            });
            break;
          case 'gcash':
            var formData = {
              bill_id: $('input[name="bill_id"]').val(),
              amount_to_be_paid: $('input[name="amount_to_be_paid"]').val(),
              payment_method: $('input[name="payment_method"]:checked').val()
            };
            var newTab = window.open('', '_blank');
            $.ajax({
              url: 'http://127.0.0.1:5000/payment/gcash',
              type: 'POST',
              contentType: 'application/json',
              data: JSON.stringify(formData),
              success: (response) => {
                newTab.document.open();
                newTab.document.write(response);
                newTab.document.close();
              },
              error: (xhr, status, error) => {
                alert('An error occurred while processing payment');
                console.log('AJAX Error:', error);
              }
            });
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