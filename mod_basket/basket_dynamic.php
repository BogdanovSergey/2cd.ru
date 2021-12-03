<?
	if($HTTP_GET_VARS[item]) {
		BAS_dynamic('item');
	}
	elseif($HTTP_GET_VARS[level]) {
		BAS_dynamic('level');
	}
	else {
		BAS_dynamic('refresh');
	}
	exit;

	function BAS_dynamic($type) {
	    global $HTTP_COOKIE_VARS;
	    global $HTTP_GET_VARS;
	    global $ORDER_INFO;
	    global $IE_COMPAT;
	    global $WORDS;
	    global $MY;
	    include("mod_basket/basket_delete_product.php");
	    include("mod_basket/basket_dynamic_last.php");

	    if($HTTP_GET_VARS[del]) {
		    BAS_delete_product();
		    USE_refresh_order();
	    }

	    if($HTTP_GET_VARS[amountord]) {
		    $desired_am = BAS_set_order_amount($HTTP_GET_VARS[amountord]);
	    } else {
		    $desired_am = $HTTP_COOKIE_VARS[amountord];
	    }
	    
	    if($type=='item') {
		    include('mod_basket/basket_add_product.php');
		    BAS_add($HTTP_GET_VARS[item],1,0);
		    USE_refresh_order();
	    }
	    if($type=='level') {
		    include('mod_basket/basket_add_level.php');
		    BAS_add_lvl($HTTP_GET_VARS[level],0);
		    USE_refresh_order();
	    }
	    if($type=='refresh') {
	    
	    }
	    
	    
	    if($IE_COMPAT) {
		    $ie_hack[0] = '<html><body bgcolor="#ffffff"><link rel="STYLESHEET" type="text/css" href="main.css"><script src="func.js"></script>';
		    $ie_hack[1] = '</body></html>';
	    }
	    foreach($MY[choose_items_amount] as $am) {
		    if($am==$MY[choose_items_all_word]) {
			$amval = 'all';
		    } else {
			$amval = $am;
		    }
		    if($amval==$desired_am) {
			$sel='selected';
		    } else {
			$sel='';
		    }
		    $cham .= "<option value=\"$amval\" $sel>$am</option>\n";
	    }
	    
	    $round_size = "$WORDS[user_basketsize] &nbsp; &nbsp; &nbsp; &nbsp; <b>".GOO_round_size($ORDER_INFO[size]).'</b>';
	    list($list_of_levels,$list_of_items) = BAS_dynamic_last();
	    if($ORDER_INFO[price]>0) { $make_order = "<tr><td colspan=2 align=center><a href=\"?user=basket&order=1\" target=\"_parent\">$WORDS[make_order]</a></td></tr>"; }
	    print "
    	    $ie_hack[0]
		<table width=100% border=0 cellspacing=0 cellpadding=0>
		    <form>
		    <tr><td width=60%>".$WORDS[show_last_items][0].":</td><td align=left>
			<select name=\"amountord\" $DESIGN[order_select]\"
				OnChange=\"document.location='?user=dynamicbasket&amountord='+this.value;\">
				$cham
			</select></td></tr>
		    </form><!---->
		    <tr><td>$WORDS[user_levels_in_bask]</td>	<td align=left> <b>$ORDER_INFO[levels]</b></td></tr>
		    <tr><td>$WORDS[user_items_in_bask]</td>	<td align=left> <b>$ORDER_INFO[added_files]</b></td></tr>
		    <tr><td>$WORDS[user_basketsize]</td>	<td align=left> <b>".GOO_round_size($ORDER_INFO[size])."</b></td></tr>
		    <tr><td>$WORDS[user_amount_disks]</td>	<td align=left> <b>$ORDER_INFO[disks]</b></td></tr>
		    <tr><td>$WORDS[user_ready_price]</td>	<td align=left> <b>$ORDER_INFO[price] $WORDS[RUB]</b></td></tr>
		    $make_order
		    <tr><td colspan=2>&nbsp;</td></tr>
		</table>
		    $list_of_levels
		    $list_of_items
	    $ie_hack[1]";
	}

	function BAS_set_order_amount($am) {
		setcookie('amountord',$am);
		return $am;
	}

?>
