<?
	function TOP_show_part1() {
		global $MY;
		global $WORDS;
		global $IMAGES;
		global $COLORS;
		global $ALREADY;
		$cut  = $MY[cut_goods_descr];
		$curc = $COLORS[catalog_goods][0];
		$res  = mysql_query("SELECT COUNT(id) FROM S_best WHERE level_id IS NULL");
		$row  = mysql_fetch_array($res);
		$allcount = $row[0];
		$res=mysql_query("SELECT product_id,amount FROM S_best WHERE level_id IS NULL ORDER BY amount DESC LIMIT 0,50");
		while($row = mysql_fetch_object($res)) {
		    $g = GOO_get_product_by_id($row->product_id);
		    if($g) {
			$cursize = 0;
			$added	 = 0;
			$cursize = GOO_round_product_size($g->size);
			$z = $g->id;
			if(strlen($g->description)>$cut) { $description = substr($g->description,0,$cut).'...';}
			else { $description = $row->description; } 				# cutting description
			# if item is already in basket, show message
			if($ALREADY["p$z"] ||
			   $ALREADY["l".$row->link]) {
				if(!$ALREADY["p$z"]) { $ALREADY["p$z"]=1; }
				$added = 1;
			}
			$out .= GOO_show_item_in_table($z, $added, $g->caption, $curc, $g->about_url, $g->author, $g->email, $cursize, $g->new_price, $g->small_image,$description,$row->amount,1);
		    }
		}
		if($allcount>50) {
		    $parts = "<b><a href=\"?user=top100&part=1\">$WORDS[top100_part1]</a></b>
				<a href=\"?user=top100&part=2\">$WORDS[top100_part2]</a>";
		}
		return '
			<tr><td colspan=2>
			    <form name="goodslist">
			    <table width=100% cellspacing=0 cellpadding=0 border=0>
			    <tr><td colspan=2>
<img src="'.$IMAGES[panel_top100].'"><img src="'.$IMAGES[empty_center_panel][1].'" height=22 width=450><img src="'.$IMAGES[empty_center_panel][2].'">'."
			    </td>
			    </tr>
			    <tr><td align=left><b>$WORDS[top100_caption]</b></td>
				<td align=right>$parts&nbsp;</td></tr>

			    <tr><td colspan=2>
			        <script>ff = document.forms['goodslist'];</script>
				$out
			    </td></tr>
			    </table>
			    
			    </form>
			    
			    
			</td></tr>\n";
	}

	function TOP_show_part2() {
		global $MY;
		global $WORDS;
		global $IMAGES;
		global $COLORS;
		global $ALREADY;
		$cut  = $MY[cut_goods_descr];
		$curc = $COLORS[catalog_goods][0];
		$res=mysql_query("SELECT product_id,amount FROM S_best WHERE level_id IS NULL ORDER BY amount DESC LIMIT 50,50");
		while($row = mysql_fetch_object($res)) {
		    $g = GOO_get_product_by_id($row->product_id);
		    if($g) {
			$cursize = 0;
			$added	 = 0;
			$cursize = GOO_round_product_size($g->size);
			$z = $g->id;
			if(strlen($g->description)>$cut) { $description = substr($g->description,0,$cut).'...';}
			else { $description = $row->description; } 				# cutting description
			# if item is already in basket, show message
			if($ALREADY["p$z"] ||
			   $ALREADY["l".$row->link]) {
				if(!$ALREADY["p$z"]) { $ALREADY["p$z"]=1; }
				$added = 1;
			}
			$out .= GOO_show_item_in_table($z, $added, $g->caption, $curc, $g->about_url, $g->author, $g->email, $cursize, $g->new_price, $g->small_image,$description,$row->amount,1);
		    }
		}
		$parts = "<a href=\"?user=top100&part=1\">$WORDS[top100_part1]</a>
			<b><a href=\"?user=top100&part=2\">$WORDS[top100_part2]</a></b>";
		return '
			<tr><td colspan=2>
			    <form name="goodslist">
			    <table width=100% cellspacing=0 cellpadding=0 border=0>
			    <tr><td colspan=2>
<img src="'.$IMAGES[panel_top100].'"><img src="'.$IMAGES[empty_center_panel][1].'" height=22 width=450><img src="'.$IMAGES[empty_center_panel][2].'">'."
			    </td>
			    </tr>
			    <tr><td align=left><b>$WORDS[top100_caption]</b></td>
				<td align=right>$parts&nbsp;</td></tr>
			    <tr><td colspan=2>
			        <script>ff = document.forms['goodslist'];</script>
				$out
			    </td></tr>
			    </table>
			    </form>
			</td></tr>\n";
	}


?>