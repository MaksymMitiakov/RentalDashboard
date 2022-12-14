
// ================= Search Contract =======================
$(document).ready(function () {
	$('.search_contract').click(function () {
		var contract_no = $('.contract-search').val();

		if (contract_no) {
			$.ajax({
				type: "POST",
				url: BASE_URL + "search-contract",
				data: {
					contract_no: contract_no
				},
				dataType: "json",
				//cache: false,
				beforeSend: function () {
					$("#loading-screen").show();
				},
				success: function (response) {
					console.log(response)
					if (response.success == true) {

						var html_code = "";
						html_code += "<tr>";
						html_code += "<td>" + response.contract.contract_no + "</td>";
						html_code += "<td>" + response.contract.name + "</td>";
						html_code += "<td>" + response.contract.amount + "</td>";
						html_code += "<td>" + response.contract.date + "</td>";
						html_code += '<td><a type="button" rel="tooltip" title="'+ messagesLang.view_contract_details +'" class="btn btn-info btn-sm mr-2" href=' + BASE_URL + 'payments/contract-details/' + response.contract.contract_no + '>Sözleşme Detayı</a></td>';
						html_code += "</tr>";
						$('#search_result').append(html_code);
						$('.search_contract').attr('disabled', true);
						$('.table-result').slideDown('1000', function () {
							$(this).show();
						});
					} else {
						showNotification(
							response.contract,
							"error",
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
					}, 2000);
				}

			});
			return false;
		} else {
			showNotification(
				messagesLang.please_input_contract_no,
				"info",
				"warning"
			);

		}
	});
});
// ==================== Pay Contract Payments ================

$(document).on('click', '.c_pay', function () {
	var monthly_payment = $('.monthly_payment').val();
	var contract_id = $('.contract_id').val();
	var due_payment = $('.due_payment').val();
	var payment_type = $('.payment_type').val();
	if (!payment_type) {
		showNotification(
			messagesLang.please_select_payment_type,
			"info",
			"warning"
		);
		return false;
	}
	$.ajax({
		type: "POST",
		url: BASE_URL + "pay-contract",
		data: {
			monthly_payment: monthly_payment,
			contract_id: contract_id,
			due_payment: due_payment,
			payment_type: payment_type
		},
		dataType: "json",
		cache: false,
		beforeSend: function () {
			$("#loading-screen").show();
		},
		success: function (response) {
			if (response.success == true) {

				showNotification(
					response.message,
					"check_circle",
					"success"
				);
				$('#payment-modal').modal('hide');
				setTimeout(function () {
					window.location.reload(1);
				}, 3000);

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
			}, 2000);
		}

	});
	return false;
});

// ================= Fully Contract Paid ================
$(document).on('click', '.c_fully_paid', function () {
	var contract_id = $(this).attr('id');

	$.ajax({
		url: BASE_URL + "c_pay-paid",
		method: 'POST',
		data: {
			loan_no: loan_no
		},
		dataType: "json",
		beforeSend: function () {
			$("#loading-screen").show();
		},
		success: function (data) {
			if (data.success) {
				$("#loading-screen").hide();

				showNotification(
					data.message,
					"check_circle",
					"success"
				);

			} else {
				$("#loading-screen").hide();

				showNotification(
					messagesLang.something_went_wrong,
					"warning",
					"danger"
				);
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

				msg = 'Email notification did not send.';

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
			}, 1000);
		}
	});
});


// ==================== Pay Payments ================

$(document).on('click', '.pay', function () {
	var daily_payment = $('.daily_payment').val();
	var loan_no = $('.loan_no').val();

	$.ajax({
		type: "POST",
		url: BASE_URL + "pay-loan",
		data: {
			daily_payment: daily_payment,
			loan_no: loan_no
		},
		dataType: "json",
		cache: false,
		beforeSend: function () {
			$("#loading-screen").show();
		},
		success: function (response) {
			if (response.success == true) {

				showNotification(
					response.message,
					"check_circle",
					"success"
				);
				$('#payment-modal').modal('hide');
				setTimeout(function () {
					window.location.reload(1);
				}, 3000);

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
			}, 2000);
		}

	});
	return false;
});

// ==================== Pay Penalty ================

