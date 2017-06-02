<?php session_start();
$productnames=file('b_productnames.txt', FILE_IGNORE_NEW_LINES);
$productprices=file('b_productprices.txt', FILE_IGNORE_NEW_LINES);
for ($i=0; $i<count($productnames); $i++)
{
	$bednumber=$_GET['bed'.$i];
	if ($bednumber!='')
	{
		$bednumber=$i;
		break;
	}
}
$_SESSION['item'.$_SESSION['cartcounter']]=$productnames[$bednumber];
$_SESSION['price'.$_SESSION['cartcounter']]=$productprices[$bednumber];
$_SESSION['quantity'.$_SESSION['cartcounter']]=1;
$_SESSION['cartcounter']++;
echo '<script>location.href="', $_SERVER['HTTP_REFERER'], '"</script>';
?>