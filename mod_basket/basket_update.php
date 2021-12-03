<?



	function BAS_update() {
		global $SESSION;
		global $HTTP_POST_VARS;
		foreach($HTTP_POST_VARS  as $key => $value) {
			if(is_int($key) && $value>0 && $value<1000) {
				mysql_query("UPDATE S_basket SET amount=$value WHERE
										product_id = $key and
										key_id	   = $SESSION[key_id] and
										active	   = 1 and
										ready	   = 0");
			} elseif(is_int($key) && $value==0) {
				mysql_query("DELETE FROM S_basket WHERE product_id	= $key and 
									key_id		= $SESSION[key_id] and
									active		= 1 and
									ready		= 0");	
			}
		}
	}














?>
