<?php
//求租搜索结果页seekhouse_search.php的数据文件data_seekhouse_search.php
//require_once('connect.php');
error_reporting(E_ALL & ~E_NOTICE);
$mysqli = new mysqli('localhost', 'root', 'root', 'demo');

$mysqli->query("SET NAMES utf8");


$last = $_POST['last'];
$amount = $_POST['amount'];
//echo "<script>alert('111');</script>";
$user = array('demo1','demo2','demo3','demo3','demo4');
$keyword=$_GET['keyword'];

$keyword_get=$_GET['keyword'];

$sql="select * from house_seek where contact = '$keyword' and is_show = 1 order by (set_top = 1) desc, addtime desc limit $last,$amount";
		//$bianhao="<span style='color:red;'>C".$keyword."</span>";


//$sql="select * from house_rent where rent_type = '$keyword' order by id desc limit $last,$amount";
//$sql="select * from house_rent where rent_type = '$rent_type' order by id desc limit $last,$amount";
//$sql="select * from house_rent where rent_type = '$rent_type' order by id desc limit $last,$amount";
//$sql="select * from house_rent where id = '$keyword_id' order by id desc limit $last,$amount";
$result=$mysqli->query($sql);
while ($row=$result->fetch_array(MYSQLI_ASSOC)) {
  $house_seek_id=$row['id'];
	
	//$contact=$row['contact'];
	
//	$sql2="select * from verify where contact = '$contact'";	
//	$result2=$mysqli->query($sql2);
//	$row2=$result2->fetch_assoc();
//	$xueye=$row2['xueye'];
//	if($xueye==""){
//		$xueye=$row['xueye'];
//	}
	$contact=$row['contact'];
	$rs1=$mysqli->query("select ganxie from `user` WHERE user_name = '$contact' and is_show = 1");
	$row1=$rs1->fetch_assoc();
	$follow=$row1['ganxie'];
	$headimg="../".$row['headimg'];
//	if($cover_img == ""){
//		 $cover_img="../images/cover_img/".$district.".jpg";
//	}

	
	$set_top=$row['set_top'];
	$content=$row['content'];
	
	$title=$row['title'];
	$title="感谢：".$contact;

	if($set_top == 1){//置顶 标题加置顶标识符
		//$content="<i class='fa fa-arrow-up' aria-hidden='true' style='color:red;'></i><span>".$content."</span>";
		$title="<i class='fa fa-arrow-up' aria-hidden='true' style='color:red;'></i><span>".$title."</span>";	
	}
	
	
	$time0=$row['addtime'];
	$time1=format_date($time0);
	$passtime=$time1;

	$sayList[] = array(
		'content-box'=>$row['id'],//house_rent_id
		'house_rent_id'=>$bianhao,
		//'district'=>$district,
		//'district'=>$district,
		//'rent_type'=>$row['rent_type'],
		//'rent_type'=>$rent_type,
		//'room_type'=>$row['room_type'],
		//'room_type'=>$room_type,
		'xueye'=>$row['xueye'],
		//'price'=>$price,
		'follow'=>$follow,
		'title'=>$title,
		'content'=>$content,
		//'room-pic'=>$row['cover_img'],
		//'star_sum'=>$row2['star_sum'],
		//'set_top'=>$row['set_top'],//防止别人用已验证手机号发帖，所以搜索和出租列表，都以set_top是否以1来区分是否验证
		'subway'=>$subway,
		//'yanzheng'=>$yanzheng,
		'pic-wrapper-float'=>$headimg,
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