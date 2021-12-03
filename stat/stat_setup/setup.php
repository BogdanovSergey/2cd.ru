<?

####### DataBase setup
	if($SERVER_ADMIN == '****') {
		$DB_login		=	'***';
		$DB_password		=	'***';
		$DB_database		=	'***';
	} else {
		$DB_login		=	'*****';
		$DB_password		=	'***';
		$DB_database		=	'';
	}
	$DB_host			=	'localhost';

	$MY[reset_db]			=	0;
	$MY[cookie_exp]			=	time()+1800;
	$MY[site]			=	1;



#	$MY[]	=	;
#	$MY[]	=	;



?>
