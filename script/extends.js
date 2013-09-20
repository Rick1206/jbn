//搭建js与flash互通的环境
function getFlashMovie(movieName) {
 var e=document.getElementById(movieName); 
 return (navigator.appName.indexOf("Microsoft") != -1)?e:e.getElementsByTagName("embed")[0];  
}

/*add flash*/

function addSwf(id,W,H,url)
{var swf = "<object codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0'id="+id+" width="+W+" height="+H+" classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000'><param name='movie' value="+url+" /><param name='quality' value='high' /><param name='wmode' value='transparent' /><embed src="+url+" width="+W+" height="+H+" quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer'type='application/x-shockwave-flash' wmode='transparent'></embed></object>";
return swf;}



















