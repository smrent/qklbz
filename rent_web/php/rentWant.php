<?php
require_once('connect.php');

$last = $_POST['last'];
$amount = $_POST['amount'];
//echo "<script>alert('111');</script>";
$user = array('demo1','demo2','demo3','demo3','demo4');
$house_rent_id=$_GET['house_rent_id'];
//$rs=mysql_query("SELECT count(*) FROM `say` WHERE username like '%$search_word%' order by ID desc");
//if ($rs){//$rs为true才去取
//	$myrow = mysql_fetch_array($rs);
//	$numrows=$myrow[0];
//}


//$rs0=mysql_query("select max(ID) from pic_sheji");
//$maxid = mysql_fetch_array($rs0);

$query=mysql_query("select * from rent_want where house_rent_id='$house_rent_id' order by id desc limit $last,$amount");
while ($row=mysql_fetch_array($query)) {	
	$user_id=$row['user_id'];
	$house_rent_id=$row['house_rent_id'];
	$date=date('m-d H:i',$row['addtime']);
	
	$sql = "SELECT * FROM user where id='$user_id'";
  $rst = mysql_query($sql); 
	while ($row = mysql_fetch_array($rst)){
		$wechat=$row["wechat"];
		$sm_id=$row["sm_id"];
		$university=$row["university"];
		$industry=$row["industry"];
		$anticipation=$row["anticipation"];
		$star_sum=0;
		if($sm_id != ""){
			$star_sum++;
		}
		if($university != ""){
			$star_sum++;
		}
		if($industry != ""){
			$star_sum++;
		}
		if($anticipation != ""){
			$star_sum++;
		}
	}
	
	$sayList[] = array(
	  'wechat'=>$wechat,
	  'sm_id'=>$sm_id,
	  'sm_a'=>$sm_id,
	  'star_sum'=>$star_sum,
		'user_id'=>$user_id,
		'house_rent_id'=>$house_rent_id,
		'date'=>$house_rent_id
      );
}
echo json_encode($sayList);
?>