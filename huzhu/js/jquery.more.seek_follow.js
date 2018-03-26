//var user_house_rent_id=$(" input[ name='house_rent_id' ] ").val();
(function( $ ){
		var user_wechat = null;//声明全局user_wechat
		var user_mobile = null;//声明全局user_mobile
		var user_house_rent_id = null;//声明全局user_house_rent_id
		//var user_house_seek_id = null;//声明全局user_house_seek_id
    var target = null;
    var template = null;
    var lock = false;
    var variables = {
        'last'      :    0        
    } 
    var settings = {
        'amount'      :   '10', //每次显示记录数          
        'address'     :   'comments.php',//请求后台的地址 
        'format'      :   'json',//数据传输格式 
        'template'    :   '.single_item',//html记录DIV的class属性 
        'trigger'     :   '.get_more',//触发加载更多记录的class属性
        'scroll'      :   'false',//是否支持滚动触发加载
        'offset'      :   '100',//滚动触发加载时的偏移量
        'spinner_code':   ''
    }
    
    var methods = {
        init  :   function(options){
            return this.each(function(){
              
                if(options){
                    $.extend(settings, options);
                }
                template = $(this).children(settings.template).wrap('<div/>').parent();//wrap包裹起来
                template.css('display','none')
                $(this).append('<div class="more_loader_spinner">'+settings.spinner_code+'</div>')//append追加html标记 loader.gif
                $(this).children(settings.template).remove()   
                target = $(this);
                if(settings.scroll == 'false'){                    
                    $(this).find(settings.trigger).bind('click.more',methods.get_data);//同时绑定多个事件类型/处理程序
                    $(this).more('get_data');
                }                
                else{
                    if($(this).height() <= $(this).attr('scrollHeight')){
                        target.more('get_data',settings.amount*2);
                    }
                    $(this).bind('scroll.more',methods.check_scroll);
                }
            })
        },
        check_scroll : function(){
            if((target.scrollTop()+target.height()+parseInt(settings.offset)) >= target.attr('scrollHeight') && lock == false){
                target.more('get_data');
            }
        },
        debug :   function(){
            var debug_string = '';
            $.each(variables, function(k,v){
                debug_string += k+' : '+v+'\n';
            })
            alert(debug_string);
        },     
        remove        : function(){            
            target.children(settings.trigger).unbind('.more');//unbind把所有段落的所有事件取消绑定
            target.unbind('.more')
            target.children(settings.trigger).remove();
        },
        add_elements  : function(data){
            //alert('adding elements')
            
            var root = target       
            //alert(root.attr('id')) //id是more
            var counter = 0;
//            var user_wechat;//声明全局user_wechat
//            var user_mobile;//声明全局user_mobile
//						var user_house_rent_id;//声明全局house_rent_id
//						var user_house_seek_id;//声明全局house_seek_id
            if(data){
                $(data).each(function(){//对于每个匹配的元素所要执行的函数
                	  //alert(JSON.stringify(data));
                	  //var user_house_rent_id=JSON.stringify(data);
                	  var obj1 = eval(data);
                	  //alert(obj1[0].house_rent_id);
                	  //alert(obj1[0].pic_rent_want);
                	  user_house_seek_id=obj1[0].house_seek_id;
                	  w_or_m=obj1[counter].w_or_m;
                	  //contact=obj1[0].contact;
                	  contact=obj1[counter].contact;
                	  xueye=obj1[counter].xueye;
                	  star_sum=obj1[counter].star_sum;
                	  gender=obj1[counter].gender;
                	  yanzheng_seek_follow=obj1[counter].yanzheng_seek_follow;
                	  //alert(contact);
                    counter++
                    var t = template                    
                    $.each(this, function(key, value){
                    	  if(t.find('.'+key)) {
                    	  	if(key == 'contact_show'){
                    	  		t.find('.'+key).html(value);
                    	  	}else if(key == 'pic_seek_follow'){//用户头像
                    	  		//alert(key);
	                    	  	if(t.find('.'+key)) t.find('.'+key).attr('src',value);
	                    	  	if(t.find('.'+key)) t.find('.'+key).attr('style','width:70%;height:70%;');
	                    		}else if(key == 'yanzheng_seek_follow'){//seek_follow是否验证
                    	  		//alert(key);
	                    	  	if(t.find('.'+key)) t.find('.'+key).html(value);
	                    		}else if(key == 'xueye'){//大学或行业
                    	  		//alert(value);
	                    	  	if(t.find('.'+key)) t.find('.'+key).html(value);
	                    		}else if(key == 'his_rent'){//他的出租
                    	  		//alert(value);
	                    	  	if(t.find('.'+key)) t.find('.'+key).html(value);
	                    		}else if(key == 'his_seek'){//他的求租
                    	  		//alert(value);
	                    	  	if(t.find('.'+key)) t.find('.'+key).html(value);
	                    		}else if(key == 'user_rent_num'){//用户出租房屋数目
                    	  		//alert(house_rent_id);
                    	  		if(value == 0){
                    	  			if(t.find('.'+key)) t.find('.'+key).html(value);
                    	  		}else{
                    	  			//alert(user_mobile);
															var href="../pages/user_rent.php?w_or_m="+w_or_m+"&contact="+contact+"&house_seek_id="+user_house_seek_id+"&gender="+gender;
                    	  			var innerhtml="<a style='color:blue;text-decoration:underline;' href='"+href+"'>"+value+"</a>";
															if(t.find('.'+key)) t.find('.'+key).html(innerhtml);
                    	  		}
	                    		}else if(key == 'user_seek_num'){//用户求租房屋数目
                    	  		//alert(value);
                    	  		if(value == 0){
                    	  			if(t.find('.'+key)) t.find('.'+key).html(value);
                    	  		}else{
                    	  			//alert(user_mobile);
															var href="../pages/user_seek.php?w_or_m="+w_or_m+"&contact="+contact+"&house_seek_id="+user_house_seek_id+"&gender="+gender;
                    	  			var innerhtml="<a style='color:blue;text-decoration:underline;' href='"+href+"'>"+value+"</a>";
															if(t.find('.'+key)) t.find('.'+key).html(innerhtml);
                    	  		}
	                    		}else if(key == 'star_sum'){//几星
                    	  		//alert(value);   
                    	  		if(star_sum=='0'){
	                    	  		var innerhtml="<div class='star'><i class='fa fa-star-o'></i></div><div class='star'><i class='fa fa-star-o'></i></div><div class='star'><i class='fa fa-star-o'></i></div><div class='star'><i class='fa fa-star-o'></i></div>";
	                    	  	}                	  		
	                    	  	if(star_sum=='1'){
	                    	  		var innerhtml="<div class='star'><i class='fa fa-star'></i></div><div class='star'><i class='fa fa-star-o'></i></div><div class='star'><i class='fa fa-star-o'></i></div><div class='star'><i class='fa fa-star-o'></i></div>";
	                    	  	}else if(star_sum=='2'){
	                    	  		var innerhtml="<div class='star'><i class='fa fa-star'></i></div><div class='star'><i class='fa fa-star'></i></div><div class='star'><i class='fa fa-star-o'></i></div><div class='star'><i class='fa fa-star-o'></i></div>";
	                    	  	}else if(star_sum=='3'){
	                    	  		var innerhtml="<div class='star'><i class='fa fa-star'></i></div><div class='star'><i class='fa fa-star'></i></div><div class='star'><i class='fa fa-star'></i></div><div class='star'><i class='fa fa-star-o'></i></div>";
	                    	  	}else if(star_sum=='4'){
	                    	  		var innerhtml="<div class='star'><i class='fa fa-star'></i></div><div class='star'><i class='fa fa-star'></i></div><div class='star'><i class='fa fa-star'></i></div><div class='star'><i class='fa fa-star'></i></div>";
	                    	  	}
	                    	  	if(t.find('.'+key)) t.find('.'+key).html(innerhtml);
	                    	  }
                    	  }
                        //key 就是content,cover_img,author,date
                        //value 就是content,cover_img,author,date值
                    })         
                    //t.attr('id', 'more_element_'+ (variables.last++))
                    if(settings.scroll == 'true'){
                    //    root.append(t.html())
                    root.children('.more_loader_spinner').before(t.html())  
                    }else{
                    //    alert('...')
                          
                          root.children(settings.trigger).before(t.html())  

                    }

                    root.children(settings.template+':last').attr('id', 'more_element_'+ ((variables.last++)+1))  
                 
                })
                
                
                
                
            }            
            else  methods.remove()
            target.children('.more_loader_spinner').css('display','none');
            if(counter < settings.amount) methods.remove()            

        },
        get_data      : function(){//点击加载更多出发这个function   
            //alert('getting data')
            var ile;//每次显示记录数
            lock = true;
            target.children(".more_loader_spinner").css('display','block');
            $(settings.trigger).css('display','none');
            if(typeof(arguments[0]) == 'number') ile=arguments[0];
            else {
                ile = settings.amount;              
            }
            
            $.post(settings.address, {//获得 data.php 页面返回的 json 格式的内容
                last : variables.last, 
                amount : ile                
            }, function(data){
            	  //var ile;
            	  //var last_num;
            	  //last_num = ile + variables.last;//每次显示记录数+增量=最后一个显示出来的数量
            	  //alert(last_num);            
            	  //var obj = eval(data);
								//alert(obj.constructor);//String 构造函数
								//alert(obj[ile].table_id);//undefine
                $(settings.trigger).css('display','block')//点击加载更多的 class为get_more的a标签的display
                methods.add_elements(data)
                lock = false;
            }, settings.format)
            
        }
    };
    $.fn.more = function(method){
        if(methods[method]) 
            return methods[ method ].apply( this, Array.prototype.slice.call( arguments, 1 ));
        else if(typeof method == 'object' || !method) 
            return methods.init.apply(this, arguments);
        else $.error('Method ' + method +' does not exist!');

    }    
})(jQuery)