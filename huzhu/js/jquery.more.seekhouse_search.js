(function( $ ){
    var target = null;
    var template = null;
    var lock = false;
    var variables = {
        'last'      :    0
    }
    var settings = {
        'amount'      :   '20', //每次显示记录数
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
            var user_wechat = 0;//声明全局user_wechat
            var user_mobile = 0;//声明全局user_mobile
            if(data){
                $(data).each(function(){//对于每个匹配的元素所要执行的函数
                    counter++
                    var t = template
                    $.each(this, function(key, value){
                    	  if(t.find('.'+key)) {
                    	  	//alert(data);
                    	  	var obj1 = eval(data);
                    	  	//alert(data);
													keyword_get=obj1[0].keyword_get;
 													rent_type_get=obj1[0].rent_type_get;
 													district_get=obj1[0].district_get;
 													subway_get=obj1[0].subway_get;
 													room_type_get=obj1[0].room_type_get;
                    	  	if(key == 'pic-wrapper-float'){//房源照片 用户头像
                    	  		//alert(key);
	                    	  	//if(t.find('.'+key)) t.find('.'+key).attr('src',value);
	                    	  	if(t.find('.'+key)) t.find('.'+key).css('background-image','url(' + value + ')');
	                    	  }else if(key == 'content-box'){//出租详情链接
                    	  		//alert(key);
                    	  		//var href="houseSeek_info.php?house_seek_id="+value+"&from=seekhouse_search";
                    	  		var href="houseSeek_info.php?house_seek_id="+value+"&from=seekhouse_search"+"&keyword_get="+keyword_get+"&rent_type_get="+rent_type_get+"&district_get="+district_get+"&subway_get="+subway_get+"&room_type_get="+room_type_get;
	                    	  	if(t.find('.'+key)) t.find('.'+key).attr('href',href);
	                    	  }else if(key == 'content'){//出租详情链接
                    	  	  var innerhtml=value+"…";//<span style='color:blue;'>更多>></span> text-decoration:underline;
                    	  		//alert(innerhtml);
                    	  		if(t.find('.'+key)) t.find('.'+key).html(innerhtml);
	                    	  }else if(key == 'subway'){//出租详情链接
                    	  		//alert(value);
                    	  		//防止别人用已验证手机号发帖，所以搜索和出租列表，都以set_top是否以1来区分是否验证
					                  if(t.find('.'+key)) t.find('.'+key).html(value);
	                    	  }else{
	                    	  	//alert(key);
                    	  		if(t.find('.'+key)) t.find('.'+key).html(value);
	                    	  }
                    	  }


                        //key 就是content,cover_img,author,date
                        //value 就是content,cover_img,author,date值
                        //alert(key);
                        //alert(value);
                        //new add
				                //$("img").each(function(){
											   	//this.src = value;
											 	//});
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