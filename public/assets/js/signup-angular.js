angular.module("AppSignup",[])
	.controller("getstates", function ($scope,$http){

		// selectsistemaid = $("#selectsistema option:selected").val();
		
		$("#state_select").change(function(event) {
			var id = $(this).val();
			
			
			if (id != '')
			{
				$('#select_municipalities').empty();
				$http.get('/states/ajax/'+id)
				.success(function (data){
					console.log(data)
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



