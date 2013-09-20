/*fix outline*/
$('a').focus(function(){this.blur();}); 

/*  @common top alpha*/ 
;;;;;$(function(){
	$(".alpha").css({opacity:'0.4'});
}); 
 
//搭建js与flash互通的环境
;;;;function getFlashMovie(movieName) {
 var e=document.getElementById(movieName); 
 return (navigator.appName.indexOf("Microsoft") != -1)?e:e.getElementsByTagName("embed")[0];  
}


//gallery
function scrollBoxForIndex(o)
{	
		var $obj = $(o.obj);
		var $ct = $obj.find('ul');
		var $list = $ct.find('li');
		
		
		var _len = $list.length;	
		var _w = $obj.width();
		var _inter = o.inter || 4000;
		//init		
		$ct.width(_w*_len);	
		$list.each(function(i){
			$(this).data("rel",i);			
		});
		
		$obj.css({"margin":"0 auto"});
		$list.width(_w);
		var $btn = $(o.btn);
		var $click = $btn.find('li');
		var _ns = 1;		
		
		$click.bind('click',function(){
			var _ni = $click.index($(this));
			if(!$ct.is(":animated")){			
				_ns = _ni;
				$click.eq(_ns).addClass('ad-on').siblings('li').removeClass('ad-on');	
				$ct.animate({"margin-left":-_w*_ns},1500,"easeInOutCubic",function(){});					
			}						 
		});
		
		var _auto = setInterval(function(){ $click.eq(_ns).click(); _ns++; if(_ns == _len) { _ns = 0; } },_inter);	
		
		if(o.onstop)
		{
			$(o.onstop).hover(function(){ clearInterval(_auto); }, function(){ _auto =  setInterval(function(){ $click.eq(_ns).click(); _ns++; if(_ns == _len) { _ns = 0; } },_inter);; });
		}
};






function checkbox(obj){
	var $obj = obj;
	var $hi = $("#"+$obj.attr("comment"));
	var $list = $obj.find("li");
	var _muti = $obj.attr("muti") || 0;
	if(_muti==0)
	{
		$list.bind("click",function(){
			var _this = $(this);
			_this.addClass("on").siblings().removeClass("on");
			$hi.val(_this.attr("rel"));
		});
	}else
	{
		$list.toggle(function(){
			$(this).addClass("on");
			var _on = $obj.find(".on");
			var _text = "";
			for(var i=0;i<_on.length;i++)
			{
				_text = _text + _on.eq(i).attr("rel")+",";
			}
			$hi.val(_text);
		},function(){
			$(this).removeClass("on");	
			var _on = $obj.find(".on");
			var _text = "";
			for(var i=0;i<_on.length;i++)
			{
				_text = _text + _on.eq(i).attr("rel")+",";
			}
			$hi.val(_text);
		});
	}
};

function insertLi(obj,s,e)
{
	var html = "";
	for(;s<=e;s++)
	{
		html = html + "<li>" + s + "</li>";	
	}
	$(obj).html(html);
};

function dropdownlist(obj){
	var $obj = obj;
	var $show = $obj.find(".show");
	var $hi = $("#"+$obj.attr("comment"));
	var $ul = $obj.find("ul");
	var $list = $ul.find("li");
	
	$obj.bind("click",function(){		
		$ul.fadeIn(200);
		try{ clearInterval(_inter); }
		catch(e){}
		_inter = setInterval(function(){ $ul.fadeOut(200); },2000);
	});
	
	
	
	$ul.hover(function(){ clearInterval(_inter); },function(){try{ clearInterval(_inter); }
		catch(e){};_inter = setInterval(function(){ $ul.fadeOut(200); },2000);});
	
	$list.live("click",function(){
		var _text = $(this).text();
		$ul.fadeOut(200);
		$hi.val(_text);
		$show.text(_text);
	}).live("mouseover",function(){ $(this).addClass("don");}).live("mouseout",function(){ $(this).removeClass("don");});
}


