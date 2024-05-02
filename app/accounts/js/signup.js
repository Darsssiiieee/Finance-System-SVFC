$(document).ready(() => {
	const stepOne = $('#step-1');
	const stepTwo = $('#step-2');
	const stepThreeAvatar = $('#step-3-avatar');
	const stepFourAdmin = $('#step-4-admin');
	const stepFourStudent = $('#step-4-student');
	const stepFiveAdminReview = $('#step-5-admin-review');
	const stepFiveStudentReview = $('#step-5-student-review');
	const statusModal = document.getElementById('status_modal');
	const statusMessage = document.getElementById('status_message');
	const statusInfo = document.getElementById('status_info');
	const sessionStorage = window.sessionStorage;
	const changeCurrentProgress = (step) => {
		$('.step').removeClass('step-secondary');
		$('.step').each((index, element) => {
			if (index + 1 <= step) {
				$(element).addClass('step-secondary');
			}
		});
	};
	const generateRandomNumber = (role) => {
		if (role === 'Admin') {
			return (
				'A-' + String(Math.floor(Math.random() * 10000000)).padStart(7, '0')
			);
		}
		return 'S-' + String(Math.floor(Math.random() * 10000000)).padStart(7, '0');
	};
	const changeCurrentPageMessages = (message, miscMessage) => {
		$('#currentPage').text(message);
		$('#currentPageMiscText').text(miscMessage);
	};
	const changeStatusModalTextsAndShowModal = (message, info) => {
		statusModal.showModal();
		statusMessage.textContent = message;
		statusInfo.textContent = info;
	};
	var user_number;
	var role;

	$('#stepOneSubmitBtn').on('click', (e) => {
		e.preventDefault();
		if ($('#roleSelect').val() === 'Admin') {
			$('input[name="password"]').prop('required', true);
			$('input[name="confirmPassword"]').prop('required', true);
			$('#roleSelect').prop('required', false);
			stepOne.addClass('hidden');
			stepTwo.removeClass('hidden');
			changeCurrentProgress(2);
			user_number = generateRandomNumber('Admin');
			role = 'Admin';
			sessionStorage.setItem('user_number', user_number);
			sessionStorage.setItem('role', role);
			$('#user_number_input').val(user_number);
			changeCurrentPageMessages(
				'Create a strong password',
				'Create a strong password to continue.',
			);
		} else if ($('#roleSelect').val() === 'Student') {
			$('input[name="password"]').prop('required', true);
			$('input[name="confirmPassword"]').prop('required', true);
			$('#roleSelect').prop('required', false);
			stepOne.addClass('hidden');
			stepTwo.removeClass('hidden');
			changeCurrentProgress(2);
			user_number = generateRandomNumber('Student');
			role = 'Student';
			sessionStorage.setItem('user_number', user_number);
			sessionStorage.setItem('role', role);
			$('#user_number_input').val(user_number);
			changeCurrentPageMessages(
				'Create a strong password',
				'Create a strong password to continue.',
			);
		} else {
			changeStatusModalTextsAndShowModal(
				'Invalid role',
				'Please select a role to continue.',
			);
		}
	});

	$('#backButtonStep2').click(() => {
		stepTwo.addClass('hidden');
		stepOne.removeClass('hidden');
		changeCurrentProgress(1);
		$('input[name="password"]').prop('required', false);
		$('input[name="confirmPassword"]').prop('required', false);
		$('#roleSelect').prop('required', true);
		changeCurrentPageMessages('Sign Up', 'Sign Up to continue.');
	});

	$('#stepTwoSubmitBtn').on('click', (e) => {
		e.preventDefault();
		const password = $('input[name="password"]').val();
		const confirmPassword = $('input[name="confirmPassword"]').val();
		if (password !== confirmPassword) {
			changeStatusModalTextsAndShowModal(
				'Passwords do not match',
				'Please make sure that the passwords match.',
			);
		} else if (password.length < 8) {
			changeStatusModalTextsAndShowModal(
				'Password too short',
				'Please make sure that the password is at least 8 characters long.',
			);
		} else {
			stepTwo.addClass('hidden');
			stepThreeAvatar.removeClass('hidden');
			$('input[name="password"]').prop('required', false);
			$('input[name="confirmPassword"]').prop('required', false);
			sessionStorage.setItem('password', password);
			sessionStorage.setItem('confirmPassword', confirmPassword);
			$('input[name="avatar"]').prop('required', true);
			changeCurrentProgress(3);
			changeCurrentPageMessages(
				'Select an avatar',
				'Select an avatar to continue.',
			);
		}
	});

	$('#backButtonStep3Avatar').click(() => {
		stepThreeAvatar.addClass('hidden');
		stepTwo.removeClass('hidden');
		$('input[name="avatar"]').prop('required', false);
		changeCurrentProgress(2);
		changeCurrentPageMessages(
			'Create a strong password',
			'Create a strong password to continue.',
		);
	});

	$('#stepThreeSubmitBtn').on('click', (e) => {
		e.preventDefault();
		const avatar = $('input[name="avatar"]:checked').val();
		console.log(avatar);
		if (avatar === '')
			changeStatusModalTextsAndShowModal(
				'No avatar selected',
				'Please select an avatar to continue.',
			);
		else {
			sessionStorage.setItem('avatar', avatar);
			$('input[name="avatar"]').prop('required', false);
			stepThreeAvatar.addClass('hidden');
			$('input[name="avatar"]').prop('required', false);
			if (role === 'Admin') {
				stepFourAdmin.removeClass('hidden');
				stepThreeAvatar.addClass('hidden');
				changeCurrentProgress(4);
				changeCurrentPageMessages(
					'Enter your information',
					'Enter your information to continue.',
				);
			} else {
				$('#academic_program').empty();
				$.ajax({
					url: 'http://127.0.0.1:5000/course/college',
					type: 'GET',
					beforeSend: function () {
						$('#academic_program').empty();
						$('#academic_program').append(
							$('<option>', {
								value: '',
								text: 'Loading academic programs...',
								disabled: true,
								selected: true,
							}),
						);
					},
					success: function (response) {
						$('#academic_program').empty();
						$('#academic_program').append(
							$('<option>', {
								value: '',
								text: 'Your Academic Program',
								disabled: true,
								selected: true,
							}),
						);
						response.forEach((course) => {
							$('#academic_program').append(
								$('<option>', {
									value: course,
									text: course,
								}),
							);
						});
					},
					error: function (error) {
						console.log(error);
					},
				});

				stepFourStudent.removeClass('hidden');
				stepThreeAvatar.addClass('hidden');
				changeCurrentProgress(4);
				changeCurrentPageMessages(
					'Enter your information',
					'Enter your information to continue.',
				);
			}
		}
	});

	$('#backButtonStep4Admin').click(() => {
		stepFourAdmin.addClass('hidden');
		stepThreeAvatar.removeClass('hidden');
		$('input[name="avatar"]').prop('required', true);
		changeCurrentProgress(3);
		changeCurrentPageMessages(
			'Select an avatar',
			'Select an avatar to continue.',
		);
	});

	$('#backButtonStep4Student').click(() => {
		stepFourStudent.addClass('hidden');
		stepThreeAvatar.removeClass('hidden');
		$('input[name="avatar"]').prop('required', true);
		changeCurrentProgress(3);
		changeCurrentPageMessages(
			'Select an avatar',
			'Select an avatar to continue.',
		);
	});

	$('#stepFourAdminSubmitBtn').on('click', (e) => {
		e.preventDefault();
		var firstname = $('input[name="firstname"]').val();
		var middlename = $('input[name="middlename"]').val();
		var lastname = $('input[name="lastname"]').val();
		var email = $('input[name="email"]').val();
		var phonenumber = $('input[name="phonenumber"]').val();
		var birthdate = $('input[name="birthdate"]').val();
		var homeaddress = $('input[name="homeaddress"]').val();
		var barangay = $('input[name="barangay"]').val();
		var city = $('input[name="city"]').val();
		var gender = $('select[name="gender"]').val();

		if (
			firstname === '' ||
			middlename === '' ||
			lastname === '' ||
			email === '' ||
			phonenumber === '' ||
			birthdate === '' ||
			homeaddress === '' ||
			barangay === '' ||
			city === '' ||
			gender === ''
		) {
			changeStatusModalTextsAndShowModal(
				'Please fill out all fields',
				'Please fill out all fields to continue.',
			);
		} else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email) && email !== '') {
			changeCurrentPageMessages(
				'Invalid email address',
				'Please enter a valid email address to continue.',
			);
		} else {
			stepFourAdmin.addClass('hidden');
			stepFiveAdminReview.removeClass('hidden');
			changeCurrentProgress(5);
			changeCurrentPageMessages(
				'Review your information',
				'Review your information to continue.',
			);
			sessionStorage.setItem('firstname', firstname);
			sessionStorage.setItem('middlename', middlename);
			sessionStorage.setItem('lastname', lastname);
			sessionStorage.setItem('email', email);
			sessionStorage.setItem('phonenumber', phonenumber);
			sessionStorage.setItem('birthdate', birthdate);
			sessionStorage.setItem('homeaddress', homeaddress);
			sessionStorage.setItem('barangay', barangay);
			sessionStorage.setItem('city', city);
			sessionStorage.setItem('gender', gender);

			$('#reviewAdminNumber').val(sessionStorage.getItem('user_number'));
			$('#reviewRole').val(sessionStorage.getItem('role'));
			$('#reviewFirstname').val(sessionStorage.getItem('firstname'));
			$('#reviewMiddlename').val(sessionStorage.getItem('middlename'));
			$('#reviewLastname').val(sessionStorage.getItem('lastname'));
			$('#reviewEmail').val(sessionStorage.getItem('email'));
			$('#reviewPhonenumber').val(sessionStorage.getItem('phonenumber'));
			$('#reviewBirthdate').val(sessionStorage.getItem('birthdate'));
			$('#reviewHomeaddress').val(sessionStorage.getItem('homeaddress'));
			$('#revoewBarangay').val(sessionStorage.getItem('barangay'));
			$('#reviewCity').val(sessionStorage.getItem('city'));
			$('#reviewGender').val(sessionStorage.getItem('gender'));
		}
	});

	$('#stepFourStudentSubmitBtn').on('click', (e) => {
		e.preventDefault();
		var firstname = $('#studentFirstname').val();
		var middlename = $('#studentMiddlename').val();
		var lastname = $('#studentLastname').val();
		var email = $('#studentEmail').val();
		var phonenumber = $('#studentPhone').val();
		var birthdate = $('#studentBirthdate').val();
		var homeaddress = $('#studentHomeaddress').val();
		var barangay = $('#studentBarangay').val();
		var city = $('#studentCity').val();
		var gender = $('select[name="genderStudent"]').val();
		var academicprogram = $('#academic_program').val();
		var yearlevel = $('select[name="yearlevel"]').val();

		if (
			firstname === '' ||
			middlename === '' ||
			lastname === '' ||
			email === '' ||
			phonenumber === '' ||
			birthdate === '' ||
			homeaddress === '' ||
			barangay === '' ||
			city === '' ||
			gender === '' ||
			academicprogram === '' ||
			yearlevel === ''
		) {
			changeStatusModalTextsAndShowModal(
				'Please fill out all fields',
				'Please fill out all fields to continue.',
			);
		} else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email) && email !== '') {
			statusModal.showModal();
			changeStatusModalTextsAndShowModal(
				'Invalid email address',
				'Please enter a valid email address to continue.',
			);
		} else if (!/^(09|\+639)\d{9}$/.test(phonenumber)) {
			statusModal.showModal();
			changeStatusModalTextsAndShowModal(
				'Invalid phone number',
				'Please enter a valid phone number to continue.',
			);
		} else if (!/^\d{4}-\d{2}-\d{2}$/.test(birthdate)) {
			statusModal.showModal();
			changeStatusModalTextsAndShowModal(
				'Invalid birthdate',
				'Please enter a valid birthdate to continue.',
			);
		} else if (yearlevel < 1 || yearlevel > 6) {
			statusModal.showModal();
			changeStatusModalTextsAndShowModal(
				'Invalid year level',
				'Please enter a valid year level to continue.',
			);
		} else {
			stepFourStudent.addClass('hidden');
			stepFiveStudentReview.removeClass('hidden');
			changeCurrentProgress(5);
			changeCurrentPageMessages(
				'Review your information',
				'Review your information to continue.',
			);
			sessionStorage.setItem('firstname', firstname);
			sessionStorage.setItem('middlename', middlename);
			sessionStorage.setItem('lastname', lastname);
			sessionStorage.setItem('email', email);
			sessionStorage.setItem('phonenumber', phonenumber);
			sessionStorage.setItem('birthdate', birthdate);
			sessionStorage.setItem('homeaddress', homeaddress);
			sessionStorage.setItem('barangay', barangay);
			sessionStorage.setItem('city', city);
			sessionStorage.setItem('gender', gender);
			sessionStorage.setItem('academicprogram', academicprogram);
			sessionStorage.setItem('yearlevel', yearlevel);

			$('#studentReviewStudentNumber').val(
				sessionStorage.getItem('user_number'),
			);
			$('#studentReviewRole').val(sessionStorage.getItem('role'));
			$('#studentReviewFirstname').val(sessionStorage.getItem('firstname'));
			$('#studentReviewMiddlename').val(sessionStorage.getItem('middlename'));
			$('#studentReviewLastname').val(sessionStorage.getItem('lastname'));
			$('#studentReviewEmail').val(sessionStorage.getItem('email'));
			$('#studentReviewPhone').val(sessionStorage.getItem('phonenumber'));
			$('#studentReviewBirthdate').val(sessionStorage.getItem('birthdate'));
			$('#studentReviewHomeAddress').val(sessionStorage.getItem('homeaddress'));
			$('#studentReviewBarangay').val(sessionStorage.getItem('barangay'));
			$('#studentReviewCity').val(sessionStorage.getItem('city'));
			$('#studentReviewGender').val(sessionStorage.getItem('gender'));
			$('#studentReviewAcademicprogram').val(
				sessionStorage.getItem('academicprogram'),
			);
			$('#studentReviewyearlevel').val(sessionStorage.getItem('yearlevel'));
		}
	});

	$('#backButtonStep5AdminReview').click(() => {
		stepFiveAdminReview.addClass('hidden');
		stepFourAdmin.removeClass('hidden');
		changeCurrentProgress(4);
		changeCurrentPageMessages(
			'Enter your information',
			'Enter your information to continue.',
		);
	});

	$('#backButtonStep5StudentReview').click(() => {
		stepFiveStudentReview.addClass('hidden');
		stepFourStudent.removeClass('hidden');
		changeCurrentProgress(4);
		changeCurrentPageMessages(
			'Enter your information',
			'Enter your information to continue.',
		);
	});

	$('#finalizeSignUpAdmin').click((e) => {
		e.preventDefault();
		const role = sessionStorage.getItem('role');
		if (role === 'Admin') {
			$.ajax({
				type: 'POST',
				url: 'http://127.0.0.1:5000/register',
				contentType: 'application/json',
				data: JSON.stringify({
					role: role,
					password: sessionStorage.getItem('password'),
					user_number: sessionStorage.getItem('user_number'),
					first_name: sessionStorage.getItem('firstname'),
					middle_name: sessionStorage.getItem('middlename'),
					last_name: sessionStorage.getItem('lastname'),
					email: sessionStorage.getItem('email'),
					phone_number: sessionStorage.getItem('phonenumber'),
					birthdate: sessionStorage.getItem('birthdate'),
					gender: sessionStorage.getItem('gender'),
					home_address: sessionStorage.getItem('homeaddress'),
					barangay: sessionStorage.getItem('barangay'),
					city: sessionStorage.getItem('city'),
					avatar: sessionStorage.getItem('avatar'),
				}),
				success: function (response) {
					if (response.message === 'User registered successfully') {
						changeStatusModalTextsAndShowModal(
							'User successfully added',
							'Please take note of the user number: ' +
								sessionStorage.getItem('user_number') +
								' as this will be used for logging in as well as your password. Please proceed to login page.',
						);
						$.ajax({
							url: 'http://127.0.0.1:5000/send_mail',
							type: 'POST',
							contentType: 'application/json',
							data: JSON.stringify({
								email: sessionStorage.getItem('email'),
								subject: 'Welcome to SVFC this is your user number.',
								message:
									'Welcome to the St. Vincent De Ferrer College of Camarin. Your user number is ' +
									sessionStorage.getItem('user_number') +
									'. Please take note of this as this will be used for logging in. Enjoy your stay!',
							}),
							success: function (response) {
								console.log(response);
							},
							error: function (error) {
								console.log(error);
							},
						});
						sessionStorage.clear();
					} else {
						changeStatusModalTextsAndShowModal(
							'Error adding user',
							'There was an error adding the user. Please try again.',
						);
					}
				},
				error: function (error) {
					if (error.responseJSON.error === 'Invalid email') {
						changeStatusModalTextsAndShowModal(
							'Invalid email',
							'Please enter a valid email address to continue.',
						);
					} else if (error.responseJSON.error === 'Invalid phone number') {
						changeStatusModalTextsAndShowModal(
							'Invalid phone number',
							'Please enter a valid phone number to continue.',
						);
					} else if (error.responseJSON.error === 'Invalid date format') {
						changeStatusModalTextsAndShowModal(
							'Invalid birthdate',
							'Please enter a valid birthdate to continue.',
						);
					} else {
						changeStatusModalTextsAndShowModal(
							'Error adding user',
							'There was an error adding the user. Please try again.',
						);
					}
				},
			});
		} else {
			changeStatusModalTextsAndShowModal(
				'Invalid role',
				'Please select a role to continue.',
			);
		}
	});

	$('#finalizeSignUpStudent').click((e) => {
		e.preventDefault();
		const role = sessionStorage.getItem('role');
		if (role === 'Student') {
			$.ajax({
				type: 'POST',
				url: 'http://127.0.0.1:5000/register',
				contentType: 'application/json',
				data: JSON.stringify({
					role: role,
					password: sessionStorage.getItem('password'),
					user_number: sessionStorage.getItem('user_number'),
					first_name: sessionStorage.getItem('firstname'),
					middle_name: sessionStorage.getItem('middlename'),
					last_name: sessionStorage.getItem('lastname'),
					email: sessionStorage.getItem('email'),
					phone_number: sessionStorage.getItem('phonenumber'),
					birthdate: sessionStorage.getItem('birthdate'),
					year_level: sessionStorage.getItem('yearlevel'),
					academic_program: sessionStorage.getItem('academicprogram'),
					home_address: sessionStorage.getItem('homeaddress'),
					barangay: sessionStorage.getItem('barangay'),
					city: sessionStorage.getItem('city'),
					gender: sessionStorage.getItem('gender'),
					avatar: sessionStorage.getItem('avatar'),
				}),
				success: function (response) {
					if (response.message === 'User registered successfully') {
						changeStatusModalTextsAndShowModal(
							'User successfully added',
							'Please take note of the user number: ' +
								sessionStorage.getItem('user_number') +
								' as this will be used for logging in as well as your password. Please proceed to login page.',
						);
						$.ajax({
							url: 'http://127.0.0.1:5000/send_mail',
							type: 'POST',
							contentType: 'application/json',
							data: JSON.stringify({
								email: sessionStorage.getItem('email'),
								subject: 'Welcome to SVFC this is your user number.',
								message:
									'Welcome to the St. Vincent De Ferrer College of Camarin. Your user number is ' +
									sessionStorage.getItem('user_number') +
									'. Please take note of this as this will be used for logging in. Enjoy your stay!',
							}),
							success: function (response) {
								console.log(response);
							},
							error: function (error) {
								console.log(error);
							},
						});
					} else {
						changeStatusModalTextsAndShowModal(
							'Error adding user',
							'There was an error adding the user. Please try again.',
						);
					}
					console.log(response);
				},
				error: function (error) {
					if (error.responseJSON.error === 'Invalid email') {
						changeStatusModalTextsAndShowModal(
							'Invalid email',
							'Please enter a valid email address to continue.',
						);
					} else if (error.responseJSON.error === 'Invalid phone number') {
						changeStatusModalTextsAndShowModal(
							'Invalid phone number',
							'Please enter a valid phone number to continue.',
						);
					} else if (error.responseJSON.error === 'Invalid date format') {
						changeStatusModalTextsAndShowModal(
							'Invalid birthdate',
							'Please enter a valid birthdate to continue.',
						);
					} else if (error.responseJSON.error === 'Invalid year level') {
						changeStatusModalTextsAndShowModal(
							'Invalid year level',
							'Please enter a valid year level to continue.',
						);
					} else if (error.responseJSON.error === 'Invalid role') {
						changeStatusModalTextsAndShowModal(
							'Invalid role',
							'Please select a role to continue.',
						);
					} else if (error.responseJSON.error === 'Missing parameters') {
						changeStatusModalTextsAndShowModal(
							'Missing parameters',
							'Please fill out all fields to continue.',
						);
					} else if (error.responseJSON.error === 'Invalid academic program') {
						changeStatusModalTextsAndShowModal(
							'Invalid academic program',
							'Please select a valid academic program to continue.',
						);
					} else if (error.responseJSON.error === 'Invalid gender') {
						changeStatusModalTextsAndShowModal(
							'Invalid Gender',
							'Please select a valid one to continue.',
						);
					} else if (
						error.responseJSON.error ===
						'Password must be at least 8 characters long'
					) {
						changeStatusModalTextsAndShowModal(
							'Password too short',
							'Please make sure that the password is at least 8 characters long.',
						);
					} else {
						changeStatusModalTextsAndShowModal(
							'Error adding user',
							'There was an error adding the user. Please try again.',
						);
					}
				},
			});
		}
	});

	$('#showPassword').change(() => {
		const passwordInput = $('input[name="password"]');
		const confirmPasswordInput = $('input[name="confirmPassword"]');
		if ($('#showPassword').is(':checked')) {
			passwordInput.attr('type', 'text');
			confirmPasswordInput.attr('type', 'text');
		} else {
			passwordInput.attr('type', 'password');
			confirmPasswordInput.attr('type', 'password');
		}
	});
});
