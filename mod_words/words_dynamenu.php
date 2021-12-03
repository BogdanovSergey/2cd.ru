<?

	$WORDS[menu_main]		.=	'Витрина';
	$WORDS[menu_about]		.=	'О нас';
	$WORDS[menu_catalog]		.=	'Каталог программ';
	$WORDS[menu_top100]		.=	'Лучший софт';
	$WORDS[menu_register]		.=	'Регистрация';
	$WORDS[menu_authors]		.=	'Для авторов';
	$WORDS[menu_setup]		.=	'Мои настройки';
	$WORDS[menu_search]		.=	'Поиск';
	$WORDS[menu_basket]		.=	'Моя корзина';


	$WORDS[amenu_main]		.=	'Статистика';
	$WORDS[amenu_admin]		.=	'Администраторы';
	$WORDS[amenu_catalog]		.=	'Каталог';
	$WORDS[amenu_orders]		.=	'Заказы';
	$WORDS[amenu_users]		.=	'Пользователи';
	$WORDS[amenu_news]		.=	'Новости';
	$WORDS[amenu_stat]		.=	'Статистика';
	$WORDS[amenu_some]		.=	'Еще что-то';

	$WORDS[patch_soft]		.=	'диск';
	$WORDS[menu_]		.=	'';
	$WORDS[menu_]		.=	'';
	$WORDS[menu_]		.=	'';



	if(preg_match('/\/1\//',$REQUEST_URI)) {
		$WORDS[menu_catalog]	=	'1';
		$WORDS[patch_soft]	=	'софт';
	}
	if(preg_match('/\/2\//',$REQUEST_URI)) {
		$WORDS[menu_catalog]	=	'2';
		$WORDS[patch_soft]	=	'free soft';
	}

?>