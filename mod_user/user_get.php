<?


	function USE_get_user_by_keyid() {
		global $SESSION;
		if($SESSION[is_open] && $SESSION[user_id]) {
			$res = mysql_query("SELECT * FROM S_users WHERE id=$SESSION[user_id]");
			$row = mysql_fetch_object($res);
		}
		return $row;
	}

	function USE_get_user_by_order($order) {
		$res = mysql_query("SELECT user_id FROM S_orders WHERE order_id=$order");
		$row = mysql_fetch_object($res);
		$res = mysql_query("SELECT * FROM S_users WHERE id=$row->user_id");
		$row = mysql_fetch_object($res);
		return $row;
	}

?>
