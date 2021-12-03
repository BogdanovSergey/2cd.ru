<?






	if(!$HTTP_GET_VARS[news]) {
		# show small content
		include('mod_news/news_content.php');
		# show news contents in different places
		if($ADMIN_CONNECTED) {
			$CONTENT[news_list] = NEW_show_small_content();
		} else {
			$CONTENT[news_list] = NEW_show_small_content();
		}

	} elseif($HTTP_GET_VARS[news]=='archive') {
		# ahow all content
		include('mod_news/news_content.php');
		include('mod_news/news_show_archive.php');
		$CONTENT[news_list] = NEW_show_archive();

	} elseif($HTTP_GET_VARS[news]>0) {
		# show one event
		include('mod_news/news_content.php');
		include('mod_news/news_show_one.php');
		$CONTENT[news_list]	= NEW_show_small_content();
		$CONTENT[news_inside]	= NEW_show_one();
	}











?>
