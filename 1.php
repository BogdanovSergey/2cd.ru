<?

	include('mod_setup/setup.php');
	include('mod_db/setup.php');
	include('mod_time/setup.php');
	include('stat/stat_func/func_src.php');
	include('mod_goods/goods_round_size.php');
	include('mod_words/setup.php');
	if($HTTP_GET_VARS[admin]) { include('mod_admin/setup.php');	# simple vars, must be after "admin include"
	} else 			  { include('mod_user/setup.php'); }

	print $HTML_begin.$HTML_COUNTER;
	print_table_parts('begin',0);
		print_table_parts('header_left',   $PARTS[header_left]);
		print_table_parts('header_right',  $PARTS[header_right]);
		print_table_parts('header_bottom', $PARTS[header_bottom]);
	print_table_parts('end',0);

	print_table_parts('begin2',0);
		print_table_parts('left_up',	$PARTS[left_up]);
		print_table_parts('left_down',	$PARTS[left_down]);
		print_table_parts('center_up',	$PARTS[center_up]);
		print_table_parts('center_down',$PARTS[center_down]);
		print_table_parts('right_up',	$PARTS[right_up]);
		print_table_parts('right_down',	$PARTS[right_down]);
	print_table_parts('end2',0);
	print $HTML_end;


	function print_table_parts($part,$inside) {
		$word = '&nbsp;';
		global $TABLE;
		if(strlen($inside) > 1 ||
		   !isset($inside)) {
			if(!$inside) $inside = $word;
			$one = $TABLE[$part.'_begin'];
			$two = $TABLE[$part.'_end'];
			if(isset($one) && isset($two)) print $one.$inside.$two;
		} else {
			print $TABLE[$part];
		}
	}

?>
