<?php print_r($_SERVER);

$act = $_SERVER['REQUEST_URI'];
$var=explode("/",$act);
  echo $var[2];
?>