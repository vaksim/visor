<?php
class PageDebug
{
    static public $arrDebug = array();
    static public $varTmp;
    static public $varTmp2;
    
    static public function prep($varName,$varDump)
    {
        self::$arrDebug[$varName] = $varDump;
    }

    static public function show()
   {
        IncTpl::show('debug');
    }
}
?>