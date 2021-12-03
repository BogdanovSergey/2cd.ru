<?
		$TABLE[begin]	     =
"<table border=$TABLES_VARS[border] width=$TABLES_VARS[main_width] bgcolor=$TABLES_VARS[main_bgcolor] align=$TABLES_VARS[main_align] cellspacing=$TABLES_VARS[main_cellspacing] cellpadding=$TABLES_VARS[main_cellpadding]>
";
####################
		$TABLE[header_left_begin]  = 
"
\t<tr>
\t<td width=$TABLES_VARS[header1_width] valign=$TABLES_VARS[valign]>
\t\t<table border=$TABLES_VARS[border] width=100% bgcolor=$TABLES_VARS[ADM_header1_bgcolor] align=$TABLES_VARS[header1_align] cellspacing=$TABLES_VARS[header1_cellspacing] cellpadding=$TABLES_VARS[header1_cellpadding]>\t\t<tr><td>
\t\t";
		$TABLE[header_left_end]	   =
"
\t\t</td></tr>
\t\t</table>
\t</td>
";
###################
		$TABLE[header_right_begin]  =
"
\t<td width=$TABLES_VARS[header2_width] valign=$TABLES_VARS[valign]>
\t\t<table border=$TABLES_VARS[border] width=100% bgcolor=$TABLES_VARS[ADM_header2_bgcolor] align=$TABLES_VARS[header2_align] cellspacing=$TABLES_VARS[header2_cellspacing] cellpadding=$TABLES_VARS[header2_cellpadding]>
\t\t<tr><td>
\t\t";
                $TABLE[header_right_end]    =
"
\t\t</td></tr>
\t\t</table>
\t</td>
\t</tr>

";
###################
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
        	        $TABLE[left_up_begin]  !=
"
\t<td width=$TABLES_VARS[left_width] valign=$TABLES_VARS[valign]>
\t\t<table border=$TABLES_VARS[border] width=100% bgcolor=$TABLES_VARS[left_bgcolor] align=$TABLES_VARS[left_align] cellspacing=$TABLES_VARS[left_cellspacing] cellpadding=$TABLES_VARS[left_cellpadding]>
\t\t<tr><td>
\t\t<table border=$TABLES_VARS[border] width=100% bgcolor=$TABLES_VARS[left_up_bgcolor] cellspacing=$TABLES_VARS[left_up_cellspacing] cellpadding=$TABLES_VARS[left_up_cellpadding]>
\t\t<tr><td>
\t\t";
	                $TABLE[left_up_end]    !=
"
\t\t</td></tr>
\t\t</table>
\t\t</td></tr>
";
###################
	                $TABLE[left_down_begin]  !=
"
\t\t<tr><td height=100%>
\t\t<table border=$TABLES_VARS[border] width=100% bgcolor=$TABLES_VARS[left_down_bgcolor] cellspacing=$TABLES_VARS[left_down_cellspacing] cellpadding=$TABLES_VARS[left_down_cellpadding]>
\t\t<tr><td>
\t\t";
	                $TABLE[left_down_end]    !=
"
\t\t</td></tr>
\t\t</table>
\t\t</td></tr>
\t\t</table>
\t</td>
";
###################
	                $TABLE[center_up_begin]  =
"
\t<td valign=$TABLES_VARS[valign]>
\t\t<table border=$TABLES_VARS[border] width=100% bgcolor=$TABLES_VARS[center_bgcolor] align=$TABLES_VARS[center_align] cellspacing=$TABLES_VARS[center_cellspacing] cellpadding=$TABLES_VARS[center_cellpadding]>
\t\t<tr><td>
\t\t<table border=$TABLES_VARS[border] width=100% bgcolor=$TABLES_VARS[center_up_bgcolor] cellspacing=$TABLES_VARS[center_up_cellspacing] cellpadding=$TABLES_VARS[center_up_cellpadding]>
\t\t<tr><td>
\t\t";
	                $TABLE[center_up_end]    =
"
\t\t</td></tr>
\t\t</table>
\t\t</td></tr>
";
###################
	                $TABLE[center_down_begin]  =
"
\t\t<tr><td>
\t\t<table border=$TABLES_VARS[border] width=100% bgcolor=$TABLES_VARS[center_down_bgcolor] cellspacing=$TABLES_VARS[center_down_cellspacing] cellpadding=$TABLES_VARS[center_down_cellpadding]>
\t\t<tr><td>
\t\t";
	                $TABLE[center_down_end]    =
"
\t\t</td></tr>
\t\t</table>
\t\t</td></tr>
\t\t</table>
\t</td>
";
###################
	                $TABLE[right_up_begin]  =
"
\t<td width=$TABLES_VARS[right_width] valign=$TABLES_VARS[valign]>
\t\t<table border=$TABLES_VARS[border] width=100% bgcolor=$TABLES_VARS[right_bgcolor] align=$TABLES_VARS[right_align] cellspacing=$TABLES_VARS[right_cellspacing] cellpadding=$TABLES_VARS[right_cellpadding]>
\t\t<tr><td>
\t\t<table border=$TABLES_VARS[border] width=100% bgcolor=$TABLES_VARS[right_up_bgcolor] cellspacing=$TABLES_VARS[right_up_cellspacing] cellpadding=$TABLES_VARS[right_up_cellpadding]>
\t\t<tr><td>
\t\t";
	                $TABLE[right_up_end]  =
"
\t\t</td></tr>
\t\t</table>
\t\t</td></tr>
";
###################
	                $TABLE[right_down_begin]  =
"
\t\t<tr><td>
\t\t<table border=$TABLES_VARS[border] width=100% bgcolor=$TABLES_VARS[right_down_bgcolor] cellspacing=$TABLES_VARS[right_down_cellspacing] cellpadding=$TABLES_VARS[right_down_cellpadding]>
\t\t<tr><td>
\t\t";
	                $TABLE[right_down_end]    =
"
\t\t</td></tr>
\t\t</table>
\t\t</td></tr>
\t\t</table>
\t</td>
";
###################
			$TABLE[end2]	=
"
</tr>
</table>
";

###################

?>
