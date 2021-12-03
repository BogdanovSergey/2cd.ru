<?
	# download BAT file for some order
	include('mod_order/order_generate.php');
	include('mod_goods/goods_show_path.php');
	
	if($HTTP_GET_VARS[make]) {
		include('mod_admin/admin_order_file_bat.php');
		ADM_download_bat();
		exit;
	}
	if($HTTP_GET_VARS[html]) {
		include('mod_admin/admin_order_file_html.php');
		ADM_download_html();
		exit;
	}

	if($HTTP_GET_VARS[order]) {
#		include('mod_skins/skin_load.php');
		include('mod_goods/goods_show.php');
		include('mod_admin/admin_order_show.php');
		ADM_show_active_order();

	} elseif($HTTP_GET_VARS[serve]) {
		include('mod_admin/admin_order_serve.php');
		ADM_serve_order();
		$PARTS[center_up] = ADM_show_orders();

	} else {
		$PARTS[center_up] = ADM_show_orders();
	}

	function ADM_show_orders() {
		global $MY;
		global $IMAGES;
		global $COLORS;
		global $ORDER_INFO;
		include("mod_user/user_get.php");
		$res = mysql_query("SELECT DISTINCT order_id FROM S_orders ORDER BY active DESC, order_id DESC");
		while($row = mysql_fetch_row($res)) {
			$i	= 0;
			$us	= 0;
			$us->order_id=0;
			# count each purchase in this order
			$res2 = @mysql_query("SELECT * FROM S_orders WHERE order_id=$row[0]");
			while($ord = @mysql_fetch_object($res2)) {
				# get user info
				if(!$i) {	$us = USE_get_user_by_order($row[0]);$i=1;
						$us->order_id=$ord->order_id;
						$order->active=$ord->active;
						$order->order_time=$ord->order_time;
				} else {
## last comments
					break;
				}
			}
			if($order->active) { 	$active  = '<font color="#00aa00"><b>Активен</b></font>';
				    		$actbutt = '<a href="?admin=orders&serve='.$row[0].'">Обслужить</a>'; }
			else 	  { 	$active  = '<font color="#aa0000"><b>Неактивен</b></font>';
				    	$actbutt = '<b>Обслужен</b>'; }
			# count order info
			$cd = ORD_generate($us->order_id,0,1);
			
			$out .= '<tr bgcolor="'.$COLORS[admin_table_succession][1].
				"\"><td>$us->order_id</td>".
				"<td>$active</td>".'
				<td><a href="#" Onclick="ord_win('.$us->order_id.');">&nbsp;'.$us->first_name.' '.$us->last_name." </></td>
				<td>$ORDER_INFO[items]</td>
				<td>$ORDER_INFO[disks]</td>
				<td>$ORDER_INFO[price]</td>
				<td>".GOO_round_size($ORDER_INFO[size])."</td>
				<td><font size=-2>$order->order_time</font></td>
				<td>$actbutt</td>
				</tr>";
		}
		$head ='<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td>id</td><td>Активность</td><td>От кого</td><td>Файлов</td><td>Дисков</td><td>Цена</td><td>Масса</td><td>Дата заказа</td><td>Действие</td></tr>';
		return '<br>
		<table border=0 width=100% cellpadding=0 cellspacing=0>
			<tr><td align=left colspan=3>
			<img src="'.$IMAGES[panel_catalog].'"><img src="'.$IMAGES[empty_center_panel][1].'"
				height=22 width=610><img src="'.$IMAGES[empty_center_panel][2].'">
			</td></tr>
			<tr><td bgcolor="'.$COLORS[admin_goods_ark].'" valign=top>
		 		<table border=0 align=center cellpadding=2 cellspacing=1 width=100%>
				'.$head.$out.'
 				</table>
			</td></tr>
		</table><br>
		';
	}
?>
