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




<?foreach($arResult["ITEMS"] as $arItem): ?>

<?
if($arItem['PROPERTIES']['PRODUCT']['VALUE']):
	?>

	<div class="slider_product articles" id="mp__product__action" style="margin-bottom: 10px;border: 0px">
		<?
		$arSelect = Array("ID", "NAME","PREVIEW_PICTURE","DETAIL_PAGE_URL");
		foreach($arItem['PROPERTIES']['PRODUCT']['VALUE'] as $id){
			$arFilter = Array("IBLOCK_ID"=> $arItem['PROPERTIES']['PRODUCT']['LINK_IBLOCK_ID'],"ID" => $id);
			$res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
			if($ob = $res->GetNextElement())
			{$arFields = $ob->GetFields();
				?>
				<div>
					<div class="product" style="border-left: 0px;">
						<a href="<?=$arFields["DETAIL_PAGE_URL"]?>" style="display: block;height: 120px;border-bottom: 0px;">
							<img src="<?=CFile::GetPath($arFields["PREVIEW_PICTURE"]);?>" alt="<?=$arFields["NAME"]?>" style="max-height: 110px;margin: 0 auto;" class="img">
						</a>
						<a href="<?=$arFields["DETAIL_PAGE_URL"]?>" class="name" style="border-bottom: 0px;"><?=$arFields["NAME"]?></a>
					</div>
				</div>
				<?
			}
		}
		?>
	</div><!-- end::slider_product -->

<? endif; ?>

<? endforeach; ?>

