<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (!function_exists('PrintPropsForm'))
{
	function PrintPropsForm($arSource=Array(), $PRINT_TITLE = "", $arParams)
	{
		if (!empty($arSource))
		{


			foreach($arSource as $arProperties)
			{


						if($arProperties["TYPE"] == "CHECKBOX")
						{
							?>
							<input type="checkbox" name="<?=$arProperties["FIELD_NAME"]?>" value="Y"<?if ($arProperties["CHECKED"]=="Y") echo " checked";?>>
							<?
						}
						elseif($arProperties["TYPE"] == "TEXT")
						{
							?>
					<div class="line">
						<span><?=$arProperties["NAME"]; if($arProperties["REQUIED_FORMATED"]=="Y"){print "*";}?></span>
						<div class="inp">
							<input type="text" maxlength="250" size="<?=$arProperties["SIZE1"]?>" value="<?=$arProperties["VALUE"]?>" name="<?=$arProperties["FIELD_NAME"]?>">
						</div>
					</div>
							<?
						}
						elseif($arProperties["TYPE"] == "SELECT")
						{
							?>
							<select name="<?=$arProperties["FIELD_NAME"]?>" size="<?=$arProperties["SIZE1"]?>">
							<?
							foreach($arProperties["VARIANTS"] as $arVariants)
							{
								?>
								<option value="<?=$arVariants["VALUE"]?>"<?if ($arVariants["SELECTED"] == "Y") echo " selected";?>><?=$arVariants["NAME"]?></option>
								<?
							}
							?>
							</select>
							<?
						}
						elseif ($arProperties["TYPE"] == "MULTISELECT")
						{
							?>
							<select multiple name="<?=$arProperties["FIELD_NAME"]?>" size="<?=$arProperties["SIZE1"]?>">
							<?
							foreach($arProperties["VARIANTS"] as $arVariants)
							{
								?>
								<option value="<?=$arVariants["VALUE"]?>"<?if ($arVariants["SELECTED"] == "Y") echo " selected";?>><?=$arVariants["NAME"]?></option>
								<?
							}
							?>
							</select>
							<?
						}
						elseif ($arProperties["TYPE"] == "TEXTAREA")
						{
							?>
							<div class="line">
								<span><?=$arProperties["NAME"]; if($arProperties["REQUIED_FORMATED"]=="Y"){print "*";}?></span>
								<div class="tex">
									<textarea rows="<?=$arProperties["SIZE2"]?>" cols="<?=$arProperties["SIZE1"]?>" name="<?=$arProperties["FIELD_NAME"]?>"><?=$arProperties["VALUE"]?></textarea>
								</div>
							</div>

							<?
						}
						elseif ($arProperties["TYPE"] == "LOCATION")
						{
							$value = 0;
							foreach ($arProperties["VARIANTS"] as $arVariant)
							{
								if ($arVariant["SELECTED"] == "Y")
								{
									$value = $arVariant["ID"];
									break;
								}
							}

							if ($arParams["USE_AJAX_LOCATIONS"] == "Y"):

								CSaleLocation::proxySaleAjaxLocationsComponent(
									array(
										"AJAX_CALL" => "N",
										"COUNTRY_INPUT_NAME" => "COUNTRY_".$arProperties["FIELD_NAME"],
										"REGION_INPUT_NAME" => "REGION_".$arProperties["FIELD_NAME"],
										"CITY_INPUT_NAME" => $arProperties["FIELD_NAME"],
										"CITY_OUT_LOCATION" => "Y",
										"LOCATION_VALUE" => $value,
										"ORDER_PROPS_ID" => $arProperties["ID"],
										"ONCITYCHANGE" => "",
									),
									array(
										"ID" => $value,
										"CODE" => "",
										"PROVIDE_LINK_BY" => "id",
									)
								);

							else:
							?>
							<select name="<?=$arProperties["FIELD_NAME"]?>" size="<?=$arProperties["SIZE1"]?>">
							<?
							foreach($arProperties["VARIANTS"] as $arVariants)
							{
								?>
								<option value="<?=$arVariants["ID"]?>"<?if ($arVariants["SELECTED"] == "Y") echo " selected";?>><?=$arVariants["NAME"]?></option>
								<?
							}
							?>
							</select>
							<?
							endif;
						}
						elseif ($arProperties["TYPE"] == "RADIO")
						{
							foreach($arProperties["VARIANTS"] as $arVariants)
							{
								?>
								<input type="radio" name="<?=$arProperties["FIELD_NAME"]?>" id="<?=$arProperties["FIELD_NAME"]?>_<?=$arVariants["ID"]?>" value="<?=$arVariants["VALUE"]?>"<?if($arVariants["CHECKED"] == "Y") echo " checked";?>> <label for="<?=$arProperties["FIELD_NAME"]?>_<?=$arVariants["ID"]?>"><?=$arVariants["NAME"]?></label><br />
								<?
							}
						}

						if (strlen($arProperties["DESCRIPTION"]) > 0)
						{
							?><br /><small><?echo $arProperties["DESCRIPTION"] ?></small><?
						}
						?>


				<?
			}

			return true;
		}
		return false;
	}
}
?>

