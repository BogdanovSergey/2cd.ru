<?

	$ie = 'MSIE';

	if(preg_match("/$ie/i",$HTTP_USER_AGENT)) {
	    # load design for internet explorer
	    
	    $DESIGN[simple_textbox]	=	'';
	    $DESIGN[simple_textarea]	=	'';
	    $DESIGN[search_textbox]	=	'size=10';
	    $DESIGN[simple_]	=	'';
	    $DESIGN[simple_]	=	'';
	    $DESIGN[simple_]	=	'';
	    $DESIGN[simple_]	=	'';
	    $DESIGN[simple_]	=	'';
	
	
	} else {
	    # other browser
	    $DESIGN[search_textbox]	=	'size=10';
	
	
	}








?>