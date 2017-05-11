
/*-------------------------*/
// nav tap style
/*-------------------------*/
$(function(){
	$('#gnav li').each(function(){
		$(this).on('touchstart', function(){
			$(this).addClass('on');
		});
		$(this).on('touchend', function(){
			$(this).removeClass('on');
		});
	});
});

/**
 * フォームのmodeと、他のhidden要素の値を設定して、フォームをsubmitする。
 *
 * @return
 */
function do_exec(form_name, linkurl, mode_value, obj, obj_value){
    var form_obj;
    if(form_name && form_name != ""){
        form_obj = document.forms[form_name];
    }else{
        form_obj = document.forms[0];
    }

    if(mode_value && mode_value != ""){
        form_obj['mode'].value = mode_value;
    }
    if(obj && obj != ""){
        form_obj[obj].value = obj_value;
    }

    if(linkurl && linkurl != ""){
        form_obj.action=linkurl;
    }
    form_obj.submit();
}


function openWindow(URL,name,width,height) {
	window.open(URL,name,"width="+width+",height="+height+",scrollbars=yes,resizable=no,toolbar=no,location=no,directories=no,status=no");
}

function func_submit(partner_code){
	var fm = window.opener.document.search_form;		
	fm.partner_code.value = partner_code;
	fm.submit();
	window.close();

	return true;
}

function func_submit_user(user_code){
    var fm = window.opener.document.search_form;        
    fm.user_id.value = user_code;
    fm.submit();
    window.close();

    return true;
}

function newXMLHttpRequest() {  
	var xmlreq = false;  
	if (window.XMLHttpRequest) { // firefox or safari  
		// Create XMLHttpRequest object in non-Microsoft browsers  
		xmlreq = new XMLHttpRequest();  
	}  
	else if (window.ActiveXObject) {    // IE  
		// Create XMLHttpRequest via MS ActiveX  
		try {  
			// Try to create XMLHttpRequest in later versions  
			// of Internet Explorer  
			xmlreq = new ActiveXObject("Msxml2.XMLHTTP");  
		}  
		catch (e1) {  
			// Failed to create required ActiveXObject  
			try {  
				// Try version supported by older versions  
				// of Internet Explorer  
				xmlreq = new ActiveXObject("Microsoft.XMLHTTP");  
			}  
			catch (e2) {  
				// Unable to create an XMLHttpRequest with ActiveX  
			}  
		}  
	} 
	return xmlreq;  
}  

// 銀行名選択時
function checkBankSelect(bankObj) { 
	if(bankObj.value > 0) return;
	if(bankObj.options[bankObj.selectedIndex+1].value > 0){
		bankObj.options[bankObj.selectedIndex+1].selected = true;
	}else{
		bankObj.options[bankObj.selectedIndex+2].selected = true;
	}
}