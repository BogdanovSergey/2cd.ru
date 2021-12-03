<?

	include("mod_words/words_about.php");
	$CURRENT_POSITION	=	'about';
	$TITLE			=	$WORDS[title_about];
	$DESCRIPTION		=	$WORDS[description_about];
	$KEYWORDS 		= 	$WORDS[keywords_about];

	$all_info		.=	$WORDS[about_who_we_are];
	$all_info		.=	$WORDS[about_why_we];
	$all_info		.=	$WORDS[about_our_production];
	$all_info		.=	$WORDS[about_our_service];
	$all_info		.=	$WORDS[about_our_delivery];
	$all_info		.=	$WORDS[about_for_authors];


#	$all_info		.=	$WORDS[about_];
#	$all_info		.=	$WORDS[about_];
#	$all_info		.=	$WORDS[about_];

	$CONTENT[about_info]	=	$all_info;


?>
