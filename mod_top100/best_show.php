<?
	function BES_show_brief() {
		global $MY;
		global $WORDS;
		global $IMAGES;
		global $ALREADY;
		global $CURRENT_POSITION;
		$sh_level = $MY[top100_show_levels_amount];
		$sh_goods = $MY[top100_show_goods_amount];
		$limit	  = $sh_level+$sh_goods;
		
#		if($CURRENT_POSITION=='basket') {
#		    USE_refresh_order();
#		}

#foreach($ALREADY as $l) {
#    print $ALREADY['l10']." - $l<br>";
#}
#exit;
		# at first let's show the best catalogs
		$res = mysql_query("SELECT * FROM S_best WHERE product_id=0 ORDER BY amount DESC LIMIT $sh_level");
		while($r = mysql_fetch_object($res)) {
			unset($curl);
			if($r->level_id && $sh_level) {
#print "$r->level_id - ".$ALREADY["l$r->level_id"]."<br>";
				if(!$ALREADY["l".$r->level_id]) {
				    $ac='<a href="#" '.
                                	'OnMouseOver="wstatuslvl()" '.
                                    	'OnMouseOut="cstatus()" '.
                                    	"OnClick=\"buy_win_lvl($r->level_id);return false;\">".
                                    	'<img src="'.$IMAGES[catalog_add_level_img].'" border=0></a>';
				} else {
				    $ac='<img src="'.$IMAGES[catalog_add_level_img_already].'">';
				}
				$curl = GOO_get_level_by_id($r->level_id,1);
				$out .= '<tr><td valign=top>'.
				    '<a href="?user=catalog&id='.$r->level_id.'" class="BEST_link">'.$curl->caption.'</a></td>'.
				"<td align=right valign=top>$WORDS[rating] <b>$r->amount</b><br>&nbsp;</td>".
				"<td align=center valign=top>$ac</td></tr>\n";
				$sh_level--;
			} else { break; }
		}
#exit;
		# now lets show the best products
		$res = mysql_query("SELECT * FROM S_best WHERE ISNULL(level_id) ORDER BY amount DESC LIMIT $sh_goods");
		while($r = mysql_fetch_object($res)) {
			unset($curp);
			if($r->product_id>0 && $sh_goods) {
				$curp = GOO_get_product_by_id($r->product_id);
				if( $ALREADY["p$r->product_id"] ||
				    $ALREADY["l$curp->link"]) {
				    $ac = '<img src="'.$MY[goods_add_img_already].'" border=0>';
				} else {
				    $ac = '<a href="#" OnMouseOver="wstatus()" OnMouseOut="cstatus()" '.
					  'OnClick="buy_win('.$r->product_id.',1);return false;">'.
					  '<img src="'.$MY[goods_add_small_img].'" border=0>'.
					  '</a>';
				    
				}
				$cursize = GOO_round_product_size($curp->size);
				if($curp->small_image) {
					$out .= '<tr><td valign=top><img'.
					' height='.$MY[img_size_in_top100][0].
					' width='. $MY[img_size_in_top100][1].
					' src="'.  $curp->small_image.'" align=left>'.
					'<a class="BEST_link" href="/#" OnClick="info_win('.$r->product_id.');return false;">'.
						$curp->caption.
					'</a>'.
					" ($WORDS[global_taken] $r->amount $WORDS[global_times])<br>&nbsp;<br>&nbsp;<br>".
					"$WORDS[global_price]: $cursize".
						" $ac</a><br>&nbsp;</td></tr>\n";
				} else {
					$out .=
					'<tr>
					    <td align=left colspan=2>
						<a class="BEST_link" href="/#" OnClick="info_win('.$r->product_id.');return false;">'.
						    $curp->caption."</a>
					    </td>
					</tr>
					<tr>
					    <td align=left valign=top>
						$WORDS[global_price]: $cursize
					    </td>
					    <td align=right valign=top>
						$WORDS[rating] <b>$r->amount</b>
					    </td>
					    <td align=right valign=top>
						$ac&nbsp;<br>&nbsp;
					    </td>
					</tr>\n";
				}

				$sh_goods--;
			}
		}
		if($CURRENT_POSITION!='top100') $go = '<tr><td colspan=3><a href="?user=top100">'.$WORDS[top100_link].'</a>&nbsp;</td></tr>';
		return "<table width=100% cellspacing=2 cellpadding=0 border=0>$out$go</table>\n";
	}


?>