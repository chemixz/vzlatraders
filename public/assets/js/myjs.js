

$(document).ready(function(){


	$('.picture , .photo').on('change', function(event) {
		var files = event.target.files;
		var image = files[0]
		var reader = new FileReader();
		
		reader.onload = function(file) {
		  var img = new Image();
		   console.log(file);
		  img.src = file.target.result;
		  img.setAttribute("class", "img-responsive");
		  img.setAttribute("width", "100%");
		  img.setAttribute("height", "500px");
		  $('#target').html(img);
		  $('#target_new_proposal').html(img);
	
		}
		
		reader.readAsDataURL(image);
		console.log(files);
	});

	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})

	
})
