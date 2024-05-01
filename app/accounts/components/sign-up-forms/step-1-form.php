<?php
function step_1_form()
{
  echo '
  <form id="step-1" class="card-body">
    <div class="form-control">
      <label class="label">
        <span class="label-text">Select a Role</span>
      </label>
      <select id="roleSelect" name="role" required aria-required="true" class="select border-[#FF6BB3] w-full max-w-xs">
        <option disabled selected>Your Role</option>
        <option value="Admin">Admin</option>
        <option value="Student">Student</option>
      </select>
    </div>
    <div class="form-control gap-5 mt-6">
      <button id="stepOneSubmitBtn" type="button" class="text-white btn bg-[#FF6BB3] hover:scale-105">
        NEXT
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z" />
        </svg>
      </button>
      <a href="../../index.php" class="btn btn-ghost bg-zinc-300 hover:scale-105">
        BACK
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
          <path stroke-linecap="round" stroke-linejoin="round" d="M9 15 3 9m0 0 6-6M3 9h12a6 6 0 0 1 0 12h-3" />
        </svg>
      </a>
    </div>
  </form>';
}
