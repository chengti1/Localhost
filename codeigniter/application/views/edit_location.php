<?php extend('layout.php') ?>



<?php startblock('title') ?>

    View Location

<?php endblock() ?>



<?php startblock('css') ?>

    <?php echo get_extended_block(); ?>

<?php endblock() ?>



<?php startblock('js') ?>

    <?php echo get_extended_block(); ?>

    <script>

    $( document ).ready(function(){

        $('#menu_place').addClass('active');

    });

    </script>

<?php endblock() ?>



<?php startblock('bodycontent') ?>



<script src="<?php echo base_url('plupload/jquery-1.7.2.min.js'); ?>"></script>

<script src="<?php echo base_url('plupload/plupload.full.min.js') ?>"></script>

<script src="<?php echo base_url('plupload/ajaxfileupload.js') ?>"></script>

<style>

	.outline {

		border-radius: 5px;

		border-color: green;

		width: 170px;

		height: 130px;

		float: left;

		margin: 2px;

		padding: 3px;

		border: 2px solid;

	}

</style>

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

<div class="firefly-body" id="container">

	<div class="container">

		<div class="row">

			

			<div style="width:100%;height:10px;"></div>

<?php

	foreach ($edit_location as $key => $data) {

?>             			

<form class="form-horizontal" method="post" action="<?php echo site_url('Welcome/update_location/'.$data['id'].''); ?>" name="data_register">

	<div class="col-md-7 col-sm-12 col-xs-12">

		<div class="form-group">

			<label for="inputPassword" class="control-label col-xs-3">地區</label>

			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">

				<select class="form-control" name="newlocation">

                    <option value="none">選擇地區</option>

            <?php foreach ($view_location_list as $key=>$locationdata) {?>

                <option value="<?php echo $locationdata['location'];?>" <?php if($locationdata['location'] == $data['newlocation'] ) { echo 'selected'; } ?>><?php echo $locationdata['location'];?></option><?php }?>

                </select>

			</div>

		</div>

	</div>

	<hr class="control-label col-xs-12" style="margin-top:10px;margin-bottom:10px;">

	<div class="col-md-7 col-sm-12 col-xs-12">

		<div class="form-group">

			<label for="inputPassword" class="control-label col-xs-3">地點</label>

			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">

				<input type="text" class="form-control" name="address" value="<?php echo $data['address']; ?>">

			</div>

		</div>

	</div>

	<hr class="control-label col-xs-12" style="margin-top:10px;margin-bottom:10px;">

	<div class="col-md-7 col-sm-12 col-xs-12">

		<div class="form-group">

			<label for="inputPassword" class="control-label col-xs-3">地點相片</label>

			<div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">

				<div><a id="customer_receipt_file_link" href="javascript:"><img src="<?php echo base_url();?>assets/images/upload_photo.png" class="responsive"></div>

                <div id="image-upload" style="width:100%; height:140px;">

                	<img id="uploadimg_preview" style="width:160px;height:120px" src="<?php echo base_url($data['img_url']) ?>">

                </div>

     		</div>

		</div>

	</div>

	<div class="col-md-7 col-sm-12 col-xs-12">

<!-- 		<div class="form-group">

			<div class="col-xs-offset-2 col-xs-10">

				<button type="submit" class="btn btn-warning" style="background:#F16B1F">儲存</button>

				<button type="cancel" class="btn">取消</button>

			</div>

		</div> -->

			<div class="form-group">

			<div class="col-xs-3" style="text-align:right">

				<button type="submit" class="btn btn-warning" style="background:#F16B1F">儲存</button>

<!-- 				<button type="cancel" class="btn">取消</button> -->

			</div>

			<div class="col-xs-9">

<!-- 				<button type="submit" class="btn btn-warning" style="background:#F16B1F">儲存</button> -->

				<button type="cancel" class="btn" onclick="location.href='<?php echo site_url();?>/Welcome/view_location';return false;">取消</button>

			</div>

			</div>

	</div>

</form>

<?php

    }

    //endif;

 ?>

			</div>

		</div>

	</div>

</div><!--end container-->



<script type="text/javascript">



    var uploader_thumb = new plupload.Uploader({

        runtimes : 'html5,flash,silverlight,html4',

        browse_button : 'customer_receipt_file_link', // you can pass in id...

        container: document.getElementById('container'), // ... or DOM Element itself

        url : '<?php echo site_url('Upload/uploadImage') ?>',

        flash_swf_url : 'http://landtechnology.com.hk/projects/codeigniter/plupload/Moxie.swf',

        silverlight_xap_url : 'http://landtechnology.com.hk/projects/codeigniter/plupload/Moxie.xap',

        multi_selection: false,

        

        filters : {

            max_file_size : '20MB',

            mime_types: [

                {

                    title : "image files",

                    extensions : "jpg,png,gif,bmp"

                }

            ]

        },



        init: {

            FilesAdded: function(up, files) {     

            	

            	while (up.files.length > 1) {

			        up.removeFile(up.files[0]);

			    }

			    $("#image-upload").empty();

                 

                plupload.each(files, function(file) {

                    uploader_thumb.start();

                });

            },



            UploadProgress: function(up, file) {

                //document.getElementById(file.id).getElementsByTagName('b')[0].innerHTML = '<span>' + file.percent + "%</span>";

            },



            FileUploaded:function (up, file, info) {

            	var imgName =  info.response;//uploaded_obj.result.filename;

                var preview = $("#image-upload")[0];

                var content = '<div class="outline">';

                content = content + '<img id="uploadimg_preview" style="width:160px;height:120px" src="' + '<?php echo base_url('uploads/tmp') ?>' + '/' + imgName + '">';

                content =  content + '<input style="display:none;" type="text" value="' + imgName + '" class="form-control" name="uploadphoto[]"/></div>';

                preview.innerHTML = preview.innerHTML + content;

            },

            Error: function(up, err) {

            	alert(err.message);

            }

        }



    });

    uploader_thumb.init();



</script>



    <script type="text/javascript" src="<?php echo base_url('plupload/common.js') ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('plupload/smoothScroll.js') ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('plupload/jquery.rollover.js') ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('plupload/jquery.biggerlink.js') ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('plupload/jquery.bxslider.js') ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('pluploadr/jquery-ui.min.js') ?>"></script>

    <script type="text/javascript" src="<?php echo base_url('plupload/jquery.ui.datepicker-ja.min.js') ?>"></script>





<?php endblock() ?>



<?php  end_extend() ?>