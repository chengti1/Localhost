<?php extend('layout.php') ?>
<?php startblock('title') ?>

View Reservation
<?php endblock() ?>
<?php startblock('css') ?>
<link href="http://www.leapofeducation.com/projects/codeigniter/assets/css/lessimportant.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" media="screen"
      href="http://tarruda.github.com/bootstrap-datetimepicker/assets/css/bootstrap-datetimepicker.min.css">
<style type="text/css">
    ul {
        padding-left: 0;
    }
    td {
        text-align: center;
        vertical-align: middle;
    }
    th {
        text-align: center;
    }
</style>
<?php echo get_extended_block(); ?>

<?php endblock() ?>
<?php startblock('js') ?>
<?php echo get_extended_block(); ?> 
<script>

    $(document).ready(function () {
        $('#menu_reservation').addClass('active');
        $('.sort').click(function () {
            var field = $(this).attr("sort_field");
            sort(field);
        });

        $('.navbar-form button').click(function () {
            submitForm();
        });

            /*change here*/
        $(".container table thead input:text").change(function () {
            submitForm();
        });

        $('.navbar-form input').val('<?php echo $keyword ?>');
        $('#fromdate').val('<?php echo $fromdate ?>');
        $('#todate').val('<?php echo $todate ?>');
          $('#status').val('<?php echo $status ?>');
        $('#sort_field').attr('value', '<?php echo $sort_field ?>');
        $('#sort_order').attr('value', '<?php echo $sort_order ?>');
    });
    function sort(field) {
        if ($("#search_form input[name=sort_field]").val() == field) {
            if ($("#search_form input[name=sort_order]").val() == "asc")
                $("#search_form input[name=sort_order]").val("desc");
            else
                $("#search_form input[name=sort_order]").val("asc");
        } else {
            $("#search_form input[name=sort_field]").val(field);
            $("#search_form input[name=sort_order]").val("asc");
        }
        submitForm();

    }
    function submitForm() {
        $("#search_form input[name=keyword]").val($('.navbar-form input').val());
        $("#search_form input[name=fromdate]").val($('#txtfromdate').val());
        $("#search_form input[name=todate]").val($('#txttodate').val());
        $("#search_form").submit();
    }
</script>
<?php endblock() ?>
<?php startblock('bodycontent') ?>
<form method='post' id="search_form" action=<?php echo site_url('Welcome/view_reservation') ?>
      <div class="input-group">
        <input type="hidden" name="fromdate"/>
        <input type="hidden" name="todate"/>
        <input type="hidden" name="keyword"/>
        <input type="hidden" name="sort_order"/>
    </div>  
</form>
<br>
<br>
<div class="body-nav">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <h1>遊艇預約</h1>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 headerrow">
                <button onclick="location.href = '<?php echo site_url('Welcome/add_reservation'); ?>'" type="button" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus-sign"></span> 新增</button>
            </div>
        </div>
    </div>
