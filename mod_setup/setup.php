<?

	include("mod_setup/setup_db.php");

	/*  System  */

    
#####################
	$MY[MB]				=	1048576;	# one megabyte in bytes
	$MY[create_if_absent]		=	0;		# Create new tables automaticly if they absent?
	$MY[round_all_sizes]		=	array($MY[MB],2);# first - round with,   second - precision
	$MY[round_all_goods_sizes]	=	array($MY[MB],2);# first - round with,   second - precision
	
	$MY[can_choose_amount]		=	0;		# User can choose the amount of goods to buy.
								# Also this var makes the ability to add few products to the basket
	$MY[bad_signs]			=	array('"',"'",'`','$','/',';');

#	$MY[goods_add_show_amount]	=	0;
	$MY[goods_add_show_img]		=	1;

	$MY[time_per_session]		=	(3600*24)*100;	# time between actions (1 hour= 3600)

# orders / disks
	$MY[disk_price]			=	90;
	$MY[disk650_bytes]		=	640*$MY[MB];	# size of 650 mb cd disk in bytes (max size of each disk to fill with soft)
	$MY[disk_minimum]		=	100*$MY[MB];	# minimum size of disk space to make an order
##########
	$MY[goods_per_page]		=	5;		# how many goods to show at catalog page by default
	$MY[news_at_start]		=	5;		# how many news to show at start page
	$MY[cut_goods_descr]		=	160;		# cut product description

	$MY[top100_show_levels_amount]	=	2;		# amount of best levels shown in top100 section
	$MY[top100_show_goods_amount]	=	4;		# amount of best goods shown in top100 section
	$MY[new_goods_amount]		=	30;		# amount of new goods shown in first section

	$MY[catalog_can_add_levels]	=	1;		# possibility to add whole levels into basket

	$MY[choose_amount_per_page]	=	array(5,10,30,100);
	$MY[choose_items_all_word]      =       'Все';
	$MY[choose_items_amount]	=	array(5,10,30,100,$MY[choose_items_all_word]);

	$MY[cancall_time]		=	array('immidiatly','work days','weekends','whole week');
	$MY[deliver_time]		=	array('immidiatly','work days','weekends','whole week');
	$MY[cancall_at]			=	array(	'as soon as possible',
							'morning 6:00-8:00',
							'morning 8:00-10:00',
							'morning 10:00-12:00',
							'midday  12:00-14:00',
							'midday  14:00-16:00',
							'midday  16:00-18:00',
							'evening 18:00-20:00',
							'evening 20:00-22:00',
							'evening 22:00-0:00',
							'night   0:00-6:00');
	$MY[deliver_at]			=	array(	'as soon as possible',
							'morning 6:00-8:00',
							'morning 8:00-10:00',
							'morning 10:00-12:00',
							'midday  12:00-14:00',
							'midday  14:00-16:00',
							'midday  16:00-18:00',
							'evening 18:00-20:00',
							'evening 20:00-22:00',
							'evening 22:00-0:00',
							'night   0:00-6:00');
################ Cascade style sheets for each skin
	$MY[css_location]			=	array(	'main.css',
								'main2.css',
								'main3.css');
	$MY[admin_css_location]			=	array(	'admin.css'); # for admin

################ colors succession at "new items" section

	$MY[hide_basket]			=	1;
	$MY[img_size_in_top100]		=	array(90,90);		# poster size in top100 section(1-heigth, 2-width)
	$MY[img_size_in_catalog]	=	array(100,100);		# poster size in catalog (1-heigth, 2-width)

######## IMAGES VIEW ###
	$MY[img_line_width]			=	280;		# width in pixels
########################

############### ADMIN ZONE SETUP !

	$MY[admin_show_goods_in_order]		=	1;

#	$MY[]	=	;
#	$MY[]	=	;
#	$MY[]	=	;
#	$MY[]	=	;




?>
