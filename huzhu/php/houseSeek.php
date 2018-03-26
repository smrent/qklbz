<?php
//求租列表houseSeek.html无限加载数据文件
//require_once('connect.php');
$mysqli = new mysqli('localhost', 'root', 'root', 'demo');
$mysqli->query("SET NAMES utf8");
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
//$query=mysql_query("select * from house_seek order by id desc limit $last,$amount");
////用户信息
//while ($row=mysql_fetch_array($query)) {
//	//通过user_id去去user信息
//	$user_id=$row['user_id'];
//	$rows2 = mysql_num_rows(mysql_query("SELECT * FROM user where id='$user_id'")); 
//	$sql2 = "SELECT * FROM user where id='$user_id'";
//	$rst2 = mysql_query($sql2); 
//	while ($row2 = mysql_fetch_array($rst2)){
//		$headimg=$row2["headimg"];
//	}
//	$sayList[] = array(
//		'content-box-houseSeek'=>$row['id'],
//		'user_headimg'=>$headimg,
//		'district'=>$row['district'],
//		'room_type'=>$row['room_type'],
//		'rent_type'=>$row['rent_type'],
//		'view'=>$row['view'],
//		'follow'=>$row['follow'],	
//		'subway'=>$row['subway'],
//		'title'=>$row['title'],
//		'date'=>date('m-d H:i',$row['addtime'])
//      );
//}

$sql="select * from house_seek where is_show = 1 order by (set_top = 1) desc, addtime desc limit $last,$amount";
$result=$mysqli->query($sql);
while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
	$house_seek_id=$row['id'];
	$bianhao='Q'.$house_seek_id;
	$contact=$row['contact'];
	$rs1=$mysqli->query("select ganxie from `user` WHERE user_name = '$contact' and is_show = 1");
	$row1=$rs1->fetch_assoc();
	$follow=$row1['ganxie'];
	
	$content=$row['content'];
	$contact=$row['contact'];
	//$title=mb_substr($content,0,26,'utf-8');
	$title="感谢：".$contact;
	$set_top=$row['set_top'];
	if($set_top == 1 ){
		$title="<i class='fa fa-arrow-up' aria-hidden='true' style='color:red;'></i><span>".$title."</span>";	
	}
	$subway=$row['subway'];
	if($subway=="不限"){
		$subway="地铁不限";
	}
	$district=$row['district']."/".$row['room_type']."/".$row['rent_type'];
	$time0=$row['addtime'];
	$time1=format_date($time0);
	$passtime=$time1;
	$sayList[] = array(
		'content-box'=>$row['id'],
		'house_seek_id'=>$bianhao,
		//'headimg'=>$row['headimg'],
		'pic-wrapper-float'=>$row['headimg'],
		'district'=>$district,
		//'room_type'=>$row['room_type'],
		//'rent_type'=>$row['rent_type'],
		//'view'=>$row['view'],
		'follow'=>$follow,
		'subway'=>$subway,
		'title'=>$title,
		'content'=>$content,
		'passtime'=>$passtime,
		'date'=>date('m-d H:i',$row['addtime'])
      );
}

echo json_encode($sayList);

function format_date($time){
		if(!is_numeric($time)){
			$time=strtotime($time);
		}
    $t=time()-$time;
    $f=array(
        '31536000'=>'年',
        '2592000'=>'个月',
        '604800'=>'星期',
        '86400'=>'天',
        '3600'=>'小时',
        '60'=>'分钟',
        '1'=>'秒'
    );
    foreach ($f as $k=>$v)    {
        if (0 !=$c=floor($t/(int)$k)) {
            //return '<span class="pink">'.$c.'</span>'.$v.'前';//&nbsp;
            return $c.$v.'前';//&nbsp;
        }
    }
}
?>