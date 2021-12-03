<?
	function ORD_make() {
		global $SESSION;
		global $HTTP_POST_VARS;
		global $ORDER;
		$ORDER = 1;
		if($SESSION[is_open]) {
			# user is already authorized
			if(!$HTTP_POST_VARS[regstep]) {
				# show user adress for prompt 
				return REG_form2(1,$SESSION[user_id]);
			} else {
				# user agreed with his adress info
				$can = REG_add2();
				if($can>0) {
					# show order results
					return ORD_results();
				} else {
					# adress form contains some errors
					return REG_form2(1,$SESSION[user_id]);
				}
			}
		} else {
			# user needs to be authorizen
			if($HTTP_POST_VARS[regstep]==1) {
				$can = REG_add1();
				if($can>0) {
					return REG_form2(1,$can); }
				else {  return REG_form1(1); }
			} elseif($HTTP_POST_VARS[regstep]==2) {
				$can = REG_add2();
				if($can>0) {
					return ORD_results(); }
				else {  
					return REG_form2(1,$can); }
			} else {
				return REG_form1(1); }
		}
	}	

?>