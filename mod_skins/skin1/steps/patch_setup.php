<?
	include("mod_skins/$SKIN_DIR/steps/static_right_down.php");
	include("mod_skins/$SKIN_DIR/steps/static_logo.php");


$PARTS[header_right] =
    '<br>'.$BANNERS[index_header_up].
    $PARTS[header_right];



	$PARTS[left_up] =
'
<table cellspacing='.$TABLES_VARS[left_up_cellspacing].' cellpadding='.$TABLES_VARS[left_up_cellpadding].'>
<tr>
<td><img src="images/s1/cap_atten.gif" align=up></td></tr>
<tr bgcolor='.$TABLES_VARS[left_up_bgcolor].'><td>'.
$PARTS[left_up].
'
</td></tr>
</table>
';

	$PARTS[left_down] =
'
<table cellspacing='.$TABLES_VARS[left_down_cellspacing].' cellpadding='.$TABLES_VARS[left_down_cellpadding].'>
<tr>
<td><img src="images/s1/cap_news.gif" align=up></td></tr>
<tr bgcolor='.$TABLES_VARS[left_down_bgcolor].'><td>'.
$PARTS[left_down].
'
</td></tr>
</table>
';


	$PARTS[right_up] =
'
<table cellspacing='.$TABLES_VARS[right_up_cellspacing].' cellpadding='.$TABLES_VARS[right_up_cellpadding].'>
<tr>
<td><img src="images/s1/cap_best.gif" align=up></td></tr>
<tr bgcolor='.$TABLES_VARS[right_up_bgcolor].'><td>'.
$PARTS[right_up].
'
</td></tr>
</table>
';


	$PARTS[right_down] =
'
<table cellspacing='.$TABLES_VARS[right_down_cellspacing].' cellpadding='.$TABLES_VARS[right_down_cellpadding].'>
<tr>
<td><img src="images/s1/cap_info.gif" align=up></td></tr>
<tr bgcolor='.$TABLES_VARS[right_down_bgcolor].'><td>'.
$PARTS[right_down].
$PARTS[static_right_down].
'
</td></tr>
</table>
';

	$PARTS[center_up] =
'
<table width=100% cellspacing='.$TABLES_VARS[center_up_cellspacing].' cellpadding='.$TABLES_VARS[center_up_cellpadding].'>
<tr>
<td><img src="images/s1/center_panel_small_o.gif" align=up></td></tr>
<tr bgcolor='.$TABLES_VARS[center_up_bgcolor].'><td>'.
$PARTS[center_up].
'what\'s in the setup ???
</td></tr>
</table>
';

	$PARTS[center_down] =
'
<table cellspacing='.$TABLES_VARS[center_down_cellspacing].' cellpadding='.$TABLES_VARS[center_down_cellpadding].'>
<tr>
<td><img src="images/s1/center_panel_small_o.gif" align=up>coolpanel</td></tr>
<tr bgcolor='.$TABLES_VARS[center_down_bgcolor].'><td>'.
$PARTS[center_down].
'1<br>2<br>3<br>4 5 6
</td></tr>
</table>
';




?>
