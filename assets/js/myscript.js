// ======= Notification ========
function showNotification(message, icon, color) {
	$.notify(
		{
			icon: icon,
			message: message
		},
		{
			type: color,
			timer: 3000,
			placement: {
				from: "top",
				align: "right"
			}
		}
	);
}
//======= image preview before upload =====
var loadFile = function (event) {
	var output = document.getElementById("output");
	output.src = URL.createObjectURL(event.target.files[0]);
};


$(document).ready(function () {
	$(".cancel-create").click(function () {
		$("#form-register")[0].reset();
	});
});

(function ($) {
	$.fn.currencyInput = function () {
		this.each(function () {
			$(this).change(function () {
				var min = parseFloat($(this).attr("min"));
				var max = parseFloat($(this).attr("max"));
				var value = this.valueAsNumber;
				if (value < min)
					value = min;
				else if (value > max)
					value = max;
				$(this).val(value.toFixed(2));
			});
		});
	};
})(jQuery);
// ====== DataTables ===========
$(document).ready(function () {
	$('input.amount').currencyInput();

	$("#rejected_customers_table").DataTable(
		{
			"language": {
				"lengthMenu": messagesLang.lengthMenu,
				"zeroRecords": messagesLang.zeroRecords,
				"info": messagesLang.info,
				"infoEmpty": messagesLang.infoEmpty,
				"infoFiltered": messagesLang.infoFiltered,
				"sSearch": messagesLang.search,
				"oPaginate" : {
					"sFrist": messagesLang.first,
					"sLast": messagesLang.last,
					"sNext": messagesLang.next,
					"sPrevious": messagesLang.previous
				},
				buttons: {
					'copyTitle' : messagesLang.copytitle,
					'copySuccess': {
						_: messagesLang.copiedrows,
						1: messagesLang.copiedone
					}
				}
			}
		}
	);
	$("#new_customer_table").DataTable(
		{
			"language": {
				"lengthMenu": messagesLang.lengthMenu,
				"zeroRecords": messagesLang.zeroRecords,
				"info": messagesLang.info,
				"infoEmpty": messagesLang.infoEmpty,
				"infoFiltered": messagesLang.infoFiltered,
				"sSearch": messagesLang.search,
				"oPaginate" : {
					"sFrist": messagesLang.first,
					"sLast": messagesLang.last,
					"sNext": messagesLang.next,
					"sPrevious": messagesLang.previous
				},
				buttons: {
					'copyTitle' : messagesLang.copytitle,
					'copySuccess': {
						_: messagesLang.copiedrows,
						1: messagesLang.copiedone
					}
				}
			}
		}
	);
	$("#contract_customers_table").DataTable(
		{
			"language": {
				"lengthMenu": messagesLang.lengthMenu,
				"zeroRecords": messagesLang.zeroRecords,
				"info": messagesLang.info,
				"infoEmpty": messagesLang.infoEmpty,
				"infoFiltered": messagesLang.infoFiltered,
				"sSearch": messagesLang.search,
				"oPaginate" : {
					"sFrist": messagesLang.first,
					"sLast": messagesLang.last,
					"sNext": messagesLang.next,
					"sPrevious": messagesLang.previous
				},
				buttons: {
					'copyTitle' : messagesLang.copytitle,
					'copySuccess': {
						_: messagesLang.copiedrows,
						1: messagesLang.copiedone
					}
				}
			}
		}
	);
	$("#approved_customers_table").DataTable(
		{
			"language": {
				"lengthMenu": messagesLang.lengthMenu,
				"zeroRecords": messagesLang.zeroRecords,
				"info": messagesLang.info,
				"infoEmpty": messagesLang.infoEmpty,
				"infoFiltered": messagesLang.infoFiltered,
				"sSearch": messagesLang.search,
				"oPaginate" : {
					"sFrist": messagesLang.first,
					"sLast": messagesLang.last,
					"sNext": messagesLang.next,
					"sPrevious": messagesLang.previous
				},
				buttons: {
					'copyTitle' : messagesLang.copytitle,
					'copySuccess': {
						_: messagesLang.copiedrows,
						1: messagesLang.copiedone
					}
				}
			}
		}
	);
	$("#customers_table").DataTable(
		{
			"language": {
				"lengthMenu": messagesLang.lengthMenu,
				"zeroRecords": messagesLang.zeroRecords,
				"info": messagesLang.info,
				"infoEmpty": messagesLang.infoEmpty,
				"infoFiltered": messagesLang.infoFiltered,
				"sSearch": messagesLang.search,
				"oPaginate" : {
					"sFrist": messagesLang.first,
					"sLast": messagesLang.last,
					"sNext": messagesLang.next,
					"sPrevious": messagesLang.previous
				},
				buttons: {
					'copyTitle' : messagesLang.copytitle,
					'copySuccess': {
						_: messagesLang.copiedrows,
						1: messagesLang.copiedone
					}
				}
			}
		}
	);
	$("#contract_history").DataTable(
		{
			"language": {
				"lengthMenu": messagesLang.lengthMenu,
				"zeroRecords": messagesLang.zeroRecords,
				"info": messagesLang.info,
				"infoEmpty": messagesLang.infoEmpty,
				"infoFiltered": messagesLang.infoFiltered,
				"sSearch": messagesLang.search,
				"oPaginate" : {
					"sFrist": messagesLang.first,
					"sLast": messagesLang.last,
					"sNext": messagesLang.next,
					"sPrevious": messagesLang.previous
				},
				buttons: {
					'copyTitle' : messagesLang.copytitle,
					'copySuccess': {
						_: messagesLang.copiedrows,
						1: messagesLang.copiedone
					}
				}
			}
		}
	);
	$("#new_building_table").DataTable(
		{
			"language": {
				"lengthMenu": messagesLang.lengthMenu,
				"zeroRecords": messagesLang.zeroRecords,
				"info": messagesLang.info,
				"infoEmpty": messagesLang.infoEmpty,
				"infoFiltered": messagesLang.infoFiltered,
				"sSearch": messagesLang.search,
				"oPaginate" : {
					"sFrist": messagesLang.first,
					"sLast": messagesLang.last,
					"sNext": messagesLang.next,
					"sPrevious": messagesLang.previous
				},
				buttons: {
					'copyTitle' : messagesLang.copytitle,
					'copySuccess': {
						_: messagesLang.copiedrows,
						1: messagesLang.copiedone
					}
				}

			}
		}
	);
	$("#new_home_table").DataTable(
		{
			"language": {
				"lengthMenu": messagesLang.lengthMenu,
				"zeroRecords": messagesLang.zeroRecords,
				"info": messagesLang.info,
				"infoEmpty": messagesLang.infoEmpty,
				"infoFiltered": messagesLang.infoFiltered,
				"sSearch": messagesLang.search,
				"oPaginate" : {
					"sFrist": messagesLang.first,
					"sLast": messagesLang.last,
					"sNext": messagesLang.next,
					"sPrevious": messagesLang.previous
				},
				buttons: {
					'copyTitle' : messagesLang.copytitle,
					'copySuccess': {
						_: messagesLang.copiedrows,
						1: messagesLang.copiedone
					}
				}
			}
		}
	);
	$("#active_homes_table").DataTable(
		{
			"language": {
				"lengthMenu": messagesLang.lengthMenu,
				"zeroRecords": messagesLang.zeroRecords,
				"info": messagesLang.info,
				"infoEmpty": messagesLang.infoEmpty,
				"infoFiltered": messagesLang.infoFiltered,
				"sSearch": messagesLang.search,
				"oPaginate" : {
					"sFrist": messagesLang.first,
					"sLast": messagesLang.last,
					"sNext": messagesLang.next,
					"sPrevious": messagesLang.previous
				},
				buttons: {
					'copyTitle' : messagesLang.copytitle,
					'copySuccess': {
						_: messagesLang.copiedrows,
						1: messagesLang.copiedone
					}
				}
			}
		}
	);
	$("#contract_users_table").DataTable(
		{
			"language": {
				"lengthMenu": messagesLang.lengthMenu,
				"zeroRecords": messagesLang.zeroRecords,
				"info": messagesLang.info,
				"infoEmpty": messagesLang.infoEmpty,
				"infoFiltered": messagesLang.infoFiltered,
				"sSearch": messagesLang.search,
				"oPaginate" : {
					"sFrist": messagesLang.first,
					"sLast": messagesLang.last,
					"sNext": messagesLang.next,
					"sPrevious": messagesLang.previous
				},
				buttons: {
					'copyTitle' : messagesLang.copytitle,
					'copySuccess': {
						_: messagesLang.copiedrows,
						1: messagesLang.copiedone
					}
				}

			}
		}
	);
	$("#passive_membership_table").DataTable(
		{
			"language": {
				"lengthMenu": messagesLang.lengthMenu,
				"zeroRecords": messagesLang.zeroRecords,
				"info": messagesLang.info,
				"infoEmpty": messagesLang.infoEmpty,
				"infoFiltered": messagesLang.infoFiltered,
				"sSearch": messagesLang.search,
				"oPaginate" : {
					"sFrist": messagesLang.first,
					"sLast": messagesLang.last,
					"sNext": messagesLang.next,
					"sPrevious": messagesLang.previous
				},
				buttons: {
					'copyTitle' : messagesLang.copytitle,
					'copySuccess': {
						_: messagesLang.copiedrows,
						1: messagesLang.copiedone
					}
				}
			}
		}
	);
	$("#active_membership_table").DataTable(
		{
			"language": {
				"lengthMenu": messagesLang.lengthMenu,
				"zeroRecords": messagesLang.zeroRecords,
				"info": messagesLang.info,
				"infoEmpty": messagesLang.infoEmpty,
				"infoFiltered": messagesLang.infoFiltered,
				"sSearch": messagesLang.search,
				"oPaginate" : {
					"sFrist": messagesLang.first,
					"sLast": messagesLang.last,
					"sNext": messagesLang.next,
					"sPrevious": messagesLang.previous
				},
				buttons: {
					'copyTitle' : messagesLang.copytitle,
					'copySuccess': {
						_: messagesLang.copiedrows,
						1: messagesLang.copiedone
					}
				}
			}
		}
	);
	$("#transactions_table").DataTable(
		{
			"language": {
				"lengthMenu": messagesLang.lengthMenu,
				"zeroRecords": messagesLang.zeroRecords,
				"info": messagesLang.info,
				"infoEmpty": messagesLang.infoEmpty,
				"infoFiltered": messagesLang.infoFiltered,
				"sSearch": messagesLang.search,
				"oPaginate" : {
					"sFrist": messagesLang.first,
					"sLast": messagesLang.last,
					"sNext": messagesLang.next,
					"sPrevious": messagesLang.previous
				},
				buttons: {
					'copyTitle' : messagesLang.copytitle,
					'copySuccess': {
						_: messagesLang.copiedrows,
						1: messagesLang.copiedone
					}
				}
			}
		}
	);
	$("#new_membership_table").DataTable(
		{
			"language": {
				"lengthMenu": messagesLang.lengthMenu,
				"zeroRecords": messagesLang.zeroRecords,
				"info": messagesLang.info,
				"infoEmpty": messagesLang.infoEmpty,
				"infoFiltered": messagesLang.infoFiltered,
				"sSearch": messagesLang.search,
				"oPaginate" : {
					"sFrist": messagesLang.first,
					"sLast": messagesLang.last,
					"sNext": messagesLang.next,
					"sPrevious": messagesLang.previous
				},
				buttons: {
					'copyTitle' : messagesLang.copytitle,
					'copySuccess': {
						_: messagesLang.copiedrows,
						1: messagesLang.copiedone
					}
				}
			}
		}
	);
	$('.dataTables_length').addClass('bs-select');
	$('#all-customers-table').DataTable({
		"language": {
			"lengthMenu": messagesLang.lengthMenu,
			"zeroRecords": messagesLang.zeroRecords,
			"info": messagesLang.info,
			"infoEmpty": messagesLang.infoEmpty,
			"infoFiltered": messagesLang.infoFiltered,
			"sSearch": messagesLang.search,
			"oPaginate" : {
				"sFrist": messagesLang.first,
				"sLast": messagesLang.last,
				"sNext": messagesLang.next,
				"sPrevious": messagesLang.previous
			},
			buttons: {
				'copyTitle' : messagesLang.copytitle,
				'copySuccess': {
                    _: messagesLang.copiedrows,
                    1: messagesLang.copiedone
                }
			}
		},
		dom: 'Bfrtip',
		buttons: [
			{
				'extend': 'pdfHtml5',
				'text': messagesLang.pdf,
				'title': messagesLang.mobsy_corporation_customers_report,
				'orientation': 'landscape',
				'tag': 'button',
				'className': 'btn btn-primary btn-round text-primary btn-sm',
				customize: function (doc) {
					doc.content.splice(1, 0, {
						margin: [210, -45, 0, 20],
						image: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAUMAAAE8CAYAAABaR9MTAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAHrZJREFUeNrsnXlwFOedsH894pAAwSAMCHyJjXGSzSaRD4gNcRDBt2Mjb+xs9qiyXJt/9i/LW1u72Xzftzjf1ia1W1tFUpWs48SOwAdnAAEGjLkGkDAGgQU2hxA2A7pGJxLoPqb3fUcjIQkJz2g0Mz3dz0M1PdPqbvW80/3o93vf7vc1TNMUAACnYyBDAABkCACADAEAkCEAADIEAECGAADIEAAAGQIAIEMAAGQIAIAMAQCQIQAAMgQAQIYAAMgQAAAZAgAgQwAAZAgAgAwBAJAhAAAyBABAhgAAyBAAABkCACBDAABkCACADAEAkCEAADIEAECGAADIEAAAGQIAIEMAAGQIAIAMAQCQIQAAMgQAQIYAAMgQAAAZAgAgQwAAZAgAgAwBAJAhAAAyBABAhgAAyBAAABkCACBDAABkCACADAEAkCEAADIEAECGAADIEAAAGQIAIENwEg3z5udKtyy32ccqTisrfZVv1xmMowggUqruvydnfLKx0tVMWUDi4qIIIBLK7vtKjilmHiUByBAcyxff/rMcvymIEJAhOJeSb85TESEiBGQIDubMn2fkmESEgAzByRR//e4cPxEhIENwMkVfvYvUGGwLt9ZASHx0z505SS4jL2kU2078+0dk4lM/jOj3X3shd8R9R0JPyefSXVDJFwzIEL6cw1+5IyfJMEYdEbpmp8u47zwT4VEML8Ok9DkR7dVf5eMLBtJk+HL2z7s9x+8nNQZkCA5m911zuY8QkCE4mx13pPNkCSBDcDb5c2cTEQIyBGezMX0mESEgQ3A2a2fOyDFNRAjIEBzM2zOmkxoDMgRn80f3tByT22cAGYKTeSM1lWeNAZChs/ltymTqCAGQobP5dXIyrcYAyNDZ/Pe4Cdl+IkIAZAiSSREAIEMAgJugCy+IOv5qn3R/vCMq++7xVUW0vXmthS8IkCHEho63DgemaO0bgDQZAAAZAgAgQwAAZAgAgAwBAKIArckQdcY/PV/GZUZ2n3fbLzYOuzzlZy9GtN/u4mLp2lk6/MXxPX+Gf/dtr1mwSL2uJ+pWcWYhQ0i0k0yJMOUffhEdGUa639d/NqIMk+72Z6jZCgsWqUdNyJA0GQAAGQIAIEMAAGQIABBFaEABCCd6SFsuMmFmyOubDR+K2XnlxvbpPxGZ+2zo25f8UsyWoxQ8MgSwGFqEKXPCsGfK4PfJ6SIzF4e8ufGFW0xKnTQZAAAZAgAgQwAAZAgAgAwBAJAhAAAyhFjwwYd7s6c+nrmEkgAYDPcZOoBdu/dkq9lywzD03J08Z460yCkKBgAZ2p8du3ZnKvm9pF7mqLmbEgFAho7h/Z27tfSyDUNeUfNMqxyX7otwpP4II6Xhzvl88YAMoZftOz7QUaAWYCANpkSih37W+KZH7G61fmfZ4Pe+jWI0FoW+ffMJCh0ZwpdLcFeOSCAVzjJNU5QQKZRoy3BApwuj2r69JDABMoQI2fb+zmAqbOju6DMk8Bg/EgRAhg5h6/YdWoK5wXSYVBgAGTqL/G19EhQkCIAMnceWre/bJhLUQ4WOv+++iPbR+h8bhl2eVlYa0X716HjhtHS77t8aVn+E8vHfib/xgxvbu58Umb4g5M3Nqg3UMcYInkCxpAi3v6Zml6R3mEqiQRiEP2mOu7yikvOCyNC+bM7flnOjYQRgeLom/IW+h/RSRWXVr9X8V7fPndNIqRAZ2oJNW7ZlKREeUC/zECGEiDuYOXxSWeXLoTiIDBNdgvqEXqkmTmYYLfqPZ54Sor7f9NW5c9KLKRIiw4TiT5u35kpvvSAihLEgS0eJVb7qlWqiPpHI0Pps3JSvH53T6XAmT41AFNB/ZLN91TWvps+elU9xIEPLsWHTFrchhj5RVyBBiEHqvEUJMV+dZS/Pnj2LBhbSZMuIMJDCSG+FN0Cs0B13XKqursmlKJBh/EX4p826geSA0EoM8SHQSFdTU7tFTdQlkibHnvUbN2eqTDhQN0hpgEWixKya2rqXZ828jbpEIsOYiTA3mBYjQrBalLhFCTGvtq6eKJHIMHqs27ApcLIZhpFFadgT/8nlkW2vn1Me8KxynMjRf6iVEF+eedsM7kskMhxb1q7/kxagvm8QEUIioLOWT+rq63MoCmQ4liLUafEBoVMFSDzylBD15PhzlzQ5Atas36hPoDxDAkNwAiQquoOQzPqGhudnpKV5kSGEK0KdZtBaHAI9V2qktz1p7NH9EUZCd3F4VWautOUiE2aGvL4eQGrguCmu9J+IzH029O1Lfilmy9GYpc1BIXqQIYQmwnUbssQwtpAWh4b/s6bAFBUZRmkI0hHRIkyZE4Y9h4ykl5weVuewxhfuwCg3MUI/JXWgoeHqq2lp03/ltPOUOsPwRZgjun7QNBEh2JWVSoh5yBBG5L21G/JMU/IoCXAAOVevNh5Qk2P+6JMmh8C7a9a7DcOg30FwGlk6C7ra2LR0unua7Tt7QIYhiFCfEKZpZsazp5n2TkMOl+mva/Ax3HRIwx7j4GUpKQ+KLEtRq7oCvee41NQ/d6lJ/XO5en828OeB167g6wHr6GVzWxvl0Y8+4oSxH4EhBoJCtPUN2sjwFrzz3jodER6QOLcYt3eK/PRkklxuTxqbHU5YJPK1RWN6jH+Tck4eFWRoUwIBQWNT01L3NPsKERmOLEItQN1inBHvY8k/75LLra6EreFN+dmLkvIPv4hoHw13zh92+aT/86OI9tv1ySfStbOUEz50Ib6shGjLjh5oQBlWhGu1CC3R7dZHl1yyvoavCSwjxC1N167lIENniTDurWgXfC75rxKTLwWsRp4dhYgMB/D2u2ssI8KaRpGfnurmSwHLCvHateu2EiJ1hhYUYVuHyOuf9Ij0JIl8WZvJ5AmyKHViyPs+cl3tvKXzxoIJSbIobVLI25d1dEvZ1TZOGOgTokydmroKGdqE1e+s0b1SW6bXmbc+6pZTzSGIUPH/vjFL/v+Pvxryvv9tXYn8+7Hy/vdahIX/vDDk7fecrJXH3z3t2HNFP2t80yN2t1q/s2zwe99GMRqLQt+++YTlhXj9erOkpk5JeCE6XoZahGKh7rc2H+2R/Y1GSCKEOMhwQKcLo9q+vSQw2S1CtIMQHV1nqEQYaB2zigg//ULk3YoejAOJyEolxITuwcmxMlz19ntu0zQtM2pdTYPIayc6uKQgUXHrqqbm5sQVoiPTZC3CYGpsiS+u6bopP92nGyXIja2OMfkhMcaHnkjoOj+zu/bG9uNmqqsuLYy0vEzE35owQtTXlRLifVOmTPEiwwTAFHOlIYYlRNjebkqep1Waul3U4CaCDL/6r+H1R/jx34k5YAAoY8oDItMXhP4LqzYkWh2jW/f12dzSsnTK5MkJ1bmD49LkvLff1V1w5VjlePYca5eCa9xYDbair1EyoXCUDJUIc6wkwsITHbLa28WlA7YUYktra0L1/ekYGeatfidLTNMyX86Z813yxul2LhmwMzlKiK8hQ2uJsK8HGktQV+eXNR83c6mAE1ihhJgQo0faXoZ/XPVOYDhPsci9hO3tflm9u0kaOrlKwDHktba1Wf6WGye0X+pxSzLj2En1IN7Jb5KyZlMkaWwOaN+VJpF1JeGtPwD9rPK/hbF9WWP4qb0ejjPSIT1HQvdHGAm9w5hClHEHhbh0UkqKZVuYbS1DFRW+pmaWCdE/UBFhaX23KvWxu5/wiO96YBo1LZ2DnlWOirB2lkatA1U6Zk0Y+sYZf540Oca8lfd2lmmaK6xyPOc+65BD52kwAUeT3dbWnosMYyvCvmeOLUHF5S5Zt/sqlwKAyEolREvWH9o1MrRM5wtNV3tk7ZY6LgGAAddne3uH5cZjtl2d4Zt/XJ1rGEaWVY4nf3OdtHWYqqSj1IITaeeuanvdJ2Ko6AaUVRccLPdr58Na3ewa3F5gdjeK0VYV+g78tuxIN0MsWH9oKxkqEerwe6WVjqm8WjeYRC8A1yJ89K5poW9wpUmODJCh3j6czmF1565OlqH/4r9EtL3ZfDQwgWSr6DA3OXnir5DhmItwlQq7jTzOMesx8e8fkYlP/TCygOyF3BH3HQk9JZ9Ld0ElX1J8WNHR0Zk/ceIELzIc44IVi3TJBYNxzU6Xcd95JsK9DC/DpPQ5kUV6VT6+oPjR90DEUkucpzaJCrNGvFoAwMpkqejQEtduwkeGf3grz20YpMcQo+gh/Sciyekhr68HgBrYH6GR/FU1zQt9+yGdw9qUlZ2dXfkTJoyPa7pshzRZp8cZXKYQE+Y+G17nro1FQ2Q4L7zOXdsvidhfhmKFdDmh02QVFWaSHgPYI11W0WFcr+VErzMkPQawDyu6urvjdjN2wsrw92/m6b8itB4D2Ad3PAOchJShEqEutBWcOwC2I1tFh1nIMHRWikWePQaAMScu0WHCtSarqFD/1cjhfOnlSENr7/PGodLVc9P2i//rWMibl3V0U+gQbTJUdJg7fty4mD6ql3Ay1H0UGlbpttoKdPb0ThFsH1HnsADRSFkNY0VPT8+qpKSkmPWMnVBp8ht/+KOOCLM4VQBsT8zbBRKtzpBGEwDnkKuiwwzS5CH87g9vvWaIkcH5MZhF6amyLIwuvPSAUIPS4glJsihtUsjb6zrDsqttFDzEBMMwdGNpTPo9TAgZKhHqkPkVTo2b0SIMpz9CPZLeIBmOTwqrP8QrunNXJ8uwcrtIw/GQVzf143RD3hvhjADR3eD0Uzzb7/dnuVwuz3A/XPDgggzTb2o3/LzoZFFE9YuJEhnmCrfSJCz+ap90f7wjKvvu8VVFtL15rSW8z+J7M7Lf114y6FllCAldPTZIhgsXLMwIDviWbbiMpceLjkfc0GJ5GRIVJj4dbx0OTNHaN9ierL7o8KGFD2X4Tb+WYI5KoRuVELUIi8filyRCAwpRIYDD+fySd8XD33lY34yt6x1y1KQjwTEToeUjw9/9/k23GAZRIYBDqaisktVvvys7tuZnDfnR88eOHysey99l9TQ5V0xTC5GzAiyB657/FJn6tZDXN0t+KWbLjQGgAp3D6j4RR7m9kyT4zrvvyY5tW2/+DgzXq0ePHfWM9e+0rAwDUSF1hWA1tAjD6dz1C7eYAxfoXrIj2d7mlF78XLZsyZed27eNtMoqJcKoPKZn5cgwW6grBHAExadPy3vvrZGTx4/rR25HXE1Nr0brGKwsQ542AbA5BUc+ku3btsvJoltKsI+XVVQYtWeVLSnD1994M0fNMqgqtAfjn54v4++7L6J9tP7HhmGXp5WVRrTfttd/Jm2/2MiXFGM+3LtP1q1dKxXlZWL6v7wiwHAZrx756EhxNI/JqpHhS5wuAPaipaVV8rdukwP790tlRXkokWAfHiXCqHfnZTkZqqhQd+WfxakTGvpZY/2IXVjrD6SrR/YOXXYL6M8QwqWmpla2bd8h+/ftlWtNjeFIsD89jsVxWjEypAU5DPRzxhH1R0h/hhAlTn96Rg4c8Mi+PR8qAfpHu5ufq6jQ6zgZ/s/v/qAHhM/mNAJI4Gxlv0d27dwlF0svjCYKHIhX+SBmvV1bLTLkdhqABKSltVXe37FTDnoOiq+qMlIJ9keFhUcKY9bTtdVkSIoMkEBcunxZdu78QDz79wUEOEYSFMNweQsKD6+K5WexjAxViqwbThgHOUzunJ4iy2ZODj2FqW0Z1Dmr3v6tZ+aHvP3psuvyTwcvUfAO54DnsBQcPiyffXp6zAQ4NCqM9WeyUmTI7TSjkeHEcXKXOzn09a91SNmQ7R+7fyYFGSL6WWH9iFzI6zefGPzet1GMxqJRbx9Pamrr5NChXglW+3zRkqAm5lGh1WSYw6UGlpdhy9GInhVOxM5dz547LwUFBXLwwIHez2BG/Wnpn8fjc1pChr99/ffZhmHQcAJgEVrb2uTQ4QLZu2dPIAqMIbrBJN+xMlQs5/QDsEAUeL5ECgsLpeDQoVhEgMORr1Lkxnj8YqvIkHsLAeIVBba2SUHhEdm3d5/U1lTH+3B+Ha9fHHcZ6hRZLHRvYWVl7wBDKm2XqsrKwHxYBiyeOnWqTJmSGlg3NTVVpk2bxhVmUwKds6bMCXl9s2rDoDpCl/tJkekLRr39WHK+5IIcOfKRHCksiFcUOBTv4YJDxfH65VaIDGOaInd2dEpDQ4NcvdogzdevS11trbR3dIivsiKkEyKUHjY0M2bOlGlut8y/a67a7yRp6U6Vz68jSYgvdfX1AQF+fPSo1Kpz3yIS7E+R4/nLrSDDqKbIPp9Pqqt90lBXr778GmlUIvSP/jnJkKlXJ5qeRG50MaVVmD53vkyclC5dxiy50jVDTpmTuEIhumlwW5sUnzotH398TErOn+v9o25asv/s1Y6V4W9ff0OJcGxbkWtqqpX8qqWqokLKLl+23JfuqyztF6Qu/KfvuFfJ8W6pd90ph/z2vN+v50qN+v+TqOxb90cYCd3FxWJXLlwolaNKgJ+ePi0tLc1WP9zGeKbIVogMl0S6g+bmlkDEV3b5ipSXX5H21raEOmGryy/o0zbw+pEp0+S2u+6X6vH3yhGZbZuL0v9ZU2CKigzpmHVwRlLfIAc8B+Wzzz4NZCZm4gyg4on3AcRbhqNKkVtaWqSivFwuXiyV2mqfVUP+8NOZ5ia5clbf2HpAHpt1hyTfvkC2J92r3k/lKodbCvD0p5/JiaIiKbty2cpp8K046FgZqhQ5Q80yQl2/q7NLKisr5POLF6WyvDyS/tESgoaacpXzl8sD6vWd33pUvFO/IcWuuTetF2l/hnpb4x/3YZQEo629XT5VAjxz5kwgDZbEDwjiXl8Rz8gwpKiwrrZOLl26JBfOn7NNBBguZaf3SpLslefufUDqZy2UwnEZ2MCBXO+cIUXVD0hRWZqcLPm/iRoBDsuhwwcdnSaPWF/Y1dUpVy5fkfPnzkpTYyNXQZCKCydE1PRY+l3SOv8HUph0N4ViewGmyvGyx+WTsilSdKEluPSq3T6m1woHEU8ZZg1d0NraKufOnpWLpSUh38/nRK7WlKkU+nV5bv79cnn2I3LKNYdCsZMAW005frFbRX8NcuLMbX1Xh50/snNl+Jv/eSPTMG48dVJfXydnz5wZyx5yHUFl6UmZcPETyf76YsmfoQJtI5VCSVB8jUqApR1y8lytnPv8xlNQDsES9zfFKzIMRIVlZeVSWlIiDQ11SDCS9PlcoSyZckZSv7ZM3k95kAJJEL6oVgIsaZGT52vkckWdk4uiyQoHERcZXrhQstx76ZI0X7+GBMeI1uZGaT+xRZ6YdVx892STOkcJv+/N0ae/nTPk7Pl2OVH2mZRU9EjN1fb+nzkoCrQsMZXho48+rluQVyoBZtj91ph40VhTLsk1v5HlmU/L1skPqKssmUKJZ/R37VtytvYOOe+bKEUlzUHxtVAwTk2TH3vsCZ0WrxAGh48Z1ad2ydIpRyTpG9myd9x8CiRGBKK/hm9K0RW3lJR390Z/Rpf6SReFc4u/4baX4RNPPKUiQDMPCcaHtuYmMY6/LU/ddrt0zVuGFKMovzO+qSr1Fbns62v1baZwSJNFnnzyabeSoI4EcyliC/zZrVNXaR1SHCv5nVHyO6vkd17Lr6ov5W0JpsDU/SHDIE899UxuMCVmTBOL0VRfKVL/jiybPE0mzc+S7RPv5XacL8HX+mdytu4r4q1PlvOVhlyqaJZe3zUjv7FDDxHssY0Mn376BzoVXimMfWz99LmlSdpPbZfF6vWsed+S62nflL1Jdzq+saVl9jgpz5ghF6bOkHJXipSVGVJT0i2G9PRHfhAVLBE4RSzDH/zgOVLiBKbm0mkxvJ/Kd7UY5y+U61Pnyx7XbNtHjFp8ZX3iM1KkvNOQ6pYuEb/66E062uvh5CBNDp1nn12ub5XJIyW2iRhLj6m077g8ol7PmHuPyPR5Upd8uxQY0xNWjs2zVLQ3b4bUp0yWsgmTpcKcKN7rXdLSbfb6LvCYbxfpbnz5dsLK8Lnnst3BVmJGtbMpDb7PRdTkUq+/p6ZpM+bKBPft0pUyWxrG3yZfGJOl0kizxLHW3jNJ6tKmSP2kyVI/LlnqjQlS7x8nl5u7pbmrp/euli4J1vV1BLZBfqTJQzHCfQLkueXPZ4sSodou8AH09n3Trd73vb6xzH/TskFz/+D3N7/2D798SAcPw32+kcZAGcsBoaL6pbluXMgDL2qX4bpp+UjrGsOsO9J2g5YPWTd1+hyZMCVNZowXeaDzi8Dyr7fc6FXlLm+DTKnpDvsznls4a9D7ktQb4r2gx41Rh1Hb7pfq5o5hj3/Aglt+zpB+JsZIu7zlfobdYIR1Qlk23LXQv2yk66jvx2Le+nobZj9ftu7w1/VIP/OPvI66pg4dPmgkjAyzn/9hIBpUk5bhl8pvDGToVTPvKGSYIQM6jUWG0ZVhqPuL9PVot0GGiSFDxTwlRK/l0+Tn//KFLDXbMkbhrH70pjE4bxrwXjyeA56x/oAPLXwoa0Aorlu6pwXnfe8BIP7oa9HaMvzLH76ob5cZTUuxJ/jhLve93rv3w5h/2KPHjg4U7E3jsi5csLAvktTS/HbwNZIEiL0M4zpu8ohp8gsv/ChD/WiLCmozB6a+gfVvToOL1aSlc0q/3rVrR8KPv7jgwQVZwS9oSVCUbtJk0mTS5KilycUqTb7PcjJ88cW/yu6tHxS3LsRhZOhRcz2alWf79q0ecQBKjoHoUX1xywfKERkiQ2Q4JjLU76cfLjjUaBkZ/uhHP35N30Tde9C9hahe64YMLcCtWoBb8zc7fmCSB+9/UEeN+tai5bFOq5EhMrSpDF9WMlwVdxn+1Y//RrcWb1FHlHUj9ZWt6lX+5k0biwVuJcaMoBhfioUYkSEytKkMVykZvhxXGf74r/820+y7d9A089X81xs3rveiOWuKERkiQ5vKsFHJcHrcZKhEqPscfEWnwOvXrfGgszEX4ytqyhnLOkZkiAxtKkM9i1uqbDAGSczEmBOMFrOQITJEhiPK0KNkuBQZOidaXBGMFpEhMkSG/pu2mVdQeDjm1XQu9BRbik4WedWkK4l13cjPxSLjPwBYiFeIDJ0ZKbqDUaI+ATKIDIkMiQxNHSDo6DCmgQKRYfwjxUY1/UpN89RbHTF6KRVwODpAiHln0cjQWmJcpWb3kT4DyCuLFy2O6VNeyNCakeJrOk0IShHAcai0OubRIXWGFifY+qx7DurvVZw6Q+oMbV5n2Ld+oO6w8EhhTLIkIkPrR4q69fl59VLfe+WlRMBB6EeEV5Imw1ApeoKNLNQnglPQf/xPkSbDiAS7E9MDcmWRJpMm2yxNbtQdNqj56oLCwzHtIAYZJrYUs9UF0z9UKzJEhgkqQ53p6A5ith4uOBS33q6RYYKzcMFCdzBKzEaGyDCRZBgU4OqDBz35VriWkKF9pKhl2B8lIkNkaFEZavFt1XOP54Cl6r6RoY14aOFD/VEiMkSGFpKhigD9upf8/P3791m28Q8Z2lOKWcG6xAxkiAzjIcO+OkAdAe7btych7n5Ahjbm4e88nKuktmJo6owMkWGUZNifAu/Zszvhbv9ChjZn0cOLtAi1EHORITIcYxn2twLv3r0rP9GvFWToHClmqIurv1NZZIgMRylDb18EuGvXDo+drhFk6DAWL1qcoSNFJa8cZIgMQ5Shpy/93bnzfa9drw1k6FC+u/iRjGD6nIMMkeGQ/XgHCNDz/vvbHPH4JzJEijp97h/BDxk6VoYB+akXnm3b8h05TjoyhACPfPd7WoTZwWgxAxnaXoZaeB41P7g1f3M+VwAyhGH43iNLspQMX5IBI/ghw4SXobdPfmqev2Xzn+j5CBlCqCxZkqVvy8kOptGZyDChZBiUn2j5eTZt2uDljEaGMAZkZS3NCIrxpeHFiAzjLEOP+r84GPl5Nm5cT+SHDCHaLF36/T4xLteeRIYxl6E3WOd3UM83rF/r4axEhhBnvv/9ZTqVzlIy7BNjBjIcUxnqCC8gvmDk51m39j2iPmQIVmfZsse0DLUUl/RK0shAhiHLUEvPK71d3XvUsuK1a95FfMgQ7MBjjz2hZajrGDPVxb0k+NrtcBkOlF7g9fp1a4o5W5AhOIzHH38yIxgx6gjy7gGv7SRDT3B+UC3sS3W9G9av9XIGIEOAW/Lkk0/riDEQOQYjyWlyo+W6b3m8ZehVP+4TWrFat0lu1OvJxo3rPXyTyBAgJjzzzLMDRwXsE+jNIhsg0yE/a1SvT91ChsUyYDhWJcPiTZs2UHeHDAEAkCEAADIEAECGAADIEAAAGQIAIEMAAGQIAIAMAQCQIQAAMgQAQIbIEAAAGQIAIEMAAGQIAIAMAQCQIQAAMgQAQIYAAMgQAAAZAgAgQwAAZAgAgAwBAJAhAAAyBABAhgAAyBAAABkCACBDAABkCACADAEAkCEAADIEAECGAADIEAAAGQIAIEMAAGQIAIAMAQCQIQAAMgQAQIYAAMgQAAAZAgAgQwAAZAgAgAwBAJAhAAAyBABAhgAAyBAAABkCACBDAABkCACADAEAkCEAgFX4XwEGAA0WQq63WkRmAAAAAElFTkSuQmCC',
						width: 50,
						height: 50
					});
				},
				'download': 'open'
			},
			{
				'extend': 'copy',
				'text': messagesLang.copy,
				'title':  messagesLang.mobsy_corporation_customers_report,
				'tag': 'button',
				'className': 'btn btn-primary btn-round text-primary btn-sm',
			},
			{
				'extend': 'csv',
				'text': messagesLang.csv,
				'title':  messagesLang.mobsy_corporation_customers_report,
				'tag': 'button',
				'className': 'btn btn-primary btn-round text-primary btn-sm',
			},
			{
				'extend': 'print',
				'text': messagesLang.print,
				'title':  messagesLang.mobsy_corporation_customers_report,
				'tag': 'button',
				'className': 'btn btn-primary btn-round text-primary btn-sm',
			}

		]
	});


	$('#all-clients-table').DataTable({
		"language": {
			"lengthMenu": messagesLang.lengthMenu,
			"zeroRecords": messagesLang.zeroRecords,
			"info": messagesLang.info,
			"infoEmpty": messagesLang.infoEmpty,
			"infoFiltered": messagesLang.infoFiltered,
			"sSearch": messagesLang.search,
			"oPaginate" : {
				"sFrist": messagesLang.first,
				"sLast": messagesLang.last,
				"sNext": messagesLang.next,
				"sPrevious": messagesLang.previous
			},
			buttons: {
				'copyTitle' : messagesLang.copytitle,
				'copySuccess': {
                    _: messagesLang.copiedrows,
                    1: messagesLang.copiedone
                }
			}
		},
		dom: 'Bfrtip',
		buttons: [
			{
				'extend': 'pdfHtml5',
				'text': messagesLang.pdf,
				'title':  messagesLang.mobsy_corporation_customers_report,
				'orientation': 'landscape',
				'tag': 'button',
				'className': 'btn btn-primary btn-round text-primary btn-sm',
				customize: function (doc) {
					doc.content.splice(1, 0, {
						margin: [210, -45, 0, 20],
						image: 'data:image/png;base64,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',
						width: 50,
						height: 50
					});
				},
				'download': 'open'
			},
			{
				'extend': 'copy',
				'text' : messagesLang.copy,
				'title': messagesLang.mobsy_corporation_customers_report,
				'tag': 'button',
				'className': 'btn btn-primary btn-round text-primary btn-sm',
			},
			{
				'extend': 'csv',
				'text': messagesLang.csv,
				'title': messagesLang.mobsy_corporation_customers_report,
				'tag': 'button',
				'className': 'btn btn-primary btn-round text-primary btn-sm',
			},
			{
				'extend': 'print',
				'text': messagesLang.print,
				'title': messagesLang.mobsy_corporation_customers_report,
				'tag': 'button',
				'className': 'btn btn-primary btn-round text-primary btn-sm',
			}

		]
	});

	$('#all-loans-table').DataTable({
		"language": {
			"lengthMenu": messagesLang.lengthMenu,
			"zeroRecords": messagesLang.zeroRecords,
			"info": messagesLang.info,
			"infoEmpty": messagesLang.infoEmpty,
			"infoFiltered": messagesLang.infoFiltered,
			"sSearch": messagesLang.search,
			"oPaginate" : {
				"sFrist": messagesLang.first,
				"sLast": messagesLang.last,
				"sNext": messagesLang.next,
				"sPrevious": messagesLang.previous
			},
			buttons: {
				'copyTitle' : messagesLang.copytitle,
				'copySuccess': {
                    _: messagesLang.copiedrows,
                    1: messagesLang.copiedone
                }
			}
		},
		dom: 'Bfrtip',
		buttons: [
			{
				'extend': 'pdfHtml5',
				'text': messagesLang.pdf,
				'title': messagesLang.mobsy_corporation_contracts_report,
				'tag': 'button',
				'className': 'btn btn-primary btn-round text-primary btn-sm',
				customize: function (doc) {
					doc.content.splice(1, 0, {
						margin: [100, -45, 0, 20],
						image: 'data:image/png;base64,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',
						width: 50,
						height: 50
					});
				},
				'download': 'open'
			},
			{
				'extend': 'copy',
				'text': messagesLang.copy,
				'title': messagesLang.mobsy_corporation_contracts_report,
				'tag': 'button',
				'className': 'btn btn-primary btn-round text-primary btn-sm',
			},
			{
				'extend': 'csv',
				'text': messagesLang.csv,
				'title': messagesLang.mobsy_corporation_contracts_report,
				'tag': 'button',
				'className': 'btn btn-primary btn-round text-primary btn-sm',
			},
			{
				'extend': 'print',
				'text': messagesLang.print,
				'title': messagesLang.mobsy_corporation_contracts_report,
				'tag': 'button',
				'className': 'btn btn-primary btn-round text-primary btn-sm',
			}

		]
	});

	$('#all-contracts-table').DataTable({
		"language": {
			"lengthMenu": messagesLang.lengthMenu,
			"zeroRecords": messagesLang.zeroRecords,
			"info": messagesLang.info,
			"infoEmpty": messagesLang.infoEmpty,
			"infoFiltered": messagesLang.infoFiltered,
			"sSearch": messagesLang.search,
			"oPaginate" : {
				"sFrist": messagesLang.first,
				"sLast": messagesLang.last,
				"sNext": messagesLang.next,
				"sPrevious": messagesLang.previous
			},
			buttons: {
				'copyTitle' : messagesLang.copytitle,
				'copySuccess': {
                    _: messagesLang.copiedrows,
                    1: messagesLang.copiedone
                }
			}
		},
		dom: 'Bfrtip',
		buttons: [
			{
				'extend': 'pdfHtml5',
				'text': messagesLang.pdf,
				'title': messagesLang.mobsy_corporation_contracts_report,
				'tag': 'button',
				'className': 'btn btn-primary btn-round text-primary btn-sm',
				customize: function (doc) {
					doc.content.splice(1, 0, {
						margin: [100, -45, 0, 20],
						image: 'data:image/png;base64,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',
						width: 50,
						height: 50
					});
				},
				'download': 'open'
			},
			{
				'extend': 'copy',
				'text': messagesLang.copy,
				'title': messagesLang.mobsy_corporation_contracts_report,
				'tag': 'button',
				'className': 'btn btn-primary btn-round text-primary btn-sm',
			},
			{
				'extend': 'csv',
				'text': messagesLang.csv,
				'title': messagesLang.mobsy_corporation_contracts_report,
				'tag': 'button',
				'className': 'btn btn-primary btn-round text-primary btn-sm',
			},
			{
				'extend': 'print',
				'text': messagesLang.print,
				'title': messagesLang.mobsy_corporation_contracts_report,
				'tag': 'button',
				'className': 'btn btn-primary btn-round text-primary btn-sm',
			}

		]
	});

	$('#all-payments-table').DataTable({
		"language": {
			"lengthMenu": messagesLang.lengthMenu,
			"zeroRecords": messagesLang.zeroRecords,
			"info": messagesLang.info,
			"infoEmpty": messagesLang.infoEmpty,
			"infoFiltered": messagesLang.infoFiltered,
			"sSearch": messagesLang.search,
			"oPaginate" : {
				"sFrist": messagesLang.first,
				"sLast": messagesLang.last,
				"sNext": messagesLang.next,
				"sPrevious": messagesLang.previous
			},
			buttons: {
				'copyTitle' : messagesLang.copytitle,
				'copySuccess': {
                    _: messagesLang.copiedrows,
                    1: messagesLang.copiedone
                }
			}
		},
		dom: 'Bfrtip',
		buttons: [
			{
				'extend': 'pdfHtml5',
				'text': messagesLang.pdf,
				'title': messagesLang.mobsy_corporation_payments_report,
				'tag': 'button',
				'className': 'btn btn-primary btn-round text-primary btn-sm',
				customize: function (doc) {
					doc.content.splice(1, 0, {
						margin: [90, -45, 0, 20],
						image: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAUMAAAE8CAYAAABaR9MTAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAHrZJREFUeNrsnXlwFOedsH894pAAwSAMCHyJjXGSzSaRD4gNcRDBt2Mjb+xs9qiyXJt/9i/LW1u72Xzftzjf1ia1W1tFUpWs48SOwAdnAAEGjLkGkDAGgQU2hxA2A7pGJxLoPqb3fUcjIQkJz2g0Mz3dz0M1PdPqbvW80/3o93vf7vc1TNMUAACnYyBDAABkCACADAEAkCEAADIEAECGAADIEAAAGQIAIEMAAGQIAIAMAQCQIQAAMgQAQIYAAMgQAAAZAgAgQwAAZAgAgAwBAJAhAAAyBABAhgAAyBAAABkCACBDAABkCACADAEAkCEAADIEAECGAADIEAAAGQIAIEMAAGQIAIAMAQCQIQAAMgQAQIYAAMgQAAAZAgAgQwAAZAgAgAwBAJAhAAAyBABAhgAAyBAAABkCACBDAABkCACADAEAkCEAADIEAECGAADIEAAAGQIAIENwEg3z5udKtyy32ccqTisrfZVv1xmMowggUqruvydnfLKx0tVMWUDi4qIIIBLK7vtKjilmHiUByBAcyxff/rMcvymIEJAhOJeSb85TESEiBGQIDubMn2fkmESEgAzByRR//e4cPxEhIENwMkVfvYvUGGwLt9ZASHx0z505SS4jL2kU2078+0dk4lM/jOj3X3shd8R9R0JPyefSXVDJFwzIEL6cw1+5IyfJMEYdEbpmp8u47zwT4VEML8Ok9DkR7dVf5eMLBtJk+HL2z7s9x+8nNQZkCA5m911zuY8QkCE4mx13pPNkCSBDcDb5c2cTEQIyBGezMX0mESEgQ3A2a2fOyDFNRAjIEBzM2zOmkxoDMgRn80f3tByT22cAGYKTeSM1lWeNAZChs/ltymTqCAGQobP5dXIyrcYAyNDZ/Pe4Cdl+IkIAZAiSSREAIEMAgJugCy+IOv5qn3R/vCMq++7xVUW0vXmthS8IkCHEho63DgemaO0bgDQZAAAZAgAgQwAAZAgAgAwBAKIArckQdcY/PV/GZUZ2n3fbLzYOuzzlZy9GtN/u4mLp2lk6/MXxPX+Gf/dtr1mwSL2uJ+pWcWYhQ0i0k0yJMOUffhEdGUa639d/NqIMk+72Z6jZCgsWqUdNyJA0GQAAGQIAIEMAAGQIABBFaEABCCd6SFsuMmFmyOubDR+K2XnlxvbpPxGZ+2zo25f8UsyWoxQ8MgSwGFqEKXPCsGfK4PfJ6SIzF4e8ufGFW0xKnTQZAAAZAgAgQwAAZAgAgAwBAJAhAAAyhFjwwYd7s6c+nrmEkgAYDPcZOoBdu/dkq9lywzD03J08Z460yCkKBgAZ2p8du3ZnKvm9pF7mqLmbEgFAho7h/Z27tfSyDUNeUfNMqxyX7otwpP4II6Xhzvl88YAMoZftOz7QUaAWYCANpkSih37W+KZH7G61fmfZ4Pe+jWI0FoW+ffMJCh0ZwpdLcFeOSCAVzjJNU5QQKZRoy3BApwuj2r69JDABMoQI2fb+zmAqbOju6DMk8Bg/EgRAhg5h6/YdWoK5wXSYVBgAGTqL/G19EhQkCIAMnceWre/bJhLUQ4WOv+++iPbR+h8bhl2eVlYa0X716HjhtHS77t8aVn+E8vHfib/xgxvbu58Umb4g5M3Nqg3UMcYInkCxpAi3v6Zml6R3mEqiQRiEP2mOu7yikvOCyNC+bM7flnOjYQRgeLom/IW+h/RSRWXVr9X8V7fPndNIqRAZ2oJNW7ZlKREeUC/zECGEiDuYOXxSWeXLoTiIDBNdgvqEXqkmTmYYLfqPZ54Sor7f9NW5c9KLKRIiw4TiT5u35kpvvSAihLEgS0eJVb7qlWqiPpHI0Pps3JSvH53T6XAmT41AFNB/ZLN91TWvps+elU9xIEPLsWHTFrchhj5RVyBBiEHqvEUJMV+dZS/Pnj2LBhbSZMuIMJDCSG+FN0Cs0B13XKqursmlKJBh/EX4p826geSA0EoM8SHQSFdTU7tFTdQlkibHnvUbN2eqTDhQN0hpgEWixKya2rqXZ828jbpEIsOYiTA3mBYjQrBalLhFCTGvtq6eKJHIMHqs27ApcLIZhpFFadgT/8nlkW2vn1Me8KxynMjRf6iVEF+eedsM7kskMhxb1q7/kxagvm8QEUIioLOWT+rq63MoCmQ4liLUafEBoVMFSDzylBD15PhzlzQ5Atas36hPoDxDAkNwAiQquoOQzPqGhudnpKV5kSGEK0KdZtBaHAI9V2qktz1p7NH9EUZCd3F4VWautOUiE2aGvL4eQGrguCmu9J+IzH029O1Lfilmy9GYpc1BIXqQIYQmwnUbssQwtpAWh4b/s6bAFBUZRmkI0hHRIkyZE4Y9h4ykl5weVuewxhfuwCg3MUI/JXWgoeHqq2lp03/ltPOUOsPwRZgjun7QNBEh2JWVSoh5yBBG5L21G/JMU/IoCXAAOVevNh5Qk2P+6JMmh8C7a9a7DcOg30FwGlk6C7ra2LR0unua7Tt7QIYhiFCfEKZpZsazp5n2TkMOl+mva/Ax3HRIwx7j4GUpKQ+KLEtRq7oCvee41NQ/d6lJ/XO5en828OeB167g6wHr6GVzWxvl0Y8+4oSxH4EhBoJCtPUN2sjwFrzz3jodER6QOLcYt3eK/PRkklxuTxqbHU5YJPK1RWN6jH+Tck4eFWRoUwIBQWNT01L3NPsKERmOLEItQN1inBHvY8k/75LLra6EreFN+dmLkvIPv4hoHw13zh92+aT/86OI9tv1ySfStbOUEz50Ib6shGjLjh5oQBlWhGu1CC3R7dZHl1yyvoavCSwjxC1N167lIENniTDurWgXfC75rxKTLwWsRp4dhYgMB/D2u2ssI8KaRpGfnurmSwHLCvHateu2EiJ1hhYUYVuHyOuf9Ij0JIl8WZvJ5AmyKHViyPs+cl3tvKXzxoIJSbIobVLI25d1dEvZ1TZOGOgTokydmroKGdqE1e+s0b1SW6bXmbc+6pZTzSGIUPH/vjFL/v+Pvxryvv9tXYn8+7Hy/vdahIX/vDDk7fecrJXH3z3t2HNFP2t80yN2t1q/s2zwe99GMRqLQt+++YTlhXj9erOkpk5JeCE6XoZahGKh7rc2H+2R/Y1GSCKEOMhwQKcLo9q+vSQw2S1CtIMQHV1nqEQYaB2zigg//ULk3YoejAOJyEolxITuwcmxMlz19ntu0zQtM2pdTYPIayc6uKQgUXHrqqbm5sQVoiPTZC3CYGpsiS+u6bopP92nGyXIja2OMfkhMcaHnkjoOj+zu/bG9uNmqqsuLYy0vEzE35owQtTXlRLifVOmTPEiwwTAFHOlIYYlRNjebkqep1Waul3U4CaCDL/6r+H1R/jx34k5YAAoY8oDItMXhP4LqzYkWh2jW/f12dzSsnTK5MkJ1bmD49LkvLff1V1w5VjlePYca5eCa9xYDbair1EyoXCUDJUIc6wkwsITHbLa28WlA7YUYktra0L1/ekYGeatfidLTNMyX86Z813yxul2LhmwMzlKiK8hQ2uJsK8HGktQV+eXNR83c6mAE1ihhJgQo0faXoZ/XPVOYDhPsci9hO3tflm9u0kaOrlKwDHktba1Wf6WGye0X+pxSzLj2En1IN7Jb5KyZlMkaWwOaN+VJpF1JeGtPwD9rPK/hbF9WWP4qb0ejjPSIT1HQvdHGAm9w5hClHEHhbh0UkqKZVuYbS1DFRW+pmaWCdE/UBFhaX23KvWxu5/wiO96YBo1LZ2DnlWOirB2lkatA1U6Zk0Y+sYZf540Oca8lfd2lmmaK6xyPOc+65BD52kwAUeT3dbWnosMYyvCvmeOLUHF5S5Zt/sqlwKAyEolREvWH9o1MrRM5wtNV3tk7ZY6LgGAAddne3uH5cZjtl2d4Zt/XJ1rGEaWVY4nf3OdtHWYqqSj1IITaeeuanvdJ2Ko6AaUVRccLPdr58Na3ewa3F5gdjeK0VYV+g78tuxIN0MsWH9oKxkqEerwe6WVjqm8WjeYRC8A1yJ89K5poW9wpUmODJCh3j6czmF1565OlqH/4r9EtL3ZfDQwgWSr6DA3OXnir5DhmItwlQq7jTzOMesx8e8fkYlP/TCygOyF3BH3HQk9JZ9Ld0ElX1J8WNHR0Zk/ceIELzIc44IVi3TJBYNxzU6Xcd95JsK9DC/DpPQ5kUV6VT6+oPjR90DEUkucpzaJCrNGvFoAwMpkqejQEtduwkeGf3grz20YpMcQo+gh/Sciyekhr68HgBrYH6GR/FU1zQt9+yGdw9qUlZ2dXfkTJoyPa7pshzRZp8cZXKYQE+Y+G17nro1FQ2Q4L7zOXdsvidhfhmKFdDmh02QVFWaSHgPYI11W0WFcr+VErzMkPQawDyu6urvjdjN2wsrw92/m6b8itB4D2Ad3PAOchJShEqEutBWcOwC2I1tFh1nIMHRWikWePQaAMScu0WHCtSarqFD/1cjhfOnlSENr7/PGodLVc9P2i//rWMibl3V0U+gQbTJUdJg7fty4mD6ql3Ay1H0UGlbpttoKdPb0ThFsH1HnsADRSFkNY0VPT8+qpKSkmPWMnVBp8ht/+KOOCLM4VQBsT8zbBRKtzpBGEwDnkKuiwwzS5CH87g9vvWaIkcH5MZhF6amyLIwuvPSAUIPS4glJsihtUsjb6zrDsqttFDzEBMMwdGNpTPo9TAgZKhHqkPkVTo2b0SIMpz9CPZLeIBmOTwqrP8QrunNXJ8uwcrtIw/GQVzf143RD3hvhjADR3eD0Uzzb7/dnuVwuz3A/XPDgggzTb2o3/LzoZFFE9YuJEhnmCrfSJCz+ap90f7wjKvvu8VVFtL15rSW8z+J7M7Lf114y6FllCAldPTZIhgsXLMwIDviWbbiMpceLjkfc0GJ5GRIVJj4dbx0OTNHaN9ierL7o8KGFD2X4Tb+WYI5KoRuVELUIi8filyRCAwpRIYDD+fySd8XD33lY34yt6x1y1KQjwTEToeUjw9/9/k23GAZRIYBDqaisktVvvys7tuZnDfnR88eOHysey99l9TQ5V0xTC5GzAiyB657/FJn6tZDXN0t+KWbLjQGgAp3D6j4RR7m9kyT4zrvvyY5tW2/+DgzXq0ePHfWM9e+0rAwDUSF1hWA1tAjD6dz1C7eYAxfoXrIj2d7mlF78XLZsyZed27eNtMoqJcKoPKZn5cgwW6grBHAExadPy3vvrZGTx4/rR25HXE1Nr0brGKwsQ542AbA5BUc+ku3btsvJoltKsI+XVVQYtWeVLSnD1994M0fNMqgqtAfjn54v4++7L6J9tP7HhmGXp5WVRrTfttd/Jm2/2MiXFGM+3LtP1q1dKxXlZWL6v7wiwHAZrx756EhxNI/JqpHhS5wuAPaipaVV8rdukwP790tlRXkokWAfHiXCqHfnZTkZqqhQd+WfxakTGvpZY/2IXVjrD6SrR/YOXXYL6M8QwqWmpla2bd8h+/ftlWtNjeFIsD89jsVxWjEypAU5DPRzxhH1R0h/hhAlTn96Rg4c8Mi+PR8qAfpHu5ufq6jQ6zgZ/s/v/qAHhM/mNAJI4Gxlv0d27dwlF0svjCYKHIhX+SBmvV1bLTLkdhqABKSltVXe37FTDnoOiq+qMlIJ9keFhUcKY9bTtdVkSIoMkEBcunxZdu78QDz79wUEOEYSFMNweQsKD6+K5WexjAxViqwbThgHOUzunJ4iy2ZODj2FqW0Z1Dmr3v6tZ+aHvP3psuvyTwcvUfAO54DnsBQcPiyffXp6zAQ4NCqM9WeyUmTI7TSjkeHEcXKXOzn09a91SNmQ7R+7fyYFGSL6WWH9iFzI6zefGPzet1GMxqJRbx9Pamrr5NChXglW+3zRkqAm5lGh1WSYw6UGlpdhy9GInhVOxM5dz547LwUFBXLwwIHez2BG/Wnpn8fjc1pChr99/ffZhmHQcAJgEVrb2uTQ4QLZu2dPIAqMIbrBJN+xMlQs5/QDsEAUeL5ECgsLpeDQoVhEgMORr1Lkxnj8YqvIkHsLAeIVBba2SUHhEdm3d5/U1lTH+3B+Ha9fHHcZ6hRZLHRvYWVl7wBDKm2XqsrKwHxYBiyeOnWqTJmSGlg3NTVVpk2bxhVmUwKds6bMCXl9s2rDoDpCl/tJkekLRr39WHK+5IIcOfKRHCksiFcUOBTv4YJDxfH65VaIDGOaInd2dEpDQ4NcvdogzdevS11trbR3dIivsiKkEyKUHjY0M2bOlGlut8y/a67a7yRp6U6Vz68jSYgvdfX1AQF+fPSo1Kpz3yIS7E+R4/nLrSDDqKbIPp9Pqqt90lBXr778GmlUIvSP/jnJkKlXJ5qeRG50MaVVmD53vkyclC5dxiy50jVDTpmTuEIhumlwW5sUnzotH398TErOn+v9o25asv/s1Y6V4W9ff0OJcGxbkWtqqpX8qqWqokLKLl+23JfuqyztF6Qu/KfvuFfJ8W6pd90ph/z2vN+v50qN+v+TqOxb90cYCd3FxWJXLlwolaNKgJ+ePi0tLc1WP9zGeKbIVogMl0S6g+bmlkDEV3b5ipSXX5H21raEOmGryy/o0zbw+pEp0+S2u+6X6vH3yhGZbZuL0v9ZU2CKigzpmHVwRlLfIAc8B+Wzzz4NZCZm4gyg4on3AcRbhqNKkVtaWqSivFwuXiyV2mqfVUP+8NOZ5ia5clbf2HpAHpt1hyTfvkC2J92r3k/lKodbCvD0p5/JiaIiKbty2cpp8K046FgZqhQ5Q80yQl2/q7NLKisr5POLF6WyvDyS/tESgoaacpXzl8sD6vWd33pUvFO/IcWuuTetF2l/hnpb4x/3YZQEo629XT5VAjxz5kwgDZbEDwjiXl8Rz8gwpKiwrrZOLl26JBfOn7NNBBguZaf3SpLslefufUDqZy2UwnEZ2MCBXO+cIUXVD0hRWZqcLPm/iRoBDsuhwwcdnSaPWF/Y1dUpVy5fkfPnzkpTYyNXQZCKCydE1PRY+l3SOv8HUph0N4ViewGmyvGyx+WTsilSdKEluPSq3T6m1woHEU8ZZg1d0NraKufOnpWLpSUh38/nRK7WlKkU+nV5bv79cnn2I3LKNYdCsZMAW005frFbRX8NcuLMbX1Xh50/snNl+Jv/eSPTMG48dVJfXydnz5wZyx5yHUFl6UmZcPETyf76YsmfoQJtI5VCSVB8jUqApR1y8lytnPv8xlNQDsES9zfFKzIMRIVlZeVSWlIiDQ11SDCS9PlcoSyZckZSv7ZM3k95kAJJEL6oVgIsaZGT52vkckWdk4uiyQoHERcZXrhQstx76ZI0X7+GBMeI1uZGaT+xRZ6YdVx892STOkcJv+/N0ae/nTPk7Pl2OVH2mZRU9EjN1fb+nzkoCrQsMZXho48+rluQVyoBZtj91ph40VhTLsk1v5HlmU/L1skPqKssmUKJZ/R37VtytvYOOe+bKEUlzUHxtVAwTk2TH3vsCZ0WrxAGh48Z1ad2ydIpRyTpG9myd9x8CiRGBKK/hm9K0RW3lJR390Z/Rpf6SReFc4u/4baX4RNPPKUiQDMPCcaHtuYmMY6/LU/ddrt0zVuGFKMovzO+qSr1Fbns62v1baZwSJNFnnzyabeSoI4EcyliC/zZrVNXaR1SHCv5nVHyO6vkd17Lr6ov5W0JpsDU/SHDIE899UxuMCVmTBOL0VRfKVL/jiybPE0mzc+S7RPv5XacL8HX+mdytu4r4q1PlvOVhlyqaJZe3zUjv7FDDxHssY0Mn376BzoVXimMfWz99LmlSdpPbZfF6vWsed+S62nflL1Jdzq+saVl9jgpz5ghF6bOkHJXipSVGVJT0i2G9PRHfhAVLBE4RSzDH/zgOVLiBKbm0mkxvJ/Kd7UY5y+U61Pnyx7XbNtHjFp8ZX3iM1KkvNOQ6pYuEb/66E062uvh5CBNDp1nn12ub5XJIyW2iRhLj6m077g8ol7PmHuPyPR5Upd8uxQY0xNWjs2zVLQ3b4bUp0yWsgmTpcKcKN7rXdLSbfb6LvCYbxfpbnz5dsLK8Lnnst3BVmJGtbMpDb7PRdTkUq+/p6ZpM+bKBPft0pUyWxrG3yZfGJOl0kizxLHW3jNJ6tKmSP2kyVI/LlnqjQlS7x8nl5u7pbmrp/euli4J1vV1BLZBfqTJQzHCfQLkueXPZ4sSodou8AH09n3Trd73vb6xzH/TskFz/+D3N7/2D798SAcPw32+kcZAGcsBoaL6pbluXMgDL2qX4bpp+UjrGsOsO9J2g5YPWTd1+hyZMCVNZowXeaDzi8Dyr7fc6FXlLm+DTKnpDvsznls4a9D7ktQb4r2gx41Rh1Hb7pfq5o5hj3/Aglt+zpB+JsZIu7zlfobdYIR1Qlk23LXQv2yk66jvx2Le+nobZj9ftu7w1/VIP/OPvI66pg4dPmgkjAyzn/9hIBpUk5bhl8pvDGToVTPvKGSYIQM6jUWG0ZVhqPuL9PVot0GGiSFDxTwlRK/l0+Tn//KFLDXbMkbhrH70pjE4bxrwXjyeA56x/oAPLXwoa0Aorlu6pwXnfe8BIP7oa9HaMvzLH76ob5cZTUuxJ/jhLve93rv3w5h/2KPHjg4U7E3jsi5csLAvktTS/HbwNZIEiL0M4zpu8ohp8gsv/ChD/WiLCmozB6a+gfVvToOL1aSlc0q/3rVrR8KPv7jgwQVZwS9oSVCUbtJk0mTS5KilycUqTb7PcjJ88cW/yu6tHxS3LsRhZOhRcz2alWf79q0ecQBKjoHoUX1xywfKERkiQ2Q4JjLU76cfLjjUaBkZ/uhHP35N30Tde9C9hahe64YMLcCtWoBb8zc7fmCSB+9/UEeN+tai5bFOq5EhMrSpDF9WMlwVdxn+1Y//RrcWb1FHlHUj9ZWt6lX+5k0biwVuJcaMoBhfioUYkSEytKkMVykZvhxXGf74r/820+y7d9A089X81xs3rveiOWuKERkiQ5vKsFHJcHrcZKhEqPscfEWnwOvXrfGgszEX4ytqyhnLOkZkiAxtKkM9i1uqbDAGSczEmBOMFrOQITJEhiPK0KNkuBQZOidaXBGMFpEhMkSG/pu2mVdQeDjm1XQu9BRbik4WedWkK4l13cjPxSLjPwBYiFeIDJ0ZKbqDUaI+ATKIDIkMiQxNHSDo6DCmgQKRYfwjxUY1/UpN89RbHTF6KRVwODpAiHln0cjQWmJcpWb3kT4DyCuLFy2O6VNeyNCakeJrOk0IShHAcai0OubRIXWGFifY+qx7DurvVZw6Q+oMbV5n2Ld+oO6w8EhhTLIkIkPrR4q69fl59VLfe+WlRMBB6EeEV5Imw1ApeoKNLNQnglPQf/xPkSbDiAS7E9MDcmWRJpMm2yxNbtQdNqj56oLCwzHtIAYZJrYUs9UF0z9UKzJEhgkqQ53p6A5ith4uOBS33q6RYYKzcMFCdzBKzEaGyDCRZBgU4OqDBz35VriWkKF9pKhl2B8lIkNkaFEZavFt1XOP54Cl6r6RoY14aOFD/VEiMkSGFpKhigD9upf8/P3791m28Q8Z2lOKWcG6xAxkiAzjIcO+OkAdAe7btych7n5Ahjbm4e88nKuktmJo6owMkWGUZNifAu/Zszvhbv9ChjZn0cOLtAi1EHORITIcYxn2twLv3r0rP9GvFWToHClmqIurv1NZZIgMRylDb18EuGvXDo+drhFk6DAWL1qcoSNFJa8cZIgMQ5Shpy/93bnzfa9drw1k6FC+u/iRjGD6nIMMkeGQ/XgHCNDz/vvbHPH4JzJEijp97h/BDxk6VoYB+akXnm3b8h05TjoyhACPfPd7WoTZwWgxAxnaXoZaeB41P7g1f3M+VwAyhGH43iNLspQMX5IBI/ghw4SXobdPfmqev2Xzn+j5CBlCqCxZkqVvy8kOptGZyDChZBiUn2j5eTZt2uDljEaGMAZkZS3NCIrxpeHFiAzjLEOP+r84GPl5Nm5cT+SHDCHaLF36/T4xLteeRIYxl6E3WOd3UM83rF/r4axEhhBnvv/9ZTqVzlIy7BNjBjIcUxnqCC8gvmDk51m39j2iPmQIVmfZsse0DLUUl/RK0shAhiHLUEvPK71d3XvUsuK1a95FfMgQ7MBjjz2hZajrGDPVxb0k+NrtcBkOlF7g9fp1a4o5W5AhOIzHH38yIxgx6gjy7gGv7SRDT3B+UC3sS3W9G9av9XIGIEOAW/Lkk0/riDEQOQYjyWlyo+W6b3m8ZehVP+4TWrFat0lu1OvJxo3rPXyTyBAgJjzzzLMDRwXsE+jNIhsg0yE/a1SvT91ChsUyYDhWJcPiTZs2UHeHDAEAkCEAADIEAECGAADIEAAAGQIAIEMAAGQIAIAMAQCQIQAAMgQAQIbIEAAAGQIAIEMAAGQIAIAMAQCQIQAAMgQAQIYAAMgQAAAZAgAgQwAAZAgAgAwBAJAhAAAyBABAhgAAyBAAABkCACBDAABkCACADAEAkCEAADIEAECGAADIEAAAGQIAIEMAAGQIAIAMAQCQIQAAMgQAQIYAAMgQAAAZAgAgQwAAZAgAgAwBAJAhAAAyBABAhgAAyBAAABkCACBDAABkCACADAEAkCEAgFX4XwEGAA0WQq63WkRmAAAAAElFTkSuQmCC',
						width: 50,
						height: 50
					});
				},
				'download': 'open'
			},
			{
				'extend': 'copy',
				'text': messagesLang.copy,
				'title': messagesLang.mobsy_corporation_payments_report,
				'tag': 'button',
				'className': 'btn btn-primary btn-round text-primary btn-sm',
			},
			{
				'extend': 'csv',
				'text': messagesLang.csv,
				'title': messagesLang.mobsy_corporation_payments_report,
				'tag': 'button',
				'className': 'btn btn-primary btn-round text-primary btn-sm',
			},
			{
				'extend': 'print',
				'text': messagesLang.print,
				'title': messagesLang.mobsy_corporation_payments_report,
				'tag': 'button',
				'className': 'btn btn-primary btn-round text-primary btn-sm',
			}

		]
	});

	// $.fn.dataTable.ext.search.push(
	// 	function (settings, data, dataIndex) {
	// 		var min = $('input.min.form-control').datepicker('getDate');
	// 		var max = $('input.max.form-control').datepicker('getDate');
	// 		var startDate = new Date(data[4]);
	// 		return true;
	// 		console.log("min", min, "max", max, "startDate", startDate);
	// 		if (min == null && max == null) return true;
	// 		if (min == null && startDate <= max) return true;
	// 		if (max == null && startDate >= min) return true;
	// 		if (startDate <= max && startDate >= min) return true;
	// 		return false;
	// 	}
	// );

	// $('input.min.form-control').datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
	// $('input.max.form-control').datepicker({ onSelect: function () { table.draw(); }, changeMonth: true, changeYear: true });
	// var table = $('#all-payments-table').DataTable();

	// // Event listener to the two range filtering inputs to redraw on input
	// $('input.min.form-control, input.max.form-control').change(function () {
	// 	table.draw();
	// });
});

