<?php $productnames=file('b_productnames.txt', FILE_IGNORE_NEW_LINES);
$productdescs=file('b_productdescs.txt', FILE_IGNORE_NEW_LINES);
$productprices=file('b_productprices.txt', FILE_IGNORE_NEW_LINES);
$productimgs=file('b_productimgs.txt', FILE_IGNORE_NEW_LINES);
for ($i=0; $i<count($productnames); $i++)
{
	$bednumber=$_GET['bed'.$i];
	if ($bednumber!='')
	{
		$bednumber=$i;
		break;
	}
}
file_put_contents('b_productnames.txt', '');
file_put_contents('b_productdescs.txt', '');
file_put_contents('b_productprices.txt', '');
file_put_contents('b_productimgs.txt', '');
for ($i=$bednumber; $i<count($productnames); $i++)
{
	$productnames[$i]=$productnames[$i+1];
	$productdescs[$i]=$productdescs[$i+1];
	$productprices[$i]=$productprices[$i+1];
	$productimgs[$i]=$productimgs[$i+1];
}
for ($i=0; $i<count($productnames)-1; $i++)
{
	file_put_contents('b_productnames.txt', $productnames[$i]."\n", FILE_APPEND);
	file_put_contents('b_productdescs.txt', $productdescs[$i]."\n", FILE_APPEND);
	file_put_contents('b_productprices.txt', $productprices[$i]."\n", FILE_APPEND);
	file_put_contents('b_productimgs.txt', $productimgs[$i]."\n", FILE_APPEND);
}
echo '<script>location.href="index.php"</script>';
?>