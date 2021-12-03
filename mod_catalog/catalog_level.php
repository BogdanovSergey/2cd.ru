<?

	function CAT_get_level($id) {
		global $CURR;
		if($id>0) {
			$res 		= mysql_query("SELECT * FROM S_levels WHERE id=$id");
			$row 		= mysql_fetch_object($res);
			$CURR[id]	= $row->id;		settype($CURR[id],	'integer');
			$CURR[level]	= $row->level;		settype($CURR[level],	'integer');
			$CURR[link]	= $row->link;		settype($CURR[link],	'integer');
			$CURR[depth]	= $row->depth;		settype($CURR[depth],	'integer');
			$CURR[caption]	= $row->caption;
			$CURR[active]	= $row->active;
			$CURR[groups]	= $row->groups;
			$CURR[goods]	= $row->goods;
			$CURR[isnew]	= $row->new;
			$CURR[time]	= $row->create_time;
		} else {
			$CURR[id]	= 0;
			$CURR[level]	= 0;
			$CURR[link]	= 0;
			$CURR[depth]	= 0;
		}
	}

	function CAT_count_all($link,$admin) {
		if($link) {
			global $CURR;
			$tok = settype($link,'integer');
			if(!$tok) {$link=0;}
			if(!$admin) $patch = ' and active=1 ';
			$res = mysql_query("SELECT COUNT(id) FROM S_goods WHERE link=$link $patch");
			$out = mysql_fetch_row($res);
			$CURR[all] = $out[0];
			return $CURR[all];
		}
	}


	function CAT_get_next_level() {
		global $CURR;
		if($CURR[level]==0) { $out = 1; }
		else		    { $out = $CURR[level]+1; }
		return $out;
	}

	function CAT_get_prev_id($id) {
		$res = mysql_query("SELECT link FROM S_levels WHERE id=$id");
		$row = mysql_fetch_row($res);
		return $row[0];
	}
	
	/* -------- Next three functions count size and amount of needed level ---------- */
	function CAT_update_level($id) {
		$llink	= $id;
		$ldepth = 2;
		$lsize	= 0;
		while($ldepth>1) {
			list($ldepth,$size,$llink) = CAT_count_level($llink);
			$lsize += $size;
		}
		$tmpres= mysql_query("SELECT COUNT(id) FROM S_goods WHERE link=$id and active=1");
		$tmpvar= mysql_fetch_row($tmpres);
		$lcount= $tmpvar[0];
		mysql_query("UPDATE S_levels SET goods=$lcount, size=$lsize WHERE id=$id");
		
		# updating upper level
		$tmpvar = mysql_query("SELECT link FROM S_levels WHERE id=$id");
		$tmpres = mysql_fetch_object($tmpvar);
		$link2	= $tmpres->link;
		if($link2>1) {
		        $size2	= 0;
			$amou2	= 0;
			$tmpvar = mysql_query("SELECT size,goods FROM S_levels WHERE link=$link2");
			while($tmpres = mysql_fetch_object($tmpvar)) {
				$size2 += $tmpres->size;
				$amou2 += $tmpres->goods;
			}
			mysql_query("UPDATE S_levels SET goods=$amou2, size=$size2 WHERE id=$link2");
			
			# updating more upper level
			$tmpvar = mysql_query("SELECT link FROM S_levels WHERE id=$link2");
			$tmpres = mysql_fetch_object($tmpvar);
			$link1	= $tmpres->link;
			if($link1>=1) {
				$size1	= 0;
				$amou1	= 0;
				$tmpvar = mysql_query("SELECT size,goods FROM S_levels WHERE link=$link1");
				while($tmpres = mysql_fetch_object($tmpvar)) {
					$size1 += $tmpres->size;
					$amou1 += $tmpres->goods;
				}
				mysql_query("UPDATE S_levels SET goods=$amou1, size=$size1 WHERE id=$link1");
				
			}
			
		}
		
		
	}


	function CAT_count_level($link) {
		#print "SELECT * FROM S_levels WHERE id=$link";exit;
		$tmpvar = mysql_query("SELECT * FROM S_levels WHERE id=$link");
		$tmpres = mysql_fetch_object($tmpvar);
		
		return array($tmpres->depth,CAT_get_level_size($link),$tmpres->link);
	}

	function CAT_get_level_size($id) {
		$size = 0;
		$tmpvar = mysql_query("SELECT size FROM S_goods WHERE link=$id and active=1");
		while($tmpres = mysql_fetch_object($tmpvar)) {
			$size += $tmpres->size;
		}
		return $size;
	}
	/* --------------------------------------- */

	function CAT_get_level_caption($id) {
		$tmpvar = mysql_query("SELECT caption FROM S_levels WHERE id=$id");
		$tmpres = mysql_fetch_object($tmpvar);
		return $tmpres->caption;
	}

?>
