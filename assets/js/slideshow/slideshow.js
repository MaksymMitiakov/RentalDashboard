var slideIndex = 1;
showSlides(slideIndex);

// Next/previous controls
function plusSlides(n) {
	showSlides(slideIndex += n);
}

// Thumbnail image controls
function currentSlide(n) {
	showSlides(slideIndex = n);
}

function showSlides(n) {
	var i;
	var slides = document.getElementsByClassName("mySlides");
	var dots = document.getElementsByClassName("demo");
	var captionText = document.getElementById("caption");
	if(slides.length == 0)
		return;
	if (n > slides.length) {
		slideIndex = 1
	}
	if (n < 1) {
		slideIndex = slides.length
	}
	for (i = 0; i < slides.length; i++) {
		slides[i].style.display = "none";
	}
	for (i = 0; i < dots.length; i++) {
		dots[i].className = dots[i].className.replace(" active", "");
	}
	slides[slideIndex - 1].style.display = "block";
	dots[slideIndex - 1].className += " active";
	captionText.innerHTML = dots[slideIndex - 1].alt;
}

function MultiUploader(selector) {
	var uploaderSelf = this;
	this.selector = selector;
	this.container = $(selector);

	this.fileInputs = $(selector + " input[type=file]");
	this.aiIndex = $(selector + " #mainImages").children().length + 1;
	this.oriImages = [];
	for(let i = 0; i < $(selector + " #mainImages .mySlides").length; i++) {
		if($(selector + " #mainImages .mySlides[index=" + (i + 1) + "]").length > 0
		&& $(selector + " input[type=file][index=" + (i + 1) + "]").length == 0) {
			this.oriImages.push($(selector + " #mainImages .mySlides[index=" + (i + 1) + "] img").attr("ref"));
		}
	}
	if($("#oldImages"))
	{
		$("#oldImages").val(this.oriImages.join(":") + ":");
	}
	
	if($(selector + " #mainImages .mySlides[index=1]").length == 0)
		this.aiIndex = 1;

	$(selector + " .inputFileHidden").attr("index", this.aiIndex).attr("name", "home_img" + this.aiIndex);

	$(selector + " #tinyImages div.column img").click(function() {
		let index = $(this).parent().attr("index");
		currentSlide(index);
	});
	$(selector + " #mainImages div.mySlides div.image-area a").click(function() {
		let index = parseInt($(this).parent().parent().attr("index"));
		$(this).parent().parent().remove();
		$(uploaderSelf.selector + " div.column[index=" + index + "]").remove();
		uploaderSelf.oriImages.splice(index - 1, 1);
		if($("#oldImages"))
		{
			$("#oldImages").val(uploaderSelf.oriImages.join(":") + ":");
		}

		//	Reset index attributes
		let i;
		for(i = index + 1; i <= uploaderSelf.aiIndex - 1; i++) {
			$(uploaderSelf.selector + " div.mySlides[index=" + i + "]").attr("index", i - 1);
			$(uploaderSelf.selector + " div.column[index=" + i + "]").attr("index", i - 1);
			$(uploaderSelf.selector + " input[type=file][index=" + i + "]").attr("index", i - 1).attr("name", "home_img" + (i - 1));
		}
		$(uploaderSelf.selector + " input[type=file][index=" + i + "]").attr("index", i - 1).attr("name", "home_img" + (i - 1));
		uploaderSelf.aiIndex--;
		if(index == uploaderSelf.aiIndex) {
			index--;
		}
		if(index >= 1)
			currentSlide(index);

	console.log(uploaderSelf.oriImages);
		
	});

	//	Add Event Listener
	this.evt_InputFileVisibleClick = function() {
		$(selector + " .inputFileHidden").trigger('click');
	}

	this.evt_InputFileHiddenChange = function(evt) {
		if(this.aiIndex > 5)
		{
			alert("You can't add more than 5 imgaes");
			return;
		}

		var filename = $(this).val().replace(/C:\\fakepath\\/i, '');
		$(selector + " .inputFileVisible").val(filename);

		let obj = evt.target;
		obj.classList.remove("inputFileHidden");

		let url = URL.createObjectURL(obj.files[0]);

		if(uploaderSelf.aiIndex == 1) {
			$("#mainImages").empty();
			$("#tinyImages").empty();
		}

		$("#mainImages").append(
			$("<div>").addClass("mySlides").attr("index", uploaderSelf.aiIndex).append(
				$("<div>").addClass("image-area").append(
					$("<img>").css('width', '100%').css('height', 300).attr("src", url)
				).append(
					$("<a>").addClass("remove-image").attr("href", "#").css('display', 'inline').html("&#215;").click(function() {
						let index = parseInt($(this).parent().parent().attr("index"));
						$(this).parent().parent().remove();
						$(uploaderSelf.selector + " div.column[index=" + index + "]").remove();
						$(uploaderSelf.selector + " input[type=file][index=" + index + "]").remove();

						//	Reset index attributes
						let i;
						for(i = index + 1; i <= uploaderSelf.aiIndex - 1; i++) {
							$(uploaderSelf.selector + " div.mySlides[index=" + i + "]").attr("index", i - 1);
							$(uploaderSelf.selector + " div.column[index=" + i + "]").attr("index", i - 1);
							$(uploaderSelf.selector + " input[type=file][index=" + i + "]").attr("index", i - 1).attr("name", "home_img" + (i - 1));
						}
						$(uploaderSelf.selector + " input[type=file][index=" + i + "]").attr("index", i - 1).attr("name", "home_img" + (i - 1));
						uploaderSelf.aiIndex--;

						if(index == uploaderSelf.aiIndex) {
							index--;
						}
						if(index >= 1)
							currentSlide(index);
					})
				)
			)
		)

		$("#tinyImages").append(
			$("<div>").addClass("column").attr("index", uploaderSelf.aiIndex).append(
				$("<img>").addClass("demo").addClass("cursor").css('width', '100%').attr("src", url).click(function() {
					let index = $(this).parent().attr("index");console.log(index);
					currentSlide(index);
				})
			)
		);
		currentSlide(uploaderSelf.aiIndex);

		uploaderSelf.addNewEmptyInput();
	}

	$(selector + " .inputFileVisible").click(this.evt_InputFileVisibleClick);
	$(selector + " button").click(this.evt_InputFileVisibleClick);
	$(selector + " .inputFileHidden").change(this.evt_InputFileHiddenChange);
}

MultiUploader.prototype.addNewEmptyInput = function() {
	this.aiIndex++;
	$(this.selector + " .form-file-simple").append(
		$("<input>")
			.attr("type", "file")
			.addClass("inputFileHidden")
			.attr("name", "home_img" + this.aiIndex)
			.attr("accept", "image/*")
			.attr("index", this.aiIndex)
			.change(this.evt_InputFileHiddenChange)
	);
}

var multiUploader;
$(document).ready(function () {
	multiUploader = new MultiUploader(".image-gallery");
});