// =========== Loan form toggle for notification ==========
function email(x) {
	x.classList.toggle("fa-toggle-on");
	x.classList.toggle("email");
}
function sim1(x) {
	x.classList.toggle("fa-toggle-on");
	x.classList.toggle("sim1");
}

function phone(x) {
	x.classList.toggle("fa-toggle-on");
	x.classList.toggle("phone");
}

function sim2(x) {
	x.classList.toggle("fa-toggle-on");
	x.classList.toggle("sim2");
}
function business_add(x) {
	x.classList.toggle("fa-toggle-on");
	x.classList.toggle("bz-add");
}

// ============ Check toggle notification for business address ================
$(document).on('click', '#c-add', function () {
	var toggle_add = $('#c-add').hasClass('bz-add');
	var c_address = $('.address').val();

	if (toggle_add) {
		if (!c_address) {
			showNotification(
				messagesLang.no_current_address_found_please_provide_client_address,
				"info",
				"warning"
			);
		} else {
			// Add transition for hiding and showing div
			$('.bs').slideUp('1000', function () {
				$(this).hide();
			});

			$('.c-add').slideDown('1000', function () {
				$(this).show();
			});

		}

	} else {
		// Add transition for hiding and showing div
		$('.c-add').slideUp('1000', function () {
			$(this).hide();
		});

		$('.bs').slideDown('1000', function () {
			$(this).show();
		});
	}
});
// ========== Adding another co-maker section ===========
var count = 1;
$(document).on('click', '#add_co-maker', function () {
	count += 1;

	var html_code = '';
	html_code += '<div class="row to-remove' + count + '"><div class="col-md-6"><div class="form-group"><label class="bmd-label-floating">'+ messagesLang.fullname +'</label>';
	html_code += '<input type="text" id="c-name' + count + '" class="form-control comaker-name" name="comaker-name" required></div></div>';
	html_code += '<div class="col-md-6">';
	html_code += '<button type="button" class="btn btn-social btn-just-icon btn-round btn-danger remove_co-maker" id="' + count + '" rel="tooltip" title="'+ messagesLang.remove_co_maker +'">';
	html_code += '<i class="fa fa-minus"></i></button></div></div>';
	html_code += '<div class="row to-remove' + count + '"><div class="col-md-4"><div class="form-group"><label class="bmd-label-floating">'+ messagesLang.residence_certificate_no +'</label>';
	html_code += '<input type="text" class="form-control cedula" name="cedula" id="cedula' + count + '" required></div></div>';
	html_code += '<div class="col-md-4"><div class="form-group"><label class="bmd-label-floating">'+ messagesLang.date_issued +'</label>';
	html_code += '<input type="date" class="form-control date_issued" name="date_issued" id="c-date' + count + '" required></div></div>'
	html_code += '<div class="col-md-4"><div class="form-group"><label class="bmd-label-floating">'+ messagesLang.where_issued +'</label>';
	html_code += '<input type="text" class="form-control where_issued" name="where_issued" id="c-place' + count + '" required></div></div></div>';

	$('.co-maker-section').append(html_code);

});

