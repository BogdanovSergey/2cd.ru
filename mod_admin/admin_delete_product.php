<?


	function ADM_delete_product() {
		global $HTTP_GET_VARS;
		global $HTTP_POST_VARS;
		$did = $HTTP_GET_VARS[del];
		if($did && !$HTTP_POST_VARS[add_product]) {
			$tmpvar = mysql_query("SELECT link FROM S_goods WHERE id=$did");
			$res = mysql_fetch_array($tmpvar);
			$prod_level = $res[0];
			mysql_query("DELETE FROM S_goods  WHERE id=$did");
			mysql_query("DELETE FROM S_basket WHERE product_id=$did");
		
			CAT_update_level($prod_level);
		}
#print ">$did - $prod_level";exit;
	}






?>
