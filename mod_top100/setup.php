<?

	$CURRENT_POSITION	= 	'top100';
	$TITLE			= 	$WORDS[title_top100];
	$DESCRIPTION 		= 	$WORDS[description_top100];
	$KEYWORDS 		= 	$WORDS[keywords_top100];

	include("mod_top100/top100_list.php");
	
	if($HTTP_GET_VARS[part]==2) {
	    $CONTENT[top100_list] = TOP_show_part2();
	} else {
	    $CONTENT[top100_list] = TOP_show_part1();
	}





?>