function iePng(){
	if($.browser.msie && $.browser.version == "6.0"){
		$.getScript("DD_belatedPNG.js",function(){
			DD_belatedPNG.fix('.png,.menu li a,.tags');
    		document.execCommand("BackgroundImageCache",false,true);	
		});
	}	
	else{
		return;	
	}
}
/*
	o.obj > div <div><ul></ul></div>
	o.scrollbar 
	*copyright 2012  author:danny oris
*/
;;(function($){
	$.extend({
   	scrollBar:function(o){
				if(!o)
				{return;}
				//_itl  itemlength, _itw  itemwidth, $mc ul in div, $b bar, _mu Multiple, _mas margins
				var $obj,$mc,$sb,$b,_bw,_itl,_itw,_min,_mu,_mas;
				
				_min = o.num;
				
				$obj = $(o.obj);
				$mc = $obj.children("ul");
				_itl = $mc.children("li").length;
				
				$sb = $(o.scrollbar);
				$b = $sb.find("span");
				
				_itw = $mc.find("li:eq(0)").innerHeight();
				
				
				
				//error return
				if(_itl<_min){
					return;
				}
				if(_itl==_min){
					$obj.height(_itw*2-2);
					return;
				}		
				$sb.css("display","block");		
				$obj.height(_itw*2-2);
				_mas = 0;//returnMargins($mc.find("li:eq(0)"));		
				
				//Initialization
				var _mcwidth = _itw*_itl+_itl*_mas;
							
				_bw = parseInt($b.height());						
				var maxlen=parseInt($sb.width()) - _bw;		
				_mu = (_mcwidth-$obj.height()-_mas)/maxlen;	
				
				
				var left=0;				
				$b.bind("mousedown",function(e){
					
					var x = e.pageX;
					var hx = parseInt($b.css("left"));	
					$(document).bind("mousemove",function(e){
						 left = e.pageX-x + hx < 0 ? 0 :(e.pageX-x+hx>=maxlen?maxlen:e.pageX-x+hx);	
						 $b.css({"left":left});
						 $mc.animate({'top':-left*_mu},0,function(){});
						 return false;
					});	
					$(document).bind("mouseup",function(){
						if(!$b.is(":animated") && !$mc.is(":animated")){
							//alert(getStopOffsetLeft(left*_mu,_itw+_mas));
							//$mc.animate({left:-getStopOffsetLeft(left*_mu,_itw+_mas)},400,function(){});
							//$b.animate({left:getStopOffsetLeft(left,maxlen/(_itl-_min))},400,function(){});
						}
						$(this).unbind("mousemove");
					});
					return false;
				}).click(function(){
					return false;	
				});
				
				$b.bind("mouseout mouseup",function(){	
						$(this).unbind("mousemove");
				});				
				/*$b.hover(function(){
					$(this).addClass("on");				
				},function(){	
					$(this).removeClass("on");			
				});	*/	
				$b.addClass("on");
				
				/*margins*/
				function returnMargins(obj){
					var _ml = $(obj).css("margin-top") != null ? parseInt($(obj).css("margin-top")) : 0;
					var _mr = $(obj).css("margin-bottom") != null ? parseInt($(obj).css("margin-bottom")) : 0;
					return _ml+_mr;
				}
				/*stop offset left*/
				function getStopOffsetLeft(_left,itemwidth){
					var _releft = 0;
					var _cut = Math.ceil(_left/itemwidth);
					_cut > _itl - _min ? _cut=_cut-1 : "";
					//alert(_left+"/"+_itl+"/"+_cut);
					_left = parseInt(_left);
					//_left > 0 ? (_left < maxlen ? _releft = parseInt(_cut*itemwidth) : _releft = maxlen) : _releft = 0;
					_left > 0 ? _releft = parseInt(_cut*itemwidth): _releft = 0;
					return _releft;
				}				
			}						 
	});	
})(jQuery);



















