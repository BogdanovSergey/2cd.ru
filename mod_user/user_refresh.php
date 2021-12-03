<?
	function USE_refresh_order() {
		global $MY;
		global $ALREADY;
		global $SESSION;
		global $ORDER_INFO;
		
		$cd = ORD_generate(0,0,1);
		
/*
		$ORDER_INFO[size]	= 0;
		$ORDER_INFO[items]	= 0;
		$ORDER_INFO[real_items]	= 0;
		$ORDER_INFO[levels]	= 0;
		$ORDER_INFO[disks]	= 0;
		$ORDER_INFO[price]	= 0;
		$res = mysql_query("SELECT id, product_id, level_id, amount FROM S_basket WHERE
										key_id = $SESSION[key_id] and
										active = 1 and
										ready  = 0");
		while($r = mysql_fetch_object($res)) {
			if($r->product_id) {
				$ALREADY["p".$r->product_id] = $r->amount;
				$ORDER_INFO[size] += GOO_get_item_size(0,$r->product_id);
				$ORDER_INFO[items]++;
				$ORDER_INFO[real_items]++;
			} else {
				$ALREADY["l".$r->level_id] = $r->amount;
#print "1-l".$r->level_id."<br>";
				$ORDER_INFO[size]  += GOO_get_item_size(1,$r->level_id);
				$ORDER_INFO[items] += $r->amount;
				$ORDER_INFO[levels]++;
				# mybe this level is only one part of big tree
				$tmpvar = mysql_query("SELECT id,size FROM S_levels WHERE link=$r->level_id and active=1");
				while($tmpres = mysql_fetch_object($tmpvar)) {
					$ALREADY["l".$tmpres->id] = $r->amount;
#print "2-l".$tmpres->id."<br>";
					#$ORDER_SIZE  += $tmpres->size;
					#$ORDER_ITEMS += $r->amount;
					$tmpvar2 = mysql_query("SELECT id,size FROM S_levels WHERE link=$tmpres->id and active=1");
					while($tmpres2 = mysql_fetch_object($tmpvar2)) {
						$ALREADY["l".$tmpres2->id] = $r->amount;
#print "3-l".$tmpres2->id."<br>";
						#$ORDER_SIZE  += $tmpres2->size;
						#$ORDER_ITEMS ++;
					}
				}
			}
		}
		$CD_size	= 0;
		$allCDsize	= $ORDER_INFO[size];
		$order_disks	= 0;
		$order_price	= 0;
		$all_disks	= GOO_round_CD650($ORDER_INFO[size]);
		for($dn=1;$dn<=$all_disks;$dn++) {
			    if($allCDsize-$MY[disk650_bytes]>0) {
				    $CD_size    = $MY[disk650_bytes];
				    $allCDsize -= $MY[disk650_bytes];
			    } else {
				    $CD_size    = $allCDsize;
				    $allCDsize -= $allCDsize;
			    }
			    if($CD_size > $MY[disk_minimum]) {
				    $order_disks++;
				    $order_price+= $MY[disk_price];
			    }
		}
		$ORDER_INFO[disks] = $order_disks;
		$ORDER_INFO[price] = $order_price;
*/
	}

?>