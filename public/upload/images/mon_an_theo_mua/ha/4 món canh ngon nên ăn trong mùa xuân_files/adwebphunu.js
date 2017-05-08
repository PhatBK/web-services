document.write('<link rel="stylesheet" type="text/css" media="all" href="http://ads.webphunu.net/css/Style.css" />');
wpn_width = typeof wpn_width == 'string' ? wpn_width : '320px';
wpn_id = typeof wpn_id == 'string' ? '' + wpn_id + '' : 'epi-widget-container';
document.write('<div id="adWebphunu_block">\r\n');
document.write('<div id="" class="wpnads_widget" style="width: ' + wpn_width + ';">\r\n');
    document.write('<div class="ads_add_top">\r\n');
    document.write('<a target="_blank" href="http://vinmedia.com.vn">Mua quảng cáo</a></div>\r\n');
            document.write('<div class="ads_by" style="margin-bottom: 1px;">\r\n');
                document.write('<a target="_blank" href="http://vinmedia.com.vn">\r\n');
                document.write('<img src="http://ads.webphunu.net/img/ads_by.png" alt="Webphunu.net"></a></div>\r\n');
            document.write('<div class="wpnads_clear"></div>\r\n');
            document.write('<div id="' + wpn_id + '">\r\n');
            document.write('</div>\r\n');
            document.write('<div class="ads_add"><a href="http://vinmedia.com.vn" target="_blank" style="float: right;margin-right: 10px;">Mua quảng cáo</a></div>\r\n');                   
        document.write('</div>\r\n');
    document.write('</div>\r\n');

function outputWidget(strHtml)
{
    document.getElementById(wpn_id).innerHTML = strHtml;
}