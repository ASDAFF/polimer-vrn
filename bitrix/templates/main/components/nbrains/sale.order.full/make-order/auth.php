<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>




<div class="or__back2shopping">
	<a href="/basket/">Вернуться к покупкам</a>
</div>

<div class="or__stages cl">
	<div class="stage s1 active"><span>1</span><div class="text">Контактная <br>информация</div></div>
	<div class="stage s2"><span>2</span><div class="text">Cпособ <br>получения</div></div>
	<div class="stage s3"><span>3</span><div class="text">Способ <br>оплаты</div></div>
	<div class="stage s4"><span>4</span><div class="text">Подтверждение <br>заказа</div></div>
</div>


<div class="or__content cl s1">
	<div class="column">
		<div class="title">Личный кабинет</div>
		<div class="form_login">

			<form method="post" action="<?= $arParams["PATH_TO_ORDER"] ?>" name="order_auth_form">
				<?=bitrix_sessid_post()?>

			<div class="line"><span>Логин</span>
				<input type="text" name="USER_LOGIN" maxlength="30" size="30" value="<?=$arResult["USER_LOGIN"]?>">
			</div>

			<div class="line"><span>Пароль</span>
				<input type="password" name="USER_PASSWORD" maxlength="30" size="30">
			</div>

				<input type="submit" class="login_enter" value="Войти">
				<input type="hidden" name="do_authorize" value="Y">

			<a href="<?=$arParams["PATH_TO_AUTH"]?>?forgot_password=yes&back_url=<?= urlencode($arParams["PATH_TO_ORDER"]); ?>" class="remind_pass">Напомнить пароль</a>

			<div class="login_social cl">
				<span>Войти через социальные сети</span>
				<a href="#" class="go"></a>
				<a href="#" class="tw"></a>
				<a href="#" class="vk"></a>
				<a href="#" class="rs"></a>
				<a href="#" class="fb"></a>
				<a href="#" class="ok"></a>
			</div>

			</form>

		</div>
	</div>

	<div class="column">
		<div class="title">Регистрация на сайте</div>
		<a href="#" class="back2enter">Авторизация</a>
		<div class="form_registration">
			<div class="face_type">
				<label>
					<input type="radio" name="face" checked>
					<span>Физическое лицо</span>
				</label>
				<label>
					<input type="radio" name="face">
					<span>Юридическое лицо</span>
				</label>
			</div>
			<div class="line"><span>Фамилия</span>
				<input type="text">
			</div>
			<div class="line"><span>Имя</span>
				<input type="text">
			</div>
			<div class="line"><span>E-mail</span>
				<input type="text">
			</div>
			<div class="line"><span>Телефон</span>
				<span class="se7en">+7</span>
				<input type="text" class="phone_code">
				<input type="text" class="phone_number">
				<span class="tip">Введите 10 цифр, например 987 123 45 67</span></div>
			<div class="line"><span>Пароль</span>
				<input type="text" class="pass">
			</div>
			<div class="line pass_rep">
				<span>Повтор <br>пароля</span>
				<input type="text" class="pass">
				<span class="req">Пароль должен содержать не менее 6 символов ,  кроме спец. символов и кириллицы</span>
			</div>
			<div class="agent">
				<label>
					<input type="checkbox" name="face">
					<span>Я &mdash; представитель юридического лица или ИП</span>
				</label>
			</div>
			<a href="step2.php" class="registrate" onclick="return false">Зарегистрироваться</a>
		</div>
	</div>
</div>


