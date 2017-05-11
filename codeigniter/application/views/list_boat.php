<?php extend('layout.php') ?>

<?php startblock('title') ?>
    View Boat
<?php endblock() ?>

<?php startblock('css') ?>
    <?php echo get_extended_block(); ?>
    <style type="text/css">
 .no-border {
  border-style: hidden;
}
td {
  text-align: left;
  vertical-align: middle;
}
th {
  text-align: left;
}
th label {
  display: inline
}
th .form-control {
  display:inline;
  width: auto;
}

    </style>
<?php endblock() ?>

<?php startblock('js') ?>q
    <?php echo get_extended_block(); ?>
    <script>
    $( document ).ready(function(){
        $('#menu_yacht').addClass('active');
        $('.sort').click(function(){
	        var field = $(this).attr("sort_field");
	        sort(field);
        });
        
         $('.navbar-form button').click(function(){
	        submitForm();
        });

        
        $(".container table thead select").change(function(){
	        submitForm();
        });
        
        $('.navbar-form input').val('<?php echo $keyword ?>');
        $('#shipper').val('<?php echo $boat_owner ?>');
        $('#boat_price').val('<?php echo $boat_price ?>');
        $('#status').val('<?php echo $status ?>');
        $('#sort_field').attr('value', '<?php echo $sort_field ?>');
        $('#sort_order').attr('value', '<?php echo $sort_order ?>');
    });
    function sort(field){
	    if ($("#search_form input[name=sort_field]").val() == field){
		    if ($("#search_form input[name=sort_order]").val() == "asc")
		    	$("#search_form input[name=sort_order]").val("desc");
		    else
			    $("#search_form input[name=sort_order]").val("asc");
	    }else{
		    $("#search_form input[name=sort_field]").val(field);
		    $("#search_form input[name=sort_order]").val("asc");
	    }
	    submitForm();
    
    }
    function submitForm() {
        $("#search_form input[name=keyword]").val($('.navbar-form input').val());
        $("#search_form input[name=boat_owner]").val($('#shipper').val());
        $("#search_form input[name=boat_price]").val($('#boat_price').val());
        $("#search_form input[name=status]").val($('#status').val());
        $("#search_form").submit();
    }
    </script>
<?php endblock() ?>

<?php startblock('bodycontent') ?>
<form method='post' id="search_form" action=<?php echo site_url('Welcome/view_boat') ?>
	<div class="input-group">
		<input type="hidden" name="keyword"/>
		<input type="hidden" name="boat_owner"/>
		<input type="hidden" name="boat_price"/>
		<input type="hidden" name="status"/>
		<input type="hidden" name="sort_field"/>
		<input type="hidden" name="sort_order"/>
	</div>	
</form>
<br>
<div class="body-nav">
  <div class="container">
    <div class="row">
      <div class="col-md-8 col-sm-8 col-xs-8">
        <h1>遊艇</h1>
          <?php
   if ($this->session->flashdata('message'))
     echo'<div class="alert alert-success">'.$this->session->flashdata('message').'</div>';
  ?>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-4 headerrow">
        <button onclick="location.href='<?php echo site_url('/Welcome/add_boat'); ?>'" type="button" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus-sign"></span> 新增</button>
      </div> 
    </div>
  </div>
</div>
<br>
<div class="container hidden-xs">
  
<table class="table table-bordered">
<thead class="no-border">
      <tr class="no-border">
        <th style="border-style: hidden;"></th>
        <th></th>
        <th style="border-style: hidden;">      
        <label for="shipper">船家</label>
        <select class="form-control" id="shipper" style="padding-left:4px; padding-right:4px">
        	<option value="">所有船家</option>
        	<?php foreach ($view_owner as $key=>$data) {?>
        		<option><?php echo $data['owner_name'];?></option>        
        	<?php }?>
        </select>
        </th>
        <th></th>
        <th style="border-style: hidden;">
          <label for="boat_price">租金(平日)</label>
        <select class="form-control" id="boat_price">
        <option value="">所有租金</option>
        <option value="1">1 - 1999</option>
        <option value="2">2000 - 3999</option>
        <option value="3">4000 - 5999</option>
        <option value="4">6000 - 7999</option>
        </select>
           </th>
        <th style="border-style: hidden;">       
         <label for="status">狀態</label>
        <select class="form-control" id="status">
        <option value="">所有狀態</option>
        <option value="可用">可用</option>
        <option value="不可用">不可用</option>
      </select>     
         </th>
        <th></th>
      </tr>
