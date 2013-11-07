<?php

include("cfg/connect.php");

function login($user, $pass){
	$pass = md5($pass);
	
	$stsql="SELECT * FROM user_list WHERE usuario = '". $user ."' AND pass = '". $pass ."';";
	$stquery=mysql_query($stsql);
	
	if(mysql_num_rows($stquery) >= 1){
		$_SESSION['bs_user'] = $user;
		$_SESSION['bs_pass'] = $pass;
		
		echo "<script language='javascript'> location.href = './'; </script>";
		
		return 1;
	}
	else
		return 2;
}

?>