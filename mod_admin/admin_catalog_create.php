<?
	function ADM_show_create_level_form() {
		global $CURR;
		global $COLORS;
		global $IMAGES;
		$time = get_time();
		$deep = $CURR[depth];
		$level= $CURR[level];#print "$deep $level";exit;
		if($level==2) {
			$steps	    = "<option value=1>одна</option>";
			$level_link = "<input type=\"hidden\" name=\"link\" value=\"$CURR[id]\">\n";
		} elseif($level==1) {
			if($level+1==$deep) {
				$steps	    = "<option value=1>одна</option>";
			} else {
				$steps	    = "<option value=1>одна</option>";
				$steps     .= "<option value=2 selected>две</option>";
			}
			$level_link = "<input type=\"hidden\" name=\"link\" value=\"$CURR[id]\">\n";
		} else {
			$steps      = "<option value=1>одна</option>";
			$steps     .= "<option value=2>две</option>";
			$steps     .= "<option value=3 selected>три</option>";
			$level_link = "<input type=\"hidden\" name=\"link\" value=\"0\">\n";
		}
		if($level<=$deep && $level+$deep!=2) {
			$out =
'
<form method="POST">
	<input type="hidden" name="admin" value="catalog">
	<input type="hidden" name="id" value="'.$CURR[id].'">
	<input type="hidden" name="create_level" value="1">
	'.$level_link.'
	<table border=0 width=100% cellpadding=0 cellspacing=0>
	    <tr><td align=left colspan=3>
	    <img src="'.$IMAGES[empty_center_panel][0].'"><img src="'.$IMAGES[empty_center_panel][1].'"
		height=22 width=40><img src="'.$IMAGES[empty_center_panel][2].'">
	    </td></tr>
	    <tr><td bgcolor="'.$COLORS[admin_goods_ark].'" valign=top>
 		<table border=0 align=center cellpadding=2 cellspacing=1 width=100%>
		<tr bgcolor="'.$COLORS[admin_table_succession][1].'"><td>Название</td>	<td><input type="text" name="caption" value="" size=7></td></tr>
		<tr bgcolor="'.$COLORS[admin_table_succession][1].'"><td>Ступеней</td>	<td><select name="steps">'.$steps.'</select></td></tr>
		<tr bgcolor="'.$COLORS[admin_table_succession][1].'"><td>Активен</td>	<td><input type="checkbox" name="active"></td></tr>
		<tr bgcolor="'.$COLORS[admin_table_succession][1].'"><td>Новый</td>	<td><input type="checkbox" name="newitem" checked></td></tr>
		<tr bgcolor="'.$COLORS[admin_table_succession][1].'"><td>Дата</td>	<td><input type="text" name="time" value="'.$time.'" size=7></td></tr>
		<tr bgcolor="'.$COLORS[admin_table_succession][1].'"><td>&nbsp;</td>
		<td bgcolor="'.$COLORS[admin_table_succession][1].'"><input type="button" value="Создать" OnClick="this.form.submit();"></td></tr>
 		</table>
	    </td></tr>
	</table>

</form>




';
		}
		return $out;
	} 
	
	function ADM_create_level() {
		global $HTTP_POST_VARS;

		$real_level = CAT_get_next_level();
		if($HTTP_POST_VARS[newitem] =='on') { $new    = 1; } else { $new    = 0; }
		if($HTTP_POST_VARS[active]  =='on') { $active = 1; } else { $active = 0; }
		$link = $HTTP_POST_VARS[link];
		mysql_query("INSERT INTO S_levels(	level,
							link,
							depth,
							caption,
							active,
							groups,
							goods,
							new,
							create_time
							) VALUES($real_level,
								$link,
								$HTTP_POST_VARS[steps],
								'$HTTP_POST_VARS[caption]',
								$active, 0, 0, $new,
								'$HTTP_POST_VARS[time]')")
		|| die("Cant create level");

		ADM_update_primary_levels_groups($link);

	}










?>
