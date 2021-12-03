<?



	function BAS_delete_product() {
		global $SESSION;
		global $HTTP_GET_VARS;
		mysql_query("DELETE FROM S_basket WHERE id	= $HTTP_GET_VARS[del] and 
							key_id	= $SESSION[key_id] and
							active	= 1 and
							ready	= 0");	
	}




	function BAS_delete_all_active_products() {
		global $SESSION;
		global $HTTP_GET_VARS;
		mysql_query("DELETE FROM S_basket WHERE key_id	= $SESSION[key_id] and
							active	= 1 and
							ready	= 0");	
	}









?>
