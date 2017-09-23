<?php
require_once('connect.php');

$last = $_GET['last'];
$amount = $_GET['amount'];
//echo "<script>alert('111');</script>";
$user = array('demo1','demo2','demo3','demo3','demo4');

//$rs=mysql_query("SELECT count(*) FROM `say` WHERE username like '%$search_word%' order by ID desc");
//if ($rs){//$rs为true才去取
//	$myrow = mysql_fetch_array($rs);
//	$numrows=$myrow[0];
//}


//$rs0=mysql_query("select max(ID) from pic_sheji");
//$maxid = mysql_fetch_array($rs0);

$query=mysqli_query($link,"select * from say order by id desc limit $last,$amount");
while ($row=mysqli_fetch_array($query)) {
	$sayList[] = array(
		'table_id'=>$row['id'],
		'district'=>$row['district'],
		'rent_type'=>$row['rent_type'],
		'room_type'=>$row['room_type'],
		'area'=>$row['area'],
		'price'=>$row['price'],
		'view'=>$row['view'],
		'want'=>$row['want'],
		'content'=>$row['content'],
		'cover_img'=>$row['cover_img'],
		'author'=>$user[$row['userid']],
		'date'=>date('m-d H:i',$row['addtime'])
      );
}
echo json_encode($sayList);
?>