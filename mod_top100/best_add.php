<?


	function BES_add_to_top100() {
		global $SESSION;
		
		$amount_per_order = 1;		# if =1 then I'll add to "top100" table only "1" for each product 
						# if =0 then I'll add whole amount of each product to "top100" table 
		# get id's of all new purchases
		$res = mysql_query("SELECT * FROM S_basket WHERE
								key_id = $SESSION[key_id] and 
								active = 1 and
								user_id= $SESSION[user_id]");
		
		while($row = mysql_fetch_object($res)) {
			$pid = $row->product_id;
			$lid = $row->level_id;
			if($amount_per_order) { 
				$amount = 1; }
			else {
				$amount = $row->amount; }
			if($pid > 0) {
				# put product into best table
				$is = BES_is_there_same_item(1,$pid);
				if($is) {
					mysql_query("UPDATE S_best SET amount=amount+1 WHERE product_id=$pid");
				} else {
					mysql_query("INSERT INTO S_best(product_id,amount) VALUES($pid, $amount)"); 
				}
			} else {
				# put product (level) into best table
				$is = BES_is_there_same_item(0,$lid);
				if($is) {
					mysql_query("UPDATE S_best SET amount=amount+1 WHERE level_id=$lid");
				} else {
					mysql_query("INSERT INTO S_best(product_id,level_id,amount) VALUES(0,$lid,$amount)"); 
				}
			}




		}




	}	


	function BES_is_there_same_item($is_product, $id) {
		$out = 0;
		if($is_product) {
			$res = mysql_query("SELECT id FROM S_best WHERE product_id=$id");
			$row = mysql_fetch_row($res);
			if($row[0]>0) { $out = 1; } else { $out = 0; }
		} else {
			$res = mysql_query("SELECT id FROM S_best WHERE level_id=$id");
			$row = mysql_fetch_row($res);
			if($row[0]>0) { $out = 1; } else { $out = 0; }
		}
		return $out;
	}








?>
