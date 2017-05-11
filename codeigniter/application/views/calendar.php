<?php extend('layout.php') ?>

<?php startblock('title') ?>
    Main Page
<?php endblock() ?>

<?php startblock('css') ?>
    <?php echo get_extended_block(); ?>
    <link href="http://landtechnology.com.hk/projects/boat/css/calendar/responsive-calendar.css" rel="stylesheet">
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

            <br>
<br><br>
<br>
<?php
$this->load->library('calendar');
$month   = '4';
$year    = '2016';
$lastday = cal_days_in_month(CAL_GREGORIAN, $month, $year);
for ($day = 1; $day <= $lastday; $day++) {
    $prefix = ($day < 10) ? '0':'';
    $data[$day] =  'http://example.com/news/article/'.$year.'/'.$prefix.$day.'/';
}       
echo $this->calendar->generate($year, $month , $data);
$data = array(
               3  => 'http://example.com/news/article/2006/03/',
               7  => 'http://example.com/news/article/2006/07/',
               13 => 'http://example.com/news/article/2006/13/',
               26 => 'http://example.com/news/article/2006/26/'
             );


?>
</div>
</div>
</div>
	
     <?php endblock() ?>

<? end_extend() ?>

