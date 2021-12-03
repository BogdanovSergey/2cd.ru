<?
	function GOO_show_goods($isadmin) {
		global $MY;
		global $CURR;
		global $COLORS;
		global $SHOWN;
		global $WORDS;
		global $ALREADY;
		global $ALL_GOODS;
		global $HTTP_COOKIE_VARS;
		global $HTTP_GET_VARS;
		$cut = $MY[cut_goods_descr];	#<-- length of description chars
		if($HTTP_COOKIE_VARS[amount]) 	{ $amount =	$HTTP_COOKIE_VARS[amount];	}
		if($HTTP_GET_VARS[amount]) 	{ $amount =	$HTTP_GET_VARS[amount];		}
		if($HTTP_COOKIE_VARS['sort']==1 || $HTTP_GET_VARS['sort']==1) {
			$sql_str_sort = 'ORDER BY size DESC';
		} else {
			$sql_str_sort = 'ORDER BY caption ASC';
		}
#		print "c$HTTP_COOKIE_VARS[sort] g$HTTP_GET_VARS[sort]<br>$sql_str_sort";exit;
		$start	= $HTTP_GET_VARS[start];
		$ALL_GOODS = CAT_count_all($HTTP_GET_VARS[id],$isadmin);
		if(!$amount) { $amount 	= $MY[goods_per_page]; }
		if(!$start)  { $start  	= 0; }
		if(!$isadmin){ $activ	= ' and active=1 and cd_number>0 '; }
	# we want to know the range of shown goods
		$SHOWN[goods_amount]	= 0;
		$SHOWN[chosen_amount]	= $amount;
		$curc=$COLORS[catalog_goods][0];
		$res=mysql_query("SELECT * FROM S_goods WHERE link=$CURR[id] $activ $sql_str_sort LIMIT $start,$amount");
		while($row = mysql_fetch_object($res)) {
			$cursize = 0;
			$added	 = 0;
			$SHOWN[goods_amount]++;

			$cursize = GOO_round_product_size($row->size);
			$z = $row->id;
			if(strlen($row->description)>$cut) { $description = substr($row->description,0,$cut).'...';}
			else { $description = $row->description; } 				# cutting description
	# if item is already in basket, show message
			if($ALREADY["p$z"] ||
			   $ALREADY["l".$row->link]) {
				if(!$ALREADY["p$z"]) { $ALREADY["p$z"]=1; }
				$added = 1;
			}

	# change colors
			#if($i== 1) {$i=0;$curc=$COLORS[catalog_goods][1];}
			#else 	   {$i=1;$curc=$COLORS[catalog_goods][0];}
			
			$out .= GOO_show_item_in_table($z, $added, $row->caption, $curc, $row->about_url, $row->author, $row->email, $cursize, $row->new_price, $row->small_image,$description,0,0);
		}
		return "<form name=\"goodslist\">
			<script>ff = document.forms['goodslist'];</script>
			$out
			</form>\n";
	}

	function GOO_show_item_in_table($id,$added,$caption,$bgcolor,$about,$author,$email,$size,$price,$small_image,$description,$rating,$show_path) {
		global $MY;
		global $WORDS;
		global $COLORS;
		global $IMAGES;
		global $CURRENT_POSITION;
		if($about) { $abouturl = $WORDS[go_to_site][0]."<a href=\"$about\" target=\"_parent\">".$WORDS[go_to_site][1]."</a>"; }
		if($email) { $author = "<a href=\"mailto:$email\">$author</a>"; }
		$price = "$price";
		$size  = "$WORDS[size]: $size";
		if($added) {
			$already_msg = "<br><b>$WORDS[already_added]</b>";
			$addimage    = '<td align=center><img src="'.$IMAGES[catalog_add_level_img_already].'" border=0></td>';
		}
		if($show_path) {
			$path = "<tr bgcolor=$bgcolor><td colspan=4 align=right>&nbsp;".GOO_show_path($id,0)."</td></tr>";
			
		}
		if($MY[can_choose_amount])
			{ $am = '<td valign=top><input size=2 type="text" name="a'.$id.'" value="1"></tr>'; }
		else 	{ $am = '<input type="hidden" name="a'.$id.'" value="1">'; }
		if($MY[goods_add_show_img] && !$added) {
			if($CURRENT_POSITION=='catalog') {
			    $addimage = "<td align=center><a href=\"?user=dynamicbasket&item=$id\" ".
					'OnMouseOver="wstatus()" '.
					'OnMouseOut="cstatus()" '.
					'target="myIframe" '.
					"OnClick=\"return chIframe(this);\">".
					'<img src="'.$MY[goods_add_img].'" border=0></a></td>';
			
			} else {
			    $addimage = '<td align=center><a href="#" '.
					'OnMouseOver="wstatus()" '.
					'OnMouseOut="cstatus()" '.
					"OnClick=\"buy_win($id,ff.a$id);return false;\">".
					'<img src="'.$MY[goods_add_img].'" border=0></a></td>';
			}
		} #else 	{ $addimage = ''; }
		if($rating) $rate_msg = "<b>&nbsp;$WORDS[rating] - $rating</b>";
		$out .=
		    "<table border=0 align=center width=100% cellpadding=0 cellspacing=0>".
		    "<tr><td bgcolor=\"$COLORS[catalog_goods_ark]\" valign=top>".
		    "<table border=0 align=center cellpadding=2 cellspacing=1 width=100%>".
			"<tr bgcolor=$bgcolor>".
			    '<td align=center colspan=4><b><a href="/#" OnClick="info_win('.$id.');return false;">'."$caption</a></b> $rate_msg $already_msg</td></tr>".
			"<tr bgcolor=$bgcolor>".
			    "<td align=left>&nbsp;$WORDS[author]: $author</td>".
#				"<td align=left>&nbsp;$abouturl</td>".
			    "<td align=left>&nbsp;$price</td>".
			    "<td align=left>&nbsp;$size</td>".
			    "$am$addimage</tr>".
			"<tr bgcolor=$bgcolor><td colspan=4>&nbsp;$description</td></tr>
			$path
		    </table>".
		    "</td></tr>".
		    "</table><br>&nbsp;<br>";
		return $out;
	}

	function GOO_get_cd_folder($id) {
		# let's get the folder on CD
	        $tt	= mysql_query("SELECT id,link FROM S_levels WHERE id=$id and active=1");
		$ttres	= mysql_fetch_object($tt);
		if($ttres->link>0) {
			$out = "idx$ttres->link";
		} else {
			$out = "idx$ttres->id";
		}
		return $out;
	}

	function GOO_get_product_by_id($id) {
		global $ADMIN_CONNECTED;
		if(!$ADMIN_CONNECTED) $a='and active=1';
		$res = mysql_query("SELECT * FROM S_goods WHERE id=$id $a");
		$row = mysql_fetch_object($res);
		return $row;
	}
	function GOO_get_active_product_by_id($id) {
		$res = mysql_query("SELECT * FROM S_goods WHERE id=$id and active=1");
		$row = mysql_fetch_object($res);
		return $row;
	}
	function GOO_get_product_caption_by_id($id) {
		global $ADMIN_CONNECTED;
		if(!$ADMIN_CONNECTED) $a='and active=1';
		$res = mysql_query("SELECT caption FROM S_goods WHERE id=$id $a");
		$row = mysql_fetch_object($res);
		return $row->caption;
	}

	function GOO_get_level_by_id($id, $advanced) {
		global $ADMIN_CONNECTED;
		if(!$ADMIN_CONNECTED) { $a = "and active=1"; }
		$res = mysql_query("SELECT * FROM S_levels WHERE id=$id $a");
		$row = mysql_fetch_object($res);

		# get cd numbers, 2 STEPS ONLY
		$sql_s = "link=$id";
		$tmp = mysql_query("SELECT id FROM S_levels WHERE link=$id and active=1");
		while($tmprow = mysql_fetch_object($tmp)) {
			$sql_s .= " or link=$tmprow->id";
		}
		$tmp = mysql_query("SELECT DISTINCT(cd_number) FROM S_goods WHERE active=1 and ($sql_s)");
		while($tmprow = mysql_fetch_row($tmp)) {
			$cds .= "$tmprow[0] ";
		}
		$row->cd_number = $cds;
		if($advanced) {
			$inside_amount	= 0;
			$all_prices	= 0;
			$res2 = @mysql_query("SELECT new_price FROM S_goods WHERE link=$id $a");
			while($row2 = @mysql_fetch_row($res2)) {
				$inside_amount++;
				$all_prices += $row2[0];	
			}
			$row->new_price		= $all_prices;
			$row->inside_amount	= $inside_amount;
			#$row->cd_number	= $cds;
		}
		return $row;
	}


	function GOO_get_item_size($item,$id) {
		if($item) {
			$tmpvar = mysql_query("SELECT size FROM S_levels WHERE id=$id");
			$tmpres = mysql_fetch_object($tmpvar);
			return $tmpres->size;
		} else {
			$tmpvar = mysql_query("SELECT size FROM S_goods WHERE id=$id");
			$tmpres = mysql_fetch_object($tmpvar);
			return $tmpres->size;
		}
	}
?>
