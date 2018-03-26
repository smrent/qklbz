<?php
	//求租搜索php
	error_reporting(E_ALL & ~E_NOTICE);
//	echo '<pre>';
//	print_r($_GET);
//	print_r($_POST);
//	print_r($_FILES);
//	echo '</pre>';
//	exit;
    $keyword=$_GET['keyword'];
  
	$mysqli = new mysqli('localhost', 'root', 'root', 'demo');

	$mysqli->query("SET NAMES utf8");
	
 	$keyword_contact = $keyword;
	$rs_contact=$mysqli->query("SELECT * FROM house_seek where contact='$keyword_contact' and is_show = 1");
	$num_contact=mysqli_num_rows($rs_contact);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>水木租房子-求租搜索结果</title>
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link href="../css/main.css" rel="stylesheet">
		 <link href="../css/houseSeek_main.css" rel="stylesheet">
		<link rel="stylesheet" href="../css/rentout_search.css">
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/jquery.more.seekhouse_search.js"></script>
		<script type="text/javascript" src="../js/jquery.cookie.js"></script>
		<script type="text/javascript">
		$(function(){
			var keyword=$(" input[ name='keyword_post' ] ").val();
			var num_contact=$(" input[ name='num_contact' ] ").val();
			
			if(keyword!=""){//按关键字搜索
				//alert("rent_type为空");
				if(num_contact == 0){//关键字搜索，没有搜到结果 && rent_type ==""
					var innerHTML="<a class='content-box positon-relative'>没有找到该关键字对应的求租</a><br>您可以返回重新搜索";
					document.getElementById('more').innerHTML=innerHTML; 
				}else{
					$('#more').more({'address': '../php/data_search.php?keyword='+keyword})
				}
			}
			//var address_php='../php/data_user_rent.php?w_or_m='+w_or_m+'&contact='+contact+'&house_rent_id='+user_house_rent_id+'&user_want='+user_want;
			//alert(address_php);
			//$('#more').more({'address': '../php/data_rentout_search.php?keyword='+keyword+'&rent_type='+rent_type+'&district='+district+'&subway='+subway+'&room_type='+room_type})
			//alert('111');
		});
		//返回之前浏览位置
		 $(function () {
        var str = window.location.href;
        str = str.substring(str.lastIndexOf("/") + 1);
        if ($.cookie(str)) {
            $("html,body").animate({ scrollTop: $.cookie(str) }, 1000);
        }else {
        }
    })
    
    $(window).scroll(function () {
        var str = window.location.href;
        str = str.substring(str.lastIndexOf("/") + 1);
        var top = $(document).scrollTop();
        $.cookie(str, top, { path: '/' });
        return $.cookie(str);
    })
		</script>
</head>
<body>

<header>
    <div class="nav-btn nav-return">
			    	<a href='../tools/search.html'>
            <i class="fa fa-chevron-left fa-2x" aria-hidden="true"></i>
            <div class="return">返回</div>
        </a>
    </div>
    <div class="phone-info">
    <?php
    if($keyword != ""){
    	echo "<span>关键字搜索:</span><span style='color:red;'>".$keyword."</span>";
    }
    ?>
	  </div>
</header>
<br>
<div class=" body">
    <!--租房信息-->
    <div id="more">
        <div class="single_item"><!--onclick="alert(this.innerHTML);"-->
					<!--<a href="pages/rent_info.html" class="content-box">-->
					<?php echo "<input type='hidden' value='$keyword' name='keyword_post'/>"; ?>
					


					<?php echo "<input type='hidden' value='$num_contact' name='num_contact'/>"; ?>

					
				
					<a class="content-box positon-relative">
					<!--<a class="content-box">-->
						<!--房间属性简介_水平排列-->
            <div class="abstract">
                <ul class="room-info">
                	
                    <!--
                    <li id="district">
                        <span class="district"></span>
                    </li>
                    <li id="house-type" class="text-center">
                        <span class="room_type"></span>
                    </li>
                    <li id="rent-type" class="text-right">
                        <span class="rent_type"></span>
                    </li>
                    <li class="price">
                        <span><div class="xueye"></div></span>
                    </li>
                    -->
                </ul>
            </div>
						<!--房间图片 float-->
						<!--
		        <div class="pic-wrapper float-left">
		            <img class="room-pic" alt="">
		        </div>
		        -->
		    <div class="pic-wrapper-float" ></div>
		        <!--房源描述 float-->
           <div class="content-wrapper float-left">
			            <h4><div class="title"></div></h4>
			            <!--房间属性简介 block 垂直排列-->
						<div class="content"></div>
			            <div class="state">
			                <ul class="state-info">
			                    <!--关注人数-->
			                    <li>
			                        <i class="fa fa-heart" aria-hidden="true"></i>
			                        <span><div class="follow"></div></span>
			                    </li>
			                  
			                    <li class="text-right"><span class="passtime"></span></li>
			                    <!--
			                    <li>
			                        <span class="house_seek_id">
			                    </li>
			                    -->
			                </ul>
			            </div>
			        </div>
					<!--</a>-->
					</a>
					<hr>
        </div>
        <a href="javascript:;" class="get_more" style="color:#007bc4/*#424242*/; text-decoration:none;outline: none;">::more::</a>
  	</div> 
    
    


</div>
</body>
</html>