<?php
 include '../connection/db.php';
 function links()
 {
 	GLOBAL $db;
 	$uid = $_SESSION['user_id'];
 	$query = $db->prepare("SELECT * FROM users WHERE id = ?");
 	$query->execute([$uid]);
 	$row = $query->fetch(PDO::FETCH_OBJ);
 	/*$photo = $row->image;
 	$bio = $row->bio;
 	$facebook = $row->facebook;
 	$linkedin  = $row->linkedin;*/
 	if (empty($row->image)) {
 		$photo = "<img src='img/user1.png' class = 'user-img'>";
 		$photo_link = "<a href='updatepic.php'>Update photo  <i class='fas fa-pencil-alt'></i></a>";
 	}else{
 		$photo = "<img src='img/$row->image' class = 'user-img'>";
 		$photo_link = "<a href='updatepic.php'>Update photo  <i class='fas fa-pencil-alt'></i></a></a>";
 	}
   if (empty($row->bio)) {
   	$bio = "<a href='#' data-target='#bio' data-toggle='modal'>Add Bio <i class='fas fa-plus'></i> </a>";
   }else{
   	 $bio = "<a href='#' data-target='#bio' data-toggle='modal'>Update Bio  <i class='fas fa-pencil-alt'></i></a>";
   }
   if (empty($row->address)) {
	 $address = "<a href='address.php'>Add address <i class='fas fa-plus'></i></a>";
   }else{
	$address = "<a href='address.php'> Update address <i class='fas fa-pencil-alt'></i>";
   }
   if (empty($row->facebook)) {
   	$facebook = "<a href='#'data-target='#facebook' data-toggle='modal'>Add facebook <i class='fas fa-plus'></i></a>";
   }else{
   	 $facebook = "<a href='#' data-target='#facebook' data-toggle='modal'>Update facebook <i class='fas fa-pencil-alt'></i></a>";
   }
   if (empty($row->linkedin)) {
   	$linkedin = "<a href='#' data-target='#linkedin' data-toggle='modal'>Add linkedin <i class='fas fa-plus'></i> </a>";
   }else{
   	$linkedin = "<a href='#' data-target='#linkedin' data-toggle='modal'>Update linkedin <i class='fas fa-pencil-alt'></i> </a>";
   }

   echo "
        <ul class = 'list-group'>
            $photo
          <li class='list-group-item first-li'>$photo_link</li>
		  <li class='list-group-item'>$bio</li>
		  <li class='list-group-item'>$address</li>
          <li class='list-group-item'>$facebook</li>
          <li class='list-group-item'>$linkedin</li>
          <li class='list-group-item'><a href='#' data-target='#update_password' data-toggle='modal'>Update password <i class='fas fa-pencil-alt'></i></a></li>
          <li class='list-group-item'><a href='#' data-target='#name' data-toggle='modal'>Update name <i class='fas fa-pencil-alt'></i></a></li>
        </ul>
   ";
 }
