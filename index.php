<?php

session_start();

//if (isset($_SESSION['viewNum'])) {
//    $_SESSION['viewNum']++;
//} else {
//    $_SESSION['viewNum'] = 1;
// }
//echo '<br>'.$_SESSION['viewNum'].'<br>';


function userExit() // Если $_GET['exit'] = true то уничтожить сессию и перечитать скрипт
{
    if ((isset($_GET['exit'])) && ($_GET['exit']=='true')) {
        session_destroy();
        //       session_start();
        header("Location: " . $_SERVER['PHP_SELF']);
    }
}

userExit();

require_once("lang/ru.php");
require_once("lib/var.php");
//require_once("lib/auth.php");
//include ("lib/page.php");
//include ("pages/main.php");
//ffff
$authValid = false;
$pagePref = 'BodyPage';
$page = 'Clear';

function __autoload($className) {
    if (file_exists('./lib/'.$className.'.php')) {
        require_once('./lib/'.$className.'.php');
        return 0;
    }
    if (file_exists('./pages/'.$className.'.php')) {
        require_once('./pages/'.$className.'.php');
        return 0;
    }    
}

//self::showMenu();
$authValid = Auth::authValid();
//UserMenu::showMenu($authValid);
if ($authValid) {
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 'Main';
    }
} elseif (isset($_POST['loginUserName'])) {
    $page = 'errorValid';
} else {
    $page = 'Clear';
}
$page = $pagePref.$page;

Page::setTitle(_PROGRAM_SHORT_NAME);
Page::setProgramName(_PROGRAM_NAME);
Page::showHead();
Page::showBodyStart();
UserMenu::showMenu($authValid);
//Page::showBodyPage($page);
$bodyPage =  new $page;
Page::showBodyFinish();
//$page = new Page();
//$page->setTitle(_PROGRAM_SHORT_NAME);
//$page->setProgramName(_PROGRAM_NAME);
//$page->showHead();
//$page->ShowBody("main");
//$Page->foot();

?>
