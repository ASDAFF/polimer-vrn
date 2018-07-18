<?php

function price($id){
    $ar_res_price = CPrice::GetBasePrice($id, false, false);
    if($ar_res_price['PRICE']){
        return $ar_res_price['PRICE'];
    }else{
        return false;
    }

}
function priceDiscount($id){
    global $USER;
    $ar_res_price = CCatalogProduct::GetOptimalPrice($id, 1, $USER->GetUserGroupArray(), 'N');
    if($ar_res_price['DISCOUNT_PRICE']){
        return $ar_res_price['DISCOUNT_PRICE'];
    }else{
        return false;
    }
}

function getUrlProd($url){
    if($url){
        $code = explode('/',$url);
        if($code[3]){
            $code = $code[3];
        }else{
           $code = $code[2];
        }

        if(CModule::IncludeModule("iblock")) {
            $arSelect = Array("ID", "IBLOCK_ID","DETAIL_PAGE_URL","PREVIEW_PICTURE","DETAIL_PICTURE", "NAME", "PROPERTY_*");//IBLOCK_ID и ID обязательно должны быть указаны, см. описание arSelectFields выше
            $arFilter = Array("IBLOCK_ID" => 21, "CODE" => $code);
            $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
            if($ob = $res->GetNextElement()) {
                $arFields = $ob->GetFields();
                $arProps = $ob->GetProperties();
                $arResults = array_merge($arFields,$arProps);
                return $arResults;
            }
        }
    }

}

AddEventHandler("main", "OnEpilog", "Redirect404");
function Redirect404() {
    if(
        !defined('ADMIN_SECTION') &&
        defined("ERROR_404") &&
        defined("PATH_TO_404") &&
        file_exists($_SERVER["DOCUMENT_ROOT"].PATH_TO_404)
    ) {

        //LocalRedirect("/404.php", "404 Not Found");
        global $APPLICATION;
        global $USER;
        $APPLICATION->RestartBuffer();

        CHTTP::SetStatus("404 Not Found");
        include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/header.php");
        include($_SERVER["DOCUMENT_ROOT"].PATH_TO_404);
        include($_SERVER["DOCUMENT_ROOT"].SITE_TEMPLATE_PATH."/footer.php");
    }
}


\Bitrix\Main\EventManager::getInstance()->addEventHandler(
    'sale',
    'OnSaleStatusOrderChange',
    'StatusOrderChange'
);

function StatusOrderChange(\Bitrix\Main\Event $event)
{
    $status = $event->getParameter("ENTITY");

    if($status->getField('STATUS_ID') == "F"){
        $user_id = $status->getField('USER_ID');
        $rsUser = CUser::GetByID($user_id);
        if($arUser = $rsUser->Fetch()){
        $user_name = $arUser['NAME'].' '.$arUser['LAST_NAME'];
        $user_email = $arUser['EMAIL'];
        }
        $order_id = $status->getField('ID');

        if ($arOrder = CSaleOrder::GetByID($order_id))
        {
            $date_status = $arOrder['DATE_STATUS'];
        }

        $arFields = array(
            "USER_NAME" => $user_name,
            "USER_EMAIL" => $user_email,
            "ORDER_ID" => $order_id,
            "ORDER_DATE" => $date_status
        );
        CEvent::Send("ORDER_COMPLETED", "s1", $arFields);
    }
}