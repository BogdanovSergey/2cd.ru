<? 
	$CURRENT_POSITION	= 	'basket';
	$TITLE			= 	$WORDS[title_basket];
	$DESCRIPTION 		= 	$WORDS[description_basket];
	$KEYWORDS 		= 	$WORDS[keywords_basket];
	if($HTTP_GET_VARS[item] && $HTTP_GET_VARS[am]) {
		$BODY_ONLOAD	= "close_win();";
		include('mod_skins/skin_load.php');
		include('mod_basket/basket_add_product.php');
		BAS_add($HTTP_GET_VARS[item], $HTTP_GET_VARS[am],1);
		exit;
	}
	if($HTTP_GET_VARS[level]) {
		$BODY_ONLOAD	= "close_win();";
		include('mod_skins/skin_load.php');
		include('mod_basket/basket_add_level.php');
		BAS_add_lvl($HTTP_GET_VARS[level],1);
		exit;
	}
	include('mod_skins/skin_load.php');
	if($HTTP_GET_VARS[brief]) {
		# user is waching his goods thru new window
		include('mod_basket/basket_show_brief.php');
		BAS_show_brief();
		exit;
	}

	if($HTTP_GET_VARS[open]) {
		# user wants whole info about goods
		$MY[hide_basket] = 0;
	}
	if($HTTP_GET_VARS[user]  == 'basket' ||
	   $HTTP_POST_VARS[user] == 'basket') {
		include('mod_user/user_get.php');
		include('mod_order/setup.php');
		include('mod_basket/basket_update.php');
		include('mod_basket/basket_show_goods.php');
		include('mod_basket/basket_delete_product.php');

		if($HTTP_GET_VARS[del]) 	BAS_delete_product();
		if($HTTP_GET_VARS[delall]) 	BAS_delete_all_active_products();
		if($HTTP_POST_VARS[update]) 	BAS_update();
		$cd = ORD_generate(0,0,1);
		if($HTTP_POST_VARS[order] || $HTTP_GET_VARS[order]) {
			$out = ORD_make(); }
		else {
			$out = BAS_show_active_basket(); }
		$CONTENT[basket] = $out;

	}


?>
