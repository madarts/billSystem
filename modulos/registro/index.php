<?php

include("fnc/fnc_login.php");

if(isset($_GET['login']))
	if($_GET['login'] == 'ok')
		login($_POST['txtUser'], $_POST['txtPass']);
?>

<img src="img/logo.png" />

<center>
    <div id="login" align="left">
        <div class="log_contenido">
            <form name="frmLogin" method="POST" action="?login=ok">
                <input type="text" name="txtUser" id="txtUser" />Usuario 
                <br />
                <input type="password" name="txtPass" id="txtPass" />Password 
                
                <center><input type="image" src="img/btnEntrar.png" class="btnLogin" /></center>
            </form>
        </div>
    </div>
</center>