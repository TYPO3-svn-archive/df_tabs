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
 * Class that adds the wizard icon for the plugin plugin1 of this extension.
 */
class Tx_DfTabs_Wizards_ContentElementWizard {
	/**
	 * Adds an own wizard entry to the given list.
	 *
	 * @param array $wizardItems current wizard items
	 * @return array modified array with wizard items
	 */
	public function proc($wizardItems) {
		/** @var $localizationParser t3lib_l10n_parser_Xliff */
		$localizationParser = t3lib_div::makeInstance('t3lib_l10n_parser_Xliff');
		$locallang = $localizationParser->getParsedData(
			t3lib_extMgm::extPath('df_tabs') . 'Resources/Private/Language/locallang.xlf',
			$GLOBALS['LANG']->lang
		);

		/** @var language $language */
		$language = $GLOBALS['LANG'];
		$wizardItems['plugins_tx_dftabs_plugin1'] = array(
			'icon' => t3lib_extMgm::extRelPath('df_tabs') . 'Resources/Public/Images/contentElementWizard.png',
			'title' => $language->getLLL('plugin1_title', $locallang),
			'description' => $language->getLLL('plugin1_plus_wiz_description', $locallang),
			'params' => '&defVals[tt_content][CType]=list' .
				'&defVals[tt_content][list_type]=df_tabs_plugin1'
		);

		return $wizardItems;
	}
}

?>