<?
	$WORDS[authors_caption] 	.=	'Информация для авторов программных продуктов';
	$WORDS[authors_deny]		.=	'Доступ к разделу &quot;авторы&quot; <u><font color=red>закрыт</u></font>,'.
						'<br>пожалуйста авторизуйтесь или зарегистрируйтесь в системе.';
	$WORDS[authors_conditions]	.=	'<br><b>Добавление Вашей программы:</b><br><br>'.
						'Для добавления программы в базу 2CD.RU, Вам необходимо заполнить приведенную '.
						'ниже форму. После проверки, программа будет помещена в базу, а на '.
						'указанный e-mail будет выслано сообщение об этом. При добавлении программ, пожалуйста, '.
						'заполняйте корректную информацию, в противном случае занесение программы в базу не гарантируется!<br><br>'.
						'<b>Правила:</b><br><br>'.
						'<b>1.</b> Необходимо заполнить все поля формы (за исключением "URL скриншота").<br>'.
						'<b>2.</b> Текст описания должен быть кратким и понятным, иначе вашу программу будет трудно найти через поисковые системы.<br>'.
						'<b>3.</b> При заполнении формы, обязательно следуйте инструкциям! (<b><font color=red>TIPS</font></b>)<br><br>'.
						'<hr size=1 noshade color=#000000><br><br>'.
						'<b>1. Название раздела:</b><br>'.
							'<b><font color=red>TIP:</font></b> Выберите существующий раздел каталога для своей программы. Образец:<br>Интернет - Web дизайн, или<br>Игры - тетрисы'.
							'<br><input type="text" name="tosection" size=50 class=FormsOrange>'.

						'<br><br><b>2. Название программы:</b><br>'.
							'<b><font color=red>TIP:</font></b> Название программы может состоять из любых символов. В данное поле не надо вводить номер версии.'.
							'<br><input type="text" name="caption" size=50 class=FormsOrange>'.

						'<br><br><b>3. Версия:</b><br>'.
							'<b><font color=red>TIP:</font></b> В номере версии нет необходимости ставить букву \'v\'.'.
							'<br><input type="text" name="version" size=50 class=FormsOrange>'.

						'<br><br><b>4. Тип программы:</b><br>'.
							'<b><font color=red>TIP:</font></b> Условия регистрации программы.<br>'.
							'<INPUT type=radio name="prog_type" value="Freeware" checked class=FormsOrange> Freeware &nbsp; <INPUT type=radio name=type value="Shareware" class=FormsOrange> Shareware &nbsp; <INPUT type=radio name=type value="Demo" class=FormsOrange> Demo'.

						'<br><br><b>5. Операционная система:</b><br>'.
							'<b><font color=red>TIP:</font></b> Операционные системы, под которые гарантируется стабильная работа добавляемой программы.<br>'.
								'<SELECT NAME="os" class=FormsOrange>
								  <OPTION VALUE="Windows 95/98/Me">Windows 95/98/Me</OPTION>
								  <OPTION VALUE="Windows All">Windows All</OPTION>
								  <OPTION VALUE="Windows 2000/NT/XP">Windows 2000/NT/XP</OPTION>
								  <OPTION VALUE="Windows CE">Windows CE</OPTION>
								  <OPTION VALUE="DOS">DOS</OPTION>
								  <OPTION VALUE="UNIX/LINUX">UNIX/LINUX</OPTION>
								</SELECT>'.

						'<br><br><b>6. Язык интерфейса:</b><br>'.
							'<b><font color=red>TIP:</font></b> Язык, на котором реализован интерфейс программы.<br>'.
							'<INPUT type=radio name="prog_lang" class=FormsOrange value=0 checked> Английский
							 <INPUT type=radio name="prog_lang" class=FormsOrange value=1> Русский
							 <INPUT type=radio name="prog_lang" class=FormsOrange value=2> Русско/английский'.

						'<br><br><b>7. Описание программы:</b><br>'.
							'<br><textarea name="description" cols=70 rows=10 class=FormsOrange></textarea>'.

						'<br><br><b>8. URL программы:</b><br>'.
							'<b><font color=red>TIP:</font></b> Необходимо указать прямой адрес файла программы (файл с расширением .zip, .rar, .arj, .exe). Учтите, что регистр имеет значение (.ZIP и .zip - разные вещи).'.
							'<br><input type="text" name="real_url" value="http://" size=50 class=FormsOrange>'.

						'<br><br><b>9. URL скриншота:</b><br>'.
							'<b><font color=red>TIP:</font></b> Необходимо указать прямой адрес картинки, а не страницы со скриншотами (файл с расширением .gif, .jpg, .png). Если скриншота к программе не существует, то оставьте это поле без изменений.'.
							'<br><input type="text" name="screenshot1" value="http://" size=50 class=FormsOrange>'.

						'<br><br><b>10. Web-сайт программы:</b><br>'.
							'<b><font color=red>TIP:</font></b> Адрес сайта программы или разработчика программы'.
							'<br><input type="text" name="about_url" value="http://" size=50 class=FormsOrange>'.

						'<br><br><b>11. Ф.И.О. автора:</b><br>'.
							'<br><input type="text" name="author" size=50 class=FormsOrange>'.

						'<br><br><b>12. E-mail для связи:</b><br>'.
							'<b><font color=red>TIP:</font></b> На данный адрес будет отправлено письмо, информирующее Вас о добавлении программы в базу'.
							'<br><input type="text" name="email" size=50 class=FormsOrange>'.

						'<br><br><br>'.
						'<br>';
						



#	$WORDS[]	.=	'';
#	$WORDS[]	.=	'';
#	$WORDS[]	.=	'';
#	$WORDS[]	.=	'';
#	$WORDS[]	.=	'';

?>
