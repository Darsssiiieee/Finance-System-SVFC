<?php
session_start();
if (!isset($_SESSION['user_number']) || ($_SESSION['role'] !== 'Student')) {
  header('Location: ./../utils/logout.php');
  exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EPAY | Conversation</title>
  <link rel="preconnect" href="https://rsms.me/">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

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
  include './components/student_navbar_sm.php';
  $currentPage = './' . basename(__FILE__);
  student_navbar_sm($currentPage);
  ?>
  <main class="w-11/12 max-w-screen-2xl xl:w-10/12 h-full flex mt-10 flex-row justify-between gap-5">
    <?php
    include './components/student_navbar_lg.php';
    student_navbar_lg($currentPage);
    ?>

    <section class="flex flex-col w-11/12 gap-5 justify-start items-center">
      <h1 class="text-xl lg:text-2xl xl:text-4xl text-left font-bold">Conversation</h1>
      <div class="card-body mb-10 grow-0 w-full rounded-xl shadow-2xl bg-base-100">
        <h1 class="text-xl lg:text-2xl xl:text-4xl text-left font-bold">Compose a message</h1>
        <form class="hero-content w-full flex-row justify-center items-center">
          <div class="flex gap-3 flex-col w-3/4 items-center">
            <select id="admin_id" class="select select-primary w-1/4 lg:w-full">
              <option disabled selected>Select an Admin</option>
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
    $(document).ready(function() {
      $('#admin_id').select2()
      const admin_id = $('#admin_id').val()
      const message = $('.textarea').val()
      const send = $('#send')
      loading_modal = document.getElementById('loading-modal')
      const loading_text = document.querySelector('.modal-box h1')
      const loading_circle = document.querySelector('.modal-box span')
      const close_modal = document.getElementById('close_modal')
      const recent_messages_container = document.getElementById('recent-messages-container')

      $(close_modal).click(() => {
        loading_modal.close()
      })


      // @conversation_routes.route('/api/get_all_conversation_of_student', methods = ['GET'])
      // def get_all_conversation_of_student():
      //   try:
      //   connection = connect(
      //     user = os.getenv('USER'),
      //     password = os.getenv('PASSWORD'),
      //     port = os.getenv('PORT'),
      //     database = 'svfc_finance'
      //   )

      // student_number = request.args.get('student_number')
      // conversations = []
      // with connection.cursor() as cursor:
      //   cursor.execute(""
      //     "
      //     SELECT c.conversation_id, apt.firstname, apt.lastname, c.admin_number, m.content, m.timestamp FROM conversations_table c LEFT JOIN(
      //       SELECT m1.conversation_id, m1.content, m1.timestamp FROM messages_table m1 INNER JOIN(
      //         SELECT conversation_id, MAX(timestamp) as max_timestamp FROM messages_table GROUP BY conversation_id
      //       ) m2 ON m1.conversation_id = m2.conversation_id AND m1.timestamp = m2.max_timestamp
      //     ) m ON c.conversation_id = m.conversation_id JOIN admin_profile_table apt ON c.admin_number = apt.admin_number WHERE c.student_number = % s ""
      //     ", (student_number,))
      //     print("Query executed successfully") for row in cursor.fetchall():
      //     conversations.append({
      //       'conversation_id': row[0],
      //       'full_name': row[1] + " " + row[2],
      //       'admin_number': row[3],
      //       'recent_message': row[4],
      //       'message_timestamp': row[5]
      //     }) connection.close() return make_response(jsonify(conversations), 200)
      //     except Error as e:
      //     print("MySQL Error:", e) return make_response(jsonify({
      //       'error': str(e)
      //     }), 500)
      //     except Exception as e:
      //     print("Exception:", e) return make_response(jsonify({
      //       'error': str(e)
      //     }), 500)
      $.ajax({
        url: 'http://127.0.0.1:5000/api/get_all_conversation_of_student',
        type: 'GET',
        data: {
          student_number: '<?= $_SESSION['user_number'] ?>'
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
              <h1 class="text-xl lg:text-2xl xl:text-4xl text-left font-bold">Conversation with ${conversation.full_name} - ${conversation.admin_number}</h1>
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
        url: 'http://127.0.0.1:5000/api/get_all_admin',
        type: 'GET',
        beforeSend: () => {
          loading_modal.showModal()
        },
        success: (response) => {
          console.log(response)
          loading_modal.close()
          response.forEach(admin => {
            $('#admin_id').append(new Option(`${admin.admin_number} : ${admin.first_name} ${admin.middle_name}`, `${admin.admin_number}`))
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
        const admin_number = $('#admin_id').val()
        const message = $('.textarea').val()
        const student_number = '<?= $_SESSION['user_number'] ?>'
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
