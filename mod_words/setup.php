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

	$WORDS[copyright]		.=	'www.2cd.ru &copy; 2000-2002 ��� ����� ��������.';
	$WORDS[global_mb]		.=	'��';
	$WORDS[size_MB]			.=	'��';
	$WORDS[size_KB]			.=	'k�';
	$WORDS[RUB]			.=	'������';
	$WORDS[global_login]		.=	'�����';
	$WORDS[global_passwd]		.=	'������';
	$WORDS[global_price]		.=	'������';
	$WORDS[global_taken]		.=	'�������';
	$WORDS[global_times]		.=	'���';
	$WORDS[size]			.=	'������';
	$WORDS[disk]			.=	'����';
	$WORDS[price]			.=	'����';
	$WORDS[files]			.=	'������';
	$WORDS[author]			.=	'�����';
	$WORDS[refresh]			.=	'��������';
	$WORDS[amount]			.=	'����������';
	$WORDS[date]			.=	'����';
	$WORDS[abc]			.=	'����� �� ��������';
	$WORDS[itogo]			.=	'�����';
	$WORDS[last_reg_time]		.=	'����� ��������� �����������';
	$WORDS[others]			.=	'������';
	$WORDS['delete']		.=	'�������';
	$WORDS[already_added]		.=	'(��������)';
	$WORDS[product_absent]		.=	'������ ������� �����������';
	$WORDS[close_window]		.=	'������� ����';
	$WORDS[go_to_site]		=	array('����� �� ','����');
	$WORDS[show_last_items]		=	array('���������� ������');
	$WORDS['sort']			=	array('����������� ��','��������','�������');
	$WORDS[new_goods_caption]	.=	'�������� ���������';
	$WORDS[new_goods_size]		.=	'������';
	$WORDS[new_goods_buy]		.=	'&nbsp;';
	$WORDS[rating]			.=	'�������';
	$WORDS[items_per_page]		.=	'������ �� ��������';

	$WORDS[download]		.=	'�������';
	$WORDS[downloads]		.=	'����������';

	$WORDS[add_form_product]	.=	'�� �������� ��������� �������:';
	$WORDS[add_form_product_no]	.=	'���� ������� ��� ���� � ����� �������!';
	$WORDS[add_form_level]		.=	'�� �������� ��������� ������:';
	$WORDS[add_form_level_no]	.=	'���� ������ ��� ���� � ����� �������!';
	$WORDS[automatic_close]		.=	'���� ��������� ������������� ����� 2 ���.';

	$WORDS[simple_caption]		.=	'��������';
	$WORDS[simple_activity]		.=	'����������';
	$WORDS[simple_new]		.=	'�����';
	$WORDS[simple_description]	.=	'��������';
	$WORDS[simple_download_url]	.=	'���� �� download.ru';
	$WORDS[simple_discuss_url]	.=	'���� ��� ����������';
	$WORDS[simple_real_url]		.=	'�������� ����';
	$WORDS[simple_about_url]	.=	'���� �� ����';
	$WORDS[simple_filename]		.=	'��� �����';
	$WORDS[simple_size]		.=	'������';
	$WORDS[simple_all_size]		.=	'������ ����';
	$WORDS[simple_amount]		.=	'����������';
	$WORDS[simple_items_amount]	.=	'���������� ������';
	$WORDS[simple_levels_amount]	.=	'���������� �������';
	$WORDS[simple_author]		.=	'�����';
	$WORDS[simple_maker]            .=      '�����';
	$WORDS[simple_components]	.=	'����������';
	$WORDS[simple_createtime]	.=	'����� ��������';
	$WORDS[simple_old_price]	.=	'������ ����';
	$WORDS[simple_new_price]	.=	'����� ����';
	$WORDS[simple_small_img]	.=	'�������� (������.)';
	$WORDS[simple_big_img]		.=	'�������� (�����.)';
	$WORDS[simple_small_img_loc]	.=	'����� �������� (������.)';
	$WORDS[simple_big_img_loc]	.=	'����� �������� (�����.)';
	$WORDS[simple_currency]		.=	'������';
	$WORDS[simple_type]		.=	'���';
	$WORDS[simple_cd_number]	.=	'����� �����';


	$WORDS[btn_add_product]		.=	'�������� �������';
	$WORDS[btn_update_product]	.=	'�������� �������';
