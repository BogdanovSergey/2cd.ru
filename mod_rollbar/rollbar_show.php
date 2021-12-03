<?
	function ROL_show($isadmin) {
		global $MY;
		global $CURR;
		global $SHOWN;
		global $WORDS;
		global $ALL_GOODS;
		global $HTTP_GET_VARS;
		global $HTTP_COOKIE_VARS;
		global $next_butt,$prev_butt;
		if($SHOWN[goods_amount]) {
			ROL_save_amount_to_cookie();
			ROL_save_sort_to_cookie();
			$go_items = round($ALL_GOODS/$SHOWN[chosen_amount]);
			$go_step  = 1;
			for($i=0;$i<$ALL_GOODS;$i+=$SHOWN[chosen_amount]) {
				$st = $i;
				$sts= $i+1;
				$en = $i+$SHOWN[chosen_amount];
				if($go_step>1) {$p='|';} else{$p='';}
				if($en>$ALL_GOODS) { $ens=$ALL_GOODS; } else { $ens=$en; }
				if($HTTP_GET_VARS[start]+1 == $sts) { $s_range = "<b>$sts-$ens</b>"; }
				else { $s_range = "$sts-$ens"; }
				$vars .= $p.' <a href="#" '.
				'OnClick="roll('.$HTTP_GET_VARS[id].','.$st.');return false;">'.$s_range."</a> \n";
				
				$go_step++;
			}
			if(!$HTTP_GET_VARS[start]) $HTTP_GET_VARS[start]=0;
			$numbers = $MY[choose_amount_per_page];	
		# make amount menu
			$amount_menu = "<select name=\"amount\" OnChange=\"roll($HTTP_GET_VARS[id],$HTTP_GET_VARS[start]);\">\n";
			foreach($numbers as $number) {
				$sel = '';
				if(strcmp($HTTP_COOKIE_VARS[amount],$number)==0)	{ $sel = ' selected'; }
				elseif	(!$HTTP_COOKIE_VARS[amount] && $number== 5)	{ $sel = ' selected'; } 
				$amount_menu .= "<option value=\"$number\"$sel>$number</option>\n";
			}
			$amount_menu .= "</select>\n";
		# make sort menu
			$sort_ch	= array($WORDS['sort'][1],$WORDS['sort'][2]);
			$sort_menu	= " <select name=\"sort\" OnChange=\"roll($HTTP_GET_VARS[id],$HTTP_GET_VARS[start]);\">\n";
			$si=0;
			foreach($sort_ch as $ch) {
				$sel = '';
				if(strcmp($HTTP_COOKIE_VARS['sort'],$si)==0 ||
				   strcmp($HTTP_GET_VARS['sort'],$si)	==0)	{ $sel = ' selected';	}
				else						{ $sel = '';		}
				$sort_menu .= "<option value=\"$si\"$sel>$ch</option>\n";
				$si++;
			}
			$sort_menu .= "</select>\n";
		# make rollbar form
			if($isadmin)	{ $who = '<input type="hidden" name="admin" value="catalog">';	}
			else		{ $who = '<input type="hidden" name="user" value="catalog">';	}
			$out =
'
</td></tr>
<tr><td>
	<form name="rollf" method="GET">
	'.$who.'
	<input type="hidden" name="id">
	<input type="hidden" name="start">
	<table align=center width=100% cellpadding=0 cellspacing=0 border=0>
	<tr>'."
		<td>$WORDS[items_per_page] $amount_menu</td>
		<td>".$WORDS['sort'][0]." $sort_menu</td>
		<td>$vars</td>
	</tr>
	</table>
	</form>
</td></tr>
<tr><td>
";

		} # end of "if(SHOWN_GOODS)"
		return $out;
	}

	function ROL_save_amount_to_cookie() {
		global $HTTP_GET_VARS;
		global $HTTP_COOKIE_VARS;
		if($HTTP_GET_VARS[amount] && $HTTP_COOKIE_VARS[amount]!=$HTTP_GET_VARS[amount]) {
			setcookie('amount',$HTTP_GET_VARS[amount]);
			$HTTP_COOKIE_VARS[amount] = $HTTP_GET_VARS[amount];
		}
	}
	
	function ROL_save_sort_to_cookie() {
		global $HTTP_GET_VARS;
		global $HTTP_COOKIE_VARS;
		if($HTTP_GET_VARS['sort'] && $HTTP_COOKIE_VARS['sort']!=$HTTP_GET_VARS['sort']) {
			setcookie('sort',$HTTP_GET_VARS['sort']);
			$HTTP_COOKIE_VARS['sort'] = $HTTP_GET_VARS['sort'];
		} else {
			setcookie('sort','0');
			$HTTP_COOKIE_VARS['sort'] = '0';
		}
	}

?>