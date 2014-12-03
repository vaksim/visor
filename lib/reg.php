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
	    $Valid = true;
	  }else{
	  PhitAuthUser($_SERVER['PHP_SELF'],_AUTH_BUT_VALUE);
	  echo "<br>User ".$LoginUserName." not valid.<br>\n";
	  $Valid = false;
	}
      }
    else
      {
	PhitAuthUser($_SERVER['PHP_SELF'],_AUTH_BUT_VALUE);
	$Valid = false;
      }
    return $Valid;
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

function PhitAuthUser($Action, $ValBut)
{
  echo "<hr>";

  echo "<table border=\"1\" align=\"center\">\n";
  echo " <tr>\n";
  echo "<form method=\"POST\" action=\"".$Action."\">\n";
  echo "  <td>Имя:</td>\n";
  echo "  <td>\n";
  echo "<input type=\"text\" name=\"LoginUserName\">\n";
  echo "  </td>\n";
  echo "  <td>Пароль:</td>\n";
  echo "  <td>\n";
  echo "<input type=\"text\" name=\"LoginPass\">\n";
  echo "  </td>\n";
  echo "  <td>\n";
  echo "<input type=\"submit\" name=\"RegBut\" value=\"".$ValBut."\">\n";
  echo "</form>\n";
  echo "  </td>\n";
  echo "   </form>\n";
  echo " </tr>\n";
  echo "</table>\n";
  echo "<br><hr>\n";

}

?>
