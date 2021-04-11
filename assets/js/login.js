$(document).ready(function(){
    var email = "";
    var password = "";
    // Email validation
    $("#login-email").focusout(function(){
        var email_store = $.trim($("#login-email").val());
        if (email_store.length == "") {
            $(".login-email-error").html("Email is required!");
            $("#login-email").addClass("border-red");
            $("#login-email").removeClass("border-green");
            email = "";
        }else{
            $(".login-email-error").html("");
            $("#login-email").addClass("border-green");
            $("#login-email").removeClass("border-red");
            email = email_store;
        }
    }); //--End email validation

    //-- Login password validation
    $("#login-password").focusout(function(){
        var pass_store = $("#login-password").val();
        if (pass_store.length == "") {
            $("#login-password").addClass("border-red");
            $("#login-password").removeClass("border-green");
            $(".login-password-error").html("Password is required");
        }else{
            $("#login-password").addClass("border-green");
            $("#login-password").removeClass("border-red");
            $(".login-password-error").html("");
            password = pass_store;
        }
    }); //--- Close password validation.

    // -- Submit the login
    $("#login-submit").click(function(){
        if (email.length == "") {
            $(".login-email-error").html("Email is required!");
            $("#login-email").addClass("border-red");
            $("#login-email").removeClass("border-green");
            email = "";
        }
        if (password.length == "") {
            $("#login-password").addClass("border-red");
            $("#login-password").removeClass("border-green");
            $(".login-password-error").html("Password is required");
        }
        if (email.length != "" && password.length != "") {
            $.ajax({
                type : 'POST',
                url : 'ajax/login.php?login=true',
                data : $("#login-form").serialize(),
                dataType : 'JSON',
                success : function(feedback){
                  if (feedback['error'] == "success") {
                    $(".login-error").html("");
                    $(".login-error").addClass("login-progress");
                    setTimeout(function(){
                       location = feedback['msg'];
                    }, 3000)
                      
                  }else if (feedback['error'] == "Password_error") {
                      $(".login-error").html(feedback['msg']);
                      $("#login-password").addClass("border-red");
                      $("#login-password").removeClass("border-green");
                  } else if (feedback['error'] == "No_Email") {
                    $("#login-email").addClass("border-red");
                    $("#login-email").removeClass("border-green");
                    $(".login-error").html(feedback['msg']);
                  }
                }
            })
        }
    })
})