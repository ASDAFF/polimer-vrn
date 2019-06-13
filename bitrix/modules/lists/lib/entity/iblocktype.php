<?
namespace Bitrix\Lists\Entity;

use Bitrix\Lists\Service\Param;

class IblockType
{
	private $param;
	private $params = [];

	public function __construct(Param $param)
	{
		$this->param = $param;
		$this->params = $param->getParams();
	}

	public function getIblockTypeId()
	{
		$filter = ["CHECK_PERMISSIONS" => "Y"];

		if (empty($this->params["IBLOCK_ID"]))
		{
			$filter["=CODE"] = $this->params["IBLOCK_CODE"];
		}
		if (empty($this->params["IBLOCK_CODE"]))
		{
			$filter["=ID"] = $this->params["IBLOCK_ID"];
		}

		$queryObject = \CIBlock::getList([], $filter);
		if ($iblock = $queryObject->fetch())
		{
			return ($iblock["IBLOCK_TYPE_ID"] ? $iblock["IBLOCK_TYPE_ID"] : null);
		}
		else
		{
			return null;
		}
	}
}