function update_picture(){
  GLOBAL $db;
  if (isset($_POST['picture'])) {
	 $pic_name = $_FILES['file']['name'];
	 $fileTempName = $_FILES['file']['tmp_name'];
	 $store = "img/";
	 $allowed = array("png", "JPEG", "jpg", "PNG" );
	 $splitExt = explode(".", $pic_name);
	 $Filext = $splitExt[1];
	 if (in_array($Filext, $allowed)) {
		 move_uploaded_file($fileTempName, "$store/$pic_name");
		 $query = $db->prepare("UPDATE users SET image = ? WHERE id = ?");
		 $query->execute(array($pic_name, $_SESSION['user_id']));
		 if ($query) {
			 $_SESSION['updated'] = "<i class='fas fa-check-circle'></i>Profile picture updated successfully!";
			//  header("location: index.php");
		 }else{
			 echo "There is un error updating the picture";
		 }
	 }else{
		 echo "<div class='text-danger'>Invalid file extension</div>";
	 }
  }
}
function user_info(){
	GLOBAL $db;
	$uid = $_SESSION['user_id'];
	$query = $db->prepare("SELECT * FROM users WHERE id=?;");
	$query->execute([$uid]);
	$row = $query->fetch(PDO::FETCH_OBJ);
	$name = $row->name;
	$_SESSION['online']=$row->name;
	if (empty($row->bio)) {
		$bio = "<a href='#' data-target='#bio' data-toggle='modal'>Add Bio <i class='fas fa-plus'></i> </a>";
	}else{
		$bio = $row->bio;
	}
    if (empty($row->address)) {
		$address = "<a href='address.php'>Add address <i class='fas fa-plus'></i></a>";
	  }else{
	   $address = $row->address;
	  }
	  if (empty($row->facebook)) {
		  $facebook = "<a href='#'data-target='#facebook' data-toggle='modal'>Add facebook <i class='fas fa-plus'></i></a>";
	  }else{
		   $facebook ="<a href=' $row->facebook' target='_blank'><i class='fab fa-facebook-f'></i>  Connected</a>";
	  }
	  if (empty($row->linkedin)) {
		  $linkedin = "<a href='#' data-target='#linkedin' data-toggle='modal'>Add linkedin <i class='fas fa-plus'></i> </a>";
	  }else{
		  $linkedin = "<a href=' $row->linkedin' target='_blank'><i class='fab fa-linkedin-in'></i>  Connected</a>";
	  }
  echo "
   <div class='row user-info'> 
	 <div class='col-md-3'>
	  <span>Name : </span>
	 </div>
	 <div class='col-md-9'> $name</div>
   </div> 
   <div class='row user-info'> 
	 <div class='col-md-3'>
	  <span>Address : </span>
	 </div>
	 <div class='col-md-9'> $address</div>
   </div>
   <div class='row user-info'> 
   <div class='col-md-3'>
	<span>Biography : </span>
   </div>
   <div class='col-md-9'> $bio</div>
 </div>
   <div class='row user-info'> 
	 <div class='col-md-3'>
	  <span>Facebook: </span>
	 </div>
	 <div class='col-md-9'> $facebook</div>
   </div>
   <div class='row user-info'> 
	 <div class='col-md-3'>
	  <span>Linkedin: </span>
	 </div>
	 <div class='col-md-9'>$linkedin</div>
   </div>
  ";

}
function profile_percent(){
	GLOBAL $db;
	$uid = $_SESSION['user_id'];
	$query = $db->prepare("SELECT * FROM users WHERE id=?");
	$query->execute([$uid]);
	$row = $query->fetch(PDO::FETCH_OBJ);
	if(empty($row->name)){
		$name = 0;
	}else{
		$name = 12.5;
	}
	if(empty($row->email)){
		$email = 0;
	}else{
		$email = 12.5;
	}
	if(empty($row->password)){
		$password = 0;
	}else{
		$password = 12.5;
	}
	if(empty($row->bio)){
		$bio = 0;
	}else{
		$bio = 12.5;
	}
	if(empty($row->address)){
		$address = 0;
	}else{
		$address = 12.5;
	}
	if(empty($row->image)){
		$image = 0;
	}else{
		$image = 12.5;
	}
	if(empty($row->facebook)){
		$facebook = 0;
	}else{
		$facebook = 12.5;
	}
	if(empty($row->linkedin)){
		$linkedin = 0;
	}else{
		$linkedin = 12.5;
	}
	 $percent = $name+$email+$bio+$password+$address+$image+$facebook+$linkedin;
	 if ($percent==100) {
		 echo "<div class='green-per'><i class='fas fa-check-circle'></i>100%</div>";
	 }else{
		 $split = explode(".", $percent);
		 echo "<div class='orange-per'>".$split[0]."%</div>";
	 }
	//  echo "Your profile is ";
	//  echo $percent;
	//  echo "% filled.";
}

?>