</div>
<div class="firefly-body">
    <div class="container">
        <?php
        if ($this->session->flashdata('message'))
            echo'<div class="alert alert-success">' . $this->session->flashdata('message') . '</div>';
        ?>
        <div class="row">
            <div class="col-md-12">
                <p><button type="button" class="btn btn-danger hide" id="deleteAllButton">删除所有</button></p>
            </div>
        </div>
        <div class="row">
            <table><thead>
                    <tr>
                        <th>
                            <div id="fromdate" class="input-append col-xs-4">
                                <input  data-format="yyyy-MM-dd" type="text" id="txtfromdate" value="<?php if(isset($fromdate)){echo $fromdate; } ?>" />
                                <span class="add-on">
                                    <i data-time-icon="icon-calendar" data-date-icon="icon-calendar">
                                    </i>
                                </span>
                            </div>
                        </th>
                        <th>
                            <div id="todate" class="input-append col-xs-4">
                                <input   data-format="yyyy-MM-dd" type="text" id="txttodate" value="<?php if(isset($todate)){echo $todate; } ?>" />
                                <span class="add-on">
                                    <i data-time-icon="icon-calendar" data-date-icon="icon-calendar">
                                    </i>
                                </span>
                            </div>
                        </th>
                      
                    </tr>
                </thead></table>



        </div><!--end of row-->
        <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.8.3/jquery.min.js">
        </script> 
        <script type="text/javascript" src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/js/bootstrap.min.js">
        </script>
        <script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.min.js">
        </script>
        <script type="text/javascript" src="http://tarruda.github.com/bootstrap-datetimepicker/assets/js/bootstrap-datetimepicker.pt-BR.js">
        </script>
        <script type="text/javascript">
            $(function () {
                $('#datetimepicker3').datetimepicker({
                    pickDate: false,
                    pickSeconds: false,
                    pick12HourFormat: true,
                    defaultDate: new Date(1979, 0, 1, 8, 0, 0, 0),
                });
                $('#datetimepicker4').datetimepicker({
                    pickDate: false,
                    pickSeconds: false,
                    pick12HourFormat: true,
                });
                /*start change here*/
                $('#fromdate').datetimepicker({
                    pickDate: true,
                    pickSeconds: false,
                }).on('changeDate', function(ev) {
                    submitForm();
                });
                $('#todate').datetimepicker({
                    pickDate: true,
                    pickSeconds: false,
                }).on('changeDate', function(ev) {
                    submitForm();
                });
                /*End Here*/ 
            });
        </script> 
        <div class="col-md-12">
            <form action="<?php echo base_url(); ?>index.php/welcome/deleteAllReservation" method="post" id="del_reservation" >
                <table class="table table-bordered">
                    <thead>
                        <tr style="max-height:40px; background-color: #999999" >
                            <th>
