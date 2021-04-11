function add_bio(bio){
	var bio = $.trim(bio);
	if (bio.length=="") {
		$(".bio-error").html("Please add the bio first");
	}else{
		$(".bio-error").html("");
      $.ajax({
		  type : 'POST',
		  url : 'ajax/profile.php?bio=true',
		  dataType : 'JSON',
		  data : {'bio' : bio},
		  success : function(feedback){
                  if (feedback['error'] == "success") {
					  location = 'index.php';
				  }else{
					  alert("Something went wrong");
				  }
		  }
	  })
	}
}
// https://www.facebook.com/turi.abu
function add_facebook(facebook){
	var facebook = $.trim(facebook);
	var facebook_url = /^(http|https)\:(\/\/)(www)\.(facebook)\.(com)\/[a-zA-Z0-9]+(\.|_)?[a-zA-Z0-9]+$/;
	if (facebook.length=="") {
		$(".facebook-error").html("Please insert facebook link first");
		$("#facebook").css("border-color", "red");
	}else if(facebook_url.test(facebook)){
		$.ajax({
			type : 'POST',
			url : 'ajax/profile.php?facebook=true',
			dataType : 'JSON',
			data : {'facebook': facebook},
			success : function (feedback) {
				if (feedback['error'] == "success") {
					location = 'index.php';
				}else{
					alert("Somenthing problem");
				}
			}
		})
	}else{
		$(".facebook-error").html("Invalid Facebook link");
		$("#facebook").css("border-color", "red");
	}
}
//https://www.linkedin.com/in/heaven-shimelis/
function add_linkedin(linkedin){
  var linked_in = $.trim(linkedin);
  //https://www.linkedin.com/in/turi-abu-8a5947177/
  var linkedin_reg = /^(http|https)\:(\/\/)(www)\.(linkedin)\.(com)\/(in)\/[a-zA-Z]+(-)[A-Za-z0-9]+\/$/;
  if (linked_in.length =="") {
	  $(".linked-error").html("LinkedIn link is required");
  }else if(linkedin_reg.test(linked_in)){
   $.ajax({
	   type : 'POST',
	   url : 'ajax/profile.php?linkedin=true',
	   dataType : 'JSON',
	   data : {'linkedin' : linkedin},
	   success : function(feedback){
		   if (feedback['error']=="success") {
			 location = 'index.php';   
		   }
	   }
   })    
  }else{
	$(".linked-error").html("Invalid Linkedin url");
  }
}
function change_name(name) {
	var currentName= name;
   if(currentName.length ==""){
	   $(".name-error").html("Please provide new name");
	   $(".name-error").css("border-color", "red");
   }else{
	   $.ajax({
		   type : 'POST',
		   url : 'ajax/profile.php?changen=true',
		   dataType : 'JSON',
		   data : {'name' : currentName},
		   success : function(feedback) {
			   if (feedback['error']=="success") {
				   location = 'index.php';
			   }else{
				   alert("There is something wrong!");
			   }
		   }
	   })
   }
}
function change_pass(currentpwd, newpwd){
	var currentpwd = currentpwd;
	var newpwd = newpwd;
	if (currentpwd.length=="") {
		$(".current-error").html("Current password is required");
		$("#current_pwd").css("border-color", "red");
	}
	if (newpwd.length=="") {
		$(".new-error").html("New password is required");
		$("#new_pwd").css("border-color", "red");
	}
    if (currentpwd.length !="" && newpwd.length !="") {
		$.ajax({
			type : 'POST',
			url : 'ajax/profile.php?changepwd=true',
			dataType : 'JSON',
			data : {'current_pwd' : currentpwd, 'new_pwd': newpwd},
			success : function(feedback){
              if (feedback['error']=="success") {
				 location = 'index.php'; 
			  }else{
				  alert("There is something wrong, check if you current password is correct!");
			  }
			}
		})
	}
}

function add_address(address){
  var current_ad = address;
  if (current_ad.length=="") {
	  $(".address-error").html("Please insert address");
	  $("#autocomplete").css("border-color", "red");
  }else{
	  $.ajax({
		  type : 'POST',
		  url : 'ajax/profile.php?address=true',
		  dataType : 'JSON',
		  data : {'address': current_ad},
		  success : function(feedback){
          if (feedback['error']=="success") {
			  location = 'index.php';
		  }else{
			  alert("Something went wrong!");
		  }
		  }
	  })
  }
}