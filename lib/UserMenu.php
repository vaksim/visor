<?php
class UserMenu
{
    static public function showMenu($authValid) {
        if ($authValid) {
            self::_showValidMenu();
        } else {
            self::_showAuthMenu();
        }
    }

    static private function _showValidMenu()
    {
        echo '<div class="authMenu">'."\n";
        echo '<table align="center">'."\n";
        echo ' <tr>'."\n";
        echo '  <td>'."\n";
        echo '    '.'Вы вошли как'.': <b>'.$_SESSION['loginUserName']."<b>\n";
        echo '  </td>'."\n";
        echo '  <td>',"\n";
        echo '   [ <a href="'.$_SERVER['PHP_SELF'].'?exit=true">'.'Выход'.'</a> ]<br>'."\n";
        echo '  <td>'."\n";
        echo ' </tr>'."\n";
        echo '</table>'."\n";
        echo '</div>'."\n";
        
    }
    static private function _showAuthMenu($valBut = _AUTH_BUT_VALUE)
    {
        echo '<div class="authMenu">'."\n";
        echo '<table align="center">'."\n";
        echo ' <tr>'."\n";
        echo '  <td>'."\n";
        echo '   <form method="POST" action="'.$_SERVER['PHP_SELF'].'">'."\n";
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
}

?>
