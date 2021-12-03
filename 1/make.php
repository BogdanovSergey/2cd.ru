<?

	$db_file	=	'98.txt';
	$db_link	=	'98';

#	mysql_connect('127.0.0.1','***','***') or die("Can't connect to DB");
#	mysql_select_db('de') or die("Can't choose DB");

	$shit1 = "\"\(9\)\"\"\(9\)\"";
	$shit2 = "\"\(9\)\"\"\(9\)\"\"\(9\)\"";
	$shit3 = "\"\(9\)\"\"\(9\)\"\"\(9\)\"\"\(9\)\"";

	$f = fopen($db_file,'r');
	while(!feof ($f)) {
		$ok	= 1;
		$str 	= fgets($f, 10240);
		$rows 	= '';
		$vals	= '';
		if(strlen($str)>2) {


			$str = ereg_replace($shit3,	'"(9)"',$str);
			$str = ereg_replace($shit2,	'"(9)"',$str);
			$str = ereg_replace($shit1,     '"(9)"',$str);

			$id	= '(1)';
			$name	= 'caption';
			$start	= strpos($str,$id);
			if($start>0) {
				$next	= strpos($str,'"(',$start+3)-$start-1;
				$cut = cls(substr($str, $start+4, $next-4));
				$rows .= $name;
				$vals .= "\"$cut\"";
			}

			$id	= '(2)';
			$name	= 'description';
			$start	= strpos($str,$id);
			if($start>0) {
				$next	= strpos($str,'"(',$start+3)-$start+1;
				$cut	= substr($str, $start+4, $next-5);
				$cut	= cls($cut);
				$rows	.= ", $name";
				$vals	.= ",\n\"$cut\"";
			}

			$id     = '(3)';
			$name	= 'new_price';
			$start	= strpos($str,$id);
			if($start>0) {
				$next	= strpos($str,'"(',$start+3)-$start+2;
				$cut	= substr($str, $start+4, $next-6);
				$cut    = ereg_replace('Условия использования: ', '',$cut);
				$cut    = cls($cut);
				$rows	.= ", $name";
				$vals	.= ",\n\"$cut\"";
			}

			$id	= '(4)';
			$name	= 'author';
			$start	= strpos($str,$id);
			if($start>0) {
				$next	= strpos($str,'"(',$start+3)-$start+2;
				$cut	= cls(substr($str, $start+4, $next-6));
				$cut	= ereg_replace('Автор: ', '',$cut);
				if(strpos($cut,'@')>0) {
					$pp	 = explode('(',$cut);
					$auth	 = substr($pp[0],0,strlen($pp[0])-1);
					$rows   .= ", author";
					$vals	.= ",\n\"$auth\"";

					$emai	 = substr($pp[1],0,strlen($pp[1])-1);
					$rows   .= ", email";
					$vals   .= ",\n\"$emai\"";
				}
			}

			$id	= '(5)';
			$name	= 'create_time';
			$start	= strpos($str,$id);
			if($start>0) {
				$next	= strpos($str,'"(',$start+3)-$start+2;
				$cut	= cls(substr($str, $start+4, $next-6));
				$cut    = ereg_replace('Дата обновления: ', '',$cut);
				$rows	.= ", $name";
				$vals	.= ",\n\"$cut\"";
			}

/*			$id	= '(6)';
			$name	= 'clicks1';
			$start	= strpos($str,$id);
			if($start>0) {
				$next	= strpos($str,'"(',$start+3)-$start+2;
				$cut	= cls(substr($str, $start+4, $next-6));
				$rows	.= ", $name";
				$vals	.= ",\n\"$cut\"";
			}

			$id	= '(7)';
			$name	= 'clicks2';
			$start	= strpos($str,$id);
			if($start>0) {
				$next	= strpos($str,'"(',$start+3)-$start+2;
				$cut	= cls(substr($str, $start+4, $next-6));
				$rows	.= ", $name";
				$vals	.= ",\n\"$cut\"";
			}

			$id	= '(8)';
			$name	= 'size';
			$start	= strpos($str,$id);
			if($start>0) {
				$next	= strpos($str,'"(',$start+3)-$start+2;
				$cut	= cls(substr($str, $start+4, $next-6));
				$rows	.= ", $name";
				$vals	.= ",\n\"$cut\"";
			}
*/
			$id	= '(9)';
			$name	= 'real_url';
			$start	= strpos($str,$id);
			if($start>0) {
				if(strpos($str,'(10)')>0) {
					$next	= strpos($str,'"(',$start+3)-$start+2;
					$cut	= cls(substr($str, $start+4, $next-6));
					$rows	.= ", $name";
					$vals	.= ",\n\"$cut\"";
				} else {
					$next   = strpos($str,'"',$start+4)-$start+1;
					$cut    = cls(substr($str, $start+4, $next-5));
					$rows   .= ", $name";
					$vals   .= ",\n\"$cut\"";
				}
				if(strlen($cut)<=4) { $ok=0; }
			}

			$id	= '(10)';
			$name	= 'about_url';
			$start	= strpos($str,$id);
			if($start>0) {
				$next	= strpos($str,'"',$start+3)-$start;
				$cut	= cls(substr($str, $start+5, $next-7));
				$rows	.= ", $name";
				$vals	.= ",\n\"$cut\"";
			}


			if($ok==1) {
			#	mysql_query("INSERT INTO S_goods (active,tested,found,link,$rows) VALUES(0,0,0,$db_link,$vals)");
				print("INSERT INTO S_goods (active,tested,found,link,$rows) VALUES(0,0,0,$db_link,$vals)");
				exit;
			}
		}
	}

	fclose($f);



	function cls($v) {
		$v = ereg_replace("\x0D\x0A","",$v);
		$v = ereg_replace("\"",'&quot;',$v);
		$v = ereg_replace("\'",'&quot;',$v);
		$v = ereg_replace("\`",'',$v);
		return $v;
	}



?>
