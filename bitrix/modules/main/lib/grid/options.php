<?

namespace Bitrix\Main\Grid;


/**
 * Class Options of main.ui.grid
 * @package Bitrix\Main\Grid
 */
class Options extends \CGridOptions
{

	/**
	 * Sets width of grid columns
	 * @param number $expand
	 * @param array $sizes
	 */
	public function setColumnsSizes($expand, $sizes)
	{
		$columns = array();
		foreach ((array) $sizes as $name => $width)
		{
			$name  = trim($name);
			$width = is_scalar($width) ? (int) $width : 0;
			if ($name != '' && $width > 0)
				$columns[$name] = $width;
		}

		$this->all_options['views'][$this->currentView]['columns_sizes'] = array(
			'expand'  => is_scalar($expand) ? round((float) $expand, 8) : 1,
			'columns' => $columns
		);
	}


	/**
	 * Sets page size
	 * @param int $size
	 */
	public function setPageSize($size)
	{
		$size = is_scalar($size) ? (int) $size : 20;
		$size = $size >= 0 ? $size : 20;

		$this->all_options['views'][$this->currentView]['page_size'] = $size;
	}


	/**
	 * Sets custom names of grid columns
	 * @param array $names
	 */
	public function setCustomNames($names)
	{
		$this->all_options["views"]["default"]["custom_names"] = $names;
	}


	/**
	 * Resets saved expanded ids of rows
	 */
	public function resetExpandedRows()
	{
		$this->setExpandedRows();
	}


	/**
	 * Sets ids of expanded rows
	 * @param array [$ids = array()]
	 */
	public function setExpandedRows($ids = array())
	{
		$_SESSION["main.ui.grid"][$this->grid_id]["expanded_rows"] = $ids;
	}


	/**
	 * Gets ids of expanded rows
	 * @return array|null
	 */
	public function getExpandedRows()
	{
		return $_SESSION["main.ui.grid"][$this->grid_id]["expanded_rows"];
	}


	/**
	 * Sets collapsed groups
	 * @param array $ids
	 */
	public function setCollapsedGroups($ids = array())
	{
		$_SESSION["main.ui.grid"][$this->grid_id]["collapsed_groups"] = is_array($ids) ? $ids : array();
	}


	/**
	 * Gets ids of collapsed groups
	 * @return ?array
	 */
	public function getCollapsedGroups()
	{
		return $_SESSION["main.ui.grid"][$this->grid_id]["collapsed_groups"];
	}


	/**
	 * Resets view settings by view id
	 * @param string $viewId
	 */
	public function resetView($viewId)
	{
		$this->all_options["views"][$viewId] = array();
		unset($_SESSION["main.interface.grid"][$this->grid_id]);
		unset($_SESSION["main.ui.grid"][$this->grid_id]);
		$this->Save();
		parent::__construct($this->grid_id);
	}


	/**
	 * Deletes view settings by view id
	 * @param string $viewId
	 */
	public function deleteView($viewId)
	{
		unset($this->all_options["views"][$viewId]);
		unset($_SESSION["main.interface.grid"][$this->grid_id]);
		unset($_SESSION["main.ui.grid"][$this->grid_id]);
		$this->Save();
		parent::__construct($this->grid_id);
	}


	/**
	 * @return array
	 */
	public function getCurrentOptions()
	{
		$options = $this->getOptions();
		$currentViewId = $options["current_view"];
		return $options["views"][$currentViewId];
	}


	/**
	 * @return array
	 */
	private static function getDefaultGetSortingResult()
	{
		return array(
			"sort" => array(),
			"vars" => array(
				"by" => "by",
				"order" => "order"
			)
		);
	}


	/**
	 * Gets current grid sorting
	 * @param array [$default = array()] - Default value
	 * @return array
	 */
	public function getSorting($default = array())
	{
		$result = static::getDefaultGetSortingResult();
		$result["sort"] = is_array($default["sort"]) ? $default["sort"] : $result["sort"];
		$result["vars"] = is_array($default["vars"]) ? $default["vars"] : $result["vars"];

		$options = $this->getCurrentOptions();

		if (!empty($options["last_sort_by"]) && !empty($options["last_sort_order"]))
		{
			$result["sort"] = array($options["last_sort_by"] => $options["last_sort_order"]);
		}

		return $result;
	}

}