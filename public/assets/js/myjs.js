

$(document).ready(function(){

	// $("#state_select").change(function() {
	//       $( "#state_form" ).submit();
	// 	// alert($(this).val());
	// });
	$('.picture, .photo').on('change', function(event) {
		var files = event.target.files;
		var image = files[0]
		var reader = new FileReader();
		
		reader.onload = function(file) {
		  var img = new Image();
		  console.log(file);
		  img.src = file.target.result;
		  img.setAttribute("class", "img-responsive");
		  $('#target').html(img);
		}
		
		reader.readAsDataURL(image);
		console.log(files);
	});

	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
	
})
