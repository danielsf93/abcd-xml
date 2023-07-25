<?php

/**
 * @file plugins/importexport/abcd/filter/AbcdXmlMonographFileFilter.inc.php
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2000-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @class AbcdXmlMonographFileFilter
 * @ingroup plugins_importexport_abcd
 *
 * @brief Class that converts a Abcd XML document to a monograph file.
 */

import('lib.pkp.plugins.importexport.abcd.filter.AbcdXmlSubmissionFileFilter');

class AbcdXmlMonographFileFilter extends AbcdXmlSubmissionFileFilter {
	/**
	 * Constructor
	 * @param $filterGroup FilterGroup
	 */
	function __construct($filterGroup) {
		parent::__construct($filterGroup);
	}


	//
	// Implement template methods from PersistableFilter
	//
	/**
	 * @copydoc PersistableFilter::getClassName()
	 */
	function getClassName() {
		return 'plugins.importexport.abcd.filter.AbcdXmlMonographFileFilter';
	}
}


