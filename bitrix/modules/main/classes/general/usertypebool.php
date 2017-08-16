<?
IncludeModuleLangFile(__FILE__);

class CUserTypeBoolean
{
	function GetUserTypeDescription()
	{
		return array(
			"USER_TYPE_ID" => "boolean",
			"CLASS_NAME" => "CUserTypeBoolean",
			"DESCRIPTION" => GetMessage("USER_TYPE_BOOL_DESCRIPTION"),
			"BASE_TYPE" => "int",
		);
	}

	function GetDBColumnType($arUserField)
	{
		global $DB;
		switch(strtolower($DB->type))
		{
			case "mysql":
				return "int(18)";
			case "oracle":
				return "number(18)";
			case "mssql":
				return "int";
		}
	}

	function PrepareSettings($arUserField)
	{
		$def = $arUserField["SETTINGS"]["DEFAULT_VALUE"];
		if($def!=1)
			$def = 0;
		$disp = $arUserField["SETTINGS"]["DISPLAY"];
		if($disp!="CHECKBOX" && $disp!="RADIO" && $disp!="DROPDOWN")
			$dist = "CHECKBOX";
		return array(
			"DEFAULT_VALUE" => $def,
			"DISPLAY" => $disp,
		);
	}

	function GetSettingsHTML($arUserField = false, $arHtmlControl, $bVarsFromForm)
	{
		$result = '';
		if($bVarsFromForm)
			$value = intval($GLOBALS[$arHtmlControl["NAME"]]["DEFAULT_VALUE"]);
		elseif(is_array($arUserField))
			$value = intval($arUserField["SETTINGS"]["DEFAULT_VALUE"]);
		else
			$value = 1;
		$result .= '
		<tr>
			<td>'.GetMessage("USER_TYPE_BOOL_DEFAULT_VALUE").':</td>
			<td>
				<select name="'.$arHtmlControl["NAME"].'[DEFAULT_VALUE]">
				<option value="1" '.($value? 'selected="selected"': '').'>'.GetMessage("MAIN_YES").'</option>
				<option value="0" '.(!$value? 'selected="selected"': '').'>'.GetMessage("MAIN_NO").'</option>
				</select>
			</td>
		</tr>
		';
		if($bVarsFromForm)
			$value = $GLOBALS[$arHtmlControl["NAME"]]["DISPLAY"];
		elseif(is_array($arUserField))
			$value = $arUserField["SETTINGS"]["DISPLAY"];
		else
			$value = "CHECKBOX";
		$result .= '
		<tr>
			<td class="adm-detail-valign-top">'.GetMessage("USER_TYPE_BOOL_DISPLAY").':</td>
			<td>
				<label><input type="radio" name="'.$arHtmlControl["NAME"].'[DISPLAY]" value="CHECKBOX" '.("CHECKBOX"==$value? 'checked="checked"': '').'>'.GetMessage("USER_TYPE_BOOL_CHECKBOX").'</label><br>
				<label><input type="radio" name="'.$arHtmlControl["NAME"].'[DISPLAY]" value="RADIO" '.("RADIO"==$value? 'checked="checked"': '').'>'.GetMessage("USER_TYPE_BOOL_RADIO").'</label><br>
				<label><input type="radio" name="'.$arHtmlControl["NAME"].'[DISPLAY]" value="DROPDOWN" '.("DROPDOWN"==$value? 'checked="checked"': '').'>'.GetMessage("USER_TYPE_BOOL_DROPDOWN").'</label><br>
			</td>
		</tr>
		';
		return $result;
	}

