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
  <title>EPAY | Conversations</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>
  <link rel="icon" type="image/x-icon" href="./../../res/images/logo.ico">
  <link rel="preconnect" href="https://rsms.me/">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <link rel="stylesheet" href="../../styles/global.css">
  <style>
    *,
    *::before,
    *::after {
      box-sizing: border-box;
      padding: 0;
      margin: 0;
      font-family: "InterVariable";
    }

    .select2-container .select2-selection--single {
      border: 1px solid #d9d9d9;
      border-radius: 20px;
    }

    .select2-container .select2-selection--single .select2-selection__rendered {
      color: #444;
      line-height: 28px;
    }

    .select2-container .select2-selection--single .select2-selection__arrow {
      height: 26px;
    }

    .select2-dropdown {
      border: 1px solid #d9d9d9;
      border-radius: 20px;
    }

    .select2-results__option {
      padding: 6px;
      user-select: none;
      -webkit-user-select: none;
      background-color: #fff;
      color: #444;
      cursor: pointer;
    }

    .select2-results__option[aria-selected="true"] {
      background-color: #f2f2f2;
    }

    .select2-results__option--highlighted[aria-selected] {
      background-color: #3875d7;
      color: #fff;
    }

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

<body class="bg-[#F7EFD8] min-h-screen flex flex-col justify-start items-center">
  <dialog id="loading-modal" class="modal backdrop-blur shadow-2xl modal-bottom sm:modal-middle">
    <div class="modal-box flex flex-col justify-center items-center">
      <h1 class="font-bold">Loading...</h1>
      <div class="modal-action">
        <span class="loading loading-spinner loading-lg"></span>
        <button id="close_modal" class="hidden btn btn-ghost">Close</button>
      </div>
    </div>
  </dialog>
  <?php
  include './components/admin_navbar.php';
  $currentPage = './' . basename(__FILE__);
  navbar($currentPage);
  ?>

  <main class="w-11/12 max-w-screen-2xl xl:w-10/12 flex mt-10 flex-row justify-center gap-5">
    <?php
    include './components/admin_navbar_large.php';
    navbarLargeScreen($currentPage);
    ?>

    <section class="flex flex-col w-11/12 gap-5 justify-start items-center">
      <h1 class="text-xl lg:text-2xl xl:text-4xl text-left font-bold">Conversation</h1>
      <div class="card-body mb-10 grow-0 w-full rounded-xl shadow-2xl bg-base-100">
        <h1 class="text-xl lg:text-2xl xl:text-4xl text-left font-bold">Compose a message</h1>
        <form class="hero-content w-full flex-row justify-center items-center">
          <div class="flex gap-3 flex-col w-3/4 items-center">
            <select id="student_id" class="select select-primary w-1/4 lg:w-full">
              <option disabled selected>Select a Student</option>
            </select>
            <textarea class="textarea w-full textarea-bordered" placeholder="Compose message here..."></textarea>
          </div>
          <button type="send" id="send" class="btn btn-primary">Send</button>
        </form>
      </div>

      <h1 class="text-xl lg:text-2xl xl:text-4xl text-left font-bold">Recent Conversations</h1>
      <div class="card w-full">
        <div class="w-full flex flex-col gap-5" id="recent-messages-container"></div>
      </div>
    </section>
  </main>
  <script>
    const openLogoutModal = () => document.getElementById("logout_modal").showModal();
    const closeLogoutModal = () => document.getElementById("logout_modal").close();
    const logout = () => window.location.href = "./../utils/logout.php";
    $(document).ready(() => {
      $('#student_id').select2()
      const student_id = $('#student_id').val()
      const message = $('.textarea').val()
      const send = $('#send')
      loading_modal = document.getElementById('loading-modal')
      const loading_text = document.querySelector('.modal-box h1')
      const loading_circle = document.querySelector('.modal-box span')
      const close_modal = document.getElementById('close_modal')
      const recent_messages_container = document.getElementById('recent-messages-container')
      // loading_modal.showModal()

      $(close_modal).click(() => {
        loading_modal.close()
      })


      $.ajax({
        url: 'http://127.0.0.1:5000/api/get_all_conversation_of_admin',
        type: 'GET',
        data: {
          admin_number: '<?= $_SESSION['user_number'] ?>'
        },
        beforeSend: () => {
          loading_modal.showModal()
        },
        success: (response) => {
          console.log(response)
          loading_modal.close()
          response.forEach(conversation => {
            recent_messages_container.innerHTML += `
            <a href='./thread.php?tid=${conversation.conversation_id}' class="card-body hover:bg-base-300 transition-all rounded-xl w-full shadow-2xl bg-base-100">
              <h1 class="text-xl lg:text-2xl xl:text-4xl text-left font-bold">Conversation with ${conversation.full_name} - ${conversation.student_number}</h1>
              <p>Recent message: ${conversation.recent_message}</p>
              <p>Timestamp: ${conversation.message_timestamp}</p>
              <div id="messages-container-${conversation.conversation_id}"></div>
            </a>
            `
          })
          if (response.length === 0) {
            recent_messages_container.innerHTML = '<h1 class="text-xl lg:text-2xl xl:text-4xl text-left font-bold">No recent conversations</h1>'
          }
        },
        error: (error) => {
          loading_circle.classList.remove('loading-spinner')
          loading_circle.classList.add('hidden')
          loading_text.textContent = 'An error occurred.'
          close_modal.classList.remove('hidden')
        }
      })

      $.ajax({
        url: 'http://127.0.0.1:5000/api/get_all_student',
        type: 'GET',
        data: {
          admin_number: '<?= $_SESSION['user_number'] ?>'
        },
        beforeSend: () => {
          loading_modal.showModal()
        },
        success: (response) => {
          console.log(response)
          loading_modal.close()
          response.forEach(student => {
            $('#student_id').append(new Option(`${student.student_number} : ${student.first_name} ${student.middle_name}`, `${student.student_number}`))
          })
        },
        error: (error) => {
          loading_circle.classList.remove('loading-spinner')
          loading_circle.classList.add('hidden')
          loading_text.textContent = 'An error occurred.'
          close_modal.classList.remove('hidden')
          console.log(`Error ${error}`)
        }
      })

      $(send).click(e => {
        const student_number = $('#student_id').val()
        const message = $('.textarea').val()
        const admin_number = '<?= $_SESSION['user_number'] ?>'
        e.preventDefault()

        $.ajax({
          url: 'http://127.0.0.1:5000/api/create_new_conversation',
          type: 'POST',
          contentType: 'application/json',
          data: JSON.stringify({
            student_number,
            admin_number
          }),
          beforeSend: () => {
            loading_modal.showModal()
          },
          success: (response) => {
            console.log(response)
            loading_modal.close()
            if (response.conversation_id) {
              $.ajax({
                url: 'http://127.0.0.1:5000/api/send_message',
                type: 'POST',
                contentType: 'application/json',
                data: JSON.stringify({
                  conversation_id: response.conversation_id,
                  sender_number: admin_number,
                  content: message
                }),
                beforeSend: () => {
                  loading_modal.showModal()
                },
                success: (response) => {
                  console.log(response)
                  loading_modal.close()
                  alert('Message sent successfully')
                },
                error: (error) => {
                  loading_circle.classList.remove('loading-spinner')
                  loading_circle.classList.add('hidden')
                  loading_text.textContent = 'An error occurred.'
                  close_modal.classList.remove('hidden')
                }
              })
            } else {
              alert('Failed to create conversation')
            }
          },
          error: (error) => {
            loading_circle.classList.remove('loading-spinner')
            loading_circle.classList.add('hidden')
            loading_text.textContent = 'An error occurred.'
            close_modal.classList.remove('hidden')
          }
        })
      })
    })
  </script>
</body>

</html>
