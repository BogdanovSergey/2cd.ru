
	function compare(f,str) {
		if(f.a.value==f.b.value) {
			f.submit();
		} else {
			alert(str);
			return false;
		}
	}

	function new_win(to) {
		window.open(to,'new_win','resizable=1,scrollbars=1,toolbar=0,width=500,height=400');
		return false;
	}

	function roll(id,start) {
		document.forms['rollf'].id.value = id;
		document.forms['rollf'].start.value = start;
		document.forms['rollf'].submit();
	}

	function buy_win(item,am) {
		if(am.value>=1) {
			var to = '?user=additem&item='+item+'&am='+am.value;
			am.value=1; }
		else {
			var to = '?user=additem&item='+item+'&am=1'; }
		window.open(to,'buy_win','resizable=1,scrollbars=0,toolbar=0,width=200,height=100');
		return false;
	}

	function buy_win_lvl(item) {
		var to = '?user=addlvl&level='+item;
		window.open(to,'buy_win_lvl','resizable=1,scrollbars=1,toolbar=0,width=200,height=100');
		return false;
	}

	function info_win(id,lvl) {
		var to = '?showinfo='+id;
		var l  = '&lvl='+lvl;
		if(lvl>0) {
			window.open(to+l,'info_win'+id,'resizable=1,scrollbars=1,toolbar=0,width=400,height=400'); }
		else {
			window.open(to,'info_win'+id,'resizable=1,scrollbars=1,toolbar=0,width=400,height=400'); }
		return false;
	}

	function reg_form1(f) {
		var ok = 1;
		var cap= 'Попробовать еще раз';
		if(f.fname.value.length==0 || f.fname.value.length>24) 
			{ ok=0; alert('Поле ИМЯ не может быть пустым'); f.butt.value=cap; return false; }
		if(f.email.value.length==0 || f.email.value.length>100) 
			{ ok=0; alert('Поле E-MAIL не может быть пустым'); f.butt.value=cap; return false; }
		if(f.pass1.value.length==0 || f.pass2.value!=f.pass1.value || f.pass1.value.length>100) 
			{ ok=0; alert('Поле ПАРОЛЬ не может быть пустым или пароли не совпадают'); f.pass1.value=0; f.pass2.value=''; f.butt.value=cap; return false; }
		if(f.phone.value.length==0 || f.phone.value.length>24) 
			{ ok=0; alert('Поле ТЕЛЕФОН не может быть пустым'); f.butt.value=cap;return false; }
		if(ok==1) { 
			f.submit();
			return false;
		}
	}

	function reg_form2(f) {
		var ok = 1;
		var cap= 'Попробовать еще раз';
		SelIdx = f.city.selectedIndex;
		if(SelIdx==0 && (f.city2.value.length==0 || f.city2.value=='дТХЗПК ЗПТПД'))
			{ ok=0; alert('Поле ГОРОД не может быть пустым'); f.butt.value=cap; return false; }

		if(f.street.value.length==0 || f.street.value.length>255)
			{ ok=0; alert('Поле УЛИЦА не может быть пустым'); f.butt.value=cap; return false; }
		if(f.build.value.length==0 || f.build.value.length>24)
			{ ok=0; alert('Поле ДОМ не может быть пустым'); f.butt.value=cap; return false; }
		if(f.flat.value.length==0 || f.flat.value.length>24)
			{ ok=0; alert('Поле КВАРТИРА не может быть пустым'); f.butt.value=cap; return false; }
		if(ok==1) { 
			f.submit();
			return false;
		}
	}





