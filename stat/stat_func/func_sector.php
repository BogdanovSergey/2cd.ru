<?

	function STAT_new_sector() {
		global $MY;
		global $HTTP_POST_VARS;
		mysql_query("INSERT INTO STAT_sectors(site_id,sector_id,sector_title,clicks,hosts)
					VALUES('$MY[site]','$HTTP_POST_VARS[sector_id]','$HTTP_POST_VARS[sector_title]',0,0)");
	}
	
	
	function STAT_del_sector() {
		global $MY;
		global $HTTP_GET_VARS;
		mysql_query("DELETE FROM STAT_sectors WHERE site_id=$MY[site] AND id=$HTTP_GET_VARS[del_site]");
	}
?>