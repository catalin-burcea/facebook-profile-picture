<?php
	if(isset($_POST["facebookURL"])){
		$URL = $_POST["facebookURL"];
		$facebookID =substr($URL,25);
		$arr = explode("?", $facebookID);
		$facebookID = $arr[0]; 
		if($facebookID == "profile.php"){
			$result_array = preg_split( "/[=&]/", $arr[1]);
			for($i = 0; $i < count($result_array); $i++){
				if($result_array[$i] == "id"){
					$facebookID = $result_array[$i+1];
					break;
				} 
			}
		}
		$profile_pic =  "http://graph.facebook.com/".$facebookID."/picture?width=1000&height=1000"; 		
	}

?>

<html>
<head>
	<script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<style type="text/css">


</style>
<body>
	<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&appId=423234424463544&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
	<div class="container">
		<div class="page-header text-center">
		  <h1>Get hidden profile picture<small> Facebook </small></h1>
		</div>
		<div class="row text-center">
			<div class="col-md-6 col-md-offset-3" id="bbb">
				<form role="form-inline" method="POST" action="index.php">	 
				  	<label for="inputURL">Profile URL(Facebook user)</label>
					<div class="input-group">
						<input type="text" name="facebookURL" id="inputURL" class="form-control">						          
					    <span class="input-group-btn">
       						 <button class="btn btn-success" type="submit">Get picture</button>
   					   </span>
					</div>
				</form>
				<div class="text-center">
					<?php
						if(isset($_POST["facebookURL"])){
							echo "<img onerror=\"this.style.display = 'none'; $('#invalid-image-error').show().text('The link is invalid!'); \" src=\"" . $profile_pic . "\" class=\"img-thumbnail img-rounded\"/>"; 
						}
					?>
				</div>
				<div id="invalid-image-error" class="alert alert-danger" style="display:none">
				</div>
			</div>
			<div class="col-md-3">
				<div class="fb-like pull-right" data-href="https://get-hidden-profile-picture.herokuapp.com" data-layout="button_count" data-action="like" layout="box_count" data-show-faces="true" data-share="false"></div>
			</div>
		</div>  
	</div>

</div>
</body>
</html>