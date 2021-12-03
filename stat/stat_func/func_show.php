<?

	function STAT_show_main() {
		global $MY;
		global $STAT;
		global $SWORDS;
		$out = STAT_html_table(315,	"<td colspan=2 align=center><b>$SWORDS[caption_brief]</b></td>",
			"<tr bgcolor=\"#ffffff\"><td width=80%>$SWORDS[unique_hosts]</td>	<td>$STAT[unique_hosts]</td></tr>".
			"<tr bgcolor=\"#ffffff\"><td width=80%>$SWORDS[hosts]</td>		<td>$STAT[hosts]</td></tr>".
			"<tr bgcolor=\"#ffffff\"><td width=80%>$SWORDS[clicks]</td>		<td>$STAT[clicks]</td></tr>"
			
			);
		
		
		return $out;
	}
	function STAT_show_from() {
		global $MY;
		global $STAT;
		global $SWORDS;
#		global $FROM_READY_LINKS;
		$tmp = @mysql_query("SELECT * FROM STAT_camefrom  WHERE site_id=$MY[site] ORDER BY clicks DESC LIMIT 0,15");
		while($res = @mysql_fetch_object($tmp)) {
			$body .= "<tr bgcolor=\"#ffffff\"><td width=80%>$res->real_url</td><td>$res->clicks</td></tr>";
		}

		$out = STAT_html_table(315,	"<td colspan=2 align=center><b>$SWORDS[caption_camefrom]</b></td>",
					$body
			);
		
		
		return $out;
	}

	function STAT_show_sectors() {
		global $MY;
		global $STAT;
		global $SWORDS;
		$tmp = mysql_query("SELECT * FROM STAT_sectors WHERE site_id=$MY[site]");
		while($res = mysql_fetch_object($tmp)) {
			$out .="<tr bgcolor=\"#ffffff\"><td>$res->sector_id</td>
				<td width=80%>$res->sector_title</td>
				<td>$res->hosts</td>
				<td>$res->clicks</td>
				<td><a href=\"#\" OnClick=\"if(confirm('$SWORDS[del_sector] $res->sector_title ?')){document.location.href='?admin=1&del_sector=$res->id';}\">x</a></td></tr>\n";
		}
		$newsec .= "
			<form method=\"POST\">
			    <input type=\"hidden\" name=\"admin\" value=\"1\">
			    <tr bgcolor=\"#eeeeee\"><td width=80% colspan=2>id <input type=\"text\" size=2 name=\"sector_id\"> $SWORDS[sector_title] <input type=\"text\" size=15 name=\"sector_title\"></td><td colspan=3><input type=\"submit\" value=\"$SWORDS[btn_create_sector]\"></td></tr>
			</form>";
		
		$out = STAT_html_table(315,	"<td colspan=5 align=center><b>$SWORDS[caption_sectors]</b></td>",
			"<tr bgcolor=\"#eeeeee\"><td>id</td><td width=80%>$SWORDS[sector]</td><td>$SWORDS[hosts]</td><td>$SWORDS[clicks]</td><td>$SWORDS[del_sector]</td></tr>".
			$out.
			$newsec);

		
		return $out;
	}



	function STAT_html_table($width,$caps,$body) {
		global $IMAGES;
		global $COLORS;
		$cap_img = 'images/s1/panel_new.gif';
		if($caps) { $captions="<tr bgcolor=\"#eeeeee\">$caps</tr>"; }
		return
		'
		<table border=0 width=60% cellpadding=0 cellspacing=0 align=center>
			<tr><td align=left>
			<img src="'.$cap_img.'"><img src="images/s1/panel_c.gif"
				height=22 width='.$width.'><img src="images/s1/panel_r.gif">
			</td></tr>
			<tr><td bgcolor="#ffcc33" valign=top>
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
