<?php

function unlogin(){
    session_start();
	session_destroy();
}

$fnc = '';
if(isset($_GET['fnc']))
    $fnc = $_GET['fnc'];

switch($fnc){
    case 'unlogin': unlogin(); break;
}

?>