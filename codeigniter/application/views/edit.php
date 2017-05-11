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



<!-- Reference Material -->
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
<?php
     // if(isset($view_data) && is_array($view_data) && count($view_data)): $i=1;
      foreach ($edit_data as $key => $data) {
 ?>	
	<form class="form-horizontal" method="post" action="<?php echo site_url('Welcome/update_data/'.$data['id'].''); ?>" name="data_register">
                <fieldset>


	<div class="col-md-9">
		<div class="form-group">
			<label for="cname" class="control-label col-xs-3">中文名</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" name="cname" value="<?php echo $data['cname']; ?>" required>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="form-group">
			<label for="company" class="control-label col-xs-3">公司名稱</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" name="company" value="<?php echo $data['company']; ?>" required>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="form-group">
			<label for="status" class="control-label col-xs-3">狀態</label>
			<div class="col-xs-9">
               
                <input type="radio" name="status" <?php if($data['status'] == 'yes' ) { echo 'checked'; } ?> value="yes" required>
                <label class="r-label" for="radios-0">可用</label> 
                
                <input type="radio" name="status" <?php if($data['status'] == 'no' ) { echo 'checked'; } ?> value="no" required>
				<label class="r-label" for="radios-1">不可用</label> 
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="form-group">
			<label for="companyphoto" class="control-label col-xs-3">公司相片</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" name="companyphoto" value="<?php echo $data['companyphoto']; ?>" required>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="form-group">
			<label for="contactperson" class="control-label col-xs-3">聯絡人</label>
			<div class="col-xs-9">
				<input name="contactperson" class="form-control" value="<?php echo $data['contactperson']; ?>" required>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="form-group">
			<label for="phone1" class="control-label col-xs-3">聯絡電話 1</label>
			<div class="col-xs-9">
				<input name="phone1" class="form-control" value="<?php echo $data['phone1']; ?>" required>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="form-group">
			<label for="phone2" class="control-label col-xs-3">聯絡電話 2</label>
			<div class="col-xs-9">
				<input name="phone2" class="form-control" value="<?php echo $data['phone2']; ?>" required>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="form-group">
			<label for="address" class="control-label col-xs-3">地址</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" name="address" value="<?php echo $data['address']; ?>" required>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="form-group">
			<label for="login" class="control-label col-xs-3">登入名稱</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" name="login" value="<?php echo $data['login']; ?>" required>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="form-group">
			<label for="password" class="control-label col-xs-3">密碼</label>
			<div class="col-xs-9">
				<input type="password" class="form-control" name="password" value="<?php echo $data['password']; ?>" required>
			</div>
		</div>
	</div>
	<div class="col-md-9">
		<div class="form-group">
			<label for="others" class="control-label col-xs-3">其它</label>
			<div class="col-xs-9">
				<input type="text" class="form-control" name="others" value="<?php echo $data['others']; ?>" required>
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
                	 <?php
        }
		//endif;
     ?>
	</div>
</div><!--end container-->

</div>
</body>
</html>