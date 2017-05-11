<?php extend('layout.php') ?>

<?php startblock('title') ?>
    View Reservation
<?php endblock() ?>

<?php startblock('css') ?>
    <?php echo get_extended_block(); ?>
<link href="<?php echo base_url('fullcalendar-2.6.1/fullcalendar.css'); ?>" rel='stylesheet' />
<link href="<?php echo base_url('fullcalendar-2.6.1/fullcalendar.print.css'); ?>" rel='stylesheet' media='print' />
<style>
	.event-time-12hr {display: none !important}
	.fc-time-grid-container .fc-widget-content span {
		position: relative;
		top: 10px;
	}
</style>
    <link type="text/css" href="http://www.landtechnology.com.hk/projects/boat/css/bootstrap-timepicker.min.css" />
    <style>

	body {
		margin: 40px 10px;
		padding: 0;
		font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
		font-size: 14px;
	}

	#calendar {
		max-width: 900px;
		margin: 0 auto;
	}

</style>
<?php endblock() ?>

<?php startblock('js') ?>
    <?php echo get_extended_block(); ?>
    <script src="<?php echo base_url('fullcalendar-2.6.1/lib/moment.min.js'); ?>"></script>
<script src="<?php echo base_url('fullcalendar-2.6.1/lib/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('fullcalendar-2.6.1/fullcalendar.js'); ?>"></script>
    <script>
    $( document ).ready(function(){
        $('#menu_reservation').addClass('active');
    });
    </script>
    <script>

	$(document).ready(function() {
		
		$('#calendar').fullCalendar({
			header: {
				dayNames: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],	
				center: 'title'
			},
			defaultView: 'agendaWeek',
			defaultDate: '<?php echo $current;?>',
			hiddenDays: [ 0, 6 ],
			dayNames: ['S', 'M', 'T', 'W', 'T', 'F', 'S'],
			eventBorderColor: '#fa7c54',
			eventBackgroundColor: '#fa7c54',
			eventLimit: true, // allow "more" link when too many events
			axisWidth: '140px',
			events: [
				<?php foreach ($view_reservation as $reservation) { ?>
					{
						title: '<?php echo $reservation['clientname']." ".$reservation['boatname']; ?>',
						start: '<?php echo $reservation['fromdate']; ?>T<?php echo $reservation['fromtime'];?>',					
						end: '<?php echo $reservation['todate']; ?>T<?php echo $reservation['totime'];?>'
					}
					<?php if (array_search($reservation, $view_reservation) != count($view_reservation) - 1) { ?>
						,
					<?php } ?>
				<?php } ?>				
			]
		});
		
		refresh();
		
	});
	
	function refresh(){
		var start =$('#calendar').fullCalendar('getView').start;
		var start_day = start.format("").split("-")[2];
		var start_month = start.format("").split("-")[1];
		var start_year = start.format("").split("-")[0];
		
		var end =$('#calendar').fullCalendar('getView').end;
		var end_day = end.format("").split("-")[2];
		var end_month = end.format("").split("-")[1];
		
	
		$("div.fc-widget-header").css("marginRight","0px");
		var table = "<table ><thead><tr>"
					+ "<th class='fc-corner' style='width:69px;padding-top:5px;'></th>" 
					+ "<th colspan='7' style='padding-top:10px;padding-bottom:10px;'>"
					+ "<table class='day_name_view' style='border:2px solid #f9af80'><tr>"
					+ "<td class='fc-mon'>星期二<div>"
					+ "<img class='prev-button' src='<?php echo base_url('/images/left-arrow.png');?>'/>"
					+ "星期一</div></td>"
					+ "<td class='fc-tue'>星期三</td>"
					+ "<td class='fc-wed'>星期四</td>"
					+ "<td class='fc-thu'>星期五</td>"
					+ "<td class='fc-fri'>星期六"
					+ "<img class='next-button' src='<?php echo base_url('/images/right-arrow.png');?>'/>" 
					+ "</td></tr></table></th>"
					+ "</tr></thead></table>";
    
		$("div.fc-widget-header").html(table);		
			
		var classes = ["fc-sun", "fc-mon", "fc-tue", "fc-wed", "fc-thu", "fc-fri", "fc-sat"];
		var names = ["Sun", "Mon", "Tue", "Wed", "Thu", "Fri", "Sat"];
		
		var i = 6;		
		for (index=end_day ;index>end_day-7;index--){
			var month = end_month;
			var day = index;
			if (index <= 0) {
				var offset = 6 - (parseInt(end_day) - parseInt(index) + 1);
				day = parseInt(start_day) + parseInt(offset);
				month = start_month;				
			}
			
			if (i == 1)
				$("td." + classes[i]).html("<div><img class='prev-button' src='<?php echo base_url('/images/left-arrow.png');?>'/>"+month+"/"+day+"("+names[i]+")</div>");
			else if (i == 5)
				$("td." + classes[i]).html("<div><img class='next-button' src='<?php echo base_url('/images/right-arrow.png');?>'/>"+month+"/"+day+"("+names[i]+")</div>");
			else
				$("td." + classes[i]).text(month+"/"+day+"("+names[i]+")");
			i--;
		}
		
		$(".fc-widget-content hr.fc-divider").hide();
		$('.prev-button').click(function(){
			$("button.fc-prev-button").click();
			refresh();
		});
		$('.next-button').click(function(){
			$("button.fc-next-button").click();
			refresh();
		});	
		$(".fc-right").hide();

		$("div.fc-center").hide();
		
		var months = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sept", "Oct", "Nov", "Dec"];
		var title = "<div style='margin-left:-17px;'>" + months[parseInt(start_month) - 1] + "/"+ start_year + "</div>";
		var up_image = "<img style='margin-left:20px' class='up-button' src='<?php echo base_url('/images/up-arrow.png');?>'/>";
		var down_image = "<img style='margin-left:20px'  class='down-button' src='<?php echo base_url('/images/down-arrow.png');?>'/>";
		//var button = "<div style='width:12px;height:12px;margin-top:-5px;float:left;'>"+up_image+down_image+"</div>"
		
		$("th.fc-corner").html(up_image + title + down_image);


		$('.up-button').click(function(){
			var current = $("#calendar").fullCalendar('getDate');
			var days = current.format("").split("-");
			days[1] = parseInt(days[1]) - 1;
			if (parseInt(day[1]) == 0) {
				days[1] = 12;
				days[0] = days[0] - 1;
			}
			current = day[0] + "-" + days[1] + "-" +days[2];
			current = $.fullCalendar.moment(current);

			var weeks = start_day / 7;
			for (i=0; i<weeks; i++)
				$("#calendar").fullCalendar("prev");
			refresh();
		});
		$('.down-button').click(function(){
			var current = $("#calendar").fullCalendar('getDate');
			var days = current.format("").split("-");
			days[1] = parseInt(days[1]) + 1;
			if (parseInt(day[1]) == 13) {
				days[1] = 1;
				days[0] = days[0] + 1;
			}
			current = day[0] + "-" + days[1] + "-" +days[2];
			current = $.fullCalendar.moment(current);

			var weeks = (31 - start_day) / 7;
			for (i=0; i<weeks; i++)
				$("#calendar").fullCalendar("next");
			refresh();
		});	

		var spans = $(".fc-time-grid span");
		spans.each(function(index, span){
			var text = span.innerHTML;
			var pos = text.search('m') - 1;
			var left = text.slice(0, pos);
			var right =	text.slice(pos, text.length);
						
			if(left.length == 1)
				left = "0"+left+":00";
			else
				left = left + ":00";
			span.innerHTML = (left + right.toUpperCase());
		});
		$("td.fc-axis span")[0].innerHTML = "";
		$(".fc-time-grid-event div.fc-time").hide();
		$("div.fc-day-grid div.fc-widget-content").css("margin-right", "15px");

	}

</script>

<?php endblock() ?>

<?php startblock('bodycontent') ?>
<br>
<body>	
	<div id='calendar'></div>

<?php endblock() ?>


<? end_extend() ?>
