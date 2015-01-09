<?php
class Page
{
    static private $_title = '_title';
    static private $_programName = '_programName';
    static private $_authValid = false;
    static public $pagePref = 'Page';
    static public $page = null;
    static public $prevPage = null;


    private function __construct(){}
    private function __clon(){}

    static public function setTitle($title = null)
    {
        if (isset($title)) {
            self::$_title = SC::show('_PROGRAM_SHORT_NAME') . ' - ' . $title;
        } else {
            self::$_title = SC::show('_PROGRAM_SHORT_NAME');
        }
    }

    static public function getTitle()
    {
        return self::$_title;
    }
//    static public function setT
    
    static public function showHead($page) {
        if (property_exists($page, 'pageTitle')) {
            self::setTitle($page::$pageTitle);
        } else {
            self::setTitle();
        }
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

    static public function show($page = null)
    {
        if (!$page) {
            echo 'Page is not set...';
            return 0;
        } else {
            self::$page = $page;
        }
        if (method_exists($page, 'prep')) {
//            echo self::$page;
            $page::prep();
        } else {
//            echo 'prep() in ' . $page . ' is not set...<br>';
        }
        if (method_exists($page, 'show')) {
            $page::show();
        } else {
//            echo 'show() in ' . $page . 'is not set...<br>';
        }
//        echo self::$page;


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
        self::setPrevPageFromSession();
        echo '<body bgcolor="#EDDE7D">',"\n";
//        echo self::$prevPage;
//        echo '<br>'.$_SESSION['viewNum'].'<br>';        
//        self::showBodyHead();
        echo '--------------' . self::$prevPage;
    }

    static public function showBodyPage($page = null)
    {
    }

    static public function showBodyFinish()
    {
        self::setPrevPageToSession();
//        PageDebug::show();
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


    static public function setPrevPageToSession()
    {
        $_SESSION['prev_name'] = self::$page;
    }
    static public function setPrevPageFromSession()
    {
        if (isset($_SESSION['prev_name'])) {
            self::$prevPage = $_SESSION['prev_name'];
        }
    }
}
?>
