<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Отчеты");

if (!$USER->IsAdmin()) {
    LocalRedirect(SITE_DIR);
}
?>

    <div class="mt-5 sText">
        <div class="row mx-5" style="border: 1px solid #bbb">
            <div class="col-5 pl-lg-5 pl-4 pt-3 py-lg-3" style="border-right: 1px solid #bbb; background-color: #eee; font-family: 'ProximaSB';";>Достигли цели</div>
            <div class="col-xl-6 col-lg-5 col-4 sText2 my-auto pl-3 pl-md-5">29.08.2018 01:28</div>
            <div class="col-3 col-lg-2 col-xl-1 px-0 pl-3 py-3" style="border-left: 1px solid #bbb">
                <img src="<?=SITE_TEMPLATE_PATH."/img/message.png"?>" class="img mr-2 pr-1" alt="" style="height: 20px;" />
                <img src="<?=SITE_TEMPLATE_PATH."/img/bubble.png"?>" class="img mr-2 pr-1" alt="" style="height: 15px;" />
                <img src="<?=SITE_TEMPLATE_PATH."/img/down.png"?>" class="img " alt="" style="height: 15px;">
            </div>
        </div>

        <div class="row mx-5" style="border: 1px solid #bbb">
            <div class="col-5 pl-lg-5 pl-4 pt-3 py-lg-3" style="border-right: 1px solid #bbb; background-color: #eee; font-family: 'ProximaSB';";>Достигли цели</div>
            <div class="col-xl-6 col-lg-5 col-4 sText2 my-auto pl-3 pl-md-5">29.08.2018 01:28</div>
            <div class="col-3 col-lg-2 col-xl-1 px-0 pl-3 py-3" style="border-left: 1px solid #bbb">
                <img src="<?=SITE_TEMPLATE_PATH."/img/message.png"?>" class="img mr-2 pr-1" alt="" style="height: 20px;" />
                <img src="<?=SITE_TEMPLATE_PATH."/img/bubble.png"?>" class="img mr-2 pr-1" alt="" style="height: 15px;" />
                <img src="<?=SITE_TEMPLATE_PATH."/img/down.png"?>" class="img " alt="" style="height: 15px;">
            </div>
        </div>

        <div class="row mx-5" style="border: 1px solid #bbb">
            <div class="col-5 pl-lg-5 pl-4 pt-3 py-lg-3" style="border-right: 1px solid #bbb; background-color: #eee; font-family: 'ProximaSB';";>Достигли цели</div>
            <div class="col-xl-6 col-lg-5 col-4 sText2 my-auto pl-3 pl-md-5">29.08.2018 01:28</div>
            <div class="col-3 col-lg-2 col-xl-1 px-0 pl-3 py-3" style="border-left: 1px solid #bbb">
                <img src="<?=SITE_TEMPLATE_PATH."/img/message.png"?>" class="img mr-2 pr-1" alt="" style="height: 20px;" />
                <img src="<?=SITE_TEMPLATE_PATH."/img/bubble.png"?>" class="img mr-2 pr-1" alt="" style="height: 15px;" />
                <img src="<?=SITE_TEMPLATE_PATH."/img/down.png"?>" class="img " alt="" style="height: 15px;">
            </div>
        </div>

        <div class="row mx-5" style="border: 1px solid #bbb">
            <div class="col-5 pl-lg-5 pl-4 pt-3 py-lg-3" style="border-right: 1px solid #bbb; background-color: #eee; font-family: 'ProximaSB';";>Достигли цели</div>
            <div class="col-xl-6 col-lg-5 col-4 sText2 my-auto pl-3 pl-md-5">29.08.2018 01:28</div>
            <div class="col-3 col-lg-2 col-xl-1 px-0 pl-3 py-3" style="border-left: 1px solid #bbb">
                <img src="<?=SITE_TEMPLATE_PATH."/img/message.png"?>" class="img mr-2 pr-1" alt="" style="height: 20px;" />
                <img src="<?=SITE_TEMPLATE_PATH."/img/bubble.png"?>" class="img mr-2 pr-1" alt="" style="height: 15px;" />
                <img src="<?=SITE_TEMPLATE_PATH."/img/down.png"?>" class="img " alt="" style="height: 15px;">
            </div>
        </div>
    </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>