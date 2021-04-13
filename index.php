 <!-- <?php include 'connection/db.php'; 
 if (isset($_SESSION['user_id'])) {
	 header("location: profile/index.php");
 }
?> -->
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1 shrink-to-fit=no" >
	<title>Login - signup </title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
	<!--- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>
	<video autoplay muted loop id="my_vid">
		<source src="assets/img/video.mp4" type="video/mp4">
	</video>
	<!-- Navbar -->
	<?php include 'parts/nav.php'; ?>
	<div class="showcase">
 <div class="container">
	 <div class="row">
		<div class="col-md-8 content" >
			<h1>It is always free</h1>
			<?php if (isset($_SESSION['online'])): ?>
				<div class="alert alert-success all-msg text-center">
				<?php echo "Thank you ".$_SESSION['online'].", see you next time!";  ?>
			</div>
			<?php else: ?>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum, iure. Quasi ipsum nobis quia aut aperiam ratione natus, vitae impedit temporibus, amet illo beatae delectus ex aliquid odit similique aspernatur?</p>
			<?php endif; ?>
			<?php unset($_SESSION['online']); ?>
	
		</div> <!--Col-->
		<div class="col-md-4 content" >
			<div class="signup-cover">
           <div class="card">
             <div class="card-header">
               <div class="row">
                   <div class="col-md-9">
					   <h3 class="form-heading">Sign Up</h3>
					   <p>Create your account now.</p>
				   </div><!--col-->
				   <div class="col-md-3 text-right">
				   <i class="far fa-edit fa-2x"></i>
				   </div> <!-- Card-header-->
				   <div class="card-body" style="background-color: #fff;">
                     <form id="signup_submit" >
						 <div class="form-group show-progress"></div>
						 <div class="form-group">
						   <input type="text" id="name" name="name" class="form-control" placeholder="Enter name..."> 
						<div class="name-error error"></div>
						</div> <!-- Form-Group-->
						<div class="form-group">
						   <input  type="email" name="email" id="email" class="form-control" placeholder="Enter Email...">
						   <div class="email-error error"></div>
						</div> <!-- Form-Group-->
						<div class="form-group">
						   <input type="password" id="password" name="password" class="form-control" placeholder="Create Password">
						   <div class="password-error error"></div>   
						</div> <!-- Form-Group-->
						<div class="form-group">
						   <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm Password">
						   <div class="confirmPass-error error"></div>
						</div> <!-- Form-Group-->
						<div class="form-group">
						   <button type="button" id="submit" class="btn btn-success btn-block form-btn" > Create Account </button>
						 </div> <!-- Form-Group-->
						 <div class="form-ground">
							 Already have an account? <a href="#" id="login">Login here</a>
						 </div>
					 </form>
				   </div><!--Card-body -->
			   </div><!--Row within card-->
			 </div> <!--Card-body-->
		   </div> <!-- Card-->
			</div> <!--Sign- Up cover-->
		   <div class="login-cover">
		   <div class="card">
             <div class="card-header">
               <div class="row">
                   <div class="col-md-9">
					   <h3 class="form-heading">Login </h3>
					   <p>Enter your Email and Password</p>
				   </div><!--col-->
				   <div class="col-md-3 text-right">
				   <i class="fas fa-lock fa-2x"></i>
				   </div> <!-- Card-header-->
				   <div class="card-body" style="background-color: #fff;">
                     <form id="login-form" >
						 <div class="form-group">
							 <div class="login-error error"></div>
						 </div>
						<div class="form-group">
						   <input type="email" name="login-email" id="login-email" class="form-control" placeholder="Enter Email...">
						  <div class="login-email-error error"></div>
						</div> <!-- Form-Group-->
						<div class="form-group">
						   <input type="password" name="login-password" id="login-password" class="form-control" placeholder="Enter Password">
						   <div class="login-password-error error"></div>
						  <div class="password-error error"></div>     
						</div> <!-- Form-Group-->
						<div class="form-group">
						   <button type="button" id="login-submit" class="btn btn-success btn-block form-btn" > Login  </button>
						 </div> <!-- Form-Group-->
						 <div class="form-group">
                           Don't have an acc.? <a href="#" id="signup">Create new.</a>
						 </div>
					 </form>
				   </div><!--Card-body -->
			   </div><!--Row within card-->
			 </div> <!--Card-body-->
		   </div> <!-- Card-->
		   </div> <!--login-Cover-->
		</div> <!--col-->
	 </div> <!--row-->

 </div> <!--Container-->
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js"></script> 
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script type="text/javascript" src="assets/js/custome.js"></script>

<script type="text/javascript" src="assets/js/signup.js"></script>
<script type="text/javascript" src="assets/js/login.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		setTimeout(function(){
          $(".all-msg").fadeOut("slow");
		}, 10000);
	})
</script>
</body>
</html>