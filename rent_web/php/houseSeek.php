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

$query=mysql_query("select * from houseseek order by id desc limit $last,$amount");
while ($row=mysql_fetch_array($query)) {
	$sayList[] = array(
		'table_id'=>$row['id'],
		'user_headimg'=>$row['user_headimg'],
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