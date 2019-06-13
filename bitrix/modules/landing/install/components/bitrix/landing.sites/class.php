<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true)
{
	die();
}

use \Bitrix\Landing\Domain;
use \Bitrix\Landing\Site;
use \Bitrix\Landing\Landing;
use \Bitrix\Landing\Rights;
use \Bitrix\Landing\Manager;
use \Bitrix\Landing\Zip;

\CBitrixComponent::includeComponentClass('bitrix:landing.base');
\CBitrixComponent::includeComponentClass('bitrix:landing.filter');

class LandingSitesComponent extends LandingBaseComponent
{
	/**
	 * Count items per page.
	 */
	const COUNT_PER_PAGE = 11;

	/**
	 * Base executable method.
	 * @return mixed
	 */
	public function executeComponent()
	{
		$init = $this->init();

		if ($init)
		{
			// params
			$b24 = Manager::isB24();
			$puny = new \CBXPunycode;
			$deletedLTdays = Manager::getDeletedLT();
			$this->checkParam('TYPE', '');
			$this->checkParam('PAGE_URL_SITE', '');
			$this->checkParam('PAGE_URL_SITE_EDIT', '');
			$this->checkParam('PAGE_URL_LANDING_EDIT', '');

			// template data
			$filter = LandingFilterComponent::getFilter(
				LandingFilterComponent::TYPE_SITE
			);
			$filter['=TYPE'] = $this->arParams['TYPE'];
			$this->arResult['EXPORT_ENABLED'] = Zip\Config::serviceEnabled() ? 'Y' : 'N';
			$this->arResult['EXPORT_PATH'] = Zip\Config::getExportPath();
			$this->arResult['IS_DELETED'] = LandingFilterComponent::isDeleted();
			$this->arResult['SITES'] = $this->getSites([
				'select' => [
					'*',
					'DOMAIN_NAME' => 'DOMAIN.DOMAIN'
				],
				'filter' => $filter,
				'order' => $this->arResult['IS_DELETED']
					? [
						'DATE_MODIFY' => 'desc'
					]
					: [
						'ID' => 'desc'
					],
				'navigation' => $this::COUNT_PER_PAGE
			]);
			$this->arResult['NAVIGATION'] = $this->getLastNavigation();

			// detect preview of sites and set rights
			$rights = Rights::getOperationsForSite(
				array_merge(
					array_keys($this->arResult['SITES']),
					[0]
				)
			);
			$this->arResult['ACCESS_SITE_NEW'] = (
				Rights::hasAdditionalRight(
					Rights::ADDITIONAL_RIGHTS['create']
				)
				&&
				in_array(Rights::ACCESS_TYPES['edit'], $rights[0])
			)? 'Y' : 'N';
			foreach ($this->arResult['SITES'] as &$item)
			{
				$item['ACCESS_EDIT'] = 'Y';
				$item['ACCESS_SETTINGS'] = 'Y';
				$item['ACCESS_PUBLICATION'] = 'Y';
				$item['ACCESS_DELETE'] = 'Y';
				if (isset($rights[$item['ID']]))
				{
					$currRights = $rights[$item['ID']];
					if (!in_array(Rights::ACCESS_TYPES['edit'], $currRights))
					{
						$item['ACCESS_EDIT'] = 'N';
					}
					if (!in_array(Rights::ACCESS_TYPES['sett'], $currRights))
					{
						$item['ACCESS_SETTINGS'] = 'N';
					}
					if (!in_array(Rights::ACCESS_TYPES['public'], $currRights))
					{
						$item['ACCESS_PUBLICATION'] = 'N';
					}
					if (!in_array(Rights::ACCESS_TYPES['delete'], $currRights))
					{
						$item['ACCESS_DELETE'] = 'N';
					}
				}
				if (!$item['LANDING_ID_INDEX'])
				{
					$landing = $this->getLandings(array(
						'filter' => array(
							'SITE_ID' => $item['ID']
						),
						'order' => array(
							'ID' => 'ASC'
						),
						'limit' => 1
					));
					if ($landing)
					{
						$landing = array_pop($landing);
						$item['LANDING_ID_INDEX'] = $landing['ID'];
					}
				}
				$item['PUBLIC_URL'] = Site::getPublicUrl($item['ID']);
				if ($b24)
				{
					$item['PREVIEW'] = $item['PUBLIC_URL'] . '/preview.jpg';
				}
				elseif ($item['LANDING_ID_INDEX'])
				{
					$landing = Landing::createInstance($item['LANDING_ID_INDEX']);
					if ($landing->exist())
					{
						$item['PREVIEW'] = $landing->getPreview();
					}
				}
				else
				{
					$item['PREVIEW'] = '';
				}
				if ($item['DELETED'] == 'Y')
				{
					$item['DATE_DELETED_DAYS'] = $deletedLTdays - intval((time() - $item['DATE_MODIFY']->getTimeStamp()) / 86400);
					$item['DELETE_FINISH'] = $item['DATE_DELETED_DAYS'] <= 0;//@tmp
				}
				$item['PUBLIC_URL'] = $this->getTimestampUrl($item['PUBLIC_URL']);
				$item['DOMAIN_NAME'] = $puny->decode($item['DOMAIN_NAME']);
				$item['DOMAIN_B24_NAME'] = Domain::getBitrix24Subdomain($item['DOMAIN_NAME']);
			}
			unset($item);
		}

		parent::executeComponent();

		return $this->arResult;
	}
}