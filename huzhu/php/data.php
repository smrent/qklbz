<?php
//首页index.php无限加载数据文件
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

//$query=mysql_query("select * from house_rent order by id desc limit $last,$amount");
//$query=$mysqli->query("select * from house_rent order by id desc limit $last,$amount");
$sql="select * from house_rent where is_show = 1 order by (set_top = 1) desc, addtime desc limit $last,$amount";
$result=$mysqli->query($sql);
//while ($row=mysql_fetch_array($query)) {
//	$sayList[] = array(
//		'content-box'=>$row['id'],//house_rent_id
//		'district'=>$row['district'],
//		'rent_type'=>$row['rent_type'],
//		'room_type'=>$row['room_type'],
//		'price'=>$row['price'],
//		'view'=>$row['view'],
//		'want'=>$row['want'],
//		'title'=>$row['title'],
//		'content'=>$row['content'],
//		'room-pic'=>$row['cover_img'],
//		'author'=>$user[$row['user_id']],
//		'date'=>date('m-d H:i',$row['addtime'])
//      );
//}
while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
	$house_rent_id=$row['id'];
	$bianhao='C'.$house_rent_id;
	$rs_want=$mysqli->query("SELECT * FROM rent_want where house_rent_id='$house_rent_id'");
	if ($rs_want){//$rs为true才去取
		$want=mysqli_num_rows($rs_want);
	}
	$cover_img=$row['cover_img'];
	$district=$row['district'];
	if($cover_img == ""){
		 $cover_img="images/cover_img/".$district.".jpg";
	}
	//$title=$row['title'];
	$content=$row['content'];
	if($row['title']==""){
		$title=mb_substr($content,0,26,'utf-8');
	}else{
		$title=$row['title'];
	}
	
	$set_top=$row['set_top'];
	if($set_top == 1 ){
		$title="<i class='fa fa-arrow-up' aria-hidden='true' style='color:red;'></i><span>".$title."</span>";	
	}
	$w_or_m=$row['w_or_m'];
	$contact=$row['contact'];
	
	$district=$row['district']."/帮扩".$row['rent_type']."次";
	$time0=$row['addtime'];
	$time1=format_date($time0);
	$passtime=$time1;
	$sayList[] = array(
		'content-box'=>$row['id'],//house_rent_id
		'house_rent_id'=>$bianhao,
		'district'=>$district,
		//'rent_type'=>$row['rent_type'],
		//'room_type'=>$row['room_type'],
		'price'=>$row['price'],
		//'view'=>$row['view'],
		'want'=>$want,
		'title'=>$title,
		'w_or_m'=>$w_or_m,
		'contact'=>$contact,
		'content'=>$row['content'],
		'pic-wrapper-float'=>$cover_img,
		//'author'=>$user[$row['user_id']],
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