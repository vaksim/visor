<?php
//Файл содержит функции для отображения панели регистрации.

function AuthValidArray()
{

  $FuncArray["UserName"] = $_POST["UserName"];
  $FuncArray["RegValidValue"] = _REG_VALID_VALUE;
  return $FuncArray;
}
function AuthArray()
{

  $FuncArray["RegValue"] = _REG_VALUE;
  $FuncArray["RegButValue"] = _REG_BUT_VALUE;
  return $FuncArray;
}

function AuthUser($LoginUserName, $LoginPass)
//Регистрация пользователя
  {
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
      {
	//Проверяем пользователя по базе
	
	if (CheckBaseUser($LoginUserName, $LoginPass))
	  {
	    PhitAuthValid($LoggedAs,$LoginUserName);  //$_POST["UserName"]);
	    $AuthStatus = 'valid';
	  }else{
	  PrintAuthUserMenu($_SERVER['PHP_SELF'],_AUTH_BUT_VALUE);
	  //echo "<br>User ".$LoginUserName." not valid.<br>\n";
	  echo 'Not first'."\n";
	  $AuthStatus = 'error';
	}
      }
    else
      {
	PrintAuthUserMenu($_SERVER['PHP_SELF'],_AUTH_BUT_VALUE);
	
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
  $Valid = false;
  return $Valid;
}

function PrintAuthUserMenu($Action, $ValBut)
{
  //  echo "<hr>";
  echo "<div class=\"AuthMenu\">\n";
  echo "<table align=\"center\">\n";
  echo " <tr>\n";
  echo "  <td>\n";
  echo "<form method=\"POST\" action=\"".$Action."\">\n";
  echo "  Имя:\n";
  echo "<input type=\"text\" name=\"LoginUserName\">\n";
  echo "  Пароль:\n";
  echo "<input type=\"text\" name=\"LoginPass\">\n";
  echo "<input type=\"submit\" name=\"RegBut\" value=\"".$ValBut."\">\n";
  echo "</form>\n";
  echo "  </td>\n";
  echo " </tr>\n";
  echo "</table>\n";
  echo "</div>\n";
  //  echo "<br><hr>\n";

}

?>
