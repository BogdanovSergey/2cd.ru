<?
	function AUTHOR_show_greet_form() {
		global $WORDS;
		global $IMAGES;
		global $COLORS;
		$USER = USE_get_user_info();
#		if($USER[authorized]) {
			$btn = '<a href="#" OnClick="document.forms[\'acond\'].submit();return false;"><img src="'.$IMAGES[btn_ok].'" border=0></a>';
#		} else {
#			$btn = $WORDS[authors_deny].'<br><img src="'.$IMAGES[btn_ok].'" border=0>';
#		}
		
		$out = '<table width=100% cellspacing=0 cellpadding=0 border=0>
			    <tr><td align=left>
				<img src="'.$IMAGES[panel_authors].'"><img src="'.$IMAGES[empty_center_panel][1].'" height=22 width=450><img src="'.$IMAGES[empty_center_panel][2].'">
			    </td></tr>
			    <tr bgcolor="'.$COLORS[new_goods][0]."\">
				<td>
				<form method=\"POST\" name=\"acond\">
				<input type=\"hidden\" name=\"user\" value=\"authors\">
				<input type=\"hidden\" name=\"part\" value=\"upload\">
				    $WORDS[authors_conditions]
					
				    
				    <center>Для добавления Вашего программного продукта нажмите кнопку<br>".$btn.'</center>
				</td>
			    </tr>
			</table>
		';
		
		return $out;
	}

?>
