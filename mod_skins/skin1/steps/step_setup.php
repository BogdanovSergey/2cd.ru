<?
		include("mod_skins/skin1/steps/part_left_up.php");
		include("mod_skins/skin1/steps/part_left_down.php");
		include("mod_skins/skin1/steps/part_header_left.php");
		include("mod_skins/skin1/steps/part_header_right.php");
                include("mod_skins/skin1/steps/part_right_up.php");
                include("mod_skins/skin1/steps/part_right_down.php");
		include("mod_skins/skin1/steps/part_center_up.php");
                include("mod_skins/skin1/steps/part_center_down.php");


		$TABLE[begin]	     =
"<table border=$TABLES_VARS[border] width=$TABLES_VARS[main_width] bgcolor=$TABLES_VARS[main_bgcolor] align=$TABLES_VARS[main_align] cellspacing=$TABLES_VARS[main_cellspacing] cellpadding=$TABLES_VARS[main_cellpadding]>
".'<tr><td colspan=2><img src="images/s1/head_l.gif" align=up><img src="images/s1/head_c.gif" height=19 width=230 align=up><img src="images/s1/head_cap.gif" align=up><img src="images/s1/head_c.gif" align=up height=19 width=245><img src="images/s1/head_r.gif" align=up></td></tr>
';
####################
		$TABLE[header_bottom_begin] =
"
\t<tr>
\t<td width=$TABLES_VARS[header_bottom_width] valign=$TABLES_VARS[valign] colspan=2>
\t\t<table border=$TABLES_VARS[border] width=100% bgcolor=$TABLES_VARS[header_bottom_bgcolor] align=$TABLES_VARS[header_bottom_align] cellspacing=$TABLES_VARS[header_bottom_cellspacing] cellpadding=$TABLES_VARS[header_bottom_cellpadding]>
\t\t<tr><td>
\t\t";
###################
		$TABLE[header_bottom_end] =
"
\t\t</td></tr>
\t\t</table>
\t</td>
\t</tr>
";
###################
		$TABLE[end]          =
' 
</table>
';

###################
			$TABLE[begin2] =
"
<table border=$TABLES_VARS[border] width=$TABLES_VARS[main2_width] bgcolor=$TABLES_VARS[main2_bgcolor] align=$TABLES_VARS[main2_align] cellspacing=$TABLES_VARS[main2_cellspacing] cellpadding=$TABLES_VARS[main2_cellpadding]>
<tr>
";
###################
			$TABLE[end2]	=
"
</tr>
</table>
";

###################


?>
