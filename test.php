<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Тестовая");
?>

    <form action="<?=SITE_DIR."APi/v1/"?>" method="post">
        <p>
            <label for="action_id">Action:</label>
            <input type="text" name="action" id="action_id" style="color:#000;" />
            <label for="login_id">Login:</label>
            <input type="text" name="login" id="login_id" style="color:#000;" />
            <label for="password_id">Password:</label>
            <input type="text" name="password" id="password_id" style="color:#000;" />
            <input type="submit" />
        </p>
    </form>
    <?/*<form action="http://ndh.loc/APi/action" method="post">
        <p>
            <label for="action_id">ID акции:</label>
            <input type="text" name="id" id="action_id" />
            <input type="submit" />
        </p>
    </form>
    <form action="http://ndh.loc/APi/service" method="post">
        <p>
            <label for="service_id">ID услуги:</label>
            <input type="text" name="id" id="service_id" />
            <input type="submit" />
        </p>
    </form>*/?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>