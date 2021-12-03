<?

	$res = mysql_query("SELECT * FROM S_goods WHERE active=1 ORDER BY id DESC LIMIT $MY[new_goods_amount]");
	while($row = mysql_fetch_object($res)) {
		$size	= 0;
		if(!$color_no)  { $put_c=$COLORS[new_goods][1]; $color_no=1; }
		else 		{ $put_c=$COLORS[new_goods][0]; $color_no=0; }
		$size	= GOO_round_size($row->size);
		
		if($ALREADY["p$row->id"] ||
		   $ALREADY["l$row->link"]) {
			$tmpvar = '<img src="'.$MY[goods_add_img_already].'" border=0>';
		} else {
			$tmpvar = 
				  '<a href="#" OnMouseOver="wstatus();" OnMouseOut="cstatus();" '.
				  'OnClick="buy_win('.$row->id.',1);return false;">'.
				  '<img src="'.$MY[goods_add_small_img].'" border=0></a>';
		}
		$glist .= "<tr bgcolor=\"$put_c\">".
		   '<td>&nbsp;<a href="/#" OnClick="info_win('.$row->id.');return false;" class="N_link">'.$row->caption."</a></td>".
		   '<td align=center class="N_price">&nbsp;'.$size.'</td>'.
		   '<td align=center>'.$tmpvar.'</td>'.
		   "</tr>\n";

	}


$CONTENT[new_goods] =
'
<table width=100% cellspacing=0 cellpadding=0 border=0>
<tr><td align=left colspan=3>
	<img src="'.$IMAGES[panel_new].'"><img src="'.$IMAGES[empty_center_panel][1].'" height=22 width=285><img src="'.$IMAGES[empty_center_panel][2].'">
</td></tr>
<tr bgcolor="'.$COLORS[new_goods][0].'">
        <td width=80% class="N_caption">&nbsp;'.$WORDS[new_goods_caption].'</td>
	<td align=center class="N_caption">'.$WORDS[new_goods_size].'</td>
	<td align=center class="N_caption">'.$WORDS[new_goods_buy].'</td>
	
</tr>

'.$glist.'

</table>
';


?>