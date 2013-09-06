<?php
namespace TYPO3\CMS\Core\Session;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2013 Thorsten Kahler <thorsten.kahler@typo3.org>
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
 * Session Storage
 *
 *
 *
 * @package TYPO3\CMS\Core\Session
 */
interface StorageInterface {

	/**
	 * Fetch session data
	 *
	 * This method (or its delegates) has to check the timeout value!
	 *
	 * @param string $identifier the session ID
	 * @return Data session data object
	 * @todo tk 2013-09-06 extend interface to optionally accept further key-value pairs which should be checked, like ses_iplock, ses_hashlock, ses_name
	 */
	public function get($identifier);

	/**
	 * Store session data
	 *
	 * @param Data $sessionData
	 * @return boolean TRUE on success
	 */
	public function put(Data $sessionData);

	/**
	 * Delete session data
	 *
	 * @param string $identifier the session ID
	 * @return boolean TRUE on success
	 */
	public function delete($identifier);

	/**
	 * Garbage collection removes outdated session data
	 *
	 * @return void
	 */
	public function collectGarbage();


}