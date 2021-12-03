<?


	function ADM_catalog_auth_product() {
		global $WORDS;
		global $TABLES_VARS;
		global $HTTP_GET_VARS;
		global $HTML_begin, $HTML_end;
		
		$id = $HTTP_GET_VARS[auth_product];
		
		$tmpvar = mysql_query("SELECT active,caption FROM S_goods WHERE id=$id");
		$tmpres = mysql_fetch_object($tmpvar);
		if($tmpres->active) {
			$active = 0;
			$str	= "<font color=\"red\"><b>$WORDS[product_closed]</b></font>";
		} else {
			$active = 1;
			$str	= "<font color=\"green\"><b>$WORDS[product_opened]</b></font>";
		}
		#mysql_query("UPDATE S_goods SET tested=$tested WHERE id=$id and size IS NOT NULL and real_url IS NOT NULL");
		mysql_query("UPDATE S_goods SET active=$active,tested=$active WHERE id=$id");
		print $HTML_begin;
		print
"
<table>
	<tr><td>$tmpres->caption</td></tr>
	<tr><td>$str</td></tr>
</table>
";
		
		print $HTML_end;
		exit;
	
	}





?>