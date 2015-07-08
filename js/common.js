var isMSie = /*@cc_on!@*/0;

function checkall(chk) {
    if (document.getElementById("chkall").checked==true) {
        for (i=0; i<chk.length; i++)
            chk[i].checked = true;
    } else {
        for (i=0; i<chk.length; i++)
            chk[i].checked = false;
    }
}

function chkrvs(chk) {
    document.getElementById('chkall').checked = false; 
    for (var i in chk)
        chk[i].checked = !chk[i].checked
    if (isMSie)
        for (i=0; i<chk.length; i++)
            chk[i].checked = !chk[i].checked
}

function chkboxes(f) {
    var cnt = 0;
    for (i=0; i<f.elements.length; i++)
        if (f.elements[i].type == "checkbox" && f.elements[i].checked)
            cnt++;
    return cnt;
}

function listdel(params, target) {
    var form = document.forms[0];
    if (!chkboxes(form))
        showmsg('Select record(s) to delete.');
    else
        if(confirm('Proceed with deletion?'))
            frmSubmit(params,target,form);
}

function chkLogin(f) {
    var f = document.forms[0];
    for (i = 0; i < f.elements.length - 1; i++)
        if (f.elements[i].value == "") {
            if (f.elements[i].type == "text")
                alert('Enter your login ID.')
            else
                alert('Enter your login password.')
            f.elements[i].focus();
            return false;
        }
    frmSubmit('','login',f);        
}

function search(mid,tb) {
    var keyword = document.getElementById("searchfor").value;
    if (keyword && keyword.length > 1)
        location.href="./?mid="+mid+"&tb="+tb+"&kw="+keyword;            
    else
        alert('Search keyword should be more than 2 letters.')
}

function cancelsrch(mid,tb) {
    location.href="./?mid="+mid+"&tb="+tb;
}

function savechange(param,target,form) {
    var txtbox = document.getElementById('catName');
    if (txtbox.value == "") {
        alert("Name field cannot be empty.");
        txtbox.focus();        
    } else {
        frmSubmit(param,target,form)
    }
}

function frmSubmit(params,target,form,method) {
    for (var key in params) {
        var addfield = document.createElement("input");
        addfield.setAttribute("type", "hidden");
        addfield.setAttribute("name", key);
        addfield.setAttribute("value", params[key]);
        form.appendChild(addfield);
    }
    form.method = method || 'post';
    form.action = './inc/admin_'+target+'_action.php';
    form.submit();
}

function logout() {
    location.href = '/inc/admin_login_action.php';
}

function chkMin(form,fid) {
    var msg = '';
    if (fid == 6) {
        if (form.fname.value == '')
            msg += 'Firstname field is empty.<br />';
        if (form.lname.value == '')
            msg += 'Lastnam field is empty.<br />';
        if (form.licno.value == '')
            msg += 'License number field is empty.<br />';
        if (!chkboxes(form))
            msg += 'At lease one of the license types must be selected.<br />';
        if (form.email.value == '')
            msg += 'E-mail field is empty.<br />';
        if (form.pwd.value == '')
            msg += 'Password field is empty.<br />';
    } else {
        if (form.subject.value == '')
            msg += 'Subject is missing.<br />';
        if (form.tb.value == '3') {
            if (form.file.value == '')
                msg += 'File to be uploaded is not selected.<br />';
        } else {
            if (form.detail.value == '')
                msg += 'Detailed content is missing.<br />';
        }
    }
    if (msg != '') {
        showmsg(msg, '#ff0000');
        return false;
    } else
        return true;
}

function chkPhoto(id,lbl) {
    var msg = '';
    if (id == null || id == '')
        if (document.getElementById('file0').value == '')
            msg += 'At least one image file is needed to post this article.<br />';
    if (lbl != null)
        if (document.getElementById('text0').value == '')
            msg += lbl + ' field cannot be empty.';
    if (msg != '') {
        showmsg(msg, '#ff0000');
        return false;
    } else {
        return true;
    }
}

function chkVideo(id,lbl) {
    var msg = '';
    if (id == null || id == '')
        if (document.getElementById('file0').value == '')
            msg += 'Video clip is not chosen.<br />';
    if (lbl != null) {
        if (document.getElementById('text0').value == '')
            msg += 'Title is missing.<br />';
        if (document.getElementById('btext').value == '')
            msg += 'Text is mission.<br />';
        if (document.getElementById('pname').selectedIndex == 0)
            msg += 'Select name of preacher.<br />';
        //if (document.getElementById('audio').value == '')
        //    msg += 'Audio file is not chosen.<br />';
    }
    if (msg != '') {
        showmsg(msg);
        return false;
    } else {
        return true;
    }
}

function chkAudio() {
    if (document.getElementById('audioextraction').checked==true) {
        document.getElementById('uploadaudiofile_div').innerHTML = document.getElementById('uploadaudiofile_div').innerHTML; 
        document.getElementById('audio').disabled = true;
    } else 
        document.getElementById('audio').disabled = false;
}

function showmsg(m,c) {
    var bar = document.getElementById('msgbar');
    var box = document.getElementById('msgbox'); 
    if (bar.style.display == "block") bar.style.display = 'none';
    box.style.color = c || '#ff0000';
    box.innerHTML = m;
    $("#msgbar").show("slow");
}

function reorder(p,o) {
    if (document.getElementById('disp').checked==true) {
        location.href="./?"+p+"&or="+o;
    } else {
        location.href="./?"+p.replace(o,p);
    }
}

