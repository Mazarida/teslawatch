<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Статистика");
?>

    <div class="pl-5 ml-5">
        <div class="row mt-5">
            <div class="col-md-5 col-xl-3 col-lg-4 col-10 col-sm-7 px-5">
                <select class="statselect custom-select" id="exampleFormControlSelect">
                    <option>Шаги</option>
                    <option>Калории</option>
                    <option>Сон</option>
                    <option>Тренировки</option>
                </select>
            </div>

            <div class="col-xl-3 col-lg-4 col-sm-7 col-9 mt-4 mt-md-0 col-md-5 px-5">
                <select class="statselect custom-select" id="exampleFormControlSelect">
                    <option>Апрель</option>
                    <option>Май</option>
                    <option>Июнь</option>
                    <option>Июль</option>
                    <option>Август</option>
                    <option>Сентябрь</option>
                    <option>Октябрь</option>
                </select>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col " id="chartStat" >
            </div>
        </div>
    </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>