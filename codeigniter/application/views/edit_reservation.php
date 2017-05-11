<?php extend('layout.php') ?>



<?php startblock('title') ?>

    Edit Reservation

<?php endblock() ?>



<?php startblock('css') ?>

        <link href="<?php echo base_url() ;?>/assets/css/lessimportant.css" rel="stylesheet">

    <link rel="stylesheet" type="text/css" media="screen" href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">

     <style type="text/css">

     ul {

        padding-left: 0;

     }



     </style>

<?php echo get_extended_block(); ?>

<?php endblock() ?>



<?php startblock('js') ?>

    <?php echo get_extended_block(); ?>

    <script>

    $( document ).ready(function(){

        $('#menu_reservation').addClass('active');

    });

    </script>



<?php endblock() ?>



<?php startblock('bodycontent') ?>

<br>

<br>





<div class="body-nav">

    <div class="container">

        <div class="row">

            <div class="col-md-6 col-sm-6 col-xs-12">

                <h1>新增/編輯 預約資料</h1>

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

      foreach ($edit_reservation as $key => $data) {

 ?>             

<form class="form-horizontal" method="post" action="<?php echo site_url('Welcome/update_reservation/'.$data['id'].''); ?>" name="data_register">

    <fieldset>

    <div class="col-md-7 col-sm-12 col-xs-12">   

    <div class="form-group">

        <label for="inputEmail" class="control-label col-xs-3">日期</label>

        <div id="datetimepicker1" class="input-append col-xs-4">

            <input data-format="yyyy-MM-dd" type="text" name="fromdate" value="<?php echo $data['fromdate']; ?>"></input>

            <span class="add-on">

            <i data-time-icon="icon-calendar" data-date-icon="icon-calendar" >

            </i>

            </span>

      </div>        

        <div id="datetimepicker3" class="input-append col-xs-2">

            <input data-format="hh:mm" type="text" name="fromtime" value="<?php echo $data['fromtime']; ?>"></input>

            <span class="add-on">

            <i data-time-icon="icon-time" data-date-icon="icon-calendar">

            </i>

            </span>

      </div>

<!--         <div class="col-xs-1">

            <select class="form-control" name="fromsection">

                <option value"<?php if($data['fromsection'] == 'am' ) { echo 'checked'; } ?>">AM</option>

                <option value"<?php if($data['fromsection'] == 'pm' ) { echo 'checked'; } ?>">PM</option>

            </select>

        </div>    -->     

        <!-- Blank Space -->

        <div class="col-xs-2">      

        </div>

        <div class="col-xs-12 text-center">

        <p>至</p>

        </div>

        <label for="totime" class="control-label col-xs-3"></label>

        <div id="datetimepicker2" class="input-append col-xs-4">

            <input data-format="yyyy-MM-dd" type="text" name="todate" value="<?php echo $data['todate']; ?>"></input>

            <span class="add-on">

            <i data-time-icon="icon-calendar" data-date-icon="icon-calendar" >

            </i>

            </span>

      </div>   

        <div id="datetimepicker4" class="input-append col-xs-2">

            <input data-format="hh:mm" type="text" name="totime" value="<?php echo $data['totime']; ?>"></input>

            <span class="add-on">

            <i data-time-icon="icon-time" data-date-icon="icon-calendar">

            </i>

            </span>

      </div>

<!--         <div class="col-xs-2">

            <select class="form-control" name="tosection">

                <option value"am">AM</option>

                <option value"pm">PM</option>

            </select>

        </div>   -->   

    <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">

    </script> 

    <script type="text/javascript" src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">

    </script>

    <script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">

    </script>

    <script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">

    </script>

<script type="text/javascript">

  $(function() {

    $('#datetimepicker3').datetimepicker({

      pickDate: false,

      pickSeconds: false, 

      pick12HourFormat: true,

    });

    $('#datetimepicker4').datetimepicker({

      pickDate: false,

      pickSeconds: false, 

      pick12HourFormat: true,

    });

    $('#datetimepicker2').datetimepicker({

      pickDate: true,

      pickSeconds: false, 

    });    

    $('#datetimepicker1').datetimepicker({

      pickDate: true,

      pickSeconds: false, 

    });        

  });

</script>   

    </div>

    </div>

    <div class="col-md-7 col-sm-12 col-xs-12"> 

    <div class="form-group">

        <label for="inputPassword" class="control-label col-xs-3">遊艇</label>

        <div class="col-xs-7">

            <select class="form-control" name="boatname">

            <option value=""></option>

            <?php foreach ($view_boat as $key=>$boatdata) {?>

                <option value="<?php echo $boatdata['boat_name'];?>" <?php if($boatdata['boat_name'] == $data['boatname'] ) { echo 'selected'; } ?>><?php echo $boatdata['boat_name'];?>

                </option>        

             <?php }?>

        </select>



<!--   <?php foreach ($countries as $c): ?>

    <option<?php $country == $c ? ' selected="selected"' : ''; ?>>$c</option>

  <?php endforeach; ?> -->





        </div>

    </div>

</div>

    <div class="col-md-7 col-sm-12 col-xs-12">

        <div class="form-group">

            <label for="inputPassword" class="control-label col-xs-3">快艇</label>

            <div class="col-xs-9">

               

                <input type="radio" name="speedboat" id="radios-0" <?php if($data['speedboat'] == 'yes' ) { echo 'checked'; } ?> value="yes">

                <label class="r-label" for="radios-0">可用</label> 

                

                <input type="radio" name="speedboat" id="radios-1" <?php if($data['speedboat'] == 'no' ) { echo 'checked'; } ?> value="no">

                <label class="r-label" for="radios-1">不可用</label> 

            </div>

        </div>

    </div>

    <div class="col-md-7 col-sm-12 col-xs-12"> 

    <div class="form-group">

        <label for="inputPassword" class="control-label col-xs-3">船家</label>

        <div class="col-xs-7">

            <select class="form-control" name="ownername">

            <option value=""></option>

            <?php foreach ($view_owner as $key => $ownerdata) {?> 

                <option value="<?php echo $ownerdata['owner_name'];?>" <?php if($ownerdata['owner_name'] == $data['boat_owner'] ) { echo 'selected'; } ?>><?php echo $ownerdata['owner_name'];?></option>           

             <?php }?>   

        </select>

        </div>

    </div>

<!--     <?php

     // if(isset($view_data) && is_array($view_data) && count($view_data)): $i=1;

      foreach ($edit_reservation as $key => $data) {

 ?>   -->  

</div>

    <div class="col-md-7 col-sm-12 col-xs-12"> 

    <div class="form-group">

        <label for="inputPassword" class="control-label col-xs-3">客人姓名</label>

        <div class="col-xs-7">

            <input type="text" class="form-control" name="clientname" value="<?php echo $data['clientname']; ?>">

        </div>

    </div>

</div>

    <div class="col-md-7 col-sm-12 col-xs-12"> 

    <div class="form-group">

        <label for="inputPassword" class="control-label col-xs-3">聯絡電話</label>

        <div class="col-xs-7">

            <input type="text" class="form-control" name="contactphone" value="<?php echo $data['contactphone']; ?>">

        </div>

    </div>

</div>

    <div class="col-md-7 col-sm-12 col-xs-12">

    <div class="form-group">

        <label for="inputPassword" class="control-label col-xs-3">價錢</label>

        <div class="col-xs-7">

            <input type="text" class="form-control" name="price" value="<?php echo $data['price']; ?>">



        </div>

    </div>

    </div>   

    <div class="col-md-7 col-sm-12 col-xs-12">

    <div class="form-group">

        <label for="inputPassword" class="control-label col-xs-3">按金</label>

        <div class="col-xs-7">

            <input type="text" class="form-control" name="deposit" value="<?php echo $data['deposit']; ?>">



        </div>

    </div>

    </div>  

    <div class="col-md-7 col-sm-12 col-xs-12">

    <div class="form-group">

        <label for="inputPassword" class="control-label col-xs-3">結餘</label>

        <div class="col-xs-7">

            <input type="text" class="form-control" name="balance" value="<?php echo $data['balance']; ?>">



        </div>

    </div>

    </div>  

    <div class="col-md-7 col-sm-12 col-xs-12"> 

    <div class="form-group">

        <label for="inputPassword" class="control-label col-xs-3">登船地點</label>

        <div class="col-xs-7">

            <select class="form-control" name="boardinglocation">

            <option value="">請選擇登船地點</option>

            <?php foreach ($view_location as $key => $locationdata) {?> 

                <option value="<?php echo $locationdata['address'];?>" <?php if($locationdata['address'] == $data['boardinglocation'] ) { echo 'selected'; } ?>><?php echo $locationdata['address'];?></option>   

            <?php }?> 

            </select>

        </div>

    </div>

</div>

    <div class="col-md-7 col-sm-12 col-xs-12"> 

    <div class="form-group">

        <label for="inputPassword" class="control-label col-xs-3">下船地點</label>

        <div class="col-xs-7">

            <select class="form-control" name="offlocation">

            <option value="">請選擇下船地點</option>

            <?php foreach ($view_location as $key => $locationdata) {?> 

                <option value="<?php echo $locationdata['address'];?>" <?php if($locationdata['address'] == $data['offlocation'] ) { echo 'selected'; } ?>><?php echo $locationdata['address'];?>

                </option>   

            <?php }?>      

            </select>

        </div>

    </div>

</div>

    <div class="col-md-7 col-sm-12 col-xs-12"> 

        <div class="form-group">

            <label for="inputPassword" class="control-label col-xs-3">狀態</label>

            <div class="col-xs-7">

               

                <input type="radio" name="status" id="radios-2" <?php if($data['status'] == 'yes' ) { echo 'checked'; } ?> value="yes">

                <label class="r-label" for="radios-2">可用</label> 

                

                <input type="radio" name="status" id="radios-3" <?php if($data['status'] == 'no' ) { echo 'checked'; } ?> value="no">

                <label class="r-label" for="radios-3">不可用</label> 

            </div>

        </div>

    </div>

        <div class="col-md-7 col-sm-12 col-xs-12">

    <div class="form-group">

        <label for="inputPassword" class="control-label col-xs-3">備註</label>

        <div class="col-xs-7">

            <textarea rows="4" cols="50" class="form-control" name="remark" value=""><?php echo $data['remark']; ?></textarea>

        </div>

    </div>

    </div>  



    <div class="col-md-7 col-sm-12 col-xs-12">

<!--        <div class="form-group">

            <div class="col-xs-offset-2 col-xs-10">

                <button type="submit" class="btn btn-warning" style="background:#F16B1F">儲存</button>

                <button type="cancel" class="btn">取消</button>

            </div>

        </div> -->

            <div class="form-group">

            <div class="col-xs-3" style="text-align:right">

                <button type="submit" class="btn btn-warning" style="background:#F16B1F">儲存</button>

<!--                <button type="cancel" class="btn">取消</button> -->

            </div>

            <div class="col-xs-9">

<!--                <button type="submit" class="btn btn-warning" style="background:#F16B1F">儲存</button> -->

                <button type="cancel" class="btn" onclick="location.href='<?php echo site_url();?>/Welcome/view_reservation';return false;">取消</button>

            </div>

            </div>

    </div>

    

</fieldset>    

</form>

<?php

        }}

        //endif;

     ?>

            <div style="width:100%;height:150px;"></div>

            </div>



    </div>

</div><!--end container-->

<?php endblock() ?>



<? end_extend() ?>