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

<? foreach($arResult['SECTIONS'] as $key => $section): ?>
<div class="cat insan <? if($key == 0): ?>open<? endif; ?>">
	<a href="#" class="name" onclick="return false"><div class="cube"><span></span><span></span></div><?=$section['NAME']?></a>

	<ul class="cat-ul">

		<? foreach($section['SECTION_1'] as $sec_2): ?>
		<li class="cat-li">
			<a href="<?=$sec_2['SECTION_PAGE_URL']?>" class="title <?if($arParams["VARIABLES"] == $sec_2['CODE']):?>underline<?endif;?>" <? if(count($sec_2['SECTION_2']) != 0): ?> onclick="return false" <? endif; ?>>
				<? if(count($sec_2['SECTION_2']) != 0): ?> <div class="cube"><span></span><span></span></div> <? endif; ?>
				<?=$sec_2['NAME']?>
			</a>
			<div class="inner">
			<? foreach($sec_2['SECTION_2'] as $sec_3):?>
				<a href="<?=$sec_3['SECTION_PAGE_URL']?>" class="list-item <?if($arParams["VARIABLES"] == $sec_3['CODE']):?>underline<?endif;?>"><?=$sec_3['NAME']?></a>
			<? endforeach; ?>
			</div>
		</li>
		<? endforeach; ?>

	</ul>
</div>
<? endforeach; ?>