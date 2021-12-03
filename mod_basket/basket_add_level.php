<?
	function BAS_add_lvl($id,$showform) {
		global $MY;
		global $ALREADY;
		global $SESSION;
		if($showform) include('mod_basket/basket_add_lvl_form.php');
		$p 	 = GOO_get_level_by_id($id,0);
		$already = 0;
		# if this level really is alive
		if($p->id && !$ALREADY['l'.$p->link]) {
			# big level rewrites small, existed ones #
			# get small levels
			$small_lvls = array();
			$tmpres = mysql_query("SELECT id FROM S_levels WHERE link=$id and active=1");
			while($tmpvar = mysql_fetch_object($tmpres)) {
				# remove all small levels
				mysql_query("DELETE FROM S_basket WHERE key_id  = $SESSION[key_id]  and
									user_id = '$SESSION[user_id]' and
									ready	= 0 and
									( product_level=$tmpvar->id or level_id=$tmpvar->id)");
				#print "$tmpvar->id ";
			}#exit;

			# check the basket, may be such product is already there
			$res = mysql_query("SELECT id,key_id,user_id,product_id FROM S_basket WHERE
										key_id 	   = $SESSION[key_id]  and
										level_id = $id and
										active	   = 1 and
										ready	   = 0");
			$row = mysql_fetch_object($res);
			if($row->id) {
				# add more count
#      ?! stupid ?!
				if($MY[can_choose_amount]) {
					mysql_query("UPDATE S_basket SET amount=amount+1, user_id=$SESSION[user_id]
									WHERE id = $row->id") || die('cant update');
				} else {
					$already = 1;
				}
			} else {
				# remove goods from basket if they exist in this level
				mysql_query("DELETE FROM S_basket WHERE key_id  = $SESSION[key_id]  and
									user_id = '$SESSION[user_id]' and
									ready	= 0 and
									product_level= $id");
				# add new level to the basket
				mysql_query("INSERT INTO S_basket(	key_id,
									user_id,
									level_id,
									cd_number,
									amount,
									active,
									ready)
									VALUES(	$SESSION[key_id],
										'$SESSION[user_id]',
										$id,
										'$p->cd_number',
										'$p->goods',
										1,0)");
			}

		    #print $p->id.' '.$p->caption.', amount: '.$amount.', sess '.$SESSION[key_id];exit;
		    if($showform) {
			$out = BAS_show_add_lvl_form($p,$amount,$already);
			print $out;
		    }
		}
	}

?>