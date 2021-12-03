<?

	function GOO_show_goods_for_admin() {
		global $MY;
		global $CURR;
		global $WORDS;
		global $SHOWN;
		global $COLORS;
		global $IMAGES;
		global $ALL_GOODS;
		global $HTTP_GET_VARS;
		global $QUERY_STRING;
		global $HTTP_COOKIE_VARS;
		$all	= 0;
		if($HTTP_COOKIE_VARS[amount])   { $amount = $HTTP_COOKIE_VARS[amount]; }
                if($HTTP_GET_VARS[amount])      { $amount = $HTTP_GET_VARS[amount]; }
		$start	= $HTTP_GET_VARS[start];
		$dest	= $HTTP_GET_VARS[dest];
		$ALL_GOODS = CAT_count_all($HTTP_GET_VARS[id],1);
		
		if(!$amount) { $amount 	= $MY[goods_per_page]; }
		if(!$start)  { $start  	= 0;  }

		# we want to know the range of shown goods
                $SHOWN[goods_amount]    = 0;
                $SHOWN[chosen_amount]   = $amount;
		
		$res=mysql_query("SELECT * FROM S_goods WHERE link=$CURR[id] ORDER BY id LIMIT $start,$amount");
		while($row = mysql_fetch_object($res)) {
			$SHOWN[goods_amount]++;
			
			
			# calculating colors
			if	($row->active && $row->tested)
						{ $activ[0] = '<font color="#00BB00"><b>'; $activ[1] = '</b></font>';
						  $opw = 'Закр'; }
			elseif	(!$row->active || !$row->tested)
						{ $activ[0] = '<font class="goods_list" color="#0000CC"><b>'; $activ[1] = '</b></font>';
						  $opw = 'Откр'; }
			if(!$row->active && !$row->tested) { $activ[0] = '<font class="goods_list" color="#CC0000"><b>'; $activ[1] = '</b></font>';
						  $opw = 'Откр'; }
			############
			

			if($row->small_image) 	{ $img  = '<img src="'.$row->small_image.'" border=0>'; }
			else 			{ $img  = '<img src="'.$MY[goods_no_img].'" border=0>'; }

			if($MY[goods_add_show_amount]) 
				{ $amount = '<td><input size=2 type="text" name="a'.$row->id.'" value="1"></tr>'; }
			else 	{ $amount = ''; }
			if($MY[goods_add_show_img])
				{ $z = $row->id;
					$addimage = '<td><a href="#" '. "OnClick=\"buy_win($z,ff.a$z);return false;\">".
					'<img src="'.$MY[goods_add_img].'" border=0></a></td>'; }
			else 	{ $addimage = ''; }
			
			# change colors
			if($i== 1) {$i=0;$curc=$COLORS[catalog_goods][0];}
			else	   {$i=1;$curc=$COLORS[catalog_goods][1];}
			
			if($row->size) 	  { $mysize 	= GOO_round_product_size($row->size); } else { $mysize =''; }
			if($row->real_url){ $gotourl	= "<a href=\"$row->real_url\">=&gt;</a>"; 		} else { $gotourl=''; }
			
			if($row->found==3)	{ $debug_str = 'ok';		}
			elseif($row->found==2)  { $debug_str = 'no size';	}
			elseif($row->found==1)  { $debug_str = 'not found';	}			
			else 			{ $debug_str = '?'; 		}
			
			$out .= '<tr bgcolor='.$curc.'><td align=center>
				<font class="goods_list">'.$activ[0].$row->id.$activ[1].'</font></td>'.
				'<td><font class="goods_list"><a href="#" OnClick="info_win('.$row->id.');return false;">'.$row->caption."</font></td>".
				'<td><font class="goods_list">&nbsp;'.$mysize.'</font></td>'.
				'<td><font class="goods_list">&nbsp;'.$gotourl.'&nbsp;'.$row->real_url.'</font></td>'.
				'<td><font class="goods_list">&nbsp;'.$row->cd_number.'</font></td>'.
				'<td><font class="goods_list">&nbsp;'.$debug_str.'</font></td>'.
				'<td align=center><font class="goods_list">'.
				' <a href="#" OnClick="auth_win('.$row->id.');return false;">'.$opw.'</a>&nbsp;'.
				' <a href="#" OnClick="edit_win('.$row->id.');return false;">Измен</a>&nbsp;'.
				' <a href="?admin=catalog&id='.$HTTP_GET_VARS[id].'&del='.$row->id.'">Удал</a></font></td>'.
				"</tr>\n";
		}
		if($SHOWN[goods_amount]) {
			return 
'<table border=0 width=100% cellpadding=0 cellspacing=0>
	<tr><td align=left colspan=3>
	<img src="'.$IMAGES[empty_center_panel][0].'"><img src="'.$IMAGES[empty_center_panel][1].'"
		height=22 width=800><img src="'.$IMAGES[empty_center_panel][2].'">
	</td></tr>
	<tr><td bgcolor="'.$COLORS[admin_goods_ark].'" valign=top>
 		<table border=0 align=center cellpadding=2 cellspacing=1 width=100%>
			'."
			<form name=\"goodslist\">
			<script>ff = document.forms['goodslist'];
			</script>
			<tr bgcolor=\"$COLORS[admin_table_header]\">
			<td>ID</td>
			<td width=20%>Название</td>
			<td>Размер</td>
			<td>Реальный url</td>
			<td>Диск</td>
			<td>Debug</td>
			<td>Действие</td>
			</tr>
			$out
			</form>
			
 		</table>
    </td></tr>
</table><br>
";
		}
	}






?>