//  ============= Removing co-maker section =============
$(document).on('click', '.remove_co-maker', function () {
	var div_id = $(this).attr('id');
	$('.to-remove' + div_id).slideUp('1000', function () {
		$(this).remove();
	});
});

$(document).on('click', '.add_penalty', function () {

	$('.pnalty').slideUp('1000', function () {
		$(this).show();
	});
	$('.pay').hide();
});
$(document).on('click', '.norm_payment', function () {

	$('.pnalty').slideDown('1000', function () {
		$(this).hide();
	});
	$('.pay').show();
});



$(document).on('click', '.add_c_penalty', function () {

	$('.c_pnalty').slideUp('1000', function () {
		$(this).show();
	});
	$('.c_pay').hide();
});
$(document).on('click', '.norm_c_payment', function () {

	$('.c_pnalty').slideDown('1000', function () {
		$(this).hide();
	});
	$('.c_pay').show();
});

$(document).on('click', '.edit_task', function () {
	var id = $(this).attr('id');
	$('.task' + id).slideDown('1000', function () {
		$(this).hide();
	});
	$('.cancel_task' + id).show();
});

$(document).on('click', '.cancel_task', function () {
	var id = $(this).attr('id');
	$('.cancel_task' + id).slideDown('1000', function () {
		$(this).hide();
	});
	$('.task' + id).show();
});
