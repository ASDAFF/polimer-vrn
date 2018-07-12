<?php

$curPage = $APPLICATION->GetCurPage().'?'.$arParams["ACTION_VARIABLE"].'=';
$arUrls = array(
    "delete" => $curPage."delete&id=#ID#",
    "delay" => $curPage."delay&id=#ID#",
    "add" => $curPage."add&id=#ID#",
);
unset($curPage);

$_SESSION['DISCOUNT_PRICE_ALL_FORMATED'] = $arResult["allSum"];
foreach($arResult["GRID"]["ROWS"] as $row){
    $precent[] = $row['DISCOUNT_PRICE_PERCENT_FORMATED'];
}
$_SESSION['DISCOUNT_PRICE_PERCENT_FORMATED'] = implode(',',$precent);