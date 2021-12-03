<?
	function BAS_add($id, $amount,$showform) {
		global $MY;
		global $ALREADY;
		global $SESSION;
		if($showform) { include('mod_basket/basket_add_form.php'); }
		$p = GOO_get_product_by_id($id);
		$already = 0;
		# if this product really is alive
		if($p->id) {
			# check the basket, may be such product is already there
			$res = mysql_query("SELECT id,key_id,user_id,product_id FROM S_basket WHERE
										key_id 	   = '$SESSION[key_id]'  and
										product_id = $id and
										active	   = 1   and
										ready	   = 0");
			$row = mysql_fetch_object($res);
			if($row->id) {
				# add more count
				if($MY[can_choose_amount]) {
					mysql_query("UPDATE S_basket SET amount=amount+$amount, user_id=$SESSION[user_id]
									WHERE id = $row->id");
				} else {
					$already = 1;
				}
				
			} else {
				# maybe this product exists in the level which already added ?
				if(!$ALREADY["l$p->link"]) {
				
					# add new product to the basket
					mysql_query("INSERT INTO S_basket(	key_id,
										user_id,
									        product_id,
										product_level,
										cd_number,
										amount,
										active,
										ready)
										VALUES(	'$SESSION[key_id]',
											'$SESSION[user_id]',
											$id,
											$p->link,
											'$p->cd_number',
											$amount,
											1,0)");
				} else {
					$already = 1;
				}
			}
		#print $p->id.' '.$p->caption.', amount: '.$amount.', sess '.$SESSION[key_id];exit;
		    if($showform) {
			$out = BAS_show_add_form($p,$amount,$already);
			print $out;
		    }
		}
	}
?>