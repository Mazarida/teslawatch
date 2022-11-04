<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Пользователи");

if (!$USER->IsAdmin()) {
    LocalRedirect(SITE_DIR);
}
?>

    <div class="row justify-content-between mt-4 headTable">
        <div class="col-xl-3 col-sm-4 mt-2 col-6 ml-3 ml-sm-5 pl-0 pl-sm-5">
            <img src="<?=SITE_TEMPLATE_PATH."/img/menu.png"?>" style="max-height: 18px" class="img-fluid ml-1" alt="" />
            <span class="d-inline-block ml-2">Настройка полей</span>
        </div>

        <div class="col-xl-2 mr-2 mr-sm-5 pr-sm-5 pr-0 mr-lg-5 text-right col-lg-2 col-sm-3 col-md-2 col-5 pr-lg-5 pl-lg-0">
            Фильтр
            <img src="<?=SITE_TEMPLATE_PATH."/img/filter-512.png"?>" style="max-height: 30px" class="img-fluid" alt="" />
        </div>
    </div>

    <div class="row mt-4">
        <div class="col px-5">
            <div class="inBig mb-3 px-5">
                <input type="texter" class="form-control" placeholder="Поиск" aria-label="Recipient's username" aria-describedby="basic-addon2">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col mx-md-5 px-md-5">
            <table class="table tableU table-striped table-light">
                <thead>
                <tr class="tHead" style="font-weight: normal">
                    <th scope="col">Пользователь</th>
                    <th scope="col">Всего шагов</th>
                    <th scope="col">Ср. кол-во шагов</th>
                    <th scope="col">Уровень активности</th>
                    <th scope="col">Тип</th>
                    <th scope="col">Среднее время сна</th>
                    <th scope="col">Дата рождения</th>
                    <th scope="col">Рост</th>
                    <th scope="col">Вес</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <th scope="row">Mark</th>
                    <td>8000</td>
                    <td>6000</td>
                    <td>2</td>
                    <td>Active</td>
                    <td>8</td>
                    <td>01.01.1992</td>
                    <td>180</td>
                    <td>72</td>
                </tr>
                <tr>
                    <th scope="row">Mark</th>
                    <td>8000</td>
                    <td>6000</td>
                    <td>2</td>
                    <td>Active</td>
                    <td>8</td>
                    <td>01.01.1992</td>
                    <td>180</td>
                    <td>72</td>
                </tr>
                <tr>
                    <th scope="row">Mark</th>
                    <td>8000</td>
                    <td>6000</td>
                    <td>2</td>
                    <td>Active</td>
                    <td>8</td>
                    <td>01.01.1992</td>
                    <td>180</td>
                    <td>72</td>
                </tr>
                <tr>
                    <th scope="row">Mark</th>
                    <td>8000</td>
                    <td>6000</td>
                    <td>2</td>
                    <td>Active</td>
                    <td>8</td>
                    <td>01.01.1992</td>
                    <td>180</td>
                    <td>72</td>
                </tr>
                <tr>
                    <th scope="row">Mark</th>
                    <td>8000</td>
                    <td>6000</td>
                    <td>2</td>
                    <td>Active</td>
                    <td>8</td>
                    <td>01.01.1992</td>
                    <td>180</td>
                    <td>72</td>
                </tr>
                <tr>
                    <th scope="row">Mark</th>
                    <td>8000</td>
                    <td>6000</td>
                    <td>2</td>
                    <td>Active</td>
                    <td>8</td>
                    <td>01.01.1992</td>
                    <td>180</td>
                    <td>72</td>
                </tr>
                <tr>
                    <th scope="row">Mark</th>
                    <td>8000</td>
                    <td>6000</td>
                    <td>2</td>
                    <td>Active</td>
                    <td>8</td>
                    <td>01.01.1992</td>
                    <td>180</td>
                    <td>72</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="row">
        <div class="col mx-md-5 px-md-5">
            <div class="input-group mb-3">
                <div class="input-group-prepend col-lg-2 col-3 pl-2 pl-sm-3 col-sm-5" style=" background-color: #eee;">
                    <span class="input-group-text pr-5 py-2" style="border: 1px; background-color: #eee;" id="basic-addon1">Название</span>
                </div>
                <input type="textr"  class="form-control" placeholder="Введите название" aria-label="Username" aria-describedby="basic-addon1" />
                <input class=" d-inline-block py-2 px-5 ml-sm-2 px-1 btnacc btnsave" type="button" value="Сохранить" />
            </div>
        </div>
    </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>