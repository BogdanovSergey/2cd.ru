<?







	function NEW_show_archive() {
		global $PARTS;
		global $HTTP_GET_VARS;
		$res = mysql_query("SELECT * FROM S_news WHERE id='$HTTP_GET_VARS[news]'");
		$n   = mysql_fetch_object($res);
		$PARTS[center_up] = 'here is list of all news';
		return NEW_show_all();

	}





?>
