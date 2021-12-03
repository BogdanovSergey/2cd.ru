<?
    include("mod_skins/$SKIN_DIR/steps/static_right_down.php");
    include("mod_skins/$SKIN_DIR/steps/static_logo.php");
	
	
    $PARTS[header_right] =
				$BANNERS[index_header_up];


    $PARTS[left_up] != '
				<table cellspacing='.$TABLES_VARS[left_up_cellspacing].' cellpadding='.$TABLES_VARS[left_up_cellpadding].'>
				<tr>
				<td><img src="images/s1/cap_atten.gif" align=up></td></tr>
				<tr bgcolor='.$TABLES_VARS[left_up_bgcolor].'><td>'.
				$CONTENT[user_auth_form].'
				</td></tr>
				</table>
				';

    $PARTS[left_down] != '
				<table cellspacing='.$TABLES_VARS[left_down_cellspacing].' cellpadding='.$TABLES_VARS[left_down_cellpadding].'>
				<tr>
				<td><img src="images/s1/cap_news.gif" align=up></td></tr>
				<tr bgcolor='.$TABLES_VARS[left_down_bgcolor].'><td>'.
				$CONTENT[news_list].'
				</td></tr>
				</table>
				';

    $PARTS[center_up] =	'
				<table width=100% cellspacing=0 cellpadding=0 border=0>
				    <tr><td align=left>
					<img src="'.$IMAGES[panel_catalog].'"><img src="'.$IMAGES[empty_center_panel][1].'"
					height=22 width=390><img src="'.$IMAGES[empty_center_panel][2].'">
				    </td></tr>
				    <tr><td align=center>'.
					$CONTENT[catalog].'
				    </td></tr>
				</table>
				';


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

$PARTS[right_up] =
'
<script language="JavaScript" type="text/javascript">
    function chIframe(lnk) {
	if(document.layers){
	    if(document.layers[lnk.target]) {
		if(document.layers[lnk.target].origX==undefined) {
		    document.layers[lnk.target].origX='.$DESIGN[cat_iframe_x].'
		    document.layers[lnk.target].pageX;
		    document.layers[lnk.target].origY='.$DESIGN[cat_iframe_y].'
		    document.layers[lnk.target].pageY;
		}
		with (document.layers[lnk.target]) {
		    left=origX;
		    clip.left=-origX;
		    top=origY;
		    clip.top=-origY;
		    src=lnk.href;
		}
	    }
	    return false;
	} else return true;
    }	
</script>
<table width=100% cellspacing=0 cellpadding=0 border=0>
    <tr><td align=left>
	<img src="'.$IMAGES[panel_order].'"><img src="'.$IMAGES[empty_center_panel][1].'"
	height=22 width=85><img src="'.$IMAGES[empty_center_panel][2].'">
    </td></tr>
    <tr bgcolor="'.$COLORS[table_arc].'"><td align=center>
	    	<table border=0 align=center cellpadding=2 cellspacing=1 width=100% height=370 valign=top>
		<tr bgcolor="#ffffff"><td valign=top>
		    '.$WORDS[user_basket].' &nbsp; <a href="?user=dynamicbasket" target="myIframe" onClick="return chIframe(this);">'.$WORDS[refresh].'</a><br>
		    <iframe name="myIframe" src="?user=dynamicbasket" width=100% height=100% frameborder=0>
	    		<div id="myIframe" style="position:relative; visibility:visible; width:X;height:Y;">
			    '.$WORDS[no_layers_support_empty].'
			</div>
		    </iframe>
		</td></tr>
 		</table>

    </td></tr>
</table>
';
/*    $PARTS[right_up] != '
				<table cellspacing='.$TABLES_VARS[left_up_cellspacing].' cellpadding='.$TABLES_VARS[left_up_cellpadding].'>
				<tr>
				<td><img src="images/s1/cap_atten.gif" align=up></td></tr>
				<tr bgcolor='.$TABLES_VARS[left_up_bgcolor].'><td>'.
				$CONTENT[user_auth_form].'
				</td></tr>
				</table>
				';
*/

    $PARTS[right_down] != '
				<table cellspacing='.$TABLES_VARS[right_up_cellspacing].' cellpadding='.$TABLES_VARS[right_up_cellpadding].'>
				<tr>
				<td><img src="images/s1/cap_best.gif" align=up></td></tr>
				<tr bgcolor='.$TABLES_VARS[right_up_bgcolor].'><td>'.
				$CONTENT[goods_brief].'
				<br></td></tr>
				</table>
				';




?>
