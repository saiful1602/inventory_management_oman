<?php   

include("../../../DBconfig.php");

	$datepicker=$_GET['datepicker'];
	$query="SELECT `amount`,`date`,`refDate` FROM `cash_transfer` WHERE `date`='$datepicker'";
	$q=mysqli_query($con, $query);
	if(mysqli_num_rows($q) > 0){

		$row=mysqli_fetch_assoc($q);
		$arr = array(
			'amount' => $row['amount'],
			'date' => $row['date'],
			'refDate' => $row['refDate']
		);			
			
	}else{
		$arr = array(
			'amount' => '',
			'date' => '',
			'refDate' => ''
		);
	}

	echo json_encode($arr);

?>