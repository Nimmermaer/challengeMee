<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'ChallengeTeam.' . $_EXTKEY,
	'Table',
	'Challenge Table '
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'ChallengeTeam.' . $_EXTKEY,
	'Player',
	'Player'
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'ChallengeTeam.' . $_EXTKEY,
	'Profile',
	'Profile'
);

if (TYPO3_MODE === 'BE') {

	/**
	 * Registers a Backend Module
	 */
	\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
		'ChallengeTeam.' . $_EXTKEY,
		'web',	 // Make module a submodule of 'web'
		'challenges',	// Submodule key
		'',						// Position
		array(
			'Challenge' => 'list, show, filter, new',
			'Player' => 'list, show, new, ',
			
		),
		array(
			'access' => 'user,group',
			'icon'   => 'EXT:' . $_EXTKEY . '/ext_icon.gif',
			'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_challenges.xlf',
		)
	);

}

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'challengeMee');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_challenge_domain_model_table', 'EXT:challenge/Resources/Private/Language/locallang_csh_tx_challenge_domain_model_table.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_challenge_domain_model_table');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_challenge_domain_model_challenge', 'EXT:challenge/Resources/Private/Language/locallang_csh_tx_challenge_domain_model_challenge.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_challenge_domain_model_challenge');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_challenge_domain_model_move', 'EXT:challenge/Resources/Private/Language/locallang_csh_tx_challenge_domain_model_move.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_challenge_domain_model_move');
