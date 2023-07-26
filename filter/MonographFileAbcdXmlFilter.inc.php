<?php

/**
 * @file plugins/importexport/abcd/filter/ArtworkFileAbcdXmlFilter.inc.php
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2000-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @class ArtworkFileAbcdXmlFilter
 * @ingroup plugins_importexport_abcd
 *
 * @brief Filter to convert an artwork file to a Abcd XML document
 */

import('plugins.importexport.abcd.extras.abcd.filter.SubmissionFileAbcdXmlFilter');

class MonographFileAbcdXmlFilter extends SubmissionFileAbcdXmlFilter {
	//
	// Implement template methods from PersistableFilter
	//
	/**
	 * @copydoc PersistableFilter::getClassName()
	 */
	function getClassName() {
		return 'plugins.importexport.abcd.filter.MonographFileAbcdXmlFilter';
	}


	//
	// Implement/override functions from SubmissionFileAbcdXmlFilter
	//
	/**
	 * Create and return a submissionFile node.
	 * @param $doc DOMDocument
	 * @param $submissionFile SubmissionFile
	 * @return DOMElement
	 */
	function createSubmissionFileNode($doc, $submissionFile) {
		$deployment = $this->getDeployment();
		$submissionFileNode = parent::createSubmissionFileNode($doc, $submissionFile);
		
		if ($submissionFile->getData('directSalesPrice')) {
			$submissionFileNode->appendChild($doc->createElementNS($deployment->getNamespace(), 'directSalesPrice', $submissionFile->getData('directSalesPrice')));
		}

		if ($submissionFile->getData('salesType')) {
			$submissionFileNode->appendChild($doc->createElementNS($deployment->getNamespace(), 'salesType', $submissionFile->getData('salesType')));
		}

		// FIXME: is permission file ID implemented?
		// FIXME: is chapter ID implemented?
		// FIXME: is contact author ID implemented?

		return $submissionFileNode;
	}

	/**
	 * Get the submission file element name
	 */
	function getSubmissionFileElementName() {
		return 'submission_file';
	}
}


