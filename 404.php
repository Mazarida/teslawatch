<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Страница не найдена");
?>

<div class="container">
    <h2 class="page404-title"><?$APPLICATION->ShowTitle()?></h2>

    <div style="margin: 40px 0;">
        <p>Вы набрали неправильный адрес страницы. Пожалуйста, перейдите на <a href="<?=SITE_DIR?>">главную страницу сайта</a>.</p>
    </div>

    <?
    //$APPLICATION->IncludeComponent("bitrix:main.map", ".default",
    //    Array(
    //        "LEVEL"	=> "3",
    //        "COL_NUM" => "2",
    //        "SHOW_DESCRIPTION" => "Y",
    //        "SET_TITLE" => "Y",
    //        "CACHE_TIME" => "3600"
    //    )
    //);
    ?>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
