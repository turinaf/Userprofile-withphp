<?php 
$query = $db->prepare("SELECT * FROM users WHERE id =?");
$query->execute(array($_SESSION['user_id']));
$row = $query->fetch(PDO::FETCH_OBJ);
if (empty($row->bio)) {
	$bioTitle = "Add Bio";
}else{
	$bioTitle  ="Update Bio";
}
$bio_value = $row->bio;
if(empty($row->facebook)){
  $facebookTitle = "Add facebook";
}else {
	$facebookTitle = "Update facebook";
}
$facebook_db = $row->facebook;
if (empty($row->linkedin)) {
	$linkedTitle = "Add linked in";
}else{
	$linkedTitle = "Add linked in";
}
$linked_val = $row->linkedin;
$current_name = $row->name;
 ?>

<div class="modal fade" data-backdrop="static" id="bio" tabindex="-1" role="dialog">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
							<div class="modal-header">
								 <h4 class="modal-title"><?php echo $bioTitle;  ?></h4>
								 <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
							</div><!-- modal-header -->
							<div class="modal-body">
								<div class="bio-error error"></div>
								<form action="">
									<div class="form-group">
                                       <textarea class="form-control text-bio" name="bio" id="bio-text" cols="30" rows="10" placeholder="Write your bio"><?php echo $bio_value?></textarea>
									</div><!-- Form group-->
									<div class="modal-footer">
									   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									   <button type="button" class="btn btn-success" onclick="add_bio(this.form.bio.value)">Save Changes</button>
									</div><!-- Modal footer-->
								</form>  <!-- Form inside model body-->
							</div><!-- Modal body-->
						</div><!-- Modal content-->
					  </div><!-- modal-dialog-->
                    </div> <!-- modal-->
                    
<!-- Facebook -->
<div class="modal fade" data-backdrop="static" id="facebook" tabindex="-1" role="dialog">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
							<div class="modal-header">
								 <h4 class="modal-title"><?php echo $facebookTitle ?></h4>
								 <button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
							</div><!-- modal-header -->
							<div class="modal-body">
								<form action="">
									<div class="facebook-error error"></div>
									<div class="form-group">
                                       <input type="text" class="form-control text-bio" name="facebook" id="facebook" placeholder="Add facebook link" value="<?php echo $facebook_db ?>">
									</div><!-- Form group-->
									<div class="modal-footer">
									   <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
									   <button type="button" class="btn btn-success" onclick="add_facebook(this.form.facebook.value)">Save changes</button>
									</div><!-- Modal footer-->
								</form>  <!-- Form inside model body-->
							</div><!-- Modal body-->
						</div><!-- Modal content-->
					  </div><!-- modal-dialog-->
                    </div> <!-- modal-->
                    
        <!-- Linked in -->

<div class="modal fade" data-backdrop="static" id="linkedin" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
					<h4 class="modal-title"><?php echo $linkedTitle ?></h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div><!-- modal-header -->
			<div class="modal-body">
				<form action="">
					<div class="linked-error error"></div>
					<div class="form-group">
						<input type="text" class="form-control text-bio" id="linkedin"  placeholder="Add linkedin link" value="<?php echo $linked_val ?>">
					</div><!-- Form group-->
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-success" onclick="add_linkedin(this.form.linkedin.value)">Save changes</button>
					</div><!-- Modal footer-->
				</form>  <!-- Form inside model body-->
			</div><!-- Modal body-->
		</div><!-- Modal content-->
		</div><!-- modal-dialog-->
	</div> <!-- modal-->
	
<!-- Update password -->
<div class="modal fade" data-backdrop="static" id="update_password" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
					<h4 class="modal-title">Change Password</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div><!-- modal-header -->
			<div class="modal-body">
				<form action="">
					<div class="form-group">
						<input type="password" class="form-control text-bio" name="currentpwd" id="current_pwd" placeholder="Enter current password">
						<div class="current-error error"></div>
					</div><!-- Form group-->
					<div class="form-group">
						<input type="password" class="form-control text-bio" name="newpwd" id="new_pwd" placeholder="Enter new password">
						<div class="new-error error"></div>
					</div><!-- Form group-->
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-success" onclick="change_pass(this.form.current_pwd.value, this.form.new_pwd.value)">Save Changes</button>
					</div><!-- Modal footer-->
				</form>  <!-- Form inside model body-->
			</div><!-- Modal body-->
		</div><!-- Modal content-->
		</div><!-- modal-dialog-->
	</div> <!-- modal-->

	<!-- Name update -->
<div class="modal fade" data-backdrop="static" id="name" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
					<h4 class="modal-title">Update Name</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="close"><span aria-hidden="true">&times;</span></button>
			</div><!-- modal-header -->
			<div class="modal-body">
				<form action="">
				  <div class="form-group">
				  <div class="name-error error"></div>
				  </div>
					<div class="form-group">
						<input type="text" class="form-control text-bio" name="name"  value="<?php echo $current_name ?>" placeholder="New name...">
					</div><!-- Form group-->
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
						<button type="button" class="btn btn-success" onclick="change_name(this.form.name.value)">Update</button>
					</div><!-- Modal footer-->
				</form>  <!-- Form inside model body-->
			</div><!-- Modal body-->
		</div><!-- Modal content-->
		</div><!-- modal-dialog-->
	</div> <!-- modal-->