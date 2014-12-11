</html><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<<<<<<< HEAD
  <head>
    <meta
       content="text/html; charset=utf-8"
       http-equiv="content-type">
    <title></title>
  </head>
  <body>

<?php

      session_start();
echo md5('123').'<br>';
echo md5('1234');
        
        switch (AuthUser(@$_POST["LoginUserName"],@$_POST["LoginPass"]))
            {
            case 'first';
            //	echo 'First'."\n";
            break;

            case 'error';
            include "auth_error.php";
            break;

            default:
                echo "Not!!!<br>";
            echo '<a href="'.$_SERVER['PHP_SELF'].'">текст ссылки</a>';
            }

        echo "\n",'</body>',"\n";

    
      function AuthUser($LoginUserName, $LoginPass)
      //Регистрация пользователя
{
//    AuthValidArray();
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            //Проверяем пользователя по базе
	
            if (CheckBaseUser($LoginUserName, $LoginPass))
                {
                    AuthMenuValid(@$LoggedAs,@$LoginUserName);  //$_POST["UserName"]);
                    $AuthStatus = 'valid';
                }else{
                AuthMenu($_SERVER['PHP_SELF'],_AUTH_BUT_VALUE);
                //echo "<br>User ".$LoginUserName." not valid.<br>\n";
                //	  echo 'Not first'."\n";
                $AuthStatus = 'error';
            }
        }
    else
        {
            AuthMenu($_SERVER['PHP_SELF'],_AUTH_BUT_VALUE);
	
            $AuthStatus = 'first';
        }
    return $AuthStatus;
}

function PhitRegValid($RegValidValue,$UserName)
{
    echo $RegValid.$UserName;
}

function CheckBaseUser($LoginUserName, $LoginPass)
{
    $Valid = true;
    return $Valid;
}

function AuthMenuValid($LoggedAs,$LoginUserName)
{
    echo 'AuthMenuValid';
}

function AuthMenu($Action, $ValBut)
{
    echo '<div class="AuthMenu">'."\n";
    echo '<table align="center">'."\n";
    echo ' <tr>'."\n";
    echo '  <td>'."\n";
    echo '   <form method="POST" action="'.$Action.'">'."\n";
    echo '    Имя:'."\n";
    echo '    <input type="text" name="LoginUserName">'."\n";
    echo '    Пароль:'."\n";
    echo '    <input type="text" name="LoginPass">'."\n";
    echo '    <input type="submit" name="RegBut" value="'.$ValBut.'">'."\n";
    echo '   </form>'."\n";
    echo '  </td>'."\n";
    echo ' </tr>'."\n";
    echo '</table>'."\n";
    echo '</div>'."\n";
}



?>


  </body>
</html>
=======
 <body>
 <?
 echo "!!!!!!!!!!!!!!!!";
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
     echo '<h1>Hello, <b>' . $_POST['name'] . '</b></h1>!';
   }
 ?>
 <form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
   Inter your name: <input type="text" name="name">
   <br>
   <input type="submit" name="okbutton" value="OK">
 </form>
<hr>


<table align="center">
 <tr>
  <td>
   <a href="profile.php?mode=register"><b>Регистрация</b></a>
  </td>
  <td>
   <form method="post"
   action="http://login.rutracker.org/forum/login.php">
  </td>
  <td>Имя:</td>
  <td>
   <input type="text" name="login_username" size="12" tabindex="1"
    accesskey="l">
  </td>
  <td>Пароль:</td>
  <td>
   <input type="password" name="login_password" size="12" tabindex="2">
  </td>
  <td>
   <input type="submit" name="login" value="Вход" tabindex="3">
  </td>
   </form>
  <td>
   <a href="profile.php?mode=sendpassword">Забыли пароль?</a>
  </td>
 </tr>
</table>


 </body>
 </html>
<?php
phpinfo();
?>
>>>>>>> 130020e450a77a6de71519885e3d26958037b431
