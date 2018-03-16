<?php

/**
 * Interface for IsbnService
 * @author MBlock, FSteffen
 * 
 */
interface SidService {
	
	public function getData($Sid = null, $title = null, $numberOfPages = 0, $numberOfVolumes = 0);
	
}
