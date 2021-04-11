<!-- <?php include '../connection/db.php'; ?> -->
<nav class="navbar navbar-expand-sm navbar-light bg-light  custome-nav">
	<div class="container">
		<a href="#" class="navbar-brand">User Profile</a>
		<button type="button" class="navbar-toggler" data-target="#mynav" data-toggle="collapse">
		<span class="navbar-toggler-icon"></span>
		</button> 

		<div class="collapse navbar-collapse" id="mynav">
			<ul class="navbar-nav ml-auto">
				<li class="new-item">
					<a href="index.php" class="nav-link active"><i class="fas fa-home"></i>Home</a>
				</li>
				<li class="new-item">
					<?php if (isset($_SESSION['user_id'])):?>
					<a href="logout.php" class="nav-link logout-btn">Logout</a>
					<?php endif; ?>
				</li>
			</ul>
		</div>

	</div>
	
</nav>