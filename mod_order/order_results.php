<?


	function ORD_results() {
		global $WORDS;
		global $SESSION;
		global $HTTP_POST_VARS;

		if($SESSION[is_open] && $SESSION[user_id]) {
			include('mod_order/order_clear_basket.php');

			# empty user basket
			$ok = ORD_clear_basket();
			if($ok) {
				return $WORDS[reg_make_order_results];
			} else {
				return "Oops, error found!";
			}

		} else {
			return "Oops, found error in session";
		}



	}	


	


?>