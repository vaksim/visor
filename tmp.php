</html><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
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
