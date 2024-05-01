<?php
function step_2_form()
{
  echo '
  <form id="step-2" method="post" class="hidden card-body">
    <label class="form-control w-full max-w-xs">
      <div class="label">
        <span class="label-text">Your User Number</span>
      </div>
      <input disabled aria-disabled="true" id="user_number_input" class="input input-bordered border-[#FF6BB3] w-full max-w-xs" required aria-required=true />
      <div class="label">
        <span class="label-text-alt">Please take note of this</span>
      </div>
    </label>';

  $formElements = [
    [
      "label" => "Password",
      "name" => "password",
      "type" => "password",
      "placeholder" => "Password",
      "minlength" => 8
    ],
    [
      "label" => "Confirm Password",
      "name" => "confirmPassword",
      "type" => "password",
      "placeholder" => "Password",
      "minlength" => 8
    ]
  ];

  foreach ($formElements as $element) {
    echo '<label class="form-control w-full max-w-xs">';
    echo '<div class="label">';
    echo '<span class="label-text">' . $element["label"] . '</span>';
    echo '</div>';
    echo '<input name="' . $element["name"] . '" type="' . $element["type"] . '"';
    echo ' placeholder="' . $element["placeholder"] . '"';
    echo ' minlength="' . $element["minlength"] . '"';
    echo ' class="input input-bordered input-secondary w-full max-w-xs border-[#FF6BB3]" />';
    echo '</label>';
  }


  echo '
  <div class="form-control">
    <label class="cursor-pointer label">
      <span class="label-text">Show Password</span>
      <input id="showPassword" type="checkbox" class="checkbox checkbox-secondary border-[#FF6BB3]" />
    </label>
  </div>

  <div class="form-control gap-5 mt-6">
    <button id="stepTwoSubmitBtn" class="btn btn-secondary border-[#FF6BB3] bg-[#FF6BB3] hover:scale-105">
      CONTINUE
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z" />
      </svg>
    </button>
    <button id="backButtonStep2" type="button" class="btn btn-ghost bg-zinc-300 hover:scale-105">
      BACK
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
      </svg>
    </button>
  </div>
</form>';
}
