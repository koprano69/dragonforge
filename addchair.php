<?php $productname=$_POST['productname'];
$productdesc=$_POST['productdesc'];
$productdesc = str_replace("\n", '<br>', $productdesc);
$productprice=(float)$_POST['productprice'];
$productimg=$_FILES['productimg']['name'];
copy($_FILES['productimg']['tmp_name'], 'images/'.$_FILES['productimg']['name']);
file_put_contents('c_productnames.txt', $productname."\n", FILE_APPEND);
file_put_contents('c_productdescs.txt', $productdesc."\n", FILE_APPEND);
file_put_contents('c_productprices.txt', $productprice."\n", FILE_APPEND);
file_put_contents('c_productimgs.txt', $productimg."\n", FILE_APPEND);
echo '<script>location.href="zagotobki.php"</script>';
?>