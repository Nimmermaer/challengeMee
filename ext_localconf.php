<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'ChallengeTeam.' . $_EXTKEY,
	'Table',
	array(
		'Table' => 'list, show, filter, new',
		'Move' => 'like',
		
	),
	// non-cacheable actions
	array(
		'Table' => 'list, show, filter, new',
		'Move' => 'like',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'ChallengeTeam.' . $_EXTKEY,
	'Player',
	array(
		'Player' => 'list, show',
		
	),
	// non-cacheable actions
	array(
		'Player' => 'list, show',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'ChallengeTeam.' . $_EXTKEY,
	'Profile',
	array(
		'Player' => 'show, edit, sendNotificationMail, sendInviteMail',
		'Move' => 'delete',
		
	),
	// non-cacheable actions
	array(
		'Player' => 'show, edit, sendNotificationMail, sendInviteMail',
		'Move' => 'delete',
		
	)
);
