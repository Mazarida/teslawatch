<?
//Антибот регистрации на сайте
AddEventHandler("main", "OnBeforeUserRegister", "OnBeforeUserRegisterHandler");
function OnBeforeUserRegisterHandler(&$arFields)
{
    global $APPLICATION;

    //В файл 1_txt.php будут записываться вск регистрации, можете закомментировать эти три строки
    //$_REQUEST['DATE'] = date('d-m-Y H:i:s');
    //$tttfile = dirname(__FILE__).'/1_txt.php';
    //file_put_contents($tttfile, "<pre>".print_r($_REQUEST, 1)."</pre>\n",FILE_APPEND);

    //ANTIBOT
    if (isset($_REQUEST['ANTIBOT']) && is_array($_REQUEST['ANTIBOT'])) {
        foreach($_REQUEST['ANTIBOT'] as $k => $v)
            if(empty($v))
                unset($_REQUEST['ANTIBOT'][$k]);
    }

    if($_REQUEST['ANTIBOT'] || !isset($_REQUEST['ANTIBOT'])) {
        $APPLICATION->ThrowException('Ошибка регистрации.');
        return false;
    }
    //\\ANTIBOT
}
