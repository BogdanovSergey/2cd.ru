<?




	function ADM_serve_order() {
		global $HTTP_GET_VARS;
		$time = get_time();
		mysql_query("UPDATE S_orders SET active=0, served_time='$time' WHERE
									order_id=$HTTP_GET_VARS[serve] and active=1");
	



	}








?>
