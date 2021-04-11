<?php
include 'connection/db.php';
?>
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
    <?php include 'parts/nav.php';?>
    <div class="container main">
       <div class="row">
           <div class="col-md-12">
                <div class="success-msg">
                    <?php 
                     echo "<h2> <i class='fa fa-check-circle'></i> Hi ".$_SESSION['user_name'].",</h2>";
                    ?>
                    <p>Welcome to the network <br> We are glad to have you aboard!</p>
                   Login <a href="index.php">here</a>
                </div>  <!--success msg-->
           </div> <!--Column-->
       </div> <!--Row-->
    </div> <!-- Container -->
</body>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/custome.js"></script>
<!-- <script type="text/javascript" src="valid.js"></script> -->
<script type="text/javascript" src="assets/js/signup.js"></script>
<script>
    $(document).ready(function(){
        $(".success-msg").fadeOut();
        $(".success-msg").fadeIn(5000);
    })
</script>
</body>
</html>