#	$WORDS[simple_]		.=	'';
#	$WORDS[simple_]		.=	'';
	
	
	$WORDS[product_closed]		.=	'������ � �������� ������!';
	$WORDS[product_opened]		.=	'������ � �������� ������!';
#############################
	$WORDS[news_archive]		.=	'����� ��������';
	$WORDS[forget_password]		.=	'���� �� ������ ������...';


#############################
	$WORDS[hello_user]		.=	'������������';
	$WORDS[user_status]		.=	'������:';
	$WORDS[user_ok]			.=	'��������������� � �������';
	$WORDS[user_notok]		.=	'����������������� � �������';
	$WORDS[user_basket]		.=	'��������� ������ ������:';
	$WORDS[user_enter]		.=	'���� ��� ������������������';
	$WORDS[user_alertinfo]		.=	'������������:';
	$WORDS[user_basketsize]		.=	'����� ������:';
	$WORDS[user_amount_disks]	.=	'���-�� ������:';
	$WORDS[user_ready_price]	.=	'����� � ������:';
	$WORDS[user_want_news]		.=	'��������';
	$WORDS[user_items_in_bask]	.=	'��������� ������:';
	$WORDS[user_levels_in_bask]	.=	'��������� �������:';
	$WORDS[user_last_items_in_bask]	 =	array('���������','����������� ������:');
	$WORDS[user_last_levels_in_bask] =	array('���������','����������� �������:');
	$WORDS[user_all_items_in_bask]	.=	'��� �����';
	$WORDS[user_all_levels_in_bask]	.=	'��� ������';
	$WORDS[user_show_other_goods]	.=	'�������� ��� ���������...';
	$WORDS[user]		.=	'';
	$WORDS[user]		.=	'';

#########################
	$WORDS[no_layers_support]	.=	'You browser doesn\'t support layers, please update your browser!';
	$WORDS[no_layers_support_empty]	.=	'&nbsp;';
#########################
	$WORDS[goto_basket]		.=	'���������� �������';
#########################

	$WORDS[make_order]		.=	'�������� �����';
	$WORDS[order_amount_items]	.=	'���-�� ���� ������';
	$WORDS[order_amount_levels]	.=	'���-�� �����';
	$WORDS[order_amount_disks]	.=	'���-�� ������';
	$WORDS[order_ready_disks]	.=	'����� ���-�� ������';
	$WORDS[order_ready_size]	.=	'����� ������ ����';
	$WORDS[order_ready_price]	.=	'����� ����� � ������';
	$WORDS[order_items]		.=	'������� ������';
	$WORDS[order_size]		.=	'������ ������';
	$WORDS[disk_minimum]		.=	'����������� ������ �����:<br>���� ���� �� ����� ������ ������� <font color=red>�������</font>, �� ���������� ����� �� ����� ������ ����������� ��������. ���� ���� ����� �������� �� ������. �� ��������� ����� ������ �������� ������ ���������<br>';
	$WORDS[disk_minimum_is]		.=	'����������� ������ ����� �����';
	$WORDS[basket_show]		 =	'�������� �������';
	$WORDS[basket_show_brief]	.=	'�������� ������ � ����� ����';
	$WORDS[basket_show_all]		.=	'���������� / �������� ���';
	$WORDS[basket_empty]		.=	'��� ����� ����';

	$WORDS[basket_show_br]		 =	'';
	$WORDS[basket_status]		 =	'';
	$WORDS[basket_status]		 =	'';
#########################
	$WORDS[cat_capt_tree]		.=	'������ ���������';
	$WORDS[cat_capt_subgr_amount]	.=	'��������';
	$WORDS[cat_capt_items_amount]	.=	'���������';
	$WORDS[cat_capt_size]		.=	'������';
	$WORDS[cat_capt_add_level]	.=	'�������� ����';



#	$WORDS[]	.=	'';




?>
