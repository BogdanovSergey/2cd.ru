<?
	$CURRENT_POSITION	= 	'search';
	$TITLE			= 	$WORDS[title_search];
	$DESCRIPTION 		= 	$WORDS[description_search];	
	$KEYWORDS 		= 	$WORDS[keywords_search];
	include('mod_search/search_form.php');


	if(strlen($HTTP_GET_VARS[words])>1) {
		include('mod_search/step_results.php');
		include('mod_search/search_search.php');
		$CONTENT[search_results] = SEA_search();
	} else {
		$CONTENT[search_results] = "$WORDS[search_results]<br>$WORDS[no_search]";
	}



	SEA_make_form();




?>
