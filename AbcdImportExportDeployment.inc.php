<?php

/**
 * @file plugins/importexport/abcd/AbcdImportExportDeployment.inc.php
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2000-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @class AbcdImportExportDeployment
 * @ingroup plugins_importexport_abcd
 *
 * @brief Class configuring the abcd import/export process to this
 * application's specifics.
 */

import('lib.pkp.plugins.importexport.abcd.PKPAbcdImportExportDeployment');

class AbcdImportExportDeployment extends PKPAbcdImportExportDeployment {
	/**
	 * Constructor
	 * @param $context Context
	 * @param $user User
	 */
	function __construct($context, $user) {
		parent::__construct($context, $user);
	}

	//
	// Deploymenturation items for subclasses to override
	//
	/**
	 * Get the submission node name
	 * @return string
	 */
	function getSubmissionNodeName() {
		return 'monograph';
	}

	/**
	 * Get the submissions node name
	 * @return string
	 */
	function getSubmissionsNodeName() {
		return 'monographs';
	}

	/**
	 * Get the representation node name
	 */
	function getRepresentationNodeName() {
		return 'publication_format';
	}

	/**
	 * Get the schema filename.
	 * @return string
	 */
	function getSchemaFilename() {
		return 'abcd.xsd';
	}
}