function imgTitle(v) {
    var txt = document.getElementById('fTitle');
    if (v == 1)
        txt.style.display = "none";
    else
        txt.style.display = "";
}

function changeuse() {
    var h = document.getElementById('inuse');
    v = h.value;
    var n = Math.abs(v-1);
    document.getElementById('use').className = "inuse"+n;
    h.value = n;
}

function AddFileUpload() {
    var cnt = counter - 1;
    var div = document.createElement('div');
    div.innerHTML = '<label for="" class="lbl">Picture Upload:</label><input id="file' + counter + '" name="pic[]" type="file" onchange="AddFileUpload()" />' +
                    '<input id="Button' + counter + '" type="button" class="flat" value="Remove" onclick="RemoveFileUpload(this)" /><br />' +
                    '<label for="" class="lbl">Label:</label><input id="text' + counter + '" name="lbl[]" type="text" class="pic_label" />';
    document.getElementById("FileUploadContainer").appendChild(div);
    document.getElementById("text"+cnt).focus();
    counter++;
}

function RemoveFileUpload(div) {
    document.getElementById("FileUploadContainer").removeChild(div.parentNode);
}

function setCookie(cname,value,expdays) {
    var expdate = new Date();
    expdate.setDate(expdate.getDate() + expdays);
    var cvalue = value + ((expdays==null) ? "" : "; expires="+expdate.toUTCString());
    document.cookie=cname + "=" + cvalue;
}

function listItems(page,v) {
    setCookie(page,v);
    location.reload();
}

function displayMultimedia(src,width,height,options){var html=_displayMultimedia(src,width,height,options);if(html)document.writeln(html);}

function _displayMultimedia(src,width,height,options){if(src.indexOf('files')==0)src=request_uri+src;var defaults={wmode:'transparent',allowScriptAccess:'sameDomain',quality:'high',flashvars:'',autostart:false};var params=jQuery.extend(defaults,options||{});var autostart=(params.autostart&&params.autostart!='false')?'true':'false';delete(params.autostart);var clsid="";var codebase="";var html="";if(/\.(gif|jpg|jpeg|bmp|png)$/i.test(src)){html='<img src="'+src+'" width="'+width+'" height="'+height+'" />';}else if(/\.flv$/i.test(src)||/\.mov$/i.test(src)||/\.moov$/i.test(src)||/\.m4v$/i.test(src)){html='<embed src="'+request_uri+'/video/niceplayer.swf" allowfullscreen="true" autostart="'+autostart+'" width="'+width+'" height="'+height+'" flashvars="&file='+src+'&width='+width+'&height='+height+'&autostart='+autostart+'" wmode="'+params.wmode+'" />';}else if(/\.swf/i.test(src)){clsid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000';if(typeof(enforce_ssl)!='undefined'&&enforce_ssl){codebase="https://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0";}

else{codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,28,0";}

html='<object classid="'+clsid+'" codebase="'+codebase+'" width="'+width+'" height="'+height+'" flashvars="'+params.flashvars+'">';html+='<param name="movie" value="'+src+'" />';for(var name in params){if(params[name]!='undefined'&&params[name]!=''){html+='<param name="'+name+'" value="'+params[name]+'" />';}}

html+=''

+'<embed src="'+src+'" autostart="'+autostart+'"  width="'+width+'" height="'+height+'" flashvars="'+params.flashvars+'" wmode="'+params.wmode+'"></embed>'

+'</object>';}else{if(jQuery.browser.mozilla||jQuery.browser.opera){autostart=(params.autostart&&params.autostart!='false')?'1':'0';}

html='<embed src="'+src+'" autostart="'+autostart+'" width="'+width+'" height="'+height+'"';if(params.wmode=='transparent'){html+=' windowlessvideo="1"';}

html+='></embed>';}

return html;}

function loadCalendar(mid, mmo, myy, tdiv){
    var rnd = new Date().getTime();
	//document.getElementById(tdiv).innerHTML = "<img src='/yellow/image/main/loading.gif'>";
	getPage('./exe/event_calendar.php?mid='+mid+'&mymon='+mmo+'&myy='+myy+'&rnd='+rnd, tdiv);
}

/*************************************************************
    Function        : getPage(url, target)
    Detail          : return after requested object instantiation
*************************************************************/
function getPage(url, targetdiv) {
    var xmlObj = newXMLHttpRequest();
    if (!xmlObj) return "Your browser is not supported.";
    
    xmlObj.onreadystatechange = function() {
      if (xmlObj.readyState == 4) {
        if (xmlObj.status == 200) {
          document.getElementById(targetdiv).innerHTML = xmlObj.responseText;
        }
      }
    }
    xmlObj.open("GET", url, true);
    xmlObj.send(null);
}

/*************************************************************
    Function        : newXMLHttpRequest()
    Detail          : return after requested object instantiation
*************************************************************/
// function from http://www-128.ibm.com/developerworks/kr/library/j-ajax1/index.html
function newXMLHttpRequest() {
    var xmlreq = false;
    if (window.XMLHttpRequest) {
        // Create XMLHttpRequest object in non-Microsoft browsers
        xmlreq = new XMLHttpRequest();
    } else if (window.ActiveXObject) {
        // Create XMLHttpRequest via MS ActiveX
        try {
            // Try to create XMLHttpRequest in later versions of Internet Explorer
            xmlreq = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e1) {
            // Failed to create required ACtiveXObject
            try {
                // Try version supported by older versions of Internet Explorer
                xmlreq = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e2) {
                // Unable to create an XMLHttpRequest with ActiveX
            }
        }
    }
    return xmlreq;
}
