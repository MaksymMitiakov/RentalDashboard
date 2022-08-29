
$(document).ready(function () {

	$('div.vendor').hide();

	$('.position').on('change', function () {
		$position = $('.position').val();

		if ($position == 'Admin' || $position == 'Vendor') {
			$('div.vendor').hide();
			$('div.main-vendor').show();
		} else {
			$('div.vendor').show();
			$('div.main-vendor').hide();
		}
	});

});

$(document).on('click', '.add_vendor', function () {
	var username = $('.username').val();
	var user_type = $('.user_type').val();
	var password = $('.password').val();
	var fullname = $('.fullname').val();
	var phone = $('.phone').val();
	var email = $('.email').val();
	var company = $(".company").val();
	var identity = $(".identity").val();
	var address = $(".address").val();

	if (username.trim() != "" && user_type && user_type.trim() != "" && password.trim() != "") {
		$.ajax({
			type: "POST",
			url: BASE_URL + "add-vendor",
			data: {
				username: username,
				password: password,
				user_type: user_type,
				fullname: fullname,
				phone: phone,
				email: email,
				company: company,
				identity: identity,
				address: address
			},
			dataType: "json",
			cache: false,
			beforeSend: function () {
				$("#loading-screen").show();
			},
			success: function (response) {
				$("#loading-screen").hide();

				if (response.success == true) {
					$('#add_vendor').modal('hide');
					showNotification(
						response.messages,
						"check_circle",
						"success"
					);
					setTimeout(function () {
						window.location.reload(1);
					}, 3000);
				} else {
					$('.error').show();
				}
			}
		});
	} else {
		showNotification(
			messagesLang.please_enter_user_information,
			"info",
			"warning"
		);
	}
	return false;
});

$(document).on('click', '.save_vendor', function () {
	var user_type = $('.user_type').val();
	var fullname = $('.fullname').val();
	var phone = $('.phone').val();
	var email = $('.email').val();
	var username = $('.username').val();
	var company = $('.company').val();
	var identity = $(".identity").val();
	var address = $('.address').val();
	$.ajax({
		type: "POST",
		url: BASE_URL + "save-vendor",
		data: {
			username: username,
			user_type: user_type,
			fullname: fullname,
			phone: phone,
			email: email,
			company: company,
			identity: identity,
			address: address
		},
		dataType: "json",
		cache: false,
		beforeSend: function () {
			$("#loading-screen").show();
		},
		success: function (response) {
			$("#loading-screen").hide();

			if (response.success == true) {
				$('#add_vendor').modal('hide');
				showNotification(
					response.messages,
					"check_circle",
					"success"
				);
				setTimeout(function () {
					window.location.reload(1);
				}, 3000);
			} else {
				$('.error').show();
			}
		}
	});

	return false;
});

// ======== Complete Staff Profile ==============

$(document).ready(function () {
	$('#btn_create_vendor').on('click', function () {
		var formdata = new FormData(document.getElementById("create_vendor"));

		$.ajax({
			type: "POST",
			url: BASE_URL + "create-vendor",
			dataType: "json",
			data: formdata,
			processData: false,
			contentType: false,
			cache: false,
			beforeSend: function () {
				$("#loading-screen").show();
			},
			success: function (response) {
				if (response.success == true) {

					$("#loading-screen").hide();

					showNotification(
						response.messages,
						"check_circle",
						"success"
					);

				} else {
					$("#loading-screen").hide();
					showNotification(
						response.messages,
						"info",
						"warning"
					);
				}
				setTimeout(function () {
					window.location.reload(1);
				}, 3000);
			},
			error: function (jqXHR, exception) {
				$("#loading-screen").hide();

				var msg = '';
				if (jqXHR.status === 0) {
					msg = 'Not connect.\n Verify Network.';
				} else if (jqXHR.status == 404) {
					msg = 'Requested page not found. [404].Please contact developer';
				} else if (jqXHR.status == 500) {
					msg = 'Internal Server Error [500].';
				} else if (exception === 'parsererror') {

					msg = 'parsererror. Please contact developer';

				} else if (exception === 'timeout') {
					msg = 'Time out error.Please contact developer';
				} else if (exception === 'abort') {
					msg = 'Ajax request aborted.Please contact developer';
				} else {
					msg = 'Uncaught Error.\n' + jqXHR.responseText;
				}
				showNotification(
					msg,
					"info",
					"warning"
				);


				setTimeout(function () {
					window.location.reload(1);
				}, 3000);
			}

		});

		return false;

	});
});

