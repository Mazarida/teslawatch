<?
//require_once($_SERVER['DOCUMENT_ROOT']."/bitrix/modules/main/include/prolog_before.php");
require_once($_SERVER['DOCUMENT_ROOT']."/api/TeslaWatchApiClass.php");

try {
    $api = new TeslaWatchApi();
    echo $api->run();
    //print_r(json_decode($api->run(), true));
} catch (Exception $e) {
    echo json_encode(Array('error' => $e->getMessage()));
}