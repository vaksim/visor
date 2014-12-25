<?php
class UserMenu
{
    static public function show($authValid) {
        if ($authValid) {
            self::_showValidMenu();
        } else {
            self::_showAuthMenu();
        }
    }

    static private function _showValidMenu()
    {
        IncTpl::show('valid_menu');
    }
    
    static private function _showAuthMenu($valBut = _AUTH_BUT_VALUE)
    {
        IncTpl::show('auth_menu');
    }
}

?>
