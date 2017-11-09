<?php
//require_once('connect.php');
$mysqli = new mysqli('localhost', 'root', '123456', 'demo');
$last = $_POST['last'];
$amount = $_POST['amount'];
//echo "<script>alert('111');</script>";
$user = array('demo1','demo2','demo3','demo3','demo4');
$house_rent_id=$_GET['house_rent_id'];
//$rs=mysql_query("SELECT count(*) FROM `rent_want` WHERE house_rent_id = '$house_rent_id'");
//if ($rs){//$rs为true才去取
//	$myrow = mysql_fetch_array($rs);
//	$numrows=$myrow[0];
//}


//$rs0=mysql_query("select max(ID) from pic_sheji");
//$maxid = mysql_fetch_array($rs0);
$sql="select * from rent_want where house_rent_id = '$house_rent_id' order by id desc limit $last,$amount";
$result=$mysqli->query($sql);
while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
	$user_id=$row['user_id'];
	$house_rent_id=$row['house_rent_id'];
	$date=date('m-d H:i',$row['addtime']);
	
	$sql = "SELECT * FROM user where id='$user_id'";
  $rst=$mysqli->query($sql);
	while ($row = $rst->fetch_array(MYSQLI_ASSOC)){
		$wechat=$row["wechat"];
		$status=$row["status"];
		$mobile=$row["mobile"];
		$university=$row["university"];
		$industry=$row["industry"];
		$star_sum=0;
		if($status != ""){
			$star_sum++;
		}
		if($mobile != ""){
			$star_sum++;
		}
		if($university != ""){
			$star_sum++;
		}
		if($industry != ""){
			$star_sum++;
		}
		
		if($status==""){
			$status="未填写";
		}
		if($mobile==""){
			$mobile="未填写";
		}
		if($university==""){
			$university="未填写";
		}
		if($industry==""){
			$industry="未填写";
		}
	}

	$sayList[] = array(
	  'wechat'=>$wechat,
	  'mobile'=>$mobile,
	  'university'=>$university,
	  'industry'=>$industry,
	  'status'=>$status,
	  'star_sum'=>$star_sum,
		'user_id'=>$user_id,
		'house_rent_id'=>$house_rent_id,
		'date'=>$house_rent_id
      );
}
echo json_encode($sayList);
?>