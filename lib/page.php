<?php
class Page
{
    static public $title = '_title';
    static private $_programName = '_programName';
    static private $_authValid = false;
    static public $page = null;
    static public $prevPage = null;
    static public $idPageData = array();


    private function __construct(){}
    private function __clon(){}

    static public function setTitle($title = null)
    {
        if (isset($title)) {
//            self::$_title = SC::show('_PROGRAM_SHORT_NAME') . ' - ' . $title;
            self::$title = SC::show('_PROGRAM_SHORT_NAME') . ' - ' . $title;
        } else {
            self::$_title = SC::show('_PROGRAM_SHORT_NAME');
        }
    }

    static public function showHead($page) {
        if (property_exists($page, 'pageTitle')) {
            self::setTitle($page::$pageTitle);
        } else {
            self::setTitle();
        }
        IncTpl::show('head');
    }

    static public function prep($page)
    {

//Берем данные о странице в базе
        $sql = 'SELECT * FROM pages WHERE pages.name = \'' . $page . '\';';
        DB::setQuery($sql);
        DB::query($sql);
        self::$idPageData = pg_fetch_array(DB::getResult());



        self::showHead($page);
        self::showBodyStart();
//        ProgramTitle::show();
        UserMenu::show(Auth::$valid);
        if (Auth::$valid) {
            Navigation::prep($page);
            Navigation::show($page);
        }
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
    }

    static public function showBodyPage($page = null)
    {
    }

    static public function showBodyFinish()
    {
        self::setPrevPageToSession();
        PageDebug::show();
        echo "\n" . '</body>' . "\n" . '</html>' . "\n";
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
