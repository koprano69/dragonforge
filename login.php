<?php $login=$_POST['login'];
$password=$_POST['password'];
$logins=file('logins_2wpC9Y030j5a.txt', FILE_IGNORE_NEW_LINES);
$passwords=file('passwords_JQehLT737VsW.txt', FILE_IGNORE_NEW_LINES);
for ($i=0; $i<count($logins); $i++)
{
	if ($login==$logins[$i] && $password==$passwords[$i])
	{
		session_start();
		$_SESSION['login']=$login;
		if ($login=='koprano1' && $korpano1=='1')
		{
			$_SESSION['adminmode']='activated';
		}
		echo '<script>location.href="', $_SERVER['HTTP_REFERER'], '"</script>';
		exit;
	}
}
echo '<script>location.href="', $_SERVER['HTTP_REFERER'], '"</script>';
?>