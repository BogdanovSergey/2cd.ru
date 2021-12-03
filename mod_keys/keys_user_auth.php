<?
	function KEY_test_user_password() {
		global $SESSION;
		global $HTTP_POST_VARS;
		$res = @mysql_query("SELECT id FROM S_users WHERE
					email='$HTTP_POST_VARS[i1]' and passwd='$HTTP_POST_VARS[i2]'");
		$row = @mysql_fetch_row($res);
		if($row[0]>0) {
			mysql_query("UPDATE S_keys SET is_open=1, user_id=$row[0] WHERE id=$SESSION[key_id]")
			|| die('cant open account by login and password');
			$SESSION[is_open] = 1;
			USE_refresh_order;
		}
	}
	
	function KEY_close_user_session() {
		global $SESSION;
		mysql_query("UPDATE S_keys SET is_open=0 WHERE id=$SESSION[key_id]")
		|| die('cant close user session');
		USE_refresh_order;
	}


?>