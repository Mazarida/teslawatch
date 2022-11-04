<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$APPLICATION->SetTitle("Восстановление пароля");
?>

    <section>
        <div class="container">
            <div class="row justify-content-center text-center mt-5">
                <div class="col-lg-9">
                    <?$APPLICATION->IncludeFile(
                        $APPLICATION->GetTemplatePath(SITE_DIR."/include/auth_logo.php"),
                        Array(),
                        Array("MODE" => "php")
                    );?>
                </div>
            </div>

            <?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "errors", Array(
                    "REGISTER_URL" => "",
                    "FORGOT_PASSWORD_URL" => "",
                    "PROFILE_URL" => "",
                    "SHOW_ERRORS" => "Y"
                )
            );?>
            <?$APPLICATION->IncludeComponent("bitrix:system.auth.forgotpasswd", "main", Array(
                    "SHOW_ERRORS" => "Y",
                )
            );?>
        </div>
    </section>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>