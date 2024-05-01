<?php
function step_3_form()
{
  echo '
  <form class="card-body flex-col justify-center hidden" id="step-3-avatar">
    <h1 class="text-xl font-bold text-center">Select an Avatar</h1>
    <p class="text-center text-gray-500">Choose an avatar, defaults to Avatar 1</p>
  <div class="w-full grid grid-cols-3 gap-5 place-content-center">';
  $avatarRadioList = [
    [
      'label' => 'Avatar 1', 'name' => 'avatar', 'value' => 'avatar_1.png', 'src' => '../../res/images/avatar/avatar_1.png'
    ],
    [
      'label' => 'Avatar 2', 'name' => 'avatar', 'value' => 'avatar_2.png', 'src' => '../../res/images/avatar/avatar_2.png'
    ],
    [
      'label' => 'Avatar 3', 'name' => 'avatar', 'value' => 'avatar_3.png', 'src' => '../../res/images/avatar/avatar_3.png'
    ],
    [
      'label' => 'Avatar 4', 'name' => 'avatar', 'value' => 'avatar_4.png', 'src' => '../../res/images/avatar/avatar_4.png'
    ],
    [
      'label' => 'Avatar 5', 'name' => 'avatar', 'value' => 'avatar_5.png', 'src' => '../../res/images/avatar/avatar_5.png'
    ],
    [
      'label' => 'Avatar 6', 'name' => 'avatar', 'value' => 'avatar_6.png', 'src' => '../../res/images/avatar/avatar_6.png'
    ],
    [
      'label' => 'Avatar 7', 'name' => 'avatar', 'value' => 'avatar_7.png', 'src' => '../../res/images/avatar/avatar_7.png'
    ],
    [
      'label' => 'Avatar 8', 'name' => 'avatar', 'value' => 'avatar_8.png', 'src' => '../../res/images/avatar/avatar_8.png'
    ],
    [
      'label' => 'Avatar 9', 'name' => 'avatar', 'value' => 'avatar_9.png', 'src' => '../../res/images/avatar/avatar_9.png'
    ],
    [
      'label' => 'Avatar 10', 'name' => 'avatar', 'value' => 'avatar_10.png', 'src' => '../../res/images/avatar/avatar_10.png'
    ],
    [
      'label' => 'Avatar 11', 'name' => 'avatar', 'value' => 'avatar_11.png', 'src' => '../../res/images/avatar/avatar_11.png'
    ],
    [
      'label' => 'Avatar 12', 'name' => 'avatar', 'value' => 'avatar_12.png', 'src' => '../../res/images/avatar/avatar_12.png'
    ]
  ];
  foreach ($avatarRadioList as $avatar) {
    echo '
    <div class="flex flex-col justify-center items-center">
      <p>' . $avatar['label'] . '</p>
      <label class="avatar-radio flex flex-row items-center justify-center gap-3 w-full">
        <input type="radio" name="' . $avatar['name'] . '" value="' . $avatar['value'] . '" class="radio" />
        <div class="w-full">
          <img src="' . $avatar['src'] . '" alt="' . $avatar['label'] . '" class="w-12 rounded-full" />
        </div>
      </label>
    </div>';
  }
  echo '
  </div>
    <div class="form-control gap-5 mt-6">
      <button id="stepThreeSubmitBtn" class="btn btn-secondary border-[#FF6BB3] bg-[#FF6BB3] hover:scale-105">
        CONTINUE
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z" />
        </svg>
      </button>
      <button id="backButtonStep3Avatar" type="button" class="btn btn-ghost bg-zinc-300 hover:scale-105">
        BACK
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
        </svg>
      </button>
    </div>
  </form>';
}
