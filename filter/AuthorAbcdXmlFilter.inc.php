<?php

/**
 * @file plugins/importexport/abcd/filter/AuthorAbcdXmlFilter.inc.php
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2000-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @class AuthorAbcdXmlFilter
 * @ingroup plugins_importexport_abcd
 *
 * @brief Class that converts a Author to a Abcd XML document.
 */

import('lib.pkp.plugins.importexport.abcd.filter.PKPAuthorAbcdXmlFilter');

class AuthorAbcdXmlFilter extends PKPAuthorAbcdXmlFilter {
	//
	// Implement template methods from PersistableFilter
	//
	/**
	 * @copydoc PersistableFilter::getClassName()
	 */
	function getClassName() {
		return 'plugins.importexport.abcd.filter.AuthorAbcdXmlFilter';
	}
}


