// ==== login ajax =====
$(document).ready(function () {
	$(".login-submit").click(function () {
		var username = $(".username").val();
		var password = $(".password").val();

		if (username.trim() == "") {
			showNotification(
				messagesLang.please_enter_username,
				"error",
				"warning"
			);
		}
		if (password.trim() == "") {
			showNotification(
				messagesLang.please_enter_yourpassword,
				"error",
				"warning"
			);
		}


		if (username && password) {
			$.ajax({
				type: "POST",
				url: BASE_URL + "login-submit",
				data: {
					username: username,
					password: password
				},
				dataType: "json",
				cache: false,
				beforeSend: function () {
					$("#loading-screen").show();
				},
				success: function (response) {
					if (response.success == true) {

						window.location = response.messages;
					} else {
						$("#loading-screen").hide();

						showNotification(
							response.messages,
							"error",
							"danger"
						);
						$("i.usr-error-icon").addClass("text-danger");
						$("i.psw-error-icon").addClass("text-danger");

					}
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
					}, 5000);
				}

			});
			return false;
		}
	});
});

// =============== updating building info ================
$(document).ready(function () {
	$(".building-update").click(function () {
		var formdata = new FormData(document.getElementById("form-update"));

		$.ajax({
			type: "POST",
			url: BASE_URL + "building-update",
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

// =============== saving building info ================
$(document).ready(function () {
	$(".building-save").click(function () {
		var formdata = new FormData(document.getElementById("form-register"));
		var name = $(".name").val();
		var city_id = $(".city_id").val();
		var district_id = $(".district_id").val();
		var address = $(".address").val();
		var type_id = $(".type_id").val();
		var floor_id = $(".floor_id").val();
		var room_id = $(".room_id").val();
		var age_id = $(".age_id").val();
		var post_code = $(".post_code").val();
		//var image = $(".inputFileVisible").val();

		if (
			name &&
			city_id &&
			district_id &&
			address &&
			type_id &&
			floor_id &&
			room_id &&
			age_id &&
			post_code
		) {
			$.ajax({
				type: "POST",
				url: BASE_URL + "register-buildings",
				dataType: "json",
				data: formdata,
				processData: false,
				contentType: false,
				cache: false,
				beforeSend: function () {
					$("#loading-screen").show();
				},
				success: function (response) {

					$("#form-register")[0].reset();
					$("#loading-screen").hide();


					showNotification(
						response.messages,
						"check_circle",
						"success"
					);

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
		} else {
			showNotification(
				messagesLang.please_fill_the_form_completely,
				"info",
				"warning"
			);
			return false;
		}
	});
});
// =============== saving home info ================
$(document).ready(function () {
	$(".home-save").click(function () {
		var formdata = new FormData(document.getElementById("form-register"));
		var price = $(".price").val();
		var dues = $(".dues").val();
		var deposit = $(".deposit").val();
		var build_id = $(".build_id").val();
		var locate_id = $(".locate_id").val();
		var room_id = $(".room_id").val();
		var heating_id = $(".heating_id").val();
		var door_number = $(".door_number").val();
		var gross_meter = $(".gross_meter").val();
		var net_meter = $(".net_meter").val();
		var is_balcony = $(".is_balcony").val();
		var in_site = $(".in_site").val();
		var using_status = $(".using_status").val();
		var furniture = $(".furniture").val();

		if (
			price &&
			dues &&
			deposit &&
			build_id &&
			locate_id &&
			room_id &&
			heating_id &&
			door_number &&
			gross_meter &&
			net_meter &&
			is_balcony &&
			in_site &&
			using_status &&
			furniture
		) {
			$.ajax({
				type: "POST",
				url: BASE_URL + "register-homes",
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
						$("#form-register")[0].reset();
						$("#loading-screen").hide();

						if (response.email) {
							showNotification(
								response.email,
								"info",
								"warning"
							);
						}
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

					setTimeout(function() {
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
		} else {
			showNotification(
				messagesLang.please_fill_the_form_completely,
				"info",
				"warning"
			);

			return false;
		}
	});
});
$(document).ready(function () {
	$(".home-update").click(function () {
		var formdata = new FormData(document.getElementById("form-updater"));
		$("#oldImages").val(multiUploader.oriImages.join(":") + ":");
		$.ajax({
			type: "POST",
			url: BASE_URL + "update-homes",
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
					$("#form-updater")[0].reset();
					$("#loading-screen").hide();

					if (response.email) {
						showNotification(
							response.email,
							"info",
							"warning"
						);
					}
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
//================image delete=========================
$(document).ready(function () {
	$(".imagedelete").click(function () {
		var image = $(this).attr('image');
		var id = $(this).attr('ids');
		$.ajax({
			type: "POST",
			url: BASE_URL + "image-delete",
			dataType: "json",
			data: { id: id, image: image },

			beforeSend: function () {
				$("#loading-screen").show();
			},
			success: function (response) {
				$("#loading-screen").hide();
				$('.modal').modal('hide');
				setTimeout(function () {
					window.location.reload(1);
				}, 300);

			},
			error: function (jqXHR, exception) {
				$("#loading-screen").hide();
				$('.modal').modal('hide');
				setTimeout(function () {
					window.location.reload(1);
				}, 300);
			}

		});
		return false;
	});
});
// =============== saving borrowers info ================
$(document).ready(function () {
	$(".client-save").click(function () {
		var formdata = new FormData(document.getElementById("form-register"));
		var lname = $(".lname").val();
		var gname = $(".gname").val();
		var mname = $(".mname").val();
		var email = $(".email").val();
		var number1 = $(".number1").val();
		var purok_no = $(".purok_no").val();
		var barangay = $(".barangay").val();
		var city = $(".city").val();
		var province = $(".province").val();
		var postal_code = $(".postal_code").val();
		var image = $(".inputFileVisible").val();

		if (
			lname &&
			gname &&
			mname &&
			email &&
			number1 &&
			purok_no &&
			barangay &&
			city &&
			province &&
			postal_code
		) {
			$.ajax({
				type: "POST",
				url: BASE_URL + "register-borrowers",
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
						$("#form-register")[0].reset();
						$("#loading-screen").hide();

						if (response.email) {
							showNotification(
								response.email,
								"info",
								"warning"
							);
						}
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
		} else {
			showNotification(
				messagesLang.please_fill_the_form_completely,
				"info",
				"warning"
			);
		}
	});
});

// =============== saving customers info ================
$(document).ready(function () {
	$(".customer-save").click(function () {
		var formdata = new FormData(document.getElementById("form-register"));
		var id = $(".id").val();
		var fullname = $(".fullname").val();
		var birthdate = $(".birthdate").val();
		var gender = $(".gender").val();
		var email = $(".email").val();
		var phone = $(".phone").val();
		var phone2 = $(".phone2").val();
		var address = $(".address").val();
		var identity = $(".identity").val();
		var education_id = $(".education_id").val();
		var job_id = $(".job_id").val();
		if (
			id &&
			fullname &&
			birthdate &&
			gender &&
			email &&
			phone &&
			phone2 &&
			address &&
			identity &&
			education_id &&
			job_id
		) {
			$.ajax({
				type: "POST",
				url: BASE_URL + "register-customers",
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
						$("#form-register")[0].reset();
						$("#loading-screen").hide();

						if (response.email) {
							showNotification(
								response.email,
								"info",
								"warning"
							);
						}
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
		} else {
			showNotification(
				messagesLang.please_fill_the_form_completely,
				"info",
				"warning"
			);
		}
		return false;
	});
});

// =============== Approved Contract ================
$(document).on('click', '.approvecontract', function () {
	var id = $(this).attr('id');
	var amount = $('#amount' + id).text();

	var $button = $('.approvecontract' + id);
	var table = $("#contract_customers_table").DataTable();

	$.ajax({
		url: BASE_URL + "approve-contract",
		method: 'POST',
		data: {
			id: id,
			amount: amount
		},
		dataType: "json",
		beforeSend: function () {
			$("#loading-screen").show();
		},
		success: function (data) {
			setTimeout(function () {
				window.location.reload(1);
			}, 3000);
			if (data.success) {

				if (data.mail) {
					showNotification(
						messagesLang.email_notification_sent_successfully,
						"check_circle",
						"success"
					);
				} else {
					showNotification(
						messagesLang.email_notification_failed_email_is_not_valid,
						"info",
						"warning"
					);
				}

				showNotification(
					data.tel,
					"info",
					"success"
				);

				$("#loading-screen").hide();

			} else {

				$("#loading-screen").hide();

				showNotification(
					messagesLang.something_went_wrong,
					"info",
					"danger"
				);
			}

		},
		error: function (jqXHR, exception) {
			$("#loading-screen").hide();

			var msg = '';
			if (jqXHR.status === 0) {
				msg = 'Not connect.\n Verify Network.';
			} else if (jqXHR.status == 404) {
				msg = 'Requested page not found. [404].Please contact developer';
			} else if (jqXHR.status == 500) {

				msg = 'Email notification did not send.';

			} else if (exception === 'parsererror') {

				msg = 'Contract Approved!';
				msg1 = 'No internet. Notification did not send.';
			} else if (exception === 'timeout') {
				msg = 'Time out error.Please contact developer';
			} else if (exception === 'abort') {
				msg = 'Ajax request aborted.Please contact developer';
			} else {
				msg = 'Uncaught Error.\n' + jqXHR.responseText;
			}
			showNotification(
				msg,
				"success",
				"success"
			);


			setTimeout(function () {
				window.location.reload(1);
			}, 3000);
		}
	});
});

// =============== Delete Homes ====================
$(document).on('click', '.homesdelete', function () {
	var id = $(this).attr('id');
	$.ajax({
		url: BASE_URL + "delete-homes",
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
			showNotification(
				msg1,
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
// =============== Delete Buildings ================

$(document).on('click', '.buildingdelete', function () {
	var id = $(this).attr('id');
	$.ajax({
		url: BASE_URL + "delete-buildings",
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
	return false;
});

//================ Create a membership type ================
$(document).ready(function () {
	$(".membership-package-save").click(function () {
		var formdata = new FormData(document.getElementById("form-register"));
		var name = $(".name").val();
		var contract_limit = $(".contract_limit").val();
		var home_limit = $(".home_limit").val();
		var build_limit = $(".build_limit").val();
		//var description = $(".description").val();
		var amount = $(".amount").val();
		var days = $(".days").val();
		if (name && contract_limit && home_limit && build_limit && amount && days) {
			$.ajax({
				url: BASE_URL + "register-memberships-packages",
				method: 'POST',
				data: formdata,
				processData: false,
				contentType: false,
				cache: false,
				beforeSend: function () {
					$("#loading-screen").show();
				},
				success: function (data) {
					$("#loading-screen").hide();
					var data = JSON.parse(data);
					if (data.success == true) {
						showNotification(
							data.messages,
							"check_circle",
							"success"
						);
					} else {
						showNotification(
							data.messages,
							"info",
							"warning"
						);
					}
					setTimeout(function () {
						window.location.reload(1);
					}, 1000);
					return false;
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

		} else {
			showNotification(
				messagesLang.please_enter_all_information_of_memberships_packages,
				"info",
				"warning"
			);
		}
		return false;
	});
});
//================ Update a membership type ================
$(document).ready(function () {
	$(".membershipTypeUpdate").click(function () {
		var membership_id = $(this).attr('id');
		var name = $(".name" + membership_id).val();
		var contract_limit = $(".contract_limit" + membership_id).val();
		var home_limit = $(".home_limit" + membership_id).val();
		var build_limit = $(".build_limit" + membership_id).val();
		var amount = $(".amount" + membership_id).val();
		var days = $(".days" + membership_id).val();

		if (name && contract_limit && home_limit && build_limit && amount && days) {
			$.ajax({
				url: BASE_URL + "update-memberships-packages",
				method: 'POST',
				data: {
					membership_id: membership_id,
					name: name,
					contract_limit: contract_limit,
					home_limit: home_limit,
					build_limit: build_limit,
					amount: amount,
					days: days
				},
				beforeSend: function () {
					$("#loading-screen").show();
				},
				success: function (data) {
					$("#loading-screen").hide();
					$('.modal').modal('hide');
					var data = JSON.parse(data);
					if (data.success == true) {
						showNotification(
							data.messages,
							"check_circle",
							"success"
						);
					} else {
						showNotification(
							data.messages,
							"info",
							"warning"
						);
					}
					setTimeout(function () {
						window.location.reload(1);
					}, 1000);
					return false;
				},
				error: function (jqXHR, exception) {
					$("#loading-screen").hide();
					$('.modal').modal('hide');
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

		} else {
			showNotification(
				messagesLang.please_enter_all_information_of_memberships,
				"info",
				"warning"
			);
		}
		return false;
	});
});
//================ Delete a membership type ================
$(document).ready(function () {
	$(".membershipTypeDelete").click(function () {
		var membership_id = $(this).attr('id');

		$.ajax({
			url: BASE_URL + "delete-memberships-packages",
			method: 'POST',
			data: {
				membership_id: membership_id
			},
			beforeSend: function () {
				$("#loading-screen").show();
			},
			success: function (data) {
				$("#loading-screen").hide();
				$('.modal').modal('hide');

				showNotification(
					data,
					"check_circle",
					"success"
				);

				setTimeout(function () {
					window.location.reload(1);
				}, 1000);
				return false;
			},
			error: function (jqXHR, exception) {
				$("#loading-screen").hide();
				$('.modal').modal('hide');
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
//================ Create Memberships ===============================
$(document).ready(function () {
	$(".membership-save").click(function () {
		var formdata = new FormData(document.getElementById("form-register"));
		var membership_type = $('.membership_type').val();
		var vendor_id = $('.vendor_id').val();
		if (membership_type && vendor_id) {
			$.ajax({
				url: BASE_URL + "register-memberships",
				method: 'POST',
				data: formdata,
				processData: false,
				contentType: false,
				cache: false,
				beforeSend: function () {
					$("#loading-screen").show();
				},
				success: function (data) {
					$("#loading-screen").hide();
					var data = JSON.parse(data);
					if (data.success == true) {
						showNotification(
							data.messages,
							"check_circle",
							"success"
						);
					} else {
						showNotification(
							data.messages,
							"info",
							"warning"
						);
					}
					setTimeout(function () {
						window.location.reload(1);
					}, 1000);
					return false;
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

		} else {
			showNotification(
				messagesLang.please_enter_all_information_of_memberships,
				"info",
				"warning"
			);
		}
		return false;
	});
});
//================ Update a membership ================
$(document).ready(function () {
	$(".membershipUpdate").click(function () {
		var membership_id = $(this).attr('id');
		var membership_type = $(".membership_type" + membership_id).val();
		var vendor_id = $(".vendor_id" + membership_id).val();
		var added_date = $(".added_date" + membership_id).val();
		var expired_date = $(".expired_date" + membership_id).val();
		if (!membership_type) {
			membership_type = $(".membership_type" + membership_id + " option:selected").val();
		}
		if (!vendor_id) {
			vendor_id = $(".vendor_id" + membership_id + " option:selected").val();
		}

		if (membership_type && vendor_id) {
			$.ajax({
				url: BASE_URL + "update-memberships",
				method: 'POST',
				data: {
					membership_id: membership_id,
					membership_type: membership_type,
					vendor_id: vendor_id,
					added_date: added_date,
					expired_date: expired_date
				},
				beforeSend: function () {
					$("#loading-screen").show();
				},
				success: function (data) {
					$("#loading-screen").hide();
					$('.modal').modal('hide');
					var data = JSON.parse(data);
					if (data.success == true) {
						showNotification(
							data.messages,
							"check_circle",
							"success"
						);
					} else {
						showNotification(
							data.messages,
							"info",
							"warning"
						);
					}
					setTimeout(function () {
						window.location.reload(1);
					}, 1000);
					return false;
				},
				error: function (jqXHR, exception) {
					$("#loading-screen").hide();
					$('.modal').modal('hide');
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

		} else {
			showNotification(
				messagesLang.please_enter_all_information_of_memberships,
				"info",
				"warning"
			);
		}
		return false;
	});
});
//================ Block a membership ================
$(document).ready(function () {
	$(".membershipBlock").click(function () {
		var membership_id = $(this).attr('id');

		$.ajax({
			url: BASE_URL + "block-memberships",
			method: 'POST',
			data: {
				membership_id: membership_id
			},
			beforeSend: function () {
				$("#loading-screen").show();
			},
			success: function (data) {
				$("#loading-screen").hide();
				$('.modal').modal('hide');

				showNotification(
					data,
					"check_circle",
					"success"
				);

				setTimeout(function () {
					window.location.reload(1);
				}, 1000);
				return false;
			},
			error: function (jqXHR, exception) {
				$("#loading-screen").hide();
				$('.modal').modal('hide');
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
//================ Buy package ======================
$(document).ready(function () {
	$('.buypackage').click(function () {
		var package_id = $(this).attr('id');
		var payment_type = $('input[name=buypackageoption]:checked').val();
		var terms_and_conditions = $('#terms_and_conditions'+package_id).is(':checked');

		if(terms_and_conditions == false)
		{
			showNotification(
				messagesLang.please_agree_terms_and_conditions,
				"info",
				"warning"
			);
			return false;
		}
		if (payment_type) {
			switch (payment_type) {
				case "card":
					$('.paymentsystemheader').hide();
					$('.paymentsystembody').hide();
					$('.paymentsystemfooter').hide();
					$('.creditcardpayheader').show();
					$('.creditcardpaybody').show();
					$('.creditcardpayfooter').show();
					break;
				case "bank":
					$('.paymentsystemheader').hide();
					$('.paymentsystembody').hide();
					$('.paymentsystemfooter').hide();
					$('.bankheader').show();
					$('.bankbody').show();
					$('.bankfooter').show();
					break;
				default: break;
			}
		} else {
			showNotification(
				messagesLang.please_select_payment_type,
				"info",
				"warning"
			);
			return false;
		}
	});
});
$(document).ready(function(){
	$(".cancelmodal").click(function(){
		$(".bankfooter").hide();
		$(".bankbody").hide();
		$(".bankheader").hide();

		$(".creditcardpayfooter").hide();
		$(".creditcardpaybody").hide();
		$(".creditcardpayheader").hide();

		$(".paymentsystemfooter").show();
		$(".paymentsystembody").show();
		$(".paymentsystemheader").show();
	});
});
//================ credit cart pay ======================
$(document).ready(function(){
	$('.creditcardpay').click(function(){
		var membership_id = $(this).attr('id');
		var amount = $(this).attr('amount');
		var cardholdername = $(".cardholdername" + membership_id).val();
		var cardnumber = $(".cardnumber" + membership_id).val();
		var expiredmonth = $(".expiredmonth" + membership_id).val();
		var expiredyear = $(".expiredyear" + membership_id).val();
		var cvc = $(".cvc" + membership_id).val();

		if(expiredmonth < 0 || expiredmonth > 12)
		{
			showNotification(
				messagesLang.please_input_correct_expired_month,
				"info",
				"warning"
			);
			return false;
		}
	
		$.ajax({
			url: BASE_URL + "credit-card-pay",
			method: 'POST',
			data: {
				membership_type: membership_id,
				amount: amount,
				cardholdername: cardholdername,
				cardnumber: cardnumber,
				expiredmonth: expiredmonth,
				expiredyear: expiredyear,
				cvc: cvc
			},
			beforeSend: function () {
				$("#loading-screen").show();
			},
			success: function (data) {
				$("#loading-screen").hide();
				$('.modal').modal('hide');
				var data = JSON.parse(data);
				if (data.success == true) {
					showNotification(
						data.messages,
						"check_circle",
						"success"
					);
				} else {
					showNotification(
						data.messages,
						"info",
						"warning"
					);
				}
				$(".bankfooter").hide();
				$(".bankbody").hide();
				$(".bankheader").hide();

				$(".creditcardpayfooter").hide();
				$(".creditcardpaybody").hide();
				$(".creditcardpayheader").hide();

				$(".paymentsystemfooter").show();
				$(".paymentsystembody").show();
				$(".paymentsystemheader").show();
				// setTimeout(function () {
				// 	window.location.reload(1);
				// }, 1000);
			},
			error: function (jqXHR, exception) {
				$("#loading-screen").hide();
				$('.modal').modal('hide');
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
				// setTimeout(function () {
				// 	window.location.reload(1);
				// }, 3000);
			}
		});
	});
});
//================ Register Bank ======================
$(document).ready(function () {
	$('.bankinformationregister').click(function () {
		var membership_id = $(this).attr('id');
		var amount = $(this).attr("amount");
		var payment_type = "Bank";
		if (membership_id && amount && payment_type) {
			$.ajax({
				url: BASE_URL + "register-bankinfos",
				method: 'POST',
				data: {
					membership_type: membership_id,
					amount: amount,
					payment_type: payment_type
				},
				beforeSend: function () {
					$("#loading-screen").show();
				},
				success: function (data) {
					$("#loading-screen").hide();
					$('.modal').modal('hide');
					var data = JSON.parse(data);
					if (data.success == true) {
						showNotification(
							data.messages,
							"check_circle",
							"success"
						);
					} else {
						showNotification(
							data.messages,
							"info",
							"warning"
						);
					}
					$(".bankfooter").hide();
					$(".bankbody").hide();
					$(".bankheader").hide();

					$(".creditcardpayfooter").hide();
					$(".creditcardpaybody").hide();
					$(".creditcardpayheader").hide();

					$(".paymentsystemfooter").show();
					$(".paymentsystembody").show();
					$(".paymentsystemheader").show();
					setTimeout(function () {
						window.location.reload(1);
					}, 1000);
					return false;
				},
				error: function (jqXHR, exception) {
					$("#loading-screen").hide();
					$('.modal').modal('hide');
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
		} else {
			showNotification(
				messagesLang.please_enter_bank_informations,
				"info",
				"warning"
			);
			return false;
		}
	});
});
//================ Delete a membership================
$(document).ready(function () {
	$(".membershipDelete").click(function () {
		var membership_id = $(this).attr('id');

		$.ajax({
			url: BASE_URL + "delete-memberships",
			method: 'POST',
			data: {
				membership_id: membership_id
			},
			beforeSend: function () {
				$("#loading-screen").show();
			},
			success: function (data) {
				$("#loading-screen").hide();
				$('.modal').modal('hide');

				showNotification(
					data,
					"check_circle",
					"success"
				);

				setTimeout(function () {
					window.location.reload(1);
				}, 1000);
				return false;
			},
			error: function (jqXHR, exception) {
				$("#loading-screen").hide();
				$('.modal').modal('hide');
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
//================ Active a membership================
$(document).ready(function () {
	$(".membershipActive").click(function () {
		var membership_id = $(this).attr('id');

		$.ajax({
			url: BASE_URL + "active-memberships",
			method: 'POST',
			data: {
				membership_id: membership_id
			},
			beforeSend: function () {
				$("#loading-screen").show();
			},
			success: function (data) {
				$("#loading-screen").hide();
				$('.modal').modal('hide');

				showNotification(
					data,
					"check_circle",
					"success"
				);

				setTimeout(function () {
					window.location.reload(1);
				}, 1000);
				return false;
			},
			error: function (jqXHR, exception) {
				$("#loading-screen").hide();
				$('.modal').modal('hide');
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
//================ Delete a transaction================
$(document).ready(function () {
	$(".transactionDelete").click(function () {
		var transaction_id = $(this).attr('id');

		$.ajax({
			url: BASE_URL + "delete-transactions",
			method: 'POST',
			data: {
				transaction_id: transaction_id
			},
			beforeSend: function () {
				$("#loading-screen").show();
			},
			success: function (data) {
				$("#loading-screen").hide();
				$('.modal').modal('hide');

				showNotification(
					data,
					"check_circle",
					"success"
				);

				setTimeout(function () {
					window.location.reload(1);
				}, 1000);
				return false;
			},
			error: function (jqXHR, exception) {
				$("#loading-screen").hide();
				$('.modal').modal('hide');
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
//================ Update Customers====================
$(document).on('click', '.customerupdate', function () {
	var formdata = new FormData(document.getElementById("update_form"));
	$.ajax({
		url: BASE_URL + "update-customers",
		method: 'POST',
		data: formdata,
		processData: false,
		contentType: false,
		cache: false,
		beforeSend: function () {
			$("#loading-screen").show();
		},
		success: function (data) {

			$('.modal').modal('hide');
			$("#loading-screen").hide();
			showNotification(
				messagesLang.customer_info_be_updated_successfully,
				"check_circle",
				"success"
			);
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
	return false;
});
// =============== Delete Customers ================

$(document).on('click', '.customerdelete', function () {
	var id = $(this).attr('id');
	$.ajax({
		url: BASE_URL + "delete-customers",
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
	return false;
});

// =============== Reject Contract ================
$(document).on('click', '.rejectContract', function () {

	var id = $(this).attr('id');

	var reason = $('.reason').val();

	var $button = $('#reject-button' + id);
	var table = $("#contract_customers_table").DataTable();

	$.ajax({
		url: BASE_URL + "reject-contract",
		method: 'POST',
		data: {
			id: id,
			reason: reason
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
					"info",
					"warning"
				);
				setTimeout(function () {
					window.location.reload(1);
				}, 1000);

			} else {
				$("#loading-screen").hide();
			}

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

// =============== Contract Re-Apply ================
$(document).on('click', '.re-applyContract', function () {
	var id = $(this).attr('id');

	var $button = $('#reapply-contract' + id);
	var table = $("#rejected_customers_table").DataTable();

	$.ajax({
		url: BASE_URL + "reapply-contract",
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
});

// =============== Contract Remove ================
$(document).on('click', '.removeContract', function () {
	var id = $(this).attr('id');

	var $button = $('#remove-contract' + id);
	var table = $("#contract_customers_table").DataTable();

	$.ajax({
		url: BASE_URL + "remove-contract",
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
});

// =============== Remove rejected contract ================
$(document).on('click', '.remove-rejected-contract', function () {
	var id = $(this).attr('id');

	var $button = $('#remove-rejected-contract' + id);
	var table = $("#rejected_customers_table").DataTable();

	$.ajax({
		url: BASE_URL + "remove-contract",
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
});
// =============== Contracts Cash release ================
$(document).on('click', '.cash-release2', function () {
	var id = $(this).attr('id');

	var $button = $('#cash-release2' + id);
	var table = $("#approved_customers_table").DataTable();

	$.ajax({
		url: BASE_URL + "cash-receive2",
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
		}
	});
});

// =============== Cash release ================
$(document).on('click', '.cash-release', function () {
	var id = $(this).attr('id');

	var $button = $('#cash-release' + id);
	var table = $("#approved_clients_table").DataTable();

	$.ajax({
		url: BASE_URL + "cash-receive",
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
		}
	});
});
// ========= Function to check internet connection =============
function checkconnection() {
	var status = navigator.onLine;

	if (status) {
		showNotification(
			messagesLang.connected_to_internet_you_can_send_email_and_sms_notification,
			"wifi",
			"success"
		);
	} else {
		showNotification(
			messagesLang.no_internet_connection_you_can_not_send_email_and_sms_notification,
			"wifi_off",
			"warning"
		);
	}
}


// ============== Account no.query ==============
$(document).on('click', '.search_account', function () {
	var account_no = $('.accnt_no').val();

	$.ajax({
		url: BASE_URL + 'account-query',
		type: 'POST',
		dataType: "json",
		data: {
			account_no: account_no
		},
		success: function (response) {
			if (response.success == true) {
				$(".acc_no").addClass("has-success");
				$(".fa-search").addClass("text-success");
				$('.full_name').val(response.name);
				$('.address').val(response.address);
				$('.email').val(response.email);
				$('.sim1').val(response.sim1);
				$('.sim2').val(response.sim2);
				$(".acc_no").removeClass("has-danger");
				$(".fa-search").removeClass("text-danager");


				$('.fas').click();

				checkconnection();

			} else {
				showNotification(
					messagesLang.customers_data_not_found,
					"info",
					"danger"
				);

				$('.full_name').val('');
				$('.address').val('');
				$('.email').val('');
				$('.sim1').val('');
				$('.sim2').val('');
				$(".acc_no").removeClass("has-success");
				$(".fa-search").removeClass("text-success");
				$(".acc_no").addClass("has-danger");
				$(".fa-search").addClass("text-danger");
			}
		}
	});
	return false;
});

//============ home_id change event ====================
$(document).ready(function () {
	$("#home_id").change(function () {
		var home_id = this.value;
		var homeInfo;
		if (home_id) {
			$.ajax({
				type: "POST",
				url: BASE_URL + "get-home-info",
				dataType: "json",
				data: {
					home_id: home_id
				},
				cache: false,
				beforeSend: function () {

				},
				success: function (response) {
					homeInfo = response;
					$(".h_number").val(homeInfo.door_number);
					$("#h_numberlbl").html("");
					$(".b_name").val(homeInfo.build);
					$("#b_namelbl").html("");
					$(".h_locate").val(homeInfo.locate);
					$("#h_locatelbl").html("");
					$(".b_address").val(homeInfo.buildAddress);
					$("#b_addresslbl").html("");
					$(".h_price").val(homeInfo.price);
					$(".contract_amount").val(homeInfo.price*12);
					$("#h_pricelbl").html("");
					$(".h_dues").val(homeInfo.dues);
					$("#h_dueslbl").html("");
					$(".h_deposit").val(homeInfo.deposit);
					$("#h_depositlbl").html("");
					$(".h_gross_meter").val(homeInfo.gross_meter);
					$("#h_gross_meterlbl").html("");
					$(".h_net_meter").val(homeInfo.net_meter);
					$("#h_net_meterlbl").html("");
					$(".h_room").val(homeInfo.room);
					$("#h_roomlbl").html("");
				},
				error: function (jqXHR, exception) {
					var msg = '';
					if (jqXHR.status === 0) {
						msg = 'Not connect.\n Verify Network.';
					} else if (jqXHR.status == 404) {
						msg = 'Requested page not found. [404]';
					} else if (jqXHR.status == 500) {
						msg = 'Internal Server Error [500].';
					} else if (exception === 'parsererror') {

						msg = 'Email notification did not send.';

						showNotification(
							messagesLang.contract_application_successfully_added,
							"check_circle",
							"success"
						);

					} else if (exception === 'timeout') {
						msg = 'Time out error.';
					} else if (exception === 'abort') {
						msg = 'Ajax request aborted.';
					} else {
						msg = 'Uncaught Error.\n' + jqXHR.responseText;
					}
					showNotification(
						msg,
						"info",
						"warning"
					);
				},
			});
		}
	});
});
$(document).ready(function(){
	$("#birthdate").datepicker({ dateFormat: "dd-mm-yy" }).val()
});
//============ building_id change event=================
$(document).ready(function () {
	$("#building_id").change(function () {
		var building_id = this.value;
		if (building_id) {
			$.ajax({
				type: "POST",
				url: BASE_URL + "get-building-homeinfo",
				dataType: "json",
				data: {
					building_id: building_id
				},
				cache: false,
				beforeSend: function () {

				},
				success: function (response) {
					var html = "<option disabled selected>" + messagesLang.choose_home + "</option>";
					if (response == null) {
						$("#home_id").html(html);
						return;
					}
					for (var i = 0; i < response.length; i++) {
						html += "<option value='" + response[i].id + "'> " + response[i].door_number + "</option>";
					}
					$("#home_id").html(html);
				},
				error: function (jqXHR, exception) {
					var msg = '';
					if (jqXHR.status === 0) {
						msg = 'Not connect.\n Verify Network.';
					} else if (jqXHR.status == 404) {
						msg = 'Requested page not found. [404]';
					} else if (jqXHR.status == 500) {
						msg = 'Internal Server Error [500].';
					} else if (exception === 'parsererror') {

						msg = 'Email notification did not send.';

						showNotification(
							messagesLang.contract_application_successfully_added,
							"check_circle",
							"success"
						);

					} else if (exception === 'timeout') {
						msg = 'Time out error.';
					} else if (exception === 'abort') {
						msg = 'Ajax request aborted.';
					} else {
						msg = 'Uncaught Error.\n' + jqXHR.responseText;
					}
					showNotification(
						msg,
						"info",
						"warning"
					);

				},
			});
		}
	});
});

//============ city_id change event=================
$(document).ready(function () {
	$("#city_id").change(function () {
		var city_id = this.value;
		if (city_id) {
			$.ajax({
				type: "POST",
				url: BASE_URL + "get-city-district",
				dataType: "json",
				data: {
					city_id: city_id
				},
				cache: false,
				beforeSend: function () {

				},
				success: function (response) {
					var chooseDistrict = $("#chooseDistrict").val();
					var html = "<option disabled selected>" + chooseDistrict + "</option>";
					if (response == null) {
						$("#district_id").html(html);
						return;
					}
					for (var i = 0; i < response.length; i++) {
						html += "<option value='" + response[i].id + "'> " + response[i].name + "</option>";
					}
					$("#district_id").html(html);
				},
				error: function (jqXHR, exception) {
					var msg = '';
					if (jqXHR.status === 0) {
						msg = 'Not connect.\n Verify Network.';
					} else if (jqXHR.status == 404) {
						msg = 'Requested page not found. [404]';
					} else if (jqXHR.status == 500) {
						msg = 'Internal Server Error [500].';
					} else if (exception === 'parsererror') {

						msg = 'Email notification did not send.';

						showNotification(
							messagesLang.contract_application_successfully_added,
							"check_circle",
							"success"
						);

					} else if (exception === 'timeout') {
						msg = 'Time out error.';
					} else if (exception === 'abort') {
						msg = 'Ajax request aborted.';
					} else {
						msg = 'Uncaught Error.\n' + jqXHR.responseText;
					}
					showNotification(
						msg,
						"info",
						"warning"
					);

				},
			});
		}
	});
});
//============ customer_id change event================
$(document).ready(function () {
	$("#customer_id").change(function () {
		var customer_id = this.value;
		var customerInfo;
		if (customer_id) {
			$.ajax({
				type: "POST",
				url: BASE_URL + "get-customer-info",
				dataType: "json",
				data: {
					customer_id: customer_id
				},
				cache: false,
				beforeSend: function () {
					//$("#loading-screen").show();
				},
				success: function (response) {
					//$("#loading-screen").hide();
					customerInfo = response[0];
					$(".fullname").val(customerInfo.fullname);
					$("#fullnamelbl").html('');
					$(".identity").val(customerInfo.identity);
					$("#identitylbl").html('');
					$(".gender").val(customerInfo.gender);
					$("#genderlbl").html('');
					$(".birthdate").val(customerInfo.birthdate);
					$("#birthdatelbl").html('');
					$(".email").val(customerInfo.email);
					$("#emaillbl").html('');
					$(".phone").val(customerInfo.phone);
					$("#phonelbl").html('');
				},
				error: function (jqXHR, exception) {
					//$("#loading-screen").hide();

					var msg = '';
					if (jqXHR.status === 0) {
						msg = 'Not connect.\n Verify Network.';
					} else if (jqXHR.status == 404) {
						msg = 'Requested page not found. [404]';
					} else if (jqXHR.status == 500) {
						msg = 'Internal Server Error [500].';
					} else if (exception === 'parsererror') {

						msg = 'Email notification did not send.';

						showNotification(
							messagesLang.contract_application_successfully_added,
							"check_circle",
							"success"
						);

					} else if (exception === 'timeout') {
						msg = 'Time out error.';
					} else if (exception === 'abort') {
						msg = 'Ajax request aborted.';
					} else {
						msg = 'Uncaught Error.\n' + jqXHR.responseText;
					}
					showNotification(
						msg,
						"info",
						"warning"
					);
					// setTimeout(function() {
					// 	window.location.reload(1);
					// }, 5000);
				},
			});
		}
	})
});
// =========== Insert Contract Details ================
$(document).ready(function () {
	$(".create-contract").click(function (e) {
		e.preventDefault();

		var id = $('.id').val();
		var building_id = $('.building_id').val();
		var home_id = $('.home_id').val();
		var contract_amount = $('.contract_amount').val();
		var customer_id = $('.customer_id').val();
		var area = $('.area').val();
		var collector_id = $('.collector_id').val();
		var date_contract = $('.date_contract').val();
		var verified = $('.verified').val();
		var fullname = $('.fullname').val();
		var email = $('.email').val();
		var email_toggle = $('#email-toggle').hasClass('email');
		var phone_toggle = $('#phone-toggle').hasClass('phone');
		var phone = $('.phone').val();

		var email_notif = '';
		var phone_notif = '';

		var gua_fullname = $(".gua_fullname").val();
		var gua_identity = $(".gua_identity").val();
		var gua_phone = $(".gua_phone").val();

		if (email_toggle) {
			var email_notif = 'yes';
		}
		if (phone_toggle) {
			var phone_notif = 'yes';
		}
		
		if (customer_id.trim() && contract_amount.trim() && gua_fullname && gua_identity && gua_phone) {
			$.ajax({
				type: "POST",
				url: BASE_URL + "insert-contract",
				dataType: "json",
				data: {
					id: id,
					fullname: fullname,
					email: email,
					email_notif: email_notif,
					phone_notif: phone_notif,
					phone: phone,
					//area : area,
					customer_id: customer_id,
					contract_amount: contract_amount,
					building_id: building_id,
					//verified: verified,
					home_id: home_id,
					date_contract: date_contract,
					//collector_id : collector_id,
					gua_fullname: gua_fullname,
					gua_identity: gua_identity,
					gua_phone: gua_phone
				},
				cache: false,
				beforeSend: function () {
					$("#loading-screen").show();
				},

				success: function (response) {
					setTimeout(function () {
						window.location.reload(1);
					}, 2000);
					if (response.success == true) {

						$("#loading-screen").hide();

						if (response.email == false) {
							showNotification(
								response.messages,
								"check_circle",
								"success"
							);
							showNotification(
								messagesLang.email_notification_failed_email_is_not_valid,
								"info",
								"warning"
							);
						} else {
							showNotification(
								response.messages,
								"check_circle",
								"success"
							);
							showNotification(
								data.phone,
								"info",
								"success"
							);
						}

						$("#contract-form")[0].reset();

						setTimeout(function () {
							window.location.reload(1);
						}, 2000);

					} else {

						$("#loading-screen").hide();

						showNotification(
							response.messages,
							"info",
							"danger"
						);
					}
				},
				error: function (jqXHR, exception) {
					$("#loading-screen").hide();

					var msg = '';
					if (jqXHR.status === 0) {
						msg = 'Not connect.\n Verify Network.';
					} else if (jqXHR.status == 404) {
						msg = 'Requested page not found. [404]';
					} else if (jqXHR.status == 500) {
						msg = 'Internal Server Error [500].';
					} else if (exception === 'parsererror') {

						msg = 'Email notification did not send.';

						showNotification(
							msg,
							"info",
							"warning"
						);

					} else if (exception === 'timeout') {
						msg = 'Time out error.';
					} else if (exception === 'abort') {
						msg = 'Ajax request aborted.';
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
					}, 5000);
				},


			});
		} else {
			showNotification(
				messagesLang.please_fill_the_form_completely,
				"info",
				"warning"
			);
		}
		return false;
	});
});
