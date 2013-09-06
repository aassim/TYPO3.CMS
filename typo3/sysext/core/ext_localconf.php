<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

if (TYPO3_MODE === 'BE') {
	\TYPO3\CMS\Core\Utility\GeneralUtility::makeInstance('TYPO3\\CMS\\Extbase\\SignalSlot\\Dispatcher')->connect(
		'TYPO3\\CMS\\Core\\Resource\\ResourceFactory',
		\TYPO3\CMS\Core\Resource\ResourceFactory::SIGNAL_PostProcessStorage,
		'TYPO3\\CMS\\Core\\Resource\\Security\\StoragePermissionsAspect',
		'addUserPermissionsToStorage'
	);
}

// Add classic session storage service
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addService(
	'core',
	'sessionStorage',
	'TYPO3\\CMS\\Core\\Session\\ClassicStorage',
	array(
		'title' => 'Session Storage: Classic',
		'description' => 'Stores user sessions in TYPO3 database. ',
		'subtype' => 'backend, frontend',
		'available' => TRUE,
		'priority' => 10,
		'quality' => 50,
		'os' => '',
		'exec' => '',
		'className' => 'TYPO3\\CMS\\Core\\Session\\ClassicStorage'
	)
);
?>