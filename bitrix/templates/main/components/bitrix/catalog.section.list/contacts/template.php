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
<script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<div class="co__sandwich">
	<a href="#" class="sandwich">
		<span></span>
		<span></span>
		<span></span>
	</a>
</div>

<div class="co__cities">
	<? foreach ($arResult['SECTIONS'] as $key => &$arSection): ?>
	<a href="#" class="city <?if($key == 0){?>active<?}?>"><?=$arSection['NAME']?></a>
	<? endforeach; ?>
</div><!--end::co__cities-->

<div class="co__cities-list">

	<? foreach ($arResult['SECTIONS'] as $key => &$arSection): ?>
	<div class="city <?if($key == 0){?>active<?}?>">
		<div class="co__tabs">
			<div class="t-list cl">
		<? foreach ($arSection['ITEM'] as $key => &$arItem): ?>
				<a href="#" class="<?if($key == 0){?>active<?}?>"><span><?=$arItem['NAME']?></span></a>
		<?endforeach?>
			</div>
			<div class="t-content">
				<? foreach ($arSection['ITEM'] as $key => &$arItem): ?>
				<div class="tab cl <?if($key == 0){?>active<?}?>">
					<div class="col-title"><span><?=$arItem['NAME']?></span></div>

					<div class="col-text">
						<div class="txt locate cl"><?=$arItem['STRET']['VALUE']?></div>
						<div class="block-cont left">
							<div class="tit insant">Инженерная<br>сантехника</div>
							<div class="txt phone"><?=$arItem['ING_PHONE']['VALUE']?></div>
							<a href="#" class="mail"><?=$arItem['ING_MAIL']['VALUE']?></a>
							<div class="time">
								<span>часы работы:</span>
								<? foreach($arItem['ING_TIME_W']['VALUE'] as $v):?>
								<span><?=$v?></span>
								<? endforeach; ?>

							</div>
						</div>

						<div class="block-cont right">
							<div class="tit stroma">Строительные<br>материалы</div>
							<div class="txt phone"><?=$arItem['STR_PHONE']['VALUE']?></div>
							<a href="#" class="mail"><?=$arItem['STR_MAIL']['VALUE']?></a>
							<div class="time">
								<span>часы работы:</span>
								<? foreach($arItem['STR_TIME_W']['VALUE'] as $v):?>
									<span><?=$v?></span>
								<? endforeach; ?>
							</div>
						</div>
						<a target="_blank" href="<?=CFile::GetPath($arItem['PLAN_STRET']['VALUE']);?>" class="dlmap">Скачать схему проезда</a>
					</div>
					<?
					$map = explode(',',$arItem['MAP_API']['VALUE']);
					?>
					<div class="col-visual">
						<div class="cw-row image"><img src="<?=CFile::GetPath($arItem['PREVIEW_PICTURE'])?>" alt="<?=$arItem['NAME']?>"></div>
						<div class="cw-row map" id="map_<?=$arItem['ID']?>"></div>
					</div>
					<script type="text/javascript">
						ymaps.ready(init);
						var myMap;
						function init(){
							myMap = new ymaps.Map("map_<?=$arItem['ID']?>", {
								center: [<?=$map[0]?>, <?=$map[1]?>],
								zoom: 16
							});
							myPlacemark = new ymaps.Placemark([<?=$map[0]?>, <?=$map[1]?>],   {
								iconCaption: '<?=$arItem['STRET']['VALUE']?>'
							}, {
								preset: 'islands#redDotIconWithCaption'
							});

							myMap.geoObjects.add(myPlacemark);
						}
					</script>
				</div>
				<?endforeach?>
			</div>
		</div><!--end::co__tabs-->
	</div><!--end::city-->
	<? endforeach; ?>

</div><!--end::co__cities-list-->





