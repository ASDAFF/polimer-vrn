<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="row cl">
	<div class="pl__content">
		<h1 class="h1-pl"><?=$arResult['NAME']?></h1>
		<div class="date">Обновлено: <span><?=$arResult['TIMESTAMP_X'];?></span></div>
		<div class="block cl">


			<?foreach($arResult["ITEMS"] as $arItem):?>
			<div class="col">
				<div class="title cl">
					<div class="name"><?=str_replace(' ','<br>',$arItem['NAME'])?></div>
					<div class="download">
						<a target="_blank" href="<?=CFile::GetPath($arItem['PROPERTIES']['TITLE_PRICE']['VALUE'])?>">Скачать</a>
						<span><?=CFile::FormatSize(CFile::GetByID($arItem['PROPERTIES']['TITLE_PRICE']['VALUE'])->arResult[0]['FILE_SIZE']);?></span>
					</div>
				</div>
				<div class="list">
				<?foreach($arItem['PROPERTIES']['PRICE']['VALUE'] as $key => $v):?>
					<div class="line cl">
						<span><?=$arItem['PROPERTIES']['PRICE']['DESCRIPTION'][$key]?></span>
						<a target="_blank" href="<?=CFile::GetPath($v);?>" class="download">Скачать</a>
					</div>
				<? endforeach; ?>
				</div>
			</div>
			<? endforeach; ?>

		</div>
	</div>

	<div class="pl__subscribe">
		<div class="form">
			<div class="name">Получайте новые <br>обновления прайс-листов <br>на Вашу почту</div>
			<div class="inp">
				<span>Представьтесь</span>
				<input type="text">
			</div>
			<div class="inp">
				<span>E-mail*</span>
				<input type="text">
			</div>
			<div class="inp">
				<span>Телефон</span>
				<input type="text">
			</div>
			<a href="#" class="btn_subscribe">Подписаться</a>
			<div class="req">* - обязательное поле</div>
		</div>
	</div>
</div>

