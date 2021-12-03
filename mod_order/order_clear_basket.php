<?
	function ORD_clear_basket() {
		global $SESSION;
		global $HTTP_POST_VARS;
		include('mod_admin/admin_order_dig.php');
		include('mod_top100/best_add.php');
		$out = 1;
		# update user purchases before authentication		
		mysql_query("UPDATE S_basket SET user_id=$SESSION[user_id] WHERE key_id=$SESSION[key_id] and active=1")
		|| die("Cant authorize user purchases");
	
		# write goods to "top100" table
		BES_add_to_top100();

		# get id's of all new purchases
		$res = mysql_query("SELECT * FROM S_basket WHERE
								key_id = $SESSION[key_id] and 
								active = 1 and
								user_id= $SESSION[user_id]");
		
		# modify new purchases to old purchases
		mysql_query("UPDATE S_basket SET active=0 WHERE
								key_id = $SESSION[key_id]  and
								user_id= $SESSION[user_id] and
								active = 1")
		|| die("Cant update active goods to old goods");


		# get order id
		$o = mysql_query("SELECT DISTINCT order_id FROM S_orders ORDER BY order_id DESC");
		$r = mysql_fetch_row($o);
		mysql_free_result($o);
		if(!$r[0]) { $no = 1; }
		else	   { $no = $r[0]+1; }


		# write to orders table
		$u = USE_get_user_by_keyid();

		$time = get_time();
		while($p = mysql_fetch_object($res)) {
			$goods_moved	= 1;
			$THISprice	= 0;
			$THISsize	= 0;
			$level_amount	= 0;
			$cd_number	= $p->cd_number;
			if($p->product_id) {
				$tmpp = mysql_query("SELECT new_price,size FROM S_goods WHERE id=$p->product_id and active=1");
				$resp = mysql_fetch_object($tmpp);
				$THISprice = $resp->new_price;
				$THISsize = $resp->size;
				
				if($p->amount) $THISprice *= $p->amount;
			}
			if($p->level_id) {
				$INSIDE = ADM_order_dig($p->level_id);
				$level_amount = $INSIDE[amount];
				$THISprice  = $INSIDE[price];
				$THISsize   = $INSIDE[whole_size];
			}
		
			mysql_query("INSERT INTO S_orders(	order_id,
								key_id,
								user_id,
								product_id,
								level_id,
								amount,
								level_amount,
								price,
								size,
								cd_number,
								active,
								order_time,
								served_time)
						VALUES (
								$no,
								$SESSION[key_id],
								$SESSION[user_id],
								$p->product_id,
								'$p->level_id',
								$p->amount,
								$level_amount,
								'$THISprice',
								'$THISsize',
								'$cd_number',
								1,
								'$time',
								''
						)");
		}
		if($goods_moved) {
		    # write users adress
			mysql_query("INSERT INTO S_adreses(	order_id,
								city,
								postindex,
								region,
								oblast,
								street,
								building,
								flat,
								korp,
								entrance,
								flour,
								code,
								metro,
								deliver_time1,
								deliver_time2,
								cancall_time1,
								cancall_time2,
								additional)
						VALUES (
								$no,
								'$u->city',
								'$u->postindex',
								'$u->region',
								'$u->oblast',
								'$u->street',
								'$u->building',
								'$u->flat',
								'$u->korp',
								'$u->entrance',
								'$u->flour',
								'$u->code',
								'$u->metro',
								'$u->deliver_time1',
								'$u->deliver_time2',
								'$u->cancall_time1',
								'$u->cancall_time2',
								'$u->additional'
						)");
		}

		return $out;
	}	


?>
