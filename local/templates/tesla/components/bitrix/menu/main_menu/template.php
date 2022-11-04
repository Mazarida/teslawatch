<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * @var array $arParams
 * @var array $arResult
 */
?>

<?if (!empty($arResult)):?>
	<div class="collapse navbar-collapse nav mr-xl-5 nav-pills nav-fill navbtns" id="navbarSupportedContent" style="font-family:HelveticaNeueCyr; font-weight:350;">
		<?$isFirst = true;?>
		<?foreach($arResult as $arItem):?>
			<?if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
				continue;?>
			<?if($arItem["SELECTED"]):?>
				<a href="<?=$arItem["LINK"]?>" class="nav-item nav-link text-center px-1 py-2 d-none nav-btn d-lg-inline <?if (!$isFirst) echo 'ml-2';?> wide active"><?=$arItem["TEXT"]?></a>
			<?else:?>
				<a href="<?=$arItem["LINK"]?>" class="nav-item nav-link text-center px-1 py-2 d-none nav-btn d-lg-inline <?if (!$isFirst) echo 'ml-2';?> wide solid"><?=$arItem["TEXT"]?></a>
			<?endif;?>
			<?$isFirst = false;?>
		<?endforeach;?>

		<?foreach($arResult as $arItem):?>
			<?if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
				continue;?>
			<a href="<?=$arItem["LINK"]?>" class="nav-item nav-link text-left d-block d-lg-none"><?=$arItem["TEXT"]?></a>
			<div class="w-100"></div>
		<?endforeach;?>
		<a href="<?=SITE_DIR?>?logout=yes" class="nav-item nav-link text-left d-block d-lg-none">Выход</a>
	</div>
<?endif?>
