<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

global $USER;
CModule::IncludeModule('iblock');
CModule::IncludeModule('catalog');
$groups = $USER->GetUserGroupArray();

foreach($groups as $group){
    $obPriceTypes = CCatalogGroup::GetGroupsList( array(
        'GROUP_ID' => $group
    ) );//get user price types

    while($type = $obPriceTypes->GetNext())
    {
        if($type['BUY'] != 'Y')
            continue;
        $priceTypes[$type['CATALOG_GROUP_ID']] = $type['CATALOG_GROUP_ID'];
    }
}

$select = array(
    'IBLOCK_ID',
    'IBLOCK_SECTION_ID',
    'ID',
    'PREVIEW_PICTURE',
    'DETAIL_PICTURE'
);

foreach($priceTypes as $type)
{
    $select[] = 'CATALOG_GROUP_' . $type;
}


foreach($arResult['SEARCH'] as &$arItem)
{
    //var_dump(price($arItem['ITEM_ID']));

    if (substr_count($arItem['ITEM_ID'],'S'))
    {
        $sectId = str_replace('S','',$arItem['ITEM_ID']);
        $arSect = GetIblockSection($sectId);
        if ($arSect['ID']>0)
        {
            $arItem['IS_SECTION'] = true;

            $arChain = array();
            while ($arSect['IBLOCK_SECTION_ID']>0)
            {
                $arChain[] = '<a href="'.$arSect['SECTION_PAGE_URL'].'">'.$arSect['NAME'].'</a>';
                $arSect = GetIblockSection($arSect['IBLOCK_SECTION_ID']);
            }
            $arItem['CHAIN'] = $arChain;
        }
        continue;
    }

    $arItem['IS_PRODUCT'] = true;
    $arItem['PRICE'] = price($arItem['ITEM_ID']);
    $arItem['PRICE_NUMBER'] = price($arItem['ITEM_ID']);


    $arSelect = Array("ID", "NAME", "DATE_ACTIVE_FROM", "PREVIEW_PICTURE");
    $arFilter = Array("IBLOCK_ID" => 21,"ID" => $arItem['ITEM_ID'],"ACTIVE"=>"Y");
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    if($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        $arItem['PICTURE'] = CFile::GetPath($arFields['PREVIEW_PICTURE']);
    }
    $element = CIBlockElement::GetByID($arItem['ITEM_ID'])->Fetch();

    $arChain = array();
    $arSect['IBLOCK_SECTION_ID'] = $element['IBLOCK_SECTION_ID'];
    while ($arSect['IBLOCK_SECTION_ID']>0)
    {
        $arSect = GetIblockSection($arSect['IBLOCK_SECTION_ID']);
        $arChain[] = '<a href="'.$arSect['SECTION_PAGE_URL'].'">'.$arSect['NAME'].'</a>';
    }
    $arItem['CHAIN'] = $arChain;
}