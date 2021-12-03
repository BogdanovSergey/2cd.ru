<?
	$TITLE				=	$WORDS[title_main];
	$DESCRIPTION 			= 	$WORDS[description_main];
	$KEYWORDS 			= 	$WORDS[keywords_main];
	$ADMIN[default_login]		=	'admin';
	$ADMIN[default_password]	=	'admin';

	$USER_BUTTONS['main']		=	array($WORDS[menu_main],	null);
	$USER_BUTTONS['about']		=	array($WORDS[menu_about],	'mod_user/user_about.php');
	$USER_BUTTONS['catalog']	=	array($WORDS[menu_catalog],	'mod_user/user_catalog.php');
	$USER_BUTTONS['top100']		=	array($WORDS[menu_top100],	'mod_top100/setup.php');
	$USER_BUTTONS['register']	=	array($WORDS[menu_register],	'mod_register/setup.php');
	$USER_BUTTONS['authors']	=	array($WORDS[menu_authors],	'mod_authors/setup.php');
#	$USER_BUTTONS['setup']		=	array($WORDS[menu_setup],	'mod_user/user_properties.php');
	$USER_BUTTONS['search']		=	array($WORDS[menu_search],	'mod_search/setup.php');
	$USER_BUTTONS['basket']		=	array($WORDS[menu_basket],	'mod_basket/setup.php');
#	$USER_BUTTONS['']		=	array('','mod_.php');
#	$USER_BUTTONS['']		=	array('','mod_.php');
	if(strlen($QUERY_STRING)<=6) $is_main_sector=1;

	
	include('mod_keys/setup.php');				# !!!ALL USERS MUST PASS THROUGH KEYS AUTHENTICATION !!!
	include('mod_keys/keys_user_auth.php'); 		# for user authorization
	include('mod_skins/skin_load.php');			# load dynamic parts of design (first execution)
	



	include('mod_user/user_info.php');
	include('mod_goods/goods_show.php');
	include('mod_goods/goods_show_path.php');
#	what user have in basket?
	include('mod_user/user_refresh.php');
	include('mod_order/order_generate.php');
	USE_refresh_order();

	# what modules in what sections to load
	if($HTTP_GET_VARS[user]=='dynamicbasket') {
		include('mod_basket/basket_dynamic.php'); }
	if($HTTP_GET_VARS[user]=='null') {
		include('mod_user/user_null.php'); }		# show empty iframe
	if($HTTP_GET_VARS[user]=='addlvl') {
		include('mod_basket/setup.php'); }		# user adds whole level to the basket
	if($HTTP_GET_VARS[user]=='additem') {
		include('mod_basket/setup.php'); }		# user adds some product to the basket
	if($HTTP_GET_VARS[user]=='main' || $is_main_sector) {
		include('mod_goods/goods_new_items.php'); }	# show new goods at first page
	if($HTTP_GET_VARS[showinfo]) {
		include('mod_goods/goods_show_info.php'); }	# show info about some product
	if($HTTP_POST_VARS[i1] && $HTTP_POST_VARS[i2])	{ KEY_test_user_password(); } # user wants to authorize
	if($HTTP_GET_VARS['user']=='exit')		{ KEY_close_user_session(); }
	if($HTTP_GET_VARS['user']=='remind')		{ USE_remind_password(); }
	include('mod_register/reg_menu.php');
	include('mod_user/step_all.php');
	include('mod_news/setup.php');

	# connect to module which function is executed
	foreach($USER_BUTTONS as $key => $value) {
		if(($HTTP_GET_VARS[user]==$key || $HTTP_POST_VARS[user]==$key) && $value[1]) {include($value[1]);break;}
	}

	# must be fixed!
 	# following modules will be activated EVERY time when user loads any page
	include('mod_top100/best_show.php');
	$CONTENT[user_auth_form]	= REG_show_auth_form();
	$CONTENT[goods_brief]		= BES_show_brief();
	

	include('mod_skins/skin_load.php');			# load static design (second execution)



?>
