
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();

/*
/*-------------------------Adding shareholder controls--------------------------*/
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.field_wrapper'); //Input field wrapper
   // var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><input type="text" name="field_name1[]" value=""/><a href="javascript:void(0);" class="remove_button"><img src="images/remove-icon.png"/></a></div>'; //New input field html 
     var fieldHTML ='<div><div class="form-row"><div class="col-sm-6 mb-3"><input class ="form-control" name="s_name[]" type="text" id="validationCustom06" placeholder="Name" required></div><div class="col-sm-2 mb-3"> <input type="text" class ="form-control" name="s_id[]" id="validationCustom06" placeholder="Nic No" required></div><div class="col-sm-1 mb-3"> <input type="text" class ="form-control" name="shares[]" id="validationCustom06" placeholder="Shares" required></div><div class="col-sm-2 mb-3"> <input type="date" class ="form-control"id="validationCustom06" name="sdate_ap[]" placeholder="Date Appointed" required></div></div><div class="form-row"><div class="col-sm-5 mb-3"><input class ="form-control" name="s_add[]" type="text" id="validationCustom06" placeholder="Local address" required></div><div class="col-sm-5 mb-3"><input class ="form-control" name="s_add_f[]" type="text" id="validationCustom06" placeholder="Foreign address"></div></div><a href="javascript:void(0);" class="remove_button"><img src="images/remove-icon.png"/></a></div>';
	var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});

/*-------------------------Adding Director controls--------------------------*/
$(document).ready(function(){
    var maxField = 10; //Input fields increment limitation
    var addButton_dir = $('.addbutton_dir'); //Add button selector
    var wrapper_dir = $('.field_wrapper_dir'); //Input field wrapper
   // var fieldHTML = '<div><input type="text" name="field_name[]" value=""/><input type="text" name="field_name1[]" value=""/><a href="javascript:void(0);" class="remove_button"><img src="images/remove-icon.png"/></a></div>'; //New input field html 
     var fieldHTML_dir ='<div><div class="form-row"><div class="col-sm-5 mb-3"><input class ="form-control" name="name_dir[]" type="text" id="validationCustom06" placeholder="Name" required></div><div class="col-sm-2 mb-3"><input class ="form-control" name="nic_dir[]" type="text" id="validationCustom06" placeholder="NIC No" required></div><div class="col-sm-2 mb-3"> <input type="date" class ="form-control" name="dapp_dir[]" id="validationCustom06" placeholder="Date of Appointment" required></div></div><div class="form-row"><div class="col-sm-5 mb-3"><input class ="form-control" name="add_dir[]" type="text" id="validationCustom06" placeholder="Address" required></div><div class="col-sm-5 mb-3"><input class ="form-control" name="add_dir_f[]" type="text" id="validationCustom06" placeholder="Address" required></div></div><a href="javascript:void(0);" class="remove_button"><img src="images/remove-icon.png"/></a></div>';
	var x = 1; //Initial field counter is 1
    
    //Once add button is clicked
    $(addButton_dir).click(function(){
        //Check maximum number of input fields
        if(x < maxField){ 
            x++; //Increment field counter
            $(wrapper_dir).append(fieldHTML_dir); //Add field html
        }
    });
    
    //Once remove button is clicked
    $(wrapper_dir).on('click', '.remove_button', function(e){
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});