<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Checkin</title>
  
  
    <link rel="stylesheet" href="<?php echo base_url('assets/login/css/style.css');?>">

  
</head>

<body>
  <div class="wrapper">
	<div class="row">
		<div class="col-md-12">
	<div class="container">
		
				<h1>Checkin Login</h1>
				<?php echo form_open('auth/login'); ?>
				<!--<form class="form" method="post" action="auth/login">-->
					<input type="text" name="username" placeholder="Username">
					<input type="password" name="password" placeholder="Password">
					<button type="submit"  name="submit" id="login-button">Login</button>
				</form>
			</div>	
		</div>		
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
</div>
  <script src="<?php echo base_url('assets/login/js/jquery.min.js');?>"></script>
  <!--<script src="login/js/index.js"></script>-->
  

</body>
</html>