<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
</head>
<body style="background-color: rgba(0,0,0,.03);">
<div class="container">
	<div class="row align-items-center justify-content-center" style="min-height: 300px;">
		<div class="col-lg-6 col-sm-12">
			<div class="card">
				<div class="card-header bg-info text-white">
					<h5 class="card-title">Please Insert Phone Number</h5>
				</div>
				<div class="card-body">
					<form action="login.php" method="POST" class="form-php">
						 <div class="form-group">
					    <label for="phoneNumber">Phone Number</label>
					    <input type="text" class="form-control" id="phoneNumber" name="phone" aria-describedby="phoneHelp" required="required">
					    <small id="phoneHelp" class="form-text text-danger info-message"></small>
					  </div>
					  <button type="submit" class="btn btn-success btn-block">Login</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($){
		"use strict";
		
		$('form.form-php').submit(function(e){
			e.preventDefault();
			var f = $(this).find('.form-group');
			var str = $(this).serialize();
			var this_form = $(this);
    	var action = $(this).attr('action');

    	if( ! action ) {      
	      this_form.find('.info-message').slideDown().html('The form action property is not set!');
	      return false;
	    }

	    $.ajax({
	    	type: "POST",
	    	url: action,
	    	data: str,
	    	success:function(msg){
	    		//this_form.find('.info-message').slideDown().html(msg);
	    		var hasil = JSON.parse(msg);

	    		if (hasil.success === 'OK') {
	    			var redir = hasil.redir;
	    			this_form.find('.info-message').slideDown().html('Success! Redirected to your link');	    			
					  var countdown = setInterval(function(){
					      window.open(redir, "_self");
					  }, 1000);
	    		} else if(hasil.success === 'FALSE') {
	    			this_form.find('.info-message').slideDown().html('Phone number is not registered in our database');
	    		}
	    	}
	    });
		});
	});
</script>
</body>
</html>