<div class="or__back2shopping">
	<a href="#">Вернуться к покупкам</a>
</div>
<div class="or__stages cl">
	<div class="stage s1 active"><span>1</span><div class="text">Контактная <br>информация</div></div>
	<div class="stage s2"><span>2</span><div class="text">Cпособ <br>получения</div></div>
	<div class="stage s3"><span>3</span><div class="text">Способ <br>оплаты</div></div>
	<div class="stage s4"><span>4</span><div class="text">Подтверждение <br>заказа</div></div>
</div>

<div class="or__content cl s2">

	<div class="title">Выберите удобный способ получения заказа</div>
	<div class="methods cl">
		<?foreach($arResult["DELIVERY"] as $arDelivery):?>
		<a href="#" class="meth <?if ($arDelivery["CHECKED"]=="Y") echo "active";?>">
			<div class="inner">
				<?=$arDelivery['NAME']?><span><?=$arDelivery['DESCRIPTION']?></span>
			</div>
			<input style="display:none" type="radio" class="<?if ($arDelivery["CHECKED"]=="Y") echo "active";?>" id="ID_DELIERY_ID_<?= $arDelivery["ID"] ?>" name="<?=$arDelivery["FIELD_NAME"]?>" value="<?= $arDelivery["ID"] ?>" <?if ($arDelivery["CHECKED"]=="Y") echo "checked";?>>
		</a>
		<?endforeach;?>
	</div>

	<div class="methods_detail">
			<?
			$bPropsPrinted = PrintPropsForm($arResult["PRINT_PROPS_FORM"]["USER_PROPS_N"], GetMessage("SALE_INFO2ORDER"), $arParams);

			if(!empty($arResult["USER_PROFILES"]))
			{

			}
			else
			{
				?><input type="hidden" name="PROFILE_ID" value="0"><?
			}
			?>


									<div class="group">
			<?
			PrintPropsForm($arResult["PRINT_PROPS_FORM"]["USER_PROPS_Y"], GetMessage("SALE_NEW_PROFILE_TITLE"), $arParams);
			?>
									</div>

			<?
			if ($arResult["USER_PROFILES_TO_FILL"]=="Y")
			{
				?>
				<script language="JavaScript">
					SetContact(<?echo ($arResult["USER_PROFILES_TO_FILL_VALUE"]=="Y" || $arResult["PROFILE_ID"] == "0")?"true":"false";?>);
				</script>
				<?
			}
			?>





									<div class="controls cl">
										<?if(!($arResult["SKIP_FIRST_STEP"] == "Y"))
										{
											?>
											<input type="submit" class="control prev" name="backButton" value="<?echo GetMessage("SALE_BACK_BUTTON")?>">
											<?
										}
										?>
										<input type="submit" name="contButton" class="control next" value="<?= GetMessage("SALE_CONTINUE")?>">
									</div>
	</div>
</div>