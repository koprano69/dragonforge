<?php session_start();
$productnames=file('c_productnames.txt', FILE_IGNORE_NEW_LINES);
$productprices=file('c_productprices.txt', FILE_IGNORE_NEW_LINES);
for ($i=0; $i<count($productnames); $i++)
{
	$chairnumber=$_GET['chair'.$i];
	if ($chairnumber!='')
	{
		$chairnumber=$i;
		break;
	}
}
$_SESSION['item'.$_SESSION['cartcounter']]=$productnames[$chairnumber];
$_SESSION['price'.$_SESSION['cartcounter']]=$productprices[$chairnumber];
$_SESSION['quantity'.$_SESSION['cartcounter']]=1;
$_SESSION['cartcounter']++;
echo '<script>location.href="', $_SERVER['HTTP_REFERER'], '"</script>';
?>