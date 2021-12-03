<?

	function STAT_update() {
		global $MY;
		global $STAT;
		global $FROM_READY_LINKS;
		
		# update brief statistics
		$tmp = mysql_query("SELECT COUNT(DISTINCT user_ip) FROM STAT_users WHERE site_id=$MY[site]");
		list($STAT[unique_hosts]) = mysql_fetch_row($tmp);
		
		$tmp = mysql_query("SELECT COUNT(DISTINCT identifyer) FROM STAT_users WHERE site_id=$MY[site]");
		list($STAT[hosts]) = mysql_fetch_row($tmp);

		$tmp = mysql_query("SELECT COUNT(id) FROM STAT_users WHERE site_id=$MY[site]");
		list($STAT[clicks]) = mysql_fetch_row($tmp);

		# update sectors statistics
		$tmp = mysql_query("SELECT id,sector_id FROM STAT_sectors WHERE site_id=$MY[site]");
		while($res = mysql_fetch_object($tmp)) {
			$SEC[hosts]	= 0;
			$SEC[clicks]	= 0;
			$tm = mysql_query("SELECT COUNT(DISTINCT identifyer) FROM STAT_users WHERE site_id=$MY[site] AND sector=$res->sector_id");
			list($SEC[hosts]) = mysql_fetch_row($tm);

			$tm = mysql_query("SELECT COUNT(id) FROM STAT_users WHERE site_id=$MY[site] AND sector=$res->sector_id");
			list($SEC[clicks]) = mysql_fetch_row($tm);
			
			mysql_query("UPDATE STAT_sectors SET hosts=$SEC[hosts], clicks=$SEC[clicks] WHERE id=$res->id");

		}

		# update "came from" table
		unset($FROM_LINKS);
		unset($FROM_READY_LINKS);
		$tmp = mysql_query("SELECT id,user_camefrom FROM STAT_users WHERE site_id=$MY[site]");
                while($res = mysql_fetch_object($tmp)) {
			if(!$FROM_LINKS[$res->user_camefrom]) {
				$FROM_LINKS["$res->user_camefrom"] = 1; }
			else {
				$FROM_LINKS["$res->user_camefrom"] += 1;
			}
		}
		while(list($link,$am) = each($FROM_LINKS)) {
			$tmplink = ereg_replace('http://','',$link);
			$tmplink = ereg_replace('www.','',$tmplink);
		#	$p = strpos($tmplink,':')
			$tmplink = substr($tmplink,0,strpos($tmplink,'/'));
			if(!$FROM_READY_LINKS["$tmplink"]) {
				$FROM_READY_LINKS["$tmplink"] = 1;
			} else {
				$FROM_READY_LINKS["$tmplink"] += 1;
			}
		}
		mysql_query("DELETE FROM STAT_camefrom WHERE site_id=$MY[site]");
		while(list($rlink,$ram) = each($FROM_READY_LINKS)) {
			if($rlink) {
				mysql_query("INSERT INTO STAT_camefrom(real_url,clicks,site_id) VALUES(
						'$rlink','$ram',$MY[site]
						)");
			}
		}

		
		$out = STAT_html_table(315,'<td colspan=2>&nbsp</td>','<tr bgcolor="#ffffff"><td>2</td></tr>');
		
		return $out;
	}

	
	
?>
