<?

	function BAS_show_active_basket() {
		global $MY;
		global $WORDS;
		global $IMAGES;
		global $COLORS;
		global $SESSION;
		global $ORDER_INFO;
		$all_items	= 0;
		$all_levels	= 0;
		$all_disks	= 0;
		$all_price 	= 0;
		$allsize  	= 0;
		$order_disks	= 0;
		$order_price	= 0;
		$res		= mysql_query("SELECT id, product_id, amount, level_id FROM S_basket WHERE
										key_id = $SESSION[key_id] and
										active = 1 and
										ready  = 0");
		$i=1;
		$curc=$COLORS[basket_goods][1];
		while($row = mysql_fetch_object($res)) {
			# showing each product in basket
			$size		= 0;
			$mysize		= 0;
			if($row->product_id)	{$g = GOO_get_product_by_id($row->product_id); }
			else 	    		{$g = GOO_get_level_by_id($row->level_id,1); $all_levels++;}
			$size		= $g->size;
			$prod 		= $row->id;
			$all_items	+= $row->amount;
			$lvlid		= 0;

			#$all_price      += $g->new_price*$row->amount;

			if($g->small_image)	{ $img = '<img src="'.$g->small_image.'" border=0>'; }
                       	else			{ $img = '<img src="'.$MY[goods_no_img].'">'; }
			if($row->level_id)	{ $img = '<img src="'.$MY[level_img].'">'; 
						  $lvlid = $row->level_id; }
			# change table color
                        #if($i== 1) {$i=0;$curc=$COLORS[basket_goods][0];}
                        #else       {$i=1;$curc=$COLORS[basket_goods][1];}

			$allsize += $size;
			if(!$MY[hide_basket]) {
				# passing through every product
				$cap_cs = '1';
				if($g->author) {
				    $author = ereg_replace('Автор: ','',$g->author);		# <-- ?!
				    $author = '<td align=center>&nbsp;<a href="mailto:'.$g->email.'">'.$author.'</a></td>';
				} else {
				    $cap_cs = '2';
				    $author = '';
				}
				
				if($MY[can_choose_amount]) {
					$am[am]='<td align=center><input size=2 type="text"'.
						'name="'.$row->product_id.'" value="'.$row->amount.'"></td>';
				}
				$mysize  = GOO_round_product_size($size);
				$out 	.= "<tr bgcolor=$curc><td align=center>$img</td>".
					   '<td colspan='.$cap_cs.'><a href="#" OnClick="info_win('.$g->id.','.$lvlid.');
						return false;">'.$g->caption."</a></td>".
					   $author.
					   "<td align=center>&nbsp;$mysize</td>".
			 		   $am[am].
			 		   '<td align=center><a href="?user=basket&open=1&del='.$prod.'">удалить</a>
						</td></tr>'."\n";
			}
		}
		if(!$MY[hide_basket]) {
			if($all_items>0) {
                	        if($i== 1) {$i=0;$curc=$COLORS[basket_goods][0];}
                        	else       {$i=1;$curc=$COLORS[basket_goods][1];}
				if($MY[can_choose_amount]) {
					$but[refresh] = '<input type="button" value="Обновить" OnClick="this.form.submit();">';
					$am[cs]=5;
				} else {$but[refresh] = '&nbsp;<br>&nbsp;';
					$am[cs]=4;}
				$out .="<tr bgcolor=$curc>".
				       "<td colspan=$am[cs] align=right>$but[refresh]</td>".
				       '<td><a href="?user=basket&delall=1">Удалить все</a></td></tr>';
				$out .= "<tr><td colspan=6></td></tr>";
				if($MY[can_choose_amount]) {
					$am[cap] = '<td width=5%>Кол-во</td>';
				}
				# Basket HEADER
				$tab_head ="<td width=10%>&nbsp;</td>
					    <td>Название</td><td width=7%>Автор</td>
					    <td width=5%>Размер</td>$am[cap]<td width=5%>Действие</td>";
			} else {
				$tab_head = "<td>$WORDS[basket_empty]</td>";
			}
		} else {
			if($all_items>0) {
				$tab_head = "<td align=center>$WORDS[basket_show]</td>".
					    '<td align=center><a href="#" OnClick="new_win(\'?user=basket&brief=1\');'.
						    "return false;\">$WORDS[basket_show_brief]</a></td>".
					    "<td align=center><a href=\"?user=basket&open=1\">$WORDS[basket_show_all]</a></td>";
			} else {
				$tab_head = "<td>$WORDS[basket_empty]</td>";
			}
		}

		# show basket status
		if($all_items>0) {
			for($d=1;$d<=$ORDER_INFO[disks];$d++) {
				if($ORDER_INFO["cd$d"."size"] < $MY[disk_minimum]) {
					$red[0]='<font color=red><b>';$red[1]='</b></font>';
				        $alert	 = '<br>'.$WORDS[disk_minimum].'<br>'.$WORDS[disk_minimum_is].' <b>'.GOO_round_size($MY[disk_minimum]).'</b>';
				} else {
					$order_disks++;
					$red	 = array();
				}
				$disks_info .= "<tr><td align=left>$red[0] &nbsp; &nbsp; $WORDS[disk] $d:$red[1]</td><td>$red[0]<b>".GOO_round_size($ORDER_INFO["cd$d"."size"])."</b>$red[1]</td><tr>";
			}
			if($order_disks) {
				$but='<td align=right colspan=2>&nbsp;
				      <a href="javascript:document.forms[\'order\'].submit();"><img src="images/s1/btn_make_ord.gif" border=0 alt="'.$WORDS[alt_make_order].'"></a> &nbsp;</td>';
			} else {$but='';}
		}
		# if there is one small cd
		if($ORDER_INFO["cd1size"] < $MY[disk_minimum]) {
			$red[0]		='<font color=red><b>';$red[1]='</b></font>';
			$alert		= '<br>'.$WORDS[disk_minimum].'<br>'.$WORDS[disk_minimum_is].' <b>'.GOO_round_size($MY[disk_minimum]).'</b>';
			$disks_info	.= "<tr><td align=left>$red[0] &nbsp; &nbsp; $WORDS[disk] $d:$red[1]</td><td>$red[0]<b>".GOO_round_size($ORDER_INFO["cd$d"."size"])."</b>$red[1]</td><tr>";
		}
				      
	 	$order="<table border=0 align=center width=100% cellpadding=0 cellspacing=0>
			    <tr><td bgcolor=\"$COLORS[basket_goods_ark]\" valign=top>
			    <table border=0 align=center cellpadding=2 cellspacing=1 width=100%>
					<tr bgcolor=\"".$COLORS[basket_goods][0]."\">
					<td>
					<table border=0 width=100% cellpadding=0 cellspacing=0>
					    <tr><td width=35%>
						$WORDS[order_amount_items]:</td><td><b>$ORDER_INFO[items]</b></td></tr>
					    <tr><td>
						$WORDS[order_amount_levels]:</td><td><b>$ORDER_INFO[levels]</b></td></tr>
					    <tr><td>
						$WORDS[order_amount_disks]:</td><td><b>$ORDER_INFO[disks]</b></td></tr>
						$disks_info
					    <tr><td>
						&nbsp;<br><b>$WORDS[order_ready_disks]:</b></td><td>&nbsp;<br><b>$order_disks</td></tr>
					    <tr><td>
						<b>$WORDS[order_ready_size]:</b></td><td><b>".GOO_round_size($ORDER_INFO[size])."</td></tr>
					    <tr><td>
						<b>$WORDS[order_ready_price]:</b></td><td><b>$ORDER_INFO[price] $WORDS[RUB]</td></tr>
					    <tr><td colspan=2>
						$alert</td></tr>
					</table>
					</td>$but</tr>
			    </table>
			    </td></tr>
			</table>";

		return '
<table border=0 align=center width=100% cellpadding=0 cellspacing=0>
<tr><td align=left>
	<img src="'.$IMAGES[panel_basket].'"><img src="'.$IMAGES[empty_center_panel][1].'" height=22 width=450><img src="'.$IMAGES[empty_center_panel][2].'">
</td></tr>

<tr><td>
	<table border=0 align=center width=100% cellpadding=0 cellspacing=0>
		<form method="POST">
		<input type="hidden" name="user"   value="basket">
		<input type="hidden" name="update" value="1">
	
		<tr><td bgcolor="'.$COLORS[basket_goods_ark].'" valign=top>
		<table border=0 align=center cellpadding=2 cellspacing=1 width=100%>
			<tr bgcolor="'.$COLORS[basket_goods][0].'">
			'.$tab_head.'
			</tr>
			'.$out.'
		</table>
		</td></tr>
		</form>
	</table>
<br>
<br>
</td></tr>
<tr><td>
	<img src="'.$IMAGES[panel_order].'"><img src="'.$IMAGES[empty_center_panel][1].'" height=22 width=450><img src="'.$IMAGES[empty_center_panel][2].'">
</td></tr>
<tr><td>
	<form method="POST" name="order">
	<input type="hidden" name="user"  value="basket">
	<input type="hidden" name="order" value="1">
	'.$order.'
	</form>
</td></tr>
</table>
';
	}


?>