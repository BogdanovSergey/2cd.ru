<?


	function SKIN_table($cap_img,$width,$caps,$body) {
		global $IMAGES;
		global $COLORS;
		if($caps) { $captions="<tr bgcolor=\"$COLORS[table_captions_bgcolor]\">$caps</tr>"; }
		return
		'
		<table border=0 width=100% cellpadding=0 cellspacing=0>
			<tr><td align=left>
			<img src="'.$cap_img.'"><img src="'.$IMAGES[empty_center_panel][1].'"
				height=22 width='.$width.'><img src="'.$IMAGES[empty_center_panel][2].'">
			</td></tr>
			<tr><td bgcolor="'.$COLORS[table_ark].'" valign=top>
		 		<table border=0 align=center cellpadding=2 cellspacing=1 width=100%>
				'.
				$captions.
				$body.
				'
 				</table>
			</td></tr>
		</table><br>
		';
	
	
	
	
	}

?>
