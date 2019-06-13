<?
namespace Bitrix\Calendar\Controller;

use Bitrix\Main\Text\Encoding;
use Bitrix\Main\Error;
use \Bitrix\Main\Engine\Response;
use Bitrix\Main\Localization\Loc;

Loc::loadMessages(__FILE__);

/**
 * Class CalendarAjax
 */
class CalendarAjax extends \Bitrix\Main\Engine\Controller
{
	public function configureActions()
	{
		return [
			'getTimezoneList' => [
				'-prefilters' => [
					\Bitrix\Main\Engine\ActionFilter\Authentication::class
				]
			]
		];
	}

	public function getTimezoneListAction()
	{
		$timezones = \CCalendar::getTimezoneList();
		$defaultTimezone = \CCalendar::GetGoodTimezoneForOffset(\CCalendar::GetCurrentOffsetUTC(\CCalendar::GetCurUserId()));
		if (isset($timezones[$defaultTimezone]))
		{
			$timezones[$defaultTimezone]['default'] = true;
		}

		return $timezones;
	}
}