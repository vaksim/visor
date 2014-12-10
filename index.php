<?php

session_start();

if (isset($_SESSION['viewNum'])) {
    $_SESSION['viewNum']++;
} else {
    $_SESSION['viewNum'] = 1;
}
//echo '<br>'.$_SESSION['viewNum'].'<br>';
require_once("lang/ru.php");
require_once("lib/var.php");
//require_once("lib/auth.php");
//include ("lib/page.php");
//include ("pages/main.php");
//ffff

function __autoload($ClassName) {
    require_once('./lib/'.$ClassName.'.php');
}


$page = new Page();
$page->setTitle(_PROGRAM_SHORT_NAME);
$page->setProgramName(_PROGRAM_NAME);
$page->showHead();
$page->ShowBody("main");
//$Page->foot();

?>
