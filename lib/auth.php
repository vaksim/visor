<?php
//Файл содержит функции для отображения панели регистрации.

function Test()
{
    echo 'test';
    //  if (<field "what">) { <field "do it"> } else { <field "else do it"> } <endpoint>
//    if
        
}

function AuthValidArray()
{
//    $FuncArray["UserName"] = $_POST["UserName"];
//    $FuncArray["RegValidValue"] = _REG_VALID_VALUE;
//    return $FuncArray;
}

function AuthArray()
{

    $FuncArray["RegValue"] = _REG_VALUE;
    $FuncArray["RegButValue"] = _REG_BUT_VALUE;
    return $FuncArray;
}


function auth()
//Регистрация пользователя
{
//    AuthValidArray();
//    echo '<br>'.$_SESSION['viewNum'].'<br>';

//    if (varExixst($_SESSION['

    
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            if ((isset($_POST['loginUserName']) && (isset($_POST['loginUserPass'])))) {
                $_SESSION['loginUserName'] = $_POST['loginUserName'];
                $_SESSION['loginUserPass'] = $_POST['loginUserPass'];
            } else {
                return 'error';
            }
//
//            if (isset($_SESSION['loginUserPass'])) {
//                $loginUserPass = $_SESSION['loginUserPass'];
//            }

            //Проверяем пользователя по базе
	
            if (checkBaseUser($_SESSION['loginUserName'], $_SESSION['loginUserPass']))
                {
                    //authMenu($_SERVER['PHP_SELF'],_AUTH_BUT_VALUE);
                    return 'valid';
                }else{

                authMenu($_SERVER['PHP_SELF'],_AUTH_BUT_VALUE);
                //echo "<br>User ".$LoginUserName." not valid.<br>\n";
                //	  echo 'Not first'."\n";
                return 'not_valid';
            }
        }
    else
        {
            authMenu($_SERVER['PHP_SELF'],_AUTH_BUT_VALUE);
	
            return 'first';
        }
    return 0;
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

function authMenu($action, $valBut)
{
    echo '<div class="authMenu">'."\n";
    echo '<table align="center">'."\n";
    echo ' <tr>'."\n";
    echo '  <td>'."\n";
    echo '   <form method="POST" action="'.$action.'">'."\n";
    echo '    Имя:'."\n";
    echo '    <input type="text" name="loginUserName">'."\n";
    echo '    Пароль:'."\n";
    echo '    <input type="password" name="loginUserPass">'."\n";
    echo '    <input type="submit" name="authBut" value="'.$valBut.'">'."\n";
    echo '   </form>'."\n";
    echo '  </td>'."\n";
    echo ' </tr>'."\n";
    echo '</table>'."\n";
    echo '</div>'."\n";
}

?>
