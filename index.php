<?php

//init_set('session.use_cookies', 1);
//init_set('session.use_only_cooke',1);
session_start();

$authValid = false;
$pagePref = 'Page';
$page = 'Clear';

function userExit() // Если $_GET['exit'] = true то уничтожить сессию и перечитать скрипт
{
    if ((isset($_GET['exit'])) && ($_GET['exit']=='true')) {
        session_destroy();
        header("Location: " . $_SERVER['PHP_SELF']);
    }
}

userExit();

require_once("lang/ru.php");
require_once("lib/var.php");

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
DB::connect( "localhost", "visor", "visor", "123");
Auth::authValid();

if (Auth::$valid) {
    User::prep($_SESSION['login_user_name']);
    if (isset($_POST['page'])) {
        $page = $_POST['page'];
    } else {
        $page = 'Repairs';
    }
} elseif (isset($_POST['login_user_name'])) {
    $page = 'Error';
} else {
    $page = 'Begin';
}
/*
if (isset($_POST['page'])) {
    $page = $_POST['page'];
}
*/

$page = Page::$pagePref.$page;



//$page = $pagePref.$page;
//echo '1111111111111';
//Page::setTitle(_PROGRAM_SHORT_NAME);
//Page::setProgramName(_PROGRAM_NAME);
Page::showHead($page);
Page::showBodyStart();
ProgramTitle::show();
UserMenu::show(Auth::$valid);
if (Auth::$valid) {
    Navigation::show();
}
//Page::showBodyPage($page);
//$bodyPage =  new $page;
echo '<div class="Page">' . "\n";
//echo $page;
Page::show($page);
//$page::show();
echo '</div>' . "\n";
//PageDebug::prep('page', $page);
//PageDebug::prep('page1111', $page);
//PageDebug::show();

Page::showBodyFinish();
//$page = new Page();
//$page->setTitle(_PROGRAM_SHORT_NAME);
//$page->setProgramName(_PROGRAM_NAME);
//$page->showHead();
//$page->ShowBody("main");
//$Page->foot();

//echo '</html>' . "\n";
?>