//data
//爱心捐献 -> 物力支持
function bindProduct(){
	$("#prosubmit").bind("click",function(){
		
		if(!isDefault($("#name"))){return false;};
		if(!isDefault($("#phone"))){return false;};
		if(!isNumber($("#phone"))){return false;};
		if(!isDefault($("#pro"))){return false;};
		if(!isDefault($("#num"))){return false;};
		if(!isNumber($("#num"))){return false;};
		
		$.ajax({type:'POST',url:'service_center.php',data:{type:"material",uname:v("#name"),uphone:v("#phone"),uproduct:v("#pro"),ucount:v("#num"),uinvoice:v("#charge")},
				success:function(e){
							if(e=="1")
							{
								$("#content").fadeOut(100,function(){ $("#result").fadeIn(100); });
							}
							else
							{
								alert("Error!Try again!");	
								
							}
						}
				});
	});			
}

//爱心捐献 -> 财力支持
function bindDonate(){
	$("#donatesubmit").bind("click",function(){
		
		if(!isDefault($("#name"))){return false;};
		if(!isDefault($("#phone"))){return false;};
		if(!isNumber($("#phone"))){return false;};
		if(!isDefault($("#pro"))){return false;};
		if(!isDefault($("#num"))){return false;};
		if(!isNumber($("#num"))){return false;};	
		
		$.ajax({type:'POST',url:'service_center.php',data:{type:"money",uname:v("#name"),uphone:v("#phone"),uproduct:v("#pro"),ucount:v("#num"),uinvoice:v("#charge")},
				success:function(e){
							if(e=="1")
							{
								$("#content").fadeOut(100,function(){ $("#result").fadeIn(100); });
							}
							else
							{
								//alert("Error!Try again!");	
								$("#error").fadeIn(100);
							}
						}
				});
	});			
}


//方式申请
function bindJob(){
	$("#jobsubmit").bind("click",function(){
				
		if(!isDefault($("#uname"))){return false;};
		if(!isDefault($("#usex"))){return false;};
		if(!isDefault($("#card"))){return false;};
		if(!isDefault($("#ctype"))){return false;};
		if(!isDefault($("#uage"))){return false;};
		if(!isDefault($("#addtime"))){return false;};
		if(!isDefault($("#uaddress"))){return false;};
		if(!isDefault($("#uedu"))){return false;};
		if(!isDefault($("#ubelief"))){return false;};
		if(!isDefault($("#uintro"))){return false;};
	
		$.ajax({type:'POST',url:'service_center.php',
				data:{type:"job",
					uname:v("#uname"),
					usex:v("#usex"),
					ucard:v("#card"),
					utype:v("#ctype"),
					uage:v("#uage"),
					utime:v("#addtime"),
					ucontact:v("#uaddress"),
					uedu:v("#uedu"),
					ubelief:v("#ubelief"),
					uintro:v("#uintro"),
					uexperience:v("#ago"),
					ujob:v("#dotype")
					},
				success:function(e){
							if(e=="1")
							{
								$("#content").fadeOut(100,function(){ $("#result").fadeIn(100); });
							}
							else
							{
								alert("Error!Try again!");	
							}
						}
				});
	});			
}

///爱心捐献 -> 爱心赠言
function bindWord(){
	$("#wordsubmit").bind("click",function(){
		
		if(!isDefault($("#uname"))){return false;};
		if(!isDefault($("#word"))){return false;};
		
		$.ajax({type:'POST',url:'service_center.php',data:{type:"message",uname:v("#uname"),umessage:v("#word")},
				success:function(e){
							if(e=="1")
							{
								$("#content").fadeOut(100,function(){ $("#result").fadeIn(100); });
							}
							else
							{
								alert("Error!Try again!");	
							}
						}
				});
	});			
}


function v(id)
{
	return $(id).val();	
}

/*form reg*/
function isDefault(obj){
	if(obj.val()=="" || obj.val() == obj[0].defaultValue)
	{
		
		$("#content").fadeOut(100,function(){$("#error").fadeIn(100);});
		obj.select();
		obj.focus();
		return false;	
	}
	return true;
}

var regNumber = /^\d{1,}$/;
function isNumber(obj){
	if(!regNumber.test(obj.val()))
	{
		$("#content").fadeOut(100,function(){$("#error").fadeIn(100);});
		
		obj.select();
		obj.focus();
		return false;	
	}
	return true;
}

function bindErrorBtn(){
	$("#error area").bind("click",function(){
		$("#error").fadeOut(100,function(){$("#content").fadeIn(100);});
	});
}
