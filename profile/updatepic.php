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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css">
	<!--- Font awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

    <!-- Custome CSS -->
	<link rel="stylesheet" type="text/css" href="../assets/css/style.css">
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
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</html>