<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Рассылки");

if (!$USER->IsAdmin()) {
    LocalRedirect(SITE_DIR);
}
?>

    <div class="row my-5 pt-5">
        <div class="col mx-md-5 px-md-5">
            <table class="table table-striped table-light">
                <thead>
                <tr class="tHead" style="font-weight: normal">
                    <th scope="col">Группа</th>
                    <th scope="col">Креатив</th>
                    <th scope="col">Дата</th>
                    <th scope="col">Отправлено</th>
                    <th scope="col">Доставлено</th>
                    <th scope="col">Прочитано</th>
                    <th scope="col">Действие</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                    <th scope="row">Достигли цели</th>
                    <td>Новая программа</td>
                    <td>29.08.2018 01:28</td>
                    <td>1220</td>
                    <td>730</td>
                    <td>520</td>
                    <td>70</td>
                </tr>
                <tr>
                    <th scope="row">Достигли цели</th>
                    <td>Новая программа</td>
                    <td>29.08.2018 01:28</td>
                    <td>1220</td>
                    <td>730</td>
                    <td>520</td>
                    <td>70</td>
                </tr>
                <tr>
                    <th scope="row">Достигли цели</th>
                    <td>Новая программа</td>
                    <td>29.08.2018 01:28</td>
                    <td>1220</td>
                    <td>730</td>
                    <td>520</td>
                    <td>70</td>
                </tr>
                <tr>
                    <th scope="row">Достигли цели</th>
                    <td>Новая программа</td>
                    <td>29.08.2018 01:28</td>
                    <td>1220</td>
                    <td>730</td>
                    <td>520</td>
                    <td>70</td>
                </tr>
                <tr>
                    <th scope="row">Достигли цели</th>
                    <td>Новая программа</td>
                    <td>29.08.2018 01:28</td>
                    <td>1220</td>
                    <td>730</td>
                    <td>520</td>
                    <td>70</td>
                </tr>
                <tr>
                    <th scope="row">Достигли цели</th>
                    <td>Новая программа</td>
                    <td>29.08.2018 01:28</td>
                    <td>1220</td>
                    <td>730</td>
                    <td>520</td>
                    <td>70</td>
                </tr>
                <tr>
                    <th scope="row">Достигли цели</th>
                    <td>Новая программа</td>
                    <td>29.08.2018 01:28</td>
                    <td>1220</td>
                    <td>730</td>
                    <td>520</td>
                    <td>70</td>
                </tr>
                <tr>
                    <th scope="row">Достигли цели</th>
                    <td>Новая программа</td>
                    <td>29.08.2018 01:28</td>
                    <td>1220</td>
                    <td>730</td>
                    <td>520</td>
                    <td>70</td>
                </tr>
                <tr>
                    <th scope="row">Достигли цели</th>
                    <td>Новая программа</td>
                    <td>29.08.2018 01:28</td>
                    <td>1220</td>
                    <td>730</td>
                    <td>520</td>
                    <td>70</td>
                </tr>
                <tr>
                    <th scope="row">Достигли цели</th>
                    <td>Новая программа</td>
                    <td>29.08.2018 01:28</td>
                    <td>1220</td>
                    <td>730</td>
                    <td>520</td>
                    <td>70</td>
                </tr>
                <tr>
                    <th scope="row">Достигли цели</th>
                    <td>Новая программа</td>
                    <td>29.08.2018 01:28</td>
                    <td>1220</td>
                    <td>730</td>
                    <td>520</td>
                    <td>70</td>
                </tr>
                <tr>
                    <th scope="row">Достигли цели</th>
                    <td>Новая программа</td>
                    <td>29.08.2018 01:28</td>
                    <td>1220</td>
                    <td>730</td>
                    <td>520</td>
                    <td>70</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>