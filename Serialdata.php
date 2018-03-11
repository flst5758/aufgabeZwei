<?php

/**
 * Description of Metadata
 *
 * @author Florian Steffen
 */
class Serialdata {
	
	public $_ID;
	public $_Title;
	public $_numberOfPages;
	public $_numberOfVolumes;
	public $_digitizationCost;
	public $_numberOfTB;
	
	
	public function getID() {
		return $this->_ID;
	}

	public function getTitle() {
		return $this->_Title;
	}

	public function getNumberOfPage() {
		return $this->_numberOfPages;
	}

	public function getNumberOfVolumes() {
		return $this->_numberOfVolumes;
	}

	public function getDigitizationCost() {
		return $this->_digitizationCost;
	}

	public function getNumberOfTB() {
		return $this->_numberOfTB;
	}


}
