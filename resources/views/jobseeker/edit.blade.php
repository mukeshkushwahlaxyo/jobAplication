<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Job Application Form') }}
        </h2>
    </x-slot>

	<div class="container mt-5">
		<div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-header">Update Job Application Form
							<a href="{{route('jobapplication.index')}}" class="btn btn-sm btn-primary pull-right"> Back</a>
					</div>
					<div class="card-body">
						<form action="{{route('jobapplication.update',$data->jobSeekerId)}}" method="post" autocomplete="off" id="example-form">
							@csrf
							@method('patch')
							@include('jobseeker.form')
							<div class="row">
								<div class="col-md-12 form-group">
									<button type="submit" class="btn btn-sm btn-success">Update</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			
	      $(document).on('focus', '.datepicker', function () {
	          $(this).datepicker();
	      });
			$('label.required, th.required').append('<strong class="text-danger"> *</strong>');

	        var row = "{{count($data->experiences)}}";
	        $('#addMore').on('click',function(e){
	            e.preventDefault();
	            var html = '<tr id="row'+row+'"><td class="error-di form-group"><input type="text" name="company[]" value="" class="form-control" placeholder="Enter company name"></td><td class="error-di form-group"><input type="text" name="designation[]" value="" class="form-control" placeholder="Enter designation"></td><td class="error-di form-group"><input type="text" name="from[]" value="" class="form-control datepicker" placeholder="Enter from date" data-date-format="yyyy-mm-dd"></td><td class="error-di form-group"><input type="text" name="to[]" value="" class="form-control datepicker" placeholder="Enter to date" data-date-format="yyyy-mm-dd"></td><td><a href="javascript:void(0)" class="btn btn-sm btn-danger removeBtn" id="'+row+'"><i class="fa fa-minus"></i></a></td></tr>';
	            $('#expBody').append(html);
	            row++;
	        });

	        $(document).on('click','.removeBtn',function(e){
	            e.preventDefault();
	            var rowId = $(this).attr('id');
	            $('#row'+rowId).remove(); 
	        });


	        $('.checkBoxChange').on('change',function(e){
	        	e.preventDefault();
	        	var id = $(this).val();
				if ($(this).prop('checked')==true){ 
				    $('.answer_'+id).removeAttr('disabled');
				}else{
				    $('.answer_'+id).prop( "checked", false );
				    $('.answer_'+id).attr('disabled',true);

				}
	        });
	          @if($message = Session::get('success'))
	  		alert("{{$message}}");
	 		 @endif 


	        var form = $("#example-form");

	        form.validate({   
	            rules: {    
	                'contact' :{
	                    minlength:10,
	                    maxlength:10,

	                },
	                'company[]':{
	                	experience:true,
	                },
	                'designation[]':{
						experience:true,
					},
					'from[]':{
						experience:true,
					},
					'to[]':{
						experience:true,
					}
	            },
	            errorElement: "em",
	            errorPlacement: function errorPlacement(error, element) { 
	                element.after(error);
	                error.addClass( "help-block" );

	             },
	            highlight: function ( element, errorClass, validClass ) {
	                $( element ).parents( ".error-div" ).addClass( "has-error" ).removeClass( "has-success" );
	            },
	            unhighlight: function (element, errorClass, validClass) {
	                $( element ).parents( ".error-div" ).addClass( "has-success" ).removeClass( "has-error" );
	            },
	        });                         

        	$.validator.addMethod("experience", function (value, element) {
		        var flag = true;
		       
		      	$("[name^=company], [name^=designation],[name^=from],[name^=to]").each(function (i, j) {

		      		$(this).parent('.error-di').find('em.error').remove();
		      		$(this).parent('.error-di').removeClass("has-error");
		            if ($.trim($(this).val()) == '') {
		                flag = false;        
		                 
		               	$(this).parent('.error-di').addClass('has-error').removeClass('has-success');
		               	$(this).parent('.error-di').append('<em class="error help-block">This field is required.</em>');             
		            }
		            else{
		            	flag = true;
		               
		            	$(this).parent('.error-di').addClass( "has-success" ).removeClass( "has-error" );
		            }
		      		
		        });
				$("[name^=to]").each(function (i, j) {
	                var start_date = [];
	                var end_date = [];


	                $('input[name="from[]"]').each(function(i,v){
	                	if ($.trim($(this).val()) != '') {
	                		start_date.push($(this).val());

	                	}
	                });

	                $('input[name="to[]"]').each(function(i,v){
	                	if ($.trim($(this).val()) != '') {
	                		end_date.push($(this).val());

	                	}
	                });
	                if(start_date.length !=0 && end_date.length !=0){
	                	
	                	if(start_date[i] < end_date[i]){
							flag = true;		             
		            		$(this).parent('.error-di').addClass( "has-success" ).removeClass( "has-error" );                   	

	                	}else{
	                		flag = false;
	                		$(this).parent('.error-di').addClass('has-error').removeClass('has-success');
		               		$(this).parent('.error-di').append('<em class="error help-block">To date is greater than to From date.</em>');  
	                	}

	                }
			    	

			     });


		        return flag;

		    }, "");


		})
	</script>
</x-app-layout>
