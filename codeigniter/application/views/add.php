<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Just a Test Website</title>
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="http://landtechnology.com.hk/projects/boat/css/override.bootstrap.css">
	<link rel="stylesheet" href="http://landtechnology.com.hk/projects/boat/css/firefly.css">	

<!--	

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	-->
</head>
<body>

<!-- <div id="container" class="container">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<h2 class="text-center">Insert Add data Form in codeignter sample </h2>
			<br><br>
		  <form method="post" action="<?php echo site_url('Welcome/submit_data'); ?>" name="data_register">
			<label for="Name">Enter you name</label>
			  <input type="text" class="form-control" name="username" required >
			<br>
			<label for="Email">Enter you Email</label>
			  <input type="email" class="form-control" name="email" required>
			<br>
			<label for="Sex">Select Sex</label><br>
			  <input type="radio" name="sex" checked value="Male" required > Male &nbsp;  
			  <input required type="radio" name="sex" value="Female" > Female
			<br><br>
			<label for="Email">Address</label>
			  <textarea name="address" class="form-control" rows="6" required ></textarea>
			<br><br>
			  <button type="submit" class="btn btn-primary pull-right">Submit</button>
			<br><br>
		  </form>
		</div>
	</div>
</div> -->


<div class="body-nav">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<h1>新增/編輯 船家資料</h1>
			</div>
		</div>
	</div>
</div>
<div class="firefly-body">
	<div class="container">
		<div class="row">
			
			<div style="width:100%;height:10px;"></div>
			
	<form class="form-horizontal" method="post" action="<?php echo site_url('Welcome/submit_data'); ?>" name="data_register">
                <fieldset>


	<div class="col-md-9">
		<div class="form-group">
			<label for="cname" class="control-label col-xs-3">中文名</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" name="cname">
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="form-group">
			<label for="company" class="control-label col-xs-3">公司名稱</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" name="company">
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="form-group">
			<label for="status" class="control-label col-xs-3">狀態</label>
			<div class="col-xs-9">
               
                <input type="radio" name="status" id="radios-0" value="yes" checked="checked">
                <label class="r-label" for="radios-0">可用</label> 
                
                <input type="radio" name="status" id="radios-1" value="no">
				<label class="r-label" for="radios-1">不可用</label> 
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="form-group">
			<label for="companyphoto" class="control-label col-xs-3">公司相片</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" name="companyphoto">
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="form-group">
			<label for="contactperson" class="control-label col-xs-3">聯絡人</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" name="contactperson">
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="form-group">
			<label for="phone1" class="control-label col-xs-3">聯絡電話 1</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" name="phone1">
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="form-group">
			<label for="phone2" class="control-label col-xs-3">聯絡電話 2</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" name="phone2">
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="form-group">
			<label for="address" class="control-label col-xs-3">地址</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" name="address">
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="form-group">
			<label for="login" class="control-label col-xs-3">登入名稱</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" name="login">
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="form-group">
			<label for="password" class="control-label col-xs-3">密碼</label>
			<div class="col-xs-9">
				<input type="password" class="form-control" name="password">
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="form-group">
			<label for="others" class="control-label col-xs-3">其它</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" name="others">
			</div>
		</div>
	</div>
<!-- 	<div class="col-md-9">
		<div class="form-group">
			<label for="inputPassword" class="control-label col-xs-3">上載影像</label>
			<div class="col-lg-4 col-md-4 col-xs-4">
				<img src="images/profile_pic.png" class="responsive">
			</div>
		</div>
	</div> -->
	<div class="col-md-9">
		<div class="form-group">
			<div class="col-xs-offset-2 col-xs-10">
				<button type="submit" class="btn btn-warning" style="background:#F16B1F">儲存</button>
				<button type="cancel" class="btn">取消</button>
			</div>
		</div>
	</div>

                </fieldset>
                </form>
	</div>
</div><!--end container-->


</body>
</html>