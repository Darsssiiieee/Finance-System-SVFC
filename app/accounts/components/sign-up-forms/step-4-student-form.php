<?php
function step_4_student_form()
{
  echo '
  <form id="step-4-student" method="post" class="hidden card-body">
    <label class="form-control w-full max-w-xs">
      <div class="label">
        <span class="label-text">Gender</span>
      </div>
      <select name="genderStudent" required aria-required="true" class="select border-[#FF6BB3] w-full max-w-xs">
        <option disabled selected>Your Gender</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
        <option value="Non-Binary">Non-Binary</option>
        <option value="Others">Others</option>
      </select>
      <div class="label">
        <span id="errorLabel" class="label-text-alt"></span>
      </div>
    </label>

    <label class="form-control w-full max-w-xs">
      <div class="label">
        <span class="label-text">Academic Program</span>
      </div>
      <select name="academicprogram" id="academic_program" required aria-required="true" class="select border-[#FF6BB3] w-full max-w-xs">
        <option disabled selected>Your Academic Program</option>
        
      </select>
      <div class="label">
        <span id="errorLabel" class="label-text-alt"></span>
      </div>
    </label>

    <label class="form-control w-full max-w-xs">
      <div class="label">
        <span class="label-text">Year Level:</span>
      </div>
      <select name="yearlevel" required aria-required="true" class="select border-[#FF6BB3] w-full max-w-xs">
        <option disabled selected>Year Level</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
      </select>
      <div class="label">
        <span id="errorLabel" class="label-text-alt"></span>
      </div>
    </label>';
  $form_fields = [
    ['label' => 'Firstname', 'id' => 'studentFirstname', 'type' => 'text', 'placeholder' => 'First Name'],
    ['label' => 'Middle Name', 'id' => 'studentMiddlename', 'type' => 'text', 'placeholder' => 'Middle Name'],
    ['label' => 'Last Name', 'id' => 'studentLastname', 'type' => 'text', 'placeholder' => 'Last Name'],
    ['label' => 'Email', 'id' => 'studentEmail', 'type' => 'email', 'placeholder' => 'Email Address'],
    ['label' => 'Phone', 'id' => 'studentPhone', 'type' => 'tel', 'placeholder' => 'Phone Number'],
    ['label' => 'Birth Date', 'id' => 'studentBirthdate', 'type' => 'date', 'placeholder' => 'Birth Date'],
    ['label' => 'Home Address', 'id' => 'studentHomeaddress', 'type' => 'text', 'placeholder' => 'Home Address'],
    ['label' => 'Barangay', 'id' => 'studentBarangay', 'type' => 'text', 'placeholder' => 'Barangay'],
    ['label' => 'City', 'id' => 'studentCity', 'type' => 'text', 'placeholder' => 'City']
  ];

  foreach ($form_fields as $field) {
    echo '
    <label class="form-control w-full max-w-xs">
      <div class="label">
          <span class="label-text">' . $field['label'] . '</span>
      </div>
      <input id="' . $field['id'] . '" type="' . $field['type'] . '" placeholder="' . $field['placeholder'] . '" class="input input-bordered border-[#FF6BB3] w-full max-w-xs" required aria-required=true />
      <div class="label">
          <span id="errorLabel" class="label-text-alt"></span>
      </div>
    </label>';
  }

  echo '
    <div class="form-control gap-5 mt-6">
      <button type="button" id="stepFourStudentSubmitBtn" class="btn text-white bg-[#FF6BB3] hover:scale-105">
        FINALIZE
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z" />
        </svg>
      </button>
      <button type="button" id="backButtonStep4Student" class="btn btn-ghost bg-zinc-300 hover:scale-105">
        BACK
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
        </svg>
      </button>
    </div>
  </form>';
}
