<?


#	$PARTS[center_up]	=	'hello';

	$i=1;
	foreach($ADMIN_BUTTONS as $key => $value) {
		if($i != count($ADMIN_BUTTONS)) { $tail = ' |'; } else { $tail = ''; }
	 	if($key == $HTTP_GET_VARS[admin]) {
			$PARTS[header_bottom] .= " <b>$value[0]</b>".$tail; }
		else {
			$PARTS[header_bottom] .= " <a href=\"?admin=$key\">$value[0]</a>".$tail; }
		$i++;
	}
	$PARTS[header_bottom] = '<center>'.$PARTS[header_bottom].'</center>';





?>