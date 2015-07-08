<?php
$userID = empty($_COOKIE["aduserID"])?"":$_COOKIE["aduserID"];

if (empty($userID))
{

?>
<!-- 로그인 -->
<div id="loginWrapper">

<div class="loginWrap">
<form method="post" action="adminmember_action.php">
<table width="360">
<tr>
<td style="background-color: silver; padding: 8px; text-align: center; border: 1px solid #999;">LOG IN</td>
</tr>
<tr>
<td style="padding: 25px 15px; border: 1px solid #999;">
<div style="padding-bottom:5px">
<label for="id" style="width: 80px;">ID:</label>
<input type="text" name="id" id="id" size="30" style="height:20px" />
</div>
<div>
<label for="id" style="width: 80px;">Password:</label>
<input type="password" name="pwd" id="pwd" size="30" style="height:20px" />
</div>
<div style="margin-top: 10px">
<label style="width: 80px;">&nbsp;</label>
<input type="submit" class="btn_largo" value="Log in" />
</div>
</td>
</tr>
</table>
</form>
</div>

</div>
<!-- End 로그인 -->
<?php 
} 
?>