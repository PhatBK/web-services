stepcarousel.setup({galleryid:'mygallery',beltclass:'belt',panelclass:'panel',autostep:{enable:false,moveby:1,pause:3000},panelbehavior:{speed:500,wraparound:false,persist:true},defaultbuttons:{enable:true,moveby:1,leftnav:['/design/images/prev-horizontal.jpg',-15,50],rightnav:['/design/images/next-horizontal.jpg',10,50]},statusvars:['statusA','statusB','statusC'],contenttype:['inline']})
function ShowDiv(divid,iframe,state)
{var DivRef=document.getElementById(divid);var IfrRef=document.getElementById(iframe);if(state)
{DivRef.style.display="block";IfrRef.style.width=DivRef.offsetWidth;IfrRef.style.height=DivRef.offsetHeight;IfrRef.style.top=DivRef.style.top;IfrRef.style.left=DivRef.style.left;IfrRef.style.zIndex=DivRef.style.zIndex-1;IfrRef.style.display="block";}
else
{DivRef.style.display="none";IfrRef.style.display="none";}}
function hideSelects(){var elements=document.getElementsByTagName("select");var dont_list=new Array('fb_section','category1234');for(i=0;i<elements.length;i++){elements[i].style.visibility='hidden';if(document.getElementById("searchable"))
document.getElementById("searchable").style.visibility='visible';}
for(var j=0;j<dont_list.length;j++){if(document.getElementById(dont_list[j]))
document.getElementById(dont_list[j]).style.visibility='visible';}}
function showSelects(){var elements=document.getElementsByTagName("select");var dont_list=new Array('fb_section','category1234');for(i=0;i<elements.length;i++){elements[i].style.visibility='visible';}
for(var j=0;j<dont_list.length;j++){if(document.getElementById(dont_list[j]))
document.getElementById(dont_list[j]).style.visibility='visible';}}