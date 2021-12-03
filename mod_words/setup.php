<?
	include("mod_words/words_dynamenu.php"); # must be first!
	include("mod_words/words_greeting.php");
	include("mod_words/site_banners.php");
	include("mod_words/words_remind.php");
	include("mod_words/words_top100.php");
	include("mod_words/words_titles.php");
	include("mod_words/words_admin.php");
	include("mod_words/words_meta.php");
	include("mod_words/words_news.php");
	include("mod_words/words_cyr.php");

	include("mod_words/words_reg.php");
	include("mod_words/search.php");
	include("mod_words/words_authors.php");

	include("mod_words/metro.php");
	include("mod_words/city.php");
	include("mod_words/alt.php");

	$WORDS[copyright]		.=	'www.2cd.ru &copy; 2000-2002 Все права защищены.';
	$WORDS[global_mb]		.=	'мб';
	$WORDS[size_MB]			.=	'мб';
	$WORDS[size_KB]			.=	'kб';
	$WORDS[RUB]			.=	'рублей';
	$WORDS[global_login]		.=	'Логин';
	$WORDS[global_passwd]		.=	'Пароль';
	$WORDS[global_price]		.=	'Размер';
	$WORDS[global_taken]		.=	'скачано';
	$WORDS[global_times]		.=	'раз';
	$WORDS[size]			.=	'Размер';
	$WORDS[disk]			.=	'Диск';
	$WORDS[price]			.=	'Цена';
	$WORDS[files]			.=	'Файлов';
	$WORDS[author]			.=	'Автор';
	$WORDS[refresh]			.=	'Обновить';
	$WORDS[amount]			.=	'Количество';
	$WORDS[date]			.=	'Дата';
	$WORDS[abc]			.=	'Имена по алфавиту';
	$WORDS[itogo]			.=	'ИТОГО';
	$WORDS[last_reg_time]		.=	'Время последней регистрации';
	$WORDS[others]			.=	'Другие';
	$WORDS['delete']		.=	'Удалить';
	$WORDS[already_added]		.=	'(добавлен)';
	$WORDS[product_absent]		.=	'Видимо продукт отсутствует';
	$WORDS[close_window]		.=	'Закрыть окно';
	$WORDS[go_to_site]		=	array('Зайти на ','сайт');
	$WORDS[show_last_items]		=	array('Количество единиц');
	$WORDS['sort']			=	array('Сортировать по','названию','размеру');
	$WORDS[new_goods_caption]	.=	'Название программы';
	$WORDS[new_goods_size]		.=	'Размер';
	$WORDS[new_goods_buy]		.=	'&nbsp;';
	$WORDS[rating]			.=	'рейтинг';
	$WORDS[items_per_page]		.=	'Единиц на странице';

	$WORDS[download]		.=	'Скачать';
	$WORDS[downloads]		.=	'скачиваний';

	$WORDS[add_form_product]	.=	'Вы добавили следующий продукт:';
	$WORDS[add_form_product_no]	.=	'Этот продукт уже есть в вашей корзине!';
	$WORDS[add_form_level]		.=	'Вы добавили следующий раздел:';
	$WORDS[add_form_level_no]	.=	'Этот раздел уже есть в вашей корзине!';
	$WORDS[automatic_close]		.=	'Окно закроется автоматически через 2 сек.';

	$WORDS[simple_caption]		.=	'Название';
	$WORDS[simple_activity]		.=	'Активность';
	$WORDS[simple_new]		.=	'Новый';
	$WORDS[simple_description]	.=	'Описание';
	$WORDS[simple_download_url]	.=	'Линк на download.ru';
	$WORDS[simple_discuss_url]	.=	'Линк для обсуждения';
	$WORDS[simple_real_url]		.=	'Реальный линк';
	$WORDS[simple_about_url]	.=	'Линк на сайт';
	$WORDS[simple_filename]		.=	'Имя файла';
	$WORDS[simple_size]		.=	'Размер';
	$WORDS[simple_all_size]		.=	'Размер всех';
	$WORDS[simple_amount]		.=	'Количество';
	$WORDS[simple_items_amount]	.=	'Количество единиц';
	$WORDS[simple_levels_amount]	.=	'Количество уровней';
	$WORDS[simple_author]		.=	'Автор';
	$WORDS[simple_maker]            .=      'Автор';
	$WORDS[simple_components]	.=	'Компоненты';
	$WORDS[simple_createtime]	.=	'Время создания';
	$WORDS[simple_old_price]	.=	'Старая цена';
	$WORDS[simple_new_price]	.=	'Новая цена';
	$WORDS[simple_small_img]	.=	'Картинка (маленк.)';
	$WORDS[simple_big_img]		.=	'Картинка (больш.)';
	$WORDS[simple_small_img_loc]	.=	'Адрес картинки (маленк.)';
	$WORDS[simple_big_img_loc]	.=	'Адрес картинки (больш.)';
	$WORDS[simple_currency]		.=	'Валюта';
	$WORDS[simple_type]		.=	'Тип';
	$WORDS[simple_cd_number]	.=	'Номер диска';


	$WORDS[btn_add_product]		.=	'Добавить продукт';
	$WORDS[btn_update_product]	.=	'Обновить продукт';
