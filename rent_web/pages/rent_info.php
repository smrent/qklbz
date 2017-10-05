<?
	error_reporting(E_ALL & ~E_NOTICE);
	$house_rent_id=$_GET['house_rent_id'];
	
	//echo $house_rent_id;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>出租详情</title>

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link href="../css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/rent_info_main.css">
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/jquery.more.js"></script>
		<script type="text/javascript">
		$(function(){
			var house_rent_id=$(" input[ name='house_rent_id' ] ").val();
			//alert(house_rent_id);
			$('#more').more({'address': '../php/rentWant.php?house_rent_id='+house_rent_id})
			//alert('111');
		});
		</script>
</head>
<body>
<header>
    <!--搜索链接跳转-->
    <div class="nav-btn nav-return">
        <a href="../index.html">
            <i class="fa fa-chevron-left fa-2x" aria-hidden="true"></i>
            <div class="return">返回</div>
        </a>
    </div>
</header>

<div class=" body">
  <!--租房信息-->
  <!--<a href="../pages/rent_info.html" class="content-box">-->
  <? echo "<input type='hidden' value='$house_rent_id' name='house_rent_id'/>"; ?>
	<a class="content-box">
    <?
    //$sql=mysql_query("SELECT username FROM zhubo WHERE ID='$search_word'");
		//$count=mysql_num_rows($sql);
		//if($count==0){
			//echo "<script>alert('没有该ID对应的主播');location.href='$href';</script>";
			//exit;
		//}else{
		include_once("../php/connect.php");
		//$rows = mysql_num_rows(mysql_query("SELECT * FROM house_rent where id='$house_rent_id'")); 
  	$sql = "SELECT * FROM house_rent where id='$house_rent_id'";
  	$rst = mysql_query($sql); 
		while ($row = mysql_fetch_array($rst)){
			$cover_img=$row["cover_img"];
			$pic_number=$row["pic_number"];
			$pic_number=$pic_number."图";
			$title=$row["title"];
			$district=$row["district"];
			$room_type=$row["room_type"];
			$area=$row["area"];
			$rent_type=$row["rent_type"];
			$view=$row["view"];
			$want=$row["want"];
			$price=$row["price"];
			$content=$row["content"];
			$user_id=$row["user_id"];
			//房间图片 float
			echo "<div class='pic-wrapper float-left pic-footer'>";
			echo "<img class='room-pic' src='$cover_img' alt='' style='width:100%;height:100%;'>";
			//echo "<img class='room-pic' src='../images/1.jpg' alt=''>";
			echo "<span class='pic-number'>$pic_number</span>";
			echo "</div>";
			
			//房源标题 float
			echo "<div class='content-wrapper float-left'>";
			echo "<h4>$title</h4>";
			//房间属性简介 block 垂直排列
			echo "<div class='abstract'>";
			echo "<ul class='room-info'>";
			echo "<li id='district'>$district</li>";
			echo "<li id='house-type' class='text-center'>$room_type".$area."m²</li>";
			echo "<li id='rent-type' class='text-right'>$rent_type</li>";
			echo "</ul>";
			echo "</div>";
			echo "<div class='state'>";
			echo "<ul class='state-info'>";
			
			//房源状态描述
			echo "<li>";
			echo "<i class='fa fa-eye' aria-hidden='true'></i>";
			echo "<span id='watcher'>$view</span>";
			echo "</li>";
			echo "<li class='text-center'>";
			echo "<i class='fa fa-thumbs-o-up' aria-hidden='true'></i>";
			echo "<spqn id='want'>$want</spqn>";
			echo "</li>";
			echo "<li id='price' class='text-right'>$price/月</li>";
			echo "</ul>";
			echo "</div>";
			echo "</div>";
			echo "</a>";
			//echo "<hr>";
			$rows2 = mysql_num_rows(mysql_query("SELECT * FROM user where id='$user_id'")); 
	  	$sql2 = "SELECT * FROM user where id='$user_id'";
	  	$rst2 = mysql_query($sql2); 
			while ($row2 = mysql_fetch_array($rst2)){
				$headimg=$row2["headimg"];
				//echo $headimg;
			}
    	echo "<div class='owner-info'>";
			echo "<div class='pic-wrapper'>";
			echo "<img src='$headimg' alt='房东'>";
			//echo "<div class='verify'><i class='fa fa-user-o'></i>已实名</div>";
			echo "<a href='#'>";
			echo "<small>点击了解房东</small>";
			echo "</a>";
			echo "</div>";
			echo "<div class='room-desc'>";
			echo "<p>$content</p>";
			echo "</div>";
			echo "</div>";
			echo "<hr>";
		}
    ?>
    <?
    $rs=mysql_query("SELECT count(*) FROM `rent_want` WHERE house_rent_id = '$house_rent_id'");
		if ($rs){//$rs为true才去取
			$myrow = mysql_fetch_array($rs);
			$numrows=$myrow[0];
		}
		
	
    ?>
    <div class="roomer-want">
        <div>想租该房子的房客<? echo $numrows; ?></div>
        <a href="#">我也想租！<i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
    </div>
    
    <div id="more">
        <div class="single_item"><!--onclick="alert(this.innerHTML);"-->
	        <div class="roomer-info">
	            <div class="pic-wrapper ">
	                <img src="../pic_people/owner1.jpg" alt="XXX">
	                <!--<div class="verify"><i class="fa fa-user-o"></i></div>-->
	            </div>
	            <div class="star-box smID">
		              <div>
		                  <small>微信号：</small>
		                  <small class="smID"><span class="wechat"></span></small>
		              </div>
		              <div>
		                  <small>水木ID：</small>
		                  <small class="smID"><span class="sm_id"></span></small>
		              </div>
		              <div>
		                  <small>毕业学校：</small>
		                  <small class="smID"><span class="university"></span></small>
		              </div>
		              <div>
		                  <small>所在行业：</small>
		                  <small class="smID"><span class="industry"></span></small>
		              </div>
		              <div class="star-box">
		                  <small>信息完整度：</small>
											<span class="star_sum"></span>
		              </div>
              </div>
	        </div>
	        <hr>
	      </div>
	      <a href="javascript:;" class="get_more" style="color:#007bc4/*#424242*/; text-decoration:none;outline: none;">::more::</a>
	  </div> 
  </div>


</div>

</body>
</html>