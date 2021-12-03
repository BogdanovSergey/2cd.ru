<?

	include('mod_setup/setup.php');
	include('mod_db/setup.php');
	include('mod_admin/admin_account.php'); # we must pass through authorization
	
	if(!isset($PHP_AUTH_USER)) {
		Header('WWW-Authenticate: Basic realm="secured zone"');
		print ' ';
	} else {
		$access = ADM_test_admin_account($PHP_AUTH_USER,$PHP_AUTH_PW);
		if($access) {
			JS_show();
		} else {
			Header('WWW-Authenticate: Basic realm="secured zone"');
			print ' ';
		}
	}
	exit;

	function JS_show() {
		print 
'

	function auth_win(p) {
		var to = "?auth_product="+p+"&admin=catalog";
		window.open(to,"auth_win","resizable=1,scrollbars=1,toolbar=0,width=200,height=200");
		return false;
	}

	function edit_win(p,id) {
		var to = "?edit_product="+p+"&admin=catalog";
		window.open(to,"edit_win"+p,"resizable=1,scrollbars=1,toolbar=0,width=550,height=550");
		return false;
	}

	function ord_win(ordid) {
		var to = "?admin=orders&order="+ordid;
		window.open(to,"ord_win"+ordid,"resizable=1,scrollbars=1,toolbar=0,width=500,height=550");
		return false;
	}




';

	}

?>
