<?


#	mysql_connect('127.0.0.1','','') or die("Can't connect to DB");
#	mysql_select_db('de') or die("Can't choose DB");



	if($HTTP_GET_VARS[del]) {
		g_del($HTTP_GET_VARS[del]);
	} else {
		g_show();
	}
	exit;

	function g_show()	{
		print "<html><table border=1>";
		$i = 0;
		$ar= array();
	$tmp = mysql_query("SELECT id,caption,real_url FROM S_goods WHERE real_url IS NOT NULL ORDER BY real_url LIMIT 9000,11000");
		while($res = mysql_fetch_row($tmp)) {
			if(in_array(strtolower($res[2]),$ar)) {
				$color='red';
				$i++;
				g_del($res[0]);
			} else {
				$color='gray';
				array_push($ar,strtolower($res[2]));
			}

			print	"<tr><td width=5%>$res[0]</td><td>$res[1]</td>".
				"<td>$res[2]</td><td width=5% bgcolor=\"$color\"><a href=\"#\" OnClick=\"window.open('?del=$res[0]','delwin','resizable=1,scrollbars=1,toolbar=0,width=100,height=100');return false;\">delete</a></td></tr>\n";

		}
		print "</table>$i</html>";
	}

	function g_del($id) {
#		mysql_query("DELETE FROM S_goods WHERE id=$id");



	}


?>
