<?php
class Page
{
    private $_title = '_title';
    private $_programName = '_programName';


    public function __construct() {
        //echo '<hr><hr><hr>';
//        $this->showHead($this->shortProgramName);
        //$this->showBody();
    }

    public function setTitle($title)
    {
        $this->_title = $title;
    }
    
    public function showHead() {
        echo '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">',"\n";
        echo '<html>',"\n";
        echo '<head>',"\n";
        echo ' <meta',"\n";
        echo '  content="text/html; charset=utf-8"',"\n";
        echo '  http-equiv="content-type">',"\n";
        echo ' <title>'.$this->_title.'</title>',"\n";
        echo " <link rel=\"stylesheet\" type=\"text/css\" href=\"main.css\">\n";
        echo '</head>',"\n";
    }

    public function setProgramName($programName)
    {
        $this->_programName = $programName;
    }

    public function showBodyHead()
    {
        echo "<h1>".$this->_programName."</h1>\n";
    }

    
    public function showBody($page)
    {
        echo '<body>',"\n";
//        echo '<br>'.$_SESSION['viewNum'].'<br>';        
        $this->showBodyHead();
        
        

        require_once("auth.php");


        switch (auth(@$_POST["loginUserName"],@$_POST["loginUserPass"]))
            {
            case 'first';
            //	echo 'First'."\n";
            break;

            case 'error';
            require_once("auth_error.php");
            break;

            default:
                echo "Not!!!";
            }

        echo "\n",'</body>',"\n";

    }








    
    function Page1($Page)
    {
        include ("pages/main.php");			
    }
    function Foot()
    {
        echo "<hr>\n";
        echo "<br>Подвал<br>\n";
        echo "<hr>\n";
        echo "<a href=\"http://tmp.chr/visor/tmp\">tmp</a><br>\n";
        echo '</html>',"\n";
    }
    function AthForm11111()
    {
        ///////////////////////////
        echo "<table border=\"1\" align=\"center\">\n";
        echo " <tr>\n";
        echo "   <form method=\"post\"\n";
        echo "   action=\"http://login.rutracker.org/forum/login.php\">\n";
        echo "  <td>Имя:</td>\n";
        echo "  <td>\n";
        echo "   <input type=\"text\" name=\"login_username\" size=\"12\" tabindex=\"1\"\n";
        echo "    accesskey=\"l\">\n";
        echo "  </td>\n";
        echo "  <td>Пароль:</td>\n";
        echo "  <td>\n";
        echo "   <input type=\"password\" name=\"login_password\" size=\"12\" tabindex=\"2\">\n";
        echo "  </td>\n";
        echo "  <td>\n";
        echo "   <input type=\"submit\" name=\"login\" value=\"Вход\" tabindex=\"3\">\n";
        echo "  </td>\n";
        echo "   </form>\n";
        echo "  <td>\n";
        echo "   <a href=\"profile.php?mode=sendpassword\">Забыли пароль?</a>\n";
        echo "  </td>\n";
        echo " </tr>\n";
        echo "</table>\n";
        /////////////////////////////////////////
    }

}
?>

