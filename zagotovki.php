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
<title>Dragon Forge - Работы </title>
<link rel="stylesheet" href="style.css" type="text/css">
<link rel="icon" type="image/jpg" href="./images/lable.jpg">
</head>
<body background="white">
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
<td><a href="zagotovki.php"><img src="images/2button.jpg"></a></td>
<td><a href="kontakti.php"><img src="images/3button.jpg" ></a></td>
</tr>
<?php $productnames=file('c_productnames.txt', FILE_IGNORE_NEW_LINES);
$productdescs=file('c_productdescs.txt', FILE_IGNORE_NEW_LINES);
$productimgs=file('c_productimgs.txt', FILE_IGNORE_NEW_LINES);
$productprices=file('c_productprices.txt', FILE_IGNORE_NEW_LINES);
for ($i=0; $i<count($productnames); $i++)
{
	echo '
	<tr>
	<td colspan="3">
	<img src="images/', $productimgs[$i], '" align="left">
	<b>', $productnames[$i], '</b>
	<br>
	<br>
	', $productdescs[$i], '
	<br>
	<br>
	Цена: ', $productprices[$i], ' р.
	</td>
	</tr>
	';
	if (isset($_SESSION['login']) && isset($_SESSION['adminmode']))
	{
		echo '
		<tr>
		<td align="right" colspan="3">
		<br>
		<form action="delchair.php">
		<input type="submit" value="Удалить этот товар" name="chair', $i, '">
		</form>
		</td>
		</tr>
		';
	}
	else
	{
		echo '
		<tr>
		<td align="right" colspan="3">
		<br>
		<form action="addchairtocart.php">
		';
		for ($j=0; $j<$_SESSION['cartcounter']; $j++)
		{
			if ($_SESSION['item'.$j]==$productnames[$i])
			{
				echo '
				<input type="submit" value="Добавлено в корзину" name="chair', $i, '" disabled>
				';
				$is_item_added[$i]=1;
			}
		}
		if ($is_item_added[$i]!=1)
		{
			echo '
			<input type="submit" value="Добавить в корзину" name="chair', $i, '">
			';
		}
		echo '
		</form>
		</td>
		</tr>
		';
	}
} 
if (isset($_SESSION['login']) && isset($_SESSION['adminmode']))
{
	echo '
	<tr>
	<td colspan="3">
	<form method="post" enctype="multipart/form-data" action=addchair.php>
	<p>Добавить товар:</p>
	<p>Название:<br>
	<input type="text" size="40" name="productname" required></p>
	<p>Описание:<br>
	<textarea rows="15" cols="110" name="productdesc" required></textarea></p>
	<p>Цена:<br>
	<input type="text" name="productprice" required></p>
	<p>Картинка (рекоменд. ширина - 380 пикс.):<br>
	<input type="file" name="productimgs" required></p>
	<input type="submit">
	</form>
	';
}
?>
</table>
<table width="1700" align="center" >
<tr>
<td colspan="3">
<font size="2">
Автор сайта: Радченко Евгений
<br>
По любым вопросам обращаться  89537660463 https://vk.com/elnadrionsk , dragonforge@mail.ru 
<br>
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