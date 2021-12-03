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
				<table cellspacing='.$TABLES_VARS[left_down_cellspacing].' cellpadding='.$TABLES_VARS[left_down_cellpadding].'>
				<tr>
				<td><img src="'.$IMAGES[caption_news].'" align=up></td></tr>
				<tr bgcolor='.$TABLES_VARS[left_down_bgcolor].'><td>'.
				$CONTENT[news_list].'
				</td></tr>
				</table>
				';

    $PARTS[center_up] =	'	
				<table width=100% cellspacing=0 cellpadding=0 border=0>
				    <tr><td align=left>
					<img src="'.$IMAGES[panel_search].'"><img src="'.$IMAGES[empty_center_panel][1].'" height=22 width=285><img src="'.$IMAGES[empty_center_panel][2].'">
				    </td></tr>
				    <tr><td>
					'.$CONTENT[search].'
				    </td></tr>
				</table>
				';



    $PARTS[center_down] = '
				<table width=100% cellspacing=0 cellpadding=0 border=0>
				    <tr><td align=left>
					<img src="'.$IMAGES[panel_results].'"><img src="'.$IMAGES[empty_center_panel][1].'" height=22 width=285><img src="'.$IMAGES[empty_center_panel][2].'">
				    </td></tr>
				    <tr><td>
					'.$CONTENT[search_results].'
				    </td></tr>
				</table>
				';


    $PARTS[right_up] = '
				<table cellspacing='.$TABLES_VARS[right_up_cellspacing].' cellpadding='.$TABLES_VARS[right_up_cellpadding].'>
				<tr>
				<td><img src="'.$IMAGES[caption_top100].'" align=up></td></tr>
				<tr bgcolor='.$TABLES_VARS[right_up_bgcolor].'><td>'.
				$CONTENT[goods_brief].'
				<br></td></tr>
				</table>
				';


    $PARTS[right_down] = '
				<table cellspacing='.$TABLES_VARS[right_down_cellspacing].' cellpadding='.$TABLES_VARS[right_down_cellpadding].'>
				<tr>
				<td><img src="'.$IMAGES[caption_advert].'" align=up></td></tr>
				<tr bgcolor='.$TABLES_VARS[right_down_bgcolor].'><td>'.
				$CONTENT[static_banners].
				'</td></tr>
				</table>
				';




?>
