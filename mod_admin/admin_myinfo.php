<?





	if($HTTP_GET_VARS[execute]) {
		if($HTTP_GET_VARS[ask]=='on') { $ask=1; }
		else { $ask=0; }
		mysql_query("UPDATE S_admin SET fio	= '$HTTP_GET_VARS[fio]',
						login	= '$HTTP_GET_VARS[login]',
						password= '$HTTP_GET_VARS[a]',
						relay_ip1= '$HTTP_GET_VARS[relay_ip1]',
						relay_ip2= '$HTTP_GET_VARS[relay_ip2]',
						relay_ip3= '$HTTP_GET_VARS[relay_ip3]',
						ask_password= '$ask'");	
		list($ADMIN[login], $ADMIN[password], $ADMIN[fio], $ADMIN[relay_ip1], $ADMIN[relay_ip2], $ADMIN[relay_ip3], $ADMIN[ask_password]) = ADM_get_admin_account();
	}
	if($ADMIN[ask_password] == 1) { $set = ' checked'; } else { $set = ''; }
	$PARTS[center_up]	=
"
<form method=\"GET\">
<input type=\"hidden\" name=\"execute\" value=\"1\">
<input type=\"hidden\" name=\"admin\" value=\"myinfo\">
<table>
<tr><td>fio</td>	<td><input type=\"text\" name=\"fio\" value=\"$ADMIN[fio]\"></td></tr>
<tr><td>login</td>	<td><input type=\"text\" name=\"login\" value=\"$ADMIN[login]\"></td></tr>
<tr><td>pass</td>	<td><input type=\"password\" name=\"a\" value=\"$ADMIN[password]\"></td></tr>
<tr><td>pass again</td>	<td><input type=\"password\" name=\"b\" value=\"\"></td></tr>
<tr><td>ask pass</td>	<td><input type=\"checkbox\" name=\"ask\"$set></td></tr>
<tr><td>relay_ip1</td>	<td><input type=\"text\" name=\"relay_ip1\" value=\"$ADMIN[relay_ip1]\"></td></tr>
<tr><td>relay_ip2</td>	<td><input type=\"text\" name=\"relay_ip2\" value=\"$ADMIN[relay_ip2]\"></td></tr>
<tr><td>relay_ip3</td>	<td><input type=\"text\" name=\"relay_ip3\" value=\"$ADMIN[relay_ip3]\"></td></tr>
<tr><td><input type=\"button\" value=\"update\" OnClick=\"compare(this.form,'both passwds must be the same');return false;\"></td>
<td><input type=\"reset\"><td></tr>
</table>
</form>
";









?>
