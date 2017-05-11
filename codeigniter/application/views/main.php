<?php extend('layout.php') ?>

<?php startblock('title') ?>
    Main Page
<?php endblock() ?>

<?php startblock('css') ?>
    <?php echo get_extended_block(); ?>
    <link href="http://landtechnology.com.hk/projects/boat/css/calendar/responsive-calendar.css" rel="stylesheet">
<style type="text/css">
    .shift{
 margin-left:50px;
 }
 
 table{
/* border:15px solid #FD5196;
 margin-top:20px;*/
 border: black 5px solid;
 width: 100%;
 border-radius: 20px;
  -webkit-border-radius: 20px;
     -moz-border-radius: 20px;
          border-radius: 20px;
}

table { border-collapse: separate; }
td { border: solid 1px #000; }
tr:first-child td:first-child { border-top-left-radius: 10px; }
tr:first-child td:last-child { border-top-right-radius: 10px; }
tr:last-child td:first-child { border-bottom-left-radius: 10px; }
tr:last-child td:last-child { border-bottom-right-radius: 10px; }

 
 td{
 text-align:left;
 vertical-align: top;
/* border:1px solid black;*/
 font-size:12px;
 font-weight:normal;
 width: 14%;
 height: 40px;
 }
 th{
 background:white;
 font-size:40px;
 text-transform: uppercase;
 color:black;
 height: 60px;
 border-style: none;
 font-weight: normal;

 }
 .prevcell a, .nextcell a{
 color:black;
 text-decoration:none;
/* display: none;*/
 }
 
 tr.wk_nm{
 background:black;
 color:#999999;
 font-size:17px;
 width: 10px; 
 font-weight:bold;
 padding:5px;
 }
  tr.wk_nm td{
 height: 25px; 
 }
 
 .highlight{
 background-color:#FD5196;
 color:white;
 padding:10px;
 }
 
</style>
<?php endblock() ?>

<?php startblock('js') ?>
    <?php echo get_extended_block(); ?>
    <script>
    $( document ).ready(function(){
        $('#menu_place').addClass('active');
    });
    </script>

    <?php endblock() ?>

<? end_extend() ?>
<?php endblock() ?>

<?php startblock('bodycontent') ?>
<br>
<br>
<div class="body-nav">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-sm-6 col-xs-6">
				<h1>主頁</h1>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-6">
				
			</div> 
		</div>
	</div>
</div>
<br>

<div class="container">
	<div class="row">
            <div class="col-lg-5 col-md-6">
            <?php  echo ''.$this->calendar->generate($year,$month,$content).'';?>
	        <div style="padding-left:50p;">    
	            <div style="float:left;">
		            <div  align="right" style="font-size:21px;"><?php echo $year?>年</div>
		            <div align="right" style="margin-right:-5px;font-size:19px;"><?php echo $month?>月</div>
	            </div>
	            <div style="float:left; margin-left:7px; font-size:30px; margin-top:6px;">
	            	<?php echo $day; ?><bold>日1</bold>(<?php echo $week; ?>)<font size="15px;"></font>
	            </div>
            </div>
    
            </div>
            <div class="col-lg-7 col-md-6 calendar-note">
            <h1>本星期事件</h1>
            <ul>
            <?php foreach($reservations as $reservation) {?>
            	<li><p><?php echo $reservation['date'];?>          <?php echo $reservation['clientname'];?></p></li>
            <?php }?>
            </ul>
            </div>            
        </div>

        <!-- /.row -->
        <div class="line"></div>
	</div>
</div>		

    <script src="http://landtechnology.com.hk/projects/boat/js/calendar/responsive-calendar.js"></script>
      <script src="http://landtechnology.com.hk/projects/boat/js/calendar/recalendar.js"></script>
	

	
     <?php endblock() ?>

