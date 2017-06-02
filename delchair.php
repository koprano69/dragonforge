<?php $productnames=file('c_productnames.txt', FILE_IGNORE_NEW_LINES);
$productdescs=file('c_productdescs.txt', FILE_IGNORE_NEW_LINES);
$productprices=file('c_productprices.txt', FILE_IGNORE_NEW_LINES);
$productimgs=file('c_productimge.txt', FILE_IGNORE_NEW_LINES);
for ($i=0; $i<count($productnames); $i++)
{
	$chairnumber=$_GET['chair'.$i];
	if ($chairnumber!='')
	{
		$chairnumber=$i;
		break;
	}
}
file_put_contents('c_productnames.txt', '');
file_put_contents('c_productdescs.txt', '');
file_put_contents('c_productprices.txt', '');
file_put_contents('c_productimge.txt', '');
for ($i=$chairnumber; $i<count($productnames); $i++)
{
	$productnames[$i]=$productnames[$i+1];
	$productdescs[$i]=$productdescs[$i+1];
	$productprices[$i]=$productprices[$i+1];
	$productimgs[$i]=$productimge[$i+1];
}
for ($i=0; $i<count($productnames)-1; $i++)
{
	file_put_contents('c_productnames.txt', $productnames[$i]."\n", FILE_APPEND);
	file_put_contents('c_productdescs.txt', $productdescs[$i]."\n", FILE_APPEND);
	file_put_contents('c_productprices.txt', $productprices[$i]."\n", FILE_APPEND);
	file_put_contents('c_productimge.txt', $productimge[$i]."\n", FILE_APPEND);
}
echo '<script>location.href="zagotovki.php"</script>';
?>