/*fix outline*/
var $UserJob = ['保育','教育','后勤','医护','营养师'];
var $Uinvoice = ['不要','服务性发票','增值税发票是否需要发票'];
var $Utransport = ['自理','家百浓承担'];
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
function scrollBoxForIndex(o){
		var running = true;
		//--- scroll ---//
		var $obj = $(o.obj);
		//--- ul ---//
		var $ct = $obj.find('ul');
		//--- li ---//
		var $list = $ct.find('li');
		//--- rick ---//
		var _inter = o.inter || 4000;
		//--- speed ---//
		var _ns = 1;
		
		//--- init ---//
		$list.each(function(index) {
			if(index == 0){
				$(this).css('display',"block");
			}else{
				$(this).css('display',"none");
			}
		});
		
		var _len = $list.length;

		var $btn = $(o.btn);
		var $click = $btn.find('li');
		
		$click.bind('click',function(){
			var _ni = $click.index($(this));
			if(!$ct.is(":animated")){		
				_ns = _ni;
				$click.eq(_ns).addClass('ad-on').siblings('li').removeClass('ad-on');
				//alert(_ns);
				$list.eq(_ns).fadeIn(1500).siblings().fadeOut(800);
			}						 
		});
		
		var _auto = setInterval(function(){$click.eq(_ns).click();
										   _ns++;
										   if(_ns == _len) { _ns = 0; };
										   //alert(_ns);
										    },
										    _inter);
		
		if(o.onstop){
			$(o.onstop).hover(function(){ clearInterval(_auto); }, 
			function(){
				 _auto =  setInterval(function(){
					 					 $click.eq(_ns).click(); 
										 _ns++;
										 if(_ns == _len) { _ns = 0; } },
										 _inter);; });
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
			
			if($(this).attr('hide'))
			{
				$('#showcharge').fadeIn(200);
			}
			else
			{
				$('#showcharge').fadeOut(200);	
			}
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


function insertLi(obj,s,e){
	var html = "";
	for(;s<=e;s++){
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
	var _inter = '';
	$obj.bind("click",function(){		
		$ul.fadeIn(200);
		try{ clearInterval(_inter); }
		catch(e){}
		_inter = setInterval(function(){ $ul.fadeOut(200); },1000);
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
	}else{
		return;	
	}
}

/*
	o.obj > div <div><ul></ul></div>
	o.scrollbar 
	*copyright 2012  author:danny oris
*/
;;(function($){
	$.extend({scrollBar:function(o){
				if(!o){return;}
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
	var arrBtn = [$("#name"),$("#phone"),$("#pro"),$("#num"),$("#email"),$("#cardinfo")];
		for(var key in arrBtn){
			inputBtn(arrBtn[key]);
		}
		
	$("#prosubmit").bind("click",function(){
		
		if(!isDefault($("#name"))){return false;};
		if(!isDefault($("#phone"))){return false;};
		if(!isNumber($("#phone"))){return false;};
		if(!isDefault($("#pro"))){return false;};
		if(!isDefault($("#num"))){return false;};
		if(!isNumber($("#num"))){return false;};
		
		$.ajax({type:'POST',url:'service_center.php',data:{type:"material",uname:v("#name"),usex:v("#usex"),ucard:v("#card"),ucountry:v("#country"),ucardinfo:v('#cardinfo'),ubelief:v("#religion"),uedu:v("#educate"),uemail:v("#email"),uphone:v("#phone"),uproduct:v("#pro"),ucount:v("#num"),utransport:v("#charge")},
				success:function(e){
							if(e=="1"){
								$.ajax({type:'POST',url:'service_center.php',
										  data:{type:"email",
												email_body:'家百浓儿童中心感谢您的爱心物资捐赠，请核对以下信息：<table width="200" border="0" cellpadding="0" cellspacing="0"><tr><td>姓名：</td><td>'+ v('#name') +'</td></tr><tr><td>证件类型：</td><td>' + v('#card') + '</td></tr><tr><td>证件信息：</td><td>'+v('#cardinfo')+'</td></tr><tr><td>教育程度：</td><td>'+ v('#educate') +'</td></tr><tr><td>宗教信仰：</td><td>'+ v('#religion') +'</td></tr><tr><td>捐献物品：</td><td>'+ v('#pro')+'</td></tr><tr><td>损献数量：</td><td>'+ v('#num')+'</td></tr><tr><td>运送费用：</td><td>'+ $Utransport[v('#charge')] +'</td></tr></table><br /> 如有任何遗漏，请回复此邮件！',
												email_address:v("#email")
											  },
												success:function(e){
													  if(e=="1"){}else{}
												}
										  });
								$("#content").fadeOut(100,function(){ $("#result").fadeIn(100); });
							}else{
								alert("Error!Try again!");	
								//$("#error").fadeIn(100);
							}
						}
				});
	});			
}

//爱心捐献 -> 财力支持
function bindDonate(){
	//--- focus event ---//
	var arrBtn = [$("#name"),$("#phone"),$("#money"),$("#num"),$("#email"),$("#cardinfo")];
		for(var key in arrBtn){
			inputBtn(arrBtn[key]);
		}
	//--- foucus event end ---//
	
	$("#donatesubmit").bind("click",function(){
		
		if(!isDefault($("#name"))){return false;};
		if(!isDefault($("#phone"))){return false;};
		if(!isNumber($("#phone"))){return false;};
		if(!isDefault($("#money"))){return false;};
		
		$.ajax({type:'POST',url:'service_center.php',data:{type:"money",uname:v("#name"),usex:v("#usex"),ucard:v("#card"),ucountry:v("#country"),ucardinfo:v('#cardinfo'),ubelief:v("#religion"),uedu:v("#educate"),uemail:v("#email"),uphone:v("#phone"),umoney:v("#money"),uinvoice:v("#charge")},
				success:function(e){
							if(e=="1"){
								
								$.ajax({type:'POST',url:'service_center.php',
															  data:{type:"email",
															  		email_body:'家百浓儿童中心感谢您的爱心捐赠，请核对以下信息：<table width="200" border="0" cellpadding="0" cellspacing="0"><tr><td>姓名：</td><td>'+ v('#name') +'</td></tr><tr><td>证件类型：</td><td>' + v('#card') + '</td></tr><tr><td>证件信息：</td><td>'+v('#cardinfo')+'</td></tr><tr><td>教育程度：</td><td>'+ v('#educate') +'</td></tr><tr><td>宗教信仰：</td><td>'+ v('#religion') +'</td></tr><tr><td>捐赠金额：</td><td>'+ v('#money')+'</td></tr><tr><td>是否需要发票：</td><td>'+ $Uinvoice[v('#charge')] +'</td></tr></table><br /> 如有任何遗漏，请回复此邮件！',
																  	email_address:v("#email")
																  },
															  		success:function(e){
																		  if(e=="1"){}else{}
																	}
															  });
								$("#content").fadeOut(100,function(){ $("#result").fadeIn(100); });
							}
							else
							{
								$("#error").fadeIn(100);
							}
						}
				});
	});			
}

//方式申请
function bindJob(){
	
	var arrBtn = [$("#uname"),$("#cardinfo"),$("#uage"),$("#uaddress"),$("#uedu"),$("#ubelief"),$("#addtime"),$("#uintro"),$("#ago")];
		for(var key in arrBtn){
			inputBtn(arrBtn[key]);
		}

	$("#jobsubmit").bind("click",function(){	
		
		if(!isDefault($("#uname"))){return false;};
		if(!isDefault($("#cardinfo"))){return false;};
		if(!isDefault($("#uage"))){return false;};
		if(!isDefault($("#addtime"))){return false;};
		if(!isDefault($("#uaddress"))){return false;};
		if(!isDefault($("#uintro"))){return false;};
		if(!isDefault($("#ago"))){return false;};
		
		$.ajax({type:'POST',url:'service_center.php',
				data:{type:"job",
					uname:v("#uname"),
					usex:v("#usex"),
					ucard:v("#cardinfo"),
					utype:v("#card"),
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
								
								$.ajax({type:'POST',url:'service_center.php',
															  data:{type:"email",
															  		email_body:'感谢您报名参加家百浓儿童救助中心义工工作，请核对以下信息：<table width="200" border="0" cellpadding="0" cellspacing="0"><tr><td>姓名：</td><td>'+ v('#uname') +'</td></tr><tr><td>证件类型：</td><td>' + v('#card') + '</td></tr><tr><td>证件信息：</td><td>'+v('#cardinfo')+'</td></tr><tr><td>出生年月：</td><td>' + v('#uage') + '</td></tr><tr><td>申请日：</td><td>' + v('#addtime') + '</td></tr><tr><td>教育程度：</td><td>'+ v('#uedu') +'</td></tr><tr><td>宗教信仰：</td><td>'+ v('#ubelief') +'</td></tr><tr><td>重要工作经验：</td><td>'+ v('#ago')+'</td></tr><tr><td>你想做的义工是：</td><td>'+ $UserJob[v('#dotype')] +'</td></tr><tr><td>自我介绍：</td><td>'+ v('#uintro') +'</td></tr></table><br /> 如有任何遗漏，请回复此邮件！',
																  	email_address:v("#uaddress")
																  },
															  		success:function(e){
																		  if(e=="1"){}else{}
																	}
															  });
								
								$("#content").fadeOut(100,function(){ $("#result").fadeIn(100);});
									
							}
							else
							{
								alert("Error!Try again!");	
							}
						}
				});
	});			
}

function bindRegErrorBtn(){
	$("#error area").bind("click",function(){
		$("#error").fadeOut(100,function(){$("#p1").fadeIn(100);});
	});
}

function isDefault_reg(obj){
	if(obj.val()=="" || obj.val() == obj[0].defaultValue)
	{
		$("#p1").fadeOut(100,function(){$("#error").fadeIn(100);});
		//--- focus ---//
		//obj.select();
		//obj.focus();	
		return false;	
	}
	return true;
}


//登录
function bindLog(){
	var arrBtn = [$("#username_log")];
		for(var key in arrBtn){
			inputBtn(arrBtn[key]);
		}
	
	$('#log_in_btn').click(function(){
		if($.trim(v("#username_log"))==""){
			alert('请填写用户名！');	
			return false;
		}
		
		if(v("#password_log")==""){
			alert('请填写密码！');	
			return false;
		}
		
		$.ajax({type:'POST',url:'service_center.php',
				data:{type:"login",
					aname:v("#username_log"),
					passwrod:v("#password_log")
					//utype:v("#educate_log")
					},
				success:function(e){
						switch(e){	
						case "1":
								$('.log_popClose').click();	
								window.location.reload(true);
						break;
						case "2":
							alert("您好，您提交的会员审核在处理中。");
						break;		
						case "0":
							alert("Error!Try again!");	
						break;
						}
						}
				});
	});
}

//注册
function bindReg(){
	
	var arrBtn = [$("#username"),$("#truename"),$("#cardnumber"),$("#email"),$("#phone")];
	for(var key in arrBtn){
		inputBtn(arrBtn[key]);
	}

	$("#regsubmit").bind("click",function(){	
		
		if(!isDefault_reg($("#username"))){return false;};
		if(!isDefault_reg($("#password"))){return false;};
		if(!isDefault_reg($("#truename"))){return false;};
		if(!isDefault_reg($("#cardnumber"))){return false;};
		if(!isDefault_reg($("#email"))){return false;};
		if(!isDefault_reg($("#phone"))){return false;};
		
		$.ajax({type:'POST',url:'service_center.php',
				data:{
					type:"register",
					aname:v("#username"),
					password:v("#password"),
					utype:v("#utype"),
					uname:v("#truename"),
					usex:v("#usex"),
					uctype:v("#card"),
					ucard:v("#cardnumber"),					
					ucountry:v("#country"),
					ubelief:v("#religion"),
					uedu:v("#educate"),
					uemail:v("#email"),
					ucontact:v("#phone")
					},
				success:function(e){
							switch(e){
								case "1":
								alert('注册成功！');
								$('.pop_reg .popClose').trigger("click");
								$.ajax({type:'POST',url:'service_center.php',
								  		data:{type:"email",
								  		email_body:'感谢您注册家百浓儿童救助中心义会员，我们会尽快核对您的个人信息，以及账户信息，为您开通会员。',
									  	email_address:v("#email")
									  },
								  		success:function(e){
											  if(e=="1"){}else{}
										}
								  });
								break;
								case "wrong1":
									alert("您好，用户名已使用。");
								break;
								case "0":
									alert("注册失败。");
								break;
							}
							/*if(e=="1"){
								
								}else{
									alert("Error!Try again!");	
							}*/
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
function inputBtn(obj){
	if(!obj){return;}
	obj.focusin(
		function(){
			if(obj.val() == obj[0].defaultValue){
				$(this).val('');
				}
			}
	);
	
}
function isDefault(obj){
	if(obj.val()=="" || obj.val() == obj[0].defaultValue)
	{
		$("#content").fadeOut(100,function(){$("#error").fadeIn(100);});
		//--- focus ---//
		//obj.select();
		//obj.focus();	
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


$(function(){
$('#J_log').click(function(){
	$("#error,.pop_reg").fadeOut(100,function(){$("#p3").fadeIn(100);});
	$('.eaMask').remove();
	$.lightBox('.pop_log');
});

$('#J_reg,#to_reg').click(function(){
	$("#error,.pop_log").fadeOut(100,function(){$("#p1").fadeIn(100);});
	$('.eaMask').remove();
	$.lightBox('.pop_reg');	
});

//绑定登录
bindLog();	
//绑定注册
bindReg();
bindRegErrorBtn();	
});
