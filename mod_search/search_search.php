<?
	function SEA_search() {
		global $MY;
		global $WORDS;
		global $COLORS;
		global $ALREADY;
		global $QUERY_STRING;
		global $HTTP_GET_VARS;
		$garbage = $HTTP_GET_VARS[words];
		$i = 1;
		$am= 0;
		$aa = $tam = $ga = 0;
		$HTTP_GET_VARS[words] = '';
		$HTTP_GET_VARS[search_in_news]    ? $in_news   =1 : $in_news	=0;
		$HTTP_GET_VARS[search_in_goods]   ? $in_goods  =1 : $in_goods	=0;
		$HTTP_GET_VARS[search_in_authors] ? $in_authors=1 : $in_authors	=0;
		if($HTTP_GET_VARS[logic])     { $logic = 1; $sqlword ='AND';} else
					      { $logic = 0; $sqlword = 'OR';}
		if($HTTP_GET_VARS[part] >= 1) { $part=$HTTP_GET_VARS[part]; }
		if($HTTP_GET_VARS[amount]==1) { $amount=10; $sam=1;}
		if($HTTP_GET_VARS[amount]==2) { $amount=30; $sam=2;}
                if($HTTP_GET_VARS[amount]==3) { $amount=50; $sam=3;}
                if($HTTP_GET_VARS[amount]==4) { $amount=100;$sam=4;}
                if(!$amount)		      { $amount=10; $sam=1;}
		# clear garbage
		$garbage = strtr($garbage,"\\",";");
		foreach($MY[bad_signs] as $sign) {
			$garbage = ereg_replace($sign,'',$garbage);
			$garbage = ereg_replace('  ','',$garbage);
			
		}
		$words = split(' ',$garbage);
		foreach($words as $word) {
			if(strlen($word)>1) {
				$HTTP_GET_VARS[words] .= "$word ";
				if(!$t){$t=1;}else{$mw=$sqlword;}
				if($in_goods) {
					$GOODS_SQL_TAIL	  .= " $mw (caption LIKE '%$word%' OR description LIKE '%$word%')";
				}
				if($in_authors) {
					$AUTHORS_SQL_TAIL .= " $mw (author LIKE '%$word%' OR email LIKE '%$word%')";
				}
				if($in_news) {
					$NEWS_SQL_TAIL    .= " $mw (caption LIKE '%$word%' OR big_content LIKE '%$word%')";
				}
			}
		}
		# remove last space
		$HTTP_GET_VARS[words] = substr($HTTP_GET_VARS[words],0,strlen($HTTP_GET_VARS[words])-1);
		$cut  = $MY[cut_goods_descr];
		$curc = $COLORS[catalog_goods][0];

		if($in_authors) {
		    $tmpvar = mysql_query("SELECT id,caption FROM S_goods WHERE active=1 AND ($AUTHORS_SQL_TAIL) ORDER BY link");
		    while($row = mysql_fetch_object($tmpvar)) {
				if(!$aa) { $aa= mysql_affected_rows(); }
				$g = GOO_get_product_by_id($row->id);
				if($g) {
					$cursize = 0;
					$added	 = 0;
					$cursize = GOO_round_product_size($g->size);
					if(strlen($g->description)>$cut) { $description = substr($g->description,0,$cut).'...';}
					else { $description = $row->description; }
					if($ALREADY["p".$g->id] || $ALREADY["l".$g->link]) {
					    if(!$ALREADY["p".$g->id]) { $ALREADY["p".$g->id]=1; }
					    $added = 1;
					}
				}
				if($part) {
					if($i>$amount*$part) break;
				} else {
					if($i>$amount) break;
				}
				if(!$part || $part==1) {
					$searchres[$i] = GOO_show_item_in_table($g->id, $added, $g->caption, $curc, $g->about_url, $g->author, $g->email, $cursize, $g->new_price, $g->small_image,$description,0,1);
				}
				if($part>1 && ($i-1<$amount*$part && $i>$amount*($part-1))) {
					$searchres[$i] = GOO_show_item_in_table($g->id, $added, $g->caption, $curc, $g->about_url, $g->author, $g->email, $cursize, $g->new_price, $g->small_image,$description,0,1);
				}
				$i++;
		    }
		    $tam  = $aa;#mysql_affected_rows();
		    $am  += $tam;
		    $msg .= "$WORDS[search_authors_res] <b>$tam</b> $WORDS[search_exist]:<br>\n";
		}


		if($in_news) {
		    $tmpvar = mysql_query("SELECT id,caption,big_content FROM S_news WHERE $NEWS_SQL_TAIL");
		    while($row = mysql_fetch_object($tmpvar)) {
				if($part) {
	    				if($i>$amount*$part) break;
				} else {
					if($i>$amount) break;
				}
				if(!$part || $part==1 || ($part>1 && ($i-1<$amount*$part && $i>$amount*($part-1)))) {
					if(strlen($row->big_content)>$cut) { $content = substr($row->big_content,0,$cut).'...';}
					else { $content = $row->big_content; }
					$searchres[$i] = 
					"<table border=0 align=center width=100% cellpadding=0 cellspacing=0>
					<tr><td bgcolor=\"$COLORS[catalog_goods_ark]\" valign=top>
					<table border=0 align=center cellpadding=2 cellspacing=1 width=100%>
					    <tr bgcolor=\"".$COLORS[catalog_goods][0]."\">
						<td align=center><b><a href=\"?user=news&news=$row->id\">$row->caption</a></b></td></tr>
					    <tr bgcolor=\"".$COLORS[catalog_goods][0]."\">
						<td align=left>&nbsp;$content</td></tr>
					</table>
					</td></tr>
					</table><br>&nbsp;<br>";
				}
				$i++;
		    }
		    $tam  = mysql_affected_rows();
		    $am  += $tam;
		    $msg .= "$WORDS[search_news_res] <b>$tam</b> $WORDS[search_exist]<br>\n";
		}


		if($in_goods) {
		    $tmpvar = mysql_query("SELECT id,caption FROM S_goods WHERE active=1 AND ($GOODS_SQL_TAIL) ORDER BY link");
		    while($row = mysql_fetch_object($tmpvar)) {
		    #print"SELECT id,caption FROM S_goods WHERE active=1 AND ($GOODS_SQL_TAIL)";exit;
				if(!$ga) { $ga= mysql_affected_rows(); }
				$g = GOO_get_product_by_id($row->id);
				#print "--> ".$g->id." ".$g->caption."<br>";
				if($g->id) {
					$cursize = 0;
					$added	 = 0;
					$cursize = GOO_round_product_size($g->size);
					if(strlen($g->description)>$cut) { $description = substr($g->description,0,$cut).'...';}
					else { $description = $g->description; }
					if($ALREADY["p".$g->id] || $ALREADY["l".$g->link]) {
					    if(!$ALREADY["p".$g->id]) { $ALREADY["p".$g->id]=1; }
					    $added = 1;
					}
				}
				if($part) {
					if($i>$amount*$part) break;
				} else {
					if($i>$amount) break;
				}
				if(!$part || $part==1) {
					#$searchres[$i] = "g $row->id $row->caption<br>\n";
					$searchres[$i] = GOO_show_item_in_table($g->id, $added, $g->caption, $curc, $g->about_url, $g->author, $g->email, $cursize, $g->new_price, $g->small_image,$description,0,1);
				}
				if($part>1 && ($i-1<$amount*$part && $i>$amount*($part-1))) {
					#$searchres[$i] = "g $row->id $row->caption<br>\n";
					$searchres[$i] = GOO_show_item_in_table($g->id, $added, $g->caption, $curc, $g->about_url, $g->author, $g->email, $cursize, $g->new_price, $g->small_image,$description,0,1);
				}
				$i++;
		    }
		    $tam  = $ga;#mysql_affected_rows();
		    $am  += $tam;
		    $msg .= "$WORDS[search_goods_res] <b>$tam</b> $WORDS[search_exist]<br>\n";
		}

		# show choice parts
		$allp=ceil($am/$amount);
		if($allp>1) {
		    for($p=1;$p<=$allp;$p++) {
			    if($p==$part ||(!$part && $p==1)) {$b[0]='<b>';$b[1]='</b>'; } else {$b='';}
			    $choicebar .= "$b[0]<a href=\"?user=search&words=$garbage&amount=$sam&logic=$logic".
				    "&search_in_goods=$in_goods&search_in_news=$in_news&search_in_authors=$in_authors".
				    "&part=$p\">$p</a>$b[1] &nbsp;\n";
		    }
		}
		$msg .= "$choicebar<br>\n";
		
		$tmp=0;
		if(sizeof($searchres)) {
		    while(list($key,$value) = each($searchres)) {
			    $msg .= $value;
			    $tmp++;
		    }
		}
		$msg .= "<br>$choicebar<br>\n";
		
		$msg .= "<br>".$WORDS[search_shown_results][0]." <b>$tmp</b> ".$WORDS[search_shown_results][1]." <b>$am</b>";

		return "$WORDS[search_results]<br>$msg";
	}
?>
