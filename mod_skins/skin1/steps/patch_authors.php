<?
    include("mod_skins/$SKIN_DIR/steps/static_right_down.php");
    include("mod_skins/$SKIN_DIR/steps/static_logo.php");
	
	
    $PARTS[header_right] =
				$BANNERS[index_header_up];


    $PARTS[left_up] = '
				<table cellspacing='.$TABLES_VARS[left_up_cellspacing].' cellpadding='.$TABLES_VARS[left_up_cellpadding].'>
				<tr>
				<td><img src="'.$IMAGES[caption_info].'" align=up></td></tr>
				<tr bgcolor='.$TABLES_VARS[left_up_bgcolor].'><td>'.
				$CONTENT[user_auth_form].'
				</td></tr>
				</table>
				';

    $PARTS[left_down] = '
				<table width='.$TABLES_VARS[left_width].' cellspacing='.$TABLES_VARS[left_down_cellspacing].' cellpadding='.$TABLES_VARS[left_down_cellpadding].'>
				<tr>
				<td><img src="'.$IMAGES[caption_news].'" align=up></td></tr>
				<tr bgcolor='.$TABLES_VARS[left_down_bgcolor].'><td>'.
				$CONTENT[news_list].'
				</td></tr>
				</table>
				';

    $PARTS[center_down] =		$CONTENT[new_goods];


    $PARTS[center_up] = '
				<!--<table width=100% cellspacing=0 cellpadding=0 border=0>
				    <tr><td align=left>
					<img src="'.$IMAGES[empty_center_panel][0].'"><img src="'.$IMAGES[empty_center_panel][1].'" height=22 width=448><img src="'.$IMAGES[empty_center_panel][2].'">
				    </td></tr>
				    <tr><td>
				-->	'.$CONTENT[authors].'
				<!--  </td></tr>
				</table> -->
				';


    $PARTS[right_up] != '
				<table cellspacing='.$TABLES_VARS[right_up_cellspacing].' cellpadding='.$TABLES_VARS[right_up_cellpadding].'>
				<tr>
				<td><img src="images/s1/cap_best.gif" align=up></td></tr>
				<tr bgcolor='.$TABLES_VARS[right_up_bgcolor].'><td>'.
				$CONTENT[goods_brief].'
				<br></td></tr>
				</table>
				';


    $PARTS[right_down] != '
				<table cellspacing='.$TABLES_VARS[right_down_cellspacing].' cellpadding='.$TABLES_VARS[right_down_cellpadding].'>
				<tr>
				<td><img src="images/s1/cap_info.gif" align=up></td></tr>
				<tr bgcolor='.$TABLES_VARS[right_down_bgcolor].'><td>'.
				$CONTENT[static_banners].
				'</td></tr>
				</table>
				';




?>