$(document).on('click', '.pay-penalty', function () {
	var total_pay = $('.total_pay').val();
	var loan_no = $('.loan_no').val();

	$.ajax({
		type: "POST",
		url: BASE_URL + "pay-loan",
		data: {
			total_pay: total_pay,
			loan_no: loan_no
		},
		dataType: "json",
		cache: false,
		beforeSend: function () {
			$("#loading-screen").show();
		},
		success: function (response) {
			if (response.success == true) {

				showNotification(
					response.message,
					"check_circle",
					"success"
				);
				$('#payment-modal').modal('hide');
				setTimeout(function () {
					window.location.reload(1);
				}, 3000);

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
});

// ==================== Update Profile ================
$(document).ready(function () {
	$('#update_profile').on('click', function () {
		var formdata = new FormData(document.getElementById("update_form"));

		$.ajax({
			type: "POST",
			url: BASE_URL + "update-borrowers",
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
					$("#edit_profile").modal('hide');
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

// ==================== Update Customer ================
$(document).ready(function () {
	$('#edit_customer').on('click', function () {
		var formdata = new FormData(document.getElementById("edit_form"));

		$.ajax({
			type: "POST",
			url: BASE_URL + "update-customers",
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
					$("#edit_data").modal('hide');
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

// ==================== My Task ================
$(document).ready(function () {
	$('#my_task_btn').on('click', function () {
		var formdata = new FormData(document.getElementById("task_form"));

		$.ajax({
			type: "POST",
			url: BASE_URL + "my-task",
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
					$("#my_task").modal('hide');
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
});
// =================== Done Task =================
$(document).on('click', '.done_task', function () {
	var id = $(this).attr('id');

	$.ajax({
		url: BASE_URL + "end-task",
		method: 'POST',
		data: {
			id: id
		},
		dataType: "json",
		beforeSend: function () {
			$("#loading-screen").show();
		},
		success: function (data) {
			if (data.success) {
				$("#loading-screen").hide();

				showNotification(
					data.messages,
					"check_circle",
					"success"
				);

			} else {
				$("#loading-screen").hide();

				showNotification(
					messagesLang.something_went_wrong,
					"warning",
					"danger"
				);
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

				msg = 'Email notification did not send.';

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
			}, 1000);
		}
	});
});

// ================= Remove Task ================
$(document).on('click', '.remove_task', function () {
	var id = $(this).attr('id');
	$.ajax({
		url: BASE_URL + "remove-task",
		method: 'POST',
		data: {
			id: id
		},
		dataType: "json",
		beforeSend: function () {
			$("#loading-screen").show();
		},
		success: function (data) {
			if (data.success) {
				$("#loading-screen").hide();

				showNotification(
					data.messages,
					"check_circle",
					"success"
				);

			} else {
				$("#loading-screen").hide();

				showNotification(
					messagesLang.something_went_wrong,
					"warning",
					"danger"
				);
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

				msg = 'Email notification did not send.';

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
			}, 1000);
		}
	});
});
// ================= Update Task ================
$(document).on('click', '.update_task', function () {
	var id = $(this).attr('id');
	var description = $('.task_des').val();

	$.ajax({
		url: BASE_URL + "update-task",
		method: 'POST',
		data: {
			id: id,
			description: description
		},
		dataType: "json",
		beforeSend: function () {
			$("#loading-screen").show();
		},
		success: function (data) {
			if (data.success) {
				$("#loading-screen").hide();

				showNotification(
					data.messages,
					"check_circle",
					"success"
				);

			} else {
				$("#loading-screen").hide();

				showNotification(
					messagesLang.something_went_wrong,
					"warning",
					"danger"
				);
			}
			setTimeout(function () {
				window.location.reload(1);
			}, 1000);

		}
	});
	return false;
});

// ================= Fully Paid ================
$(document).on('click', '.fully_paid', function () {
	var contract_no = $(this).attr('id');

	$.ajax({
		url: BASE_URL + "fully-paid",
		method: 'POST',
		data: {
			contract_no: contract_no
		},
		dataType: "json",
		beforeSend: function () {
			$("#loading-screen").show();
		},
		success: function (data) {
			console.log(data);
			if (data.success) {
				$("#loading-screen").hide();

				showNotification(
					data.message,
					"check_circle",
					"success"
				);

			} else {
				$("#loading-screen").hide();

				showNotification(
					messagesLang.something_went_wrong,
					"warning",
					"danger"
				);
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

				msg = 'Email notification did not send.';

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
			}, 1000);
		}
	});
});

// ================= Change Password ================
$(document).on('click', '.change_pass', function () {
	var pass1 = $('input[name="new_pass"').val();
	var pass2 = $('input[name="conf_pass"').val();

	if (pass1.trim() == "") {
		showNotification(
			messagesLang.please_enter_username,
			"error",
			"warning"
		);
	}
	if (pass2.trim() == "") {
		showNotification(
			messagesLang.please_enter_yourpassword,
			"error",
			"warning"
		);
	}
	if (pass2.trim() == pass1.trim()) {

		var formdata = new FormData(document.getElementById("change_pass_form"));

		$.ajax({
			url: BASE_URL + "change-password",
			method: 'POST',
			data: formdata,
			dataType: "json",
			processData: false,
			contentType: false,
			cache: false,
			beforeSend: function () {
				$("#loading-screen").show();
			},
			success: function (data) {
				if (data.success) {
					$("#loading-screen").hide();

					showNotification(
						data.messages,
						"check_circle",
						"success"
					);

					$('#change_pass').modal('hide');

				} else {
					$("#loading-screen").hide();

					showNotification(
						messagesLang.password_not_change,
						"warning",
						"danger"
					);
					$('#change_pass').modal('hide');
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
				$('#change_pass').modal('hide');
			}
		});
	} else {
		showNotification(
			messagesLang.password_did_not_match_please_try_again,
			"info",
			"warning"
		);
	}

});
