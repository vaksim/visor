<?php

//init_set('session.use_cookies', 1);
//init_set('session.use_only_cooke',1);
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
$pagePref = 'Html';
$page = 'Clear';

function __autoload($className)
{
    if (file_exists('./lib/'.$className.'.php')) {
        require_once('./lib/'.$className.'.php');
        return 0;
    }
    if (file_exists('./pages/'.$className.'.php')) {
        require_once('./pages/'.$className.'.php');
        return 0;
    }
    return 1;
}

//self::showMenu();
$authValid = Auth::authValid();
//UserMenu::showMenu($authValid);
/*
if (isset($_POST['loginUserName'])) {
    if ($authValid) {
        $page = 'Begin';
    } else {
        $page = 'Error';
    }
}
*/

if ($authValid) {
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 'Main';
    }
} elseif (isset($_POST['loginUserName'])) {
    $page = 'Error';
} else {
    $page = 'Begin';
}



$page = $pagePref.$page;
//echo '1111111111111';
//Page::setTitle(_PROGRAM_SHORT_NAME);
//Page::setProgramName(_PROGRAM_NAME);
Page::showHead();
Page::showBodyStart();
ProgramTitle::show();
UserMenu::showMenu($authValid);
//Page::showBodyPage($page);
//$bodyPage =  new $page;
$page::show();
HtmlDebug::show();
Page::showBodyFinish();
//$page = new Page();
//$page->setTitle(_PROGRAM_SHORT_NAME);
//$page->setProgramName(_PROGRAM_NAME);
//$page->showHead();
//$page->ShowBody("main");
//$Page->foot();

?>
