<?

	$CONTENT[static_banners_all] =
'
                <tr align=center><td>
<a href="http://www.yandex.ru/cy?base=0&host=www.2cd.ru">
<img src="http://www.yandex.ru/cycounter?www.2cd.ru" width=88 height=31 alt="Яндекс цитирования" border=0></a>
                </td></tr>

                <tr align=center><td>
<!--begin of Top100 logo-->
<a href="http://top100.rambler.ru/top100/">
<img src="http://counter.rambler.ru/top100.cnt?325447" alt="Rambler\'s Top100" width=1 height=1 border=0></a>
<!--end of Top100 logo -->
                </td></tr>

';

    $CONTENT[static_banners_main_page] =
'    <table width=100% cellspacing=1 cellpadding=0 border=0>
	'.$CONTENT[static_banners_all].'
    </table>
    <br>
';



# banners on second (inside) pages
    $CONTENT[static_banners] =
'    <table width=100% cellspacing=1 cellpadding=0 border=0>
	'.$CONTENT[static_banners_all].'
    </table>
    <br>
';



?>
