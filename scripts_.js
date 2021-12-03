function GoSearch(s,strsymbol) {

var typename="all";

var f=s.type; //window.document.ORGSEARCH.type;
//var i=s.type.length;
for (var i = 0; i < f.length; i++){
        if (f[i].checked)   { typename=f[i].value; }};
	var alls="/dbcomp/listsearch?type=" + typename + "&symbol=" + escape(strsymbol);
	document.location.href=alls;	


}


//<!--
function OptionChoosed(n, options) {
	var i = options.selectedIndex;
	if (i > 0) {
//		n.value = options[i].text;
//	} else {
		n.value = "";
	}
}

function OptionChoosed2(n, options) {
	var i = options.selectedIndex;
   if (i >= 0) {
	   n.value = options[i].text;
   } else {
      n.value = "";
   }
}

function TextChanged(options) {
   options.selectedIndex = 0;
}

function ValidateForm(f) {
	for (var n=0; n<f.elements.length; n++) {
		if (f.elements[n].type == "text") {
		 	if (!isEmpty(f.elements[n].value) ) {
				return(true);
			}
		}
	}
	alert("Please, input something\n");
	return(false);
}

function isEmpty(data) {
	for (var i=0; i < data.length; i++) {
		if (data.substring(i, i+1) != " ") {
			return(false);
		}
	}
	return(true);
}

function ShowBanner(data) {
	if (isEmpty(data)) {
		alert("At first, type the url\n");
	} else {
		document.images[0].src=data;
	}
}

function ValidateEditorForm(f) {
	if (isEmpty(f.NAME.value) ) {
		alert("Необходимо ввести название организации\n");
		return false;
	} else {
      SaveVOptionsToHiddenItem(f.SEL_ACTIVITY, f.NEW_ACTIVITY, 1);
		return true;
	}
}

function HideAllBadChar(elem) {
		var dval = elem.value;
		dval=dval.replace(/>/g,"&gt;"); 
		dval=dval.replace(/</g,"&lt;");
		dval=dval.replace(/&/g,"&amp;");
		dval=dval.replace(/"/g,"&quot;");
		elem.value=dval;

}

function ValidateMyEditorForm(f) {
	if (isEmpty(f.name.value) ) {
		alert("Необходимо ввести название\n");
		return false;
	} else {
		HideAllBadChar(f.name);
	SaveVOptionToHiddenItemAll(f);
		return true;
	}
}

function ValidateMyMissEditorForm(f) {
	if (isEmpty(f.name.value) ) {
		alert("Не заполнено поле Имя\n");
		return false;
	} else {
	if (isEmpty(f.lastname.value) ) {
		alert("Не заполнено поле Фамилия\n");
		return false;
	} else {
	if (isEmpty(f.middlename.value) ) {
		alert("Не заполнено поле Отчество\n");
		return false;
	} else {
	if (isEmpty(f.title.value) ) {
		alert("Не заполнено поле Титул\n");
		return false;
	} else {
		HideAllBadChar(f.name);
		HideAllBadChar(f.lastname);
		HideAllBadChar(f.middlename);
		HideAllBadChar(f.title);
	SaveVOptionToHiddenItemAll(f);
		return true;
	}}}}
}

function ValidateMy1EditorForm(f) {
	SaveVOptionToHiddenItemAll(f);
		return true;
}

function ValidateRegionEditorForm(f) {
   SaveVOptionsToHiddenItem(f.SEL_REGION, f.NEW_REGION_ID, 0);
   SaveTOptionsToHiddenItem(f.SEL_REGION, f.NEW_REGION_VALUE, 0);

   return true;
}

function ValidateActivityEditorForm(f) {
   SaveVOptionsToHiddenItem(f.SEL_ACTIVITY, f.NEW_ACTIVITY_ID, 0);
   SaveTOptionsToHiddenItem(f.SEL_ACTIVITY, f.NEW_ACTIVITY_VALUE, 0);

   return true;
}

function SaveVOptionsToHiddenItem(options, hitem, pos) {
   var delim = "";

   for (var i=pos; i<options.length; i++)
   {
      hitem.value += delim + options[i].value;
      delim = ",";
   }
}

function SaveTOptionsToHiddenItem(options, hitem, pos) {
   var delim = "";

   for (var i=pos; i<options.length; i++)
   {
      hitem.value += delim + options[i].text;
      delim = ",";
   }
}

function ValidateInsertForm(f) {
	if (isEmpty(f.url.value) ) {
		alert("At first, type the location of image\n");
		return false;
	} else {
		if (isEmpty(f.webpage.value) ) {
        	alert("At first, type the associated document\n");
        	return false;
		} else {
			return true;
		}
	}
}

function AddActivity(options_from, options_to) {
   var i = options_from.selectedIndex;

   if ( (i>0) && (!isOptionExist(options_from[i].text, options_to, 1)) )
   {

      var nextElement = options_to.length;
      options_to.length = nextElement+1;

      options_to[nextElement].text = options_from[i].text;
      options_to[nextElement].value = options_from[i].value;
      options_to[nextElement].selected = true;
   }
}

function AddNewActivity(n, options_to, options_common) {
   if ( !isEmpty(n.value) )
   {
      if ( isOptionExist(n.value, options_common, 1) )
      {
         alert("Выберите активность из списка\n");
         n.value="";
         return true;
      }

      if ( isOptionExist(n.value, options_to, 1) )
         return true;

      var nextElement = options_to.length;
      options_to.length = nextElement+1;

      options_to[nextElement].text = n.value;
      options_to[nextElement].value = 0;
      options_to[nextElement].selected = true;
      n.value = "";
   }
}

function AddNewOption(n, options_to) {
   if ( !isEmpty(n.value) )
   {
      if ( isOptionExist(n.value, options_to, 0) )
         return true;

      var nextElement = options_to.length;
      options_to.length = nextElement+1;

      options_to[nextElement].text = n.value;
      options_to[nextElement].value = 0;
      options_to[nextElement].selected = true;
      n.value = "";
   }
}

function UpdateOption(n, options_to) {
   var i = options_to.selectedIndex;
   if (i < 0) 
   {
      alert("Выберите элемент из списка");
      return true;
   }

   if ( isEmpty(n.value) )
   {
      alert("Значение не должно быть пустым");
      return true;
   }   

   if ( isOptionExist(n.value, options_to, 0) )
      return true;

   options_to[i].text = n.value;
   n.value = "";
}

function isOptionExist( value, options, pos ) {
   for (var i=pos; i<options.length; i++)
   {
      if (options[i].text == value) 
         return true;
   }
   return false;
}

function DeleteActivity (options)
{
   var i = options.selectedIndex;
   if (i>0) 
   {
      if ( (options.length > 2) && (i+1 != options.length) )
      {
         options[i].text  = options[options.length-1].text;
         options[i].value = options[options.length-1].value;
      }
      options.length --;
   }
}

function DeleteOption (options)
{
   var i = options.selectedIndex;
   if (i>=0) 
   {
      if ( (options.length > 1) && (i+1 != options.length) )
      {
         options[i].text  = options[options.length-1].text;
         options[i].value = options[options.length-1].value;
      }
      options.length --;
   }
}

function init() {
}

function SelectAll(mark) {
   for (i = 0; i < document.forms[0].elements.length; i++)
   {
      var item=document.forms[0].elements[i];
      if (item.name == "CHECK_DELETE_ID")
      {
         item.checked = mark;
      };
   }
};



//-->
