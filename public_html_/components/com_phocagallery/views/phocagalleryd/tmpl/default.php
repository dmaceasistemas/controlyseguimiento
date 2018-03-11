<?php defined('_JEXEC') or die('Restricted access'); ?>
<script type="text/javascript"> 
/* <![CDATA[ */    
/***********************************************
* Ultimate Fade-In Slideshow (v1.51): © Dynamic Drive (http://www.dynamicdrive.com)
* This notice MUST stay intact for legal use
* Visit http://www.dynamicdrive.com/ for this script and 100s more.
***********************************************/
 
var fadeimages=new Array()
<?php echo $this->file->slideshowfiles ;?>
 
var fadebgcolor="white"

////NO need to edit beyond here/////////////
 
var fadearray=new Array() //array to cache fadeshow instances
var fadeclear=new Array() //array to cache corresponding clearinterval pointers
 
var dom=(document.getElementById) //modern dom browsers
var iebrowser=document.all
 
function fadeshow(theimages, fadewidth, fadeheight, borderwidth, delay, pause, displayorder){
this.pausecheck=pause
this.mouseovercheck=0
this.delay=delay
this.degree=10 //initial opacity degree (10%)
this.curimageindex=0
this.nextimageindex=1
fadearray[fadearray.length]=this
this.slideshowid=fadearray.length-1
this.canvasbase="canvas"+this.slideshowid
this.curcanvas=this.canvasbase+"_0"
if (typeof displayorder!="undefined")
theimages.sort(function() {return 0.5 - Math.random();}) //thanks to Mike (aka Mwinter) :)
this.theimages=theimages
this.imageborder=parseInt(borderwidth)
this.postimages=new Array() //preload images
for (p=0;p<theimages.length;p++){
this.postimages[p]=new Image()
this.postimages[p].src=theimages[p][0]
}
 
var fadewidth=fadewidth+this.imageborder*2
var fadeheight=fadeheight+this.imageborder*2
 
if (iebrowser&&dom||dom) //if IE5+ or modern browsers (ie: Firefox)
document.write('<div id="master'+this.slideshowid+'" style="position:relative;width:'+fadewidth+'px;height:'+fadeheight+'px;overflow:hidden;"><div id="'+this.canvasbase+'_0" style="position:absolute;width:'+fadewidth+'px;height:'+fadeheight+'px;top:0;left:0;filter:progid:DXImageTransform.Microsoft.alpha(opacity=10);opacity:0.1;-moz-opacity:0.1;-khtml-opacity:0.1;background-color:'+fadebgcolor+'"></div><div id="'+this.canvasbase+'_1" style="position:absolute;width:'+fadewidth+'px;height:'+fadeheight+'px;top:0;left:0;filter:progid:DXImageTransform.Microsoft.alpha(opacity=10);opacity:0.1;-moz-opacity:0.1;-khtml-opacity:0.1;background-color:'+fadebgcolor+'"></div></div>')
else
document.write('<div><img name="defaultslide'+this.slideshowid+'" src="'+this.postimages[0].src+'"></div>')
 
if (iebrowser&&dom||dom) //if IE5+ or modern browsers such as Firefox
this.startit()
else{
this.curimageindex++
setInterval("fadearray["+this.slideshowid+"].rotateimage()", this.delay)
}
}

function fadepic(obj){
if (obj.degree<100){
obj.degree+=10
if (obj.tempobj.filters&&obj.tempobj.filters[0]){
if (typeof obj.tempobj.filters[0].opacity=="number") //if IE6+
obj.tempobj.filters[0].opacity=obj.degree
else //else if IE5.5-
obj.tempobj.style.filter="alpha(opacity="+obj.degree+")"
}
else if (obj.tempobj.style.MozOpacity)
obj.tempobj.style.MozOpacity=obj.degree/101
else if (obj.tempobj.style.KhtmlOpacity)
obj.tempobj.style.KhtmlOpacity=obj.degree/100
else if (obj.tempobj.style.opacity&&!obj.tempobj.filters)
obj.tempobj.style.opacity=obj.degree/101
}
else{
clearInterval(fadeclear[obj.slideshowid])
obj.nextcanvas=(obj.curcanvas==obj.canvasbase+"_0")? obj.canvasbase+"_0" : obj.canvasbase+"_1"
obj.tempobj=iebrowser? iebrowser[obj.nextcanvas] : document.getElementById(obj.nextcanvas)
obj.populateslide(obj.tempobj, obj.nextimageindex)
obj.nextimageindex=(obj.nextimageindex<obj.postimages.length-1)? obj.nextimageindex+1 : 0
setTimeout("fadearray["+obj.slideshowid+"].rotateimage()", obj.delay)
}
}
 