<!--                                change here-->
                                <input id="check_all" type="checkbox" class="check_all" />
                                <!--<label for="check1" style="width:10px;height:10px"></label>--></th>
							<th>登船及下船時間</th>
							<th>遊艇名稱</th>
							<th>船家</th>
							<th>客人姓名</th>
							<th>登船地點</th>
							<th>下船地點</th>
							<th>狀態</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($view_free_boat) && is_array($view_free_boat) && count($view_free_boat)) {
                            $i = 1;

                            foreach ($view_free_boat as $key => $free_reservation_data) {
                                ?>
                                <tr <?php
                                if ($i % 2 == 0) {
                                    echo 'class="even"';
                                } else {
                                    echo'class="odd"';
                                }
                                ?>>
                                    <td style="vertical-align:middle">
                                        <input type="checkbox" class="reserve_checkbox" name="ids[]" value="<?php echo $free_reservation_data['id']; ?>" />
                                        <!--<label for="check<?= 2 + $i ?>" style="width:10px;height:10px;vertical-align:middle"></label>-->
                                    </td>
                                    <td style="vertical-align:middle;width:180px"></td>
                                    <td style="vertical-align:middle"><?php echo $free_reservation_data['boat_name']; ?></td>
                                    <td style="vertical-align:middle"><?php echo $free_reservation_data['boat_owner']; ?></td>
                                    <td style="vertical-align:middle"></td>
                                    <td style="vertical-align:middle"></td>
                                    <td style="vertical-align:middle"></td>
                                    <td style="vertical-align:middle"></td>
                                    <td style="vertical-align:middle"><a href="<?php echo site_url('Welcome/add_reservation/'); ?>"> <span class="glyphicon glyphicon-edit"></span> </a> <a href="<?php echo site_url('Welcome/delete_reservation/' . $data['id'] . ''); ?>"> <span class="glyphicon glyphicon-remove-sign"></span> </a></td>
                                </tr>
                                <?php
                                $i++;
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="9" align="center" >No Records Found..</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
                <table class="table table-bordered">
                    <thead>
                        <tr style="max-height:40px; background-color: #999999" >
                            <th>
                                <!--                                change here-->
                                <input id="check_all" type="checkbox" class="check_all" />
                                <!--<label for="check1" style="width:10px;height:10px"></label>--></th>
							<th>登船及下船時間</th>
							<th>遊艇名稱</th>
							<th>船家</th>
							<th>客人姓名</th>
							<th>登船地點</th>
							<th>下船地點</th>
							<th>狀態</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($view_reservation) && is_array($view_reservation) && count($view_reservation)) {
                            $i = 1;

                            foreach ($view_reservation as $key => $data) {
                                ?>
                                <tr <?php
                                if ($i % 2 == 0) {
                                    echo 'class="even"';
                                } else {
                                    echo'class="odd"';
                                }
                                ?>>
                                    <td style="vertical-align:middle">
                                        <input type="checkbox" class="reserve_checkbox" name="ids[]" value="<?php echo $data['id']; ?>" />
                                        <!--<label for="check<?= 2 + $i ?>" style="width:10px;height:10px;vertical-align:middle"></label>-->
                                    </td>
                                    <td style="vertical-align:middle;width:180px"><?php echo $data['fromdate']; ?>, <?php echo $data['fromtime']; ?> <br>
                                        至<br>
        <?php echo $data['todate']; ?>, <?php echo $data['totime']; ?></td>
                                    <td style="vertical-align:middle"><?php echo $data['boatname']; ?></td>
                                    <td style="vertical-align:middle"><?php echo $data['boat_owner']; ?></td>
                                    <td style="vertical-align:middle"><?php echo $data['clientname']; ?></td>
                                    <td style="vertical-align:middle"><?php echo $data['boardinglocation']; ?></td>
                                    <td style="vertical-align:middle"><?php echo $data['offlocation']; ?></td>
                                    <td style="vertical-align:middle"><?php echo $data['status']; ?></td>
                                    <td style="vertical-align:middle"><a href="<?php echo site_url('Welcome/edit_reservation/' . $data['id'] . ''); ?>"> <span class="glyphicon glyphicon-edit"></span> </a> <a href="<?php echo site_url('Welcome/delete_reservation/' . $data['id'] . ''); ?>"> <span class="glyphicon glyphicon-remove-sign"></span> </a></td>
                                </tr>
                                <?php
                                $i++;
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="7" align="center" >No Records Found..</td>
                            </tr>
                            <?php
                        }
                        ?>
                    </tbody>
                </table>
            </form>
            <div style="width:100%;height:150px;"></div>
        </div>
    </div>
</div>
</div>
<!--end container-->
<script type="text/javascript">
    $(document).ready(function () {
        $('#menu_reservation').addClass('active');
        //change here
        $('.check_all').click(function (event) {  //on click 
            if (this.checked) { // check select status
                $('.reserve_checkbox').each(function () { //loop through each checkbox
                    this.checked = true;  //select all checkboxes with class "checkbox1"               
                });

            } else {
                $('.reserve_checkbox').each(function () { //loop through each checkbox
                    this.checked = false; //deselect all checkboxes with class "checkbox1"                       
                });

                $('#deleteAllButton').addClass('hide');
            }

            showHideDelete();
        });

        $('input[name="ids[]"]').on('change', function () {
            showHideDelete();
        });

        $('#deleteAllButton').on("click", function () {
            if (confirm("您确定???删除所有预订???？"))
            {
                document.getElementById('del_reservation').submit();
            }
        });

    });

    function showHideDelete() {
        if ($('input[name="ids[]"]:checked').length > 1)
            $('#deleteAllButton').removeClass('hide');
        else if ($('input[name="ids[]"]:checked').length == 0)
        {
            $("#check_all").prop("checked", false);
        } else
            $('#deleteAllButton').addClass('hide');
    }
</script>

<?php endblock() ?>
<? end_extend() ?>