	function GetEditFormHTML($arUserField, $arHtmlControl)
	{
		if($arUserField["ENTITY_VALUE_ID"]<1)
			$arHtmlControl["VALUE"] = intval($arUserField["SETTINGS"]["DEFAULT_VALUE"]);
		switch($arUserField["SETTINGS"]["DISPLAY"])
		{
			case "DROPDOWN":
				$arHtmlControl["VALIGN"] = "middle";
				return '
					<select name="'.$arHtmlControl["NAME"].'"'.($arUserField["EDIT_IN_LIST"]!="Y"? ' disabled="disabled"': '').'>
					<option value="1"'.($arHtmlControl["VALUE"]? ' selected': '').'>'.GetMessage("MAIN_YES").'</option>
					<option value="0"'.(!$arHtmlControl["VALUE"]? ' selected': '').'>'.GetMessage("MAIN_NO").'</option>
					</select>
				';
			case "RADIO":
				return '
					<label><input type="radio" value="1" name="'.$arHtmlControl["NAME"].'"'.($arHtmlControl["VALUE"]? ' checked': '').($arUserField["EDIT_IN_LIST"]!="Y"? ' disabled="disabled"': '').'>'.GetMessage("MAIN_YES").'</label><br>
					<label><input type="radio" value="0" name="'.$arHtmlControl["NAME"].'"'.(!$arHtmlControl["VALUE"]? ' checked': '').($arUserField["EDIT_IN_LIST"]!="Y"? ' disabled="disabled"': '').'>'.GetMessage("MAIN_NO").'</label>
				';
			default:
				$arHtmlControl["VALIGN"] = "middle";
				return '
					<input type="hidden" value="0" name="'.$arHtmlControl["NAME"].'">
					<input type="checkbox" value="1" name="'.$arHtmlControl["NAME"].'"'.($arHtmlControl["VALUE"]? ' checked': '').' id="'.$arHtmlControl["NAME"].'"'.($arUserField["EDIT_IN_LIST"]!="Y"? ' disabled="disabled"': '').'>
				';
		}
	}
	//Boolean type intentionally made only single valued.
	//There are some code commented out in this method which is a try to implement multiple values editing
	function GetEditFormHTMLMulty($arUserField, $arHtmlControl)
	{
		$FIELD_NAME_X = str_replace('_', 'x', $arUserField["FIELD_NAME"]);
		$form_value = $arHtmlControl["VALUE"];
		if (!is_array($form_value))
			$form_value = array($form_value);
		foreach ($form_value as $key=>$value)
		{
			$form_value[$key] = intval($value);
		}
		if (!$form_value)
			$form_value[] = intval($arUserField["SETTINGS"]["DEFAULT_VALUE"]);

		$html = '';
		foreach ($form_value as $i => $value)
		{
			$arHtmlControl["VALUE"] = $value;
			/*
			$id = $FIELD_NAME_X.'_'.$i;
			$html .= '<tr id="'.$id.'"><td>'
			 */
			$html .= self::GetEditFormHTML($arUserField, array(
				"NAME" => $arUserField["FIELD_NAME"]."[".$i."]",
				"VALUE" => $value,
			));
			/*
			if ($i > 0)
				$html .= '<a class="bx-action-href" href="javascript:BX(\''.$id.'\').parentNode.removeChild(BX(\''.$id.'\'))">'.GetMessage("MAIN_DELETE").'<a/>';
			else
				$html .= '&nbsp;';
			$html .= '</td></tr>';
			*/
			break;
		}
		return $html;
		/*
		return '<table id="table_'.$arUserField["FIELD_NAME"].'" width="10%">'.$html.
		'<tr><td style="padding-top: 6px;"><input type="button" value="'.GetMessage("USER_TYPE_PROP_ADD").'" onClick="addNewRow(\'table_'.$arUserField["FIELD_NAME"].'\', \''.$FIELD_NAME_X.'|'.$arUserField["FIELD_NAME"].'|'.$arUserField["FIELD_NAME"].'_old_id\')"></td></tr>'.
		"<script type=\"text/javascript\">BX.addCustomEvent('onAutoSaveRestore', function(ob, data) {for (var i in data){if (i.substring(0,".(strlen($arUserField['FIELD_NAME'])+1).")=='".CUtil::JSEscape($arUserField['FIELD_NAME'])."['){".
		'addNewRow(\'table_'.$arUserField["FIELD_NAME"].'\', \''.$FIELD_NAME_X.'|'.$arUserField["FIELD_NAME"].'|'.$arUserField["FIELD_NAME"].'_old_id\')'.
		"}}})</script>".
		'</table>'
		;
		*/
	}

	function GetFilterHTML($arUserField, $arHtmlControl)
	{
		return '
			<select name="'.$arHtmlControl["NAME"].'">
			<option value=""'.(strlen($arHtmlControl["VALUE"])<1? ' selected': '').'>'.GetMessage("MAIN_ALL").'</option>
			<option value="1"'.($arHtmlControl["VALUE"]? ' selected': '').'>'.GetMessage("MAIN_YES").'</option>
			<option value="0"'.(strlen($arHtmlControl["VALUE"])>0 && !$arHtmlControl["VALUE"]? ' selected': '').'>'.GetMessage("MAIN_NO").'</option>
			</select>
		';
	}

	function GetFilterData($arUserField, $arHtmlControl)
	{
		return array(
			"id" => $arHtmlControl["ID"],
			"name" => $arHtmlControl["NAME"],
			"type" => "list",
			"items" => array(
				"1" => GetMessage("MAIN_YES"),
				"0" => GetMessage("MAIN_NO")
			),
			"filterable" => ""
		);
	}

	function GetAdminListViewHTML($arUserField, $arHtmlControl)
	{
		if($arHtmlControl["VALUE"])
			return GetMessage("MAIN_YES");
		else
			return GetMessage("MAIN_NO");
	}

	function GetAdminListEditHTML($arUserField, $arHtmlControl)
	{
		return '
			<input type="hidden" value="0" name="'.$arHtmlControl["NAME"].'">
			<input type="checkbox" value="1" name="'.$arHtmlControl["NAME"].'"'.($arHtmlControl["VALUE"]? ' checked': '').'>
		';
	}

	function OnBeforeSave($arUserField, $value)
	{
		if($value)
			return 1;
		else
			return 0;
	}
}
?>