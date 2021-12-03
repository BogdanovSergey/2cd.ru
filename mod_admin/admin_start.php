<?
	# connect to statistics modules
	include("stat/stat_setup/setup.php");
	include("stat/stat_words/words_setup.php");
	include("stat/stat_func/func_update.php");
	include("stat/stat_func/func_show.php");
	include("stat/stat_func/func_sector.php");

	if($HTTP_POST_VARS[sector_title]) {
		STAT_new_sector();
	}
	if($HTTP_GET_VARS[del_sector]) {
		STAT_del_sector();
	}
#	if($HTTP_GET_VARS[update_stat]) {
		STAT_update();
#	}
	
	$PARTS[center_up] = STAT_show_main().
			    STAT_show_from().
			    STAT_show_sectors();;

?>
