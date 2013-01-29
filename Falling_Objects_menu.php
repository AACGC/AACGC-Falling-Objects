<?php

$pref["fallobject_perpage"]=($pref["fallobject_perpage"]>0?$pref["fallobject_perpage"]:"10");
$objhide=intval($pref["fallobject_hide"]);
$objfall=($pref["fallobject_fall"]=="windowheight"?$pref["fallobject_fall"]:"pageheight");


if (e_PAGE == "".$pref['fallobject_custompage1']."") 
{$objects = "".$pref['fallobject_cicon1']."";}
else if (e_PAGE == "".$pref['fallobject_custompage2']."") 
{$objects = "".$pref['fallobject_cicon2']."";}
else if (e_PAGE == "".$pref['fallobject_custompage3']."") 
{$objects = "".$pref['fallobject_cicon3']."";}
else if (e_PAGE == "".$pref['fallobject_custompage4']."") 
{$objects = "".$pref['fallobject_cicon4']."";}
else if (e_PAGE == "".$pref['fallobject_custompage5']."") 
{$objects = "".$pref['fallobject_cicon5']."";}
else
{$objects = "".$pref['fallobject_icon']."";}

$objfall_text .='<script type="text/javascript">

/*
#######################################
#     e107 website system plguin      #
#     AACGC Falling Objects           #    
#     by M@CH!N3                      #
#     http://www.AACGC.com            #
#######################################
*/
  

var objsrc="'.e_PLUGIN.'aacgc_falling_objects/objects/'.$objects.'"
var no = '.$pref["fallobject_perpage"].';
var hideobjtime = '.$objhide.';
var objdistance = "'.$objfall.'";

///////////Stop Config//////////////////////////////////

  var ie4up = (document.all) ? 1 : 0;
  var ns6up = (document.getElementById&&!document.all) ? 1 : 0;

	function iecompattest(){
	return (document.compatMode && document.compatMode!="BackCompat")? document.documentElement : document.body
	}

  var dx, xp, yp;    
  var am, stx, sty;  
  var i, doc_width = 800, doc_height = 600; 
  
  if (ns6up) {
    doc_width = self.innerWidth;
    doc_height = self.innerHeight;
  } else if (ie4up) {
    doc_width = iecompattest().clientWidth;
    doc_height = iecompattest().clientHeight;
  }

  dx = new Array();
  xp = new Array();
  yp = new Array();
  am = new Array();
  stx = new Array();
  sty = new Array();
//  objsrc=(objsrc.indexOf("dynamicdrive.com")!=-1)? "bio1.png" : objsrc
  for (i = 0; i < no; ++ i) {  
    dx[i] = 0;                        
    xp[i] = Math.random()*(doc_width-50);  
    yp[i] = Math.random()*doc_height;
    am[i] = Math.random()*20;         
    stx[i] = 0.02 + Math.random()/10; 
    sty[i] = 0.7 + Math.random();     
		if (ie4up||ns6up) {
      if (i == 0) {
document.write("<div id=\"dot"+ i +"\" style=\"POSITION: absolute; Z-INDEX: "+ i +"; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><a href=\"http://www.aacgc.com\"><img src="+objsrc+" border=\"0\"><\/a><\/div>");} 
else 
{document.write("<div id=\"dot"+ i +"\" style=\"POSITION: absolute; Z-INDEX: "+ i +"; VISIBILITY: visible; TOP: 15px; LEFT: 15px;\"><img src="+objsrc+" border=\"0\"><\/div>");}}}

  function snowIE_NS6() {  
    doc_width = ns6up?window.innerWidth-10 : iecompattest().clientWidth-10;
		doc_height=(window.innerHeight && objdistance=="windowheight")? window.innerHeight : (ie4up && objdistance=="windowheight")?  iecompattest().clientHeight : (ie4up && !window.opera && objdistance=="pageheight")? iecompattest().scrollHeight : iecompattest().offsetHeight;
    for (i = 0; i < no; ++ i) {  
      yp[i] += sty[i];
      if (yp[i] > doc_height-50) {
        xp[i] = Math.random()*(doc_width-am[i]-30);
        yp[i] = 0;
        stx[i] = 0.02 + Math.random()/10;
        sty[i] = 0.7 + Math.random();
      }
      dx[i] += stx[i];
      document.getElementById("dot"+i).style.top=yp[i]+"px";
      document.getElementById("dot"+i).style.left=xp[i] + am[i]*Math.sin(dx[i])+"px";  
    }
    objtimer=setTimeout("snowIE_NS6()", 10);
  }

	function hideobj(){
		if (window.objtimer) clearTimeout(objtimer)
		for (i=0; i<no; i++) document.getElementById("dot"+i).style.visibility="hidden"
	}
		

if (ie4up||ns6up){
    snowIE_NS6();
		if (hideobjtime>0)
		setTimeout("hideobj()", hideobjtime*1000)
		}

</script>';
print $objfall_text;
?>