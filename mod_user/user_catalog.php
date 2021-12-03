<?

	$CURRENT_POSITION	= 	'catalog';
	$TITLE			= 	$WORDS[title_catalog];
	$DESCRIPTION 		= 	$WORDS[description_catalog];
	$KEYWORDS 		= 	$WORDS[keywords_catalog];
#	include('mod_user/user_refresh.php');
	include('mod_catalog/catalog_level.php');
	include('mod_catalog/catalog_show.php');
	include('mod_rollbar/rollbar_show.php');
	#include('mod_goods/goods_show.php');

	$id = $HTTP_GET_VARS[id];
	if($id) { settype($id,'integer'); }
	else	{ $id = 0; }
	CAT_get_level($id);
	#USE_refresh_order();					# we must know what items are already in basket
	
	$CONTENT[catalog]	=	 CAT_show_level(0);
	$tmp_goods_list		=	 GOO_show_goods(0);
	$CONTENT[catalog]	.=	 ROL_show(0).			# show rollbar before goods
						$tmp_goods_list;


?>
