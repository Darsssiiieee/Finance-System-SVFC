<?php
function step_4_admin_form()
{
  echo '
  <form id="step-4-admin" method="post" class="hidden card-body">
    <label class="form-control w-full max-w-xs">
      <div class="label">
        <span class="label-text">Gender</span>
      </div>
      <select name="gender" required aria-required="true" class="select border-[#FF6BB3] w-full max-w-xs">
        <option disabled selected>Your Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Non-Binary">Non-Binary</option>
        <option value="Others">Others</option>
      </select>
      <div class="label">
        <span id="errorLabel" class="label-text-alt"></span>
      </div>
    </label>';
  $formFields = [
    [
      'label' => 'First Name',
      'name' => 'firstname',
      'placeholder' => 'First Name',
      'type' => 'text',
      'additionalClasses' => ''
    ],
    [
      'label' => 'Middle Name',
      'name' => 'middlename',
      'placeholder' => 'Middle Name',
      'type' => 'text',
      'additionalClasses' => ''
    ],
    [
      'label' => 'Last Name',
      'name' => 'lastname',
      'placeholder' => 'Last Name',
      'type' => 'text',
      'additionalClasses' => ''
    ],
    [
      'label' => 'Email',
      'name' => 'email',
      'placeholder' => 'Email',
      'type' => 'email',
      'additionalClasses' => ''
    ],
    [
      'label' => 'Phone Number',
      'name' => 'phonenumber',
      'placeholder' => 'Phone Number',
      'type' => 'tel',
      'additionalClasses' => ''
    ],
    [
      'label' => 'Birth Date',
      'name' => 'birthdate',
      'placeholder' => 'Birth Date',
      'type' => 'date',
      'additionalClasses' => ''
    ],
    [
      'label' => 'Home Address',
      'name' => 'homeaddress',
      'placeholder' => 'Home Address',
      'type' => 'text',
      'additionalClasses' => ''
    ],
    [
      'label' => 'Barangay',
      'name' => 'barangay',
      'placeholder' => 'Barangay',
      'type' => 'text',
      'additionalClasses' => ''
    ],
    [
      'label' => 'City',
      'name' => 'city',
      'placeholder' => 'City',
      'type' => 'text',
      'additionalClasses' => ''
    ]
  ];

  foreach ($formFields as $field) {
    echo '
    <div class="form-control">
      <label class="label">
        <span class="label-text">' . $field['label'] . '</span>
      </label>
      <input type="' . $field['type'] . '" name="' . $field['name'] . '" placeholder="' . $field['placeholder'] . '" class="input border-[#FF6BB3] input-bordered' . $field['additionalClasses'] . '" required />
    </div>';
  }



  echo '
    <div class="form-control gap-5 mt-6">
      <button type="submit" id="stepFourAdminSubmitBtn" class="btn bg-[#FF6BB3] hover:scale-105">
        FINALIZE
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z" />
        </svg>
      </button>
      <button type="button" id="backButtonStep4Admin" class="btn btn-ghost bg-zinc-300 hover:scale-105">
        BACK
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
        </svg>
      </button>
    </div>
  </form>';
}
