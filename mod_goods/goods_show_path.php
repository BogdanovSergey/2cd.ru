<?
	function GOO_show_path($id,$nolinks) {
		$tmpvar = mysql_query("SELECT link FROM S_goods WHERE id=$id");
		$tmpres = mysql_fetch_object($tmpvar);
		$link	= $tmpres->link;
	
		$tmpvar	= mysql_query("SELECT id,link,caption FROM S_levels WHERE id=$link AND active=1");
		$res	= mysql_fetch_object($tmpvar);
		if($res->id) {
		    if($nolinks) {
			$part2	= "&gt;&gt;$res->caption";
		    } else {
			$part2	= "&gt;&gt;<a href=\"?user=catalog&id=$res->id\">$res->caption</a>";
		    }
		}



		$tmp	= mysql_query("SELECT id,caption FROM S_levels WHERE id=$res->link AND active=1");
		$res	= @mysql_fetch_object($tmp);
		if($res->id) {
		    if($nolinks) {
			$part1	= "&gt;&gt;$res->caption";
		    } else {
			$part1	= "&gt;&gt;<a href=\"?user=catalog&id=$res->id\">$res->caption</a>";
		    }
		}


		return $part1.$part2;
	}


?>
