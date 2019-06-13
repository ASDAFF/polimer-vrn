<?
namespace Bitrix\Lists\Entity;

class Utils
{
	private static $iblockId = 0;
	private static $elementId = 0;
	private static $sectionId = 0;

	/**
	 * Returns an iblock id by code or id.
	 *
	 * @param array $params Incoming parameters.
	 *
	 * @return int
	 */
	public static function getIblockId(array $params)
	{
		if (self::$iblockId)
		{
			return self::$iblockId;
		}
		else
		{
			if ($params["IBLOCK_ID"])
			{
				self::$iblockId = (int) $params["IBLOCK_ID"];
				return self::$iblockId;
			}
			elseif ($params["IBLOCK_CODE"])
			{
				$queryObject = \CIBlock::getList([], [
					"CHECK_PERMISSIONS" => "N",
					"=CODE" => $params["IBLOCK_CODE"]
				]);
				if ($iblock = $queryObject->fetch())
				{
					self::$iblockId = (int) $iblock["ID"];
					return self::$iblockId;
				}
			}
		}

		return self::$iblockId;
	}

	/**
	 * Returns an element id by code or id.
	 *
	 * @param array $params Incoming parameters.
	 *
	 * @return int
	 */
	public static function getElementId(array $params)
	{
		if (self::$elementId)
		{
			return self::$elementId;
		}
		else
		{
			if ($params["ELEMENT_ID"])
			{
				self::$elementId = (int)$params["ELEMENT_ID"];
				return self::$elementId;
			}
			elseif ($params["ELEMENT_CODE"])
			{
				$queryObject = \CIBlockElement::getList([], [
					"IBLOCK_ID" => Utils::getIblockId($params),
					"CHECK_PERMISSIONS" => "N",
					"CODE" => $params["ELEMENT_CODE"]
				], false, false, ["ID"]);
				if ($element = $queryObject->fetch())
				{
					self::$elementId = (int) $element["ID"];
					return self::$elementId;
				}
			}
		}

		return self::$elementId;
	}

	/**
	 * Returns an section id by code or id.
	 *
	 * @param array $params Incoming parameters.
	 *
	 * @return int
	 */
	public static function getSectionId(array $params)
	{
		if (self::$sectionId)
		{
			return self::$sectionId;
		}
		else
		{
			if ($params["SECTION_ID"])
			{
				self::$sectionId = (int)$params["SECTION_ID"];
				return self::$sectionId;
			}
			elseif ($params["SECTION_CODE"])
			{
				$queryObject = \CIBlockSection::getList([], [
					"CHECK_PERMISSIONS" => "N",
					"CODE" => $params["SECTION_CODE"]
				], false, false, ["ID"]);
				if ($section = $queryObject->fetch())
				{
					self::$sectionId = (int) $section["ID"];
					return self::$sectionId;
				}
			}
		}

		return self::$sectionId;
	}
}