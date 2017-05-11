<?php extend('layout.php') ?>

<?php startblock('title') ?>
    View Owner
<?php endblock() ?>

<?php startblock('css') ?>
    <?php echo get_extended_block(); ?>
    <?php $width=50 ;?>
    <style type="text/css">
    table tr td{
        background-color: white;
    }
    </style>
<?php endblock() ?>

<?php startblock('js') ?>q
    <?php echo get_extended_block(); ?>
    <script>
    $( document ).ready(function(){
        $('#menu_owner').addClass('active');
        $('.navbar-form button').unbind('click');
        $('.navbar-form button').click(function(){
        	submitForm();
        });
        $('.navbar-form input').val('<?php echo $keyword ?>');
    });
    function submitForm() {
        $("#search_form input[name=keyword]").val($('.navbar-form input').val());
        $("#search_form").submit();
    }
    </script>
<?php endblock() ?>

<?php startblock('bodycontent') ?>
<form method="post" id="search_form" action=<?php echo site_url('Welcome/view_owner') ?>
	<div class="input-group">
		<input type="hidden" name="keyword"/>
	</div>
</form>
<br>

<div class="body-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <h1>船家</h1>
               <?php
             if ($this->session->flashdata('message')) {
                ?>
                <div class="message flash">
                    <?php echo $this->session->flashdata('message'); ?>
                </div>
                <?php
                }
            ?> 
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 headerrow">
                <button onclick="location.href='<?php echo site_url('/Welcome/add_owner'); ?>'" type="button" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus-sign"></span> 新增</button>
            </div> 
        </div>
    </div>
</div>

    <div class="container">
                
        <div class="row">
        <?php
                if(isset($view_owner) && is_array($view_owner) && count($view_owner)): $i=1;
                $j=1;
                foreach ($view_owner as $key => $data) { 
                    // if ($j % 6 == 0)
                    //     echo '<div class="row">';
              ?>
        <div class="col-lg-2 col-md-4 col-sm-4 col-xs-12">
        <div class="col-lg-12 col-md-12 no-margin no-padding">
            <div class="people-content">
                <div class="image-cropper" style="text-align:center">
                    <img src="<?php echo base_url($data['img_url']); ?>" class="rounded responsive" style="width: 165px;height: 165px">
                </div>
                <div class="people-image" align="center" style="overflow:auto;">
                    <?php $boat_img = $data['boat_img'];
                    	$count = count($boat_img) > 3 ? 3: count($boat_img);                	
                    ?>
                    <ul class="no-padding" style="text-align:center; min-width:<?php echo $count*60;?>px;">                   
                    	<?php for ($i = 0; $i < $count; $i++) { ?>
                    	<?php $img = $boat_img[$i];?>
                        <li><img src="<?php echo base_url($img['path']); ?>" class="responsive" style="width:<?php echo $width;?>px;height:<?php echo$width;?>px"></li>
                        <?php } ?>
                        
                        <?php if ($count == 0) {?>
                       	 <li><img src="<?php echo base_url("/images/avatar.png"); ?>" class="responsive" style="width:<?php echo $width;?>px;height:<?php echo$width;?>px"></li>
                        <?php } ?>
                    </ul>
                </div>
            <div class="people-info">
            <table>
                <tr>
                    <td  class="wider-td small-font">船家姓名：</td>
                    <td  class="smaller-td small-font"> <?php echo $data['owner_name']; ?> <?php echo $data['owner_lastname']; ?></td>                    
                </tr>
                <tr>
                    <td  class="wider-td small-font"> 狀態：</td>
                    <td  class="smaller-td small-font"> <?php echo $data['status']; ?></td>                    
                </tr>
                <tr>
                    <td  class="wider-td small-font">持有船隻：</td>
                    <td  class="smaller-td small-font"><?php echo $data['ship_number']; ?></td>                    
                </tr>
                <tr>
                    <td  class="wider-td small-font">聯絡電話：</td>
                    <td  class="smaller-td small-font"><?php echo $data['owner_phone']; ?></td>                    
                </tr>
                <tr>
                    <td  class="wider-td  small-font">電郵：</td>
                    <td  class="smaller-td small-font"> <a href="mailto:<?php echo $data['owner_email']; ?>"><?php echo $data['owner_email']; ?></a></td>
                </tr>
            </table>

                <button onclick="location.href='<?php echo site_url('/Welcome/edit_owner/'. $data['id'].''); ?>'" type="button" style="display: block; margin:30px auto; " class="btn btn-warning">編輯
                </button>
            </div>
            </div>
        </div>    
         </div> 
            <?php
                    $i++;
                if ($j % 6 == 0) echo '</div><div class="row">';
                $j++;
                      }
                  else:
                ?>
              
                    <h1>No Records Found..</h1>
                
                <?php
                endif;
              ?>
        
        
</div>
    </div>
    <!-- /.container -->
    <?php endblock() ?>

<? end_extend() ?>