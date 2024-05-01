<?php
function step_5_review_student_form()
{
  echo '<form class="hidden card-body" id="step-5-student-review">';
  $form_fields = [
    ['label' => 'Student Number', 'id' => 'studentReviewStudentNumber', 'type' => 'text'],
    ['label' => 'Role', 'id' => 'studentReviewRole', 'type' => 'text'],
    ['label' => 'Firstname', 'id' => 'studentReviewFirstname', 'type' => 'text'],
    ['label' => 'Middle Name', 'id' => 'studentReviewMiddlename', 'type' => 'text'],
    ['label' => 'Last Name', 'id' => 'studentReviewLastname', 'type' => 'text'],
    ['label' => 'Birth Date', 'id' => 'studentReviewBirthdate', 'type' => 'date'],
    ['label' => 'Gender', 'id' => 'studentReviewGender', 'type' => 'text'],
    ['label' => 'Email', 'id' => 'studentReviewEmail', 'type' => 'email'],
    ['label' => 'Phone', 'id' => 'studentReviewPhone', 'type' => 'tel'],
    ['label' => 'Academic Program', 'id' => 'studentReviewAcademicprogram', 'type' => 'text'],
    ['label' => 'Year Level', 'id' => 'studentReviewyearlevel', 'type' => 'text'],
    ['label' => 'Home Address', 'id' => 'studentReviewHomeAddress', 'type' => 'text'],
    ['label' => 'Barangay', 'id' => 'studentReviewBarangay', 'type' => 'text'],
    ['label' => 'City', 'id' => 'studentReviewCity', 'type' => 'text']
  ];

  foreach ($form_fields as $field) {
    echo '
    <label class="form-control w-full max-w-xs">
      <div class="label">
          <span class="label-text">' . $field['label'] . '</span>
        </div>
        <input id="' . $field['id'] . '" name="' . $field['id'] . '" type="' . $field['type'] . '" class="input input-bordered input-secondary w-full max-w-xs" disabled aria-required="true" required aria-required=true />
        <div class="label">
            <span id="errorLabel" class="label-text-alt"></span>
      </div>
    </label>';
  }
  echo '
    <div class="form-control gap-5 mt-6">
      <button id="finalizeSignUpStudent" type="button" class="btn bg-[#FF6BB3] hover:scale-105">
        FINALIZE
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z" />
        </svg>
      </button>
      <button type="button" id="backButtonStep5StudentReview" class="btn btn-ghost bg-zinc-300 hover:scale-105">
        BACK
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
        </svg>
      </button>
    </div>
  </form>';
}