<table border="0" cellspacing="0" cellpadding="1">
	<tr>
		<td width="45%" valign="top">
			<?if($arResult["AUTH"]["new_user_registration"]=="Y"):?>
				<b><?echo GetMessage("STOF_2REG")?></b>
			<?endif;?>
		</td>
		<td width="10%">&nbsp;</td>
		<td width="45%" valign="top">
			<?if($arResult["AUTH"]["new_user_registration"]=="Y"):?>
				<b><?echo GetMessage("STOF_2NEW")?></b>
			<?endif;?>
		</td>
	</tr>
	<tr>
		<td valign="top">
			<table class="sale_order_full_table">

			</table>
		</td>
		<td>&nbsp;</td>
		<td valign="top">
			<?if($arResult["AUTH"]["new_user_registration"]=="Y"):?>
				<form method="post" action="<?= $arParams["PATH_TO_ORDER"]?>" name="order_reg_form">
					<?=bitrix_sessid_post()?>
					<table class="sale_order_full_table">
						<tr>
							<td nowrap>
								<?echo GetMessage("STOF_NAME")?> <span class="sof-req">*</span><br />
								<input type="text" name="NEW_NAME" size="40" value="<?=$arResult["POST"]["NEW_NAME"]?>">&nbsp;&nbsp;&nbsp;
							</td>
						</tr>
						<tr>
							<td nowrap>
								<?echo GetMessage("STOF_LASTNAME")?> <span class="sof-req">*</span><br />
								<input type="text" name="NEW_LAST_NAME" size="40" value="<?=$arResult["POST"]["NEW_LAST_NAME"]?>">&nbsp;&nbsp;&nbsp;
							</td>
						</tr>
						<tr>
							<td nowrap>
								E-Mail <span class="sof-req">*</span><br />
								<input type="text" name="NEW_EMAIL" size="40" value="<?=$arResult["POST"]["NEW_EMAIL"]?>">&nbsp;&nbsp;&nbsp;
							</td>
						</tr>
						<?if($arResult["AUTH"]["new_user_registration_email_confirmation"] != "Y"):?>
						<tr>
							<td nowrap><input type="radio" id="NEW_GENERATE_N" name="NEW_GENERATE" value="N" OnClick="ChangeGenerate(false)"<?if ($arResult["POST"]["NEW_GENERATE"] == "N") echo " checked";?>> <label for="NEW_GENERATE_N"><?echo GetMessage("STOF_MY_PASSWORD")?></label></td>
						</tr>
						<?endif;?>
						<?if($arResult["AUTH"]["new_user_registration_email_confirmation"] != "Y"):?>
						<tr>
							<td>
								<div id="sof_choose_login">
									<table>
						<?endif;?>
										<tr>
											<?if($arResult["AUTH"]["new_user_registration_email_confirmation"] != "Y"):?>
											<td width="0%">&nbsp;&nbsp;&nbsp;</td>
											<?endif;?>
											<td>
												<?echo GetMessage("STOF_LOGIN")?> <span class="sof-req">*</span><br />
												<input type="text" name="NEW_LOGIN" size="30" value="<?=$arResult["POST"]["NEW_LOGIN"]?>">
											</td>
										</tr>
										<tr>
											<?if($arResult["AUTH"]["new_user_registration_email_confirmation"] != "Y"):?>
											<td width="0%">&nbsp;&nbsp;&nbsp;</td>
											<?endif;?>
											<td>
												<?echo GetMessage("STOF_PASSWORD")?> <span class="sof-req">*</span><br />
												<input type="password" name="NEW_PASSWORD" size="30">
											</td>
										</tr>
										<tr>
											<?if($arResult["AUTH"]["new_user_registration_email_confirmation"] != "Y"):?>
											<td width="0%">&nbsp;&nbsp;&nbsp;</td>
											<?endif;?>
											<td>
												<?echo GetMessage("STOF_RE_PASSWORD")?> <span class="sof-req">*</span><br />
												<input type="password" name="NEW_PASSWORD_CONFIRM" size="30">
											</td>
										</tr>
						<?if($arResult["AUTH"]["new_user_registration_email_confirmation"] != "Y"):?>
									</table>
								</div>
							</td>
						</tr>
						<?endif;?>
						<?if($arResult["AUTH"]["new_user_registration_email_confirmation"] != "Y"):?>
						<tr>
							<td>
								<input type="radio" id="NEW_GENERATE_Y" name="NEW_GENERATE" value="Y" OnClick="ChangeGenerate(true)"<?if ($arResult["POST"]["NEW_GENERATE"] != "N") echo " checked";?>> <label for="NEW_GENERATE_Y"><?echo GetMessage("STOF_SYS_PASSWORD")?></label>
								<script language="JavaScript">
								<!--
								ChangeGenerate(<?= (($arResult["POST"]["NEW_GENERATE"] != "N") ? "true" : "false") ?>);
								//-->
								</script>
							</td>
						</tr>
						<?endif;?>
						<?
						if($arResult["AUTH"]["captcha_registration"] == "Y") //CAPTCHA
						{
							?>
							<tr>
								<td><br /><b><?=GetMessage("CAPTCHA_REGF_TITLE")?></b></td>
							</tr>
							<tr>
								<td>
									<input type="hidden" name="captcha_sid" value="<?=$arResult["AUTH"]["capCode"]?>">
									<img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["AUTH"]["capCode"]?>" width="180" height="40" alt="CAPTCHA">
								</td>
							</tr>
							<tr valign="middle">
								<td>
									<span class="sof-req">*</span><?=GetMessage("CAPTCHA_REGF_PROMT")?>:<br />
									<input type="text" name="captcha_word" size="30" maxlength="50" value="">
								</td>
							</tr>
							<?
						}
						?>
						<tr>
							<td align="center">
								<input type="submit" value="<?echo GetMessage("STOF_NEXT_STEP")?>">
								<input type="hidden" name="do_register" value="Y">
							</td>
						</tr>
					</table>
				</form>
			<?endif;?>
		</td>
	</tr>
</table>
<br /><br />
<?echo GetMessage("STOF_REQUIED_FIELDS_NOTE")?><br /><br />
<?if($arResult["AUTH"]["new_user_registration"]=="Y"):?>
	<?echo GetMessage("STOF_EMAIL_NOTE")?><br /><br />
<?endif;?>
<?echo GetMessage("STOF_PRIVATE_NOTES")?>
