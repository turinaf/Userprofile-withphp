$(document).ready(function(){
    var name ="";
    var email ="";
    var password ="";
    var confirmPass ="";
	var name_reg = /^[a-z ]+$/i;
	var email_reg = /^[a-z]+[0-9a-zA-Z_\.]*@[a-z_]+.[a-z]+$/;
	var password_reg = /^(?=.*[a-z])(?=.*[0-9])(?=.*[A-Z])[a-zA-Z0-9]{8,}$/; // at least 8 chrs long
    // === Name validation ===
     $("#name").focusout(function(){
      var store = $.trim($("#name").val());
       if (store.length == "") {
       	$(".name-error").html("Name is required");
       	$("#name").addClass("border-red");
       	$("#name").removeClass("border-green");
       	 name = "";
       }else if(name_reg.test(store)){
       	    $(".name-error").html("");
       	$("#name").addClass("border-green");
       	$("#name").removeClass("border-red");
       	 name = store;
       }else{
       	 $(".name-error").html("Integer is not allowed!");
       	$("#name").addClass("border-red");
       	$("#name").removeClass("border-green");
       	 name = "";
 
       }
     }) //--End of name validation

     /* --Email Validation---*/
     $("#email").focusout(function(){
     	var email_store = $.trim($("#email").val());
     	if (email_store.length == "") {
     	   $(".email-error").html("Email is required");
       	$("#email").addClass("border-red");
       	$("#email").removeClass("border-green");
       	 email = "";	
     	}else if(email_reg.test(email_store)) {
			$.ajax({
			 type : 'POST',
			 url :  'ajax/signup.php',
			 beforeSend : function(){
               $(".email-error").html('<i class="fa fa-spinner fa-pulse fa-2x fa-fw" aria-hidden="true"></i>');
			 },
			 dataType : 'JSON',
			 data : {'check_email' : email_store},
			 success : function(feedback){
				 setTimeout(function(){
					if(feedback['error'] == 'Email_success'){
						$(".email-error").html("<div class ='text-success'><i class='fa fa-check-circle' aria-hidden='true'></i>Available</div>");
						$("#email").addClass("border-green");
						$("#email").removeClass("border-red");
						 email = email_store;
					 }else if(feedback['error'] == 'Email_fail'){
						$(".email-error").html("This email already registered!");
						$("#email").addClass("border-red");
						$("#email").removeClass("border-green");
						 email = "";
					 }
				 }, 2000);
				 
			 }
			});
		 }else{
			$(".email-error").html("Invalid Email format!");
			$("#email").addClass("border-red");
			$("#email").removeClass("border-green");
			 email = "";
		 }
	 })// close email validation
	 
	 //Validate password

	 $("#password").focusout(function(){
		var password_store = $.trim($("#password").val());
		if (password_store.length == "") {
			$(".password-error").html("Please set password");
			$("#password").addClass("border-red");
			$("#password").removeClass("border-green");
			password = "";
		}else if(password_reg.test(password_store)){
            $(".password-error").html("<div class ='text-success'><i class='fa fa-check-circle' aria-hidden='true'></i> Strong password</div>");
			$("#password").addClass("border-green");
			$("#password").removeClass("border-red");
			password = password_store;
		}else{
			$(".password-error").html("At least 8 characters, combine upper, lower case and number");
			$("#password").addClass("border-red");
			$("#password").removeClass("border-green");
			password = "";
		}
	 })//Close password validation

	 //--Confirm password

	 $("#confirmPassword").focusout(function(){
		 var confirmPass_store = $("#confirmPassword").val();
		 if (confirmPass_store.length == "") {
			 $(".confirmPass-error").html("Please re-enter the password");
			 $("#confirmPassword").addClass("border-red");
			 $("#confirmPassword").removeClass("border-green");
			 confirmPass = "";
		 }else if (confirmPass_store != password) {
			$(".confirmPass-error").html("Password not matched");
			$("#confirmPassword").addClass("border-red");
			$("#confirmPassword").removeClass("border-green");
			confirmPass = "";
		 }else{
			$(".confirmPass-error").html("<div class ='text-success'><i class='fa fa-check-circle' aria-hidden='true'></i>Password matched</div>");
			$("#confirmPassword").addClass("border-green");
			$("#confirmPassword").removeClass("border-red");
			confirmPass = confirmPass_store;
		 }
	 })// close password confirmation

	 // -- Submit the form
	 $("#submit").click(function(){
		 if(name.length == ""){
			$(".name-error").html("Name is required");
			$("#name").addClass("border-red");
			$("#name").removeClass("border-green");
			 name = "";
		 }
		 if(email.length == ""){
			$(".email-error").html("email is required");
			$("#email").addClass("border-red");
			$("#email").removeClass("border-green");
			 email = "";
		 }
		 if(password.length == ""){
			$(".password-error").html("password is required");
			$("#password").addClass("border-red");
			$("#password").removeClass("border-green");
			 password = "";
		 }
		 if(confirmPass.length == ""){
			$(".confirmPass-error").html("Confirm password is required");
			$("#confirmPass").addClass("border-red");
			$("#confirmPass").removeClass("border-green");
			 confirmPass = "";
		 }
     if (name.length != "" && email.length !="" && password.length !="" && confirmPass.length !="" ) {
		$.ajax({
			type: 'POST',
			url : 'ajax/signup.php?signup=true',
			dataType : 'JSON',
			data : $("#signup_submit").serialize(),
			beforeSend : function(){
              $(".show-progress").addClass("progress");
			},
           success : function(feedback){
			   setTimeout(function(){
				if (feedback['error'] == "success") {
					location = feedback.msg;
				}
			   }, 3000)
			 
		   }
		})
	 }
             
	 })
})