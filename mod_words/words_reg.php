<?

	$WORDS[reg_fname]		.=	'Имя';
	$WORDS[reg_lname]		.=	'Фамилия';
	$WORDS[reg_mname]		.=	'Отчество';
	$WORDS[reg_email]		.=	'E-mail';
	$WORDS[reg_passwd1]		.=	'Пароль';
	$WORDS[reg_passwd2]		.=	'Пароль еще раз';
	$WORDS[reg_sex]			.=	'Пол';
	    $WORDS[reg_sex_choice1]	.=	'Жен';
	    $WORDS[reg_sex_choice2]	.=	'Муж';
	$WORDS[reg_phone]		.=	'Телефон';
	$WORDS[reg_org]			.=	'Тип организации';
	    $WORDS[reg_org_choice1]	.=	'Физический';
	    $WORDS[reg_org_choice2]	.=	'Юридический';
	$WORDS[reg_birth]		.=	'Дата рождения';
	    $WORDS[reg_birth1]		.=	'день';
	    $WORDS[reg_birth2]		.=	'месяц';
	    $WORDS[reg_birth3]		.=	'год';
	$WORDS[reg_asknews]		.=	'Подписаться на новости?';
	$WORDS[reg_default_email]	.=	'емэйл@емэйл.ru';

	$WORDS[reg_city_default]	.=	'Москва';
	$WORDS[reg_city_choose]		.=	'Выберете Ваш город';

	$WORDS[reg_city]		.=	'Город';
	$WORDS[reg_other_city]		.=	'Другой город';
	$WORDS[reg_postindex]		.=	'Почтовый индекс';
	$WORDS[reg_region]		.=	'Район';
	$WORDS[reg_oblast]		.=	'Область (край, республика)';
	$WORDS[reg_metro]		.=	'Метро';
	$WORDS[reg_metro_choose]	.=	'Станция метро';
	$WORDS[reg_street]		.=	'Улица';
	$WORDS[reg_build]		.=	'Дом';
	$WORDS[reg_flat]		.=	'Квартира';
	$WORDS[reg_korp]		.=	'Корпус';
	$WORDS[reg_entrance]		.=	'Подъезд';
	$WORDS[reg_flour]		.=	'Этаж';
	$WORDS[reg_code]		.=	'Код в подъезд';
	$WORDS[reg_cancall_time]	.=	'Когда перезвонить';
	$WORDS[reg_cancall_at]		.=	'Когда перезвонить';
	$WORDS[reg_deliver_time]	.=	'Когда доставить';
	$WORDS[reg_deliver_at]		.=	'Когда доставить';
	$WORDS[reg_additional]		.=	'Дополнительно/как лучше проехать';
	$WORDS[reg_created]		.=	'Дата регистрации';

	$WORDS[reg_btn_second_step]	.=	'Продолжить регистрацию';
	$WORDS[reg_btn_finish]		.=	'Закончить регистрацию';

	$WORDS[reg_user_exists]		.=	'<center><b><font color="red">Пользователь с таким e-mail\'ом уже зарегистрирован</font></b></center><br>';

	$WORDS[reg_make_order]		.=
'
Укажите конечный адрес доставки.<br>
<u>Чем подробнее</u> будет введенная информация, <u>тем быстрее</u> курьер доставит товар Вам в руки.<br>
Значком <font color=red>*</font> обозначены обязательные поля.
';

	$WORDS[reg_agreement_1]		.=
				'<b>Шаг 1</b><br><br>'.
				'Если Вы еще не являетесь зарегистрированным пользователем нашего магазина - '.
				'не беда, это делается просто. Заполните эту форму и система запомнит Вас.<br>';

	$WORDS[reg_agreement_2]		.=
				'Если Вы уже зарегистрированы в системе, то введите Ваш логин и пароль в правой части экрана<br>';

	$WORDS[reg_agreement_3]		.=
				'Просьба вносить только правильную информацию, это обеспечит быструю доставку. '.
				'В поле E-mail укажите ваш реальный e-mail адрес, он будет использован как логин.<br>'.
				'Администрация магазина полностью гарантирует целостность и сохранность Ваших данных.'.
				'<br><br>Значком <font color=red>*</font> обозначены обязательные поля.';

	$WORDS[reg_agreement]		.= $WORDS[reg_agreement_1].$WORDS[reg_agreement_3];
	$WORDS[reg_agreement_order]	.= $WORDS[reg_agreement_1].$WORDS[reg_agreement_2].$WORDS[reg_agreement_3];

	$WORDS[reg_step2]		.=
'
<b>Шаг 2</b> (заполнять необязательно)<br><br>
Если вы хотите сделать сейчас заказ, то для конечной доставки необходима более подробная информация, пожалуйста введите
точный адрес Вашего места проживания.
<br>
<u>Чем подробнее</u> будет введенная информация, <u>тем быстрее</u> курьер доставит товар Вам в руки.
<br><br>
Значком <font color=red>*</font> обозначены обязательные поля.

';
	$WORDS[register_thankyou]	.=
'
<b>Регистрация завершена</b><br><br>
Спасибо
';
	$WORDS[reg_make_order_results]	.=
'
<center>
<b>Ваш заказ оформлен</b><br><br>
В ближайшее время после заказа с Вами свяжется оператор для уточнения<br>
всех деталей доставки. Доставка в пределах Москвы <u>бесплатна</u>.<br>
Обычно доставка осуществляется на следующий день после оформления заказа. 
<br><br>
<b>Спасибо за покупку! Приходите еще!</b><br>
</center>
';



?>
