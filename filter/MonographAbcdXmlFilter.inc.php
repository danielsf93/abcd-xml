<?php

/**
 * @file plugins/importexport/abcd/filter/MonographAbcdXmlFilter.inc.php
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2000-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @class MonographAbcdXmlFilter
 * @ingroup plugins_importexport_abcd
 *
 * @brief Class that converts a Monograph to a Abcd XML document.
 */

import('plugins.importexport.abcd.extras.abcd.filter.SubmissionAbcdXmlFilter');

class MonographAbcdXmlFilter extends SubmissionAbcdXmlFilter {
	//
	// Implement template methods from PersistableFilter
	//
	/**
	 * @copydoc PersistableFilter::getClassName()
	 */
	function getClassName() {
		return 'plugins.importexport.abcd.filter.MonographAbcdXmlFilter';
	}


	//
	// Implement abstract methods from SubmissionAbcdXmlFilter
	//
	/**
	 * Get the representation export filter group name
	 * @return string
	 */
	function getRepresentationExportFilterGroupName() {
		return 'publication-format=>abcd-xml';
	}

	//
	// Submission conversion functions
	//
	/**
	 * Create and return a submission node.
	 * @param $doc DOMDocument
	 * @param $submission Submission
	 * @return DOMElement
	 */
	function createSubmissionNode($doc, $submission) {
		$submissionNode = parent::createSubmissionNode($doc, $submission);

		$submissionNode->setAttribute('work_type', $submission->getData('workType'));
		
		return $submissionNode;
	}
}


