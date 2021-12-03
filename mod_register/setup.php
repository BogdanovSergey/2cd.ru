<?
	$CURRENT_POSITION	= 	'register';
	$TITLE			= 	$WORDS[title_register];
	$DESCRIPTION 		= 	$WORDS[description_register];
	$KEYWORDS 		= 	$WORDS[keywords_register];
	include("mod_register/reg_show.php");
	include("mod_register/reg_add.php");


	if($HTTP_POST_VARS[regstep]==1) {
		$can = REG_add1();
		if($can>0) {
			$CONTENT[registration] = REG_form2(0,$can);
		} else {
			$TMP_MSG = $WORDS[reg_user_exists];
			$CONTENT[registration] = REG_form1(0);
		}
	} elseif($HTTP_POST_VARS[regstep]==2) {
		$can = REG_add2();
		if($can>0) {
			$CONTENT[registration] = REG_results_form();
		} else {
			$CONTENT[registration] = REG_form2(0,$HTTP_POST_VARS[regno]);
		}
	} else {
		$CONTENT[registration] = REG_form1(0);
	}
	




?>
