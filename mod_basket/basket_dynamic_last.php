<?
	function BAS_dynamic_last() {
	    global $WORDS;
	    global $IMAGES;
	    global $SESSION;
	    global $ORDER_INFO;
	    global $HTTP_GET_VARS;
	    global $HTTP_COOKIE_VARS;
	    include("mod_catalog/catalog_level.php");
	    $max	= 5000;
	    $cut_pos	= 20;
	    $l_no	= 0;
	    $i_no	= 0;
	    if($HTTP_GET_VARS[amountord]) {
		   if($HTTP_GET_VARS[amountord]=='all') {
				$l_limit = $i_limit = $max;
				$cap_i = $WORDS[user_all_levels_in_bask];
				$cap_l = $WORDS[user_all_items_in_bask];
		   } else {
			if($HTTP_GET_VARS[amountord]>$max) {$HTTP_GET_VARS[amountord]=$max;}
		   	$l_limit = $HTTP_GET_VARS[amountord];
		   	$i_limit = $HTTP_GET_VARS[amountord];
			$cap_i = $WORDS[user_last_items_in_bask][0]." $i_limit ".$WORDS[user_last_items_in_bask][1];
			$cap_l = $WORDS[user_last_levels_in_bask][0]." $l_limit ".$WORDS[user_last_levels_in_bask][1];
		   }
	    } else {
		   if($HTTP_COOKIE_VARS[amountord]=='all') {
				$l_limit = $i_limit = $max;
				$cap_i = $WORDS[user_all_levels_in_bask];
                                $cap_l = $WORDS[user_all_items_in_bask];
		   } elseif($HTTP_COOKIE_VARS[amountord]) {
			if($HTTP_COOKIE_VARS[amountord]>$max) {$HTTP_COOKIE_VARS[amountord]=$max;}
		   	$l_limit = $HTTP_COOKIE_VARS[amountord];
		   	$i_limit = $HTTP_COOKIE_VARS[amountord];
			$cap_i = $WORDS[user_last_items_in_bask][0]." $i_limit ".$WORDS[user_last_items_in_bask][1];
                        $cap_l = $WORDS[user_last_levels_in_bask][0]." $l_limit ".$WORDS[user_last_levels_in_bask][1];
		   } else {
			$l_limit = 5;
			$i_limit = 5;
			$cap_i	= $WORDS[user_last_items_in_bask][0]." $i_limit ".$WORDS[user_last_items_in_bask][1];
			$cap_l	= $WORDS[user_last_levels_in_bask][0]." $l_limit ".$WORDS[user_last_levels_in_bask][1];
		   }
	    }	
	    # make levels
	    if($ORDER_INFO[levels]) {
		    $l_hack = $l_limit+1;
		    $out_levels = "<tr><td width=90% align=center><br><b>$cap_l</b></td><td>&nbsp;</td></tr>";
		    $var = mysql_query("SELECT level_id,id FROM S_basket WHERE key_id=$SESSION[key_id] and active=1 and ready=0
										and product_id=0 ORDER BY id DESC LIMIT 0,$l_hack");
		    while($res = mysql_fetch_object($var)) {
			    $l_no++;
			    if($l_no>$l_limit) {
				if($l_no+1>$ORDERS_INFO[levels]) {
				$out_levels .= '<tr><td> &nbsp; &nbsp;<a href="#" OnClick="new_win(\'?user=basket&brief=1\');return false;">'.$WORDS[user_show_other_goods].'</a></td><td>&nbsp;</td></tr>'; }
				break;
			    }
			    $l = CAT_get_level_caption($res->level_id);
			    $el= chop($l);
			    if(strlen($l) > $cut_pos) { $l = substr($l,0,$cut_pos).'...'; }
			    $out_levels .= "<tr><td><li><a href=\"?catalog&id=$res->level_id\" OnMouseOver=\"window.status='$el';return true;\">$l</a></td><td>&nbsp;<a href=\"?user=dynamicbasket&del=$res->id\"><img src=\"$IMAGES[delete_item]\" border=0 alt=\"$WORDS[delete] $el\"></a></td></tr>\n";
		    }
	    }
	    # make items
	    if($ORDER_INFO[real_items]) {
		    $i_hack = $i_limit+1;
		    $out_items = "<tr><td align=center width=90%><br><b>$cap_i</b></td><td>&nbsp;</td></tr>";
		    $var = mysql_query("SELECT product_id,id FROM S_basket WHERE key_id=$SESSION[key_id] and active=1 and ready=0
										and level_id IS NULL ORDER BY id DESC LIMIT 0,$i_hack");
		    while($res = mysql_fetch_object($var)) {
			    $i_no++;
			    if($i_no>$i_limit) {
				if($i_no+1>$ORDERS_INFO[items]) {
				$out_items .= '<tr><td> &nbsp; &nbsp;<a href="#" OnClick="new_win(\'?user=basket&brief=1\');return false;">'.$WORDS[user_show_other_goods].'</a></td><td>&nbsp;</td></tr>'; }
				break;
			    }
			    $p = GOO_get_product_caption_by_id($res->product_id);
			    $ep= chop($p);
			    if(strlen($p) > $cut_pos) { $p = substr($p,0,$cut_pos).'...'; }
			    $out_items .= "<tr><td><li><a href=\"#\" OnMouseOver=\"window.status='$ep';return true;\" OnClick=\"info_win($res->product_id);return false;\">$p</a></td><td>&nbsp;<a href=\"?user=dynamicbasket&del=$res->id\"><img src=\"$IMAGES[delete_item]\" border=0 alt=\"$WORDS[delete] $ep\"></a></td></tr>\n";
		    }
	    }
	    $out_levels = "
		<table width=100% border=0 cellspacing=0 cellpadding=0>
			$out_levels
		</table>
		";
	    $out_items = "
                <table width=100% border=0 cellspacing=0 cellpadding=0>
                        $out_items
                </table>
		";

	    return array($out_levels,$out_items);
	}


?>