fadeshow.prototype.populateslide=function(picobj, picindex){
var slideHTML=""
if (this.theimages[picindex][1]!="") //if associated link exists for image
slideHTML='<a HREF="'+this.theimages[picindex][1]+'" target="'+this.theimages[picindex][2]+'">'
slideHTML+='<center><table border="0"><tr><td valign="middle" height="<?php echo $this->largeheight; ?>"><img style="vertical-align="middle" SRC="'+this.postimages[picindex].src+'" border="'+this.imageborder+'px"></td></tr></table></center>'
if (this.theimages[picindex][1]!="") //if associated link exists for image
slideHTML+='</a>'
picobj.innerHTML=slideHTML
}
 
 
fadeshow.prototype.rotateimage=function(){
if (this.pausecheck==1) //if pause onMouseover enabled, cache object
var cacheobj=this
if (this.mouseovercheck==1)
setTimeout(function(){cacheobj.rotateimage()}, 100)
else if (iebrowser&&dom||dom){
this.resetit()
var crossobj=this.tempobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)
crossobj.style.zIndex++
fadeclear[this.slideshowid]=setInterval("fadepic(fadearray["+this.slideshowid+"])",50)
this.curcanvas=(this.curcanvas==this.canvasbase+"_0")? this.canvasbase+"_1" : this.canvasbase+"_0"
}
else{
var ns4imgobj=document.images['defaultslide'+this.slideshowid]
ns4imgobj.src=this.postimages[this.curimageindex].src
}
this.curimageindex=(this.curimageindex<this.postimages.length-1)? this.curimageindex+1 : 0
}
 
fadeshow.prototype.resetit=function(){
this.degree=10
var crossobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)
if (crossobj.filters&&crossobj.filters[0]){
if (typeof crossobj.filters[0].opacity=="number") //if IE6+
crossobj.filters(0).opacity=this.degree
else //else if IE5.5-
crossobj.style.filter="alpha(opacity="+this.degree+")"
}
else if (crossobj.style.MozOpacity)
crossobj.style.MozOpacity=this.degree/101
else if (crossobj.style.KhtmlOpacity)
crossobj.style.KhtmlOpacity=this.degree/100
else if (crossobj.style.opacity&&!crossobj.filters)
crossobj.style.opacity=this.degree/101
}
 
 
fadeshow.prototype.startit=function(){
var crossobj=iebrowser? iebrowser[this.curcanvas] : document.getElementById(this.curcanvas)
this.populateslide(crossobj, this.curimageindex)
if (this.pausecheck==1){ //IF SLIDESHOW SHOULD PAUSE ONMOUSEOVER
var cacheobj=this
var crossobjcontainer=iebrowser? iebrowser["master"+this.slideshowid] : document.getElementById("master"+this.slideshowid)
crossobjcontainer.onmouseover=function(){cacheobj.mouseovercheck=1}
crossobjcontainer.onmouseout=function(){cacheobj.mouseovercheck=0}
}
this.rotateimage()
}

