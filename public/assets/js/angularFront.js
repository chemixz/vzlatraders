angular.module("angularFront",[])
	  .value('server', 'http://vzlatraders.local')

//  Calling Form  Publication edit and create  
	.controller("Publication_Create_Edit_Controller", function ($scope,$http){
		$('#file_picture1').val('');
		$('#file_picture2').val('');
		$('#file_picture3').val('');

		
		$("#state_select").change(function(event) {
			var id = $(this).val();
			if (id != '')
			{
				$('#select_municipalities').empty();
				$http.get('/states/ajax/'+id)
				.success(function (data){
					// console.log(data)
					$.each(data, function(i,e) {
						
						var option = new Option(e.name, e.id);
						$('#select_municipalities').append($(option));
					
		    		});
		    		// $('#selectsistema').selectpicker()
				})
				.error(function (err){

				});
				
			}
			else
			{
				$('#select_municipalities').empty();
			};
		});

		$scope.onFileLoad = function(element ,id){
			$scope.$apply(function(scope) {
		         var photofile = element.files[0];
		         var reader = new FileReader();
		         reader.onload = function(e) {
		         	var img = new Image();
		         	 img.setAttribute("class", "img-responsive");
					 img.setAttribute("width", "100%");

					console.log(id);
 					 img.src = e.target.result;
 					 $('#target_create_'+id).html(img).addClass('height',"400px");
		         };
		         reader.readAsDataURL(photofile);
		     });

		}

	})
// End Calling Form Folder Principal index 


// Calling Form Publication Show 

	.controller("Publication_Show_Controller",function ($scope,$http){

		$scope.setCover = function(cover_id){
			imgSrc = $('#cover_picture_'+cover_id).attr('src');
			console.log(imgSrc);

			$('#cover').attr('src', imgSrc);

		}
		$scope.editProposal = function(id_proposal){
			
			$http.get('/proposals/edit/'+id_proposal)
				.success(function (data){
					console.log(data);
		    		
					// var imgPath="/uploads/images/publications/user_"+data.publication.user_id+"/proposals/"+data.picture;
		   			//  		$('<img src="'+ imgPath +'">').load(function() {
					//   $(this).addClass("img-responsive").width('100%').height("500px").appendTo('#target_edit_proposal');
					// });


		    		$('#description_proposal').val(data.description);
					imgSrc = $('#pro_image_'+id_proposal).attr('src');
					$('<img src="'+ imgSrc +'">').load(function() {
						$(this).addClass("img-responsive").width('100%').height('100%').appendTo('#target_proposal_img');
					});
					$('#form_proposal').attr('action', '/proposals/update/'+data.id);
							
					$('#modalproposal').modal();

				})
				.error(function (err){

				});
		}
		$scope.onFileLoad = function(element ,id){
			$scope.$apply(function(scope) {
		         var photofile = element.files[0];
		         var reader = new FileReader();
		         reader.onload = function(e) {
		         	var img = new Image();
		         	 img.setAttribute("class", "img-responsive");
					 img.setAttribute("width", "100%");
					console.log(id);
 					 img.src = e.target.result;
 					 $('#target_proposal_img').html(img);
		         };
		         reader.readAsDataURL(photofile);
		     });

		}
		$scope.newProposal = function(publication_id){
			$('#form_proposal').attr('action', '/proposals/store/'+publication_id);
			$('#modalproposal').modal();
		}
		$scope.submit =function(){
			$('#form_proposal').submit();
		}	
		// .controller("Exchange_Controller",function ($scope,$http){
		// 	$scope.acceptEx = function(id_proposal){
		// 		imgSrc = $('#pro_image_'+id_proposal).attr('src');

		// 		alert("Acepto"+imgSrc);


		// 		var form = $('<form/>', {action : '/exchanges/new/'+id_proposal, method : 'POST', enctype:'multipart/form-data'}).appendTo('#hiddenform');
		// 		form.append("<div class= 'appm'>Save this</div>");
		// 		form.append("<input type='file'  name='img_pro"+id_proposal+"' value='"+imgSrc+"' src='"+imgSrc+"' />");
		// 		form.append("<input type='text' placeholder='description' id='rdescription' name='routedescription' class= 'address'/>");
		// 		form.append("<input type='text' placeholder='tags' id='tags' name='routetags'  />");
		// 		form.append("<br/><input type='submit' id='savebutton' value='Save' />");
		

				
		// 	}	
		// 	//{{URL::to('/')}}/exchanges/new/{{$Pro->id}}
			
		// })

		$scope.openImage = function(id_proposal){
			
			imgSrc = $('#pro_image_'+id_proposal).attr('src');
			$('<img src="'+ imgSrc +'">').load(function() {
					  $(this).addClass("img-responsive").width('100%').height('100%').appendTo('#targetViewImage');
			});
			$('#modalImage').modal();
			console.log(imgSrc);
		}

		$scope.editComment = function(id_comment)
		{
			$http.get('/comments/edit/'+id_comment)
				.success(function (data){
					console.log(data);
						$('#text_comment_modal').val(data.comment);
						$('#form_comment').attr('action', '/comments/update/'+id_comment);
						$('#modalcomment').modal();
				})
				.error(function (err){

				});
		}
		$scope.newComment = function(id_publication)
		{
			$('#form_comment').attr('action', '/comments/store/'+id_publication);
			$('#modalcomment').modal();
		}
		$scope.submitcoment = function()
		{
			$('#form_comment').submit();
		}
		
	
		img = new Image();
		
		$('#modalcomment').on('hidden.bs.modal', function () {
			 $('#text_comment_modal').val('');
		})
		$('#modalImage').on('hidden.bs.modal', function () {
			
			 $('#targetViewImage').html(img);
		})
		$('#modalproposal').on('hidden.bs.modal', function () {
			$('#target_proposal_img').html(img);
			$('#file_picture').val('');
			$('#description_proposal').val('');
		})

	})
// End Calling Form Publication Show 

	.controller("Profile_Controller", function ($scope,$http){
			$("#state_select").change(function(event) {
			var id = $(this).val();
			if (id != '')
			{
				$('#select_municipalities').empty();
				$http.get('/states/ajax/'+id)
				.success(function (data){
					// console.log(data)
					$.each(data, function(i,e) {
						
						var option = new Option(e.name, e.id);
						$('#select_municipalities').append($(option));
					
		    		});
		    		// $('#selectsistema').selectpicker()
				})
				.error(function (err){

				});
				
			}
			else
			{
				$('#select_municipalities').empty();
			};
		});

		$scope.openGalleries = function(){
			alert("abriendo galeria");
			$('#modalgallery').modal();
		}
	})
