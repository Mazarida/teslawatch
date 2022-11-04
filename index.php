<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Главная");
?>

<?if ($USER->IsAdmin()):?>

    <div class="row text-center mx-5 mt-5 pt-3">
        <div class="col bluebox ml-md-5 mr-md-1 py-3 mx-5 mb-1 mb-md-0">Всего<br>пользователей<br><span class="BBText" style="font-family: 'ProximaB';">1.236</span></div>
        <div class="w-100 d-block d-md-none"></div>
        <div class="col bluebox mr-md-1 ml-md-0 mx-5 mb-1 mb-md-0 py-3">Активных пользователей<br>в день<br><span class="BBText" style="font-family: 'ProximaB';">168</span></div>
        <div class="w-100 d-block d-md-none"></div>
        <div class="col bluebox mr-md-1 ml-md-0 mx-5 mb-1 mb-md-0 py-3">Пройдено всего<br>шагов<br><span class="BBText" style="font-family: 'ProximaB';">151,026</span></div>
        <div class="w-100 d-block d-md-none"></div>
        <div class="col bluebox mr-md-1 ml-md-0 mx-5 mb-1 mb-md-0 py-3">Среднее количество<br>шагов в день<br><span class="BBText" style="font-family: 'ProximaB';">5234</span></div>
        <div class="w-100 d-block d-md-none"></div>
        <div class="col bluebox mr-md-5 py-3 ml-md-0 mx-5 mb-1 mb-md-0">Прочитанных<br>сообщений<br><span class="BBText" style="font-family: 'ProximaB';">755</span></div>
    </div>

    <div class="row mt-5 text-center justify-content-center pr-3">
        <div class="col-sm-3 pl-4 ml-1">
            <span class="bluebox" style="background: none; border: none; color: black;">Активных пользователей</span><br><span class="BBText" style="font-family: 'ProximaB';">426</span>
        </div>
        <div class="col-sm-4 pl-4 ml-1 ">
            <span class="bluebox" style="background: none; border: none; color: black;">Среднее количество шагов в день</span><br><span class="BBText" style="font-family: 'ProximaB'; ">5234</span>
        </div>
        <div class="col-sm-3 pl-4 ml-1">
            <span class="bluebox" style="background: none; border: none; color: black;">Прочитано сообщений</span><br><span class="BBText" style="font-family: 'ProximaB'; ">326</span>
        </div>
    </div>

    <div id="DataRow" class="row text-center justify-content-center">
        <div class="col-lg-3 col-md-4 col-sm-7 col-11 pl-0 mr-2" style="height: 100%;" id="chart"></div>
        <div class="col-lg-4 pl-0 pl-sm-3 col-md-6 col-12  mt-5 pr-5" id="chart2" style="height: 100%;"></div>
        <div class="col-lg-3 pl-0 pl-sm-3 col-md-6 mt-5 pr-5 " id="chart3" style="height: 100%"></div>
    </div>

