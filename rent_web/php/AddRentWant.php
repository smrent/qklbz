<?php
error_reporting(E_ALL & ~E_NOTICE);
require_once('connect.php');
date_default_timezone_set(PRC);  
$wechat_openid=$_GET['wechat_openid'];
$house_rent_id=$_GET['house_rent_id'];
$time=time(); //获取当前时间
$sql=mysql_query("select id from user where wechat_openid='$wechat_openid'");
$count_wechat_openid=mysql_num_rows($sql);

if($count_wechat_openid==0){//未验证 前往验证 填写手机号和微信号之后 mobile wechat wechat_openid插入到user里 
	//echo "<script>alert('$wechat_openid');</script>";
	echo "<script>alert('请先进行验证');</script>";
	echo "<script>location.href='../pages/verity_info.html';</script>";
}else{
	//echo "<script>alert('$wechat_openid');</script>";
	//echo "<script>alert('已验证');</script>";
	$sql2 = "SELECT * FROM user where wechat_openid='$wechat_openid'";
	$rst2 = mysql_query($sql2); 
	while ($row2 = mysql_fetch_array($rst2)){
		$user_id=$row2["id"];
	}
	
	$sql3=mysql_query("select id from rent_want where user_id	='$user_id'");
	$count_user_id=mysql_num_rows($sql3);
	if($count_user_id!=0){//已验证 但是已经点过想租了
		//echo "<script>alert('$wechat_openid');</script>";
		echo "<script>alert('已添加过想租！');</script>";
		echo "<script>location.href='../pages/rent_info.php?house_rent_id=$house_rent_id';</script>";
	}else{
		$rs0=mysql_query("select max(ID) from rent_want");
		$maxid = mysql_fetch_array($rs0);
		$maxid = $maxid[0];
		$maxid++;
		
		$sql_in = "insert into rent_want (id,user_id,house_rent_id,addtime) values ($maxid,'$user_id','$house_rent_id','$time')";
		$result=mysql_query( $sql_in);
		if($result){
			echo "<script>alert('想租成功！');</script>";
			echo "<script>location.href='../pages/rent_info.php?house_rent_id=$house_rent_id';</script>";
		}else{
			echo "<script>alert('想租失败！请重试！');</script>";
			echo "<script>location.href='../pages/rent_info.php?house_rent_id=$house_rent_id';</script>";
		}
	}
}
?>