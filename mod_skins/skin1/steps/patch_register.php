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

    $PARTS[center_up] =		$CONTENT[registration];


    $PARTS[center_down] != '
				<table width=100% cellspacing=0 cellpadding=0 border=0>
				    <tr><td align=left>
					<img src="images/s1/center_panel_0.gif"><img src="images/s1/center_panel_1.gif" height=22 width=285><img src="images/s1/center_panel_2.gif">
				    </td></tr>
				    <tr><td>
					'.$WORDS[index_greeting].'
					'.$PARTS[center_down].'
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