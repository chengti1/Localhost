<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Just a Test Website</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <script src="//code.jquery.com/jquery-1.10.2.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="http://landtechnology.com.hk/projects/boat/css/override.bootstrap.css">
  <link rel="stylesheet" href="http://landtechnology.com.hk/projects/boat/css/firefly.css"> 



<div class="body-nav">
  <div class="container">
        <div align="center"> 
            <a href="<?php echo site_url('Welcome/add_reservation'); ?>">Click to add new Record</a>
        </div>    
    <div class="row">
      <div class="col-md-8 col-sm-8 col-xs-8">
        <h1>遊艇</h1>
      </div>
      <div class="col-md-4 col-sm-4 col-xs-4">
        <button onclick="location.href='index.php?show=new-yacht'" type="button" class="btn btn-primary pull-right"><span class="glyphicon glyphicon-plus-sign"></span> 新增</button>
      </div> 
    </div>
  </div>
</div>
<br>
<div class="container hidden-xs">

<table class="table">
<thead>
      <tr >
        <th></th>
        <th>      
        <label for="shipper">船家</label>
        <select class="form-control" id="shipper">
        <option>a</option>
        <option>b</option>
        <option>c</option>
        <option>d</option>
           </select>
           </th>
        <th></th>
        <th>
          <label for="rent">租金</label>
        <select class="form-control" id="rent">
        <option>1</option>
        <option>2</option>
        <option>3</option>
        <option>4</option>
        </select>
           </th>
        <th>        <label for="status">狀態</label>
        <select class="form-control" id="status">
        <option>ok</option>
        <option>not ok</option>
      </select>      </th>
        <th></th>
      </tr>
    </thead>


  </table>
<table class="table table-bordered">
    <thead>
      <tr>
        <th>圖像</th>
        <th>船家</th>
        <th>概要</th>
        <th>租金</th>
        <th></th>        
        <th></th>
      </tr>
    </thead>
   <!--  <tbody>
  <?php for($i=0;$i<6;$i++):?>
      <tr>
        <td><a href="index.php?show=reservation"><img src="images/abc.jpg" height="150" width="200"></div></td>
        <td>abc</td>
        <td>
    <button type="button" class="btn btn-success">25 <img src="images/human.png" alt="human" height="21" width="8"></button>
    <button type="button" class="btn btn-success"><img src="images/wifi.png" alt="wifi" height="21" width="21"></button>
    <button type="button" class="btn btn-success"><img src="images/cook.png" alt="cook" height="21" width="21"></button>
    <button type="button" class="btn btn-success"><img src="images/singing.png" alt="singing" height="21" width="21"></button>
    </td>
        <td>HKD123</td>
        <td>ok</td>
        <td>       
        <a href="#">
          <span class="glyphicon glyphicon-edit"></span>
        </a>
        <a href="#">
          <span class="glyphicon glyphicon-remove-sign"></span>
        </a>
        </td>
      </tr>
    <?php endfor;?>
    </tbody> -->

    <tbody>
            <?php
                if(isset($view_data) && is_array($view_data) && count($view_data)): $i=1;
                foreach ($view_data as $key => $data) { 
              ?>
              <tr <?php if($i%2==0){echo 'class="even"';}else{echo'class="odd"';}?>>
                  <td><img style="width:200px;height:100px" src="<?php echo base_url('uploads/'. $data['id'].'.jpeg'); ?>" /></td>
                  <td><?php echo $data['cname']; ?></td>            
                  <td><?php echo $data['company']; ?></td>
                  <td><?php echo $data['status']; ?></td>
                  <td><?php echo $data['contactperson']; ?></td>
                  <td><a href="<?php echo site_url('Welcome/edit_reservation/'. $data['id'].''); ?>">Edit</a>            
                  <a href="<?php echo site_url('Welcome/delete_data/'. $data['id'].''); ?>">Delete</a></td>
              </tr>
                <?php
                    $i++;
                      }
                  else:
                ?>
              <tr>
                    <td colspan="7" align="center" >No Records Found..</td>
                </tr>
                <?php
                endif;
              ?>

          </tbody>        
  </table>
</div>
<?php for($i=0;$i<6;$i++):?>
<div class="container hidden-lg hidden-md hidden-sm">
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
</div>
<?php endfor;?>

</div>