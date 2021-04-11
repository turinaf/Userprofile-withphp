<?php
include 'functions/func.php';
if (!isset($_SESSION['user_id'])) {
	header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
	<link rel="stylesheet" type="text/css" href="../assets/fontawesome/css/all.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/profile.css">
</head>
<body>
<?php include '../parts/nav.php'; ?>
 <?php if (isset($_SESSION['updated'])): ?>
 	<div class="alert alert-success all-msg text-center">
 		<?php echo $_SESSION['updated'];  ?>
 	</div>
 <?php endif; ?>
 <?php unset($_SESSION['updated']) ?>
 <?php if (isset($_SESSION['add_bio'])): ?>
 	<div class="alert alert-success all-msg text-center">
 		<?php echo $_SESSION['add_bio'];  ?>
 	</div>
 <?php endif; ?>
 <?php unset($_SESSION['add_bio']) ?>
 <?php if (isset($_SESSION['add_facebook'])): ?>
 	<div class="alert alert-success all-msg text-center">
 		<?php echo $_SESSION['add_facebook'];  ?>
 	</div>
 <?php endif; ?>
 <?php unset($_SESSION['add_facebook']) ?>
 <?php if (isset($_SESSION['add_linkedin'])): ?>
 	<div class="alert alert-success all-msg text-center">
 		<?php echo $_SESSION['add_linkedin'];  ?>
 	</div>
 <?php endif; ?>
 <?php unset($_SESSION['add_linkedin']) ?>

 <?php if (isset($_SESSION['pwd_ch'])): ?>
 	<div class="alert alert-success all-msg text-center">
 		<?php echo $_SESSION['pwd_ch'];  ?>
 	</div>
 <?php endif; ?>
 <?php unset($_SESSION['pwd_ch']) ?>

 <?php if (isset($_SESSION['update_name'])): ?>
 	<div class="alert alert-success all-msg text-center">
 		<?php echo $_SESSION['update_name'];  ?>
 	</div>
 <?php endif; ?>
 <?php unset($_SESSION['update_name']) ?>

 <?php if (isset($_SESSION['add_address'])): ?>
 	<div class="alert alert-success all-msg text-center">
 		<?php echo $_SESSION['add_address'];  ?>
 	</div>
 <?php endif; ?>
 <?php unset($_SESSION['add_address']) ?>
	<div class="container contents">
		<div class="row">
			<div class="col-md-3">
			   <div class="left-area">
			   	  <?php links(); ?>
			   </div><!-- left-area-->
			</div><!-- col 3-->
			<div class="col-md-9">
				<div class="right-area">
					<div class="row">
                       <div class="col-md-4">
						   <h4>Informations</h4>
					   </div> <!--Column--->
					   <div class="col-md-8">
						   <?php profile_percent(); ?>
					   </div>
					</div><!--Row-->
					<hr>
					<?php user_info(); ?>
					<?php include 'parts/add_update.php' ?>
				</div><!-- right-area-->
			</div> <!-- col 9-->
		</div> <!-- Row-->
	</div> <!-- Container-->
</body>
<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/popper.min.js"></script> 
<script type="text/javascript" src ="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/profile.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		setTimeout(function(){
          $(".all-msg").fadeOut("slow");
		}, 3000);
	})
</script>
</html>