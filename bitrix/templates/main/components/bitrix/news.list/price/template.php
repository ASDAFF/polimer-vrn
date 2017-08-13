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
						<a target="_blank" href="<?=$v;?>" class="download">Скачать</a>
					</div>
				<? endforeach; ?>
				</div>
			</div>
			<? endforeach; ?>

		</div>
	</div>

	<form method="post" action="http://cp.unisender.com/ru/subscribe?hash=5dpcmpjehbb5zcruq3gwuf91zyopeqzsgfrt91jy&amp;list_ids=2799919" TARGET="_blank">
	<div class="pl__subscribe">
		<div class="form">
			<div class="name">Получайте новые <br>обновления прайс-листов <br>на Вашу почту</div>
			<div class="inp">
				<span>Представьтесь</span>
				<input type="hidden" name="charset" value="utf-8" />
				<input type="text" class="name" placeholder="Имя" name="Name">
			</div>
			<div class="inp">
				<span>E-mail*</span>
				<input type="text" placeholder="vash_mail@mail.ru" name="email">
			</div>
			<div class="inp">
				<span>Телефон</span>
				<input type="text" name="phone" placeholder="+7 (473) 234-03-01" class="phone">
			</div>
			<input class="btn_subscribe" type="submit" value=" Подписаться " />
			<div class="req">* - обязательное поле</div>
		</div>
	</div>
	</form>
</div>


