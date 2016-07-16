angular.module("angularFront",[])
	  .value('server', 'http://vzlatraders.local')

//  Calling Form Folder Principal index 
		.controller("Publication_Controller_Create_Edit_GetStates", function ($scope,$http){


		
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

	})
// End Calling Form Folder Principal index 


// Calling Form Publication Show 

	.controller("Modal_Edit_Proposer_Controller",function ($scope,$http){
		$scope.getProposal = function(id_proposal){
			
			$http.get('/proposals/edit/'+id_proposal)
				.success(function (data){
					
					var imgPath="/uploads/images/publications/user_"+data.publication.user_id+"/proposals/"+data.picture;
					
		    		$('#description_proposal').val(data.description);
		    		
		    		$('<img src="'+ imgPath +'">').load(function() {

					  $(this).addClass("img-responsive").width('100%').height("500px").appendTo('#target_edit_proposal');
					});
					
					$('#modaleditproposal').modal();
					$('#form_edit_proposal').attr('action', '/proposals/update/'+data.id);

				})
				.error(function (err){

				});
		}
		$scope.onFileLoad = function(element){
			$scope.$apply(function(scope) {
		         var photofile = element.files[0];
		         var reader = new FileReader();
		         reader.onload = function(e) {
		         	var img = new Image();
		         	 img.setAttribute("class", "img-responsive");
					 img.setAttribute("width", "100%");
					 img.setAttribute("height", "500px");
 					 img.src = e.target.result;
 					 $('#target_edit_proposal').html(img);
		         };
		         reader.readAsDataURL(photofile);
		     });

		}
		$scope.submit =function(){
			$('#form_edit_proposal').submit();
		}
		
	})
	.controller("Modal_New_Proposer_Controller",function ($scope,$http){
		$scope.openNewModal = function(publication_id){
			
			$('#form_new_proposal').attr('action', '/proposals/store/'+publication_id)	
		}
		$scope.onFileLoad = function(element){
			$scope.$apply(function(scope) {
		         var photofile = element.files[0];
		         var reader = new FileReader();
		         reader.onload = function(e) {
		         	var img = new Image();
		         	 img.setAttribute("class", "img-responsive");
					 img.setAttribute("width", "100%");
					 img.setAttribute("height", "500px");
 					 img.src = e.target.result;
 					 $('#target_edit_proposal').html(img);
		         };
		         reader.readAsDataURL(photofile);
		     });
		}
		$scope.submit =function(){
			$('#form_new_proposal').submit();
		}
		
	})
	.controller("OpenImageController", function ($scope,$http,server){
		$scope.openImage = function(imgID){
			
			imgPath = $('#'+imgID).attr('src');
			$('<img src="'+ imgPath +'">').load(function() {
					
					  $(this).width('100%').height(500).appendTo('#targetViewImage');
			});
			$('#modalImage').modal();
				
		}
	})
	.controller("Modal_Comment_Controller", function ($scope,$http,server){
		
		
	})
	 img = new Image();
	
	$('#modalcomment').on('hidden.bs.modal', function () {
		 $('#text_comment_modal').val('');
	})
	$('#modalImage').on('hidden.bs.modal', function () {
		
		 $('#targetViewImage').html(img);
	})
	$('#modaleditproposal').on('hidden.bs.modal', function () {
		$('#target_edit_proposal').html(img);
		$('#description_proposal').val('');
		$('#file_picture').val('');

	})
	$('#modalproposal').on('hidden.bs.modal', function () {
		$('#target_new_proposal').html(img);
	})


// End Calling Form Publication Show 