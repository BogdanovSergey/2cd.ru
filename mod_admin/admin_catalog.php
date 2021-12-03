<?

	include('mod_admin/admin_reset.php');
	include('mod_admin/admin_catalog_create.php');
	include('mod_admin/admin_catalog_edit.php');
	include('mod_admin/admin_catalog_update.php');
	include('mod_admin/admin_catalog_upload.php');
	include('mod_admin/admin_catalog_ident.php');
	include('mod_admin/admin_catalog_auth.php');
	include('mod_admin/admin_delete_product.php');
	include('mod_admin/admin_edit_product.php');
	include('mod_catalog/catalog_level.php');
	include('mod_catalog/catalog_show.php');
	include('mod_admin/admin_catalog_goods.php');
	include('mod_rollbar/rollbar_show.php');
	include('mod_goods/goods_admin_show.php');
	include('mod_goods/goods_show.php');
	if($HTTP_GET_VARS[updatedb])	ADM_update_whole_db();					# update database
	if($HTTP_GET_VARS[edit])	ADM_show_edit_level_form();				# go to simple edit mechanizm and exit
	if($HTTP_GET_VARS[edit_product] || $HTTP_POST_VARS[edit_product] ) ADM_edit_product();	# edit product and exit
	if($HTTP_POST_VARS[upload])	ADM_catalog_upload_file();
	if($HTTP_GET_VARS[ident])	ADM_catalog_identify();
	if($HTTP_GET_VARS[auth_product])ADM_catalog_auth_product();
	

	$id = $HTTP_GET_VARS[id];
	if($id) { settype($id,'integer'); }
	else	{ $id = 0; }
	CAT_get_level($id);


	if($HTTP_GET_VARS[reset]) 	 ADM_reset_level();
	if($HTTP_GET_VARS[reset_all])	 ADM_reset_all();
	if($HTTP_GET_VARS[reset_admin])	 ADM_reset_admin();
	if($HTTP_GET_VARS[reset_keys])	 ADM_reset_keys();
	if($HTTP_GET_VARS[reset_users])	 ADM_reset_users();
	if($HTTP_GET_VARS[reset_basket]) ADM_reset_basket();
	if($HTTP_GET_VARS[reset_orders]) ADM_reset_orders();
	if($HTTP_GET_VARS[reset_adreses])ADM_reset_adreses();
	if($HTTP_GET_VARS[reset_news]) 	 ADM_reset_news();
	if($HTTP_GET_VARS[reset_skins])	 ADM_reset_skins();
#	if($HTTP_GET_VARS[reset_levels]) ADM_reset_level();
#	if($HTTP_GET_VARS[reset_goods])	 ADM_reset_goods();
	if($HTTP_GET_VARS[reset_best])	 ADM_reset_best();

	if($HTTP_POST_VARS[create_level])ADM_create_level();
	if($HTTP_POST_VARS[add_product]) ADM_add_product();
	if($HTTP_GET_VARS[del])		 ADM_delete_product();
	$PARTS[center_up]	=	 CAT_show_level(1);
	$TMP[goods_list]	=	 GOO_show_goods_for_admin();
	$PARTS[center_up]      .=	 ROL_show(1).			# show rollbar before goods
						$TMP[goods_list];
	$PARTS[center_down]	=	 ADM_show_create_goods_form();
	$PARTS[center_down]	=	 ADM_catalog_upload();		# yes this is right !
	$PARTS[right_down]	=	 ADM_show_create_level_form();








?>
