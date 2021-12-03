<?
	function ADM_download_html() {
		global $MY;
		global $WORDS;
		global $HTTP_GET_VARS;
		include('mod_admin/admin_order_dig.php');
		include('mod_goods/goods_show.php');
		$IS_HTML = 1;
		$JUST_COUNT = 0;
		#$cd = ADM_make_file($HTTP_GET_VARS[html],$IS_HTML,$JUST_COUNT);
		$cd = ORD_generate($HTTP_GET_VARS[html],$IS_HTML,$JUST_COUNT);
		exit;
	}

?>