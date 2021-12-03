<?

	if($HTTP_POST_VARS[add])	{ ADM_add_news(); }
	if($HTTP_POST_VARS[update]) 	{ ADM_update_news(); }
	if($HTTP_GET_VARS[del] && !$HTTP_POST_VARS[add])
					{ ADM_del_news(); }

	include('mod_news/setup.php');
	$PARTS[center_up] 	= ADM_show_news_add_form();
	$PARTS[right_up]	= ADM_show_news_del_form();




	function ADM_show_news_add_form() {
		global $WORDS;
		global $COLORS;
		global $IMAGES;
		global $DESIGN;
		global $HTTP_GET_VARS;
		$act = "add";
		$butt= $WORDS[news_add];
		$hack= $WORDS[news_text];
		if($HTTP_GET_VARS[edit]>0) {
			$res = mysql_query("SELECT * FROM S_news WHERE id='$HTTP_GET_VARS[edit]'");
			$n   = mysql_fetch_object($res);
			if($n->image1) $oldimg1 = "<tr bgcolor=\"$COLORS[admin_empty]\"><td>$WORDS[news_img1]</td><td>".$n->image1."</td></tr>";
			if($n->image2) $oldimg2 = "<tr bgcolor=\"$COLORS[admin_empty]\"><td>$WORDS[news_img2]</td><td>".$n->image2."</td></tr>";
			$act = "update";
			$butt= $WORDS[news_update];
			$hack= '';
			$nid = '<input type="hidden" name="nid" value="'.$n->id.'">';
		}
#		if($oldimg1) { $oldimg1 = "<tr bgcolor=\"$COLORS[admin_empty]\"><td colspan=2>$oldimg1</td></tr>"; }
		return
'

<br>
<script>
	function SaveVOptionToHiddenItemAll(f) {
		SaveDynTextToHiddenItem(f.body, document.Dyn_body, DynHtmlDyn_body, f.textarHtmlDyn_body);
}</script>
<script language="JavaScript" src="/edit.js"></script>
<script language="JavaScript" src="/scripts_.js"></script>
<form name="EDITOR" method="POST" enctype="multipart/form-data" onsubmit="return ValidateMy1EditorForm(EDITOR)">
<style type=text/css>
	.DynEdit {
		POSITION: ABSOLUTE;
		background-color: white;
	}
</style>
<br>
<table border=0 width=500 cellpadding=0 cellspacing=0 align=center>
	<tr><td align=left colspan=3>

	<img src="'.$IMAGES[panel_catalog].'"><img src="'.$IMAGES[empty_center_panel][1].'"
                                height=22 width=380><img src="'.$IMAGES[empty_center_panel][2].'">
	</td></tr>
	<tr><td bgcolor="'.$COLORS[admin_goods_ark].'" valign=top>
 		<table border=0 align=center cellpadding=2 cellspacing=1 width=100%>
		    <input type="hidden" name="'.$act.'" value="1">
		    <input type="hidden" name="admin" value="news">
		    '.$nid.'
		    <tr bgcolor="'.$COLORS[admin_empty].'">
			<td width=50%>'.$WORDS[news_caption].'</td>
			<td><input type="text" '.$DESIGN[white].' name="caption" value="'.$n->caption.'"></td>
		    </tr>
		    '.$oldimg1.'
		    <tr bgcolor="'.$COLORS[admin_empty].'">
			<td>'.$WORDS[news_img1].'</td>
			<td><input type="file" name="img1" '.$DESIGN[white].'></td>
		    </tr>
		    '.$oldimg2.'
		    <tr bgcolor="'.$COLORS[admin_empty].'">
			<td>'.$WORDS[news_img2].'</td>
			<td><input type="file" name="img2" '.$DESIGN[white].'></td>
		    </tr>
		    <tr bgcolor="'.$COLORS[admin_empty].'">
			<td colspan=2><!--<textarea name="big_content" rows=6>$n-big_content</textarea>-->


<!--
<textarea cols=110 name="textarHtmlDyn_body" rows=19 class=FormsWhite>'.$hack.$n->big_content.'</textarea><br>&nbsp;
-->

<DIV class=DynEdit id=TxtHtmlDyn_body TBSTATE="hidden">
	<TABLE bgColor=#ffffff border=0 cellPadding=2 cellSpacing=2 width="60%">
		<TBODY>
		<TR>
		<TD align=middle bgColor=#ffffff width=500>
		<DIV align=left>
		<TABLE border=0 cellPadding=0 cellSpacing=0 valign="middle">
		<TBODY>
		<TR>
		<TD><IMG alt=HTML-editor border=0 
			language=javascript onclick="return GoToHTML(\'visible\',Dyn_body, DynHtmlDyn_body, textarHtmlDyn_body, TxtHtmlDyn_body)" 
			src="/images/edit/html2.gif"> 
		</TD>
		</TR>
		</TBODY>
		</TABLE>
		</DIV>

		<textarea cols=57 name="textarHtmlDyn_body" rows=19>'.$hack.$n->big_content.'</textarea><br>&nbsp;
		</TD>
		</TR>
		</TBODY>
		</TABLE>
		</DIV>
		
		<DIV class=DynEdit1 id=DynHtmlDyn_body TBSTATE="visible">
		<TABLE bgColor=#ffffff border=0 cellPadding=2 cellSpacing=2 width="60%">
		<TBODY>
		<TR>
		<TD align=middle bgColor=#ffffff width=500>

		<DIV align=left>
		<TABLE border=0 cellPadding=0 cellSpacing=0 valign="middle">
		<TBODY>
		<TR>
		<TD><IMG alt="HTML-text" border=0 
			language=javascript 
			onclick="return GoToHTML(\'hidden\',Dyn_body, DynHtmlDyn_body, textarHtmlDyn_body, TxtHtmlDyn_body)" 
			src="/images/edit/html1.gif"> 
		</TD>
		<TD><IMG alt="жирный" border=0 height=22 
			language=javascript 
			onclick="return DECMD_BOLD_onclick(Dyn_body)" 
			src="/images/edit/bold.gif" width=23>
		</TD>
		<TD>
		<IMG alt="курсив" border=0 height=22 
			language=javascript 
			onclick="return DECMD_ITALIC_onclick(Dyn_body)" 
			src="/images/edit/italic.gif" width=23> </TD>
		<TD>
		<IMG alt="подчеркивание" border=0 height=22 
			language=javascript 
			onclick="return DECMD_UNDERLINE_onclick(Dyn_body)" 
			src="/images/edit/under.gif" width=23>
		</TD>
		<TD>
		<IMG alt="выровнять по левому краю" border=0 height=22
			language=javascript 
			onclick="return DECMD_JUSTIFYLEFT_onclick(Dyn_body)" 
			src="/images/edit/left.gif" width=23>
		</TD>
		<TD>
		<IMG alt="выровнять по центру" border=0 height=22 language=javascript 
			onclick="return DECMD_JUSTIFYCENTER_onclick(Dyn_body)" 
			src="/images/edit/center.gif" width=23>
		</TD>
		<TD>
		<IMG alt="выровнять по правому краю" border=0 height=22 language=javascript 
			onclick="return DECMD_JUSTIFYRIGHT_onclick(Dyn_body)" 
			src="/images/edit/right.gif" width=23>
		</TD>
		<TD>
		<IMG alt="нумерованный список" border=0 height=22 language=javascript 
			onclick="return DECMD_ORDERLIST_onclick(Dyn_body)" 
			src="/images/edit/numlist.gif" width=23>
		</TD>
		<TD><IMG alt="ненумерованный список" border=0 height=22 language=javascript 
			onclick="return DECMD_UNORDERLIST_onclick(Dyn_body)" 
			src="/images/edit/bullist.gif" width=23>
		</TD>

		<TD>
			<SELECT class=input language=javascript name=defbody 
				onchange="return FontName_onchange(Dyn_body,defbody)" 
				style="WIDTH: 110px" title="Font Name"> <OPTION 
				value=Arial>Arial
				<OPTION 	value="Arial Narrow">Arial Narrow
				<OPTION value=System>System
				<OPTION selected value="Times New Roman">Times New Roman
				<OPTION value=Verdana>Verdana</OPTION>
			</SELECT>

		</TD>
		<TD>
			<SELECT class=input language=javascript name=desbody 
				onchange="return FontSize_onchange(Dyn_body,desbody)" 
				style="WIDTH: 35px" title="Font Size">
				<OPTION value=1>1
				<OPTION value=2>2
				<OPTION selected value=3>3
				<OPTION value=4>4
				<OPTION value=5>5
				<OPTION value=6>6
				<OPTION value=7>7</OPTION>
			</SELECT>
		</TD>
		<TD>
		<SELECT class=input language=javascript name=decbody
			 onchange="return FontColor_onchange(Dyn_body,decbody)" style="WIDTH: 105px" title="Font Color">
			<OPTION selected style="BACKGROUND: #000000; COLOR: #000000" value=000000>черный</OPTION>
			<OPTION style="BACKGROUND: #000080; COLOR: #000080" value=000080>темно-синий</OPTION>
			<OPTION style="BACKGROUND: #0000ff; COLOR: #0000ff" value=0000FF>синий</OPTION>
			<OPTION style="BACKGROUND: #8a2be2; COLOR: #8a2be2" value=8A2BE2>фиолетовый</OPTION>
			<OPTION style="BACKGROUND: #800080; COLOR: #800080" value=800080>лиловый</OPTION>
			<OPTION style="BACKGROUND: #ee82ee; COLOR: #ee82ee" value=EE82EE>сиреневый</OPTION>
			<OPTION style="BACKGROUND: #800000; COLOR: #800000" value=800000>бордовый</OPTION>
			<OPTION style="BACKGROUND: #a52a2a; COLOR: #a52a2a" value=A52A2A>коричневый</OPTION>
			<OPTION style="BACKGROUND: #ff0000; COLOR: #ff0000" value=FF0000>красный</OPTION>
			<OPTION style="BACKGROUND: #ffa500; COLOR: #ffa500" value=FFA500>оранжевый</OPTION>
			<OPTION style="BACKGROUND: #808080; COLOR: #808080" value=808080>серый</OPTION>
			<OPTION style="BACKGROUND: #228b22; COLOR: #228b22" value=228B22>лиственный</OPTION>
			<OPTION style="BACKGROUND: #008000; COLOR: #008000" value=008000>зеленый</OPTION>
			<OPTION style="BACKGROUND: #9acd32; COLOR: #9acd32" value=9ACD32>желто-зеленый</OPTION>
			<OPTION style="BACKGROUND: #00ffff; COLOR: #00ffff" value=00FFFF>морской волны</OPTION>
			<OPTION style="BACKGROUND: #00bfff; COLOR: #00bfff" value=00BFFF>небесно-голубой</OPTION>
			<OPTION style="BACKGROUND: #1e90ff; COLOR: #1e90ff" value=1E90FF>голубой</OPTION>
			<OPTION style="BACKGROUND: #40e0d0; COLOR: #40e0d0" value=40E0D0>бирюзовый</OPTION>
			<OPTION style="BACKGROUND: #d2b48c; COLOR: #d2b48c" value=D2B48C>бежевый</OPTION>
			<OPTION style="BACKGROUND: #f0e68c; COLOR: #f0e68c" value=F0E68C>хаки</OPTION>
			<OPTION style="BACKGROUND: #ffd700; COLOR: #ffd700" value=FFD700>золотой</OPTION>
			<OPTION style="BACKGROUND: #ffff00; COLOR: #ffff00" value=FFFF00>желтый</OPTION>
			<OPTION style="BACKGROUND: #ffffff; COLOR: #ffffff" value=FFFFFF>белый</OPTION>
		</SELECT>
		</TD>

		<TD>
		<IMG alt="внешняя ссылка" border=0 height=22  language=javascript 
			onclick="return DECMD_HYPERLINK_onclick(Dyn_body)" 
			src="/images/edit/www_link.gif" width=23>
		</TD>
		</TR>
		</TBODY>
		</TABLE>
		</DIV>
		<OBJECT classid=clsid:2D360201-FFF5-11d1-8D03-00A0C959BC0A height=300 id=Dyn_body 
			style="WIDTH: 99%; ALIGN: center;" width=100 
			VIEWASTEXT="">
		</OBJECT>
		</TD>
		</TR>
		</TBODY>
		</TABLE>
		</DIV>
		<INPUT name=body type=hidden BaseID="">
		<SCRIPT language=JavaScript>
			TxtHtmlDyn_body.style.visibility = "hidden";
			var Header=\'<HTML><META content="text/html; charset=windows-1251" http-equiv=Content-Type><HEAD><TITLE></TITLE></HEAD><BODY>\';
			var Footer=\'</BODY></HTML>\';
			document["Dyn_body"].DocumentHTML=Header + document.forms["EDITOR"].textarHtmlDyn_body.value + Footer;
			DynHtmlDyn_body.TBSTATE = "hidden";
			DynHtmlDyn_body.style.visibility = "hidden";
			TxtHtmlDyn_body.style.visibility = "visible";
		</SCRIPT>
<!-- -->





</td>
		    </tr>
		    <tr bgcolor="'.$COLORS[admin_empty].'">
		        <td colspan=2 align=center><br><!--Перед добавлением новости кликните 2 раза на иконку Word\'а--><br>
			<input type="button" '.$DESIGN[btn].' value="'.$butt.'" Onclick="this.form.submit();"> <input type="button" '.$DESIGN[btn].' value="'.$WORDS[news_reset].'" Onclick="this.form.reset();"></td>
		    </tr>
 		</table>
    </td></tr>
</table><br>
</form>
';
	}

	function ADM_show_news_del_form() {
		global $IMAGES;
		global $COLORS;
		$res = mysql_query("SELECT id,create_time,caption FROM S_news ORDER BY id DESC");
		while($row = mysql_fetch_row($res)) {
			$dd .= 	"<tr bgcolor=\"$COLORS[admin_empty]\"><td colspan=3 align=left><font size=-2>$row[1]</font></td></tr>".
				"<tr bgcolor=\"$COLORS[admin_empty]\"><td align=right width=50%><font size=-1>$row[2]</font></td>".
				'<td align=right><font size=-1><a href="?admin=news&edit='.$row[0].'">'.
				'edit</a></font></td>'.
				'<td><font size=-1><a href="?admin=news&del='.$row[0].'">'.
				"del</a></font></td></tr>\n";
		}
		return
'
<form name="news_edit_list" method="GET">
<input type="hidden" name="admin" value="news">
<table border=0 width=50% cellpadding=0 cellspacing=0 align=center>
        <tr><td align=left colspan=3>

        <img src="'.$IMAGES[panel_catalog].'"><img src="'.$IMAGES[empty_center_panel][1].'"
                                height=22 width=50><img src="'.$IMAGES[empty_center_panel][2].'">
        </td></tr>
	<tr><td bgcolor="'.$COLORS[admin_goods_ark].'" valign=top>
		<table border=0 align=center cellpadding=2 cellspacing=1 width=100%>
		'.$dd.'
		</table>
	</td></tr>
</form>
&nbsp;
';
	}

	function ADM_add_news() {
		global $HTTP_POST_VARS;
		global $img1, $img1_name, $img1_size, $img1_type;
		global $img2, $img2_name, $img2_size, $img2_type;
		# get amount of news
		$res = mysql_query("SELECT COUNT(id) FROM S_news");
		$row = mysql_fetch_row($res);
		$amount = $row[0]+1;
		if($img1_name) {
                        # Secure image file name
                        $img1_name = ereg_replace('.gif', '', $img1_name);
                        $img1_name = strtr($img1_name, '/\\.', '___');
                        $img1_name = "images_news/$amount"."_1_$img1_name.gif";
                        # save image
                        $f0 = copy($img1,$img1_name);
                        $f1 = chmod($img1_name,0644);
                        if(!$f0 || !$f1) { die('cant save image file'); $img1_name=''; }
                }
		if($img2_name) {
                        # Secure image file name
                        $img2_name = ereg_replace('.gif', '', $img2_name);
                        $img2_name = strtr($img2_name, '/\\.', '___');
                        $img2_name = "images_news/$amount"."_2_$img2_name.gif";
                        # save image
                        $f0 = copy($img2,$img2_name);
                        $f1 = chmod($img2_name,0644);
                        if(!$f0 || !$f1) { die('cant save image file'); $img2_name=''; }
                }
		$cur_time = get_time();
		mysql_query("INSERT INTO S_news(caption,
						big_content,
						image1,
						image2,
						create_time) VALUES (
							'$HTTP_POST_VARS[caption]',
							'$HTTP_POST_VARS[textarHtmlDyn_body]',
							'$img1_name',
							'$img2_name',
							'$cur_time'
							)");
	}


	function ADM_del_news() {
		global $HTTP_GET_VARS;
		mysql_query("DELETE FROM S_news WHERE id='$HTTP_GET_VARS[del]'");
	}

	function ADM_update_news() {
		global $HTTP_POST_VARS;
		global $img1, $img1_name, $img1_size, $img1_type;
		global $img2, $img2_name, $img2_size, $img2_type;
		$prefix = $HTTP_POST_VARS[nid];
		if($img1_name) {
                        # Secure image file name
                        $img1_name = ereg_replace('.gif', '', $img1_name);
                        $img1_name = strtr($img1_name, '/\\.', '___');
                        $img1_name = "images_news/$prefix"."_1_$img1_name.gif";
                        # save image
                        $f0 = copy($img1,$img1_name);
                        $f1 = chmod($img1_name,0644);
                        if(!$f0 || !$f1) { die('cant save image file'); $img1_name=''; }
                }
		if($img2_name) {
                        # Secure image file name
                        $img2_name = ereg_replace('.gif', '', $img2_name);
                        $img2_name = strtr($img2_name, '/\\.', '___');
                        $img2_name = "images_news/$prefix"."_2_$img2_name.gif";
                        # save image
                        $f0 = copy($img2,$img2_name);
                        $f1 = chmod($img2_name,0644);
                        if(!$f0 || !$f1) { die('cant save image file'); $img2_name=''; }
                }
		mysql_query("UPDATE S_news SET
					caption 	= '$HTTP_POST_VARS[caption]',
					big_content	= '$HTTP_POST_VARS[textarHtmlDyn_body]',
					image1		= '$img1_name',
					image2		= '$img2_name'
					WHERE id='$HTTP_POST_VARS[nid]'");
	}








?>