<?else:?>

    <div class="px-5">
        <div class="row mt-4">
            <div class="col-md-4">
                <?/*<img src="<?=SITE_TEMPLATE_PATH."/img/arrowleft.png"?>" class="img" width="15" alt="">*/?>
                <span class="mx-2 pl-1 mt-1" style="font-family: 'ProximaSB'; font-size: 0.9rem">16.10.2018</span>
                <?/*<img src="<?=SITE_TEMPLATE_PATH."/img/arrowright.png"?>" width="15" alt="">*/?>
                <?/*<img src="<?=SITE_TEMPLATE_PATH."/img/calendar-grey.png"?>" class="img ml-2" width="20" alt="">*/?>
            </div>
            <div class="col-md-8 mt-3 mt-md-0"><span>Последняя синхронизация 29.08.2018 14:40</span></div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4 px-md-0 pl-5">
                <div class="btn-group btn-group-toggle sText3" style="width: 100%" data-toggle="buttons">
                    <label id="toogleO" class="btn  btn-block btnMain active" style="width: 33%;">
                        <input type="radio" name="VP" id="option1" value="Шаги" autocomplete="off">
                        Шаги
                    </label>
                    <label id="toogleE" class="btn  btnMain" style="width: 33%;">
                        <input type="radio" name="VP" id="option2" value="Сон" autocomplete="off" checked="">
                        Сон
                    </label>
                    <label id="toogleE" class="btn  btnMain" style="width: 33%;">
                        <input type="radio" name="VP" id="option2" value="Калории" autocomplete="off" checked="">
                        Калории
                    </label>
                </div>
            </div>

            <div class="col-md-8 pl-md-4  d-none d-md-block">
                <div class="btn-group btn-group-toggle sText3" style="width: 100%;" data-toggle="buttons">
                    <label id="toogleO" class="btn px-5  btnMain active" style="width: 33%;">
                        <input type="radio" name="VP" id="option1" value="Шаги" autocomplete="off">
                        Шаги
                    </label>
                    <label id="toogleE" style="width:33%;" class="btn px-5 btnMain">
                        <input type="radio" name="VP" id="option2"  value="Калории" autocomplete="off" checked="">
                        Калории
                    </label>
                    <label id="toogleE" style="width: 33%;" class="btn px-4 btnMain">
                        <input type="radio" name="VP" id="option2" value="Расстояние" autocomplete="off" checked="">
                        Расстояние
                    </label>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-4 pr-0" >
                <div class="row">
                    <div class="col pr-md-2 px-5 px-md-0 pr-md-4" id="container"></div>
                </div>
                <div class="row mt-0">
                    <div class="col text-center pr-md-5">
                        <span class="dot">.</span>
                        Выполнено
                    </div>
                </div>
            </div>

            <div class="col-md-8 pl-md-4 d-block mb-3 mt-3 pl-5 d-md-none">
                <div class="btn-group btn-group-toggle sText3" style="width: 100%;" data-toggle="buttons">
                    <label id="toogleO" class="btn   btnMain active" style="width:33%;">
                        <input type="radio" name="VP" id="option1" value="Шаги" autocomplete="off">
                        Шаги
                    </label>
                    <label id="toogleE" style="width:33%;" class="btn   btnMain">
                        <input type="radio" name="VP" id="option2"  value="Калории" autocomplete="off" checked="">
                        Калории
                    </label>
                    <label id="toogleE" style="width: 33%;" class="btn  btnMain">
                        <input type="radio" name="VP" id="option2"  value="Расстояние" autocomplete="off" checked="">
                        Расстояние
                    </label>
                </div>
            </div>
            <div class="col-md-8" id="chartStat2"></div>
        </div>

        <div class="row mt-2">
            <div class="col-md-4">
                <div class="row mt-1">
                    <div class="col-9 text-left my-auto">
                        <span class="inline-block" style="font-size: 1.1rem;" >Днейвной рейтинг активности:</span>
                    </div>
                    <div class="col-3 text-right pr-2">
                        <span class="inline-block" style="font-size: 2rem; font-family:'ProximaSB'">7.5/10</span>
                    </div>
                </div>
            </div>

            <div class="col-md-8 pl-1 mr-2 mr-md-0 pl-md-3 pr-md-5">
                <div class="row ">
                    <div class="col ml-3 py-1 infoM mr-2">
                        <div class="row">
                            <div class="col-9">Количество шагов</div>
                            <div class="col-3 text-right">9536</div>
                        </div>
                    </div>

                    <div class="col infoM py-1">
                        <div class="row">
                            <div class="col-9">Количество шагов</div>
                            <div class="text-right col-3">9536</div>
                        </div>
                    </div>
                </div>

                <div class="row mt-2">
                    <div class="col ml-3 infoM py-1 mr-2">
                        <div class="row">
                            <div class="col-9">Количество шагов</div>
                            <div class="col-3 text-right">9536</div>
                        </div>
                    </div>

                    <div class="col infoM py-1">
                        <div class="row">
                            <div class="col-9">Количество шагов</div>
                            <div class="col-3 text-right">9536</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3 mb-4">
            <div class="col-md-4 mx-0 px-0 mx-md-0 px-md-0 mb-3 mb-md-0 pl-md-5" id="donuter"></div>
            <div class="col-md-8">
                <div class="row ">
                    <div class="col  pb-1 pr-md-5" id="timeline"></div>
                </div>

                <div class="row justify-content-center ml-0 ml-md-0 mb-2">
                    <div class="col-md-2 col-3 px-md-1 mr-0 px-0">
                        <img src="<?=SITE_TEMPLATE_PATH."/img/redElips.png"?>" class="ellips" alt="">
                        Бодрствование
                    </div>

                    <div class="col-md-2 col-3 px-0 px-md-1">
                        <img class="ellips" src="<?=SITE_TEMPLATE_PATH."/img/yellowEllips.png"?>" alt="">
                        Быстрый сон
                    </div>

                    <div class="col-md-2 col-3 px-0 px-md-1">
                        <img class="ellips"src="<?=SITE_TEMPLATE_PATH."/img/greenEllips.png"?>" alt="">
                        Лёгкий сон
                    </div>

                    <div class="col-md-2 col-3 px-0 px-md-1">
                        <img class="ellips"src="<?=SITE_TEMPLATE_PATH."/img/blueEllisp.png"?>" alt="">
                        Глубокий сон
                    </div>
                </div>

                <div class="row mr-1 mr-md-0 pr-md-4">
                    <div class="col ml-3 py-1 infoM mr-2">
                        <div class="row">
                            <div class="col-9">Количество шагов</div>
                            <div class="col-3 text-right">9536</div>
                        </div>
                    </div>

                    <div class="col infoM py-1">
                        <div class="row">
                            <div class="col-9">Количество шагов</div>
                            <div class="text-right col-3">9536</div>
                        </div>
                    </div>
                </div>

                <div class="row mt-2 mr-1 mr-md-0 pr-md-4">
                    <div class="col ml-3 infoM py-1 mr-2">
                        <div class="row">
                            <div class="col-9">Количество шагов</div>
                            <div class="col-3 text-right">9536</div>
                        </div>
                    </div>

                    <div class="col infoM py-1">
                        <div class="row">
                            <div class="col-9">Количество шагов</div>
                            <div class="col-3 text-right">9536</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?endif;?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>