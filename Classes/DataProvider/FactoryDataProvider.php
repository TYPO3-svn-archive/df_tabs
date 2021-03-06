<?php
/***************************************************************
 *  Copyright notice
 *
 *  (c) domainfactory GmbH (Stefan Galinski <stefan.galinski@gmail.com>)
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
 *  (at your option) any later version.
 *
 *  The GNU General Public License can be found at
 *  http://www.gnu.org/copyleft/gpl.html.
 *
 *  This script is distributed in the hope that it will be useful,
 *  but WITHOUT ANY WARRANTY; without even the implied warranty of
 *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *  GNU General Public License for more details.
 *
 *  This copyright notice MUST APPEAR in all copies of the script!
 ***************************************************************/

/**
 * Data Provider Factory
 */
final class Tx_DfTabs_DataProvider_FactoryDataProvider {
	/**
	 * Returns a table instance based upon the given type. The additional parameters are used
	 * to instantiate the table instance with needed information's.
	 *
	 * @throws tx_dftabs_Exception_GenericException if no valid data provider could be created
	 * @param string $type pages, tt_content, typoscript, ...
	 * @param array $pluginConfiguration
	 * @param tslib_cObj $contentObject
	 * @return Tx_DfTabs_DataProvider_AbstractBaseDataProvider
	 */
	public static function getDataProvider($type, array $pluginConfiguration, tslib_cObj $contentObject) {
		$dataProvider = NULL;
		if ($type === 'tt_content') {
			$dataProvider = t3lib_div::makeInstance('Tx_DfTabs_DataProvider_ContentDataProvider');
		} elseif ($type === 'pages') {
			$dataProvider = t3lib_div::makeInstance('Tx_DfTabs_DataProvider_PagesDataProvider');
		} elseif ($type === 'typoscript') {
			$dataProvider = t3lib_div::makeInstance('Tx_DfTabs_DataProvider_TypoScriptDataProvider');
		} else {
			throw new tx_dftabs_Exception_GenericException('No data provider matched your request!');
		}

		/** @var $dataProvider Tx_DfTabs_DataProvider_AbstractBaseDataProvider */
		$dataProvider->injectPluginConfiguration($pluginConfiguration);
		$dataProvider->injectContentObject($contentObject);

		return $dataProvider;
	}
}

?>