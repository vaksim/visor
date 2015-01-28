<?php

session_start();

$authValid = false;
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
        $page = 'PageRepairs';
    }
} elseif (isset($_POST['login_user_name'])) {
    $page = 'PageError';
} else {
    $page = 'PageBegin';
}


Page::prep($page);

echo '<div class="Page">' . "\n";

Page::show($page);

echo '</div>' . "\n";

Page::showBodyFinish();

?>