<!--     </thead>


  </table> -->
<!-- <table class="table table-bordered">
    <thead> -->
      <tr>
        <th style="width:120px">Name</th>
        <th style="width:230px">圖像</th>
        <th style="width:150px" class="sort" sort_field="boat_owner" >船家</th>
        <th style="width:260px">概要</th>
        <th class="sort" sort_field="weekdayprice">租金</th>
        <th class="sort" sort_field="status">狀態</th>
        <th style ="width:120px"></th>
      </tr>
    </thead>
    <tbody>
              <?php
                if(isset($view_boat) && is_array($view_boat) && count($view_boat)): $i=1;
                foreach ($view_boat as $key => $data) { 
              ?>
      <tr>
        <td style="vertical-align:middle"><?php echo $data['boat_name']; ?></td>
        <td>
        <?php $count=count($data['img_url']); ?>
	    <div id="outline_<?php echo $data['id'];?>" count=<?php echo $count;?> style="text-align: -webkit-center; width:230px; height:150px;">        		
	    	<div style="width:15px; height:150px;float:left;">
	    		<?php if($count > 1) { ?>
	    			<img style="margin-top:65px; cursor:pointer;" onclick="onLeftClick(<?php echo($data['id']);?>);" src="<?php echo base_url("/images/left-arrow.png");?>"/>
	    		<?php } ?>
	    	</div>
	    	<div style="float:left; height:150px;"width="200px;">
	 		   	<a id="show_<?php echo $data['id'];?>" count=<?php echo $count;?> index="0" href="<?php echo site_url('/Welcome/add_reservation'); ?>">
	 		   	<?php for ($index=0; $index<$count ; $index++) {?>
		        	<?php $image = $data['img_url'][$index]; ?>
		        	<?php if ($index == 0){ ?>
		 		    	<img index="<?php echo $index?>"; src="<?php echo base_url($image['path']); ?>" height="150" width="200px;" style="border: 4px solid #444;">
		 		    <?php } else { ?>
		 		    	<img index="<?php echo $index?>"; src="<?php echo base_url($image['path']); ?>" height="150" width="200px;" style="border: 4px solid #444; display:none;">
		 		    <?php } ?>
			    <?php } ?>
			    <?php if ($count == 0) {?>
			    	<img src="<?php echo base_url("/images/avatar.png"); ?>" height="150" width="200px;" style="border: 4px solid #444;">
			    <?php } ?>
			    </a>
	        </div>
	        <div style="width:15px; height:150px; float:right;">
	        	<?php if($count > 1) { ?>
		        	<img style="margin-top:65px; cursor:pointer;" onclick="onRightClick(<?php echo($data['id']);?>);" src="<?php echo base_url("/images/right-arrow.png");?>"/>
		        <?php } ?>
	        </div>
	    </div>
        </td>
        <td style="vertical-align:middle;"><?php echo $data['boat_owner']; ?></td>
        <td style="vertical-align:middle">

    <?php { echo '<button type="button" class="btn btn-success" style="width:20%;padding-left:3px">'.$data['boat_cap'].' <img src="'.base_url().'/assets/images/human.png" alt="human" height="21" width="8"></button>'; } ?>
    <?php if($data['wifi'] == 'yes' ) { echo '<button type="button" class="btn btn-success" style="width:20%"><img src="'.base_url().'/assets/images/wifi.png" alt="wifi" height="21" width="21"></button>'; } ?>     
    <?php if($data['singing'] == 'yes' ) { echo '<button type="button" class="btn btn-success" style="width:20%"><img src="'.base_url().'/assets/images/singing.png" alt="karaoke" height="21" width="21"></button>'; } ?> 
    <?php if($data['cooking'] == 'yes' ) { echo '<button type="button" class="btn btn-success" style="width:20%"><img src="'.base_url().'/assets/images/cook.png" alt="cooking" height="21" width="21"></button>'; } ?> 
    <?php if($data['fishing'] == 'yes' ) { echo '<button type="button" class="btn btn-success" style="width:20%"><img src="'.base_url().'/assets/images/fishing.png" alt="singing" height="21" width="21"></button>'; } ?>     
   <!--  <button type="button" class="btn btn-success">25 <img src="images/human.png" alt="human" height="21" width="8"></button>
    <button type="button" class="btn btn-success"><img src="images/wifi.png" alt="wifi" height="21" width="21"></button>
    <button type="button" class="btn btn-success"><img src="images/cook.png" alt="cook" height="21" width="21"></button>
    <button type="button" class="btn btn-success"><img src="images/singing.png" alt="singing" height="21" width="21"></button> -->
    </td>
        <td style="vertical-align:middle">HKD$ <?php echo $data['weekdayprice']; ?> /半日</td>
        <td style="vertical-align:middle"><?php echo $data['status']; ?></td>
        <td style="vertical-align:middle">       
        <a style="padding:20px" href="<?php echo site_url('Welcome/edit_boat/'. $data['id'].''); ?>">
          <span class="glyphicon glyphicon-edit"></span>
        </a>
        <a  style="padding:20px" href="<?php echo site_url('Welcome/delete_boat/'. $data['id'].''); ?>">
          <span class="glyphicon glyphicon-remove-sign"></span>
        </a>
        </td>
      </tr>
 <?php
                    $i++;
                      }
                  else:
                ?>
              
                    <h1>No Records Found..</h1>
                
                <?php
                endif;
              ?>
    </tbody>
  </table>
