<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

use \Bitrix\Main\Localization\Loc;
Loc::loadMessages(__FILE__);

$dir = $APPLICATION->GetCurDir();
$page = $APPLICATION->GetCurPage();
$assets = \Bitrix\Main\Page\Asset::getInstance();
?>

<!DOCTYPE html>
<html lang="<?=LANGUAGE_ID?>">
<head>
	<meta charset="<?=SITE_CHARSET?>">
	<title><?$APPLICATION->ShowTitle();?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?
	/**
	 * CSS
	 */
	$assets->addCss(SITE_TEMPLATE_PATH.'/css/bootstrap.min.css');
	$assets->addCss(SITE_TEMPLATE_PATH.'/css/c3.css');
	$assets->addCss(SITE_TEMPLATE_PATH."/css/common.css");

	/**
	 * JS
	 */
//	\CJSCore::Init(array('jquery2'));
	$assets->addJs(SITE_TEMPLATE_PATH."/js/jquery.min.js");
	$assets->addJs(SITE_TEMPLATE_PATH."/js/bootstrap.min.js");
	$assets->addJs(SITE_TEMPLATE_PATH . "/js/progressbar.min.js");
	$assets->addJs(SITE_TEMPLATE_PATH."/js/d3-5.4.0.min.js");
	$assets->addJs(SITE_TEMPLATE_PATH."/js/c3.min.js");
	$assets->addJs("https://www.gstatic.com/charts/loader.js");
	$assets->addJs(SITE_TEMPLATE_PATH."/js/common.js");

	/**
	 * FAVICON
	 */
	$assets->addString('<link rel="shortcut icon" type="image/x-icon" href="'.SITE_TEMPLATE_PATH.'/favicon.jpg" />');
	$assets->addString('<link rel="icon" type="image/x-icon" href="'.SITE_TEMPLATE_PATH.'/favicon.jpg" />');

	/**
	 * BITRIX->ShowHead()
	 */
	$APPLICATION->ShowMeta("robots", false);
	$APPLICATION->ShowMeta("keywords", false);
	$APPLICATION->ShowMeta("description", false);
	$APPLICATION->ShowLink("canonical", null);
	$APPLICATION->ShowCSS(true);
	$APPLICATION->ShowHeadStrings();
	$APPLICATION->ShowHeadScripts();
	?>
</head>

<?if ($dir !== PATH_TO_AUTH):?>
	<body style="<?=$USER->IsAdmin() ? "font-family:'ProximaR';" : "font-family:'ProximaSB';"?>">
<?else:?>
	<body style="background: url(<?=SITE_TEMPLATE_PATH.'/img/AutBG2.png'?>) no-repeat center center fixed;
		-webkit-background-size: cover;
		-moz-background-size: cover;
		-o-background-size: cover;
		background-size: cover;
		color: white;
		font-family:'ProximaSB';"
		>
<?endif;?>

<?$APPLICATION->ShowPanel();?>

<?if ($dir !== PATH_TO_AUTH):?>

	<?if (!$USER->IsAuthorized()) {
		LocalRedirect(PATH_TO_AUTH);
	}?>

	<header>
		<div class="container-fluid">
			<nav class="navbar navbar-expand-lg navbar-light mt-5 justify-content-center" style="width: 100%; z-index: 100;">
				<div class="col-lg-3 col-sm-6 col-md-4 pl-lg-5 col-8 px-0 mr-0 mr-sm-5">
					<a href="<?=SITE_DIR?>" class="navbar-brand mr-0">
						<?$APPLICATION->IncludeFile(
							$APPLICATION->GetTemplatePath(SITE_DIR."/include/header_logo.php"),
							Array(),
							Array("MODE" => "php")
						);?>
					</a>
				</div>

				<button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-expanded="false">
					<span class="navbar-toggler-icon"></span>
				</button>

				<?$APPLICATION->IncludeComponent("bitrix:menu", "main_menu", Array(
					"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
					"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
					"DELAY" => "N",	// Откладывать выполнение шаблона меню
					"MAX_LEVEL" => "1",	// Уровень вложенности меню
					"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
						0 => "",
					),
					"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
					"MENU_CACHE_TYPE" => "N",	// Тип кеширования
					"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
					"ROOT_MENU_TYPE" => $USER->IsAdmin() ? "top_admin" : "top",	// Тип меню для первого уровня
					"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
				),
					false
				);?>

				<a href="<?=SITE_DIR?>?logout=yes" class="nav-item nav-link text-center d-none mr-0 py-0 d-lg-inline ml-xl-5 solid px-0" style="border-radius: 2px; text-decoration: none;">
					<?$APPLICATION->IncludeFile(
						$APPLICATION->GetTemplatePath(SITE_DIR."/include/header_logout.php"),
						Array(),
						Array("MODE" => "php")
					);?>
				</a>
			</nav>
		</div>
	</header>

	<article class="container-fluid" style="font-family: 'ProximaR';">
<?endif;?>
