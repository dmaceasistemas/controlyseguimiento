

briask_issPics = new Array();
briask_curPic = 0, briask_nextPic = 0, briask_numPics = 0;
briask_curOpacity = 99, briask_nextOpacity = 0;

function briask_issTransition()
{

	briask_issPics[briask_curPic].style.opacity = briask_curOpacity/100;
	briask_issPics[briask_curPic].style.MozOpacity = briask_curOpacity/100;
	briask_issPics[briask_curPic].style.filter = "alpha(opacity=" + (briask_curOpacity) + ")";

	briask_issPics[briask_nextPic].style.opacity = briask_nextOpacity/100;
	briask_issPics[briask_nextPic].style.MozOpacity = briask_nextOpacity/100;
	briask_issPics[briask_nextPic].style.filter = "alpha(opacity=" + (briask_nextOpacity) + ")";

	if (briask_curOpacity > 0)
	{
		briask_curOpacity -= 2;
		briask_nextOpacity += 2;
		setTimeout(briask_issTransition, briask_transDelay);
	}
	else
	{
		briask_issPics[briask_curPic].style.display = "none";

		briask_curPic = briask_nextPic;
		setTimeout(briask_issShow, briask_picInterval);
	}
}

function briask_issShow()
{
	 if (briask_curPic < (briask_numPics - 1))
	 {
		 briask_nextPic = briask_curPic + 1;
	 }
	 else
	 {
		 briask_nextPic = 0;
	 }

	briask_issPics[briask_nextPic].style.display = "block";

	briask_curOpacity = 100, briask_nextOpacity = 0;
//	setTimeout(transition, 300);
	setTimeout(briask_issTransition, briask_transDelay);
}
function briask_issInit()
{
	//if(!document.getElementById || !document.createElement) return;

	briask_issPics = document.getElementById("briask-iss").getElementsByTagName("img");
	briask_numPics = briask_issPics.length;

	for(i=1; i<briask_issPics.length; i++)
	{
		briask_issPics[i].opacity = 0;
		briask_issPics[i].style.MozOpacity = .0;
		briask_issPics[i].style.filter = "alpha(opacity=0)";
	}

	briask_issPics[0].style.display = "block";
	briask_issPics[0].style.opacity = .99;
	briask_issPics[0].style.MozOpacity = .99;
	briask_issPics[0].style.filter = "alpha(opacity=" + (.99*100) + ")";

//	setTimeout(showit,5000);
	setTimeout(briask_issShow, briask_picInterval);
}

function briask_issLoad() {
    if (arguments.callee.done) return;

    arguments.callee.done = true;

	briask_issInit();
};

if (window.addEventListener) //W3C
{
	window.addEventListener( "load", briask_issLoad, false );
}
else if (window.attachEvent)//IE
{
	window.attachEvent ("onload", briask_issLoad)
}
else
{
	window.onload = briask_issLoad;
}
