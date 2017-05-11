      $(document).ready(function () {    
        jQuery(".responsive-calendar").responsiveCalendar({
          time: '2016-01',
          events: {}
        });
     
//get calendar info
        $.ajax({
             url: "event.php",
             type:'post',
             datatype: "json",
error:function(xhr, ajaxOptions, thrownError){ 
            alert(xhr.status); 
            alert(thrownError); 
                 },
success: function(result){  
     var res = {};
    $.each(result, function(key, value) {
        res[value.date] = value.option;
    });
    console.log(res);
    $(".responsive-calendar").responsiveCalendar('edit', res);
  }

  
});
        
        
        
/*      
// get description      
        $.ajax({
             url: "description.php",
             type:'post',
             datatype: "json",
error:function(xhr, ajaxOptions, thrownError){ 
            alert(xhr.status); 
            alert(thrownError); 
                 },
success: function(result){  
    $.each(result, function(key, value) {
        var description =();
        value.date = 
    });
  }

  
});*/
        
});
