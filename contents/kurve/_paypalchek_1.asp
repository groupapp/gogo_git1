<%@LANGUAGE="VBScript"%>
<%

Dim authToken, txToken
Dim query
Dim objHttp
Dim sQuerystring
Dim sParts, iParts, aParts
Dim sResults, sKey, sValue
Dim i, result
Dim firstName, lastName, itemName, mcGross, mcCurrency

authToken ="ZN6_QvjtRh06n9T-Lrrffm39wLeqArG-bp3D0lYlDt9ece6XQq0PKa10WHu"
txToken = Request.Querystring("tx")

query = "cmd=_notify-synch&tx=" & txToken & "&at=" & authToken


'DEPENDING ON YOUR SERVER, YOU MAY OR MAY NOT HAVE ONE OR BOTH OF THESE VERSIONS OF MSXML COMPONENT
'OUTDATED VERSION IS COMMENTED BELOW
'set objHttp = Server.CreateObject("Microsoft.XMLHTTP")
 set objHttp = Server.CreateObject("Msxml2.ServerXMLHTTP")


objHttp.open "POST", "https://www.paypal.com/cgi-bin/webscr", false
objHttp.setRequestHeader "Content-type", "application/x-www-form-urlencoded"
objHttp.Send query

sQuerystring = objHttp.responseText

'DEBUG
'Response.Write sQuerystring

If Mid(sQuerystring,1,7) = "SUCCESS" Then

	sQuerystring = Mid(sQuerystring,9)
	sParts = Split(sQuerystring, vbLf)
	iParts = UBound(sParts) - 1
	ReDim sResults(iParts, 1)

	For i = 0 To iParts
		aParts = Split(sParts(i), "=")
		sKey = aParts(0)
		sValue = aParts(1)
		sResults(i, 0) = sKey
		sResults(i, 1) = sValue

		Select Case sKey
			Case "first_name"
				firstName = sValue
			Case "last_name"
				lastName = sValue
			Case "item_name"
				itemName = sValue
			Case "mc_gross"
				mcGross = sValue
			Case "mc_currency"
				mcCurrency = sValue
			Case "txn_id"
				txn_id = sValue
		End Select
	Next

	'Response.Write("<p><h3>Your order has been received.</h3></p>")
	'Response.Write("<b>Details</b><br>")
	'Response.Write("<li>Txn No.: " & txn_id & "</li>")
	'Response.Write("<li>Name: " & firstName & " " & lastName & "</li>")
	'Response.Write("<li>Description: " & itemName & "</li>")
	'Response.Write("<li>Amount: " & mcCurrency & " " & mcGross & "</li>")
	'Response.Write("<hr>")
	Response.write "<script type=""text/javascript"">window.opener.review_save('SU','"&txn_id&"');window.close();</script>"

Else

	'log for manual investigation
	Response.write "<script type=""text/javascript"">window.opener.review_save(""CA"","""");window.close();</script>"

End If

%>			
<script type="text/javascript">
	window.onbeforeunload = function () {
		if ((window.event.clientX < 0) || (window.event.clientY < 0)) {
			onBeforeUnloadAction();
		}
	}
	function onBeforeUnloadAction() {
		var flag = window.confirm("You are closing the window. Proceed?");
		if (flag) {
			return true;
		} else {
			return false;
		}
	}
</script>