<?


	mysql_connect($DB_host,$DB_login,$DB_password) or die("Can't connect to DB");
	mysql_select_db($DB_database) or die("Can't choose DB");
	if($MY[create_if_absent]) {
		$tmp = @mysql_query("SELECT id FROM S_keys WHERE id<10");
		$res = @mysql_fetch_row($tmp) || DB_create();
	
	}

	function DB_create() {
/*
#		include('mod_admin/admin_reset.php');
#		ADM_reset_all();
#		print "Database created";
*/
	}

?>