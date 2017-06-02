<?php session_start();
for ($i=0; $i<$_SESSION['cartcounter']; $i++)
{
	$sum=$sum+$_SESSION['price'.$i]*$_SESSION['quantity'.$i];
	file_put_contents('ordersitems_DdbBMtP13EmE.txt', $_SESSION['item'.$i].' ('.$_SESSION['quantity'.$i].') - '.$_SESSION['price'.$i]*$_SESSION['quantity'.$i].'<br>', FILE_APPEND);
}
file_put_contents('ordersitems_DdbBMtP13EmE.txt', ' --- '.$sum.' --- '."\n", FILE_APPEND);
$login=$_SESSION['login'];
$fullname=$_GET['fullname'];
$phonenumber=$_GET['phonenumber'];
$email=$_GET['email'];
$address=$_GET['address'];
$date=$_GET['date'];
date_default_timezone_set('Etc/GMT-6');
$orderingdate=date("d.m.y H:i");
file_put_contents('orderslogins_Ey22XLyPNpOZ.txt', $login."\n", FILE_APPEND);
file_put_contents('ordersfullnames_hqNL5R6LQacg.txt', $fullname."\n", FILE_APPEND);
file_put_contents('ordersphonenumbers_iTul8RTk0Bbo.txt', $phonenumber."\n", FILE_APPEND);
file_put_contents('ordersemails_L5UEv1u7tOEN.txt', $email."\n", FILE_APPEND);
file_put_contents('ordersaddresses_hYe6lYfZY0pS.txt', $address."\n", FILE_APPEND);
file_put_contents('ordersdates_62zknQuZAvYH.txt', $date."\n", FILE_APPEND);
$_SESSION['cartcounter']=0;
echo '<script>location.href="thankyou.php"</script>';
?>