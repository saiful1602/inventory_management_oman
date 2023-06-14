<?php
include("DBconfig.php");
$id=$_SESSION['id'];
$i=$id;
$query="SELECT *FROM `accounts`";
$result=mysqli_query($con, $query);

$query2="SELECT *FROM `admin_panel`";
$result2=mysqli_query($con, $query2);

$time=time();
$html='';
while($row=mysqli_fetch_assoc($result)){
      $date2 = date('d-m-Y', $row['last_login']);
      $time2 = date('g:i A', $row['last_login']);

      $status='Offline';
      $class="btn-danger";
        if($row['time'] > $time){
        $status='Online';
        $class="btn-success";
       }
	$html.='<div class="col-sm-6 mb-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Logger : '. $row['first_name'] .'</h5>
                  <p class="card-title">Last Login : '. $date2 .'</p>
                  <p class="card-title">Time : '. $time2 .'</p>
                  <p class="card-title">Status : <button class="btn '. $class .'"> '.$status.'</button></p>
                </div>
              </div>
            </div>';
	$i++;
}
while($row2=mysqli_fetch_assoc($result2)){
      $date3 = date('d-m-Y', $row2['last_login']);
      $time3 = date('g:i A', $row2['last_login']);

      $status='Offline';
      $class="btn-danger";
        if($row2['time'] > $time){
        $status='Online';
        $class="btn-success";
       }
  $html.='<div class="col-sm-6 mb-3">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title">Admin : '. $row2['admin_name'] .'</h5>
                  <p class="card-title">Last Login : '. $date3 .'</p>
                  <p class="card-title">Time : '. $time3 .'</p>
                  <p class="card-title">Status : <button class="btn '. $class .'"> '.$status.'</button></p>
                </div>
              </div>
            </div>';
  $i++;
}
echo $html;
?>