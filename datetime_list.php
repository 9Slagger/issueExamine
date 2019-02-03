<?php 
  include 'config.php';
  include ('html_head.php');

  $yeartest = '';
    $term = '';
    $name_type = '';
    $datestart = '';
    $dateend = '';
    
    if(isset($_POST["yeartest"])){
        $yeartest = $_POST["yeartest"];
        $term = $_POST["term"];
        $name_type = $_POST["name_type"];
        $datestart = $_POST["datestart"];
        $dateend = $_POST["dateend"];
       
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

<title>จัดการวันที่และเวลาคุมสอบ[</title>
</head>
<body>



<?php

  ini_set('display_errors', 1);
  error_reporting(~0);

  $strKeyword = null;

  if(isset($_POST["search"]))
  {
    $strKeyword = $_POST["search"];
  }
?>



          <form class="form-inline" method="post" action="<?php echo $_SERVER['SCRIPT_NAME'];?>">
              <input class="form-control mr-sm-2" type="text" name="search" id="search" placeholder="Search" aria-label="Search" value="">
              <button class="btn btn-outline-success my-2 my-sm-0" type="submit"  name="submit">Search</button>
            </form>
            <form class="form-inline">
              <a class="btn btn-outline-primary " href="frm_insert_mlist.php" role="button">+เพิ่มวันเวลาคุมสอบ</a>&nbsp;
            </form>
              <form class="form-inline">
              <label>วันที่เริ่มสอบ :   <?php echo $datestart ?></label>
              <label> วันที่สิ้นสุด : <?php echo $dateend ?></label>
            </form>




            <form method="post" action="savedatetime_list.php">
            <tr><td> <input type="text" name="end" id="end" disabled="disabled" value="<?php echo $yeartest; ?>" style="width:100px">
<input type="text" name="end" id="end" disabled="disabled" style="width:100px" value="<?php echo $term; ?>">
<input type="text" name="end" id="end" disabled="disabled" style="width:100px" value="<?php echo $name_type; ?>"> </tr>
  <tr>
            <?php
require ('config.php');
 
  /*$time = strtr($datestart, '/','-');
  $newformat = date('d/m/Y',strtotime($time.' +1 day'));
  $ttime = strtr($dateend, '/','-');
  $eventstarttime = strtotime($newformat.' +1 day');
  $format = strtotime('d/m/Y',$eventstarttime);

  
    /*$current = strtr( $datestart, '/','-');
    $newformat = date('d/m/Y',strtotime($current.' +1 day'));
    $last = strtr( $dateend, '/','-');
    $format = ($newformat $last);
    
 
$sql = "SELECT
	datetime_default.time_start,
	datetime_default.time_end 
FROM
	datetime_default";

$result = mysqli_query($con,$sql);

mysqli_set_charset($con ,"utf8");
while ($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
{
*/

  ?>

<?php



$sql = "SELECT * FROM datetime_default";

$result = mysqli_query($con,$sql);

mysqli_set_charset($con ,"utf8");
// Start date
$date = '2018-10-19';
// End date
$end_date = '2018-10-23';

while (strtotime($date) <= strtotime($end_date)) {
            echo "<br>";
            echo "$date\n"; 
            $d = new DateTime( $date );
            date_modify($d,"+1 days");
            $date = $d->format( 'Y-m-d' );
      ?>
      <table>
  <thead>
    <tr>
      <th>เวลาคุมสอบ</th>
      <th>จำนวนผู้คุม</th>
      <th>จัดการห้อง</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>10.00</td>
      <td>3</td>
      <td><button>ลบ</button></td>
    </tr>
    <tr>
      <td>12.00</td>
      <td>3</td>
      <td><button>ลบ</button></td>
    </tr>
  </tbody>
</table>

<?php
   }
?>

<div class="row">
      <input type="submit" value="บันทึก">
    </div>   
    </form>

        </div>       
</body>

</html>