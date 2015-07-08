<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN""http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<html>
	<head>
		<title>Test</title>
	</head>
	<body>
		<table>
				<form name="form1" method="post" action="textre.php">				
					<tbody>
						<tr>
							<td><input type="text" name="hello"/></td>
						</tr>
						<tr>
							<td>
								<input type="button" name="btnAdd" onclick="return AddConfirm(this.form);" value="Add"/>
								<input type="button" name="btnReset" onclick="javascript:document.form1.reset();return false;" value="Reset"/>
							</td>
						</tr>
					</tbody>
				</form>
			</table>		
	</body>
</html>
