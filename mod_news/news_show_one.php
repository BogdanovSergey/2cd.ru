<?



	function NEW_show_one() {
		global $COLORS;
		global $HTTP_GET_VARS;
		$res = mysql_query("SELECT * FROM S_news WHERE id='$HTTP_GET_VARS[news]'");
		$n   = mysql_fetch_object($res);
		

		if($n->image1) { $img1 = '<img src="'.$n->image1.'" align=left>'; }
		if($n->image2) { $img2 = '<img src="'.$n->image2.'" align=left>'; }
		
		
		return '
		    <tr bgcolor="'.$COLORS[admin_empty].'">
			    <td width=30% valign=top>'.$n->create_time.'</td>
			    <td valign=top><b>'.$n->caption.'</b></td>
		    </tr>
		    <tr bgcolor="'.$COLORS[admin_empty].'">
	    		    <td colspan=2 valign=top>'.$img1.$img2.$n->big_content.'</td>
		    </tr>
		    ';

	}



?>
