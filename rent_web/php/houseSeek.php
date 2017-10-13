<?php
require_once('connect.php');

$last = $_POST['last'];
$amount = $_POST['amount'];
//echo "<script>alert('111');</script>";
$user = array('demo1','demo2','demo3','demo3','demo4');

//$rs=mysql_query("SELECT count(*) FROM `say` WHERE username like '%$search_word%' order by ID desc");
//if ($rs){//$rs为true才去取
//	$myrow = mysql_fetch_array($rs);
//	$numrows=$myrow[0];
//}


//$rs0=mysql_query("select max(ID) from pic_sheji");
//$maxid = mysql_fetch_array($rs0);
//求租query
$query=mysql_query("select * from house_seek order by id desc limit $last,$amount");
//用户信息


while ($row=mysql_fetch_array($query)) {
	//通过user_id去去user信息
	$user_id=$row['user_id'];
	$rows2 = mysql_num_rows(mysql_query("SELECT * FROM user where id='$user_id'")); 
	$sql2 = "SELECT * FROM user where id='$user_id'";
	$rst2 = mysql_query($sql2); 
	while ($row2 = mysql_fetch_array($rst2)){
		$headimg=$row2["headimg"];
	}
	$sayList[] = array(
		'content-box-houseSeek'=>$row['id'],
		'user_headimg'=>$headimg,
		'district'=>$row['district'],
		'room_type'=>$row['room_type'],
		'rent_type'=>$row['rent_type'],
		'view'=>$row['view'],
		'follow'=>$row['follow'],	
		'subway'=>$row['subway'],
		'title'=>$row['title'],
		'date'=>date('m-d H:i',$row['addtime'])
      );
}
echo json_encode($sayList);
?>