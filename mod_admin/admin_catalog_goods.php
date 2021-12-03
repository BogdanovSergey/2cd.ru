<?

	function ADM_show_create_goods_form() {
		global $CURR;
		global $WORDS;
		global $COLORS;
		global $IMAGES;
		if($CURR[level]>$CURR[depth] || $CURR[level]+$CURR[depth]==2) {
			$time = get_time();
			$out =
'


<form method="POST" enctype="multipart/form-data">
<input type="hidden" name="admin" value="catalog">
<input type="hidden" name="add_product" value="1">
<input type="hidden" name="id" value="'.$CURR[id].'">
<table border=0 width=100% cellpadding=0 cellspacing=0>
	<tr><td align=left colspan=3>
	<img src="'.$IMAGES[empty_center_panel][0].'"><img src="'.$IMAGES[empty_center_panel][1].'"
		height=22 width=800><img src="'.$IMAGES[empty_center_panel][2].'">
	</td></tr>
	<tr><td bgcolor="'.$COLORS[admin_goods_ark].'" valign=top>
 		<table border=0 align=center cellpadding=2 cellspacing=1 width=100%>

<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td>'.$WORDS[simple_caption].'</td>	<td><input type="text" name="caption"></td></tr>
<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td>'.$WORDS[simple_activity].'</td>	<td><input type="checkbox" name="active" checked></td></tr>
<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td>'.$WORDS[simple_new].'</td>		<td><input type="checkbox" name="newitem" checked></td></tr>
<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td><b>'.$WORDS[simple_cd_number].'</b></td><td><input type="text" name="cd_number"></td></tr>
<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td><b>'.$WORDS[simple_filename].'</b></td><td><input type="text" name="filename"></td></tr>
<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td><b>'.$WORDS[simple_size].'</b></td>	<td><input type="text" name="size"></td></tr>
<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td>'.$WORDS[simple_description].'</td>	<td><textarea name="description"></textarea></td></tr>
<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td>'.$WORDS[simple_maker].'</td>		<td><input type="text" size=30 name="author"></td></tr>
<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td>'.$WORDS[simple_createtime].'</td>	<td><input type="text" size=30 name="create_time" value="'.$time.'"></td></tr>
<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td>'.$WORDS[simple_download_url].'</td>	<td><input type="text" size=30 name="download_url"></td></tr>
<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td>'.$WORDS[simple_about_url].'</td>	<td><input type="text" size=30 name="about_url"></td></tr>
<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td>'.$WORDS[simple_real_url].'</td>	<td><input type="text" size=30 name="real_url"></td></tr>
<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td>'.$WORDS[simple_discuss_url].'</td>	<td><input type="text" size=30 name="discuss_url"></td></tr>
<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td>'.$WORDS[simple_components].'</td>	<td><input type="text" size=30 name="components"></td></tr>
<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td>'.$WORDS[simple_old_price].'</td>	<td><input type="text" name="old_price"></td></tr>
<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td>'.$WORDS[simple_new_price].'</td>	<td><input type="text" name="new_price"></td></tr>
<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td>'.$WORDS[simple_small_img].'</td>	<td><input type="file" name="small_image"></td></tr>
<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td>'.$WORDS[simple_big_img].'</td>	<td><input type="file" name="big_image"></td></tr>
<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td>'.$WORDS[simple_currency].'</td>	<td><input type="text" name="currency"></td></tr>
<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td>'.$WORDS[simple_type].'</td>		<td><select name="type">'.'</select></td></tr>
<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td>&nbsp;</td>	<td><input type="button" value="'.$WORDS[btn_add_product].'" OnClick="this.form.submit()"></td></tr>
<tr bgcolor="'.$COLORS[admin_table_succession][0].'"><td></td>	<td></td></tr>

 		</table>
    </td></tr>
</table><br>
</form>
';
		}
		return $out;
	}

	function ADM_add_product() {
		global $HTTP_POST_VARS;
		global $big_image,$big_image_name,$big_image_size,$big_image_type;
		global $small_image,$small_image_name,$small_image_size,$small_image_type;
		$link = $HTTP_POST_VARS[id];
		if($HTTP_POST_VARS[newitem] =='on') { $new    = 1; } else { $new    = 0; }   
		if($HTTP_POST_VARS[active]  =='on') { $active = 1; } else { $active = 0; }
		if($small_image_name) {
                	# Secure image file name
                        $small_image_name = ereg_replace('.gif', '', $small_image_name);
                        $small_image_name = strtr($small_image_name, '/\\.', '___');
                        $small_image_name = "images/$link"."_$small_image_name.gif";
                	# save image
                        $f0 = copy($small_image,$small_image_name);
                        $f1 = chmod($small_image_name,0644);
                        if(!$f0 || !$f1) { die('cant save image file'); $small_image_name=''; }
                }
		if($big_image_name) {
                	# Secure image file name
                        $big_image_name = ereg_replace('.gif', '', $big_image_name);
                        $big_image_name = strtr($big_image_name, '/\\.', '___');
                        $big_image_name = "images/$link"."_$big_image_name.gif";
                	# save image
                        $f0 = copy($big_image,$big_image_name);
                        $f1 = chmod($big_image_name,0644);
                        if(!$f0 || !$f1) { die('cant save image file'); $big_image_name=''; }
                }
		$old_price = ereg_replace(',', '.', $HTTP_POST_VARS[old_price]);
		$new_price = ereg_replace(',', '.', $HTTP_POST_VARS[new_price]);
		$size	   = ereg_replace(',', '.', $HTTP_POST_VARS[size]);

		mysql_query("INSERT INTO S_goods(	link,
							active,
							new,
							small_image,
							big_image,
							caption,
							description,
							download_url,
							about_url,
							discuss_url,
							real_url,
							cd_number,
							filename,
							size,
							author,
							components,
							create_time,
							old_price,
							new_price,
							currency,
							type
						    ) VALUES(	
								$link,
								$active,
								$new,
								'$small_image_name',
								'$big_image_name',
								'$HTTP_POST_VARS[caption]',
								'$HTTP_POST_VARS[description]',
								'$HTTP_POST_VARS[download_url]',
								'$HTTP_POST_VARS[about_url]',
								'$HTTP_POST_VARS[discuss_url]',
								'$HTTP_POST_VARS[real_url]',
								'$HTTP_POST_VARS[cd_number]',
								'$HTTP_POST_VARS[filename]',
								'$size',
								'$HTTP_POST_VARS[author]',
								'$HTTP_POST_VARS[components]',
								'$HTTP_POST_VARS[create_time]',
								'$old_price',
								'$new_price',
								'$HTTP_POST_VARS[currency]',
								'$HTTP_POST_VARS[type]'
								)")
		|| die('Cant add this product');
		ADM_update_primary_levels_goods($link,$size);

	}





?>
