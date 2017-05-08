try { 
	v_url = location.href;
	if (typeof(_SERVER) == 'undefined'){
		_SERVER=0;
	}
	if (v_url.indexOf('?')>=0) {
		v_url += "&server=" + _SERVER;
	}else{
		v_url += "?server=" + _SERVER;
	}
	v_url = escape(v_url);
	v_get = "";
    if (typeof(tag_id) != 'undefined'){
		v_get = "&tag_id=" + tag_id;
	}
	if (v_url != "" ) {
		document.write("<img src='http://thongke.24h.com.vn/eva-analytics/eva-analytics.php?rand="+Math.random()+v_get+"&amp;url_tracker=" + v_url + "' height='0' width='0'>");
	}
} catch (e) {}
