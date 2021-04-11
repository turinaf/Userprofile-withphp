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
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/fontawesome/css/fontawesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/fontawesome/css/all.css">
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
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/custome.js"></script>
<!-- <script type="text/javascript" src="valid.js"></script> -->
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