function disableBackAndNext()
{
document.getElementById("next").Disable=true
}
/* ]]> */
</script>


	<?php if ($this->file->slideshow == 1)
	{
	?>	
		<center style="margin-top:10px;background:#000000">
		<table border="0" width="100%">
		<tr>
			<td colspan="6" align="center" valign="middle" height="<?php echo $this->largeheight ?>" style="height:<?php echo $this->largeheight ?>px" >
				<script type="text/javascript"><?php			
				if ( $this->slideshowrandom == 1 ) {
					echo 'new fadeshow(fadeimages, '.$this->largewidth .', '. $this->largeheight .', 1, '. $this->slideshowdelay .', '. $this->slideshowpause .', \'R\')';		
				} else {						
					echo 'new fadeshow(fadeimages, '.$this->largewidth .', '. $this->largeheight .', 1, '. $this->slideshowdelay .', '. $this->slideshowpause .')';		
				} ?>
				</script>
			</td>
		</tr>
		
		<tr>
			<td align="left" width="200" style="padding-left:48px"><?php echo $this->file->prevbutton ;?></td>
			<td><?php echo $this->file->slideshowbutton ;?></td>
			<td><?php echo str_replace("%onclickreload%", $this->detailwindowreload, $this->file->reloadbutton);?></td>
			<td><?php echo str_replace("%onclickclose%", $this->detailwindowclose, $this->file->closebutton);?></td>
			<td align="right" width="200" style="padding-right:48px"><?php echo $this->file->nextbutton ;?></td>
		</tr>
		</table>
		</center>
	<?php
	}
	else if ($this->file->download == 1)
	{
		
		
		echo '<div style="overflow:scroll;width:'.$this->boxlargewidth.'px;height:'.$this->boxlargeheight.'px;margin:0px;padding:0px;">' . JHTML::_( 'image.site', $this->file->filenameno, 'images/phocagallery/') . '</div>';
		echo '<div id="download-msg"><div>'
			.'<table width="360">'
			.'<tr><td>' . JText::_('Image Name') . ': </td><td>'.$this->file->filename.'</td></tr>'
			.'<tr><td>' . JText::_('Image Format') . ': </td><td>'.$this->file->imagesize.'</td></tr>'
			.'<tr><td>' . JText::_('Image Size') . ': </td><td>'.$this->file->filesize.'</td></tr>'
			.'<tr><td colspan="2"><small>' . JText::_('Download Image') . '</small></td></tr>'
			.'<tr><td>&nbsp;</td><td align="right">'.str_replace("%onclickclose%", $this->detailwindowclose, $this->file->closetext).'</td></tr>'
			.'</table>';
		echo '</div></div>';
		
	}
	else
	{
		$largeHeight = (int)$this->largeheight + 6 ;
	?>
		<center style="margin-top:10px">
		<table border="0" width="100%">
		<tr>
			<td colspan="6" align="center" valign="middle" height="<?php echo $largeHeight; ?>" >
				<a  href="#" onclick="<?php echo $this->detailwindowclose; ?>"><?php echo JHTML::_( 'image.site', $this->file->linkthumbnailpath, ''); ?></a>
			</td>
		</tr>
		<?php
		if ($this->displaydescriptiondetail == 1)
		{
		?>
			<tr>
			<td colspan="6" align="left" valign="top" height="<?php echo $this->descriptiondetailheight; ?>">
				<div style="font-size:<?php echo $this->fontsizedesc; ?>px;height:<?php echo $this->descriptiondetailheight; ?>px;padding:0 20px 0 20px;color:<?php echo $this->fontcolordesc; ?>"><?php echo $this->file->description ?></div>
			</td>
		</tr>
		
		<?php
		}
		
		if ($this->detailbuttons == 1)
		{
		?>
		
			<tr>
				<td align="left" width="200" style="padding-left:48px"><?php echo $this->file->prevbutton ;?></td>
				<td><?php echo $this->file->slideshowbutton ;?></td>
				<td><?php echo str_replace("%onclickreload%", $this->detailwindowreload, $this->file->reloadbutton);?></td>
				<td><?php echo str_replace("%onclickclose%", $this->detailwindowclose, $this->file->closebutton);?></td>
				<td align="right" width="200" style="padding-right:48px"><?php echo $this->file->nextbutton ;?></td>
			</tr>
		<?php
		}
		?>
		
		</table>
		</center>
	<?php
	}
	?>