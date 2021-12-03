<?
	function ADM_show_active_order() {
		global $MY;
		global $WORDS;
		global $IMAGES;
		global $HTML_begin;
		global $HTML_end;
		global $HTTP_GET_VARS;
		global $COLORS;
		include('mod_admin/admin_order_dig.php');
		$user= 0;
		$aa  = 0;
		$ap  = 0;
		$order_size = 0;
		$col0= $COLORS[admin_table_succession][0];
		$col = $COLORS[admin_table_succession][1];
		$ORDER_ID = $HTTP_GET_VARS[order];
		#$res = mysql_query("SELECT * FROM S_orders WHERE order_id=$HTTP_GET_VARS[order] and active=1");
		$res = mysql_query("SELECT * FROM S_orders WHERE order_id=$ORDER_ID");
		# show all products which user has bought
#$o=0;
#$lvls=array();
		while($ord = mysql_fetch_object($res)) {
			if(!$user) { $user=$ord->user_id; }
			# is it product or whole level ?
			if(!$ord->level_id) {
			    # it is product
			    $g	    = GOO_get_product_by_id($ord->product_id);
			    ###$aa    += $ord->amount;
			    $aa++;
			    $ap    += $g->new_price*$ord->amount;
			    $order_size += $g->size;
			    $PROD   = 1;
			    # show goods in order or not ?
			    if($MY[admin_show_goods_in_order]) {
				$ITEM[id]	=	$g->id;
				$ITEM[caption]	=	$g->caption;
				$ITEM[amount]	=	$ord->amount;
				$ITEM[size]	=	$ord->size;
				$ITEM[new_price]=	$g->new_price;
				$ITEM[whole_price]=	$g->new_price*$ord->amount;
			    }
			} else {
			    # it is level
			    # get level information
#		$o++;
			    $tmp = mysql_query("SELECT id,caption,goods,size,link FROM S_levels WHERE id=$ord->level_id");
			    $tres= mysql_fetch_object($tmp);
			    $ITEM[id]		=	$tres->id;
#$lvls = ORD_get_links_from_level($lvls,$tres->id);
#print "$ITEM[id] $tres->caption<br>";
			    $ITEM[caption]	=	$tres->caption;
			    ###$GOODS		=	ADM_order_dig($tres->id);
			    ###$ITEM[amount]	=	$GOODS[amount];
			    $ITEM[amount]	=	$tres->goods;
			    ###$ITEM[new_price]	=	$GOODS[price];
			    ###$ITEM[whole_price]	=	$GOODS[price];
			    ###$ITEM[size]	=	$GOODS[size];
			    $ITEM[size]		=	$tres->size;
			    ###$aa		+= 	$GOODS[amount];
			    $aa			+= 	$tres->goods;
			    ###$ap		+= 	$GOODS[price];
			    ###$order_size	+= 	$GOODS[size];
			    $order_size		+= 	$tres->size;
			    $PROD		= 	0;
			}
			if($MY[admin_show_goods_in_order]) {
			    $ITEM[size] = GOO_round_size($ITEM[size]);
			    $lstr = '';
			    if($ord->level_id) { $lvl=$ITEM[id]; } else { $lvl=0;}
			    if(!$PROD) { $iimg='<img src="'.$IMAGES[folder].'">&nbsp;';}else{$iimg='';}
			    if($tres->link) { $lstr=' &nbsp; &nbsp; '; }
			    $goods .= "<tr bgcolor=\"$col\">
					<td>$lstr$iimg<a href=\"#\" OnClick=\"info_win($ITEM[id],$lvl);\">$ITEM[caption]</a></td>
					<td>$ITEM[amount]</td>
					<td>$ITEM[size]</td>
					<!--<td>$ITEM[new_price]</td>--></tr>";
			}
		}
#print "!!!".sizeof($lvls)."!!!";exit;
		$tmp = mysql_query("SELECT * FROM S_adreses WHERE order_id=$ORDER_ID");
		$adr = mysql_fetch_object($tmp);
		$res2 = mysql_query("SELECT * FROM S_users WHERE id=$user");
		$m    = mysql_fetch_object($res2);
		$user_info	=
				"<tr bgcolor=\"$col\"><td>Фамилия</td>		<td>&nbsp;".$m->last_name."</td></tr>".
				"<tr bgcolor=\"$col\"><td>Имя</td>		<td>&nbsp;".$m->first_name."</td></tr>".
				"<tr bgcolor=\"$col\"><td>Пол</td>		<td>&nbsp;".$m->sex."</td></tr>".
				"<tr bgcolor=\"$col\"><td>Е-мейл</td>		<td>&nbsp;".$m->email."</td></tr>".
				"<tr bgcolor=\"$col\"><td>Телефон</td>		<td>&nbsp;".$m->phone."</td></tr>".
				"<tr bgcolor=\"$col\"><td>Тип организации</td>	<td>&nbsp;".$m->org_type."</td></tr>".
				"<tr bgcolor=\"$col\"><td>$WORDS[reg_city]</td>		<td>&nbsp;".$adr->city."</td></tr>".
				"<tr bgcolor=\"$col\"><td>$WORDS[reg_postindex]</td>	<td>&nbsp;".$adr->postindex."</td></tr>".
				"<tr bgcolor=\"$col\"><td>$WORDS[reg_region]</td>	<td>&nbsp;".$adr->region."</td></tr>".
				"<tr bgcolor=\"$col\"><td>$WORDS[reg_oblast]</td>	<td>&nbsp;".$adr->oblast."</td></tr>".
				"<tr bgcolor=\"$col\"><td>$WORDS[reg_street]</td>	<td>&nbsp;".$adr->street."</td></tr>".
				"<tr bgcolor=\"$col\"><td>Здание</td>			<td>&nbsp;".$adr->building."</td></tr>".
				"<tr bgcolor=\"$col\"><td>Квартира</td>			<td>&nbsp;".$adr->flat."</td></tr>".
				"<tr bgcolor=\"$col\"><td>Корпус</td>			<td>&nbsp;".$adr->korp."</td></tr>".
				"<tr bgcolor=\"$col\"><td>Подъезд</td>			<td>&nbsp;".$adr->entrance."</td></tr>".
				"<tr bgcolor=\"$col\"><td>Этаж</td>			<td>&nbsp;".$adr->flour."</td></tr>".
				"<tr bgcolor=\"$col\"><td>Код</td>			<td>&nbsp;".$adr->code."</td></tr>".
				"<tr bgcolor=\"$col\"><td>Метро</td>			<td>&nbsp;".$WORDS[metro][$adr->metro-1]."</td></tr>".
				"<tr bgcolor=\"$col\"><td>Время звонка</td>		<td>&nbsp;".$adr->cancall_time."</td></tr>".
				"<tr bgcolor=\"$col\"><td>Время доставки</td>		<td>&nbsp;".$adr->deliver_time."</td></tr>".
				"<tr bgcolor=\"$col\"><td>Дополнительно</td>		<td>&nbsp;".$adr->additional."</td></tr>";
		if($MY[admin_show_goods_in_order]) {
		    $goods_tbl_head = "<tr bgcolor=\"$col0\"><td width=50%><b>Название</b></td><td><b>Кол-во</b></td><td><b>Размер</b></td>".
				      "<!--<td><b>Цена</b></td>--></tr>";
		}
		#$cdcount	= ceil($order_size/$MY[disk650_bytes]);
		$order_size	= GOO_round_size($order_size);
		$cdcount	= ORD_generate($ORDER_ID,0,1);
		for($i=1;$i<=$cdcount;$i++) {
			$htmlfile .= "<a href=\"?admin=orders&html=$ORDER_ID&p=$i\">$WORDS[order_get_html_file] $i</a><br>\n";
		}
		$results	=	"<tr bgcolor=\"$col0\"><td><b>ИТОГО</b></td>
					    <td><b>Кол-во всех <font color=red>$aa</font></b></td>
					    <td><b>Размер всех <font color=red>$order_size</font></b></td></tr>
					<tr bgcolor=\"$col0\"><td align=left>
					    <a href=\"?admin=orders&make=$ORDER_ID\">$WORDS[order_get_make_file]</a><br>
					    $htmlfile
					    </td><td colspan=2>&nbsp;</td>
					</tr>";

		print
		$HTML_begin.'
<table border=0 width=100% cellpadding=0 cellspacing=0>
	<tr><td align=left colspan=3>
	<img src="'.$IMAGES[empty_center_panel][0].'"><img src="'.$IMAGES[empty_center_panel][1].'"
		height=22 width=335><img src="'.$IMAGES[empty_center_panel][2].'">
	</td></tr>
	<tr><td bgcolor="'.$COLORS[admin_goods_ark].'" valign=top>
 		<table border=0 align=center cellpadding=2 cellspacing=1 width=100%>
		'.$user_info.'
 		</table>
    </td></tr>
</table><br>

<table border=0 width=100% cellpadding=0 cellspacing=0>
	<tr><td align=left colspan=3>
	<img src="'.$IMAGES[empty_center_panel][0].'"><img src="'.$IMAGES[empty_center_panel][1].'"
		height=22 width=335><img src="'.$IMAGES[empty_center_panel][2].'">
	</td></tr>
	<tr><td bgcolor="'.$COLORS[admin_goods_ark].'" valign=top>
 		<table border=0 align=center cellpadding=2 cellspacing=1 width=100%>'.
		$goods_tbl_head.
		$goods.
		$results.'
 		</table>
    </td></tr>
</table><br>
'.
$HTML_end;

		exit;
	}

?>
