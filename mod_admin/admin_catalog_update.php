<?

	function ADM_update_whole_db() {
		# this will count only 2 level structure
		$tmpvar = mysql_query("SELECT id,depth FROM S_levels WHERE link=0 AND active=1");
		while($tmpres = mysql_fetch_object($tmpvar)) {
			if($tmpres->depth==1) {ADM_update_level_by_goods($tmpres->id);} else {
			    $tmpvar2 = mysql_query("SELECT id FROM S_levels WHERE link=$tmpres->id AND active=1");
			    while($tmpres2 = mysql_fetch_object($tmpvar2)) {
				# update 2nd step
				ADM_update_level_by_goods($tmpres2->id);
				#$tmpvar3 = mysql_query("SELECT COUNT(id),SUM(size) FROM S_goods WHERE link=$tmpres2->id AND active=1");
				#list($amount,$size) = array(0,0);
				#list($amount,$size) = mysql_fetch_row($tmpvar3);
				#mysql_query("UPDATE S_levels SET goods='$amount', size='$size' WHERE id=$tmpres2->id AND active=1");
			    }
			    # update 1st step
			    $tmpvar4 = mysql_query("SELECT SUM(goods),SUM(size) FROM S_levels WHERE link=$tmpres->id AND active=1");
			    list($amount,$size) = array(0,0);
			    list($amount,$size) = mysql_fetch_row($tmpvar4);
			    mysql_query("UPDATE S_levels SET goods='$amount', size='$size' WHERE id=$tmpres->id AND active=1");
			}
		}
	}
	
	function ADM_update_level_by_goods($link) {
		$tmp = mysql_query("SELECT COUNT(id),SUM(size) FROM S_goods WHERE link=$link AND active=1 AND cd_number>0");
		list($amount,$size) = array(0,0);
		list($amount,$size) = mysql_fetch_row($tmp);
		mysql_query("UPDATE S_levels SET goods='$amount', size='$size' WHERE id=$link AND active=1");
	}





	function ADM_update_primary_levels_groups($link) {
		# update amount of levels in primary level
		if($link) {
			# is there three levels ?
			$res = mysql_query("SELECT link FROM S_levels WHERE id=$link");
			$row = mysql_fetch_row($res);
			if($row[0]) {
				mysql_query("UPDATE S_levels SET groups=groups+1 WHERE id=$row[0]")
				|| die("Cant update amount of level groups");
			}

			mysql_query("UPDATE S_levels SET groups=groups+1 WHERE id=$link")
			|| die("Cant update amount of level groups");
		}

	}



	function ADM_update_primary_levels_goods($link,$size) {

		# update group info
		# is there two/three levels ?
		if(!$size) {$size=0;}
                $res = mysql_query("SELECT link FROM S_levels WHERE id=$link");
                $row = mysql_fetch_row($res);
                if($row[0]) {
			$res2 = mysql_query("SELECT link FROM S_levels WHERE id=$row[0]");
			$row2 = mysql_fetch_row($res2);
			if($row2[0]) {
				mysql_query("UPDATE S_levels SET goods=goods+1, size=size+$size WHERE id=$row2[0]")
				|| die("Cant update amount of level goods1");
			}
			mysql_query("UPDATE S_levels SET goods=goods+1, size=size+$size WHERE id=$row[0]")
			|| die("Cant update amount of level goods2");
                }

		mysql_query("UPDATE S_levels SET goods=goods+1, size=size+$size WHERE id=$link")
		|| die('Cant update product group');
		
								
	}






?>
