<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Аккаунт");
?>

    <div class="px-5 mx-5">
        <form action="#" class="sms3">
            <div class="row mt-5 pt-5">
                <div class="col col-lg-2 align-self-center">
                    <div class="form-group ">
                        <img id="photo" src="<?=SITE_TEMPLATE_PATH."/img/photo.png"?>" style="min-width: 140px;" class="img-fluid mx-auto d-block" alt="Фото" />
                        <label id="upload" class="btn btn-default d-block mx-auto py-0 px-0" style="color: #999; font-size: 0.8rem; text-decoration: underline;">
                            Загрузить
                            <input type="file" hidden />
                        </label>
                    </div>
                </div>

                <div class="w-100 d-block d-lg-none"></div>

                <div class="col pl-sm-0">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group form-inline">
                                <label for="exampleInputEmail1" class="d-inline-block formlbl p-2 px-0 text-center col-form-label" style="width: 11%;">ID</label>
                                <input type="textId" class="form-control d-inline-block py-2 forminpt col-form-label"  id="exampleInputEmail1" aria-describedby="" placeholder="Введите ID" style="width: 89%;" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-inline">
                                <label for="exampleInputEmail1" class="d-inline-block formlbl my-0 p-2 px-0 text-center" style="width: 15.48%;">E-mail</label>
                                <input type="email" class="form-control d-inline-block forminpt py-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите e-mail" style="width: 84.52%;" />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group form-inline">
                                <label for="exampleInputEmail1" class="d-inline-block formlbl p-2 px-0 text-center col-form-label" style="width: 20%;">Имя</label>
                                <input type="textId" class="form-control d-inline-block py-2 forminpt col-form-label" id="exampleInputEmail1" aria-describedby="" placeholder="Введите имя" style="width: 80%;" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-inline">
                                <label for="exampleInputEmail1" class="d-inline-block formlbl p-2 my-0 px-0 text-center "style="width: 21%">Фамилия</label>
                                <input type="email" class="form-control d-inline-block forminpt py-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите фамилию" style="width: 79%;" />
                            </div>
                        </div>
                    </div>

                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div id="DRForm" class="form-group form-inline">
                                <label id="DR" for="DRP" class="d-inline-block formlbl p-2 px-0 text-center col-form-label" style="width: 30%; ">Дата рождения</label>
                                <input type="textId" class="form-control d-inline-block py-2 forminpt col-form-label" id="DRP" aria-describedby="" placeholder="Введите дату рождения" style="width: 70%;" />
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col">
                                    <div class="form-group form-inline">
                                        <label for="exampleInputEmail1" class="d-inline-block formlbl p-2 my-0 px-0 text-center" style="width: 30%;">Рост</label>
                                        <input type="email" class="form-control d-inline-block forminpt py-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите рост" style="width: 70%;" />
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="form-group form-inline">
                                        <label for="exampleInputEmail1" class="d-inline-block formlbl my-0 p-2 px-0 text-center" style="width: 28%;">Вес</label>
                                        <input type="email" class="form-control d-inline-block forminpt py-2" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Введите вес" style="width: 72%;" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row ">
                <div id="CVK" class="col pl-sm-0">
                    <div id="VKForm" class="form-group form-inline">
                        <label id="VK" for="VKP" class="d-inline-block formlbl lineH px-md-2 py-md-1 py-lg-2 py-2 px-0 my-0 text-center" style="width: 13%;">Профиль ВК</label>
                        <input type="email" class="form-control d-inline-block forminpt py-2" id="VKP" aria-describedby="emailHelp" placeholder="Введите ID" style="width: 87%;" />
                    </div>
                </div>
            </div>

            <div class="row "><div class="col  pl-sm-0">
                    <div id="FBForm" class="form-group form-inline">
                        <label id="FB" for="FBP" class="d-inline-block formlbl lineH px-md-2 py-md-1 py-lg-2 py-lg-2 py-2 px-0 text-center py-0 my-0" style="width: 12.9%; ">Профиль FB</label>
                        <input type="email" class="form-control d-inline-block forminpt py-2" id="FBP" aria-describedby="emailHelp" placeholder="Введите ID" style="width: 87.1%;" />
                    </div>
                </div>
            </div>

            <div class="row mt-5 justify-content-end">
                <div class="col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="form-group form-inline ml-xl-5 pl-xl-5 ml-lg-3 pl-lg-1 ml-md-4 pl-md-3 ml-sm-4">
                        <input type="button" class="form-control d-inline-block mb-2  py-2 px-sm-5 my-sm-0 btnacc btnchange" id="exampleInputEmail1" aria-describedby="emailHelp" value="Изменить" />
                        <input type="button" class="form-control d-inline-block py-2 ml-sm-2 px-5 btnacc btnsave" id="exampleInputEmail1" aria-describedby="emailHelp" value="Сохранить" />
                    </div>
                </div>
            </div>
        </form>
    </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>