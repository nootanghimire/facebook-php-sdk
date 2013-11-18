<?php
if(!isset($_SESSION)){
  session_start();
}
$p_t = $_SESSION['current'];
$t = $_GET['t'];
$u = $_GET['u'];
$n1 = $_GET['n1'];
$n2 = $_GET['n2'];

if($p_t != $t){
die('Oops! Bad happened');
}

$fh = fopen('votes', 'a');
fwrite($fh, $n1+","+$n2+","+$u);
fclose($fh);
die('Thanks for your Vote!');
