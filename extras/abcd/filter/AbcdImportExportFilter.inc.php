<?php

/**
 * @file plugins/importexport/abcd/filter/AbcdImportExportFilter.inc.php
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2000-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @class AbcdImportExportFilter
 * @ingroup plugins_importexport_abcd
 *
 * @brief Base class that converts between Abcd XML documents and DataObjects
 */

import('lib.pkp.classes.filter.PersistableFilter');

class AbcdImportExportFilter extends PersistableFilter {
	/** @var AbcdImportExportDeployment */
	var $_deployment;

	/**
	 * Constructor
	 * @param $filterGroup FilterGroup
	 */
	function __construct($filterGroup) {
		parent::__construct($filterGroup);
	}


	//
	// Deployment management
	//
	/**
	 * Set the import/export deployment
	 * @param $deployment AbcdImportExportDeployment
	 */
	function setDeployment($deployment) {
		$this->_deployment = $deployment;
	}

	/**
	 * Get the import/export deployment
	 * @return AbcdImportExportDeployment
	 */
	function getDeployment() {
		return $this->_deployment;
	}
}


