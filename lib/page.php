<?php
class Page
{
    static private $_title = '_title';
    static private $_programName = '_programName';
    static private $_authValid = false;


    private function __construct(){}
    private function __clon(){}

    static public function setTitle($title)
    {
        self::$_title = $title;
    }
    
    static public function showHead() {
        IncTpl::show('head');
//        SC::show('_SSSS');
/*
        echo '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">',"\n";
        echo '<html>',"\n";
        echo '<head>',"\n";
        echo ' <meta',"\n";
        echo '  content="text/html; charset=utf-8"',"\n";
        echo '  http-equiv="content-type">',"\n";
        echo ' <title>'.self::$_title.'</title>',"\n";
        echo " <link rel=\"stylesheet\" type=\"text/css\" href=\"main.css\">\n";
        echo '</head>',"\n";
*/

    }

    static public function setProgramName($programName)
    {
        self::$_programName = $programName;
    }

    static public function showBodyHead()
    {
        echo "<h1>".self::$_programName."</h1>\n";
    }

    static public function showBodyStart()
    {
        echo '<body>',"\n";
//        echo session_id();
//        echo '<br>'.$_SESSION['viewNum'].'<br>';        
//        self::showBodyHead();
    }

    static public function showBodyPage($page = null)
    {
        echo $page."<br>\n";
        //self::showMenu();
/*        self::$_authValid = Auth::authValid();
        UserMenu::showMenu(self::$_authValid);
        if (self::$_authValid) {
            require_once('pages/'.$page.'.php');
        } elseif (isset($_POST['loginUserName'])) {
            self::_authError();
*/
        
        
        //  echo '[ <a href="'.'index.php'.'">'.'Главная страница'.'</a> ]<br>'."\n";
        
        //  if (self::$_authValid) {echo 'eeeeeeeeeeeeeeee';}
    }

    static public function showBodyFinish()
    {
        echo "\n" . '</body>' . "\n" . '</html>' . "\n";
    }

    static private function _getFirstView()
    {
        //return $this->$_firstView;
    }
   
    static private function _authError()
    {
        echo '<h2 align="center">'._AUTH_ERROR_TEXT.'</h2>';
    }

    static private function authValid()
    {
        self::userMenu();        
        echo 'Вы вошли как: '.$_SESSION['loginUserName'].'<br>';
    }
}
?>
