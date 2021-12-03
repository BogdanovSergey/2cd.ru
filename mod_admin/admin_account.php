<?




	function ADM_get_admin_account() {
		$res = mysql_query('SELECT login,password,fio,relay_ip1,relay_ip2,relay_ip3,ask_password FROM S_admin');
		$row = mysql_fetch_object($res);
		return array($row->login, $row->password, $row->fio, $row->relay_ip1, $row->relay_ip2, $row->relay_ip3, $row->ask_password);
	}

	function ADM_test_admin_account($l,$p) {
		$res = mysql_query("SELECT login,password FROM S_admin") or die('err');
		$row = mysql_fetch_row($res);
		if($l==$row[0] && $p==$row[1]) {
			return 1;
		} else {
			return 0;
		}
	}






?>
