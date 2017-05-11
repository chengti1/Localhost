<?php extend('layout.php') ?>

<?php startblock('title') ?>
    View Location
<?php endblock() ?>

<?php startblock('css') ?>
    <?php echo get_extended_block(); ?>
    <?php $width=262.5; $height='0.75*$width';?>
<?php endblock() ?>

<?php startblock('js') ?>
    <?php echo get_extended_block(); ?>
    <script>
    $( document ).ready(function(){
        $('#menu_place').addClass('active');
        
        $('.navbar-form button').click(function(){
	        submitForm();
        });
        $("#district").change(function(){
	        submitForm();
        });
        $('.navbar-form input').val('<?php echo $keyword ?>');
        $("#district").val('<?php echo $region?>');
    });
    function submitForm() {
        $("#search_form input[name=keyword]").attr("value",$('.navbar-form input').val());
        $("#search_form input[name=region]").attr("value",$('#district').val());
        $("#search_form").submit();
    }
    </script>
<?php endblock() ?>

<?php startblock('bodycontent') ?>
<form id="search_form" method="post" action=<?php echo site_url('Welcome/view_location') ?>	
	<div class="input-group">
	
		<input type="hidden" name="keyword"/>
		<input type="hidden" name="region"/>
	</div>
</form>
<br>
<br>
<div class="body-nav">
    <div class="container">
        <div class="row">
        <div class="col-md-6 col-sm-6 col-xs-12" > <!-- id="head" -->
        <h1 style="display: inline-block; ">地點</h1>
        <div style="width=50%; display: inline-block;">
        <select id="district" class="form-control">
        <option value="">所有地區</option>
            <?php foreach ($view_location_list as $key=>$locationdata) {?>
                <option><?php echo $locationdata['location'];?></option><?php }?>
        </select>
        </div>
        </div>
            <div class="col-md-6 col-sm-6 col-xs-6 headerrow" id="head">
                <button onclick="location.href='<?php echo site_url('Welcome/add_location'); ?>'" type="button" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus-sign"></span> 新增</button>
            </div> 
        </div>
    </div>
</div>

<div class="firefly-body">
<div class="container">
      <?php
   if ($this->session->flashdata('message'))
       echo'<div class="alert alert-success">'.$this->session->flashdata('message').'</div>';
  ?>
  <div class="row">
                <?php
                if(isset($view_location) && is_array($view_location) && count($view_location)): $i=1;
                $j=1;
                foreach ($view_location as $key => $data) { 
              ?>
                <div class="col-md-3 col-sm-3 col-xs-12">
                    <div class="place_img_wrap">
<!--                     <img src="<?php echo base_url('uploads/location/'. $data['id'].'.jpeg'); ?>" class="img-responsive"> -->
                    <img src="<?php echo base_url('/uploads/location/location-'.$data['id'].''); ?>.png" class="img-responsive" style="width:<?php echo $width;?>px;height:166.141px ">
                    </div>
                    <p>地區: <?php echo $data['newlocation']; ?></p>
                    <p>地點: <?php echo $data['address']; ?></p>
                    <button onclick="location.href='<?php echo site_url('Welcome/edit_location/'. $data['id'].''); ?>'" type="button" class="btn btn-warning" style="display: block; margin:20px auto; ">編輯</button> 
                </div>
                <?php
                    $i++;
                    if ($j % 4 == 0) echo '</div><div class="row">';
                    $j++;
                      }
                  else:
                ?>
              <tr>
                    <td colspan="7" align="center" >No Records Found..</td>
                </tr>
                <?php
                endif;
              ?>
  </div> 
</div> 
</div> 
<?php endblock() ?>

<? end_extend() ?>



