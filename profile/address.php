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
            <?php 
$query = $db->prepare("SELECT * FROM users WHERE id =?");
$query->execute(array($_SESSION['user_id']));
$row = $query->fetch(PDO::FETCH_OBJ);
if (empty($row->address)) {
	$addressTitle = "Add address";
}else{
	$addressTitle  ="Update address";
}
$address_value = $row->address;
?>
				<div class="right-area">
        <?php include 'parts/add_update.php' ?>
                    <h4><?php echo $addressTitle ?></h4> <hr>
                    <form  >
                    	<div class="form-group">
                            <div class="address-error error"></div>
                    	</div><!-- form group-->
                        <div class="form-group">
           <input id="autocomplete" placeholder="Enter your address" onFocus="geolocate()"
             type="text" class="form-control" value="<?php echo $address_value ?>">
                        </div><!-- form-group-->
                        <div class="form-group">
                         <button type="button" class="btn btn-success" onclick="add_address(this.form.autocomplete.value)">Save </button>
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

<script>
// This sample uses the Autocomplete widget to help the user select a
// place, then it retrieves the address components associated with that
// place, and then it populates the form fields with those details.
// This sample requires the Places library. Include the libraries=places
// parameter when you first load the API. For example:
// <script
// src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

var placeSearch, autocomplete;

var componentForm = {
  street_number: 'short_name',
  route: 'long_name',
  locality: 'long_name',
  administrative_area_level_1: 'short_name',
  country: 'long_name',
  postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search predictions to
  // geographical location types.
  autocomplete = new google.maps.places.Autocomplete(
      document.getElementById('autocomplete'), {types: ['geocode']});

  // Avoid paying for data that you don't need by restricting the set of
  // place fields that are returned to just the address components.
  autocomplete.setFields(['address_component']);

  // When the user selects an address from the drop-down, populate the
  // address fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
    document.getElementById(component).value = '';
    document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details,
  // and then fill-in the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
    var addressType = place.address_components[i].types[0];
    if (componentForm[addressType]) {
      var val = place.address_components[i][componentForm[addressType]];
      document.getElementById(addressType).value = val;
    }
  }
}

// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(function(position) {
      var geolocation = {
        lat: position.coords.latitude,
        lng: position.coords.longitude
      };
      var circle = new google.maps.Circle(
          {center: geolocation, radius: position.coords.accuracy});
      autocomplete.setBounds(circle.getBounds());
    });
  }
}
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCOuvt8JTbpJW7i6MtqIg2aDtJqTC2IJAI&libraries=places&callback=initAutocomplete"
        async defer></script>
    <script type="text/javascript" src="js/profile.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
</html>