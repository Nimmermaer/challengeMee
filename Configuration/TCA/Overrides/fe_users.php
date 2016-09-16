<?php

if (!isset($GLOBALS['TCA']['fe_users']['ctrl']['type'])) {
	if (file_exists($GLOBALS['TCA']['fe_users']['ctrl']['dynamicConfigFile'])) {
		require_once($GLOBALS['TCA']['fe_users']['ctrl']['dynamicConfigFile']);
	}
	// no type field defined, so we define it here. This will only happen the first time the extension is installed!!
	$GLOBALS['TCA']['fe_users']['ctrl']['type'] = 'tx_extbase_type';
	$tempColumnstx_challenge_fe_users = array();
	$tempColumnstx_challenge_fe_users[$GLOBALS['TCA']['fe_users']['ctrl']['type']] = array(
		'exclude' => 1,
		'label'   => 'LLL:EXT:challenge/Resources/Private/Language/locallang_db.xlf:tx_challenge.tx_extbase_type',
		'config' => array(
			'type' => 'select',
			'renderType' => 'selectSingle',
			'items' => array(
				array('Player','Tx_Challenge_Player')
			),
			'default' => 'Tx_Challenge_Player',
			'size' => 1,
			'maxitems' => 1,
		)
	);
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users', $tempColumnstx_challenge_fe_users, 1);
}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addToAllTCAtypes(
	'fe_users',
	$GLOBALS['TCA']['fe_users']['ctrl']['type'],
	'',
	'after:' . $GLOBALS['TCA']['fe_users']['ctrl']['label']
);

$tmp_challenge_columns = array(

	'wins' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:challenge/Resources/Private/Language/locallang_db.xlf:tx_challenge_domain_model_player.wins',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'double2'
		)
	),
	'lose' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:challenge/Resources/Private/Language/locallang_db.xlf:tx_challenge_domain_model_player.lose',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'double2'
		)
	),
	'custom_color' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:challenge/Resources/Private/Language/locallang_db.xlf:tx_challenge_domain_model_player.custom_color',
		'config' => array(
			'type' => 'input',
			'size' => 30,
			'eval' => 'trim'
		),
	),
	'custom_profil' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:challenge/Resources/Private/Language/locallang_db.xlf:tx_challenge_domain_model_player.custom_profil',
		'config' => array(
			'type' => 'select',
			'renderType' => 'selectSingle',
			'items' => array(
				array('-- Label --', 0),
			),
			'size' => 1,
			'maxitems' => 1,
			'eval' => ''
		),
	),
	'challenges' => array(
		'exclude' => 1,
		'label' => 'LLL:EXT:challenge/Resources/Private/Language/locallang_db.xlf:tx_challenge_domain_model_player.challenges',
		'config' => array(
			'type' => 'inline',
			'foreign_table' => 'tx_challenge_domain_model_challenge',
			'foreign_field' => 'player',
			'maxitems' => 9999,
			'appearance' => array(
				'collapseAll' => 0,
				'levelLinksPosition' => 'top',
				'showSynchronizationLink' => 1,
				'showPossibleLocalizationRecords' => 1,
				'showAllLocalizationLink' => 1
			),
		),

	),
);

$tmp_challenge_columns['challenge'] = array(
	'config' => array(
		'type' => 'passthrough',
	)
);
$tmp_challenge_columns['move'] = array(
	'config' => array(
		'type' => 'passthrough',
	)
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addTCAcolumns('fe_users',$tmp_challenge_columns);

/* inherit and extend the show items from the parent class */

if(isset($GLOBALS['TCA']['fe_users']['types']['0']['showitem'])) {
	$GLOBALS['TCA']['fe_users']['types']['Tx_Challenge_Player']['showitem'] = $GLOBALS['TCA']['fe_users']['types']['0']['showitem'];
} elseif(is_array($GLOBALS['TCA']['fe_users']['types'])) {
	// use first entry in types array
	$fe_users_type_definition = reset($GLOBALS['TCA']['fe_users']['types']);
	$GLOBALS['TCA']['fe_users']['types']['Tx_Challenge_Player']['showitem'] = $fe_users_type_definition['showitem'];
} else {
	$GLOBALS['TCA']['fe_users']['types']['Tx_Challenge_Player']['showitem'] = '';
}
$GLOBALS['TCA']['fe_users']['types']['Tx_Challenge_Player']['showitem'] .= ',--div--;LLL:EXT:challenge/Resources/Private/Language/locallang_db.xlf:tx_challenge_domain_model_player,';
$GLOBALS['TCA']['fe_users']['types']['Tx_Challenge_Player']['showitem'] .= 'wins, lose, custom_color, custom_profil, challenges';

$GLOBALS['TCA']['fe_users']['columns'][$GLOBALS['TCA']['fe_users']['ctrl']['type']]['config']['items'][] = array('LLL:EXT:challenge/Resources/Private/Language/locallang_db.xlf:fe_users.tx_extbase_type.Tx_Challenge_Player','Tx_Challenge_Player');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr(
	'',
	'EXT:/Resources/Private/Language/locallang_csh_.xlf'
);