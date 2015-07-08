



<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0, user-scalable=no, target-densitydpi=medium-dpi" />
<meta name="robots" content="noindex.nofollow">
<title>bigtms.com</title>

<link rel="stylesheet" type="text/css" href="_css_en.css" />
<script type='text/javascript' src='https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js'></script>

<link href="http://fonts.googleapis.com/css?family=Arizonia" rel=stylesheet type=text/css>


</head>
<body>





<script language=JavaScript src='/LiveEditor/scripts/innovaeditor.js'></script>






<form name="loginNew" action="acc_SendMailSql.asp" method="post">
<input type="hidden" name="tnUser_Num" value="0">
<input type="hidden" name="tnSelfNumb" value="0">
<input type="hidden" name="tnDownNumb" value="1">

<div align="center">
<table border="0" cellspacing="0" cellpadding="0" >
<tr><td align=center height=10></td></tr>
<tr><td align=center><div class="pop_title">Email</div></td></tr>
<tr><td align=center height=5></td></tr>




<tr> 
  <td align="left">From: &nbsp;(Tim&nbsp;Sheen)&nbsp;timsheen3@gmail.com</td>
</tr>
<tr> 
  <td align="left">To: &nbsp;(Michelle&nbsp;Choe)&nbsp;shasta1364@gmail.com</td>
</tr>

<tr><td align=center height=10></td></tr>
<tr> 
  <td align="left">Subject: &nbsp;<input type="text" name="tcSubjectX" size="60" maxlength="100" value=""  class="inputorder"></td>
</tr>
<tr>
  <td align="left">
   <textarea id="txtContent" name="txtContent" rows=4 cols=40></textarea>

    <script type="text/javascript" language="javascript">
    var oEdit3 = new InnovaEditor("oEdit3");

    oEdit3.width = 600;
    oEdit3.height = 350;

	oEdit3.toolbarMode = 1; //activate tab toolbar

    /*Add Custom Buttons */
    oEdit3.arrCustomButtons.push(["MyCustomButton", "alert('Custom Command here..')", "Caption..", "btnCustom1.gif"]);

    /*Toolbar Buttons Configuration*/
    oEdit3.groups = [
        ["group1", "", ["FontName", "FontSize", "Superscript", "ForeColor", "BackColor", "FontDialog", "BRK", "Bold", "Italic", "Underline", "Strikethrough", "TextDialog", "Styles", "RemoveFormat"]],
        ["group2", "", ["JustifyLeft", "JustifyCenter", "JustifyRight", "Paragraph", "BRK", "Bullets", "Numbering", "Indent", "Outdent"]],
        ["group3", "", ["Table" ,"TableDialog", "Emoticons", "FlashDialog", "BRK", "LinkDialog", "ImageDialog", "YoutubeDialog"]],
        ["group4", "", ["InternalLink", "CharsDialog", "Line", "BRK", "CustomObject", "CustomTag", "MyCustomButton"]],
        ["group5", "", ["SearchDialog", "SourceDialog", "BRK", "Undo", "Redo", "FullScreen"]]
        ];

	oEdit3.tabs = [
		["tabCommon", "Common", ["group1","group2","group3", "group5"]],
		["tabAdvanced", "Advanced", ["group4"]]
	];

    /*Define "InternalLink" & "CustomObject" buttons */
    oEdit3.cmdInternalLink = "modalDialog('my_custom_dialog.htm',650,350)"; //Command to open your custom link browser.
    oEdit3.cmdCustomObject = "modalDialog('my_custom_dialog.htm',650,350)"; //Command to open your custom file browser.

    /*Enable Custom File Browser */
   // oEdit3.fileBrowser = "/LiveEditor/assetmanager/asset.asp";

    /*Define "CustomTag" dropdown */
    oEdit3.arrCustomTag = [["First Name", "{%first_name%}"],
        ["Last Name", "{%last_name%}"],
        ["Email", "{%email%}"]]; //Define custom tag selection

    /*Apply stylesheet for the editing content*/
    oEdit3.css = "styles/default.css";

    /*Render the editor*/
    oEdit3.REPLACE("txtContent");
    </script>


</td>
</tr>
<tr>
  <td><input type=radio name=tcApply_OX checked value="only">shasta1364@gmail.com&nbsp; only &nbsp;&nbsp;
      <input type=radio name=tcApply_OX         value="all">All Members   
   </td>
</tr>
<tr> 
  <td align="left"><input  type="submit"   value="SEND"  id="btnSubmit"  class="btn_medium" ></td>
</tr>

</table>
</div>
</form>  






