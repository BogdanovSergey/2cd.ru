<?
	function ORD_generate($ORDER_ID,$IS_HTML,$JUST_COUNT) {
		global $MY;
		global $WORDS;
		global $ALREADY;
		global $SESSION;
		global $ORDER_INFO;
		global $HTTP_GET_VARS;
		global $ADMIN_CONNECTED;
		$ORDER_INFO		= array();
		$ORDER_INFO[real_items]	= 0;
		$ORDER_INFO[real_levels]= 0;
		$ORDER_INFO[levels]	= 0;
		$ORDER_INFO[disks]	= 0;
		$ORDER_INFO[price]	= 0;
		$ORDER_INFO[items]	= 0;
		$ORDER_INFO[added_files]= 0;
		$end			= "\x0D\x0A";
		$ID[goods]		= array();
		$ID[levels]		= array();
		$ID[cd_distrib]		= array();
		$ID[item_level]		= array();
		$sqlstr			= '';
		$WORDS[size_MB]		= 'mb';
		$WORDS[size_KB]		= 'kb';
		$CRC[items]		= 0;
		$CRC[html_items]	= 0;
		$CRC[levels]		= 0;
		settype($HTTP_GET_VARS[p],'integer');
		$NEEDED_CD		= $HTTP_GET_VARS[p];
		# retreive order data
		if($ADMIN_CONNECTED) {
			$res = mysql_query("SELECT id, product_id, level_id, amount FROM S_orders WHERE
									order_id=$ORDER_ID
									ORDER BY cd_number");
		} else {
			$res = mysql_query("SELECT id, product_id, level_id, amount FROM S_basket WHERE
									key_id = $SESSION[key_id] and
									active = 1 and
									ready  = 0");
		}
		# get item id's from this order
		while($ord = mysql_fetch_object($res)) {
			if($ord->id) {
					if(!$ord->level_id) {
						$CRC[items]++;
						$ORDER_INFO[added_files]++;
						array_push($ID[goods],$ord->product_id);
						$ALREADY["p".$ord->product_id]	= $ord->amount;
					} else {
						$CRC[levels]++;
						$ORDER_INFO[levels]++;
						$tmp_ = mysql_query("SELECT id FROM S_levels WHERE id=$ord->level_id");
						$res_ = mysql_fetch_object($tmp_);
						$ID[levels] = ORD_get_links_from_level($ID[levels],$res_->id);
					}
			}
		}
		# make sql string for goods table (getting each item and level id's)
		foreach($ID[goods] as $g) {
			if($sqlstr) {$or='OR';}
			$sqlstr .= " $or id=$g ";
			$ORDER_INFO[real_items]++;
		}
		unset($or);
		foreach($ID[levels] as $l) {
			if($sqlstr) {$or='OR';}
			$sqlstr .= " $or link=$l ";
			$ORDER_INFO[real_levels]++;
#	$o++;print "$l<br>";
		}
#print "$sqlstr";exit;
#	print">$o<";exit;
		# query and count all data
		$CD		= 1;
		$size_per_cd	= 0;
		$files_per_cd	= 0;
		if(!$IS_HTML) {
			$DATA="ECHO /* ------- Writing CD 1 ------- */$end";}

		if($sqlstr) {
			$sqlstr="AND ($sqlstr)";
			$tmp = mysql_query("SELECT id,link,caption,filename,size,cd_number,description FROM S_goods WHERE
                                                                        active = 1
                                                                        AND cd_number>0
									$sqlstr
									ORDER BY cd_number,link");

		while($res = mysql_fetch_object($tmp)) {
			# change to next cd
			$ORDER_INFO[items]++;
			if($size_per_cd+$res->size>$MY[disk650_bytes]) {
				$CD++;
				if(!$ORDER_INFO[disks]) { $ORDER_INFO[disks]=2; }
				else { $ORDER_INFO[disks]++; }
				if(!$IS_HTML) {$DATA .= "ECHO /* ------- Writing status: files $files_per_cd, cdsize ".GOO_round_size($size_per_cd)." ------- */$end$end$end$end$end$end"."ECHO /* ------- Writing CD $CD ------- */$end"; }
				$size_per_cd	= 0;
				$files_per_cd	= 0;
				$ID[item_level]	= array();
			}
			# insert other distributive (BATCH)
			if(!$IS_HTML  && !in_array($res->cd_number,$ID[cd_distrib])) {
				$DATA .= "ECHO /* ------- Insert distrib CD $res->cd_number -------- */$end"."PAUSE$end";
				array_push($ID[cd_distrib],$res->cd_number);
			}
			# item level has changed (HTML)
			if($IS_HTML && ($NEEDED_CD==$CD) && !in_array(GOO_show_path($res->id,1),$ID[item_level])) {
				$p = GOO_show_path($res->id,1);
				$p_win = convert_cyr_string($p, 'k','w');
				$DATA .= "\t<tr bgcolor=\"#BBBBBB\"><td colspan=2> &nbsp; &nbsp; $p_win&nbsp;</td></tr>$end";
				array_push($ID[item_level],$p);
			}

			# main data assign engine
			
			if(!$JUST_COUNT && $res->link) {
				$PATH[from] = "idx".ORD_get_item_path($res->link)."\\$res->filename";
				$cd6_hack = 0;
				# small hack for cd6 !
				if($res->cd_number==6) {
					$cd6_hack = "$res->filename";
				}
			}
			
			
			if(!$IS_HTML) {
				$PATH[to]   = "cd$CD\\idx".ORD_get_item_path($res->link);
				if($cd6_hack == 0) {
					$path_f = $PATH[from];
				} else {
					$path_f = $cd6_hack;
				}
				$DATA .= "\t\t\t\t\tECHO $ORDER_INFO[items] processing: $res->filename \t(".GOO_round_size($res->size).")$end".
					 "\t\t\t\t\txcopy /Y /F /H /R /Z %1:\\".$path_f." %DIR%\\$PATH[to]\\$end";
			} else {
				if($NEEDED_CD==$CD) {
					if($cd6_hack == 0) {
						$path_to_f = $PATH[from];
					} else {
						$path_to_f = $cd6_hack;
					}
					$res_c_win = convert_cyr_string($res->caption, 'k','w');
					$res_d_win = convert_cyr_string($res->description, 'k','w');
					$DATA .="\t\t<tr bgcolor=white><td width=20% valign=top> <a href=\"$PATH[from]\">$res_c_win&nbsp;</a></td><td>$res_d_win</td></tr>$end";
					$CRC[html_items]++;
				}
			}
			$size_per_cd+= $res->size;
			$files_per_cd++;
			$ORDER_INFO[size]	+= $res->size;
			
			# count size and files for each cd
			if(!$ORDER_INFO["cd$CD"."size"]) {
				$ORDER_INFO["cd$CD"."size"]  = $res->size;
			} else {
				$ORDER_INFO["cd$CD"."size"] += $res->size;
			}
			
			if(!$ORDER_INFO["cd$CD"."files"]) {
				$ORDER_INFO["cd$CD"."files"]= 1;
			} else {
				$ORDER_INFO["cd$CD"."files"]++;
			}
		}
		}

# few fixes
		# if we have 1 small cd...
		if(!$ORDER_INFO[disks] && $ORDER_INFO["cd1size"]>$MY[disk_minimum]) {
			$ORDER_INFO[disks]=1;
		}

		# count last cd size
		$tmp=$CD+1;
		if($ORDER_INFO["cd$tmp"."size"]>$MY[disk_minimum]) {
			$CD++;
		}

#	print   $ORDER_INFO[items]."<br>".
#                $ORDER_INFO[disks];
#                exit;

		# prepare file for downloading
		if(!$JUST_COUNT) {
			if(!$IS_HTML) {
				# show all cd's brief status
				for($i=1;$i<=$CD;$i++) {
					$DATA_all_cd .= "ECHO CD $i:\t".GOO_round_size($ORDER_INFO["cd$i"."size"])."\t".$ORDER_INFO["cd$i"."files"]." files$end";
				}
				$out	 =
				"@ECHO OFF				$end".
				"CLS					$end".
				"ECHO \"Order Maker 1.2\"	$end".
				"ECHO Order size is ".GOO_round_size($ORDER_INFO[size]).$end.
				"ECHO There are $ORDER_INFO[items] files$end".
				"IF (%1)==() goto ERROR$end".
				"SET DIR=order$ORDER_ID$end".
				"MKDIR %DIR%$end$end".
				"$DATA_all_cd$end$end$end";
			} else {
				$out =	"<html><body bgcolor=white><table border=0 cellpadding=0 cellspacing=0 align=center width=100%><tr><td bgcolor=black>".
					"<table border=0 align=center cellpadding=1 cellspacing=1 width=100%>$end";
			}
			$out = $out.$DATA;
		}


#				$out .= "\tECHO $key processing: $SOFT[$key] (".GOO_round_size($SOFT_SIZE[$key]).")$end".
#					"\t\t\txcopy /Y /F /H /R /Z %1:\\".$SOFT_CD_FOLDER[$key]."\\$SOFT[$key] %DIR%\\$cdpath\\$SOFT_CD_FOLDER_TO[$key]\\$end";
				# making HTML structure
#				if($NEEDED_CD==$cd) {
#					if(!in_array($LEVEL[$key],$levs)) {
#                                		array_push($levs,$LEVEL[$key]);
#						$out .= "\t<tr bgcolor=\"#BBBBBB\"><td> &nbsp; &nbsp; $LEVEL[$key]&nbsp;</td></tr>$end";
#                        		}
#					$out .= "\t<tr bgcolor=white><td> &nbsp; &nbsp; <a href=\"$SOFT_CD_FOLDER_TO[$key]\\$SOFT[$key]\">$CAPTION[$key]&nbsp;</a></td></tr>$end";



		# finish all operations with file
		if(!$JUST_COUNT) {
			if(!$IS_HTML) {
				$out .= "ECHO /* ------- Writing status: files $files_per_cd, cdsize ".GOO_round_size($size_per_cd)." ------- */$end$end$end$end$end$end".
					"ECHO /* ------- GLOBAL WRITING STATUS: files $ORDER_INFO[items], cdsize ".GOO_round_size($ORDER_INFO[size])." ------ */$end$end$end";
				$out .=
					"GOTO END$end".
					":ERROR$end".
					"ECHO.$end".
					"ECHO   This programm must be executed with parameter:$end".
					"ECHO   make.bat X$end".
					"ECHO   Where \"X\" is your CD drive$end".
					":END.$end";
			} else {
				$wf = convert_cyr_string($WORDS[files], 'k','w');
				$out .= "</table></td></tr><tr><td align=right>$wf $CRC[html_items]</td></tr></table></body></html>";
			}

			header('HTTP/1.1 200 OK');
            		header('Date: Tue, 26 Feb 2002 10:00:00 GMT');
			header('Content-Length: '.strlen($out));
            		header('Last-Modified: Tue, 11 Feb 2002 18:00:00 GMT');
            		header('ETag: "1a4832-9000-3beec00a"');
            		header('Accept-Ranges: bytes');
            		header('Connection: close');
            		header('Content-type: application/octet-stream');
			print $out;
		}
		# COUNT ORDER PRICE
		$t_count_free = 3;
		$ORDER_INFO[price]	= $ORDER_INFO[disks]*$MY[disk_price];
		$t_free_cd = $ORDER_INFO[disks]/$t_count_free;
		settype($t_free_cd,'integer');
		$ORDER_INFO[price] = $ORDER_INFO[price] - ($MY[disk_price]*$t_free_cd);
		return $CD;
	}


	function ORD_get_item_path($mylevel) {
		$out = $mylevel;
		if($mylevel) {
			$tmp = @mysql_query("SELECT link FROM S_levels WHERE id=$mylevel");
			$res = @mysql_fetch_object($tmp);
			if($res->link)  { $out=$res->link;	}
		}
		return $out;
	}


	function ORD_get_links_from_level($list,$level) {
		global $ALREADY;
		$ALREADY["l$level"] = 1;
		array_push($list,$level);
		$tmp = @mysql_query("SELECT id FROM S_levels WHERE link=$level AND active=1");
		while($res = mysql_fetch_object($tmp)) {
			if($res->id > 0) {
				array_push($list,$res->id);
				$ALREADY["l".$res->id] = 1;
			}
		}
		return $list;
	}



?>
