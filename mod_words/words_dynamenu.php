<?

	$WORDS[menu_main]		.=	'�������';
	$WORDS[menu_about]		.=	'� ���';
	$WORDS[menu_catalog]		.=	'������� ��������';
	$WORDS[menu_top100]		.=	'������ ����';
	$WORDS[menu_register]		.=	'�����������';
	$WORDS[menu_authors]		.=	'��� �������';
	$WORDS[menu_setup]		.=	'��� ���������';
	$WORDS[menu_search]		.=	'�����';
	$WORDS[menu_basket]		.=	'��� �������';


	$WORDS[amenu_main]		.=	'����������';
	$WORDS[amenu_admin]		.=	'��������������';
	$WORDS[amenu_catalog]		.=	'�������';
	$WORDS[amenu_orders]		.=	'������';
	$WORDS[amenu_users]		.=	'������������';
	$WORDS[amenu_news]		.=	'�������';
	$WORDS[amenu_stat]		.=	'����������';
	$WORDS[amenu_some]		.=	'��� ���-��';

	$WORDS[patch_soft]		.=	'����';
	$WORDS[menu_]		.=	'';
	$WORDS[menu_]		.=	'';
	$WORDS[menu_]		.=	'';



	if(preg_match('/\/1\//',$REQUEST_URI)) {
		$WORDS[menu_catalog]	=	'1';
		$WORDS[patch_soft]	=	'����';
	}
	if(preg_match('/\/2\//',$REQUEST_URI)) {
		$WORDS[menu_catalog]	=	'2';
		$WORDS[patch_soft]	=	'free soft';
	}

?>