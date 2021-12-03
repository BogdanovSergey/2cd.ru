<?
	function BAS_show_brief() {
		global $MY;
		global $WORDS;
		global $COLORS;
		global $IMAGES;
		global $SESSION;
		global $HTML_begin;
		global $HTML_end;
		global $ORDER_INFO;
		$allprice = 0;
		$res = mysql_query("SELECT id, product_id, amount, level_id FROM S_basket WHERE
										key_id = $SESSION[key_id] and
										active = 1 and
										ready  = 0");
		while($row = mysql_fetch_row($res)) {
			if($row[1]) {
				$g		= GOO_get_product_by_id($row[1]);
				$this_size	= GOO_round_product_size($g->size);
			} else {
				$g = GOO_get_level_by_id($row[3],1);
				$this_size	= GOO_round_size($g->size);
			}
			$prod 		=  $row[0];
			$lvlid		=  0;
			#$allprice      +=  $g->new_price*$row[2];
			
			
			if($g->small_image)	{ $img = '<img src="'.$g->small_image.'" border=0>'; }
                       	else			{ $img = '<img src="'.$MY[goods_no_img].'">'; }
			if($row[3])		{ $img = '<img src="'.$MY[level_img].'">'; 
						  $lvlid = $row[3]; }
			
			$out .=    "<tr bgcolor=".$COLORS[basket_goods][1]."><td align=center>$img</td>".
				   '<td><a href="#" OnClick="info_win('.$g->id.','.$lvlid.');
					return false;">'.$g->caption."</a></td>".
				   "<td align=center>&nbsp;$this_size</td></tr>\n";
			
		}

		$allsize = GOO_round_size($ORDER_INFO[size]);
		print
$HTML_begin.
'<table border=0 align=center width=100% cellpadding=0 cellspacing=0>
<tr><td align=left>
	<img src="'.$IMAGES[empty_center_panel][0].'"><img src="'.$IMAGES[empty_center_panel][1].'" height=22 width=335><img src="'.$IMAGES[empty_center_panel][2].'">
</td></tr>

<tr><td>
    <table border=0 align=center width=100% cellpadding=0 cellspacing=0>
	<tr><td bgcolor="'.$COLORS[basket_goods_ark].'" valign=top>
        <table border=0 align=center cellpadding=2 cellspacing=1 width=100%>'.
		$out.
		'<tr bgcolor="'.$COLORS[basket_goods][0].'">
		<td colspan=3 align=center>
		    <table border=0 width=40% cellpadding=0 cellspacing=0>
		    <tr><td align=left>'.$WORDS[simple_items_amount].':</td>	<td align=left><b>'.$ORDER_INFO[items].'</b></td></tr>
		    <tr><td align=left>'.$WORDS[simple_levels_amount].':</td>	<td align=left><b>'.$ORDER_INFO[levels].'</b></td></tr>
		    <tr><td align=left>'.$WORDS[simple_all_size].':</td>	<td align=left><b>'.$allsize.'</b></td></tr>
		    </table>
		</td></tr>
        </table>
	</td></tr>
    </table>
</td></tr>
</table>'.

$HTML_end;

	}

?>