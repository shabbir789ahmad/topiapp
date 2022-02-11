$(document).ready(function(){

    var maxField = 10; 
    var addButton = $('.add_button'); 
    var wrapper = $('.field_wrapper'); 
    var fieldHTML = `
    <div>

    <button class="remove_button btn ml-3 btn-danger mt-3"><i class="fa fa-fw fa-times"></i></button>
   
    <div class="card mr-3 ml-3 ">
    <div class="card-body">
    <div class="row">
    <div class="col-md-6">
     <label for="" class="font-weight-bold mt-2">
							 Video Name<span class="text-danger">*</span></label>
      <input type="text" name="video_name[]" class="form-control" value=""/>
    </div>
    <div class="col-md-6">
    <label for="" class="font-weight-bold mt-2">
							 Video <span class="text-danger">*</span></label>
      <input type="file" name="videob[]" accept="video/*" class="form-control" value=""/>
    </div>
   
    <div class="col-md-6">
    <label for="" class="font-weight-bold mt-2">
							 Audio<span class="text-danger">*</span></label>
      <input type="file" name="audiob[]" accept="audio/*" class="form-control" value=""/>
    </div>
    <div class="col-md-6">
    <label for="" class="font-weight-bold mt-2">
							 Premium<span class="text-danger">*</span></label>
        <select class="form-control" name="premium[]">
					<option value="1">Premium</option>
					<option value="0">Free</option>
				</select>
    </div>
    </div>
    </div>
    </div>

    </div>

    `;
    
    var x = 1; 
    
   
    $(addButton).click(function(){

     if(x < maxField)
     { 
        x++;
        $(wrapper).append(fieldHTML);
      }
       
       
    });
    

    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); 
        x--; 
    });
});
