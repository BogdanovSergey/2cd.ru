<?

	function ADM_show_edit_level_form() {
		global $TABLES_VARS;
		global $HTTP_GET_VARS;
		global $HTML_begin, $HTML_end;

		print $HTML_begin;
		print 
"
<table align=$TABLES_VARS[main_align] bgcolor=$TABLES_VARS[main_bgcolor] border=$TABLES_VARS[border] width=$TABLES_VARS[ADM_edit_table_width] cellspacing=1 cellpadding=0>
<tr><td>
	<table bgcolor=$TABLES_VARS[ADM_edit_table_bgcolor] width=100% cellspacing=0 cellpadding=0>
	<tr><td>
	<table align=left width=30% bgcolor=$TABLES_VARS[main_bgcolor] cellspacing=0 cellpadding=0><tr><td>
		<table bgcolor=$TABLES_VARS[ADM_edit_table_bgcolor] width=100% cellspacing=0 cellpadding=0>
		<tr><td align=center><br><img src=\"img\"><br>&nbsp;</td></tr></table>
		</td></tr>
		</table>

		<table border=1 width=50% cellspacing=0 cellpadding=0>
		<tr><td>caption</td><td>1</td></tr>	
		<tr><td>activity</td><td>2</td></tr>
		<tr><td></td><td></td></tr>
		<tr><td></td><td></td></tr>
		<tr><td></td><td></td></tr>
		</table>
		
		111 
	</td></tr>
	</table>
</td></tr>
</table>
";
		print $HTML_end;
		exit;
	}





?>
