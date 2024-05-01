<?php
function step_5_review_admin_form()
{
  echo '<form class="hidden card-body" id="step-5-admin-review">';
  $form_fields = [
    ['label' => 'Admin Number', 'id' => 'reviewAdminNumber', 'type' => 'text'],
    ['label' => 'Role', 'id' => 'reviewRole', 'type' => 'text'],
    ['label' => 'First Name', 'id' => 'reviewFirstname', 'type' => 'text'],
    ['label' => 'Middle Name', 'id' => 'reviewMiddlename', 'type' => 'text'],
    ['label' => 'Gender', 'id' => 'reviewGender', 'type' => 'text'],
    ['label' => 'Last Name', 'id' => 'reviewLastname', 'type' => 'text'],
    ['label' => 'Email', 'id' => 'reviewEmail', 'type' => 'email'],
    ['label' => 'Phone Number', 'id' => 'reviewPhonenumber', 'type' => 'tel'],
    ['label' => 'Birth Date', 'id' => 'reviewBirthdate', 'type' => 'date'],
    ['label' => 'Home Address', 'id' => 'reviewHomeaddress', 'type' => 'text'],
    ['label' => 'Barangay', 'id' => 'revoewBarangay', 'type' => 'text'],
    ['label' => 'City', 'id' => 'reviewCity', 'type' => 'text'],
  ];

  foreach ($form_fields as $field) {
    echo '
      <div class="form-control">
        <label class="label">
            <span class="label-text">' . $field['label'] . '</span>
        </label>
        <input type="' . $field['type'] . '" id="' . $field['id'] . '" class="input border-[#FF6BB3] input-bordered" disabled required aria-required="true"  />
      </div>';
  }
  echo '
    <div class="form-control gap-5 mt-6">
      <button type="submit" class="btn bg-[#FF6BB3] hover:scale-105">
        FINALIZE
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z" />
        </svg>
      </button>
      <button type="button" id="backButtonStep5AdminReview" class="btn btn-ghost bg-zinc-300 hover:scale-105">
        BACK
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
        </svg>
      </button>
    </div>
  </form>';
}
