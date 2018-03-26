<?php
//发布出租php
echo '<pre>';
print_r($_POST);
print_r($_FILES);
echo '</pre>';
//$ip=getRealIp();//获取当前IP
//echo $ip;
//exit;
error_reporting(E_ALL & ~E_NOTICE);
date_default_timezone_set(PRC);  
$mysqli = new mysqli('localhost', 'root', 'root', 'demo');

$mysqli->query("SET NAMES utf8");

$contact=$_POST['contact'];
$about=$_POST['about'];

$content=$about;
//$title=mb_substr($about,0,26,'utf-8');

$time=time(); //获取当前时间
$ip=getRealIp();//获取当前IP
//信息为空的post过来了
if ($contact == ""){//$rs为true才去取
	echo "<script>alert('请输入感谢对象');window.location.href='../tools/publish.html';</script>";
	exit;
}
if ($about == ""){//$rs为true才去取
	echo "<script>alert('请输入感谢留言');window.location.href='./tools/publish.html';</script>";
	exit;
}
//ip被封禁
$rs=$mysqli->query("SELECT * FROM `forbid_ip` WHERE ip = '$ip'");
if ($rs){//$rs为true才去取
	$numrows_ip_forbid=mysqli_num_rows($rs);
	if($numrows_ip_forbid > 0){
		echo "<script>alert('IP被封禁，请联系公众号区块链帮助');window.history.go(-1);</script>";
		exit;
    }
}

//内容重复
$rs=$mysqli->query("SELECT * FROM `house_seek` WHERE content = '$content'");
if ($rs){//$rs为true才去取
	$numrows_content=mysqli_num_rows($rs);
	if($numrows_content > 0){
		echo "<script>alert('感谢留言重复');window.history.go(-1);</script>";
		exit;
    }
}

//判断被感谢人是否在连萌里
$rs=$mysqli->query("SELECT * FROM `user` WHERE user_name = '$contact' and is_show = 1");
//$rs=$mysqli->query("SELECT * FROM `house_seek` WHERE ip = '$ip' LIMIT 0, 1");
if ($rs){//$rs为true才去取
	$numrows_ip_house_seek=mysqli_num_rows($rs);
	//echo "<script>alert('$numrows_ip_house_seek');</script>";
}
if($numrows_ip_house_seek > 0){//被感谢人在连萌里
    $rs0=$mysqli->query("select max(ID) from `house_seek`");
	$row0=$rs0->fetch_assoc();
	$maxid=$row0['max(ID)'];
	$maxid++;
	
	$rs1=$mysqli->query("select headimg from `user` WHERE user_name = '$contact' and is_show = 1");
	$row1=$rs1->fetch_assoc();
	$headimg=$row1['headimg'];

	$sql2="UPDATE user SET ganxie = ganxie + 1 where user_name = '$contact' and is_show = 1";
	$result2 = $mysqli->query($sql2);
	//echo "<script>alert('$maxid')</script>";
	//exit;
	//该IP没发布过出租
	$sql="INSERT INTO house_seek (id,ip,contact,content,headimg,addtime) VALUES ($maxid,'$ip','$contact','$content','$headimg','$time')";
	if($result = $mysqli->query($sql)){
	    echo "<script>alert('发布成功！');location.href = '../index.php'</script>";
	}else{
	    echo "<script>alert('发布失败！请重新发布！');window.history.go(-1);</script>";
	}
}else{//被感谢人不在连萌里
	echo "<script>alert('被感谢人不在连萌里');window.history.go(-1);</script>";
	exit;
}
	
function getRealIp(){
    $ip=false;
    if(!empty($_SERVER["HTTP_CLIENT_IP"])){
        $ip = $_SERVER["HTTP_CLIENT_IP"];
    }
    if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ips = explode (", ", $_SERVER['HTTP_X_FORWARDED_FOR']);
        if ($ip) { array_unshift($ips, $ip); $ip = FALSE; }
        for ($i = 0; $i < count($ips); $i++) {
            if (!eregi ("^(10│172.16│192.168).", $ips[$i])) {
                $ip = $ips[$i];
                break;
            }
        }
    }
    return ($ip ? $ip : $_SERVER['REMOTE_ADDR']);
}
//echo getRealIp();

exit;
?>