</div>

<!-- <div class="container hidden-lg hidden-md hidden-sm">
<table class="table table-bordered">
    <thead>
      <tr>
        <th>圖像</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><a href="index.php?show=reservation" class="yacht-table-img"><img src="images/abc.jpg"></a></td>
      </tr>
      <tr>
        <th>船家</th>
      </tr>
      <tr>
        <td>abc</td>
      </tr>
    <tr>
        <th>概要</th>
      </tr>
    <tr>
        <td>
    <button type="button" class="btn btn-success">25 <img src="images/human.png" alt="human" height="21" width="8"></button>
    <button type="button" class="btn btn-success"><img src="images/wifi.png" alt="wifi" height="21" width="21"></button>
    <button type="button" class="btn btn-success"><img src="images/cook.png" alt="cook" height="21" width="21"></button>
    <button type="button" class="btn btn-success"><img src="images/singing.png" alt="singing" height="21" width="21"></button>
    </td>
      </tr>
    <tr>
        <th>租金</th>
      </tr>
    <tr>
        <td>HKD123</td>
      </tr>
    <tr>
        <th>狀態</th>
      </tr>
    <tr>
        <td>ok</td>
      </tr>
    <tr>
        <td>
    <a href="#">
          <span class="glyphicon glyphicon-edit"></span>
        </a>
        <a href="#">
          <span class="glyphicon glyphicon-remove-sign"></span>
        </a>
    </td>
      </tr>
    </tbody>
  </table>
</div> -->


</div>
	<script type="text/javascript">
		function onLeftClick(id) {
			var index = $("#show_" + id).attr("index");
			var max = $("#show_" + id).attr("count");
			$("#show_" + id + " img").hide();
			index = index - 1;
			if (index < 0)
				index = max - 1;
			$("#show_" + id).attr("index", index);
			
			$("#show_" + id + " img:nth-child(" + (index + 1) + ")").show();	
		}
		
		function onRightClick(id) {
			var index = $("#show_" + id).attr("index");
			var max = $("#show_" + id).attr("count");
			$("#show_" + id + " img").hide();
			index = parseInt(index) + 1;
			if (index >= max)
				index = 0;
			$("#show_" + id).attr("index", index);
			
			$("#show_" + id + " img:nth-child(" + (index + 1) + ")").show();	
		}
	</script>
    <!-- /.container -->
    <?php endblock() ?>

<? end_extend() ?>