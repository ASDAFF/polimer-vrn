<?
namespace Bitrix\Lists\Entity;

use Bitrix\Lists\Service\Param;
use Bitrix\Main\Error;
use Bitrix\Main\Errorable;
use Bitrix\Main\ErrorCollection;
use Bitrix\Main\ErrorableImplementation;

class Section implements Controllable, Errorable
{
	use ErrorableImplementation;

	const ERROR_ADD_SECTION = "ERROR_ADD_SECTION";
	const ERROR_UPDATE_SECTION = "ERROR_UPDATE_SECTION";
	const ERROR_DELETE_SECTION = "ERROR_DELETE_SECTION";
	const ERROR_SECTION_NOT_FOUND = "ERROR_SECTION_NOT_FOUND";

	private $param;
	private $params = [];
	private $fieldList = [];
	private $filterList = [];
	private $selectList = [];

	private $errorCollection;

	public function __construct(Param $param)
	{
		$this->param = $param;
		$this->params = $param->getParams();

		$this->fieldList = ["ID", "CODE", "EXTERNAL_ID", "XML_ID", "IBLOCK_ID", "IBLOCK_SECTION_ID", "TIMESTAMP_X",
			"SORT", "NAME", "ACTIVE", "SORT", "PICTURE", "DESCRIPTION", "DESCRIPTION_TYPE", "MODIFIED_BY",
			"DATE_CREATE", "CREATED_BY", "DETAIL_PICTURE", "SECTION_PROPERTY"];

		$this->filterList = ["ACTIVE", "GLOBAL_ACTIVE", "NAME", "CODE", "XML_ID", "EXTERNAL_ID", "SECTION_ID",
			"DEPTH_LEVEL", "LEFT_BORDER", "RIGHT_BORDER", "LEFT_MARGIN", "RIGHT_MARGIN", "IBLOCK_ID", "ID",
			"IBLOCK_ACTIVE", "IBLOCK_NAME", "IBLOCK_TYPE", "IBLOCK_CODE", "IBLOCK_XML_ID", "IBLOCK_EXTERNAL_ID",
			"TIMESTAMP_X", "DATE_CREATE", "MODIFIED_BY", "CREATED_BY", "SOCNET_GROUP_ID", "MIN_PERMISSION",
			"CHECK_PERMISSIONS", "PERMISSIONS_BY", "PROPERTY"];

		$this->selectList = ["ID", "CODE", "EXTERNAL_ID", "XML_ID", "IBLOCK_ID", "IBLOCK_SECTION_ID", "TIMESTAMP_X",
			"SORT", "NAME", "ACTIVE", "GLOBAL_ACTIVE", "PICTURE", "DESCRIPTION", "DESCRIPTION_TYPE", "LEFT_MARGIN",
			"RIGHT_MARGIN", "DEPTH_LEVEL", "SEARCHABLE_CONTENT", "SECTION_PAGE_URL", "MODIFIED_BY", "DATE_CREATE",
			 "CREATED_BY", "DETAIL_PICTURE"];

		$this->errorCollection = new ErrorCollection;
	}

	/**
	 * Checks whether an section exists.
	 *
	 * @return bool
	 */
	public function isExist()
	{
		$filter = [
			"ID" => Utils::getSectionId($this->params),
			"CHECK_PERMISSIONS" => "N",
		];
		$queryObject = \CIBlockSection::getList([], $filter, false, ["ID"]);

		return (bool) $queryObject->fetch();
	}

	/**
	 * Adds an section.
	 *
	 * @return int|bool
	 */
	public function add()
	{
		$sectionObject = new \CIBlockSection;
		$result = $sectionObject->add($this->getFields());

		if ($result)
		{
			return (int)$result;
		}
		else
		{
			if ($sectionObject->LAST_ERROR)
			{
				$this->errorCollection->setError(new Error($sectionObject->LAST_ERROR, self::ERROR_ADD_SECTION));
			}
			else
			{
				$this->errorCollection->setError(new Error("Unknown error", self::ERROR_ADD_SECTION));
			}

			return false;
		}
	}

	/**
	 * Returns a list of section data.
	 *
	 * @param array $navData Navigation data.
	 *
	 * @return array
	 */
	public function get(array $navData = [])
	{
		$sections = [];

		$filter = $this->getFilter();

		$select = $this->getSelectList();

		$queryObject = \CIBlockSection::getList([], $filter, false, $select, $navData);
		while ($section = $queryObject->fetch())
		{
			$sections[] = $section;
		}

		return [$sections, $queryObject];
	}

	/**
	 * Updates an section.
	 *
	 * @return bool
	 */
	public function update()
	{
		$sectionObject = new \CIBlockSection;
		if ($sectionObject->update(Utils::getSectionId($this->params), $this->getFields()))
		{
			return true;
		}
		else
		{
			if ($sectionObject->LAST_ERROR)
			{
				$this->errorCollection->setError(new Error($sectionObject->LAST_ERROR, self::ERROR_UPDATE_SECTION));
			}
			else
			{
				$this->errorCollection->setError(new Error("Unknown error", self::ERROR_UPDATE_SECTION));
			}

			return false;
		}
	}

	/**
	 * Deletes an section.
	 *
	 * @return bool
	 */
	public function delete()
	{
		$sectionObject = new \CIBlockSection;
		if ($sectionObject->delete(Utils::getSectionId($this->params), false))
		{
			return true;
		}
		else
		{
			if ($sectionObject->LAST_ERROR)
			{
				$this->errorCollection->setError(new Error($sectionObject->LAST_ERROR, self::ERROR_DELETE_SECTION));
			}
			else
			{
				$this->errorCollection->setError(new Error("Unknown error", self::ERROR_DELETE_SECTION));
			}

			return false;
		}
	}

	private function getFields()
	{
		$fields = [
			"IBLOCK_ID" => Utils::getIblockId($this->params),
			"CODE" => $this->params["SECTION_CODE"],
			"IBLOCK_SECTION_ID" => $this->params["IBLOCK_SECTION_ID"] ? (int)$this->params["IBLOCK_SECTION_ID"] : 0,
			"CHECK_PERMISSIONS" => "N"
		];

		foreach ($this->params["FIELDS"] as $fieldId => $fieldValue)
		{
			if (!in_array($fieldId, $this->fieldList))
			{
				continue;
			}

			if ($fieldId == "PICTURE")
			{
				$fieldValue = \CRestUtil::saveFile($fieldValue);
			}

			$fields[$fieldId] = $fieldValue;
		}

		return $fields;
	}

	private function getFilter()
	{
		$filter = [
			"IBLOCK_ID" => Utils::getIblockId($this->params),
			"CHECK_PERMISSIONS" => "N",
		];

		if (!is_array($this->params["FILTER"]))
		{
			$this->params["FILTER"] = [];
		}

		foreach ($this->params["FILTER"] as $fieldId => $fieldValue)
		{
			if (in_array($fieldId, $this->filterList))
			{
				$filter[$fieldId] = $fieldValue;
			}
		}

		return $filter;
	}

	private function getSelectList()
	{
		$select = [];

		if (!is_array($this->params["SELECT"]))
		{
			$this->params["SELECT"] = [];
		}

		foreach ($this->params["SELECT"] as $fieldId)
		{
			if (in_array($fieldId, $this->selectList))
			{
				$select[] = $fieldId;
			}
		}

		return $select;
	}
}