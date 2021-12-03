<?
	function ADM_catalog_upload() {
		global $PARTS;
		if(!$PARTS[center_down]) {
			return ADM_catalog_upload_form();
		} else {
			return $PARTS[center_down];
		}
	}

	function ADM_catalog_upload_file() {
		global $HTTP_POST_VARS;
		global $source,$source_name;
		$all_amount = 0;
		$all_size   = 0;
		$string_no  = 0;
###
		$HTTP_POST_VARS[action] = 3;
		$HTTP_POST_VARS[level]  = 102;
		$source = '/opt/apache/htdocs/777/mod_admin/s/be-shifr';
		
###
		$f = fopen($source,'r');
		while(!feof ($f)) {
		    if(!$STR[level]) {
			    $STR[level] = fgets($f, 10240);
			    $STR[0]	= fgets($f, 1);
			    $STR[0]	= fgets($f, 100);
			    $STR[0]	= fgets($f, 100);
			    $string_no  += 4;
			    if($HTTP_POST_VARS[action]==1) { print $STR[level]."<br><br>\n"; }
		    }
		    
		    $STR[delim]		= fgets($f, 10240);
		    $STR[caption]	= fgets($f, 10240);
		    $STR[0]		= fgets($f, 10240);
		    $STR[link]		= fgets($f, 10240);
		    $STR[0]		= fgets($f, 10240);
		    $STR[ver]		= fgets($f, 10240);
		    $STR[0]		= fgets($f, 10240);
		    $STR[date]		= fgets($f, 10240);
		    $STR[0]		= fgets($f, 10240);
		    $STR[size]		= fgets($f, 10240);
		    $STR[0]		= fgets($f, 10240);
		    $STR[os]		= fgets($f, 10240);
		    $STR[0]		= fgets($f, 10240);
		    $STR[price]		= fgets($f, 10240);
		    $STR[0]		= fgets($f, 10240);
		    $STR[about]		= fgets($f, 10240);
		    $STR[0]		= fgets($f, 10240);
		    $STR[author]	= fgets($f, 10240);
		    $STR[0]		= fgets($f, 10240);
		    $STR[mail]		= fgets($f, 10240);
		    $STR[0]		= fgets($f, 10240);
		    $STR[site]		= fgets($f, 10240);
		    $STR[0]		= fgets($f, 10240);
		    $STR[0]		= fgets($f, 10240);
		    $STR[0]		= fgets($f, 10240);
		    $string_no += 25;
		    # clear some signs
		    #while(list($key,$value) = each($STR)) {
			#    $STR[$key] = ereg_replace("\x0A",'',$STR[$key]);
		    #}
		    $STR[author]= ereg_replace('Автор: ','',$STR[author]);
		    $STR[mail]  = ereg_replace('mailto:','',$STR[mail]);
		    $STR[size2] = ereg_replace(" k",'',$STR[size]);
		    $STR[size2] = ereg_replace("\x0A",'',$STR[size2]);
		    $all_amount++;
		    $all_size += $STR[size2];
		    
		    if($HTTP_POST_VARS[action]==2) {
			    $all_links .= $STR[link];
		    }
		    if($STR[size2]>15000) 		$alarm.= "<font color=red>I found strange size: $STR[size], mail: $STR[mail], string $string_no</font><br>\n\n";
		    #if(strlen($STR[caption])<=1) 	$alarm.= "<font color=red>I found strange caption: $STR[caption], mail: $STR[mail], string $string_no</font><br>\n\n";
		    if($HTTP_POST_VARS[action]==1) {
			    print "<b>deli</b>\t".$STR[delim].	"<br>";
			    print "<b>capt</b>\t".$STR[caption]."<br>";
			    print "<b>link</b>\t".$STR[link].	"<br>";
			    print "<b>vers</b>\t".$STR[ver].	"<br>";
			    print "<b>date</b>\t".$STR[date].	"<br>";
			    print "<b>size</b>\t".$STR[size].	"<br>";
			    print "<b>opsy</b>\t".$STR[os].	"<br>";
			    print "<b>pric</b>\t".$STR[price].	"<br>";
			    print "<b>abou</b>\t".$STR[about].	"<br>";
			    print "<b>auth</b>\t".$STR[author].	"<br>";
			    print "<b>mail</b>\t".$STR[mail].	"<br>";
			    print "<b>site</b>\t".$STR[site].	"<br>\n\n\n";

		    }
		    if($HTTP_POST_VARS[action]==3) {
			    $db_str[$all_amount][caption]	= ereg_replace("\x0A",'',$STR[caption]);
			    $db_str[$all_amount][download_link]	= ereg_replace("\x0A",'',$STR[link]);
			    $db_str[$all_amount][version]	= ereg_replace("\x0A",'',$STR[ver]);
			    $db_str[$all_amount][date]		= ereg_replace("\x0A",'',$STR[date]);
			    $db_str[$all_amount][size]		= ereg_replace("\x0A",'',$STR[size2]);
			    $db_str[$all_amount][oper_system]	= ereg_replace("\x0A",'',$STR[os]);
			    $db_str[$all_amount][price]		= ereg_replace("\x0A",'',$STR[price]);
			    $db_str[$all_amount][description]	= ereg_replace("\x0A",'',$STR[about]);
			    $db_str[$all_amount][author_name]	= ereg_replace("\x0A",'',$STR[author]);
			    $db_str[$all_amount][author_email]	= ereg_replace("\x0A",'',$STR[mail]);
			    $db_str[$all_amount][site_url]	= ereg_replace("\x0A",'',$STR[site]);
		    }
		
		}
		fclose($f);		
		$all_size_mb = $all_size/1024;
		
		if($HTTP_POST_VARS[action]==1) {
			print $alarm;
		        print "<br>amount: $all_amount<br>\n";
		        print "size: $all_size (kb)<br>\n";
			print "size: $all_size_mb (MB)<br>\n";
			exit;
		}
		if($HTTP_POST_VARS[action]==2) {
			#print "<b>Size: $all_size_mb(mb) &nbsp; Amount: $all_amount</b><br>\n$alarm";
			header('HTTP/1.1 200 OK');
			header('Content-Type: application/octet-stream');
			print $all_links;
			exit;
		}
		
		if($HTTP_POST_VARS[action]==3) {
			$allto	 =0;
			$add_size=0;
			while(list($key,$value) = each($db_str)) {
			    if(strlen($db_str[$key][caption])>1) {
				$db_str[$key][size] = $db_str[$key][size]* 1024;
				mysql_query("INSERT INTO S_goods(
								tested,
								link,
								active,
								caption,
								description,
								author,
								email,
								download_url,
								about_url,
								size,
								new_price,
								create_time)
								
						VALUES(
							0,
							'$HTTP_POST_VARS[level]',
							0,
							'".$db_str[$key][caption]."',
							'".$db_str[$key][description]."',
							'".$db_str[$key][author_name]."',
							'".$db_str[$key][author_email]."',
							'".$db_str[$key][download_link]."',
							'".$db_str[$key][site_url]."',
							'".$db_str[$key][size]."',
							'".$db_str[$key][price]."',
							'".$db_str[$key][date]."')") or die("error while exporting, ".mysql_error());
				$allto++;
				$add_size+=$db_str[$key][size];
			    }
			}
			#print"OK<br>\n$all_amount<br>\n$allto";
			$add_size_r = round($add_size/1024,2);
			mysql_query("UPDATE S_levels SET goods=goods+$allto WHERE id='$HTTP_POST_VARS[level]'");# || die("cant change info (goods)");
			mysql_query("UPDATE S_levels SET size=size+$add_size WHERE id='$HTTP_POST_VARS[level]'");# || die("cant change info (size)");
			CAT_update_level($HTTP_POST_VARS[level]);
			#print "all $allto size $add_size";exit;
		}
		#unlink($source);
		
	}


	function ADM_catalog_upload_form() {
		global $MY;
		global $COLORS;
		global $IMAGES;
		$tmp = mysql_query("SELECT id,caption,link FROM S_levels WHERE depth=1");
		while($res = mysql_fetch_object($tmp)) {
			$capt1 = $res->caption;
			if($res->link) {
				$tmpvar = mysql_query("SELECT id,caption,link FROM S_levels WHERE id=$res->link ORDER BY caption DESC");
				$tmpres = mysql_fetch_object($tmpvar);
				$capt2	= $tmpres->caption;
				if($tmpres->link) {
					$tmpvar2 = mysql_query("SELECT id,caption,link FROM S_levels WHERE id=$tmpres->link ORDER BY caption DESC");
					$tmpres2 = mysql_fetch_object($tmpvar2);
					$capt3	= $tmpres2->caption;
				
				}
			
			}
			if($capt3 && $capt2) { $capt2 = "->$capt2"; }
			if($capt2 && $capt1) { $capt1 = "->$capt1"; }
			$to .= "\t<option value=$res->id>$capt3$capt2$capt1</option>\n";
			unset($capt1);
			unset($capt2);
			unset($capt3);
		}
		return
'
<form method="POST" enctype="multipart/form-data">
<input type="hidden" name="upload" value="1">
	<table border=0 width=100% cellpadding=0 cellspacing=0>
	    <tr><td align=left colspan=3>
	    <img src="'.$IMAGES[empty_center_panel][0].'"><img src="'.$IMAGES[empty_center_panel][1].'"
		height=22 width=650><img src="'.$IMAGES[empty_center_panel][2].'">
	    </td></tr>
	    <tr><td bgcolor="'.$COLORS[admin_goods_ark].'" valign=top>
 		<table border=0 align=center cellpadding=2 cellspacing=1 width=100%>
		<tr bgcolor="'.$COLORS[admin_table_succession][0].'">
		    <td>Название where to load</td>
		    <td>&nbsp;</td></tr>
		<tr bgcolor="'.$COLORS[admin_table_succession][1].'">
		    <td valign=top><select name="level" size=4>'.$to.'</select></td>
		    <td valign=top align=right>
		    Текстовый файл данных: <input type="file" size=10 name="source"><br>
		    Какое действие применить: 
		    <select name="action">
		    <option value=1 selected>Просмотр данных</option>
		    <option value=2>Отфильтровать ссылки</option>
		    <option value=3>Экспорт в базу данных</option>
		    </select>

		    </td></tr>
		<tr bgcolor="'.$COLORS[admin_table_succession][0].'">
		    <td>&nbsp;</td>
		    <td align=right><input type="button" value="Загрузить" OnClick="this.form.submit()"></td></tr>
 		</table>
	    </td></tr>
	</table>
</form>

';

	}
	






?>
