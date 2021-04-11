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
	<div class="container contents">
		<div class="row">
			<div class="col-md-3">
			   <div class="left-area">
			   	  <?php links(); ?>
			   </div><!-- left-area-->
			</div><!-- col 3-->
			<div class="col-md-9">
				<div class="right-area">
				<?php include 'parts/add_update.php' ?>
					<h4>Update profile picture</h4> <hr>
                    <form action="" method="POST" enctype="multipart/form-data">
                    	<div class="form-group">
                    	  <?php update_picture();  ?>
                    	</div><!-- form group-->
                        <div class="form-group">
                           <input type="file" class="form-control" name="file" required>
                        </div><!-- form-group-->
                        <div class="form-group">
                         <input type="submit" value="Update picture" name="picture" class="btn btn-success">
                        </div><!-- form-group -->
                    </form><!-- Form -->
				</div><!-- right-area-->
			</div> <!-- col 9-->
		</div> <!-- Row-->
	</div> <!-- Container-->
</body>
<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript" src="../assets/js/popper.min.js"></script> 
<script type="text/javascript"> src ="../assets/js/bootstrap.min.js"</script>
</html>