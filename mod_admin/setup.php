<?

	include('mod_admin/admin_account.php'); # we must pass through authorization
	$ADMIN[default_login]		=	'admin';
	$ADMIN[default_password]	=	'admin';
	$menu				=	0;

	$ADMIN_BUTTONS['1']		=	array($WORDS[amenu_main],	'mod_admin/admin_start.php');
	$ADMIN_BUTTONS['myinfo']	=	array($WORDS[amenu_admin],	'mod_admin/admin_myinfo.php');
	$ADMIN_BUTTONS['catalog']	=	array($WORDS[amenu_catalog],	'mod_admin/admin_catalog.php');
	$ADMIN_BUTTONS['orders']	=	array($WORDS[amenu_orders],	'mod_admin/admin_orders.php');
	$ADMIN_BUTTONS['users']		=	array($WORDS[amenu_users],	'mod_admin/admin_users.php');
	$ADMIN_BUTTONS['news']		=	array($WORDS[amenu_news],	'mod_admin/admin_news.php');
	$ADMIN_BUTTONS['some']		=	array($WORDS[amenu_some],	'mod_admin/admin_.php');

#	$ADMIN_BUTTONS['']	=	array('','mod_admin/admin_.php');
#	$ADMIN_BUTTONS['']	=	array('','mod_admin/admin_.php');


	if(!isset($PHP_AUTH_USER)) {
		Header('WWW-Authenticate: Basic realm="Secured zone"');
		print " ";
		#include('mod_skins/skin_load.php');
		#include("mod_table/step_index.php");
	} else {
		list($ADMIN[login], $ADMIN[password], $ADMIN[fio], $ADMIN[relay_ip1], $ADMIN[relay_ip2], $ADMIN[relay_ip3], $ADMIN[ask_password]) = ADM_get_admin_account();
		if($PHP_AUTH_USER == $ADMIN[login] &&
		   $PHP_AUTH_PW   == $ADMIN[password]) {
			$ADMIN_CONNECTED=1;
			include('mod_skins/skin_load.php');		# load default skin for admin
			# connect to module which function is executed
			foreach($ADMIN_BUTTONS as $key => $value) {
				if(	($HTTP_GET_VARS[admin]==$key ||
					$HTTP_POST_VARS[admin]==$key ) && $value[1]) { $menu=1; include($value[1]); break; }
			}
			# show default module 
			if(!$menu) { include($ADMIN_BUTTONS['1'][1]); $HTTP_GET_VARS[admin]=1;}
			include('mod_admin/step_all.php');
		} else {
			Header('WWW-Authenticate: Basic realm="Secured zone"');
			include('mod_skins/skin_load.php');
			include("mod_table/step_index.php");
		}
	}

?>