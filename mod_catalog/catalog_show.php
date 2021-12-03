<?
	function CAT_show_level($isadmin) {
		global $CURR;
		global $WORDS;
		global $IMAGES;
		global $COLORS;
		global $HTTP_GET_VARS;
		global $HTTP_COOKIE_VARS;
		$cat_id = $HTTP_GET_VARS[id];
		$tok = settype($cat_id,'integer');
		if(!$tok) { $cat_id=0; }
		$out  = CAT_show_prev_levels($isadmin);
		$out .= CAT_show_levels($isadmin,$CURR[id]);

		if($isadmin) {
			$table_caption = "<tr bgcolor=\"".$COLORS[admin_catalog_goods][0]."\"><td><a href=\"?admin=catalog&id=$cat_id&sort=0\" title=\"".$WORDS['sort'][0].' '.$WORDS['sort'][1]."\">$WORDS[cat_capt_tree]</a></td><td>Активен</td><td>Ступеней</td>".
					 "<td>Подгрупп</td><td>Продуктов</td><td><a href=\"?admin=catalog&id=$cat_id&sort=1\" title=\"".$WORDS['sort'][0].' '.$WORDS['sort'][2]."\">$WORDS[cat_capt_size]</a></td><td>&nbsp;</td><td>&nbsp;</td></tr>\n";
			$html_patch =	'<img src="'.$IMAGES[empty_center_panel][0].'"><img src="'.$IMAGES[empty_center_panel][1].
					    '" height=22 width=650><img src="'.$IMAGES[empty_center_panel][2].'">
					</td></tr>
					<tr><td bgcolor="'.$COLORS[basket_goods_ark].'" valign=top>';
			$tmp = mysql_query("SELECT SUM(goods),SUM(size) FROM S_levels WHERE link=0 AND active=1");
			list($agoods,$asize) = mysql_fetch_row($tmp);
			$asize = GOO_round_size($asize);
			$table_bottom  = "<tr bgcolor=\"".$COLORS[admin_catalog_goods][0]."\"><td><b>ИТОГО:</b></td><td>&nbsp;</td><td>&nbsp;</td>".
					 "<td>&nbsp;</td><td><b>$agoods</b></td><td><b>$asize</b></td><td colspan=2 align=center><b><a href=\"?admin=catalog&updatedb=1\">Обновить базу данных</a></b></td></tr>\n";
			
		} else {
			$arrow['name']	= "<img src=\"$IMAGES[arrow_red]\" border=0>";
			$arrow['group']	= "<img src=\"$IMAGES[arrow_red]\" border=0>";
			$arrow['goods']	= "<img src=\"$IMAGES[arrow_red]\" border=0>";
			$arrow['size']	= "<img src=\"$IMAGES[arrow_red]\" border=0>";
			if($HTTP_COOKIE_VARS['sort']==1 || $HTTP_GET_VARS['sort']==1) {
				$arrow['size'] = "<img src=\"$IMAGES[arrow_green]\" border=0>";
			} else {
				$arrow['name'] = "<img src=\"$IMAGES[arrow_green]\" border=0>";
			}
		
		
			$table_caption = "<tr bgcolor=\"".$COLORS[basket_goods][0]."\">".
				"<td align=center><a href=\"?user=catalog&id=$cat_id&sort=0\" title=\"".$WORDS['sort'][0].' '.$WORDS['sort'][1]."\">$WORDS[cat_capt_tree] $arrow[name]</a></td>".
				"<td align=center>$WORDS[cat_capt_subgr_amount]</td>".
				"<td align=center>$WORDS[cat_capt_items_amount]</td>".
				"<td align=center><a href=\"?user=catalog&id=$cat_id&sort=1\" title=\"".$WORDS['sort'][0].' '.$WORDS['sort'][2]."\">$WORDS[cat_capt_size] $arrow[size]</a></td>".
				"<td align=center>$WORDS[cat_capt_add_level]</td></tr>\n";
			$html_patch    = '</td></tr><tr><td bgcolor="'.$COLORS[basket_goods_ark].'" valign=top>';
		}
		# retreive whole db info
		return 
		"<table border=0 width=100% cellpadding=0 cellspacing=0>
		    <tr bgcolor=\"".$COLORS[basket_goods][1].'"><td valign=top>
		    '.$html_patch.'
		    <table border=0 align=center cellpadding=2 cellspacing=1 width=100%>'.
		    
		    $table_caption.
		    $out.
		    $table_bottom."
		    </table>
		    </td></tr>
		</table><br>\n";
	}

	function CAT_show_levels($isadmin,$id) {
		global $MY;
		global $WORDS;
		global $ALREADY;
		global $COLORS;
		global $IMAGES;
		global $HTTP_GET_VARS;
		global $HTTP_COOKIE_VARS;
		global $CURRENT_POSITION;

		# init and determine type of sorting
		ROL_save_sort_to_cookie();
		if($HTTP_COOKIE_VARS['sort']==1 || $HTTP_GET_VARS['sort']==1) {
			$sql_str_sort = 'ORDER BY size DESC';
		} else {
			$sql_str_sort = 'ORDER BY caption ASC';
		}

		if($isadmin) {
			$res = mysql_query("SELECT * FROM S_levels WHERE link=$id $sql_str_sort");
			while($row = mysql_fetch_object($res)) {
				$allgoods = 0;
				$realurls = 0;
				if($row->level==2) 	{ $space = ' &nbsp; &nbsp; '; }
				elseif($row->level==3)  { $space = ' &nbsp; &nbsp; &nbsp; &nbsp; '; }
/* #very hard work!
				$tmpvar = mysql_query("SELECT COUNT(id) FROM S_goods WHERE link=$row->id");
				$tmpres = mysql_fetch_row($tmpvar);
				$allgoods = $tmpres[0];
				
				$tmpvar = mysql_query("SELECT COUNT(id) FROM S_goods WHERE link=$row->id and real_url is not null");
				$tmpres = mysql_fetch_row($tmpvar);
				$realurls = $tmpres[0];
*/ #
				($row->active) ? ($acmsg='<font color=green>да</font>') : ($acmsg='<font color=red>нет</font>');
				$size = GOO_round_size($row->size);
				$out .= '<tr align=center bgcolor="'.$COLORS[admin_catalog_goods][1].'"><td align=left>'.
				"$space<a href=\"?admin=catalog&id=$row->id\"><img src=\"$IMAGES[folder]\" border=0> ".$row->caption."</a></td><td>".
				$acmsg.'</td><td>'.
				$row->depth.'</td>'.
				'<td>'.$row->groups.'</td>'.
				'<td>'.$row->goods.'(all:'.$allgoods.' urls:'.$realurls.')</td>'.
				'<td>'.$size.'</td><td>'.
				"<a href=\"#\" OnClick=\"javascript:new_win('?admin=catalog&edit=1&id=$row->id')\">Изменить</a></td>".
				"<td><a href=\"?admin=catalog&ident=$row->id\">Распознать</a></td></tr>\n";
			}
		} else {
			#$res = mysql_query("SELECT id,caption,new,goods,groups FROM S_levels WHERE link=$id and active=1
			#						ORDER BY active DESC");
			$res = mysql_query("SELECT * FROM S_levels WHERE link=$id and active=1 $sql_str_sort");
                        while($row = mysql_fetch_object($res)) {
				$z 	     = $row->id;
				$aadded	     = 0;
				$already_msg = '';
				$ac	     = '<td align=center>&nbsp;</td>';
				if($ALREADY["l".$z]) {
					$aadded = 1;
                        	}
				
				if($aadded) $already_msg = " <b>$WORDS[already_added]</b>";

				if($MY[catalog_can_add_levels]) {
					if($aadded) {
					    $ac =   '<td align=center>
						    <img src="'.$IMAGES[catalog_add_level_img_already].'" border=0>
						    </td>';
					} else {
					    if($CURRENT_POSITION=='catalog') {
						    $ac="<td align=center><a href=\"?user=dynamicbasket&level=$z\" ".
                            				'target="myIframe" '.
                            				'OnMouseOver="wstatuslvl()" '.
                            		    		'OnMouseOut="cstatus()" '.
                            		    		"OnClick=\"return chIframe(this);\">".
                            			    '<img src="'.$IMAGES[catalog_add_level_img].'" border=0></a></td>';
					    } else {
						    $ac='<td align=center><a href="#" '.
                                			'OnMouseOver="wstatuslvl()" '.
                                    		        'OnMouseOut="cstatus()" '.
                                    			"OnClick=\"buy_win_lvl($z);return false;\">".
                                    		    '<img src="'.$IMAGES[catalog_add_level_img].'" border=0></a></td>';
					    }
					}
				}
				
                                if($row->level==2)      { $space = '&nbsp; &nbsp; '; }
                                elseif($row->level==3)  { $space = ' &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; '; }
				
				
				$size = GOO_round_size($row->size);
                                $out .= '<tr bgcolor="'.$COLORS[basket_goods][1].'"><td align=left>'.
                                "$space<a href=\"?user=catalog&id=$z\"><img src=\"$IMAGES[folder]\" border=0> ".
				$row->caption."</a>$already_msg</td>".
				'<td align=center>'.$row->groups.'</td>'.
				'<td align=center>'.$row->goods.'</td>'.
				'<td align=center>'.$size.'</td>'.
				$ac.
				"</tr>\n";
                        }
		}
		return $out;
	}



	function CAT_show_prev_levels($isadmin) {
		global $CURR;
		global $IMAGES;
		global $COLORS;
		if($CURR[level]==1) {
			$out = CAT_make_level($isadmin,$CURR[id],1);
		} elseif($CURR[level]==2) {
			$out  = CAT_make_level($isadmin,$CURR[link],1);
			$out .= CAT_make_level($isadmin,$CURR[id],2);
		
		} elseif($CURR[level]==3) {
			$out  = CAT_make_level($isadmin,CAT_get_prev_id($CURR[link]),1);
			$out .= CAT_make_level($isadmin,$CURR[link],2);
			$out .= CAT_make_level($isadmin,$CURR[id],3);
		}

		if($CURR[level]>0) {
			if($isadmin) {
				$root = '<tr bgcolor="'.$COLORS[admin_catalog_goods][1].'"><td align=left><b><a href="?admin=catalog">/</b></td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td>'.
				"<td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td></tr>\n";
			} else {
				$root = '<tr bgcolor="'.$COLORS[basket_goods][1].'"><td align=left><b><a href="?user=catalog"><img src="'.$IMAGES[root_folder].'" border=0> /</b></td><td>&nbsp;</td><td>&nbsp;</td>'.
				'<td>&nbsp;</td><td>&nbsp;</td></tr>'."\n";
			}
		}
		return $root.$out;
	}

	function CAT_make_level($isadmin,$id,$space) {
		global $MY;
		global $WORDS;
		global $ALREADY;
		global $COLORS;
		global $IMAGES;
		global $CURRENT_POSITION;
		if($space==2) { $spaces = ' &nbsp; &nbsp; '; }
		if($space==3) { $spaces = '3 &nbsp; &nbsp; &nbsp; &nbsp; '; }
		if($isadmin) {
			$res = mysql_query("SELECT * FROM S_levels WHERE id=$id");
			$row = mysql_fetch_object($res);
			$size = GOO_round_size($row->size);
			$out .= '<tr align=center bgcolor="'.$COLORS[admin_catalog_goods][1].'"><td align=left>'.$spaces.
			"<b><a href=\"?admin=catalog&id=$row->id".'">'.$row->caption.'</a></b></td><td><b>'.
			$row->active.'</b></td><td><b>'.
			$row->depth.'</b></td><td><b>'.
			$row->groups.'</b></td><td><b>'.
			$row->goods.'</b></td><td><b>'.
			$size.'</b></td><td>'.
			"<b><a href=\"#\" OnClick=\"javascript:".
				"new_win('?admin=catalog&edit=1&id=$row->id')\">Изменить</a></b></td>".
			"<td><b><a href=\"?admin=catalog&ident=$row->id\">Распознать</a></b></td></tr>\n";
		} else {
			#$res = mysql_query("SELECT id,caption,new,goods,groups FROM S_levels WHERE id=$id");
			$res	= mysql_query("SELECT * FROM S_levels WHERE id=$id");
			$row	= mysql_fetch_object($res);
			$z	= $row->id;
			$aadded = 0;
			$ac	= '<td align=center>&nbsp;</td>';
			
			if($ALREADY["l".$z]) {
				$aadded = 1;
                        }
			if($aadded) $already_msg = " <b>$WORDS[already_added]</b>";

			if($MY[catalog_can_add_levels]) {
				if($aadded) {
				    $ac =   '<td align=center>
						<img src="'.$IMAGES[catalog_add_level_img_already].'" border=0>
					    </td>';
				} else {
				    if($CURRENT_POSITION=='catalog') {
					$ac="<td align=center><a href=\"?user=dynamicbasket&level=$z\" ".
                            			'target="myIframe" '.
                            			'OnMouseOver="wstatuslvl()" '.
                            		        'OnMouseOut="cstatus()" '.
                            		        "OnClick=\"return chIframe(this);\">".
                            		    '<img src="'.$IMAGES[catalog_add_level_img].'" border=0></a></td>';
				    } else {
					$ac='<td align=center><a href="#" '.
                            			'OnMouseOver="wstatuslvl()" '.
                            		        'OnMouseOut="cstatus()" '.
                            		        "OnClick=\"buy_win_lvl($z);return false;\">".
                            		    '<img src="'.$IMAGES[catalog_add_level_img].'" border=0></a></td>';
				    }
				}
			}
			
			$size = GOO_round_size($row->size);
			#if(!$MY[can_choose_amount] && $already_msg) $ac = '<td align=center><img src="'.$MY[catalog_add_level_img_already].'" border=0></td>';

			$out .= "<tr bgcolor=\"".$COLORS[basket_goods][1]."\"><td align=left>$spaces".
				"<b><a href=\"?user=catalog&id=$z".'"><img src="'.$IMAGES[folder].'" border=0> '.$row->caption."</a></b>$already_msg</td>".
				'<td align=center>'.$row->groups."</td>".
				'<td align=center>'.$row->goods.'</td>'.
				'<td align=center>'.$size."</td>$ac</tr>\n";
		}

		return $out;

	}

?>
