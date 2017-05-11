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
<br>
<br>
<div class="body-nav">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-6">
				<h1>船家</h1>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				<button onclick="location.href='index.php?show=new-owner'" type="button" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus-sign"></span> 新增</button>
			</div> 
		</div>
	</div>
</div>

    <div class="container">

        <div class="row">
		
		
<?php  for($i=0;$i<12;$i++):?>
        <div class="col-lg-2 col-md-3 col-sm-4 col-xs-12">
        <div class="col-lg-12 col-md-12 no-margin no-padding">
            <div class="people-content">
				<div class="image-cropper" style="text-align:center">
					<img src="images/people.jpg" class="rounded responsive">
				</div>
				<div class="people-image">
					<ul class="no-padding">
						<li><img src="" class="responsive"></li>
						<li><img src="" class="responsive"></li>
						<li><img src="" class="responsive"></li>
					</ul>
				</div>
            <div class="people-info">
            <table>
                <tr>
                    <td  class="wider-td small-font">船家姓名：</td>
                    <td  class="smaller-td small-font"> <?php echo $owner[$i]['owner_name']?> </td>                    
                </tr>
                <tr>
                    <td  class="wider-td small-font"> 狀態：</td>
					<td  class="smaller-td small-font"> <?php echo $owner[$i]['owner_status']?></td>                    
                </tr>
                <tr>
                    <td  class="wider-td small-font">持有船隻：</td>
                    <td  class="smaller-td small-font"><?php echo $owner[$i]['owner_ship_number']?></td>                    
                </tr>
                <tr>
                    <td  class="wider-td small-font">聯絡電話：</td>
                    <td  class="smaller-td small-font"><?php echo $owner[$i]['owner_phone']?></td>                    
                </tr>
                <tr>
                    <td  class="wider-td  small-font">電郵：</td>
                    <td  class="smaller-td small-font"> <a href="mailto:abc@abc.com"><?php echo $owner[$i]['owner_email']?></a></td>
                </tr>
            </table>

				<button onclick="location.href='index.php?show=new-owner'" style="display: block; margin:30px auto; " class="btn btn-warning">編輯</button>
            </div>
            </div>
        </div>    
		 </div> 
<?php endfor;  ?>
		
        </div> 

    </div>
    <!-- /.container -->
	<?php endblock() ?>

<? end_extend() ?>