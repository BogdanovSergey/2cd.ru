<?
	$TITLE		= 	$WORDS[title_about_product];
	$DESCRIPTION 	= 	$WORDS[description_about_product];
	$KEYWORDS 	= 	$WORDS[keywords_about_product];
	include('mod_skins/skin_load.php');
	if($HTTP_GET_VARS[lvl]) {
		GOO_show_level_info(); }
	else {
		GOO_show_product_info(); }
	exit;


	function GOO_show_level_info() {
		global $TABLES_VARS;
		global $HTTP_GET_VARS;
		global $HTML_begin, $HTML_end;
		$pid = $HTTP_GET_VARS[lvl];
		if($pid) {
			$p = GOO_get_level_by_id($pid,0); }
		print $HTML_begin;
		print 
'
caption:    '.$p->caption.'<br>
about img:  '.$p->about_img.'<br>
about text: '.$p->about_text.'<br>
';
		print $HTML_end;
	}

	function GOO_show_product_info() {
		global $MY;
		global $WORDS;
		global $COLORS;
		global $IMAGES;
		global $ALREADY;
		global $TABLES_VARS;
		global $HTTP_GET_VARS;
		global $HTML_begin, $HTML_end;
		$pid = $HTTP_GET_VARS[showinfo];
		if($pid) {
		    $p = GOO_get_product_by_id($pid);
			
		    $mysize = GOO_round_product_size($p->size);
		    if($p->big_image)	{$img1 ="<img src=\"$p->big_image\">"; }			else {$img1='&nbsp;';}
		    if($p->small_image)	{$img2 ="<img src=\"$p->small_image\">"; }			else {$img2='&nbsp;';}
		    if($p->real_url)	{$down ="<a href=\"$p->real_url\">$WORDS[download]</a>";}	else {$down='&nbsp;';}
		    if($p->about_url)	{$about="<a href=\"$p->about_url\">".$WORDS[go_to_site][0].$WORDS[go_to_site][1]."</a>";}else{$about='&nbsp;';}
		    if($p->author)	{$auth ="<a href=\"mailto:$p->email\">$p->author</a>";}	else {$auth='&nbsp;';}
		    if( $ALREADY["p$p->id"] ||
			$ALREADY["l$p->link"]) {
			    $add = '<img src="'.$MY[goods_add_img_already].'" border=0>';
			    $aa  = $WORDS[already_added];
		    } else {
			    $add = 
				  '<a href="#" OnMouseOver="wstatus()" OnMouseOut="cstatus()" '.
				  'OnClick="buy_win('.$p->id.',1);return false;">'.
				  '<img src="'.$MY[goods_add_small_img].'" border=0></a>';
		    }

		    if($p->id) { $body = "
    <tr><td width=50%>$img1</td>			<td>$img2</td></tr>
    <tr><td>$WORDS[simple_caption]</td>	<td><b>$p->caption</b> <font color=\"red\">$aa</font></td></tr>
	<!--
        <tr><td>$WORDS[simple_activity]</td><td>$p->active</td></tr>
        <tr><td>$WORDS[simple_new]</td>		<td>$p->new</td></tr>
        -->
    <tr><td>&nbsp;</td>			<td>$down</td></tr>
    <tr><td>&nbsp;</td>			<td>$about</td></tr>

        <!--
        <tr><td>$WORDS[simple_filename]</td><td>$p->filename</td></tr>
        <tr><td>$WORDS[simple_discuss_url]</td>	<td>$p->discuss_url</td></tr>
        -->


    <tr><td>$WORDS[simple_size]</td>	<td>$mysize</td></tr>
    <tr><td>$WORDS[simple_maker]</td>	<td>$auth</td></tr>
    <tr><td>$WORDS[simple_createtime]</td>	<td>$p->create_time</td></tr>
        <!--
        <tr><td>$WORDS[simple_components]</td>	<td>$p->components</td></tr>
        <tr><td>$WORDS[simple_old_price]</td>	<td>$p->old_price</td></tr>
        <tr><td>$WORDS[simple_new_price]</td>	<td>$p->new_price</td></tr>
        <tr><td>$WORDS[simple_small_img]</td>	<td>$p->small_image</td></tr>
        <tr><td>$WORDS[simple_big_img]</td>	<td>$p->big_image</td></tr>
        <tr><td>$WORDS[simple_currency]</td>	<td>$p->currency</td></tr>
        <tr><td>$WORDS[simple_type]</td>	<td>&nbsp;</td></tr>
        -->
    <tr><td>$WORDS[simple_description]</td>	<td>$p->description</td></tr>
    <tr><td>$WORDS[btn_add_product]</td>	<td>$add</td></tr>
";
		    } else {
			$body="<tr><td colspan=2 align=center>$WORDS[product_absent]</td></tr>";
		    }
		    print $HTML_begin;
		    print
"
<table width=90% cellspacing=0 cellpadding=2 border=0 align=center>
<tr><td><img src=\"".$IMAGES[head][0]."\" align=up><img src=\"".$IMAGES[head][1]."\" height=19 width=97% align=up><img src=\"".$IMAGES[head][3]."\" align=up></td></tr>
<tr bgcolor=\"$COLORS[goods_info]\"><td>
    <table width=80% cellspacing=0 cellpadding=2 border=0 align=center>
$body
    <tr><td colspan=2>&nbsp;</td></tr>
    <tr><td colspan=2 align=center><a href=\"#\" OnClick=\"window.close();\"><img src=\"$IMAGES[btn_ok]\" alt=\"$WORDS[close_window]\" border=0><a></td></tr>
    <tr><td colspan=2>&nbsp;</td></tr>
    </table>
</td></tr>
</table>
";
		    print $HTML_end;
		} else {
		    print $HTML_begin;
		    print "No ID specified!";
		    print $HTML_end;
		}
	}

?>
