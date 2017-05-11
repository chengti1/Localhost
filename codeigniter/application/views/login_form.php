<html>
<?php
if (isset($this->session->userdata['logged_in'])) {

header("location.href= '<?php echo site_url('Welcome/user_login_process');?>'");
}
?>
<head>
<title>Login Form</title>
<!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>css/style.css"> -->
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>

	<script src="<?php echo base_url('assets/js/jquery-1.12.0.min.js');?>"></script>
	<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
	<link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.css');?>">
	
	<link rel="stylesheet" href="<?php echo base_url('assets/css/override.bootstrap.css');?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/firefly.css');?>">
<style type="text/css">
		body {
			background: url(<?php echo base_url();?>assets/images/yachts.png) #CCC;
			background-size:cover;
			background-position: center center;
		}
		.body_img {
			background:rgba(0,0,0,0.4);width:100%;height:100%;
		}
		.login-wrap {
			display:block;
			position:absolute;
			text-align: center;
		}
		.login-box {
			background: rgba(255,255,255,0.3);
			width:450px;
			height:450px;
			position: relative;
			overflow: hidden;
			-webkit-border-radius: 50%;
			-moz-border-radius: 50%;
			-ms-border-radius: 50%;
			-o-border-radius: 50%;
			border-radius: 50%;
			text-align: center;
			padding:15px;
			padding-bottom:5px;
		}
		.login-box-inner {
			background: url(<?php echo base_url();?>assets/images/login-inner-bg.png) rgba(255,255,255,0.0);
			border: 3px solid #FFF;
			width:100%;
			height:100%;
			position: relative;
			overflow: hidden;
			-webkit-border-radius: 50%;
			-moz-border-radius: 50%;
			-ms-border-radius: 50%;
			-o-border-radius: 50%;
			border-radius: 50%;
			text-align: center;
			color:#FFF;
		}
		.login-box-inner .hr {
			background: url('<?php echo base_url();?>'assets/images/login-hr.png);
			background-position: bottom;
			background-repeat: repeat-x;
			width:50px;
			height:50px;
			display:inline-block;
			margin-left:10px;
			margin-right:10px;
		}
		.login-box-inner .hr_full {
			background: url('<?php echo base_url();?>'assets/images/login-hr.png);
			background-position: bottom;
			background-repeat: repeat-x;
			width:75%;
			height:20px;
			display:inline-block;
			margin-left:10px;
			margin-right:10px;
		}
		.login-box-inner .top {
			padding-top:30px;
			padding-bottom:0;
			font-size: 32px;
		}
		.login-box-inner .caption {
			padding-top:0;
			margin-top:-10px;
			line-height: 40px;
			font-size: 50px;
			margin-bottom:50px;
		}
		.login-box-inner input {
			background:rgba(255,255,255,0.8);
			height: 50px;
			border:0;
			margin-bottom:10px;
		}
		.firefly-login {
			font-size:22px;color:#FFF;background:rgba(121,121,121,0.8);padding-left:20px;padding-right:20px;padding-top:5px;padding-bottom:5px;
		}
		
		.login_wrap_mobile {
			padding-top:30px;
			text-align: center;
			font-size:20px;
			width:100%;
			color:#FFF;
		}
		.login_wrap_mobile h1{
			font-size:28px;
		}
		.login_wrap_mobile input{
			width:100%;
			height:60px;
			font-size:20px;
			-webkit-border-radius: 0;
			-moz-border-radius: 0;
			-ms-border-radius: 0;
			-o-border-radius: 0;
			border-radius: 0;
		}
		.login_wrap_mobile button{
			font-size:20px;
			height:60px;
			width:100%;
		}
	</style>

</head>
<body>
<?php
if (isset($logout_message)) {
echo "<div class='message'>";
echo $logout_message;
echo "</div>";
}
?>
<?php
if (isset($message_display)) {
echo "<div class='message'>";
echo $message_display;
echo "</div>";
}
?>
<div class="body_img">
<!-- 	<div class="login_wrap_mobile hidden-md hidden-lg">
		<img src="images/header/logo.png"><br>
		<h1>Login</h1>
		<input type="text" class="form-control" placeholder="Username">
		<input type="text" class="form-control" placeholder="Password">
		<button class="btn firefly-login" onclick="location.href='index.php'">Go</button>
	</div> -->
	<div class="visible-xs visible-sm hidden-lg hidden-md" style="text-align: center; color: white">
	<h2>Please login on desktop</h2><br>
	<h2>Site is not optimized on mobile / tablet</h2>
	</div>
	<div class="login-wrap hidden-xs hidden-sm">

			<img src="<?php echo base_url();?>assets/images/header/logo.png" width="200px">
			<div class="login-box">
				<div class="login-box-inner">
					<div class="top">Welcome!</div>
					<div class="caption"><div class="hr"></div>Login<div class="hr"></div></div>
					<div style="width:350px;">
						<?php echo form_open('Welcome/user_login_process'); ?>
						<?php
						echo "<div class='error_msg'>";
						if (isset($error_message)) {
						echo $error_message;
						}
						echo validation_errors();
						echo "</div>";
						?>
						<div class="row">
							<div class="col-md-2">.</div>
							<div class="col-md-10">
								<input type="text" name="username" id="name" class="form-control" placeholder="Username">
								<input type="password" name="password" id="password" class="form-control" placeholder="Password">
							</div>
							<div class="col-md-2">.</div>
						</div>
					</div>
					<div class="hr_full"></div>
					<div class="">
						<button class="btn firefly-login" value-"Login " name="submit"  style="">Go</button>
					</div>
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>
		<script>
			function setPosition(){
				$(".login-wrap").css("top", $(window).height()/2-$(".login-wrap").height()/2);
				$(".login-wrap").css("left", $(window).width()/2-$(".login-wrap").width()/2);
				$(".row").css("visibility", "visible");
			}
			
			$(window).load(function(){
				setPosition();
			});
			
			$(document).ready(function(){
				setPosition();
			});

			$(window).resize(function() {
				setPosition();
			});
		</script>
	</div>


<!-- <div id="main">
<div id="login">
<h2>Login Form</h2>
<hr/>
<?php echo form_open('user_authentication/user_login_process'); ?>
<?php
echo "<div class='error_msg'>";
if (isset($error_message)) {
echo $error_message;
}
echo validation_errors();
echo "</div>";
?>
<label>UserName :</label>
<input type="text" name="username" id="name" placeholder="username"/><br /><br />
<label>Password :</label>
<input type="password" name="password" id="password" placeholder="**********"/><br/><br />
<input type="submit" value=" Login " name="submit"/><br />
<a href="<?php echo base_url() ?>index.php/user_authentication/user_registration_show">To SignUp Click Here</a>
<?php echo form_close(); ?>
</div>
</div> -->
</body>
</html>