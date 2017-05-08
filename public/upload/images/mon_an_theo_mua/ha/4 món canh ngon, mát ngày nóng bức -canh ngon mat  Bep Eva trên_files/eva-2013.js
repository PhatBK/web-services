_IS_LOAD_JS=1;var pageCookie=Math.floor(Math.random()*4);var bannerDisplay=new Array();if(c=getCookie('pageCookie')){pageCookie=parseInt(c);}
pageCookie=pageCookie%1000;var richZIndex=10000;function getElement(elementID){return document.getElementById(elementID);}
function isIE(){if(navigator.appName.indexOf("Internet Explorer")!=-1){return true;}
return false;}
function isIE6(){if(!window.XMLHttpRequest){return true;}
return false;}
function _chrome_version()
{var chrome_version=0;if(/chrome/.test(navigator.userAgent.toLowerCase())){var chrome_version=parseInt(window.navigator.userAgent.match(/Chrome\/(\d+)\./)[1],10);}
return chrome_version;}
function f_filterResults(n_win,n_docel,n_body){var n_result=n_win?n_win:0;if(n_docel&&(!n_result||(n_result>n_docel)))
n_result=n_docel;return n_body&&(!n_result||(n_result>n_body))?n_body:n_result;}
function f_scrollLeft(){return f_filterResults(window.pageXOffset?window.pageXOffset:0,document.documentElement?document.documentElement.scrollLeft:0,document.body?document.body.scrollLeft:0);}
function f_scrollTop(){return f_filterResults(window.pageYOffset?window.pageYOffset:0,document.documentElement?document.documentElement.scrollTop:0,document.body?document.body.scrollTop:0);}
function f_clientWidth(){return f_filterResults(window.innerWidth?window.innerWidth:0,document.documentElement?document.documentElement.clientWidth:0,document.body?document.body.clientWidth:0);}
function f_clientHeight(){return f_filterResults(window.innerHeight?window.innerHeight:0,document.documentElement?document.documentElement.clientHeight:0,document.body?document.body.clientHeight:0);}
function scrollwindow(speed,callFunc){var pre=f_scrollLeft();window.scrollBy(speed,0);var current=f_scrollLeft();if(pre==current){clearTimeout(doExpand);if(callFunc!=''&&callFunc!=undefined){eval(callFunc);}}
else{doExpand=setTimeout('scrollwindow('+speed+', "'+callFunc+'")',20);}}
function smoothResize(elementID,v_width,v_height){var speed=6;var obj=getElement(elementID);var dx=(obj.offsetWidth<v_width)?1:-1;dx=dx*speed;var dy=(obj.offsetHeight<v_height)?1:-1;dy=dy*speed;if(obj.offsetWidth!=v_width){obj.style.width=obj.offsetWidth+dx+'px';if((dx>0&&obj.offsetWidth>v_width)||(dx<0&&obj.offsetWidth<v_width)){obj.style.width=v_width+'px';}}
if(obj.offsetWidth!=v_height){obj.style.height=obj.offsetHeight+dy+'px';if((dy>0&&obj.offsetHeight>v_height)||(dy<0&&obj.offsetHeight<v_height)){obj.style.height=v_height+'px';}}
if(obj.offsetWidth!=v_width||obj.offsetHeight!=v_height){setTimeout('smoothResize("'+elementID+'", '+v_width+', '+v_height+')',20);}}
function resize(elementID,v_width,v_height){var obj=getElement(elementID);obj.style.left='0px';obj.style.top='0px';obj.style.width=v_width+'px';obj.style.height=v_height+'px';}
function getPageSize(){var xScroll,yScroll;if(window.innerHeight&&window.scrollMaxY){xScroll=document.body.scrollWidth;yScroll=window.innerHeight+window.scrollMaxY;}else if(document.body.scrollHeight>document.body.offsetHeight){xScroll=document.body.scrollWidth;yScroll=document.body.scrollHeight;}else{xScroll=document.body.offsetWidth;yScroll=document.body.offsetHeight;}
var windowWidth,windowHeight;if(self.innerHeight){windowWidth=self.innerWidth;windowHeight=self.innerHeight;}else if(document.documentElement&&document.documentElement.clientHeight){windowWidth=document.documentElement.clientWidth;windowHeight=document.documentElement.clientHeight;}else if(document.body){windowWidth=document.body.clientWidth;windowHeight=document.body.clientHeight;}
if(yScroll<windowHeight){pageHeight=windowHeight;}else{pageHeight=yScroll;}
if(xScroll<windowWidth){pageWidth=windowWidth;}else{pageWidth=xScroll;}
arrayPageSize=new Array(pageWidth,pageHeight,windowWidth,windowHeight)
return arrayPageSize;}
function openPopBanner(elementID,path,bannerName,v_width,v_height,v_type){eval(elementID.substring(0,elementID.lastIndexOf("_"))+".stopShow=true;");var c_width=f_clientWidth();var c_height=f_clientHeight();if(!getElement(elementID+'_sub')){var objBody=document.getElementsByTagName("body").item(0);var objOverlay=document.createElement("div");objOverlay.setAttribute('id',elementID+'_sub');objOverlay.style.position='absolute';objOverlay.style.zIndex='1000';objOverlay.style.top='0%';objOverlay.style.left='0%';objOverlay.style.width='100%';objBody.insertBefore(objOverlay,objBody.firstChild);}
getElement(elementID+'_sub').style.display='block';getElement(elementID+'_sub').style.zIndex=richZIndex++;switch(v_type){case'lightbox':if(isIE6()){var arrayPageSize=getPageSize();var elementStyle='position:absolute;top:0%;left:0%;width:100%;height:'+arrayPageSize[1]+'px;';var elementSubStyle='position:absolute;z-index:1002;overflow:auto;top:'+(f_scrollTop()+(c_height-v_height)/2)+'px;left:'+(c_width-v_width)/2+'px;width:'+v_width+'px;height:'+v_height+'px;';}
else{var elementStyle='position:fixed;top:0%;left:0%;width:100%;height:100%;';var elementSubStyle='position:fixed;z-index:1002;overflow:auto;top:'+(c_height-v_height)/2+'px;left:'+(c_width-v_width)/2+'px;width:'+v_width+'px;height:'+v_height+'px;';}
getElement(elementID+'_sub').innerHTML='<div style="'+elementStyle+'background-color:black;z-index:1001;-moz-opacity:0.8;opacity:.80;filter:alpha(opacity=80);" onclick="closePopBanner(\''+elementID+'_sub\')"></div>';getElement(elementID+'_sub').innerHTML+='<div style="'+elementSubStyle+'"><embed type="application/x-shockwave-flash" src="'+path+bannerName+'" quality="high" allowscriptaccess="always" wmode="transparent" width="100%" height="100%" flashvars="divID='+elementID+'_sub" /></div>';break;case'takeover':default:getElement(elementID+'_sub').innerHTML='<div style="position:absolute;top:0%;left:'+(c_width-v_width)/2+'px;width:'+v_width+'px;height:'+v_height+'px;"><embed type="application/x-shockwave-flash" src="'+path+bannerName+'" quality="high" allowscriptaccess="always" wmode="transparent" width="100%" height="100%" flashvars="divID='+elementID+'_sub" /></div>';break;}}
function closePopBanner(elementID){getElement(elementID).innerHTML='';getElement(elementID).style.display='none';}
function closeBanner(elementID){var strObj=elementID.substring(0,elementID.lastIndexOf("_"));document.getElementById(eval(strObj).aNodes[elementID.substring(elementID.lastIndexOf("_")+1)].name).style.display="none";eval(strObj).aNodes.splice(elementID.substring(elementID.lastIndexOf("_")+1),1);eval(strObj).changeBanner();setCookie(elementID,elementID,24,'/','','');}
function expand(elementID,v_width1,v_height1,v_width2,v_height2,v_direction,v_type){eval(elementID.substring(0,elementID.lastIndexOf("_"))+".stopShow=true;");getElement(elementID).style.zIndex=richZIndex++;var objSub=getElement(elementID+'_sub');var objChild=getElement(elementID+'_child');switch(v_type){case'sitekick':objSub.style.width=v_width2+'px';objSub.style.height=v_height2+'px';scrollwindow(10);break;case'breakpage':smoothResize(elementID,v_width2,v_height2);smoothResize(elementID+'_sub',v_width2,v_height2);break;default:objSub.style.width=v_width2+'px';objSub.style.height=v_height2+'px';objChild.style.top='0px';objChild.style.left='0px';switch(v_direction){case'phai_xuong':break;case'phai_len':objSub.style.top=(v_height1-v_height2)+'px';break;case'trai_xuong':objSub.style.left=(v_width1-v_width2)+'px';break;case'trai_len':objSub.style.left=(v_width1-v_width2)+'px';objSub.style.top=(v_height1-v_height2)+'px';break;case'len_xuong':objSub.style.top=(v_height1-v_height2)/2+'px';break;}}}
function collapse(elementID,v_width1,v_height1,v_width2,v_height2,v_direction,v_type){switch(v_type){case'breakpage':smoothResize(elementID+'_sub',v_width1,v_height1);smoothResize(elementID,v_width1,v_height1);break;case'sitekick':scrollwindow(-10,"resize('"+elementID+"_sub',"+v_width1+","+v_height1+")");break;default:resize(elementID+'_sub',v_width1,v_height1);objChild=getElement(elementID+'_child');switch(v_direction){case'phai_len':objChild.style.top=(v_height1-v_height2)+'px';break;case'trai_len':objChild.style.left=(v_width1-v_width2)+'px';objChild.style.top=(v_height1-v_height2)+'px';break;case'trai_xuong':objChild.style.left=(v_width1-v_width2)+'px';break;case'len_xuong':objChild.style.top=(v_height1-v_height2)/2+'px';break;}}}
function openContact()
{MM_openBrWindow('/ajax/contact/index','newstools','status=yes,scrollbars=yes,resizable=yes,width=520,height=332')}
function fw24h_getFlash(object){var str='<object id="swf_'+object.name+'" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" border="0" height="'+object.height+'" width="'+object.width+'"><param name="movie" value="'+object.bannerPath+'"><param name="AllowScriptAccess" value="always"><param name="quality" value="High"><param name="wmode" value="transparent"><embed src="'+object.bannerPath+'" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" allowscriptaccess="always" height="'+object.height+'" width="'+object.width+'"></object>';if(_chrome_version()>=27){var str='<embed src="'+object.bannerPath+'" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" allowscriptaccess="always" height="'+object.height+'" width="'+object.width+'">';}
return str;}
function fw24h_getFloatFlash(object,flash_vars){var str='<object id="swf_'+object.name+'" classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://fpdownload.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" border="0" height="100%" width="100%"><param name="movie" value="'+object.bannerPath+object.name1+'"><param name="AllowScriptAccess" value="always"><param name="quality" value="High"><param name="wmode" value="transparent"><param name="flashVars" value="'+flash_vars+'"><embed src="'+object.bannerPath+object.name1+'" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" allowscriptaccess="always" height="100%" width="100%" flashVars="'+flash_vars+'"></object>';if(_chrome_version()>=27){var str='<embed src="'+object.bannerPath+object.name1+'" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" allowscriptaccess="always" height="100%" width="100%" flashVars="'+flash_vars+'">';}
return str;}
function Banner(objName){this.obj=objName;this.aNodes=[];this.bNodes=[];this.currentBanner=0;this.intLoopCount=1;this.intBannerFix=-1;this.intBannerLong=0;this.stopShow=false;};Banner.prototype.add=function(bannerType,bannerPath,bannerDuration,height,width,hyperlink,desc,popup){this.aNodes[this.aNodes.length]=new Node(this.obj+"_"+this.aNodes.length,bannerType,bannerPath,bannerDuration,height,width,hyperlink,'',popup);};Banner.prototype.add2=function(bannerType,bannerPath,bannerDuration,height,width,hyperlink,position,popup){this.bNodes[this.bNodes.length]=new Node(this.obj+"_"+this.bNodes.length,bannerType,bannerPath,bannerDuration,height,width,hyperlink,position,popup);};Banner.prototype.add3=function(bannerType,bannerPath,bannerDuration,height,width,height2,width2,type,name1,name2){this.aNodes[this.aNodes.length]=new NodeRich(this.obj+"_"+this.aNodes.length,bannerType,bannerPath,bannerDuration,height,width,height2,width2,type,name1,name2);};function Node(name,bannerType,bannerPath,bannerDuration,height,width,hyperlink,position,popup){this.name=name;this.bannerType=bannerType;this.bannerPath=bannerPath;this.bannerDuration=bannerDuration;this.height=height
this.width=width;this.hyperlink=hyperlink;this.position=position;this.popup=popup;};function Node2(name,bannerType,bannerPath,bannerDuration,height,width,hyperlink,position){this.name=name;this.bannerType=bannerType;this.bannerPath=bannerPath;this.bannerDuration=bannerDuration;this.height=height
this.width=width;this.hyperlink=hyperlink;this.position=position;};function NodeRich(name,bannerType,bannerPath,bannerDuration,height,width,height2,width2,type,name1,name2,desc){this.name=name;this.bannerType=bannerType;this.bannerPath=bannerPath;this.bannerDuration=bannerDuration;this.height=height
this.width=width;this.height2=height2;this.width2=width2;this.type=type;this.name1=name1;this.name2=name2;this.desc=desc;};function genBanner(bannerArr,bannerClass){bannerClass=(bannerClass==undefined)?'m_banner_hide':bannerClass;str='';inlineCode='';addClass='';bannerArr.richbanner=(bannerArr.width2>0&&bannerArr.height2>0)?true:false;if(bannerArr.richbanner){if(bannerArr.type=='lightbox'||bannerArr.type=='takeover'){str+='<div id="'+bannerArr.name+'" style="width:'+bannerArr.width+'px; height:'+bannerArr.height+'px;" class="'+bannerClass+'">';str+='</div>';bannerDisplay[bannerArr.name]=fw24h_getFloatFlash(bannerArr,'divID='+bannerArr.name+'&path='+bannerArr.bannerPath+'&bannerName='+bannerArr.name2+'&bannerWidth='+bannerArr.width2+'&bannerHeight='+bannerArr.height2+'&typeOpen='+bannerArr.type);}
else{switch(bannerArr.type){case'phai_xuong':childStyle='left:0px;';break;case'phai_len':childStyle='left:0px;top:'+(bannerArr.height-bannerArr.height2)+'px;';break;case'trai_xuong':childStyle='left:'+(bannerArr.width-bannerArr.width2)+'px;';break;case'trai_len':childStyle='top:'+(bannerArr.height-bannerArr.height2)+'px;';childStyle+='left:'+(bannerArr.width-bannerArr.width2)+'px;';break;case'len_xuong':childStyle='left:0px;top:'+(bannerArr.height-bannerArr.height2)/2+'px;';break;default:childStyle='left:0px;';}
str+='<div id="'+bannerArr.name+'" class="'+bannerClass+'"';str+='style="position:relative;left:0px;width:'+bannerArr.width+'px;height:'+bannerArr.height+'px;">';str+=' <div id="'+bannerArr.name+'_sub" style="position:absolute;overflow:hidden;left:0px;width:';str+=bannerArr.width+'px;height:'+bannerArr.height+'px;">';str+='  <div id="'+bannerArr.name+'_child" style="position:absolute;';str+='  width:'+bannerArr.width2+'px;height:'+bannerArr.height2+'px;'+childStyle+'">';str+='  </div>';str+=' </div>';str+='</div>';bannerDisplay[bannerArr.name+'_child']=fw24h_getFloatFlash(bannerArr,'divID='+bannerArr.name+'&path='+bannerArr.bannerPath+'&filename1='+bannerArr.name1+'&filename2='+bannerArr.name2+'&width1='+bannerArr.width+'&height1='+bannerArr.height+'&width2='+bannerArr.width2+'&height2='+bannerArr.height2+'&directionOpen='+bannerArr.type+'&typeOpen='+bannerArr.type);}}
else{bannerStr=new Array();bannerArr.bannerPath = bannerArr.bannerPath.replace('||', '&#124;&#124;');bannerArr.aBanner=bannerArr.bannerPath.split('|');bWidth=bannerArr.width;for(i=0;i<bannerArr.aBanner.length;i++){bannerArr.aBanner[i] = bannerArr.aBanner[i].replace('&#124;&#124;', '||');if(i==0){bannerArr.bannerPath=bannerArr.aBanner[0];}
else{bParams=bannerArr.aBanner[i].split('::');bannerArr.bannerType=bParams[0];bannerArr.bannerPath=bParams[1];bannerArr.height=bParams[2];bannerArr.width=bParams[3];bannerArr.hyperlink=bParams[4];bannerArr.popup=bParams[5];}
bannerStr[i]='';if(bannerArr.hyperlink!=""&&bannerArr.bannerType=="IMAGE"){bannerStr[i]+='<a href="'+bannerArr.hyperlink+'" '+((bannerArr.popup)?'target="_blank"':'')+'>';}
if(bannerArr.bannerType=="SCRIPT"){inlineCode=bannerArr.bannerPath;addClass=' clear';}
else if(bannerArr.bannerType=="FLASH"){bannerStr[i]+=fw24h_getFlash(bannerArr);}else if(bannerArr.bannerType=="IMAGE"){bannerStr[i]+='<img src="'+bannerArr.bannerPath+'" ';bannerStr[i]+='border="0" ';bannerStr[i]+='alt="" ';bannerStr[i]+='height="'+bannerArr.height+'" ';bannerStr[i]+='width="'+bannerArr.width+'">';}
if(bannerArr.bannerType=="TEXT"){bannerStr[i]+='<iframe width="'+bannerArr.width+'" height="'+bannerArr.height+'" src="'+bannerArr.bannerPath+'" marginwidth="0" marginheight="0" scrolling="no" frameborder="0"></iframe>'}
if(bannerArr.hyperlink!=""&&bannerArr.bannerType=="IMAGE"){bannerStr[i]+='</a>';}}
str+='<span name="'+bannerArr.name+'" '
str+='id="'+bannerArr.name+'" ';str+='class="'+bannerClass+addClass+'" ';str+='bgcolor="#FFFCDA" ';str+='align="center" ';str+='valign="top" ';str+='style="width:'+bWidth+'px;" >\n';str+=inlineCode;str+='</span>';if(inlineCode==''){bannerStr=bannerStr.sort(function(){return Math.random()-0.5;});bannerDisplay[bannerArr.name]=bannerStr.join('<img src="/images/blank.gif" width="5" height="5" alt="" />');}}
return str;}
function displayBanner()
{for(i in bannerDisplay){divID=getElement(i);divID.innerHTML=bannerDisplay[i];}}
Banner.prototype.toString=function(){this.currentBanner=pageCookie%this.aNodes.length;var str=""
for(var iCtr=0;iCtr<this.aNodes.length;iCtr++){if(getCookie(this.aNodes[iCtr].name)){this.aNodes.splice(iCtr,1);continue;}
if(this.currentBanner!=iCtr){continue;}
str+=genBanner(this.aNodes[iCtr],'m_banner_show');}
document.write(str);str='';return str;};Banner.prototype.start=function(){return;if(this.aNodes.length==0)
{return true;}
if(this.stopShow){return true;}
this.changeBanner();var thisBannerObj=this.obj;setTimeout(thisBannerObj+".start()",this.aNodes[this.currentBanner].bannerDuration*1000);}
Banner.prototype.changeBanner=function(){try{if(this.intLoopCount>(this.aNodes.length*3+1)){this.intBannerLong++;if(this.intBannerLong%3!=0){return false;}}
var thisBanner;var prevBanner=-1;if(this.currentBanner>this.aNodes.length-1)
{this.currentBanner=0;}
if(this.currentBanner<this.aNodes.length){thisBanner=this.currentBanner;if(this.aNodes.length>1){if(thisBanner>0){prevBanner=thisBanner-1;}else{prevBanner=this.aNodes.length-1;}}
if(this.currentBanner<this.aNodes.length-1){this.currentBanner=this.currentBanner+1;}else{this.currentBanner=0;}}
if(prevBanner>=0){if(navigator.appName.indexOf("Microsoft")!=-1&&!this.aNodes[prevBanner].richbanner&&this.aNodes[prevBanner].aBanner.length==1&&this.aNodes.length>1)stopmovie('swf_'+this.aNodes[prevBanner].name);document.getElementById(this.aNodes[prevBanner].name).className="m_banner_hide";}
if(navigator.appName.indexOf("Microsoft")!=-1&&!this.aNodes[thisBanner].richbanner&&this.aNodes[thisBanner].aBanner.length==1&&this.aNodes.length>1)goAndPlay('swf_'+this.aNodes[thisBanner].name,1);document.getElementById(this.aNodes[thisBanner].name).className="m_banner_show";this.intLoopCount++;}catch(e){}}
function thisMovie(movieName){if(navigator.appName.indexOf("Microsoft")!=-1){return window[movieName]}else{return document[movieName]}}
function movieIsLoaded(theMovie){if(typeof(theMovie)!="undefined"){return theMovie.PercentLoaded()==100;}else{return false;}}
function playmovie(movieName){if(movieIsLoaded(thisMovie(movieName))){thisMovie(movieName).Play();}}
function stopmovie(movieName){if(movieIsLoaded(thisMovie(movieName))){thisMovie(movieName).StopPlay();}}
function goAndPlay(movieName,theFrame){if(movieIsLoaded(thisMovie(movieName))){thisMovie(movieName).GotoFrame(theFrame);thisMovie(movieName).Play();}}
function d_Banner2(objName){this.obj=objName;this.aNodes=[];this.bNodes=[];this.currentBanner=0;};d_Banner2.prototype.add=function(bannerType,bannerPath,height,width,hyperlink,popup){var bannerDuration=0;this.aNodes[this.aNodes.length]=new Node(this.obj+"_"+this.aNodes.length,bannerType,bannerPath,bannerDuration,height,width,hyperlink,popup);};d_Banner2.prototype.add2=function(bannerType,bannerPath,height,width,hyperlink,position,popup){var bannerDuration=0;this.bNodes[this.bNodes.length]=new Node2(this.obj+"_b_"+this.bNodes.length,bannerType,bannerPath,bannerDuration,height,width,hyperlink,position,popup);};d_Banner2.prototype.toString=function(){var str="";var BannerPostion=pageCookie%this.aNodes.length;var i=1;for(var iCtr=BannerPostion;iCtr<this.aNodes.length;iCtr++){for(var iB=0;iB<this.bNodes.length;iB++){if(i==this.bNodes[iB].position){str+=genBanner(this.bNodes[iB],'d_banner2_show');i++;continue;}}
str+=genBanner(this.aNodes[iCtr],'d_banner2_show');i++;}
for(var iCtr=0;iCtr<BannerPostion;iCtr++){for(var iB=0;iB<this.bNodes.length;iB++){if(i==this.bNodes[iB].position){str+=genBanner(this.bNodes[iB],'d_banner2_show');i++;continue;}
else{}}
str+=genBanner(this.aNodes[iCtr],'d_banner2_show');i++;}
for(x=0;x<this.bNodes.length;x++){if(this.bNodes[x].position>=i){str+=genBanner(this.bNodes[x],'d_banner2_show');}}
document.write(str);str='';return str;};function d_Banner(objName){this.obj=objName;this.aNodes=[];this.currentBanner=0;};d_Banner.prototype.add=function(bannerType,bannerPath,height,width,hyperlink,popup){var bannerDuration=0;this.aNodes[this.aNodes.length]=new Node(this.obj+"_"+this.aNodes.length,bannerType,bannerPath,bannerDuration,height,width,hyperlink,'',popup);};d_Banner.prototype.toString=function(){var str="";var BannerPostion=pageCookie%this.aNodes.length;for(var iCtr=BannerPostion;iCtr<this.aNodes.length;iCtr++){str+=genBanner(this.aNodes[iCtr],'d_banner_show');}
for(var iCtr=0;iCtr<BannerPostion;iCtr++){str+=genBanner(this.aNodes[iCtr],'d_banner_show');}
document.write(str);str='';return str;};function dFloat_Banner(objName){this.obj=objName;this.aNodes=[];this.currentBanner=0;};dFloat_Banner.prototype.add=function(bannerType,bannerPath,height,width,hyperlink,popup){var bannerDuration=0;this.aNodes[this.aNodes.length]=new Node(this.obj+"_"+this.aNodes.length,bannerType,bannerPath,bannerDuration,height,width,hyperlink,popup);};dFloat_Banner.prototype.toString=function(){var str="";var BannerPostion=pageCookie%this.aNodes.length;for(var iCtr=BannerPostion;iCtr<this.aNodes.length;iCtr++){str+=genBanner(this.aNodes[iCtr],'d_Banner2_show');}
for(var iCtr=0;iCtr<BannerPostion;iCtr++){str+=genBanner(this.aNodes[iCtr],'d_Banner2_show');}
return str;};function flashWrite(p_url,p_width,p_height,p_corner,p_before,p_end)
{cID=p_url.match(/cID=(\d*)&/);cID=cID[1];p_url=p_url.substring(p_url.indexOf('file=')+5);p_url=p_url.replace('&','');p_url=p_url.replace(' ','');urlArr=p_url.split(',');arr_playlist=new Array();for(i=0;i<urlArr.length;i++){arr_playlist[i]='{file:"'+urlArr[i]+'?start=0"';if(i==0){arr_playlist[i]+=(p_before!=''&&p_before!='/')?', image:"'+p_before+'"':', image:"/js/preview.jpg"';}
arr_playlist[i]+='}';}
if(p_end!=''&&p_end!='/'){arr_playlist[urlArr.length]='{file:"'+p_end+'"}';}
v_playlist='['+arr_playlist.join()+']';playerID='mediaplayer'+Math.random();v_str_player='<div id="'+playerID+'"></div>';v_str_player+='<div id="'+playerID+'_ga" style="display:none"></div>';v_str_player+='<script type="text/javascript">';v_str_player+='jwplayer("'+playerID+'").setup({';v_str_player+='flashplayer: "/js/player.swf",';v_str_player+='playlist: '+v_playlist+',';v_str_player+='repeat: "list",';v_str_player+='stretching: "uniform",';v_str_player+='width: 528,';v_str_player+='height: 327,';v_str_player+='skin: "/js/trang-trong-eva.swf",';v_str_player+='"controlbar.idlehide":"true","controlbar.position":"bottom",';v_str_player+=(p_corner!=''&&p_corner!='/')?'logo:"'+p_corner+'", "logo.hide":"false", "logo.position":"top-right", "logo.out":"1",':'';v_str_player+='events: {onReady: function(event) {AjaxAction("'+playerID+'_ga", "/ajax/video_player_ga.html")}}';v_str_player+='})';v_str_player+='</script>';document.write(v_str_player);}
function CreateBookmarkLink(){title="24H.COM.VN - Th&#244;ng tin gi&#7843;i tr&#237; Vi&#7879;t Nam";url="http://www.24h.com.vn";if(window.sidebar){window.sidebar.addPanel(title,url,"");}else if(window.external){window.external.AddFavorite(url,title);}else if(window.opera&&window.print){return true;}}
function MM_openBrWindow(theURL,winName,features){window.open(theURL,winName,features);}
function j_substr(str,len){str=String(str);if(str.length<=len){document.write(str);return true;}
var str2=str.substring(0,str.substring(0,len).lastIndexOf(" "));document.write(str2+'...');}
function GetXmlHttpObject(){var objXMLHttp=null;if(window.XMLHttpRequest){objXMLHttp=new XMLHttpRequest();}else if(window.ActiveXObject){objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP");}
return objXMLHttp;}
function AjaxAction(where,url){var xmlHttp=new GetXmlHttpObject()
if(xmlHttp==null){return;}
var bar='<img src="/images/loading.gif" align="absmiddle" /> &#272;ang t&#7843;i d&#7919; li&#7879;u';document.getElementById(where).innerHTML=bar
xmlHttp.onreadystatechange=function(){if(xmlHttp.readyState==4||xmlHttp.readyState==200){document.getElementById(where).innerHTML=xmlHttp.responseText}}
xmlHttp.open("GET",url,true);xmlHttp.send(null);}
function Banner2(objName){this.obj=objName;this.aNodes=[];this.currentBanner=0;this.intLoopCount=0;this.intBannerFix=-1;this.stopShow=false;};Banner2.prototype.add=function(bannerType,bannerPath,bannerDuration,height,width,hyperlink,desc,popup){if(this.aNodes.length>=3)return;this.aNodes[this.aNodes.length]=new Node3(this.obj+"_"+this.aNodes.length,bannerType,bannerPath,bannerDuration,height,width,hyperlink,desc,popup);};Banner2.prototype.add3=function(bannerType,bannerPath,bannerDuration,height,width,height2,width2,type,name1,name2,desc){if(this.aNodes.length>=3)return;this.aNodes[this.aNodes.length]=new NodeRich(this.obj+"_"+this.aNodes.length,bannerType,bannerPath,bannerDuration,height,width,height2,width2,type,name1,name2,desc);};function Node3(name,bannerType,bannerPath,bannerDuration,height,width,hyperlink,desc,popup){this.name=name;this.bannerType=bannerType;this.bannerPath=bannerPath;this.bannerDuration=bannerDuration;this.height=height
this.width=width;this.hyperlink=hyperlink;this.desc=desc;this.popup=popup;};Banner2.prototype.toString=function(){this.currentBanner=pageCookie%this.aNodes.length;var str=""
for(var iCtr=0;iCtr<this.aNodes.length;iCtr++){if(getCookie(this.aNodes[iCtr].name)){this.aNodes.splice(iCtr,1);continue;}
str+=genBanner(this.aNodes[iCtr],'m_banner_hide');}
return str;};Banner2.prototype.start=function(){if(this.aNodes.length==0){return true;}
if(this.stopShow){return true;}
this.changeBanner();var thisBannerObj=this.obj;return setTimeout(thisBannerObj+".start()",this.aNodes[this.currentBanner].bannerDuration*1000);}
Banner2.prototype.changeBanner=function(){var thisBanner;if(this.currentBanner>this.aNodes.length-1)return true;var prevBanner=-1;if(this.currentBanner<this.aNodes.length){thisBanner=this.currentBanner;if(this.aNodes.length>1){if(thisBanner>0){prevBanner=thisBanner-1;}else{prevBanner=this.aNodes.length-1;}}
if(this.currentBanner<this.aNodes.length-1){this.currentBanner=this.currentBanner+1;}else{this.currentBanner=0;}}
for(ii=0;ii<this.aNodes.length;ii++){if(document.getElementById(this.aNodes[ii].name)){document.getElementById(this.aNodes[ii].name).className="m_banner_hide";document.getElementById(this.obj+"_desc_"+ii).className="m_banner_lost_focus";document.getElementById(this.obj+"_desc_"+ii).style.backgroundColor='#C2C2C2';}}
if(prevBanner>=0){document.getElementById(this.aNodes[prevBanner].name).className="m_banner_hide";document.getElementById(this.obj+"_desc_"+prevBanner).className="m_banner_lost_focus";document.getElementById(this.obj+"_desc_"+prevBanner).style.backgroundColor='#C2C2C2';}
document.getElementById(this.aNodes[thisBanner].name).className="m_banner_show";document.getElementById(this.obj+"_desc_"+thisBanner).className="m_banner_focus";document.getElementById(this.obj+"_desc_"+thisBanner).style.backgroundColor='#E2E2E2';}
function indexTabOver(tab_id,tab_group){return false;document.getElementById('tab1_'+tab_id).innerHTML='<img src="/images/index_box_01_04.gif" width="4" height="17" />';document.getElementById('tab3_'+tab_id).innerHTML='<img src="/images/index_box_01_06.gif" width="5" height="17" />';document.getElementById('tab4_'+tab_id).innerHTML='<img src="/images/index_box_01_10.gif" width="4" height="10" />';document.getElementById('tab5_'+tab_id).innerHTML='<img src="/images/index_box_01_11.gif" width="57" height="10" alt="">';document.getElementById("tab5_"+tab_id).style.background="url(/images/index_box_01_15.gif)";document.getElementById("tab2_"+tab_id).style.background="#80C141 url(/images/index_box_01_14.gif)";document.getElementById("tab2_"+tab_id).style.fontWeight='bold';document.getElementById("tab2_"+tab_id).style.color="#ffffff";document.getElementById("tab2_"+tab_id).className="home_index_tab_title_over";document.getElementById('tab6_'+tab_id).innerHTML='<img src="/images/index_box_01_12.gif" width="4" height="10" />';document.getElementById('tabContent_'+tab_id).style.display="block";}
function fw24h_trackPageview(filename){var url=filename+'?dd='+(new Date).getTime();try{AjaxAction('fw24h_trackPageview',url);}catch(e){}}
function openNewImage(file,imgText){if(file.lang=='no-popup')return;picfile=new Image();picfile.src=(file.src);width=picfile.width;height=picfile.height;if(imgText!=''&&height>0){height+=40;}
else if(height==0){height=screen.height;}
winDef='status=no,resizable=yes,scrollbars=no,toolbar=no,location=no,fullscreen=no,titlebar=yes,height='.concat(height).concat(',').concat('width=').concat(width).concat(',');winDef=winDef.concat('top=').concat((screen.height-height)/2).concat(',');winDef=winDef.concat('left=').concat((screen.width-width)/2);newwin=open('','_blank',winDef);newwin.document.writeln('<style>a:visited{color:blue;text-decoration:none}</style>');newwin.document.writeln('<body topmargin="0" leftmargin="0" marginheight="0" marginwidth="0">');newwin.document.writeln('<div style="width:100%;height:100%;overflow:auto;"><a style="cursor:pointer" href="javascript:window.close()"><img src="',file.src,'" border=0></a>');if(imgText!=''){newwin.document.writeln('<div align="center" style="padding-top:5px;font-weight:bold;font-family:arial,Verdana,Tahoma;color:blue">',imgText,'</div></div>');}
newwin.document.writeln('</body>');newwin.document.close();}
function getElementsByClassName(searchClass,node,tag){var classElements=new Array();if(node==null){node=document;}
if(tag==null){tag='*';}
var els=node.getElementsByTagName(tag);var elsLen=els.length;var pattern=new RegExp("(^|\\s)"+searchClass+"(\\s|$)");for(var i=0,j=0;i<elsLen;i++){if(pattern.test(els[i].className)){classElements[j]=els[i];j++;}}
return classElements;}
function resizeNewsImage(className,maxWidth){var maxWidth=(maxWidth==null)?500:maxWidth;for(var i=0;imgEle=getElementsByClassName(className,null,'img')[i];i++){if(imgEle.width>maxWidth){imgEle.height=Math.round((imgEle.height*maxWidth)/imgEle.width);imgEle.width=maxWidth;}}}
function setOpacity(obj,opacity){opacity=(opacity==100)?99.999:opacity;obj.style.filter="alpha(opacity:"+opacity+")";obj.style.KHTMLOpacity=opacity/100;obj.style.MozOpacity=opacity/100;obj.style.opacity=opacity/100;}
function fadeIn(objId,opacity){if(document.getElementById){obj=document.getElementById(objId);if(opacity<=100){setOpacity(obj,opacity);opacity+=5;window.setTimeout("fadeIn('"+objId+"',"+opacity+")",15);}}}
function closeBanner(elementID){var strObj=elementID.substring(0,elementID.lastIndexOf("_"));document.getElementById(eval(strObj).aNodes[elementID.substring(elementID.lastIndexOf("_")+1)].name).style.display="none";eval(strObj).aNodes.splice(elementID.substring(elementID.lastIndexOf("_")+1),1);eval(strObj).changeBanner();setCookie(elementID,elementID,24,'/','','');}
function findPos(obj){var posX=obj.offsetLeft;var posY=obj.offsetTop;while(obj.offsetParent){if(obj==document.getElementsByTagName('body')[0]){break}
else{posX=posX+obj.offsetParent.offsetLeft;posY=posY+obj.offsetParent.offsetTop;obj=obj.offsetParent;}}
var posArray=[posX,posY]
return posArray;}
function findYPos(obj){var posObj=findPos(obj);return posObj[1];}
function doScroll(divID,fixPos,parentID){var obj=document.getElementById(divID);var objParent=document.getElementById(parentID);var parentPos=findYPos(objParent);var floorPos=parentPos+objParent.offsetHeight;if(f_scrollTop()>fixPos&&obj.offsetHeight<f_clientHeight()&&fixPos+obj.offsetHeight!=floorPos){if(f_scrollTop()+obj.offsetHeight>=floorPos){obj.style.position='absolute';obj.style.top=(floorPos-obj.offsetHeight)+'px';}
else{if(isIE6()){obj.style.position='absolute';obj.style.top=f_scrollTop()+'px';}
else{obj.style.position='fixed';obj.style.top='0%';}}}
else{if(isIE6()){obj.style.display='block';}
else{obj.style.top='0%';obj.style.position='relative';}}}
function doScrollSideBar(divID){var obj=getElement(divID);if(!obj)return false;scrollSideBar(divID,f_scrollTop()+f_clientHeight()-obj.offsetHeight-10);}
function scrollSideBar(divID,newPos){var obj=getElement(divID);clearTimeout(obj["at_timeout"]);if(obj.offsetTop!=newPos){offset=(newPos-obj.offsetTop<0)?-1*Math.ceil((obj.offsetTop-newPos)/16):Math.ceil((newPos-obj.offsetTop)/16);offset+=obj.offsetTop;obj.style.top=offset+'px';obj["at_timeout"]=timeoutSideBar=setTimeout("scrollSideBar( '"+divID+"', "+newPos+")",1);}}
function setCookie(name,value,expires,path,domain,secure){var today=new Date();today.setTime(today.getTime());if(expires){expires=expires*1000*60*60;}
var expires_date=new Date(today.getTime()+(expires));document.cookie=name+"="+escape(value)+
((expires)?";expires="+expires_date.toGMTString():"")+
((path)?";path="+path:"")+
((domain)?";domain="+domain:"")+
((secure)?";secure":"");}
function getCookie(name){var start=document.cookie.indexOf(name+"=");var len=start+name.length+1;if((!start)&&(name!=document.cookie.substring(0,name.length))){return null;}
if(start==-1)return null;var end=document.cookie.indexOf(";",len);if(end==-1)end=document.cookie.length;return unescape(document.cookie.substring(len,end));}
function deleteCookie(name,path,domain){if(getCookie(name))document.cookie=name+"="+
((path)?";path="+path:"")+
((domain)?";domain="+domain:"")+";expires=Thu, 01-Jan-1970 00:00:01 GMT";}
function showeventdesc()
{var eventdiv=document.getElementById('eventdescid');var arrowimg=document.getElementById('eventarrow');var arrowimgup=document.getElementById('eventarrowup');var newshoteva=document.getElementById('news_hot_eva');eventdiv.style.display="";arrowimg.style.display="none";arrowimgup.style.display="block";newshoteva.style.cssFloat="none";}
function hideeventdesc()
{var eventdiv=document.getElementById('eventdescid');var arrowimg=document.getElementById('eventarrow');var arrowimgup=document.getElementById('eventarrowup');var newshoteva=document.getElementById('news_hot_eva');eventdiv.style.display="none";arrowimg.style.display="block";arrowimgup.style.display="none";newshoteva.style.cssFloat="left";}
if(typeof dd_domreadycheck=="undefined")
var dd_domreadycheck=false
var ddlevelsmenu={enableshim:false,arrowpointers:{downarrow:["arrow-down.gif",11,7],rightarrow:["arrow-right.gif",12,12],showarrow:{toplevel:false,sublevel:false}},hideinterval:200,effects:{enableswipe:false,enablefade:false,duration:200},httpsiframesrc:"blank.htm",topmenuids:[],topitems:{},subuls:{},lastactivesubul:{},topitemsindex:-1,ulindex:-1,hidetimers:{},shimadded:false,nonFF:!/Firefox[\/\s](\d+\.\d+)/.test(navigator.userAgent),getoffset:function(what,offsettype){return(what.offsetParent)?what[offsettype]+this.getoffset(what.offsetParent,offsettype):what[offsettype]},getoffsetof:function(el){el._offsets={left:this.getoffset(el,"offsetLeft"),top:this.getoffset(el,"offsetTop")}},getwindowsize:function(){this.docwidth=window.innerWidth?window.innerWidth-10:this.standardbody.clientWidth-10
this.docheight=window.innerHeight?window.innerHeight-15:this.standardbody.clientHeight-18},gettopitemsdimensions:function(){for(var m=0;m<this.topmenuids.length;m++){var topmenuid=this.topmenuids[m]
for(var i=0;i<this.topitems[topmenuid].length;i++){var header=this.topitems[topmenuid][i]
var submenu=document.getElementById(header.getAttribute('rel'))
header._dimensions={w:header.offsetWidth,h:header.offsetHeight,submenuw:submenu.offsetWidth,submenuh:submenu.offsetHeight}}}},isContained:function(m,e){var e=window.event||e
var c=e.relatedTarget||((e.type=="mouseover")?e.fromElement:e.toElement)
while(c&&c!=m)try{c=c.parentNode}catch(e){c=m}
if(c==m)
return true
else
return false},addpointer:function(target,imgclass,imginfo,BeforeorAfter){var pointer=document.createElement("img")
pointer.src=imginfo[0]
pointer.style.width=imginfo[1]+"px"
pointer.style.height=imginfo[2]+"px"
if(imgclass=="rightarrowpointer"){pointer.style.left=target.offsetWidth-imginfo[2]-2+"px"}
pointer.className=imgclass
var target_firstEl=target.childNodes[target.firstChild.nodeType!=1?1:0]
if(target_firstEl&&target_firstEl.tagName=="SPAN"){target=target_firstEl}
if(BeforeorAfter=="before")
target.insertBefore(pointer,target.firstChild)
else
target.appendChild(pointer)},css:function(el,targetclass,action){var needle=new RegExp("(^|\\s+)"+targetclass+"($|\\s+)","ig")
if(action=="check")
return needle.test(el.className)
else if(action=="remove")
el.className=el.className.replace(needle,"")
else if(action=="add"&&!needle.test(el.className))
el.className+=" "+targetclass},addshimmy:function(target){var shim=(!window.opera)?document.createElement("iframe"):document.createElement("div")
shim.className="ddiframeshim"
shim.setAttribute("src",location.protocol=="https:"?this.httpsiframesrc:"about:blank")
shim.setAttribute("frameborder","0")
target.appendChild(shim)
try{shim.style.filter='progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0)'}
catch(e){}
return shim},positionshim:function(header,submenu,dir,scrollX,scrollY){if(header._istoplevel){var scrollY=window.pageYOffset?window.pageYOffset:this.standardbody.scrollTop
var topgap=header._offsets.top-scrollY
var bottomgap=scrollY+this.docheight-header._offsets.top-header._dimensions.h
if(topgap>0){this.shimmy.topshim.style.left=scrollX+"px"
this.shimmy.topshim.style.top=scrollY+"px"
this.shimmy.topshim.style.width="99%"
this.shimmy.topshim.style.height=topgap+"px"}
if(bottomgap>0){this.shimmy.bottomshim.style.left=scrollX+"px"
this.shimmy.bottomshim.style.top=header._offsets.top+header._dimensions.h+"px"
this.shimmy.bottomshim.style.width="99%"
this.shimmy.bottomshim.style.height=bottomgap+"px"}}},hideshim:function(){this.shimmy.topshim.style.width=this.shimmy.bottomshim.style.width=0
this.shimmy.topshim.style.height=this.shimmy.bottomshim.style.height=0},buildmenu:function(mainmenuid,header,submenu,submenupos,istoplevel,dir){header._master=mainmenuid
header._pos=submenupos
header._istoplevel=istoplevel
if(istoplevel){this.addEvent(header,function(e){ddlevelsmenu.hidemenu(ddlevelsmenu.subuls[this._master][parseInt(this._pos)])},"click")}
this.subuls[mainmenuid][submenupos]=submenu
header._dimensions={w:header.offsetWidth,h:header.offsetHeight,submenuw:submenu.offsetWidth,submenuh:submenu.offsetHeight}
this.getoffsetof(header)
submenu.style.left=0
submenu.style.top=0
submenu.style.visibility="hidden"
this.addEvent(header,function(e){if(!ddlevelsmenu.isContained(this,e)){var submenu=ddlevelsmenu.subuls[this._master][parseInt(this._pos)]
if(this._istoplevel){ddlevelsmenu.css(this,"selected","add")
clearTimeout(ddlevelsmenu.hidetimers[this._master][this._pos])}
ddlevelsmenu.getoffsetof(header)
var scrollX=window.pageXOffset?window.pageXOffset:ddlevelsmenu.standardbody.scrollLeft
var scrollY=window.pageYOffset?window.pageYOffset:ddlevelsmenu.standardbody.scrollTop
var submenurightedge=this._offsets.left+this._dimensions.submenuw+(this._istoplevel&&dir=="topbar"?0:this._dimensions.w)
var submenubottomedge=this._offsets.top+this._dimensions.submenuh
var menuleft=(this._istoplevel?this._offsets.left+(dir=="sidebar"?this._dimensions.w:0):this._dimensions.w)
if(submenurightedge-scrollX>ddlevelsmenu.docwidth){menuleft+=-this._dimensions.submenuw+(this._istoplevel&&dir=="topbar"?this._dimensions.w:-this._dimensions.w)}
submenu.style.left=menuleft+"px"
var menutop=(this._istoplevel?this._offsets.top+(dir=="sidebar"?0:this._dimensions.h):this.offsetTop)
submenu.style.top=menutop+"px"
if(ddlevelsmenu.enableshim&&(ddlevelsmenu.effects.enableswipe==false||ddlevelsmenu.nonFF)){ddlevelsmenu.positionshim(header,submenu,dir,scrollX,scrollY)}
else{submenu.FFscrollInfo={x:scrollX,y:scrollY}}
ddlevelsmenu.showmenu(header,submenu,dir)}},"mouseover")
this.addEvent(header,function(e){var submenu=ddlevelsmenu.subuls[this._master][parseInt(this._pos)]
if(this._istoplevel){if(!ddlevelsmenu.isContained(this,e)&&!ddlevelsmenu.isContained(submenu,e))
ddlevelsmenu.hidemenu(submenu)}
else if(!this._istoplevel&&!ddlevelsmenu.isContained(this,e)){ddlevelsmenu.hidemenu(submenu)}},"mouseout")},setopacity:function(el,value){el.style.opacity=value
if(typeof el.style.opacity!="string"){el.style.MozOpacity=value
if(el.filters){el.style.filter="progid:DXImageTransform.Microsoft.alpha(opacity="+value*100+")"}}},showmenu:function(header,submenu,dir){if(this.effects.enableswipe||this.effects.enablefade){if(this.effects.enableswipe){var endpoint=(header._istoplevel&&dir=="topbar")?header._dimensions.submenuh:header._dimensions.submenuw
submenu.style.width=submenu.style.height=0
submenu.style.overflow="hidden"}
if(this.effects.enablefade){this.setopacity(submenu,0)}
submenu._curanimatedegree=0
submenu.style.visibility="visible"
clearInterval(submenu._animatetimer)
submenu._starttime=new Date().getTime()
submenu._animatetimer=setInterval(function(){ddlevelsmenu.revealmenu(header,submenu,endpoint,dir)},10)}
else{submenu.style.visibility="visible"}},revealmenu:function(header,submenu,endpoint,dir){var elapsed=new Date().getTime()-submenu._starttime
if(elapsed<this.effects.duration){if(this.effects.enableswipe){if(submenu._curanimatedegree==0){submenu.style[header._istoplevel&&dir=="topbar"?"width":"height"]="auto"}
submenu.style[header._istoplevel&&dir=="topbar"?"height":"width"]=(submenu._curanimatedegree*endpoint)+"px"}
if(this.effects.enablefade){this.setopacity(submenu,submenu._curanimatedegree)}}
else{clearInterval(submenu._animatetimer)
if(this.effects.enableswipe){submenu.style.width="auto"
submenu.style.height="auto"
submenu.style.overflow="visible"}
if(this.effects.enablefade){this.setopacity(submenu,1)
submenu.style.filter=""}
if(this.enableshim&&submenu.FFscrollInfo)
this.positionshim(header,submenu,dir,submenu.FFscrollInfo.x,submenu.FFscrollInfo.y)}
submenu._curanimatedegree=(1-Math.cos((elapsed/this.effects.duration)*Math.PI))/2},hidemenu:function(submenu){if(typeof submenu._pos!="undefined"){this.css(this.topitems[submenu._master][parseInt(submenu._pos)],"selected","remove")
if(this.enableshim)
this.hideshim()}
clearInterval(submenu._animatetimer)
submenu.style.left=0
submenu.style.top="-1000px"
submenu.style.visibility="hidden"},addEvent:function(target,functionref,tasktype){if(target.addEventListener)
target.addEventListener(tasktype,functionref,false);else if(target.attachEvent)
target.attachEvent('on'+tasktype,function(){return functionref.call(target,window.event)});},domready:function(functionref){if(dd_domreadycheck){functionref()
return}
if(document.addEventListener){document.addEventListener("DOMContentLoaded",function(){document.removeEventListener("DOMContentLoaded",arguments.callee,false)
functionref();dd_domreadycheck=true},false)}
else if(document.attachEvent){if(document.documentElement.doScroll&&window==window.top)(function(){if(dd_domreadycheck){functionref()
return}
try{document.documentElement.doScroll("left")}catch(error){setTimeout(arguments.callee,0)
return;}
functionref();dd_domreadycheck=true})();}
if(document.attachEvent&&parent.length>0)
this.addEvent(window,function(){functionref()},"load");},init:function(mainmenuid,dir){this.standardbody=(document.compatMode=="CSS1Compat")?document.documentElement:document.body
this.topitemsindex=-1
this.ulindex=-1
this.topmenuids.push(mainmenuid)
this.topitems[mainmenuid]=[]
this.subuls[mainmenuid]=[]
this.hidetimers[mainmenuid]=[]
if(this.enableshim&&!this.shimadded){this.shimmy={}
this.shimmy.topshim=this.addshimmy(document.body)
this.shimmy.bottomshim=this.addshimmy(document.body)
this.shimadded=true}
var menubar=document.getElementById(mainmenuid)
if(!menubar){return;}
var alllinks=menubar.getElementsByTagName("a")
this.getwindowsize()
for(var i=0;i<alllinks.length;i++){if(alllinks[i].getAttribute('rel')){this.topitemsindex++
this.ulindex++
var menuitem=alllinks[i]
this.topitems[mainmenuid][this.topitemsindex]=menuitem
var dropul=document.getElementById(menuitem.getAttribute('rel'))
document.body.appendChild(dropul)
dropul.style.zIndex=2000
dropul._master=mainmenuid
dropul._pos=this.topitemsindex
this.addEvent(dropul,function(){ddlevelsmenu.hidemenu(this)},"click")
var arrowclass=(dir=="sidebar")?"rightarrowpointer":"downarrowpointer"
var arrowpointer=(dir=="sidebar")?this.arrowpointers.rightarrow:this.arrowpointers.downarrow
if(this.arrowpointers.showarrow.toplevel)
this.addpointer(menuitem,arrowclass,arrowpointer,(dir=="sidebar")?"before":"after")
this.buildmenu(mainmenuid,menuitem,dropul,this.ulindex,true,dir)
dropul.onmouseover=function(){clearTimeout(ddlevelsmenu.hidetimers[this._master][this._pos])}
this.addEvent(dropul,function(e){if(!ddlevelsmenu.isContained(this,e)&&!ddlevelsmenu.isContained(ddlevelsmenu.topitems[this._master][parseInt(this._pos)],e)){var dropul=this
if(ddlevelsmenu.enableshim)
ddlevelsmenu.hideshim()
ddlevelsmenu.hidetimers[this._master][this._pos]=setTimeout(function(){ddlevelsmenu.hidemenu(dropul)},ddlevelsmenu.hideinterval)}},"mouseout")
var subuls=dropul.getElementsByTagName("ul")
for(var c=0;c<subuls.length;c++){this.ulindex++
var parentli=subuls[c].parentNode
if(this.arrowpointers.showarrow.sublevel)
this.addpointer(parentli.getElementsByTagName("a")[0],"rightarrowpointer",this.arrowpointers.rightarrow,"before")
this.buildmenu(mainmenuid,parentli,subuls[c],this.ulindex,false,dir)}}}
this.addEvent(window,function(){ddlevelsmenu.getwindowsize();ddlevelsmenu.gettopitemsdimensions()},"resize")},setup:function(mainmenuid,dir){this.domready(function(){ddlevelsmenu.init(mainmenuid,dir)})}}
function at_show_aux(parent,child)
{var p=document.getElementById(parent);var c=document.getElementById(child);var top=(c["at_position"]=="y")?p.offsetHeight+2:0;var left=(c["at_position"]=="x")?p.offsetWidth+2:0;for(;p;p=p.offsetParent)
{top+=p.offsetTop;left+=p.offsetLeft;}
c.style.position="absolute";c.style.top=top+'px';c.style.left=left+'px';c.style.visibility="visible";}
function at_show()
{var p=document.getElementById(this["at_parent"]);var c=document.getElementById(this["at_child"]);c["show_timeout"]=setTimeout("at_show_aux('"+p.id+"', '"+c.id+"');",400);clearTimeout(c["at_timeout"]);}
function at_hide()
{var p=document.getElementById(this["at_parent"]);var c=document.getElementById(this["at_child"]);clearTimeout(c["show_timeout"]);c["at_timeout"]=setTimeout("document.getElementById('"+c.id+"').style.visibility = 'hidden'",430);}
function at_click()
{var p=document.getElementById(this["at_parent"]);var c=document.getElementById(this["at_child"]);if(c.style.visibility!="visible")at_show_aux(p.id,c.id);else c.style.visibility="hidden";return false;}
function at_attach(parent,child,showtype,position,cursor)
{var p=document.getElementById(parent);if(p==undefined){return;}
var c=document.getElementById(child);p["at_parent"]=p.id;c["at_parent"]=p.id;p["at_child"]=c.id;c["at_child"]=c.id;p["at_position"]=position;c["at_position"]=position;c.style.position="absolute";c.style.visibility="hidden";if(cursor!=undefined)p.style.cursor=cursor;switch(showtype)
{case"click":p.onclick=at_click;p.onmouseout=at_hide;c.onmouseover=at_show;c.onmouseout=at_hide;break;case"hover":p.onmouseover=at_show;p.onmouseout=at_hide;c.onmouseover=at_show;c.onmouseout=at_hide;break;}}
function getAnchorPosition(anchorname){var useWindow=false;var coordinates=new Object();var x=0,y=0;var use_gebi=false,use_css=false,use_layers=false;if(document.getElementById){use_gebi=true;}
else if(document.all){use_css=true;}
else if(document.layers){use_layers=true;}
if(use_gebi&&document.all){x=AnchorPosition_getPageOffsetLeft(document.all[anchorname]);y=AnchorPosition_getPageOffsetTop(document.all[anchorname]);}
else if(use_gebi){var o=document.getElementById(anchorname);x=AnchorPosition_getPageOffsetLeft(o);y=AnchorPosition_getPageOffsetTop(o);}
else if(use_css){x=AnchorPosition_getPageOffsetLeft(document.all[anchorname]);y=AnchorPosition_getPageOffsetTop(document.all[anchorname]);}
else if(use_layers){var found=0;for(var i=0;i<document.anchors.length;i++){if(document.anchors[i].name==anchorname){found=1;break;}}
if(found==0){coordinates.x=0;coordinates.y=0;return coordinates;}
x=document.anchors[i].x;y=document.anchors[i].y;}
else{coordinates.x=0;coordinates.y=0;return coordinates;}
coordinates.x=x;coordinates.y=y;return coordinates;}
function getAnchorWindowPosition(anchorname){var coordinates=getAnchorPosition(anchorname);var x=0;var y=0;if(document.getElementById){if(isNaN(window.screenX)){x=coordinates.x-document.body.scrollLeft+window.screenLeft;y=coordinates.y-document.body.scrollTop+window.screenTop;}
else{x=coordinates.x+window.screenX+(window.outerWidth-window.innerWidth)-window.pageXOffset;y=coordinates.y+window.screenY+(window.outerHeight-24-window.innerHeight)-window.pageYOffset;}}
else if(document.all){x=coordinates.x-document.body.scrollLeft+window.screenLeft;y=coordinates.y-document.body.scrollTop+window.screenTop;}
else if(document.layers){x=coordinates.x+window.screenX+(window.outerWidth-window.innerWidth)-window.pageXOffset;y=coordinates.y+window.screenY+(window.outerHeight-24-window.innerHeight)-window.pageYOffset;}
coordinates.x=x;coordinates.y=y;return coordinates;}
function AnchorPosition_getPageOffsetLeft(el){var ol=el.offsetLeft;while((el=el.offsetParent)!=null){ol+=el.offsetLeft;}
return ol;}
function AnchorPosition_getWindowOffsetLeft(el){return AnchorPosition_getPageOffsetLeft(el)-document.body.scrollLeft;}
function AnchorPosition_getPageOffsetTop(el){var ot=el.offsetTop;while((el=el.offsetParent)!=null){ot+=el.offsetTop;}
return ot;}
function AnchorPosition_getWindowOffsetTop(el){return AnchorPosition_getPageOffsetTop(el)-document.body.scrollTop;}
function CalendarPopup(){var c;if(arguments.length>0){c=new PopupWindow(arguments[0]);}
else{c=new PopupWindow();c.setSize(150,175);}
c.offsetX=-152;c.offsetY=25;c.autoHide();c.monthNames=new Array("Th&#225;ng 1","Th&#225;ng 2","Th&#225;ng 3","Th&#225;ng 4","Th&#225;ng 5","Th&#225;ng 6","Th&#225;ng 7","Th&#225;ng 8","Th&#225;ng 9","Th&#225;ng 10","Th&#225;ng 11","Th&#225;ng 12");c.monthAbbreviations=new Array("Th 1","Th 2","Th 3","Th 4","Th 5","Th 6","Th 7","Th 8","Th 9","Th 10","Th 11","Th 12");c.dayHeaders=new Array("CN","T2","T3","T4","T5","T6","T7");c.returnFunction="CP_tmpReturnFunction";c.returnMonthFunction="CP_tmpReturnMonthFunction";c.returnQuarterFunction="CP_tmpReturnQuarterFunction";c.returnYearFunction="CP_tmpReturnYearFunction";c.weekStartDay=0;c.isShowYearNavigation=false;c.displayType="date";c.disabledWeekDays=new Object();c.disabledDatesExpression="";c.yearSelectStartOffset=4;c.currentDate=null;c.todayText="H&#244;m nay";c.cssPrefix="";c.isShowNavigationDropdowns=false;c.isShowYearNavigationInput=false;window.CP_calendarObject=null;window.CP_targetInput=null;window.CP_dateFormat="MM/dd/yyyy";c.copyMonthNamesToWindow=CP_copyMonthNamesToWindow;c.setReturnFunction=CP_setReturnFunction;c.setReturnMonthFunction=CP_setReturnMonthFunction;c.setReturnQuarterFunction=CP_setReturnQuarterFunction;c.setReturnYearFunction=CP_setReturnYearFunction;c.setMonthNames=CP_setMonthNames;c.setMonthAbbreviations=CP_setMonthAbbreviations;c.setDayHeaders=CP_setDayHeaders;c.setWeekStartDay=CP_setWeekStartDay;c.setDisplayType=CP_setDisplayType;c.setDisabledWeekDays=CP_setDisabledWeekDays;c.addDisabledDates=CP_addDisabledDates;c.setYearSelectStartOffset=CP_setYearSelectStartOffset;c.setTodayText=CP_setTodayText;c.showYearNavigation=CP_showYearNavigation;c.showCalendar=CP_showCalendar;c.hideCalendar=CP_hideCalendar;c.getStyles=getCalendarStyles;c.refreshCalendar=CP_refreshCalendar;c.getCalendar=CP_getCalendar;c.select=CP_select;c.setCssPrefix=CP_setCssPrefix;c.showNavigationDropdowns=CP_showNavigationDropdowns;c.showYearNavigationInput=CP_showYearNavigationInput;c.copyMonthNamesToWindow();return c;}
function CP_copyMonthNamesToWindow(){if(typeof(window.MONTH_NAMES)!="undefined"&&window.MONTH_NAMES!=null){window.MONTH_NAMES=new Array();for(var i=0;i<this.monthNames.length;i++){window.MONTH_NAMES[window.MONTH_NAMES.length]=this.monthNames[i];}
for(var i=0;i<this.monthAbbreviations.length;i++){window.MONTH_NAMES[window.MONTH_NAMES.length]=this.monthAbbreviations[i];}}}
function CP_tmpReturnFunction(y,m,d){if(window.CP_targetInput!=null){var dt=new Date(y,m-1,d,0,0,0);if(window.CP_calendarObject!=null){window.CP_calendarObject.copyMonthNamesToWindow();}
window.CP_targetInput.value=formatDate(dt,window.CP_dateFormat);}
else{alert('Use setReturnFunction() to define which function will get the clicked results!');}}
function CP_tmpReturnMonthFunction(y,m){alert('Use setReturnMonthFunction() to define which function will get the clicked results!\nYou clicked: year='+y+' , month='+m);}
function CP_tmpReturnQuarterFunction(y,q){alert('Use setReturnQuarterFunction() to define which function will get the clicked results!\nYou clicked: year='+y+' , quarter='+q);}
function CP_tmpReturnYearFunction(y){alert('Use setReturnYearFunction() to define which function will get the clicked results!\nYou clicked: year='+y);}
function CP_setReturnFunction(name){this.returnFunction=name;}
function CP_setReturnMonthFunction(name){this.returnMonthFunction=name;}
function CP_setReturnQuarterFunction(name){this.returnQuarterFunction=name;}
function CP_setReturnYearFunction(name){this.returnYearFunction=name;}
function CP_setMonthNames(){for(var i=0;i<arguments.length;i++){this.monthNames[i]=arguments[i];}
this.copyMonthNamesToWindow();}
function CP_setMonthAbbreviations(){for(var i=0;i<arguments.length;i++){this.monthAbbreviations[i]=arguments[i];}
this.copyMonthNamesToWindow();}
function CP_setDayHeaders(){for(var i=0;i<arguments.length;i++){this.dayHeaders[i]=arguments[i];}}
function CP_setWeekStartDay(day){this.weekStartDay=day;}
function CP_showYearNavigation(){this.isShowYearNavigation=(arguments.length>0)?arguments[0]:true;}
function CP_setDisplayType(type){if(type!="date"&&type!="week-end"&&type!="month"&&type!="quarter"&&type!="year"){alert("Invalid display type! Must be one of: date,week-end,month,quarter,year");return false;}
this.displayType=type;}
function CP_setYearSelectStartOffset(num){this.yearSelectStartOffset=num;}
function CP_setDisabledWeekDays(){this.disabledWeekDays=new Object();for(var i=0;i<arguments.length;i++){this.disabledWeekDays[arguments[i]]=true;}}
function CP_addDisabledDates(start,end){if(arguments.length==1){end=start;}
if(start==null&&end==null){return;}
if(this.disabledDatesExpression!=""){this.disabledDatesExpression+="||";}
if(start!=null){start=parseDate(start);start=""+start.getFullYear()+LZ(start.getMonth()+1)+LZ(start.getDate());}
if(end!=null){end=parseDate(end);end=""+end.getFullYear()+LZ(end.getMonth()+1)+LZ(end.getDate());}
if(start==null){this.disabledDatesExpression+="(ds<="+end+")";}
else if(end==null){this.disabledDatesExpression+="(ds>="+start+")";}
else{this.disabledDatesExpression+="(ds>="+start+"&&ds<="+end+")";}}
function CP_setTodayText(text){this.todayText=text;}
function CP_setCssPrefix(val){this.cssPrefix=val;}
function CP_showNavigationDropdowns(){this.isShowNavigationDropdowns=(arguments.length>0)?arguments[0]:true;}
function CP_showYearNavigationInput(){this.isShowYearNavigationInput=(arguments.length>0)?arguments[0]:true;}
function CP_hideCalendar(){if(arguments.length>0){window.popupWindowObjects[arguments[0]].hidePopup();}
else{this.hidePopup();}}
function CP_refreshCalendar(index){var calObject=window.popupWindowObjects[index];if(arguments.length>1){calObject.populate(calObject.getCalendar(arguments[1],arguments[2],arguments[3],arguments[4],arguments[5]));}
else{calObject.populate(calObject.getCalendar());}
calObject.refresh();}
function CP_showCalendar(anchorname){if(arguments.length>1){if(arguments[1]==null||arguments[1]==""){this.currentDate=new Date();}
else{this.currentDate=new Date(parseDate(arguments[1]));}}
this.populate(this.getCalendar());this.showPopup(anchorname);}
function CP_select(inputobj,linkname,format){var selectedDate=(arguments.length>3)?arguments[3]:null;if(!window.getDateFromFormat){alert("calendar.select: To use this method you must also include 'date.js' for date formatting");return;}
if(this.displayType!="date"&&this.displayType!="week-end"){alert("calendar.select: This function can only be used with displayType 'date' or 'week-end'");return;}
if(inputobj.type!="text"&&inputobj.type!="hidden"&&inputobj.type!="textarea"){alert("calendar.select: Input object passed is not a valid form input object");window.CP_targetInput=null;return;}
if(inputobj.disabled){return;}
window.CP_targetInput=inputobj;window.CP_calendarObject=this;this.currentDate=null;var time=0;if(selectedDate!=null){time=getDateFromFormat(selectedDate,format)}
else if(inputobj.value!=""){time=getDateFromFormat(inputobj.value,format);}
if(selectedDate!=null||inputobj.value!=""){if(time==0){this.currentDate=null;}
else{this.currentDate=new Date(time);}}
window.CP_dateFormat=format;this.showCalendar(linkname);}
function getCalendarStyles(){var result="";var p="";if(this!=null&&typeof(this.cssPrefix)!="undefined"&&this.cssPrefix!=null&&this.cssPrefix!=""){p=this.cssPrefix;}
result+="<STYLE>\n";result+="."+p+"cpYearNavigation,."+p+"cpMonthNavigation { background-color:#C0C0C0; text-align:center; vertical-align:center; text-decoration:none; color:#000000; font-weight:bold; }\n";result+="."+p+"cpDayColumnHeader, ."+p+"cpYearNavigation,."+p+"cpMonthNavigation,."+p+"cpCurrentMonthDate,."+p+"cpCurrentMonthDateDisabled,."+p+"cpOtherMonthDate,."+p+"cpOtherMonthDateDisabled,."+p+"cpCurrentDate,."+p+"cpCurrentDateDisabled,."+p+"cpTodayText,."+p+"cpTodayTextDisabled,."+p+"cpText { font-family:arial; font-size:8pt; }\n";result+="TD."+p+"cpDayColumnHeader { text-align:center; border:solid thin #C0C0C0;border-width:0px 0px 1px 0px; }\n";result+="."+p+"cpCurrentMonthDate, ."+p+"cpOtherMonthDate, ."+p+"cpCurrentDate  { text-align:center; text-decoration:none; }\n";result+="."+p+"cpCurrentMonthDateDisabled, ."+p+"cpOtherMonthDateDisabled, ."+p+"cpCurrentDateDisabled { color:#D0D0D0; text-align:center; text-decoration:line-through; }\n";result+="."+p+"cpCurrentMonthDate, .cpCurrentDate { color:#000000; }\n";result+="."+p+"cpOtherMonthDate { color:#808080; }\n";result+="TD."+p+"cpCurrentDate { color:white; background-color: #C0C0C0; border-width:1px; border:solid thin #800000; }\n";result+="TD."+p+"cpCurrentDateDisabled { border-width:1px; border:solid thin #FFAAAA; }\n";result+="TD."+p+"cpTodayText, TD."+p+"cpTodayTextDisabled { border:solid thin #C0C0C0; border-width:1px 0px 0px 0px;}\n";result+="A."+p+"cpTodayText, SPAN."+p+"cpTodayTextDisabled { height:20px; }\n";result+="A."+p+"cpTodayText { color:black; }\n";result+="."+p+"cpTodayTextDisabled { color:#D0D0D0; }\n";result+="."+p+"cpBorder { border:solid thin #808080; }\n";result+="</STYLE>\n";return result;}
function CP_getCalendar(){var now=new Date();if(this.type=="WINDOW"){var windowref="window.opener.";}
else{var windowref="";}
var result="";if(this.type=="WINDOW"){result+="<HTML><HEAD><TITLE>Calendar</TITLE>"+this.getStyles()+"</HEAD><BODY MARGINWIDTH=0 MARGINHEIGHT=0 TOPMARGIN=0 RIGHTMARGIN=0 LEFTMARGIN=0>\n";result+='<CENTER><TABLE WIDTH=100% BORDER=0 BORDERWIDTH=0 CELLSPACING=0 CELLPADDING=0>\n';}
else{result+='<TABLE CLASS="'+this.cssPrefix+'cpBorder" WIDTH=144 BORDER=1 BORDERWIDTH=1 CELLSPACING=0 CELLPADDING=1>\n';result+='<TR><TD ALIGN=CENTER>\n';result+='<CENTER>\n';}
if(this.displayType=="date"||this.displayType=="week-end"){if(this.currentDate==null){this.currentDate=now;}
if(arguments.length>0){var month=arguments[0];}
else{var month=this.currentDate.getMonth()+1;}
if(arguments.length>1&&arguments[1]>0&&arguments[1]-0==arguments[1]){var year=arguments[1];}
else{var year=this.currentDate.getFullYear();}
var daysinmonth=new Array(0,31,28,31,30,31,30,31,31,30,31,30,31);if(((year%4==0)&&(year%100!=0))||(year%400==0)){daysinmonth[2]=29;}
var current_month=new Date(year,month-1,1);var display_year=year;var display_month=month;var display_date=1;var weekday=current_month.getDay();var offset=0;offset=(weekday>=this.weekStartDay)?weekday-this.weekStartDay:7-this.weekStartDay+weekday;if(offset>0){display_month--;if(display_month<1){display_month=12;display_year--;}
display_date=daysinmonth[display_month]-offset+1;}
var next_month=month+1;var next_month_year=year;if(next_month>12){next_month=1;next_month_year++;}
var last_month=month-1;var last_month_year=year;if(last_month<1){last_month=12;last_month_year--;}
var date_class;if(this.type!="WINDOW"){result+="<TABLE WIDTH=144 BORDER=0 BORDERWIDTH=0 CELLSPACING=0 CELLPADDING=0>";}
result+='<TR>\n';var refresh=windowref+'CP_refreshCalendar';var refreshLink='javascript:'+refresh;if(this.isShowNavigationDropdowns){result+='<TD CLASS="'+this.cssPrefix+'cpMonthNavigation" WIDTH="78" COLSPAN="3"><select CLASS="'+this.cssPrefix+'cpMonthNavigation" name="cpMonth" onChange="'+refresh+'('+this.index+',this.options[this.selectedIndex].value-0,'+(year-0)+');">';for(var monthCounter=1;monthCounter<=12;monthCounter++){var selected=(monthCounter==month)?'SELECTED':'';result+='<option value="'+monthCounter+'" '+selected+'>'+this.monthNames[monthCounter-1]+'</option>';}
result+='</select></TD>';result+='<TD CLASS="'+this.cssPrefix+'cpMonthNavigation" WIDTH="10">&nbsp;</TD>';result+='<TD CLASS="'+this.cssPrefix+'cpYearNavigation" WIDTH="56" COLSPAN="3"><select CLASS="'+this.cssPrefix+'cpYearNavigation" name="cpYear" onChange="'+refresh+'('+this.index+','+month+',this.options[this.selectedIndex].value-0);">';for(var yearCounter=year;yearCounter>=year-this.yearSelectStartOffset;yearCounter--){var selected=(yearCounter==year)?'SELECTED':'';result+='<option value="'+yearCounter+'" '+selected+'>'+yearCounter+'</option>';}
result+='</select></TD>';}
else{if(this.isShowYearNavigation){result+='<TD CLASS="'+this.cssPrefix+'cpMonthNavigation" WIDTH="10"><A CLASS="'+this.cssPrefix+'cpMonthNavigation" HREF="'+refreshLink+'('+this.index+','+last_month+','+last_month_year+');">&lt;</A></TD>';result+='<TD CLASS="'+this.cssPrefix+'cpMonthNavigation" WIDTH="58"><SPAN CLASS="'+this.cssPrefix+'cpMonthNavigation">'+this.monthNames[month-1]+'</SPAN></TD>';result+='<TD CLASS="'+this.cssPrefix+'cpMonthNavigation" WIDTH="10"><A CLASS="'+this.cssPrefix+'cpMonthNavigation" HREF="'+refreshLink+'('+this.index+','+next_month+','+next_month_year+');">&gt;</A></TD>';result+='<TD CLASS="'+this.cssPrefix+'cpMonthNavigation" WIDTH="10">&nbsp;</TD>';result+='<TD CLASS="'+this.cssPrefix+'cpYearNavigation" WIDTH="10"><A CLASS="'+this.cssPrefix+'cpYearNavigation" HREF="'+refreshLink+'('+this.index+','+month+','+(year-1)+');">&lt;</A></TD>';if(this.isShowYearNavigationInput){result+='<TD CLASS="'+this.cssPrefix+'cpYearNavigation" WIDTH="36"><INPUT NAME="cpYear" CLASS="'+this.cssPrefix+'cpYearNavigation" SIZE="4" MAXLENGTH="4" VALUE="'+year+'" onBlur="'+refresh+'('+this.index+','+month+',this.value-0);"></TD>';}
else{result+='<TD CLASS="'+this.cssPrefix+'cpYearNavigation" WIDTH="36"><SPAN CLASS="'+this.cssPrefix+'cpYearNavigation">'+year+'</SPAN></TD>';}
result+='<TD CLASS="'+this.cssPrefix+'cpYearNavigation" WIDTH="10"><A CLASS="'+this.cssPrefix+'cpYearNavigation" HREF="'+refreshLink+'('+this.index+','+month+','+(year+1)+');">&gt;</A></TD>';}
else{result+='<TD CLASS="'+this.cssPrefix+'cpMonthNavigation" WIDTH="22"><A CLASS="'+this.cssPrefix+'cpMonthNavigation" HREF="'+refreshLink+'('+this.index+','+last_month+','+last_month_year+');">&lt;&lt;</A></TD>\n';result+='<TD CLASS="'+this.cssPrefix+'cpMonthNavigation" WIDTH="100"><SPAN CLASS="'+this.cssPrefix+'cpMonthNavigation">'+this.monthNames[month-1]+' '+year+'</SPAN></TD>\n';result+='<TD CLASS="'+this.cssPrefix+'cpMonthNavigation" WIDTH="22"><A CLASS="'+this.cssPrefix+'cpMonthNavigation" HREF="'+refreshLink+'('+this.index+','+next_month+','+next_month_year+');">&gt;&gt;</A></TD>\n';}}
result+='</TR></TABLE>\n';result+='<TABLE WIDTH=120 BORDER=0 CELLSPACING=0 CELLPADDING=1 ALIGN=CENTER>\n';result+='<TR>\n';for(var j=0;j<7;j++){result+='<TD CLASS="'+this.cssPrefix+'cpDayColumnHeader" WIDTH="14%"><SPAN CLASS="'+this.cssPrefix+'cpDayColumnHeader">'+this.dayHeaders[(this.weekStartDay+j)%7]+'</TD>\n';}
result+='</TR>\n';for(var row=1;row<=6;row++){result+='<TR>\n';for(var col=1;col<=7;col++){var disabled=false;if(this.disabledDatesExpression!=""){var ds=""+display_year+LZ(display_month)+LZ(display_date);eval("disabled=("+this.disabledDatesExpression+")");}
var dateClass="";if((display_month==this.currentDate.getMonth()+1)&&(display_date==this.currentDate.getDate())&&(display_year==this.currentDate.getFullYear())){dateClass="cpCurrentDate";}
else if(display_month==month){dateClass="cpCurrentMonthDate";}
else{dateClass="cpOtherMonthDate";}
if(disabled||this.disabledWeekDays[col-1]){result+=' <TD CLASS="'+this.cssPrefix+dateClass+'"><SPAN CLASS="'+this.cssPrefix+dateClass+'Disabled">'+display_date+'</SPAN></TD>\n';}
else{var selected_date=display_date;var selected_month=display_month;var selected_year=display_year;if(this.displayType=="week-end"){var d=new Date(selected_year,selected_month-1,selected_date,0,0,0,0);d.setDate(d.getDate()+(7-col));selected_year=d.getYear();if(selected_year<1000){selected_year+=1900;}
selected_month=d.getMonth()+1;selected_date=d.getDate();}
result+=' <TD CLASS="'+this.cssPrefix+dateClass+'"><A HREF="javascript:'+windowref+this.returnFunction+'('+selected_year+','+selected_month+','+selected_date+');'+windowref+'CP_hideCalendar(\''+this.index+'\');" CLASS="'+this.cssPrefix+dateClass+'">'+display_date+'</A></TD>\n';}
display_date++;if(display_date>daysinmonth[display_month]){display_date=1;display_month++;}
if(display_month>12){display_month=1;display_year++;}}
result+='</TR>';}
var current_weekday=now.getDay()-this.weekStartDay;if(current_weekday<0){current_weekday+=7;}
result+='<TR>\n';result+=' <TD COLSPAN=7 ALIGN=CENTER CLASS="'+this.cssPrefix+'cpTodayText">';if(this.disabledDatesExpression!=""){var ds=""+now.getFullYear()+LZ(now.getMonth()+1)+LZ(now.getDate());eval("disabled=("+this.disabledDatesExpression+")");}
if(disabled||this.disabledWeekDays[current_weekday+1]){result+='  <SPAN CLASS="'+this.cssPrefix+'cpTodayTextDisabled">'+this.todayText+'</SPAN>\n';}
else{}
result+=' &nbsp; <a CLASS="'+this.cssPrefix+'cpTodayText"   href="javascript:'+windowref+'CP_hideCalendar(\''+this.index+'\');">'+'&#272;&#243;ng</a>\n <BR>\n';result+=' </TD></TR></TABLE></CENTER></TD></TR></TABLE>\n';}
if(this.displayType=="month"||this.displayType=="quarter"||this.displayType=="year"){if(arguments.length>0){var year=arguments[0];}
else{if(this.displayType=="year"){var year=now.getFullYear()-this.yearSelectStartOffset;}
else{var year=now.getFullYear();}}
if(this.displayType!="year"&&this.isShowYearNavigation){result+="<TABLE WIDTH=144 BORDER=0 BORDERWIDTH=0 CELLSPACING=0 CELLPADDING=0>";result+='<TR>\n';result+=' <TD CLASS="'+this.cssPrefix+'cpYearNavigation" WIDTH="22"><A CLASS="'+this.cssPrefix+'cpYearNavigation" HREF="javascript:'+windowref+'CP_refreshCalendar('+this.index+','+(year-1)+');">&lt;&lt;</A></TD>\n';result+=' <TD CLASS="'+this.cssPrefix+'cpYearNavigation" WIDTH="100">'+year+'</TD>\n';result+=' <TD CLASS="'+this.cssPrefix+'cpYearNavigation" WIDTH="22"><A CLASS="'+this.cssPrefix+'cpYearNavigation" HREF="javascript:'+windowref+'CP_refreshCalendar('+this.index+','+(year+1)+');">&gt;&gt;</A></TD>\n';result+='</TR></TABLE>\n';}}
if(this.displayType=="month"){result+='<TABLE WIDTH=120 BORDER=0 CELLSPACING=1 CELLPADDING=0 ALIGN=CENTER>\n';for(var i=0;i<4;i++){result+='<TR>';for(var j=0;j<3;j++){var monthindex=((i*3)+j);result+='<TD WIDTH=33% ALIGN=CENTER><A CLASS="'+this.cssPrefix+'cpText" HREF="javascript:'+windowref+this.returnMonthFunction+'('+year+','+(monthindex+1)+');'+windowref+'CP_hideCalendar(\''+this.index+'\');" CLASS="'+date_class+'">'+this.monthAbbreviations[monthindex]+'</A></TD>';}
result+='</TR>';}
result+='</TABLE></CENTER></TD></TR></TABLE>\n';}
if(this.displayType=="quarter"){result+='<BR><TABLE WIDTH=120 BORDER=1 CELLSPACING=0 CELLPADDING=0 ALIGN=CENTER>\n';for(var i=0;i<2;i++){result+='<TR>';for(var j=0;j<2;j++){var quarter=((i*2)+j+1);result+='<TD WIDTH=50% ALIGN=CENTER><BR><A CLASS="'+this.cssPrefix+'cpText" HREF="javascript:'+windowref+this.returnQuarterFunction+'('+year+','+quarter+');'+windowref+'CP_hideCalendar(\''+this.index+'\');" CLASS="'+date_class+'">Q'+quarter+'</A><BR><BR></TD>';}
result+='</TR>';}
result+='</TABLE></CENTER></TD></TR></TABLE>\n';}
if(this.displayType=="year"){var yearColumnSize=4;result+="<TABLE WIDTH=144 BORDER=0 BORDERWIDTH=0 CELLSPACING=0 CELLPADDING=0>";result+='<TR>\n';result+=' <TD CLASS="'+this.cssPrefix+'cpYearNavigation" WIDTH="50%"><A CLASS="'+this.cssPrefix+'cpYearNavigation" HREF="javascript:'+windowref+'CP_refreshCalendar('+this.index+','+(year-(yearColumnSize*2))+');">&lt;&lt;</A></TD>\n';result+=' <TD CLASS="'+this.cssPrefix+'cpYearNavigation" WIDTH="50%"><A CLASS="'+this.cssPrefix+'cpYearNavigation" HREF="javascript:'+windowref+'CP_refreshCalendar('+this.index+','+(year+(yearColumnSize*2))+');">&gt;&gt;</A></TD>\n';result+='</TR></TABLE>\n';result+='<TABLE WIDTH=120 BORDER=0 CELLSPACING=1 CELLPADDING=0 ALIGN=CENTER>\n';for(var i=0;i<yearColumnSize;i++){for(var j=0;j<2;j++){var currentyear=year+(j*yearColumnSize)+i;result+='<TD WIDTH=50% ALIGN=CENTER><A CLASS="'+this.cssPrefix+'cpText" HREF="javascript:'+windowref+this.returnYearFunction+'('+currentyear+');'+windowref+'CP_hideCalendar(\''+this.index+'\');" CLASS="'+date_class+'">'+currentyear+'</A></TD>';}
result+='</TR>';}
result+='</TABLE></CENTER></TD></TR></TABLE>\n';}
if(this.type=="WINDOW"){result+="</BODY></HTML>\n";}
return result;}
var MONTH_NAMES=new Array('Th&#225;ng m&#7897;t','Th&#225;ng hai','Th&#225;ng ba','Th&#225;ng t&#432;','Th&#225;ng n&#259;m','Th&#225;ng s&#225;u','Th&#225;ng b&#7843;y','Th&#225;ng t&#225;m','Th&#225;ng ch&#237;n','Th&#225;ng m&#432;&#7901;i','Th&#225;ng m&#432;&#7901;i m&#7897;t','Th&#225;ng m&#432;&#7901;i hai','Th 1','Th 2','Th 3','Th 4','Th 5','Th 6','Th 7','Th 8','Th 9','Th 10','Th 11','Th 12');var DAY_NAMES=new Array('Ch&#7911; nh&#226;t','Th&#7913; hai','Th&#7913; ba','Th&#7913; t&#432;','Th&#7913; n&#259;m','Th&#7913; s&#225;u','Th&#7913; b&#7843;y','CN','T2','T3','T4','T5','T6','T7');function LZ(x){return(x<0||x>9?"":"0")+x}
function isDate(val,format){var date=getDateFromFormat(val,format);if(date==0){return false;}
return true;}
function compareDates(date1,dateformat1,date2,dateformat2){var d1=getDateFromFormat(date1,dateformat1);var d2=getDateFromFormat(date2,dateformat2);if(d1==0||d2==0){return-1;}
else if(d1>d2){return 1;}
return 0;}
function formatDate(date,format){format=format+"";var result="";var i_format=0;var c="";var token="";var y=date.getYear()+"";var M=date.getMonth()+1;var d=date.getDate();var E=date.getDay();var H=date.getHours();var m=date.getMinutes();var s=date.getSeconds();var yyyy,yy,MMM,MM,dd,hh,h,mm,ss,ampm,HH,H,KK,K,kk,k;var value=new Object();if(y.length<4){y=""+(y-0+1900);}
value["y"]=""+y;value["yyyy"]=y;value["yy"]=y.substring(2,4);value["M"]=M;value["MM"]=LZ(M);value["MMM"]=MONTH_NAMES[M-1];value["NNN"]=MONTH_NAMES[M+11];value["d"]=d;value["dd"]=LZ(d);value["E"]=DAY_NAMES[E+7];value["EE"]=DAY_NAMES[E];value["H"]=H;value["HH"]=LZ(H);if(H==0){value["h"]=12;}
else if(H>12){value["h"]=H-12;}
else{value["h"]=H;}
value["hh"]=LZ(value["h"]);if(H>11){value["K"]=H-12;}else{value["K"]=H;}
value["k"]=H+1;value["KK"]=LZ(value["K"]);value["kk"]=LZ(value["k"]);if(H>11){value["a"]="PM";}
else{value["a"]="AM";}
value["m"]=m;value["mm"]=LZ(m);value["s"]=s;value["ss"]=LZ(s);while(i_format<format.length){c=format.charAt(i_format);token="";while((format.charAt(i_format)==c)&&(i_format<format.length)){token+=format.charAt(i_format++);}
if(value[token]!=null){result=result+value[token];}
else{result=result+token;}}
return result;}
function _isInteger(val){var digits="1234567890";for(var i=0;i<val.length;i++){if(digits.indexOf(val.charAt(i))==-1){return false;}}
return true;}
function _getInt(str,i,minlength,maxlength){for(var x=maxlength;x>=minlength;x--){var token=str.substring(i,i+x);if(token.length<minlength){return null;}
if(_isInteger(token)){return token;}}
return null;}
function getDateFromFormat(val,format){val=val+"";format=format+"";var i_val=0;var i_format=0;var c="";var token="";var token2="";var x,y;var now=new Date();var year=now.getYear();var month=now.getMonth()+1;var date=1;var hh=now.getHours();var mm=now.getMinutes();var ss=now.getSeconds();var ampm="";while(i_format<format.length){c=format.charAt(i_format);token="";while((format.charAt(i_format)==c)&&(i_format<format.length)){token+=format.charAt(i_format++);}
if(token=="yyyy"||token=="yy"||token=="y"){if(token=="yyyy"){x=4;y=4;}
if(token=="yy"){x=2;y=2;}
if(token=="y"){x=2;y=4;}
year=_getInt(val,i_val,x,y);if(year==null){return 0;}
i_val+=year.length;if(year.length==2){if(year>70){year=1900+(year-0);}
else{year=2000+(year-0);}}}
else if(token=="MMM"||token=="NNN"){month=0;for(var i=0;i<MONTH_NAMES.length;i++){var month_name=MONTH_NAMES[i];if(val.substring(i_val,i_val+month_name.length).toLowerCase()==month_name.toLowerCase()){if(token=="MMM"||(token=="NNN"&&i>11)){month=i+1;if(month>12){month-=12;}
i_val+=month_name.length;break;}}}
if((month<1)||(month>12)){return 0;}}
else if(token=="EE"||token=="E"){for(var i=0;i<DAY_NAMES.length;i++){var day_name=DAY_NAMES[i];if(val.substring(i_val,i_val+day_name.length).toLowerCase()==day_name.toLowerCase()){i_val+=day_name.length;break;}}}
else if(token=="MM"||token=="M"){month=_getInt(val,i_val,token.length,2);if(month==null||(month<1)||(month>12)){return 0;}
i_val+=month.length;}
else if(token=="dd"||token=="d"){date=_getInt(val,i_val,token.length,2);if(date==null||(date<1)||(date>31)){return 0;}
i_val+=date.length;}
else if(token=="hh"||token=="h"){hh=_getInt(val,i_val,token.length,2);if(hh==null||(hh<1)||(hh>12)){return 0;}
i_val+=hh.length;}
else if(token=="HH"||token=="H"){hh=_getInt(val,i_val,token.length,2);if(hh==null||(hh<0)||(hh>23)){return 0;}
i_val+=hh.length;}
else if(token=="KK"||token=="K"){hh=_getInt(val,i_val,token.length,2);if(hh==null||(hh<0)||(hh>11)){return 0;}
i_val+=hh.length;}
else if(token=="kk"||token=="k"){hh=_getInt(val,i_val,token.length,2);if(hh==null||(hh<1)||(hh>24)){return 0;}
i_val+=hh.length;hh--;}
else if(token=="mm"||token=="m"){mm=_getInt(val,i_val,token.length,2);if(mm==null||(mm<0)||(mm>59)){return 0;}
i_val+=mm.length;}
else if(token=="ss"||token=="s"){ss=_getInt(val,i_val,token.length,2);if(ss==null||(ss<0)||(ss>59)){return 0;}
i_val+=ss.length;}
else if(token=="a"){if(val.substring(i_val,i_val+2).toLowerCase()=="am"){ampm="AM";}
else if(val.substring(i_val,i_val+2).toLowerCase()=="pm"){ampm="PM";}
else{return 0;}
i_val+=2;}
else{if(val.substring(i_val,i_val+token.length)!=token){return 0;}
else{i_val+=token.length;}}}
if(i_val!=val.length){return 0;}
if(month==2){if(((year%4==0)&&(year%100!=0))||(year%400==0)){if(date>29){return 0;}}
else{if(date>28){return 0;}}}
if((month==4)||(month==6)||(month==9)||(month==11)){if(date>30){return 0;}}
if(hh<12&&ampm=="PM"){hh=hh-0+12;}
else if(hh>11&&ampm=="AM"){hh-=12;}
var newdate=new Date(year,month-1,date,hh,mm,ss);return newdate.getTime();}
function parseDate(val){var preferEuro=(arguments.length==2)?arguments[1]:false;generalFormats=new Array('y-M-d','MMM d, y','MMM d,y','y-MMM-d','d-MMM-y','MMM d');monthFirst=new Array('M/d/y','M-d-y','M.d.y','MMM-d','M/d','M-d');dateFirst=new Array('d/M/y','d-M-y','d.M.y','d-MMM','d/M','d-M');var checkList=new Array('generalFormats',preferEuro?'dateFirst':'monthFirst',preferEuro?'monthFirst':'dateFirst');var d=null;for(var i=0;i<checkList.length;i++){var l=window[checkList[i]];for(var j=0;j<l.length;j++){d=getDateFromFormat(val,l[j]);if(d!=0){return new Date(d);}}}
return null;}
Date.prototype.formatDate=function(input,time){var daysLong=["Ch&#7911; nh&#226;t","Th&#7913; hai","Th&#7913; ba","Th&#7913; t&#432;","Th&#7913; n&#259;m","Th&#7913; s&#225;u","Th&#7913; b&#7843;y"];var daysShort=["CN","T2","T3","T4","T5","T6","T7"];var monthsShort=["Th 1","Th 2","Th 3","Th 4","Th 5","Th 6","Th 7","Th 8","Th 9","Th 10","Th 11","Th 12"];var monthsLong=["Th&#225;ng m&#7897;t","Th&#225;ng hai","Th&#225;ng ba","Th&#225;ng t&#432;","Th&#225;ng n&#259;m","Th&#225;ng s&#225;u","Th&#225;ng b&#7843;y","Th&#225;ng t&#225;m","Th&#225;ng ch&#237;n","Th&#225;ng m&#432;&#7901;i","Th&#225;ng m&#432;&#7901;i m&#7897;t","Th&#225;ng m&#432;&#7901;i hai"];var switches={a:function(){return date.getHours()>11?"pm":"am";},A:function(){return(this.a().toUpperCase());},B:function(){var off=(date.getTimezoneOffset()+60)*60;var theSeconds=(date.getHours()*3600)+
(date.getMinutes()*60)+
date.getSeconds()+off;var beat=Math.floor(theSeconds/86.4);if(beat>1000)beat-=1000;if(beat<0)beat+=1000;if((String(beat)).length==1)beat="00"+beat;if((String(beat)).length==2)beat="0"+beat;return beat;},c:function(){return(this.Y()+"-"+this.m()+"-"+this.d()+"T"+
this.h()+":"+this.i()+":"+this.s()+this.P());},d:function(){var j=String(this.j());return(j.length==1?"0"+j:j);},D:function(){return daysShort[date.getDay()];},F:function(){return monthsLong[date.getMonth()];},g:function(){return date.getHours()>12?date.getHours()-12:date.getHours();},G:function(){return date.getHours();},h:function(){var g=String(this.g());return(g.length==1?"0"+g:g);},H:function(){var G=String(this.G());return(G.length==1?"0"+G:G);},i:function(){var min=String(date.getMinutes());return(min.length==1?"0"+min:min);},I:function(){var noDST=new Date("January 1 "+this.Y()+" 00:00:00");return(noDST.getTimezoneOffset()==date.getTimezoneOffset()?0:1);},j:function(){return date.getDate();},l:function(){return daysLong[date.getDay()];},L:function(){var Y=this.Y();if((Y%4==0&&Y%100!=0)||(Y%4==0&&Y%100==0&&Y%400==0)){return 1;}else{return 0;}},m:function(){var n=String(this.n());return(n.length==1?"0"+n:n);},M:function(){return monthsShort[date.getMonth()];},n:function(){return date.getMonth()+1;},N:function(){var w=this.w();return(w==0?7:w);},O:function(){var os=Math.abs(date.getTimezoneOffset());var h=String(Math.floor(os/60));var m=String(os%60);h.length==1?h="0"+h:1;m.length==1?m="0"+m:1;return date.getTimezoneOffset()<0?"+"+h+m:"-"+h+m;},P:function(){var O=this.O();return(O.substr(0,3)+":"+O.substr(3,2));},r:function(){var r;r=this.D()+", "+this.d()+" "+this.M()+" "+this.Y()+" "+this.H()+":"+this.i()+":"+this.s()+" "+this.O();return r;},s:function(){var sec=String(date.getSeconds());return(sec.length==1?"0"+sec:sec);},S:function(){switch(date.getDate()){case 1:return("st");case 2:return("nd");case 3:return("rd");case 21:return("st");case 22:return("nd");case 23:return("rd");case 31:return("st");default:return("th");}},t:function(){var daysinmonths=[null,31,28,31,30,31,30,31,31,30,31,30,31];if(this.L()==1&&this.n()==2)return 29;return daysinmonths[this.n()];},U:function(){return Math.round(date.getTime()/1000);},w:function(){return date.getDay();},W:function(){var DoW=this.N();var DoY=this.z();var daysToNY=364+this.L()-DoY;if(daysToNY<=2&&DoW<=(3-daysToNY)){return 1;}
if(DoY<=2&&DoW>=5){return new Date(this.Y()-1,11,31).formatDate("W");}
var nyDoW=new Date(this.Y(),0,1).getDay();nyDoW=nyDoW!=0?nyDoW-1:6;if(nyDoW<=3){return(1+Math.floor((DoY+nyDoW)/7));}else{return(1+Math.floor((DoY-(7-nyDoW))/7));}},y:function(){var y=String(this.Y());return y.substring(y.length-2,y.length);},Y:function(){if(date.getFullYear){var newDate=new Date("January 1 2001 00:00:00 +0000");var x=newDate.getFullYear();if(x==2001){return date.getFullYear();}}
var x=date.getYear();var y=x%100;y+=(y<38)?2000:1900;return y;},z:function(){var t=new Date("January 1 "+this.Y()+" 00:00:00");var diff=date.getTime()-t.getTime();return Math.floor(diff/1000/60/60/24);},Z:function(){return(date.getTimezoneOffset()*-60);}}
function getSwitch(str){if(switches[str]!=undefined){return switches[str]();}else{return str;}}
var date;if(time){var date=new Date(time);}else{var date=this;}
var formatString=input.split("");var i=0;while(i<formatString.length){if(formatString[i]=="\\"){formatString.splice(i,1);}else{formatString[i]=getSwitch(formatString[i]);}
i++;}
return formatString.join("");}
Date.DATE_ATOM="Y-m-d\\TH:i:sP";Date.DATE_ISO8601="Y-m-d\\TH:i:sO";Date.DATE_RFC2822="D, d M Y H:i:s O";Date.DATE_W3C="Y-m-d\\TH:i:sP";function PopupWindow_getXYPosition(anchorname){var coordinates;if(this.type=="WINDOW"){coordinates=getAnchorWindowPosition(anchorname);}
else{coordinates=getAnchorPosition(anchorname);}
this.x=coordinates.x;this.y=coordinates.y;}
function PopupWindow_setSize(width,height){this.width=width;this.height=height;}
function PopupWindow_populate(contents){this.contents=contents;this.populated=false;}
function PopupWindow_setUrl(url){this.url=url;}
function PopupWindow_setWindowProperties(props){this.windowProperties=props;}
function PopupWindow_refresh(){try{if(this.divName!=null){if(this.use_gebi){document.getElementById(this.divName).innerHTML=this.contents;document.getElementById(this.divName).style.visibility='visible';}
else if(this.use_css){document.all[this.divName].innerHTML=this.contents;}
else if(this.use_layers){var d=document.layers[this.divName];d.document.open();d.document.writeln(this.contents);d.document.close();}}
else{if(this.popupWindow!=null&&!this.popupWindow.closed){if(this.url!=""){this.popupWindow.location.href=this.url;}
else{this.popupWindow.document.open();this.popupWindow.document.writeln(this.contents);this.popupWindow.document.close();}
this.popupWindow.focus();}}}catch(e){}}
function PopupWindow_showPopup(anchorname){this.getXYPosition(anchorname);this.x+=this.offsetX;this.y+=this.offsetY;if(!this.populated&&(this.contents!="")){this.populated=true;this.refresh();}
if(this.divName!=null){if(this.use_gebi){document.getElementById(this.divName).style.left=this.x+"px";document.getElementById(this.divName).style.top=this.y+"px";document.getElementById(this.divName).style.visibility="visible";}
else if(this.use_css){document.all[this.divName].style.left=this.x;document.all[this.divName].style.top=this.y;document.all[this.divName].style.visibility="visible";}
else if(this.use_layers){document.layers[this.divName].left=this.x;document.layers[this.divName].top=this.y;document.layers[this.divName].visibility="visible";}}
else{if(this.popupWindow==null||this.popupWindow.closed){if(this.x<0){this.x=0;}
if(this.y<0){this.y=0;}
if(screen&&screen.availHeight){if((this.y+this.height)>screen.availHeight){this.y=screen.availHeight-this.height;}}
if(screen&&screen.availWidth){if((this.x+this.width)>screen.availWidth){this.x=screen.availWidth-this.width;}}
var avoidAboutBlank=window.opera||(document.layers&&!navigator.mimeTypes['*'])||navigator.vendor=='KDE'||(document.childNodes&&!document.all&&!navigator.taintEnabled);this.popupWindow=window.open(avoidAboutBlank?"":"about:blank","window_"+anchorname,this.windowProperties+",width="+this.width+",height="+this.height+",screenX="+this.x+",left="+this.x+",screenY="+this.y+",top="+this.y+"");}
this.refresh();}}
function PopupWindow_hidePopup(){try{if(this.divName!=null){if(this.use_gebi){document.getElementById(this.divName).style.visibility="hidden";}
else if(this.use_css){document.all[this.divName].style.visibility="hidden";}
else if(this.use_layers){document.layers[this.divName].visibility="hidden";}}
else{if(this.popupWindow&&!this.popupWindow.closed){this.popupWindow.close();this.popupWindow=null;}}}catch(e){}}
function PopupWindow_isClicked(e){try{if(this.divName!=null){if(this.use_layers){var clickX=e.pageX;var clickY=e.pageY;var t=document.layers[this.divName];if((clickX>t.left)&&(clickX<t.left+t.clip.width)&&(clickY>t.top)&&(clickY<t.top+t.clip.height)){return true;}
else{return false;}}
else if(document.all){var t=window.event.srcElement;while(t.parentElement!=null){if(t.id==this.divName){return true;}
t=t.parentElement;}
return false;}
else if(this.use_gebi&&e){var t=e.originalTarget;while(t.parentNode!=null){if(t.id==this.divName){return true;}
t=t.parentNode;}
return false;}
return false;}
return false;}catch(e){}}
function PopupWindow_hideIfNotClicked(e){if(this.autoHideEnabled&&!this.isClicked(e)){this.hidePopup();}}
function PopupWindow_autoHide(){this.autoHideEnabled=true;}
function PopupWindow_hidePopupWindows(e){for(var i=0;i<popupWindowObjects.length;i++){if(popupWindowObjects[i]!=null){var p=popupWindowObjects[i];p.hideIfNotClicked(e);}}}
function PopupWindow_attachListener(){if(document.layers){document.captureEvents(Event.MOUSEUP);}
window.popupWindowOldEventListener=document.onmouseup;if(window.popupWindowOldEventListener!=null){document.onmouseup=new Function("window.popupWindowOldEventListener(); PopupWindow_hidePopupWindows();");}
else{document.onmouseup=PopupWindow_hidePopupWindows;}}
function PopupWindow(){if(!window.popupWindowIndex){window.popupWindowIndex=0;}
if(!window.popupWindowObjects){window.popupWindowObjects=new Array();}
if(!window.listenerAttached){window.listenerAttached=true;PopupWindow_attachListener();}
this.index=popupWindowIndex++;popupWindowObjects[this.index]=this;this.divName=null;this.popupWindow=null;this.width=0;this.height=0;this.populated=false;this.visible=false;this.autoHideEnabled=false;this.contents="";this.url="";this.windowProperties="toolbar=no,location=no,status=no,menubar=no,scrollbars=auto,resizable,alwaysRaised,dependent,titlebar=no";if(arguments.length>0){this.type="DIV";this.divName=arguments[0];}
else{this.type="WINDOW";}
this.use_gebi=false;this.use_css=false;this.use_layers=false;if(document.getElementById){this.use_gebi=true;}
else if(document.all){this.use_css=true;}
else if(document.layers){this.use_layers=true;}
else{this.type="WINDOW";}
this.offsetX=0;this.offsetY=0;this.getXYPosition=PopupWindow_getXYPosition;this.populate=PopupWindow_populate;this.setUrl=PopupWindow_setUrl;this.setWindowProperties=PopupWindow_setWindowProperties;this.refresh=PopupWindow_refresh;this.showPopup=PopupWindow_showPopup;this.hidePopup=PopupWindow_hidePopup;this.setSize=PopupWindow_setSize;this.isClicked=PopupWindow_isClicked;this.autoHide=PopupWindow_autoHide;this.hideIfNotClicked=PopupWindow_hideIfNotClicked;}
monthMaxDays=[31,28,31,30,31,30,31,31,30,31,30,31];monthMaxDaysLeap=[31,29,31,30,31,30,31,31,30,31,30,31];hideSelectTags=[];function getRealYear(dateObj)
{return(dateObj.getYear()%100)+(((dateObj.getYear()%100)<39)?2000:1900);}
function getDaysPerMonth(month,year)
{if((year%4)==0)
{if((year%100)==0&&(year%400)!=0)
return monthMaxDays[month];return monthMaxDaysLeap[month];}
else
return monthMaxDays[month];}
function createCalender(year,month,day)
{var curDate=new Date();var curDay=curDate.getDate();var curMonth=curDate.getMonth();var curYear=getRealYear(curDate)
if(!year)
{var year=curYear;var month=curMonth;}
var yearFound=0;for(var i=0;i<document.getElementById('selectYear').options.length;i++)
{if(document.getElementById('selectYear').options[i].value==year)
{document.getElementById('selectYear').selectedIndex=i;yearFound=true;break;}}
if(!yearFound)
{document.getElementById('selectYear').selectedIndex=0;year=document.getElementById('selectYear').options[0].value;}
document.getElementById('selectMonth').selectedIndex=month;var fristDayOfMonthObj=new Date(year,month,1);var firstDayOfMonth=fristDayOfMonthObj.getDay();continu=true;firstRow=true;var x=0;var d=0;var trs=[]
var ti=0;while(d<=getDaysPerMonth(month,year))
{if(firstRow)
{trs[ti]=document.createElement("TR");if(firstDayOfMonth>0)
{while(x<firstDayOfMonth)
{trs[ti].appendChild(document.createElement("TD"));x++;}}
firstRow=false;var d=1;}
if(x%7==0)
{ti++;trs[ti]=document.createElement("TR");}
if(day&&d==day)
{var setID='calenderChoosenDay';var styleClass='choosenDay';var setTitle='this day is currently selected';}
else if(d==curDay&&month==curMonth&&year==curYear)
{var setID='calenderToDay';var styleClass='toDay';var setTitle='this day today';}
else
{var setID=false;var styleClass='normalDay';var setTitle=false;}
var td=document.createElement("TD");td.className=styleClass;if(setID)
{td.id=setID;}
if(setTitle)
{td.title=setTitle;}
td.onmouseover=new Function('highLiteDay(this)');td.onmouseout=new Function('deHighLiteDay(this)');if(targetEl)
td.onclick=new Function('pickDate('+year+', '+month+', '+d+')');else
td.style.cursor='default';td.appendChild(document.createTextNode(d));trs[ti].appendChild(td);x++;d++;}
return trs;}
function showCalender(elPos,tgtEl)
{targetEl=false;if(document.getElementById(tgtEl))
{targetEl=document.getElementById(tgtEl);}
else
{if(document.forms[0].elements[tgtEl])
{targetEl=document.forms[0].elements[tgtEl];}
else
{}}
var calTable=document.getElementById('calenderTable');var positions=[0,0];var positions=getMouse();calTable.style.left=positions[0]+'px';calTable.style.top=positions[1]+'px';calTable.style.display='block';var matchDate=new RegExp('^([0-9]{2})-([0-9]{2})-([0-9]{4})$');var m=matchDate.exec(targetEl.value);if(m==null)
{trs=createCalender(false,false,false);showCalenderBody(trs);}
else
{if(m[1].substr(0,1)==0)
m[1]=m[1].substr(1,1);if(m[2].substr(0,1)==0)
m[2]=m[2].substr(1,1);m[2]=m[2]-1;trs=createCalender(m[3],m[2],m[1]);showCalenderBody(trs);}
hideSelect(document.body,1);}
var firefox=document.getElementById&&!document.all;document.onmousemove=mouseMove;cX=0;cY=0;scrollX=0;scrollY=0;function mouseMove(e){if(firefox){cX=e.clientX;cY=e.clientY;}
else{cX=event.clientX;cY=event.clientY;}
ScrollAmount();}
function ScrollAmount(){if(self.pageYOffset){scrollX=self.pageXOffset;scrollY=self.pageYOffset;}
else if(document.documentElement&&document.documentElement.scrollTop){scrollX=document.documentElement.scrollLeft;scrollY=document.documentElement.scrollTop;}
else if(document.body){scrollX=document.body.scrollLeft;scrollY=document.body.scrollTop;}}
function getMouse(){var positions=[0,0];positions[0]=cX+scrollX;positions[1]=cY+scrollY;return positions;}
function showCalenderBody(trs)
{var calTBody=document.getElementById('calender');while(calTBody.childNodes[0])
{calTBody.removeChild(calTBody.childNodes[0]);}
for(var i in trs)
{calTBody.appendChild(trs[i]);}}
function setYears(sy,ey)
{var curDate=new Date();var curYear=getRealYear(curDate);if(sy)
startYear=curYear;if(ey)
endYear=curYear;document.getElementById('selectYear').options.length=0;var j=0;for(y=ey;y>=sy;y--)
{document.getElementById('selectYear')[j++]=new Option(y,y);}}
function hideSelect(el,superTotal)
{if(superTotal>=100)
{return;}
var totalChilds=el.childNodes.length;for(var c=0;c<totalChilds;c++)
{var thisTag=el.childNodes[c];if(thisTag.tagName=='SELECT')
{if(thisTag.id!='selectMonth'&&thisTag.id!='selectYear')
{var calenderEl=document.getElementById('calenderTable');var positions=[0,0];var positions=getParentOffset(thisTag,positions);var thisLeft=positions[0];var thisRight=positions[0]+thisTag.offsetWidth;var thisTop=positions[1];var thisBottom=positions[1]+thisTag.offsetHeight;var calLeft=calenderEl.offsetLeft;var calRight=calenderEl.offsetLeft+calenderEl.offsetWidth;var calTop=calenderEl.offsetTop;var calBottom=calenderEl.offsetTop+calenderEl.offsetHeight;if(((thisLeft>=calLeft&&thisLeft<=calRight)||(thisRight<=calRight&&thisRight>=calLeft)||(thisLeft<=calLeft&&thisRight>=calRight))&&((thisTop>=calTop&&thisTop<=calBottom)||(thisBottom<=calBottom&&thisBottom>=calTop)||(thisTop<=calTop&&thisBottom>=calBottom)))
{hideSelectTags[hideSelectTags.length]=thisTag;thisTag.style.display='none';}}}
else if(thisTag.childNodes.length>0)
{hideSelect(thisTag,(superTotal+1));}}}
function closeCalender()
{for(var i=0;i<hideSelectTags.length;i++)
{hideSelectTags[i].style.display='block';}
hideSelectTags.length=0;document.getElementById('calenderTable').style.display='none';}
function highLiteDay(el)
{el.className='hlDay';}
function deHighLiteDay(el)
{if(el.id=='calenderToDay')
el.className='toDay';else if(el.id=='calenderChoosenDay')
el.className='choosenDay';else
el.className='normalDay';}
function pickDate(year,month,day)
{month++;day=day<10?'0'+day:day;month=month<10?'0'+month:month;if(!targetEl)
{alert('target for date is not set yet');}
else
{targetEl.value=year+'-'+month+'-'+day;closeCalender();}}
function getParentOffset(el,positions)
{positions[0]+=el.offsetLeft;positions[1]+=el.offsetTop;if(el.offsetParent)
positions=getParentOffset(el.offsetParent,positions);return positions;}
function getDesTopBanner(cBanner)
{document.write('<table width="100%" border="0" cellpadding="0" cellspacing="0"><tr>');var descPos=new Array();switch(cBanner.currentBanner){case 0:descPos[0]=0;descPos[1]=1;descPos[2]=2;break;case 1:descPos[0]=1;descPos[1]=0;descPos[2]=2;break;case 2:descPos[0]=2;descPos[1]=1;descPos[2]=0;break;}
for(var ii=0;ii<3;ii++){var descContent=(cBanner.aNodes[descPos[ii]]!=undefined)?cBanner.aNodes[descPos[ii]].desc:'';document.write('<td width="33%" style="background-color:#c2c2c2;font-family:Arial, Helvetica, sans-serif; color:#464646; text-align:center; font-size:11px;cursor:pointer; border-right:2px solid #A7A7A7;" onclick="javascript:'+cBanner.obj+'.currentBanner='+descPos[ii]+';'+cBanner.obj+'.stopShow=true; '+cBanner.obj+'.changeBanner();" id="'+cBanner.obj+'_desc_'+descPos[ii]+'">'+descContent+'</td>');}
document.write('</tr></table>');}
function AjaxAction_Xemthem(where,url,n){var boxcomment=document.getElementById('binhluan_content');var aopen=document.getElementById('xemthembinhluan');var aclose=document.getElementById('anxemthembinhluan');var xmlHttp=new GetXmlHttpObject()
if(xmlHttp==null){return;}
var bar='<img src="http://static-hn.24hstatic.com:8008/images_ipad/loading.gif" align="absmiddle" /> &#272;ang t&#7843;i d&#7919; li&#7879;u';document.getElementById(where).innerHTML=bar
xmlHttp.onreadystatechange=function(){if(xmlHttp.readyState==4||xmlHttp.readyState==200){document.getElementById(where).innerHTML=xmlHttp.responseText;ocm_chay_javascript_tu_ket_qua_ajax(xmlHttp.responseText);}}
xmlHttp.open("GET",url,true);xmlHttp.send(null);if(n==1){aopen.style.display='none';aclose.style.display='inline';}
else{aclose.style.display='none';aopen.style.display='inline';}}
function AjaxVote(n,id){var v_comment=getCookie('comment'+id+n);if(v_comment>0){return;}
var xmlHttp=new GetXmlHttpObject()
if(xmlHttp==null){return;}
var url='/ajax/vote_comment/index/'+id+'/'+n;xmlHttp.onreadystatechange=function(){if(xmlHttp.readyState==4||xmlHttp.readyState==200){alert("Cảm ơn bạn đã đánh giá. \n Sau 60 phút đánh giá của bạn sẽ được hiển thị lên web");}}
xmlHttp.open("GET",url,true);xmlHttp.send(null);removeVoteLink(id);setCookie('comment'+id+n,id,24,'/','','');}
function removeVoteLink(n){var votediv=document.getElementById('bl_thich_'+n);var imgvoteyes=document.getElementById('img_yes_bl_thich_'+n);var imgvoteno=document.getElementById('img_no_bl_thich_'+n);imgvoteyes.style.cursor='auto';imgvoteno.onmouseover="this.src='/images_ipad/icon-disagree.gif'";imgvoteyes.onmouseover="this.src='/images_ipad/icon-agree.gif'";imgvoteno.onclick="";imgvoteyes.onclick="";}
function hidebutton(pid){var hideb=document.getElementById('hidebutton_'+pid);var showb=document.getElementById('showbutton_'+pid);var datadiv=document.getElementById('subcomment_div_'+pid);hideallcap2();hideb.style.display='inline';showb.style.display='none';datadiv.className='bl-sub-bg';}
function showbutton(pid){var hideb=document.getElementById('hidebutton_'+pid);var showb=document.getElementById('showbutton_'+pid);var datadiv=document.getElementById('subcomment_div_'+pid);datadiv.innerHTML="";hideb.style.display='none';showb.style.display='inline';datadiv.className='';}
function hideallcap2(){var divs=document.getElementsByTagName("div");for(var i=0;i<divs.length;i++){var div=divs[i];if(div.className=='showbuttoncap2'){div.style.display='none';}
else{if(div.className=='hidebuttoncap2'){div.style.display='inline';}}}}
function echeck(str){var at="@"
var dot="."
var lat=str.indexOf(at)
var lstr=str.length
var ldot=str.indexOf(dot)
if(str.indexOf(at)==-1){return false}
if(str.indexOf(at)==-1||str.indexOf(at)==0||str.indexOf(at)==lstr){return false}
if(str.indexOf(dot)==-1||str.indexOf(dot)==0||str.indexOf(dot)==lstr){return false}
if(str.indexOf(at,(lat+1))!=-1){return false}
if(str.substring(lat-1,lat)==dot||str.substring(lat+1,lat+2)==dot){return false}
if(str.indexOf(dot,(lat+2))==-1){return false}
if(str.indexOf(" ")!=-1){return false}
return true}
function trim(inputString){if(typeof inputString!="string"){return inputString;}
var retValue=inputString;var ch=retValue.substring(0,1);while(ch==" "){retValue=retValue.substring(1,retValue.length);ch=retValue.substring(0,1);}
ch=retValue.substring(retValue.length-1,retValue.length);while(ch==" "){retValue=retValue.substring(0,retValue.length-1);ch=retValue.substring(retValue.length-1,retValue.length);}
while(retValue.indexOf("  ")!=-1){retValue=retValue.substring(0,retValue.indexOf("  "))+retValue.substring(retValue.indexOf("  ")+1,retValue.length);}
return retValue;}
function isValidInputLinkShare(){if(echeck(document.frmSendMail.Email.value)==false){alert('Dia chi email khong chinh xac.');document.frmSendMail.Email.focus();return false;}
if(trim(document.frmSendMail.Title.value)==""){document.frmSendMail.Title.value="Gui tin tu eva qua email";}
document.frmSendMail.submit();return true;}
function isValidInputLinkContact(){if(trim(document.frmContact.Name.value)==""){alert('Ban phai nhap Ho va Ten that cua minh.');document.frmContact.Name.focus();return false;}
if(echeck(document.frmContact.Email.value)==false){alert('Dia chi email khong hop le.');document.frmContact.Email.focus();return false;}
if(trim(document.frmContact.Title.value)==""){alert('Ban phai nhap tieu de cua tin.');document.frmContact.Title.focus();return false;}
if(trim(document.frmContact.Body.value)==""){alert('Ban phai nhap noi dung cua tin.');document.frmContact.Body.focus();return false;}
document.frmContact.submit();return true;}
function isValidInputComment(){v_name=trim(document.frmComment.Name.value);if(v_name==''){alert('Bạn chưa nhập tên.');document.frmComment.Name.focus();return false;}
if(v_name.length>100){alert('Tên tối đa 100 ký tự.');document.frmComment.Name.focus();return false;}
v_email=trim(document.frmComment.Email.value);if(v_email==''){alert('Bạn chưa nhập địa chỉ email.');document.frmComment.Email.focus();return false;}
if(echeck(v_email)==false){alert('Địa chỉ email không chính xác.');document.frmComment.Email.focus();return false;}
if(v_email.length>100){alert('Email tối đa 100 ký tự.');document.frmComment.Email.focus();return false;}
v_title=trim(document.frmComment.Title.value);if(v_title==""){alert('Bạn chưa nhập tiêu đề.');document.frmComment.Title.focus();return false;}
if(v_title.length>100){alert('Tiêu đề tối đa 100 ký tự.');document.frmComment.Title.focus();return false;}
v_body=trim(document.frmComment.Body.value);if(v_body==""||v_body=="Bạn phải nhập nội dung là tiếng Việt có dấu đầy đủ"){alert('Bạn chưa nhập nội dung.');document.frmComment.Body.focus();return false;}
if(v_body.length>5000){alert('Nội dung bình luận không được vượt quá 5000 ký tự.');document.frmComment.Body.focus();return false;}
if(trim(document.frmComment.s_code.value)==""){alert('Bạn chưa nhập mã bảo vệ.');document.frmComment.s_code.focus();return false;}
document.frmComment.submit();return true;}
function changhomeimg(num)
{for(i=1;i<=num_news;i++){if(i!=num){document.getElementById('homeimg'+i).style.display='none';document.getElementById('home-sum-'+i).style.display='none';document.getElementById('numlink'+i).setAttribute('class','num-pic-link');}
document.getElementById('homeimg'+num).style.display='';document.getElementById('home-sum-'+num).style.display='';document.getElementById('numlink'+num).setAttribute('class','num-pic-active');}}
function autochangeimg()
{if(cur_news==1){cur_news=2;}else{cur_news=1;}
changhomeimg(cur_news);setTimeout('autochangeimg()',10000);}
function FaceBtn()
{btnPreobj=document.getElementById("btnPre");btnNextobj=document.getElementById("btnNext");if(btnPreobj)setOpacity(btnPreobj,60);if(btnNextobj)setOpacity(btnNextobj,60);}
function MiddleBtn()
{var imgHeigth;var btnTop;imgHeigth=document.getElementById('MainIMG').height;btnTop=Math.round(imgHeigth/2);if(document.getElementById('btnPre')){document.getElementById('btnPre').style.padding=(btnTop-25)+'px 210px '+(btnTop-25)+'px 0px';}
if(document.getElementById('btnNext')){document.getElementById('btnNext').style.padding=(btnTop-25)+'px 0px '+(btnTop-25)+'px 210px';}
ShowBtn1st=true;}
function showBtn()
{if(inSlide==false&&ShowBtn1st!=false){if(document.getElementById('btnPre'))document.getElementById('btnPre').style.visibility='visible';if(document.getElementById('btnNext'))document.getElementById('btnNext').style.visibility='visible';}}
function hideBtn()
{if(document.getElementById('btnPre'))document.getElementById('btnPre').style.visibility='hidden';if(document.getElementById('btnNext'))document.getElementById('btnNext').style.visibility='hidden';}
function SlideShow(enablethumb)
{var NumImg;var cImg2;if(inSlide==true){if(cImg==LastImg-1){cImg=0;}else{cImg=cImg+1;}
if(cImg==LastImg-1){cImg2=0;}else{cImg2=cImg+1;}
if(document.images){img1=new Image();img1.src=img[cImg2][0];}
NumImg=cImg+1;MImg=this.document.getElementById('MainIMG');MImg.src=img[cImg][0];fadeIn('MainIMG',0);FaceBtn();MiddleBtn();PrevLink=img[cImg][2];NextLink=img[cImg][3];if(document.getElementById('ImgDesc')){this.document.getElementById('ImgDesc').innerHTML=img[cImg][1];}
if(enablethumb){for(k=1;k<=LastImg;k++){if(document.getElementById('thumb_'+k)){this.document.getElementById('thumb_'+k).setAttribute("class","image-thumb");}}
if(document.getElementById('thumb_'+NumImg)){this.document.getElementById('thumb_'+NumImg).setAttribute("class","thumb-active");}
if(document.getElementById('slidethumb')){stepcarousel.stepTo('slidethumb',NumImg);}}
window.setTimeout("SlideShow("+enablethumb+")",TimeDelay);}}
function StartSlideShow(enablethumb)
{hideBtn();if(inSlide==false){inSlide=true;if(cImg==LastImg-1){cImg2=0;}else{cImg2=cImg+1;}
if(document.images){img1=new Image();img1.src=img[cImg2][0];}
SlideShow(enablethumb);this.document.getElementById('btnSlideShow').innerHTML='D&#7915;ng xem t&#7921; &#273;&#7897;ng';this.document.getElementById('btnSlideShow_1').innerHTML='D&#7915;ng xem t&#7921; &#273;&#7897;ng';}else{inSlide=false;ShowBtn1st=true;this.document.getElementById('btnSlideShow').innerHTML='Xem Album t&#7921; &#273;&#7897;ng';this.document.getElementById('btnSlideShow_1').innerHTML='Xem Album t&#7921; &#273;&#7897;ng';showBtn();}}
function NextImg()
{window.location=NextLink;}
function PrevImg()
{window.location=PrevLink;}
function changCalimg(num)
{for(i=1;i<=num_news;i++){if(i!=num){document.getElementById('calendarimg'+i).style.display='none';document.getElementById('numlink'+i).setAttribute("class","lich-img-num");}
document.getElementById('calendarimg'+num).style.display='';fadeIn('calendarimg'+num,0);document.getElementById('numlink'+num).setAttribute("class","lich-img-num-active");}}
function autochangeimg_lichvannien()
{if(cur_news>=3){cur_news=1;}else{cur_news++;}
changCalimg(cur_news);setTimeout('autochangeimg_lichvannien()',10000);}
function loadLichVansu(ngay)
{if(ngay!=''){AjaxAction('box_lich','/ajax/box_lich_van_nien_chi_tiet/index/'+ngay);}}
function loadngay_lichvannien(y,m,d)
{loadLichVansu(y+'-'+LZ(m)+'-'+LZ(d));}
function LoadLichThang(thang,nam){AjaxAction('lich_thang','/ajax/box_lich_thang/index/'+thang+'/'+nam);}
function hidebutton(pid){var hideb=document.getElementById('hidebutton_'+pid);var showb=document.getElementById('showbutton_'+pid);var datadiv=document.getElementById('subcomment_div_'+pid);hideallcap2();hideb.style.display='inline';showb.style.display='none';datadiv.className='bl-sub-bg';}
function showbutton(pid){var hideb=document.getElementById('hidebutton_'+pid);var showb=document.getElementById('showbutton_'+pid);var datadiv=document.getElementById('subcomment_div_'+pid);datadiv.innerHTML="";hideb.style.display='none';showb.style.display='inline';datadiv.className='';}
function hideallcap2(){var divs=document.getElementsByTagName("div");for(var i=0;i<divs.length;i++){var div=divs[i];if(div.className=='showbuttoncap2'){div.style.display='none';}
else{if(div.className=='hidebuttoncap2'){div.style.display='inline';}}}}
function parseScript(_source)
{var source=_source;var scripts=new Array();while(source.indexOf("<script")>-1||source.indexOf("</script")>-1){var s=source.indexOf("<script");var s_e=source.indexOf(">",s);var e=source.indexOf("</script",s);var e_e=source.indexOf(">",e);scripts.push(source.substring(s_e+1,e));source=source.substring(0,s)+source.substring(e_e+1);}
for(var i=0;i<scripts.length;i++){try{eval(scripts[i]);}
catch(ex){}}
return source;}
function showSubcommnet(where,url,pid){hidebutton(pid);var xmlHttp=new GetXmlHttpObject()
if(xmlHttp==null){return;}
var bar='&#272;ang t&#7843;i d&#7919; li&#7879;u';document.getElementById(where).innerHTML=bar
xmlHttp.onreadystatechange=function(){if(xmlHttp.readyState==4||xmlHttp.readyState==200){document.getElementById(where).innerHTML=parseScript(xmlHttp.responseText);}}
xmlHttp.open("GET",url,true);xmlHttp.send(null);}
function show_comment_form(p_so_luong_binh_luan,p_url,p_comment_ctrl){if(p_comment_ctrl&&p_so_luong_binh_luan>=1&&(p_comment_ctrl.value==''||p_comment_ctrl.value=='Nhập ý kiến của bạn ở đây.')){alert('Bạn chưa nhập ý kiến bình luận');p_comment_ctrl.focus();return;}
if(p_comment_ctrl.value.length>5000){alert('Ý kiến bình luận không được quá 5000 ký tự');p_comment_ctrl.focus();return;}
if(p_comment_ctrl.value!=''){p_url+='?comment='+encodeURIComponent(p_comment_ctrl.value);}
MM_openBrWindow(p_url,'newstools','status=yes,scrollbars=yes,resizable=yes,width=680,height=400');}
function vote_onclick(p_poll_id)
{var v_repeat=document.frm_vote.iTemRepeat.value;var v_poll_answer_id="";if(document.frm_vote.multiVote.value==1){for(var i=0;i<v_repeat;i++){if(eval("document.frm_vote.rad_answer"+i+".checked==true")){if(v_poll_answer_id=="")v_poll_answer_id=eval("document.frm_vote.rad_answer"+i+".value");else v_poll_answer_id=v_poll_answer_id+","+eval("document.frm_vote.rad_answer"+i+".value");}}}else{for(var i=0;i<v_repeat;i++){if(eval("document.frm_vote.rad_answer["+i+"].checked==true")){v_poll_answer_id=eval("document.frm_vote.rad_answer["+i+"].value");break;}
if(document.frm_vote.rad_answer[i].checked){v_poll_answer_id=document.frm_vote.rad_answer[i].value;break;}}}
if(v_poll_answer_id==""){v_security_poll_url="/ajax/poll/dsp_security_poll/"+p_poll_id;v_width=500;v_height=350;winDef="dialogWidth:"+v_width+"px; dialogHeight:"+v_height+"px; center:yes; scroll:no; status:no;";winDef=winDef.concat('dialogTop:').concat((screen.height-v_height)/2).concat('px;');winDef=winDef.concat('dialogLeft:').concat((screen.width-v_width)/2).concat('px');sRtn=showModalDialog(v_security_poll_url,"",winDef);return;}
v_security_poll_url='/ajax/poll/dsp_security_poll/'+p_poll_id+'/'+v_poll_answer_id;v_width=500;v_height=350;winDef="width="+v_width+",height="+v_height+"; dialogWidth:"+v_width+"px;dialogHeight:"+v_height+"px;  center:yes; scroll:no; status:no;";winDef=winDef.concat('dialogTop:').concat((screen.height-v_height)/2).concat('px;');winDef=winDef.concat('dialogLeft:').concat((screen.width-v_width)/2).concat('px');window.open(v_security_poll_url,"",winDef);}
function view_vote_result_onclick(p_poll_id)
{v_url="/ajax/poll/dsp_vote_result/"+p_poll_id;v_width=500;v_height=350;winDef="location=1,status=1,scrollbars=1,width="+v_width+",height="+v_height+",";winDef=winDef.concat('top=').concat((screen.height-v_height)/2).concat(',');winDef=winDef.concat('left=').concat((screen.width-v_width)/2);window.open(v_url,"",winDef);}
function resize_iframe(p_poll_id,p_width,p_height)
{try{p_name='iframePoll'+p_poll_id;p_width=p_width;p_height=p_height;if(document.getElementsByTagName){iframe_obj=parent.document.getElementsByTagName("iframe");for(i=0;i<iframe_obj.length;i++){if(iframe_obj[i].name==p_name){if(p_width>=0)iframe_obj[i].width=p_width;p_height=(p_height>0)?p_height:document.getElementById('poll').offsetHeight;if(p_height>=0)iframe_obj[i].height=p_height;}}}}catch(e){}}
function validate_vote_submit_onclick()
{frm=document.frm_security_poll;if(frm.txtSecurityCode.value==""){alert("Ban chua nhap ma xac nhan.");return false;}
frm.submit();}
function placeFocus(){if(document.forms.length>0){var field=document.forms[0];for(i=0;i<field.length;i++){if((field.elements[i].type=="text")||(field.elements[i].type=="textarea")||(field.elements[i].type.toString().charAt(0)=="s")){document.forms[0].elements[i].focus();break;}}}}
function recreateLinkBackground(){var mainw=1010;var w=f_clientWidth();var h=f_clientHeight();w2=w1=(w-mainw)/2;left1=0;left2=w1+mainw;link1=document.getElementById('linkbg1');link2=document.getElementById('linkbg2');if(w>=1040){link1.style.width=w1+'px';link1.style.height=h+'px';link1.style.left=left1+'px';link1.style.display='block';link2.style.width=w2+'px';link2.style.height=h+'px';link2.style.left=left2+'px';link2.style.display='block';}else{link1.style.display='none';}}
function ie6_recreate_background(){if(window.addEventListener){window.addEventListener('load',recreateLinkBackground,false);}else{window.attachEvent('onload',recreateLinkBackground);}}