// ==================== Update My Profile ================
$(document).ready(function () {
	$('#update_my_profile').on('click', function () {
		var formdata = new FormData(document.getElementById("update_my_form"));

		$.ajax({
			type: "POST",
			url: BASE_URL + "update-profile",
			dataType: "json",
			data: formdata,
			processData: false,
			contentType: false,
			cache: false,
			beforeSend: function () {
				$("#loading-screen").show();
			},
			success: function (response) {
				if (response.success == true) {
					$("#edit_my_profile").modal('hide');
					$("#loading-screen").hide();

					showNotification(
						response.messages,
						"check_circle",
						"success"
					);

				} else {
					$("#loading-screen").hide();
					showNotification(
						response.messages,
						"info",
						"warning"
					);
				}
				setTimeout(function () {
					window.location.reload(1);
				}, 3000);
			},
			error: function (jqXHR, exception) {
				$("#loading-screen").hide();

				var msg = '';
				if (jqXHR.status === 0) {
					msg = 'Not connect.\n Verify Network.';
				} else if (jqXHR.status == 404) {
					msg = 'Requested page not found. [404].Please contact developer';
				} else if (jqXHR.status == 500) {
					msg = 'Internal Server Error [500].';
				} else if (exception === 'parsererror') {

					msg = 'parsererror. Please contact developer';

				} else if (exception === 'timeout') {
					msg = 'Time out error.Please contact developer';
				} else if (exception === 'abort') {
					msg = 'Ajax request aborted.Please contact developer';
				} else {
					msg = 'Uncaught Error.\n' + jqXHR.responseText;
				}
				showNotification(
					msg,
					"info",
					"warning"
				);


				//       setTimeout(function() {
				// 	window.location.reload(1);
				// }, 3000);
			}

		});

		return false;

	});
});
//================== Remove Staff =====================
$(document).on('click', '.remove-vendor', function () {
	var id = $(this).attr('id');
	
	$.ajax({
		url: BASE_URL + "remove-vendor",
		method: 'POST',
		data: {
			id: id
		},
		beforeSend: function () {
			$("#loading-screen").show();
		},
		success: function (data) {
			if (data != "False") {

				$('.modal').modal('hide');
				$("#loading-screen").hide();

				showNotification(
					data,
					"check_circle",
					"success"
				);


			} else {
				$("#loading-screen").hide();
			}
			setTimeout(function () {
				window.location.reload(1);
			}, 1000);

		},
		error: function (jqXHR, exception) {
			$("#loading-screen").hide();

			var msg = '';
			if (jqXHR.status === 0) {
				msg = 'Not connect.\n Verify Network.';
			} else if (jqXHR.status == 404) {
				msg = 'Requested page not found. [404].Please contact developer';
			} else if (jqXHR.status == 500) {
				msg = 'Internal Server Error [500].';
			} else if (exception === 'parsererror') {

				msg = 'parsererror. Please contact developer';

			} else if (exception === 'timeout') {
				msg = 'Time out error.Please contact developer';
			} else if (exception === 'abort') {
				msg = 'Ajax request aborted.Please contact developer';
			} else {
				msg = 'Uncaught Error.\n' + jqXHR.responseText;
			}
			showNotification(
				msg,
				"info",
				"warning"
			);


			setTimeout(function () {
				window.location.reload(1);
			}, 3000);
		}
	});
});
