<?php
/**
 * Bitrix Framework
 * @package bitrix
 * @subpackage socialnetwork
 * @copyright 2001-2017 Bitrix
 */
namespace Bitrix\Socialnetwork;

use Bitrix\Main\Entity;

class LogTagTable extends Entity\DataManager
{
	public static function getTableName()
	{
		return 'b_sonet_log_tag';
	}

	public static function getMap()
	{
		return array(
			'LOG_ID' => array(
				'data_type' => 'integer',
				'primary' => true
			),
			'LOG' => array(
				'data_type' => '\Bitrix\Socialnetwork\Log',
				'reference' => array('=this.LOG_ID' => 'ref.ID')
			),
			'NAME' => array(
				'data_type' => 'string',
				'primary' => true
			)
		);
	}

	public static function deleteByLogId($params = array())
	{
		if (
			!is_array($params)
			|| empty($params['logId'])
			|| intval($params['logId']) <= 0
		)
		{
			return false;
		}

		\Bitrix\Main\Application::getConnection()->queryExecute('DELETE FROM '.self::getTableName().' WHERE LOG_ID='.intval($params['logId']));
		return true;
	}

	public static function set($params = array())
	{
		if (
			!is_array($params)
			|| empty($params['logId'])
			|| intval($params['logId']) <= 0
			|| !isset($params['tags'])
			|| !is_array($params['tags'])
		)
		{
			return false;
		}

		self::deleteByLogId(array(
			'logId' => intval($params['logId'])
		));

		foreach($params['tags'] as $tag)
		{
			self::add(array(
				'LOG_ID' => intval($params['logId']),
				'NAME' => $tag
			));
		}

		return true;
	}
}
