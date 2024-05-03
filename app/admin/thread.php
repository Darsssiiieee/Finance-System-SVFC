<?php
if (!isset($_GET['tid'])) {
  header("Location: ./conversations.php");
  exit();
}
session_start();
$tid = $_GET['tid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Conversation Thread</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <link href="https://cdn.jsdelivr.net/npm/daisyui@4.7.2/dist/full.min.css" rel="stylesheet" type="text/css" />
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
  </style>
</head>

<body class="bg-[#F7EFD8] flex flex-col justify-center items-center">
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

    <section class="flex flex-col w-11/12 gap-5 justify-center items-center lg:items-start lg:grid lg:grid-cols-1 lg:gap-2">
      <h1 class="text-xl flex flex-row items-center justify-center gap-3 lg:text-2xl xl:text-4xl text-left font-bold">Thread</h1>
      <div id="conversation-container" class="card-body overflow-auto bg-base-100 min-h-96 rounded-xl shadow-xl">
        <div class="w-full flex flex-col min-h-96 justify-center items-center">
          <h1 class="font-bold">Loading...</h1>
          <span class="loading loading-spinner loading-lg"></span>
        </div>

      </div>
      <form class="w-full flex flex-row justify-end gap-5 items-center" id="send-message">
        <textarea class="textarea textarea-bordered w-full" placeholder="Type a message..."></textarea>
        <button class="btn btn-success" id="send">Send</button>
      </form>
    </section>
  </main>
  <script>
    const openLogoutModal = () => document.getElementById("logout_modal").showModal();
    const closeLogoutModal = () => document.getElementById("logout_modal").close();
    const logout = () => window.location.href = "./../utils/logout.php";
    $(document).ready(function() {
      const tid = <?php echo $tid; ?>;
      const user_number = "<?php echo strval($_SESSION['user_number']); ?>";
      const conversationWith = $("span#with");
      const sendButton = $("button#send");
      const modal_loading = document.getElementById('loading-modal');
      const conversationContainer = document.getElementById('conversation-container');
      const fetchConversation = () => {
        $.ajax({
          url: 'http://127.0.0.1:5000/api/thread',
          type: 'GET',
          data: {
            conversation_id: tid
          },
          success: function(response) {
            conversationContainer.innerHTML = '';
            console.log(response);
            response.forEach(message => {
              const chat = document.createElement('div');
              if (message.sender_number === user_number) {
                chat.classList.add('chat', 'chat-end');
              } else {
                chat.classList.add('chat', 'chat-start');
              }
              const chatImage = document.createElement('div');
              chatImage.classList.add('chat-image', 'avatar');
              const image = document.createElement('div');
              image.classList.add('w-10', 'rounded-full');
              const img = document.createElement('img');
              img.src = './../../res/images/avatar/' + message.avatar;
              img.alt = 'Tailwind CSS chat bubble component';
              image.appendChild(img);
              chatImage.appendChild(image);
              chat.appendChild(chatImage);
              const chatHeader = document.createElement('div');
              chatHeader.classList.add('chat-header');
              chatHeader.innerHTML = `${message.first_name} ${message.last_name}`;
              const time = document.createElement('time');
              time.classList.add('text-xs', 'opacity-70', 'px-1');
              time.innerHTML = message.timestamp;
              chatHeader.appendChild(time);
              chat.appendChild(chatHeader);
              const chatBubble = document.createElement('div');
              chatBubble.classList.add('chat-bubble');
              chatBubble.innerHTML = message.content;
              chat.appendChild(chatBubble);
              document.querySelector('.card-body').appendChild(chat);
            });
          },
          error: function(error) {
            console.log(error);
          }
        })
      }
      fetchConversation();

      $(sendButton).click((e) => {
        e.preventDefault();
        const message = $('textarea').val();
        $.ajax({
          url: 'http://127.0.0.1:5000/api/send_message',
          type: 'POST',
          contentType: 'application/json',
          data: JSON.stringify({
            conversation_id: tid,
            sender_number: user_number,
            content: message
          }),
          beforeSend: function() {
            modal_loading.showModal();
          },
          success: function(response) {
            fetchConversation();
            $('textarea').val('');
            modal_loading.close();
          },
          error: function(error) {
            alert('An error occurred while sending message');
            console.log(error);
          }
        })
      });
    });
  </script>
</body>

</html>
