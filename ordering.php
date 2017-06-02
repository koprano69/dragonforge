<?php session_start();
if (isset($_SESSION['cartcounter'])==false)
{
	$_SESSION['cartcounter']=0;
}
if (isset($_COOKIE['visit'])==false)
{
	$a=file_get_contents('counter.txt');
	$a++;
	file_put_contents('counter.txt', $a);
	setcookie('visit');
}
?>
<html>
<head>
<title>Dragon Forge - Оформление заказа</title>
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body background="images/fon1.jpg">
<font face="Calibri">
<?php if (isset($_SESSION['login']))
{
	echo '
	<table width="100%">
	<tr valign="top">
	<td>
	<font size="2">
	Здравствуйте, ', $_SESSION['login'], '.
	</font>
	<form action=exit.php>
	<input type="submit" name="exit" value="Выйти">
	</form>
	</td>
	<td align="right">
	';
	if (isset($_SESSION['adminmode'])==false)
	{
		echo '
		<font size="2">
		<a href="cart.php">Корзина: ', $_SESSION['cartcounter'], '</a>
		</font>
		';
	}
	echo '
	</td>
	</tr>
	</table>
	';
}
else echo '
<table width="100%">
<tr>
<td>
<font size="2">
<a href="registration.php">Регистрация</a>
</font>
</td>
<td align="right">
<font size="2">
<a href="cart.php">Корзина: ', $_SESSION['cartcounter'], '</a>
</font>
</td>
</tr>
<tr>
<td>
<font size="2">
<a href="#auth">Вход</a>
</font>
</td>
</tr>
</table>
';
?>
<table width="1207" align="center" >
<tr>
<td colspan="3"><a href="index.php"><img src="images/menu.jpg" ></a></td>
</tr>
<tr height="50">
<td><a href="index.php"><img src="images/1button.jpg" ></a></td>
<td><a href="zagotovki.php"><img src="images/2button.jpg" ></a></td>
<td><a href="kontakti.php"><img src="images/3button.jpg" ></a></td>
</tr>
<?php echo '
<tr>
<td colspan="3">
<p><b>Оформление заказа:</b></p>
';
for ($i=0; $i<$_SESSION['cartcounter']; $i++)
{
	$sum=$sum+$_SESSION['price'.$i]*$_SESSION['quantity'.$i];
	echo '
	<b>', $_SESSION['item'.$i], ' - ', $_SESSION['quantity'.$i], ' шт. - ', $_SESSION['price'.$i]*$_SESSION['quantity'.$i], ' р.</b>
	<br>
	';
}
echo '
<br>
<b>Итого к оплате: ', $sum, ' р.</b>
<form action="confirmordering.php">
<p>Ф.И.О.:</p>
<input type="text" size="30" name="fullname" required>
<p>Тел. номер:</p>
<input type="text" size="30" name="phonenumber" required>
<p>E-mail:</p>
<input type="text" size="30" name="email" required>
<p>Адрес доставки (оставьте поле пустым, если желаете забрать товар самостоятельно):</p>
<input type="text" size="70" name="address">
<p>Желаемая дата доставки (самовывоза) товара:</p>
<input type="text" size="20" name="date" required>
</td>
</tr>
<tr>
<td align="right" colspan="3">
<br>
<input type="submit" value="Подтвердить заказ">
<br>
<br>
</form>
</td>
</tr>
';
?>
<table width="1207" align="center">
<tr>
<td colspan="3">
<font size="2">
Автор сайта: Радченко Евгений
<br>
По любым вопросам обращаться  89537660463 https://vk.com/elnadrionsk , dragonforge@mail.ru 
<br>
<?php if (isset($_SESSION['login'])==false)
{
	echo '
	<a name="auth">Вход:</a>
	<form method="post" action=login.php>
	Логин:
	<input type="text" name="login" required>
	Пароль:
	<input type="password" name="password" required>
	<input type="submit" value="Войти">
	</form>
	';
}
echo 'Число посещений сайта: ', file_get_contents('counter.txt');
?>
</font>
</td>
</tr>
</table>
</font>
</body>
</html>