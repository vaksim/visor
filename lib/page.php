<?php


class Page
  {
    function Page()//$PageArray)
    {
      //			$this->head();
      //			$this->body();
    }
    function Head($ProgShortName)
    {
      echo '<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">',"\n";
      echo '<html>',"\n";
      echo '<head>',"\n";
      echo ' <meta',"\n";
      echo '  content="text/html; charset=utf-8"',"\n";
      echo '  http-equiv="content-type">',"\n";
      echo ' <title>'.$ProgShortName.'</title>',"\n";
      echo " <link rel=\"stylesheet\" type=\"text/css\" href=\"main.css\">\n";
      echo '</head>',"\n";
    }

    function Body($Page)
    {
      echo '<body>',"\n";
      $this->PrgHead();
      include "reg.php";
      switch (AuthUser(@$_POST["LoginUserName"],@$_POST["LoginPass"]))
	{
	case 'first';
	//	echo 'First'."\n";
	break;

	case 'error';
	include "auth_error.php";
	break;

	default:
	  echo "Not!!!";
	}
      /*      if (AuthUser(@$_POST["LoginUserName"],@$_POST["LoginPass"]) == 'first')
	{
	  echo 'First'."\n";
	  echo "Ok!!!<br>";
	} else {
	include 'auth_error.php';
      }
      */

      /*      //include ("page/reg.php");
      if ($_SERVER['REQUEST_METHOD'] == 'POST')
	{
	  if ("1") //RegUser())
	    {
	      include ("pages/".$Page.".php");
	    }else
	       {
		 echo "<br>Доступ запрещён.<br>\n";
	       }
	} else {
	$this->AthForm();
      }
      */
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
    function PrgHead()
    {
      echo "<h1>"._PRG_NAME."</h1>\n";
    }
}
?>

