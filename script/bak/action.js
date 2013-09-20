$(function(){
	scrollBoxForIndex({obj:'.banner-box',btn:'.adcontrol-box',inter:4*1000,onstop:'.banner-box,.adcontrol-box'});  
	
	$(".checkbox,.checkbox_small").each(function(){
		checkbox($(this));	
	});
	
	$(".dropdownlist,.finace-drop").each(function(){
		dropdownlist($(this));	
	});
	
	
	
});
