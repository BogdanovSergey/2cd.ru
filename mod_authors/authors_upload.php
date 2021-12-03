<?
	function AUTHOR_upload() {
		global $MY;
		global $WORDS;
		global $IMAGES;
		global $COLORS;
		global $HTTP_POST_VARS;
		$t = get_time();		

		$res = mysql_query("INSERT INTO S_goods(link,tested,active,new,prog_tosection,create_time,caption,version,prog_type,os,prog_lang,description,real_url,screenshot1,about_url,author,email)
VALUES(1,0,0,1,
'$HTTP_POST_VARS[tosection]',
'$t',
'$HTTP_POST_VARS[caption]','$HTTP_POST_VARS[version]','$HTTP_POST_VARS[prog_type]',
'$HTTP_POST_VARS[os]','$HTTP_POST_VARS[prog_lang]','$HTTP_POST_VARS[description]',
'$HTTP_POST_VARS[real_url]','$HTTP_POST_VARS[screenshot1]','$HTTP_POST_VARS[about_url]',
'$HTTP_POST_VARS[author]','$HTTP_POST_VARS[email]'
)");
		



		$out = '<table width=100% cellspacing=0 cellpadding=0 border=0>
			    <tr><td align=left>
				<img src="'.$IMAGES[panel_authors].'"><img src="'.$IMAGES[empty_center_panel][1].'" height=22 width=450><img src="'.$IMAGES[empty_center_panel][2].'">
			    </td></tr>
			    <tr bgcolor="'.$COLORS[new_goods][0].'">
				<td>
				    <center>Спасибо, мы оповестим Вас после проверки Вашей информации</center><br>
				    <center><a href="'.$MY[www].'"><img src="'.$IMAGES[btn_ok].'" border=0></a></center>
				</td>
			    </tr>
			</table>
		';
		
		return $out;
	}

?>