#	$WORDS[simple_]		.=	'';
#	$WORDS[simple_]		.=	'';
	
	
	$WORDS[product_closed]		.=	'Доступ к продукту ЗАКРЫТ!';
	$WORDS[product_opened]		.=	'Доступ к продукту ОТКРЫТ!';
#############################
	$WORDS[news_archive]		.=	'Архив новостей';
	$WORDS[forget_password]		.=	'Если Вы забыли пароль...';


#############################
	$WORDS[hello_user]		.=	'Здравствуйте';
	$WORDS[user_status]		.=	'Статус:';
	$WORDS[user_ok]			.=	'зарегистрирован в системе';
	$WORDS[user_notok]		.=	'незарегистрирован в системе';
	$WORDS[user_basket]		.=	'Состояние Вашего заказа:';
	$WORDS[user_enter]		.=	'Вход для зарегистрированных';
	$WORDS[user_alertinfo]		.=	'Пользователь:';
	$WORDS[user_basketsize]		.=	'Общий размер:';
	$WORDS[user_amount_disks]	.=	'Кол-во дисков:';
	$WORDS[user_ready_price]	.=	'Сумма к оплате:';
	$WORDS[user_want_news]		.=	'Подписка';
	$WORDS[user_items_in_bask]	.=	'Добавлено файлов:';
	$WORDS[user_levels_in_bask]	.=	'Добавлено уровней:';
	$WORDS[user_last_items_in_bask]	 =	array('Последние','добавленных файлов:');
	$WORDS[user_last_levels_in_bask] =	array('Последние','добавленных уровней:');
	$WORDS[user_all_items_in_bask]	.=	'Все файлы';
	$WORDS[user_all_levels_in_bask]	.=	'Все уровни';
	$WORDS[user_show_other_goods]	.=	'Показать все остальные...';
	$WORDS[user]		.=	'';
	$WORDS[user]		.=	'';

#########################
	$WORDS[no_layers_support]	.=	'You browser doesn\'t support layers, please update your browser!';
	$WORDS[no_layers_support_empty]	.=	'&nbsp;';
#########################
	$WORDS[goto_basket]		.=	'Посмотреть корзину';
#########################

	$WORDS[make_order]		.=	'Оформить заказ';
	$WORDS[order_amount_items]	.=	'Кол-во всех файлов';
	$WORDS[order_amount_levels]	.=	'Кол-во папок';
	$WORDS[order_amount_disks]	.=	'Кол-во дисков';
	$WORDS[order_ready_disks]	.=	'ИТОГО кол-во дисков';
	$WORDS[order_ready_size]	.=	'ИТОГО размер всех';
	$WORDS[order_ready_price]	.=	'ИТОГО сумма к оплате';
	$WORDS[order_items]		.=	'Добавил единиц';
	$WORDS[order_size]		.=	'Размер заказа';
	$WORDS[disk_minimum]		.=	'Минимальный размер диска:<br>если один из Ваших дисков выделен <font color=red>красным</font>, то занимаемое место на диске меньше допустимого минимума. Этот диск будет исключен из заказа. Во избежание этого просто добавьте больше продуктов<br>';
	$WORDS[disk_minimum_is]		.=	'Минимальный размер диска равен';
	$WORDS[basket_show]		 =	'Просмотр корзины';
	$WORDS[basket_show_brief]	.=	'Просмотр кратко в новом окне';
	$WORDS[basket_show_all]		.=	'Посмотреть / Изменить все';
	$WORDS[basket_empty]		.=	'Ваш заказ пуст';

	$WORDS[basket_show_br]		 =	'';
	$WORDS[basket_status]		 =	'';
	$WORDS[basket_status]		 =	'';
#########################
	$WORDS[cat_capt_tree]		.=	'Дерево каталогов';
	$WORDS[cat_capt_subgr_amount]	.=	'Подгрупп';
	$WORDS[cat_capt_items_amount]	.=	'Продуктов';
	$WORDS[cat_capt_size]		.=	'Размер';
	$WORDS[cat_capt_add_level]	.=	'Добавить весь';



#	$WORDS[]	.=	'';




?>
