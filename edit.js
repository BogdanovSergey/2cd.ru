// DHTML Editing Component Constants for JavaScript
DECMD_BOLD =                      5000
DECMD_ITALIC =                    5023
DECMD_UNDERLINE =                 5048

DECMD_JUSTIFYCENTER =             5024
DECMD_JUSTIFYLEFT =               5025
DECMD_JUSTIFYRIGHT =              5026

DECMD_SETFONTNAME =               5044
DECMD_SETFONTSIZE =               5045

DECMD_SETFORECOLOR =              5046

DECMD_ORDERLIST =                 5030
DECMD_UNORDERLIST =               5051

DECMD_HYPERLINK =                 5016

DECMD_IMAGE =                     5017

OLECMDEXECOPT_DODEFAULT =         0 
OLECMDEXECOPT_PROMPTUSER =        1
OLECMDEXECOPT_DONTPROMPTUSER =    2

function DECMD_BOLD_onclick(ctrl) {
	if(ctrl.QueryStatus(DECMD_BOLD)==1) return;
	ctrl.ExecCommand(DECMD_BOLD,OLECMDEXECOPT_DODEFAULT);
	ctrl.focus();
}

function DECMD_ITALIC_onclick(ctrl) {
	if(ctrl.QueryStatus(DECMD_ITALIC)==1) return;
	ctrl.ExecCommand(DECMD_ITALIC,OLECMDEXECOPT_DODEFAULT);
	ctrl.focus();
}

function DECMD_UNDERLINE_onclick(ctrl) {
	if(ctrl.QueryStatus(DECMD_UNDERLINE)==1) return;
	ctrl.ExecCommand(DECMD_UNDERLINE,OLECMDEXECOPT_DODEFAULT);
	ctrl.focus();
}

function DECMD_JUSTIFYRIGHT_onclick(ctrl) {
	if(ctrl.QueryStatus(DECMD_JUSTIFYRIGHT)==1) return;
	ctrl.ExecCommand(DECMD_JUSTIFYRIGHT,OLECMDEXECOPT_DODEFAULT);
	ctrl.focus();
}

function DECMD_JUSTIFYLEFT_onclick(ctrl) {
	if(ctrl.QueryStatus(DECMD_JUSTIFYLEFT)==1) return;
	ctrl.ExecCommand(DECMD_JUSTIFYLEFT,OLECMDEXECOPT_DODEFAULT);
	ctrl.focus();
}

function DECMD_JUSTIFYCENTER_onclick(ctrl) {
	if(ctrl.QueryStatus(DECMD_JUSTIFYCENTER)==1) return;
	ctrl.ExecCommand(DECMD_JUSTIFYCENTER,OLECMDEXECOPT_DODEFAULT);
	ctrl.focus();
}

function FontName_onchange(ctrl, elem) {
	if(ctrl.QueryStatus(DECMD_SETFONTNAME)==1) return;
	ctrl.ExecCommand(DECMD_SETFONTNAME, OLECMDEXECOPT_DODEFAULT, elem.value);
	ctrl.focus();
}

function FontSize_onchange(ctrl, elem) {
	if(ctrl.QueryStatus(DECMD_SETFONTSIZE)==1) return;
	ctrl.ExecCommand(DECMD_SETFONTSIZE, OLECMDEXECOPT_DODEFAULT, parseInt(elem.value));
	ctrl.focus();
}

function FontColor_onchange(ctrl, elem)  {
	if(ctrl.QueryStatus(DECMD_SETFORECOLOR)==1) return;
    ctrl.ExecCommand(DECMD_SETFORECOLOR,OLECMDEXECOPT_DODEFAULT, elem.value);
    ctrl.focus();
}

function DECMD_ORDERLIST_onclick(ctrl) {
	if(ctrl.QueryStatus(DECMD_ORDERLIST)==1) return;
	ctrl.ExecCommand(DECMD_ORDERLIST,OLECMDEXECOPT_DODEFAULT);
	ctrl.focus();
}

function DECMD_UNORDERLIST_onclick(ctrl) {
	if(ctrl.QueryStatus(DECMD_UNORDERLIST)==1) return;
	ctrl.ExecCommand(DECMD_UNORDERLIST,OLECMDEXECOPT_DODEFAULT);
	ctrl.focus();
}

function DECMD_HYPERLINK_onclick(ctrl) {
	if(ctrl.QueryStatus(DECMD_HYPERLINK)==1) return;
	ctrl.ExecCommand(DECMD_HYPERLINK,OLECMDEXECOPT_PROMPTUSER);
	ctrl.focus();
}
function SaveDynTextToHiddenItem(elem, DL, DLD, TL) {
      if (DLD.TBSTATE == "visible") {
	var dval = DL.FilterSourceCode (DL.DOM.body.innerHTML);
	dval=dval.replace(/&nbsp;/g," ");
	elem.value=dval;
      } else {
	elem.value=TL.value;
      }
}

function GoToHTML(newState, DL, DLD, TL, TLD){
      DLD.TBSTATE = newState;
      if (newState == "hidden") {
	var dval = "";
	if (DL.DOM.body.innerHTML.length>0){ 
		dval = DL.FilterSourceCode (DL.DOM.body.innerHTML);
	        dval = dval.replace(/&nbsp;/g," ");
	}
        TL.value=dval;

        DLD.style.visibility = "hidden";
        TLD.style.visibility = "visible";
      } else {
	DL.DocumentHTML = TL.value; 
        DLD.style.visibility = "visible";
        TLD.style.visibility = "hidden";
      }
}
