<?php session_start();
?>
<html>
<head>

<title>Dragon Forge - Регистрация</title>
<link rel="icon" type="image/jpg" href="./images/lable.jpg">
</head>
<body background="images/fon.jpg">
<font face="Calibri">
<table height="100%" align="center">
<tr>
<td>
<p id = "reg1" align="center">
<font size="5">
<b>Регистрация </b>
</font>
</p>
<form method="post" action="register.php">
<p>Логин<br>(не менее 6 символов):</p>
<input type="text" name="login" required>
<p>E-mail:</p> 
<input type="text" name="email" required>
<p>Пароль<br>(не менее 8 символов):</p>
<input type="password" name="password1" required>
<p>Повторите пароль:</p>
<input type="password" name="password2" required>
<br>
<br>
<p align="center"><input type="submit" value="Зарегистрироваться"></p>
</form>
<?php
if ($_SESSION['login_too_short']==true)
{
	echo '<p align="center">Логин слишком<br>короткий.</p>';
	$_SESSION['login_too_short']=false;
}
if ($_SESSION['login_already_exist']==true)
{
	echo '<p align="center">Этот логин занят.</p>';
	$_SESSION['login_already_exist']=false;
}
if ($_SESSION['passwords_not_the_same']==true)
{
	echo '<p align="center">Пароли не совпадают.</p>';
	$_SESSION['passwords_not_the_same']=false;
}
if ($_SESSION['password_too_short']==true)
{
	echo '<p align="center">Пароль слишком<br>короткий.</p>';
	$_SESSION['password_too_short']=false;
}
?>
<br>
<br>
<br>
<br>
</td>
</tr>
</table>
</font>
</body>
</html>