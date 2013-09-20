$(function(){
	if($(document).width()>1440)
	{		
		$(".banner-box").width(1440);	
	}
	scrollBoxForIndex({obj:'.banner-box',btn:'.adcontrol-box',inter:5*1000,onstop:'.banner-box,.adcontrol-box'});  
	
	$(".checkbox,.checkbox_small").each(function(){
		checkbox($(this));	
	});
	
	$(".dropdownlist,.finace-drop").each(function(){
		dropdownlist($(this));	
	});
	

});