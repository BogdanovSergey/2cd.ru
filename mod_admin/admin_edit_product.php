<?

	function ADM_edit_product() {
		global $HTTP_GET_VARS;
		global $HTTP_POST_VARS;
		if(!$HTTP_POST_VARS[save]) {
			ADM_show_edit_product_form();
		} else {
			ADM_save_product();
			ADM_show_edit_product_form();
			
		}
	}


	function ADM_show_edit_product_form() {
/* #########
		$tmpvar = mysql_query("SELECT id,real_url FROM S_goods WHERE link=3");
		while($tmpres = mysql_fetch_object($tmpvar)) {
			print "$tmpres->id $tmpres->real_url\n";
		}
		exit;
*/ #########
		global $WORDS;
		global $COLORS;
		global $TABLES_VARS;
		global $HTTP_GET_VARS;
		global $HTML_begin, $HTML_end;
		if($HTTP_GET_VARS[edit_product]) { $pid=$HTTP_GET_VARS[edit_product]; }
		if($HTTP_POST_VARS[edit_product]){ $pid=$HTTP_POST_VARS[edit_product]; }

		if($pid) {
			$p = GOO_get_product_by_id($pid); }

		if($p->active)  { $act_ch = " checked"; }
		if($p->new)	{ $new_ch = " checked"; }
		if($p->small_image) {
			$small_img_loc	= '<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td>'.$WORDS[simple_small_img_loc].'</td><td bgcolor="'.$COLORS[admin_edit_product][1].'">'.$p->small_image.'</td></tr>';
			$small_img	= "<img src=\"$p->small_image\">";
		}
		if($p->big_image) {
			$big_img_loc = '<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td>'.$WORDS[simple_big_img_loc].'</td><td bgcolor="'.$COLORS[admin_edit_product][1].'">'.$p->big_image.'</td></tr>';
		}

		print $HTML_begin;
		print 
$small_img.
'

<form method="POST" enctype="multipart/form-data">
<input type="hidden" name="save" value="1">
<input type="hidden" name="edit_product" value="'.$pid.'">




<table border=0 width=100% cellpadding=0 cellspacing=0>
	<tr><td align=left colspan=3>
	<img src="images/s1/center_panel_with_caption.gif"><img src="images/s1/center_panel_1.gif"
		height=22 width=380><img src="images/s1/center_panel_2.gif">
	</td></tr>
	<tr><td bgcolor="'.$COLORS[admin_goods_ark].'" valign=top>
 		<table border=0 align=center cellpadding=2 cellspacing=1 width=100%>

<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td>'.$WORDS[simple_caption].'</td>		<td bgcolor="'.$COLORS[admin_edit_product][1].'"><input size=50 type="text" name="caption" 		value="'.$p->caption.'"></td></tr>
<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td>'.$WORDS[simple_activity].'</td>		<td bgcolor="'.$COLORS[admin_edit_product][1].'"><input type="checkbox" name="active"'.$act_ch.'></td></tr>
<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td>'.$WORDS[simple_new].'</td>		<td bgcolor="'.$COLORS[admin_edit_product][1].'"><input type="checkbox" name="newitem"'.$new_ch.'></td></tr>
<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td>'.$WORDS[simple_description].'</td>	<td bgcolor="'.$COLORS[admin_edit_product][1].'"><textarea name="description" rows=5 cols=40>'.$p->description.'</textarea></td></tr>
<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td><b>'.$WORDS[simple_filename].'</b></td>	<td bgcolor="'.$COLORS[admin_edit_product][1].'"><input size=50 type="text" name="filename"	value="'.$p->filename.'"></td></tr>
<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td><b>'.$WORDS[simple_size].'</b></td>	<td bgcolor="'.$COLORS[admin_edit_product][1].'"><input size=10 type="text" name="size" 	value="'.$p->size.'"></td></tr>
<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td><b>'.$WORDS[simple_cd_number].'</b></td>	<td bgcolor="'.$COLORS[admin_edit_product][1].'"><input size=10 type="text" name="cd_number" 	value="'.$p->cd_number.'"></td></tr>
<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td><b>'.$WORDS[simple_author].'</b></td>	<td bgcolor="'.$COLORS[admin_edit_product][1].'"><input size=50 type="text" name="author" 	value="'.$p->author.'"></td></tr>
<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td><b>'.$WORDS[simple_createtime].'</b></td>	<td bgcolor="'.$COLORS[admin_edit_product][1].'"><input size=50 type="text" name="create_time" 	value="'.$p->create_time.'"></td></tr>
<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td>'.$WORDS[simple_download_url].'</td>	<td bgcolor="'.$COLORS[admin_edit_product][1].'"><input size=50 type="text" name="download_url" value="'.$p->download_url.'"></td></tr>
<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td>'.$WORDS[simple_about_url].'</td>		<td bgcolor="'.$COLORS[admin_edit_product][1].'"><input size=50 type="text" name="about_url" 	value="'.$p->about_url.'"></td></tr>
<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td>'.$WORDS[simple_discuss_url].'</td>	<td bgcolor="'.$COLORS[admin_edit_product][1].'"><input size=50 type="text" name="discuss_url" 	value="'.$p->discuss_url.'"></td></tr>
<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td>'.$WORDS[simple_components].'</td>		<td bgcolor="'.$COLORS[admin_edit_product][1].'"><input size=50 type="text" name="components" 	value="'.$p->components.'"></td></tr>
<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td>'.$WORDS[simple_real_url].'</td>		<td bgcolor="'.$COLORS[admin_edit_product][1].'"><input size=50 type="text" name="real_url" 	value="'.$p->real_url.'"></td></tr>
<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td>'.$WORDS[simple_old_price].'</td>		<td bgcolor="'.$COLORS[admin_edit_product][1].'"><input size=10 type="text" name="old_price" 	value="'.$p->old_price.'"></td></tr>
<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td>'.$WORDS[simple_new_price].'</td>		<td bgcolor="'.$COLORS[admin_edit_product][1].'"><input size=10 type="text" name="new_price" 	value="'.$p->new_price.'"></td></tr>
<input type="hidden" name="old_small_image" value="'.$p->small_image.'">
<input type="hidden" name="old_big_image"   value="'.$p->big_image.'">
<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td>'.$WORDS[simple_small_img].'</td>		<td bgcolor="'.$COLORS[admin_edit_product][1].'"><input size=20 type="file" name="small_image"></td></tr>
'.$small_img_loc.'
<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td>'.$WORDS[simple_big_img].'</td>		<td bgcolor="'.$COLORS[admin_edit_product][1].'"><input size=20 type="file" name="big_image"></td></tr>
'.$big_img_loc.'
<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td>'.$WORDS[simple_currency].'</td>		<td bgcolor="'.$COLORS[admin_edit_product][1].'"><input size=10 type="text" name="currency"		value="'.$p->currency.'"></td></tr>
<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td>'.$WORDS[simple_type].'</td>		<td bgcolor="'.$COLORS[admin_edit_product][1].'"><select size=2 name="type">'.'</select></td></tr>
<tr bgcolor="'.$COLORS[admin_edit_product][0].'"><td>&nbsp;</td>				<td bgcolor="'.$COLORS[admin_edit_product][1].'"><input type="button" value="'.$WORDS[btn_update_product].'" OnClick="this.form.submit()"></td></tr>

 		</table>
    </td></tr>
</table><br>
</form>
';
		print $HTML_end;
		exit;
	}





	function ADM_save_product() {
		global $HTTP_POST_VARS;
		global $big_image,$big_image_name,$big_image_size,$big_image_type;
		global $small_image,$small_image_name,$small_image_size,$small_image_type;
		$link = $HTTP_POST_VARS[edit_product];
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
                } else { $small_image_name = $HTTP_POST_VARS[old_small_image]; }
		if($big_image_name) {
                	# Secure image file name
                        $big_image_name = ereg_replace('.gif', '', $big_image_name);
                        $big_image_name = strtr($big_image_name, '/\\.', '___');
                        $big_image_name = "images/$link"."_$big_image_name.gif";
                	# save image
                        $f0 = copy($big_image,$big_image_name);
                        $f1 = chmod($big_image_name,0644);
                        if(!$f0 || !$f1) { die('cant save image file'); $big_image_name=''; }
                } else { $big_image_name = $HTTP_POST_VARS[old_big_image]; }

		$old_price = ereg_replace(',', '.', $HTTP_POST_VARS[old_price]);
                $new_price = ereg_replace(',', '.', $HTTP_POST_VARS[new_price]);

		mysql_query("UPDATE S_goods SET
					active		= $active,
					new		= $new,
					small_image	= '$small_image_name',
					big_image	= '$big_image_name',
					caption		= '$HTTP_POST_VARS[caption]',
					description	= '$HTTP_POST_VARS[description]',
					download_url	= '$HTTP_POST_VARS[download_url]',
					filename	= '$HTTP_POST_VARS[filename]',
					about_url	= '$HTTP_POST_VARS[about_url]',
					discuss_url	= '$HTTP_POST_VARS[discuss_url]',
					real_url	= '$HTTP_POST_VARS[real_url]',
					size		= '$HTTP_POST_VARS[size]',
					cd_number	= '$HTTP_POST_VARS[cd_number]',
					author		= '$HTTP_POST_VARS[author]',
					components	= '$HTTP_POST_VARS[components]',
					create_time	= '$HTTP_POST_VARS[create_time]',
					old_price	= '$old_price',
					new_price	= '$new_price',
					currency	= '$HTTP_POST_VARS[currency]',
					type		= '$HTTP_POST_VARS[type]'
				WHERE id=$HTTP_POST_VARS[edit_product]
				");
								
		#$tmpvar = mysql_query("SELECT link FROM S_goods WHERE id=$HTTP_POST_VARS[edit_product]");
		#$tmpres = mysql_fetch_object($tmpvar);
		
		#CAT_update_level($tmpres->link);

	}















?>
