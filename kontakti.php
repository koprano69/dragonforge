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
<title>Dragon Forge- ��������</title>
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
	������������, ', $_SESSION['login'], '.
	</font>
	<form action=exit.php>
	<input type="submit" name="exit" value="�����">
	</form>
	</td>
	<td align="right">
	';
	if (isset($_SESSION['adminmode'])==false)
	{
		echo '
		<font size="2">
		<a href="cart.php">�������: ', $_SESSION['cartcounter'], '</a>
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
<a href="registration.php">�����������</a>
</font>
</td>
<td align="right">
<font size="2">
<a href="cart.php">�������: ', $_SESSION['cartcounter'], '</a>
</font>
</td>
</tr>
<tr>
<td>
<font size="2">
<a href="#auth">����</a>
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
<tr>
<td colspan="3">
����� �����: ������� ��������
<br>
�� ����� �������� ����������  89537660463 https://vk.com/elnadrionsk , dragonforge@mail.ru 
<br>
��� "������� �������", � ������, ������, 5
2007-2017 �.
<br>
<br>
�� ��������� �� ������ :
<br>
<iframe src="https://api-maps.yandex.ru/frame/v1/-/CBQIvPt2OD" width="560" height="400" frameborder="0"></iframe>
</br>
</td>
</tr>
</table>
<table width="1200" align="center" >
<tr>
<td colspan="3">
<font size="2">
<?php if (isset($_SESSION['login'])==false)
{
	echo '
	<a name="auth">����:</a>
	<form method="post" action=login.php>
	���:
	<input type="text" name="login" required>
	������:
	<input type="password" name="password" required>
	<input type="submit" value="�����">
	</form>
	';
}
echo '����� ��������� �����: ', file_get_contents('counter.txt');
?>
</font>
</td>
</tr>
</table>
</font>
</body>
</html>