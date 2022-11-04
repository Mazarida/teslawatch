<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Креативы");

if (!$USER->IsAdmin()) {
    LocalRedirect(SITE_DIR);
}
?>

<div class="mb-5">
    <div class="row mt-5 mx-5" style="border: 1px solid #bbb; cursor: pointer;">
        <div  class="col-md-2 pl-xl-5 pl-5 pr-5 py-3 px-md-2 mx-md-0 py-md-4 pr-xl-5 ml-3 py-xl-3" style="border-right: 1px solid #bbb;">
            <img src="<?=SITE_TEMPLATE_PATH."/img/Card.png"?>" style="" class="img-fluid img-fluid2" alt=""></div>
        <div style="font-family: 'ProximaSB';" class="col-md-7 my-auto crea ml-4">Начните тренировку уже завтра</div>
        <div class="col-md-2 py-5 pl-4" style="border-left: 1px solid #bbb">29.08.2018 01:21</div>
    </div>

    <div class="row mt-5 mt-md-0 mx-5" style="border: 1px solid #bbb;cursor: pointer;">
        <div  class="col-md-2 pl-xl-5 pl-5 pr-5 py-3 px-md-2 mx-md-0 py-md-4 pr-xl-5 ml-3 py-xl-3" style="border-right: 1px solid #bbb;">
            <img src="<?=SITE_TEMPLATE_PATH."/img/Card.png"?>" style="" class="img-fluid img-fluid2" alt="">
        </div>
        <div style="font-family: 'ProximaSB';" class="col-md-7 my-auto crea ml-4">Начните тренировку уже завтра</div>
        <div class="col-md-2 py-5 pl-4" style="border-left: 1px solid #bbb">29.08.2018 01:21</div>
    </div>

    <div class="row mt-5 mt-md-0 mx-5" style="border: 1px solid #bbb;cursor: pointer;">
        <div  class="col-md-2 pl-xl-5 pl-5 pr-5 py-3 px-md-2 mx-md-0 py-md-4 pr-xl-5 ml-3 py-xl-3" style="border-right: 1px solid #bbb;">
            <img src="<?=SITE_TEMPLATE_PATH."/img/Card.png"?>" style="" class="img-fluid img-fluid2" alt="">
        </div>
        <div style="font-family: 'ProximaSB';" class="col-md-7 my-auto crea ml-4">Начните тренировку уже завтра</div>
        <div class="col-md-2 py-5 pl-4" style="border-left: 1px solid #bbb">29.08.2018 01:21</div>
    </div>

    <div class="row mt-5 mt-md-0 mx-5" style="border: 1px solid #bbb;cursor: pointer;">
        <div  class="col-md-2 pl-xl-5 pl-5 pr-5 py-3 px-md-2 mx-md-0 py-md-4 pr-xl-5 ml-3 py-xl-3" style="border-right: 1px solid #bbb;">
            <img src="<?=SITE_TEMPLATE_PATH."/img/Card.png"?>" style="" class="img-fluid img-fluid2" alt="">
        </div>
        <div style="font-family: 'ProximaSB';" class="col-md-7 my-auto crea ml-4">Начните тренировку уже завтра</div>
        <div class="col-md-2 py-5 pl-4" style="border-left: 1px solid #bbb">29.08.2018 01:21</div>
    </div>

    <div class="row mt-5 mt-md-0 mx-5" style="border: 1px solid #bbb;cursor: pointer;">
        <div  class="col-md-2 pl-xl-5 pl-5 pr-5 py-3 px-md-2 mx-md-0 py-md-4 pr-xl-5 ml-3 py-xl-3" style="border-right: 1px solid #bbb;">
            <img src="<?=SITE_TEMPLATE_PATH."/img/Card.png"?>" style="" class="img-fluid img-fluid2" alt="">
        </div>
        <div style="font-family: 'ProximaSB';" class="col-md-7 my-auto crea ml-4">Начните тренировку уже завтра</div>
        <div class="col-md-2 py-5 pl-4" style="border-left: 1px solid #bbb">29.08.2018 01:21</div>
    </div>
</div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>