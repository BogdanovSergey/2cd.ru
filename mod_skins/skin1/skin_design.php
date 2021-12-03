<?

	include("mod_skins/$SKIN_DIR/skin_images.php");
	include("mod_skins/$SKIN_DIR/skin_colors.php");
	
	$ie_compatible[0] = 'Mozilla\/5\.0';
	$ie_compatible[1] = 'MSIE';
	if( preg_match("/$ie_compatible[0]/i",$HTTP_USER_AGENT) ||
	    preg_match("/$ie_compatible[1]/i",$HTTP_USER_AGENT)) {
		    $IE_COMPAT			=	1;
        	    # load design for MS INTERNET EXPLORER
		    $DESIGN[textbox_simple]	=	'';
		    $DESIGN[textbox_reg]	=	'size=40 class=FormsOrange';
		    $DESIGN[textbox_reg2]	=	'size=20 class=FormsOrange';
		    $DESIGN[textarea_simple]	=	'rows=10 cols=50 class=FormsOrange';
		    $DESIGN[textbox_search]	=	'size=40 class=Forms';
		    $DESIGN[textbox_head_search]=	'size=25 class=FormsOrange';
		    $DESIGN[textbox_authors_add]=	'size=50 class=Forms';
		    $DESIGN[search]     	=       'class=Forms';
		    $DESIGN[textbox_auth]	=	'size=20 class=FormsOrange';
		    $DESIGN[order_select]	=	'class=select';
		    $DESIGN[cat_iframe_x]	=	'651';
		    $DESIGN[cat_iframe_y]	=	'202';
		    $DESIGN[btn]		=	'class=FormsOrange';
		    $DESIGN[white]		=	'size=30 class=FormsWhite';
		    $DESIGN[select]		=	'class=FormsOrange';

		    $DESIGN[simple]	=	'';
		    $DESIGN[simple]	=	'';
		    $DESIGN[simple]	=	'';
		    $DESIGN[simple]	=	'';
	
	
	} else {
		    # other browser
		    $DESIGN[textbox_reg]	=	'size=20';
		    $DESIGN[textbox_reg2]	=	'size=10';

		    $DESIGN[cat_iframe_x]	=	'640';
		    $DESIGN[cat_iframe_y]	=	'202';
		    $DESIGN[textbox_search]	=	'size=15';
		    $DESIGN[textbox_head_search]=       'size=10';
		    $DESIGN[textbox_auth]	=	'size=6';
	
	
	}






?>
