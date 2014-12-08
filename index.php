<?php

include ("lang/ru.php");
include ("lib/var.php");
//include ("lib/page.php");
//include ("pages/main.php");
//ffff

function __autoload($ClassName) {
    include('./lib/'.xf$ClassName.'.php');
}

$Page = new Page();
$Page->head(_PRG_SHORT_NAME);
$Page->Body("main");
//$Page->foot();

?>
