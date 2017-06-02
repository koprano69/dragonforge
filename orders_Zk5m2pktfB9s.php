<?php session_start();
?>
<html>
<head>
<title>Новые заказы</title>
</head>
<body background="images/fon1.jpg">
<font face="Calibri">
<?php $logins=file('orderslogins_Ey22XLyPNpOZ.txt', FILE_IGNORE_NEW_LINES);
$fullnames=file('ordersfullnames_hqNL5R6LQacg.txt', FILE_IGNORE_NEW_LINES);
$phonenumbers=file('ordersphonenumbers_iTul8RTk0Bbo.txt', FILE_IGNORE_NEW_LINES);
$emails=file('ordersemails_L5UEv1u7tOEN.txt', FILE_IGNORE_NEW_LINES);
$addresses=file('ordersaddresses_hYe6lYfZY0pS.txt', FILE_IGNORE_NEW_LINES);
$dates=file('ordersdates_62zknQuZAvYH.txt', FILE_IGNORE_NEW_LINES);
$items=file('ordersitems_DdbBMtP13EmE.txt', FILE_IGNORE_NEW_LINES);
for ($i=0; $i<count($items); $i++)
{
	echo '
	Логин: ', $logins[$i], '<br>
	Ф.И.О.: ', $fullnames[$i], '<br>
	Тел. номер: ', $phonenumbers[$i], '<br>
	E-mail: ', $emails[$i], '<br>
	Адрес: ', $addresses[$i], '<br>
	Дата заказа: ', $dates[$i], '<br>
	<br>
	Заказ:
	<br>
	<br>
	', $items[$i], '
	<br>
	-------------------------------------------------------------------------------
	<br>
	<br>
	';
}
?>
<form action="cleanorders.php">
<input type="submit" value="Очистить журнал заказов">
</form>
<a href="index.php">На главную</a>
</font>
</body>
</html>