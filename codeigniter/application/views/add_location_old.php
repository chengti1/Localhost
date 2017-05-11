<?php extend('layout.php') ?>

<?php startblock('title') ?>
    View Location
<?php endblock() ?>

<?php startblock('css') ?>
    <?php echo get_extended_block(); ?>
<?php endblock() ?>

<?php startblock('js') ?>q
    <?php echo get_extended_block(); ?>
    <script>
    $( document ).ready(function(){
        $('#menu_place').addClass('active');
    });
    </script>
<?php endblock() ?>

<?php startblock('bodycontent') ?>

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
<br>

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
			<div class="col-md-6 col-sm-12 col-xs-12">
				<h1>新增/編輯 地點資料</h1>
			</div>
		</div>
	</div>
</div>
<div class="firefly-body">
	<div class="container">
		<div class="row">
			
			<div style="width:100%;height:10px;"></div>
			
<form class="form-horizontal" method="post" action="<?php echo site_url('Welcome/submit_location'); ?>" name="data_register">
	<div class="col-md-9">
		<div class="form-group">
			<label for="inputPassword" class="control-label col-lg-2 col-md-2 col-sm-2 col-xs-3">地區</label>
			<div class="col-lg-10 col-md-10 col-xs-9">
				<select class="form-control" name="newlocation">
					<option>選擇地區</option>
					<option value="1">地區1</option>
					<option value="2">地區2</option>
					<option value="3">地區3</option>
				</select>
			</div>
		</div>
	</div>
	<hr class="control-label col-xs-12" style="margin-top:10px;margin-bottom:10px;">
	<div class="col-md-9">
		<div class="form-group">
			<label for="inputPassword" class="control-label col-lg-2 col-md-2 col-sm-2 col-xs-3">地點</label>
			<div class="col-lg-10 col-md-10 col-xs-9">
				<input type="text" class="form-control" name="address">
			</div>
		</div>
	</div>
	<hr class="control-label col-xs-12" style="margin-top:10px;margin-bottom:10px;">
	<div class="col-md-9 col-sm-12 col-xs-12">
		<div class="form-group">
			<label for="inputPassword" class="control-label col-lg-2 col-md-2 col-sm-2 col-xs-3">地點相片</label>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-9">					
			<div class="image-upload">
    		<label for="file-input">
        	<img src="images/upload_photo.png" class="responsive">
    		</label>
    		<input id="file-input" type="file">
			</div>
     		</div>
		</div>
	</div>
    <div class="form-group">
        <div class="col-lg-offset-2 col-lg-9 col-md-offset-2 col-md-9 col-sm-offset-2 col-sm-9 col-xs-offset-2 col-xs-9 form-button">
            <button type="submit" class="btn btn-warning" style="background:#F16B1F">儲存</button>
			<button type="cancel" class="btn">取消</button>
        </div>
    </div>
</form>
			</div>
		</div>
	</div>
</div><!--end container-->


<?php endblock() ?>

<? end_extend() ?>