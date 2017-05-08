var adsArr90 = new Array();

adsArr90[0] = '<embed type="application/x-shockwave-flash" src="/upload/2-2014/banner/nhommua/2014-04-25/1398409217_me be 210 480_25042014.swf" quality="high" allowscriptaccess="sameDomain" wmode="transparent" wmode="transparent" width="210" height="480" />';
adsArr90[1] = '<embed type="application/x-shockwave-flash" src="/upload/2-2014/banner/nhommua/2014-05-09/1399616937_me be 210 480-09052014.swf" quality="high" allowscriptaccess="sameDomain" wmode="transparent" wmode="transparent" width="210" height="480" />';

var curBanner90 = Math.floor(Math.random()*adsArr90.length);
if (adsArr90[curBanner90] != undefined) {
    document.write('<div id="ads_kh_90">'+adsArr90[curBanner90]+'</div>');
}
