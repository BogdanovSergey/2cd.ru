<?
	$CURRENT_POSITION	= 	'authors';
	$TITLE			= 	$WORDS[title_authors];
	$DESCRIPTION 		= 	$WORDS[description_authors];
	$KEYWORDS 		= 	$WORDS[keywords_authors];
	include('mod_authors/authors_forms.php');
	include('mod_authors/authors_upload.php');

	if($HTTP_POST_VARS[part]=='upload') {
		$CONTENT[authors] = AUTHOR_upload();
	} else {
		$CONTENT[authors] = AUTHOR_show_greet_form();
	}



?>
