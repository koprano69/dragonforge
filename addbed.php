<?php $productname=$_POST['productname'];
$productdesc=$_POST['productdesc'];
$productdesc = str_replace("\n", '<br>', $productdesc);
$productprice=(float)$_POST['productprice'];
$productimg=$_FILES['productimg']['name'];
copy($_FILES['productimg']['tmp_name'], 'images/'.$_FILES['productimg']['name']);
file_put_contents('b_productnames.txt', $productname."\n", FILE_APPEND);
file_put_contents('b_productdescs.txt', $productdesc."\n", FILE_APPEND);
file_put_contents('b_productprices.txt', $productprice."\n", FILE_APPEND);
file_put_contents('b_productimgs.txt', $productimg."\n", FILE_APPEND);
echo '<script>location.href="index.php"</script>';
?>