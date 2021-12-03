<?
	function ADM_order_dig($begin) {
		global $LEVELS;
		$next_level = $begin;
		$LEVELS	    = array();
		$tmp = mysql_query("SELECT id,link,depth,size FROM S_levels WHERE id=$next_level and active=1");
		list($l_id,$l_link,$l_depth,$l_size) = mysql_fetch_row($tmp);
		ADM_order_dig_deep($l_id,$l_link);
		$R = ADM_order_dig_more($LEVELS);
		$R[whole_size] = $l_size;
		return $R;
	}

	function ADM_order_dig_deep($l,$link) {
		global $LEVELS;
		$l_depth = 3; # default must be >1
		array_push($LEVELS,$l);
		while($l_depth>1) {
			$tmp = mysql_query("SELECT id,depth FROM S_levels WHERE link=$l and active=1");
		        list($l_id,$l_depth) = mysql_fetch_row($tmp);
		        if($l_id)array_push($LEVELS,$l_id);
			$l = $l_id;
		}
	}

	function ADM_order_dig_more($all) {
		$L[amount] = 0;
		$L[price]  = 0;
		$L[size]   = 0;
#		foreach($all as $level) {print "$level<br>";}exit;
		foreach($all as $level) {#print "($level)<br>";
		    # walk thru all goods
		    $tmp = mysql_query("SELECT new_price,size FROM S_goods WHERE link=$level and active=1");
		    while($res = mysql_fetch_object($tmp)) {
			    $L[amount]++;
			    $L[price] += $res->new_price;
			    $L[size]  += $res->size;
		    }
		}#print$L[amount];exit;
		return $L;
	}

?>