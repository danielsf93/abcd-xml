<?php

/**
 * @file plugins/importexport/abcd/filter/AbcdXmlRepresentationFilter.inc.php
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2000-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @class AbcdXmlRepresentationFilter
 * @ingroup plugins_importexport_abcd
 *
 * @brief Base class that converts a Abcd XML document to a set of authors
 */

import('lib.pkp.plugins.importexport.abcd.filter.AbcdImportFilter');

class AbcdXmlRepresentationFilter extends AbcdImportFilter {
	/**
	 * Constructor
	 * @param $filterGroup FilterGroup
	 */
	function __construct($filterGroup) {
		$this->setDisplayName('Abcd XML representation import');
		parent::__construct($filterGroup);
	}

	//
	// Implement template methods from PersistableFilter
	//
	/**
	 * @copydoc PersistableFilter::getClassName()
	 */
	function getClassName() {
		return 'lib.pkp.plugins.importexport.abcd.filter.AbcdXmlRepresentationFilter';
	}


	/**
	 * Handle a Representation element
	 * @param $node DOMElement
	 * @return Representation 
	 */
	function handleElement($node) {
		$deployment = $this->getDeployment();
		$context = $deployment->getContext();

		$publication = $deployment->getPublication();
		assert(is_a($publication, 'PKPPublication'));

		// Create the data object
		$representationDao  = Application::getRepresentationDAO();
		$representation = $representationDao->newDataObject(); /** @var $representation Representation */

		$representation->setData('publicationId', $publication->getId());
		$representation->setData('urlPath', $node->getAttribute('url_path'));
		
		// Handle metadata in subelements.  Look for the 'name' and 'seq' elements.
		// All other elements are handled by subclasses.
		for ($n = $node->firstChild; $n !== null; $n=$n->nextSibling) if (is_a($n, 'DOMElement')) switch($n->tagName) {
			case 'id': $this->parseIdentifier($n, $representation); break;
			case 'name':
				$locale = $n->getAttribute('locale');
				if (empty($locale)) $locale = $publication->getData('locale');
				$representation->setName($n->textContent, $locale);
				break;
			case 'seq': $representation->setSequence($n->textContent); break;
			case 'remote': $representation->setRemoteURL($n->getAttribute('src')); break;

		}

		return $representation; // database insert is handled by sub class.
	}

	/**
	 * Parse an identifier node and set up the representation object accordingly
	 * @param $element DOMElement
	 * @param $representation Representation
	 */
	function parseIdentifier($element, $representation) {
		$deployment = $this->getDeployment();
		$advice = $element->getAttribute('advice');
		switch ($element->getAttribute('type')) {
			case 'internal':
				// "update" advice not supported yet.
				assert(!$advice || $advice == 'ignore');
				break;
			case 'public':
				if ($advice == 'update') {
					$representation->setStoredPubId('publisher-id', $element->textContent);
				}
				break;
			default:
				if ($advice == 'update') {
					// Load pub id plugins
					$pubIdPlugins = PluginRegistry::loadCategory('pubIds', true, $deployment->getContext()->getId());
					$representation->setStoredPubId($element->getAttribute('type'), $element->textContent);
				}
		}
	}
}


