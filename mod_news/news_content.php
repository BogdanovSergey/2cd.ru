<?




	function NEW_show_small_content() {
		global $MY;
		global $WORDS;
		$res = mysql_query("SELECT id,caption,big_content,image1 FROM S_news ORDER BY id DESC LIMIT $MY[news_at_start]");
		while($r = mysql_fetch_object($res)) {
			$r->big_content = substr($r->big_content,0,80).'...';
			if($r->image1) {$img = "<img src=\"/$r->image1\" border=0 align=left>";} else { $img=''; }
			$out .= '<tr><td>'.$img.' <b>'.$r->caption.'</b><br><a href="?user=news&news='.$r->id.'">'.$r->big_content."</a></td></tr>\n";
		}

		$out .= '<tr><td><a href="?user=news&news=archive">'.$WORDS[news_archive].'</a></td></tr>';
		return "<table>$out</table>";
	}





	function NEW_show_all() {
		global $WORDS;
		$res = mysql_query("SELECT id,caption,big_content FROM S_news ORDER BY id DESC");
		while($r = mysql_fetch_object($res)) {
			$r->big_content = substr($r->big_content,0,80).'...';
			$out .= '<tr><td><a href="?user=news&news='.$r->id.'" align=left>'.$r->big_content."</a></td></tr>\n";
		}

		$out .= '<tr><td><a href="?user=news&news=archive">'.$WORDS[news_archive].'</a></td></tr>';
		return "<table>$out</table>";
	}














?>
