<?php

require_once 'SidService.php';
require_once 'Serialdata.php';

/**
 * Description of IsbnServiceJson: gets information from worldcat REST-Service it returns it as matadata object
 *
 * @author MBlock, FSteffen
 */
class SidServiceJson implements SidService {


    public function __construct() {
    }

    public function getData($Sid = null, $Title = null, $numberOfPages = null, $numberOfVolumes = null, $numberOfCm = null) {
        
        //$Sid = $this->$Sid;
        //$Title = $this->$Title;
        $numberOfPages = $this->getNumberOfPages($numberOfPages, $numberOfCm);
        //$numberOfcm = $this->$numberOfCm;
        //$numberOfVolumes = $this->$numberOfVolumes;
        $digitizationCost = $this->getDigitizationCost($numberOfPages);
        $numberOfTB = $this->getNumberOfTB($numberOfPages);
        
        $serialdata = new Serialdata();
        $serialdata->_SID=$Sid;
        $serialdata->_Title=$Title;
        $serialdata->_numberOfPages=$numberOfPages;
        $serialdata->_numberOfTB=$numberOfTB;
        $serialdata->_numberOfVolumes=$numberOfVolumes;
        $serialdata->_digitizationCost=$digitizationCost;
        
//        $serialdata ->setSid($Sid);
//        $serialdata ->setTitle($Title);
//        $serialdata ->setNumberOfPages($numberOfPages);
//        $serialdata ->setNumberOfVolumes($numberOfVolumes);
//        $serialdata ->setDigitizationCost($digitizationCost);
//        $serialdata ->setNumberOfTB($numberOfTB);
        
        
        return array($serialdata);
    }
    
    private function getNumberOfPages($numberOfPages, $numberOfCm){
        if($numberOfPages == null){
            $numberOfPages = $numberOfCm * 150;
        }
        return $numberOfPages;
    }
    
    private function getDigitizationCost($numberOfPages){
        $digitizationCost = $numberOfPages * 0.25;
        return $digitizationCost;
    }
    
    private function getNumberOfTB($numberOfPages){
        $numberOfTB = $numberOfPages * 20 * 0.000001;
        return $numberOfTB;
    }
    
    /*/* zum Objekt schnüren;

    private function getServiceData($isbn = null) {
        if (is_null($isbn)) {
            return;
        }

        $url = "http://xisbn.worldcat.org/webservices/xid/isbn/" . $isbn . "?method=getMetadata&format=json&fl=*"; //Wird json ausgegeben, nur über Aufruf der URL
        //$url = "http://xisbn.worldcat.org/webservices/xid/isbn/0596002815?method=getMetadata&format=xml&fl=*";
        $serviceData = file_get_contents($url);
      //  echo htmlspecialchars($serviceData);

        return $serviceData;
    }

    public function parseServiceData($data = null) {

        if (is_null($data)) {
            return array();
        }

        $json = json_decode($data);
        if ($json->stat == 'unknownId' || $json->stat == 'invalidId') {
            return array();
        }
      //  echo "test 3";
        //echo $data;
        $attributes = $json->list[0];
        $serialdata = new Serialdata();

        $serialdata->setSid($attributes->Sid[0]);
        $serialdata->setTitle($attributes->title);
        $serialdata->setNumberOfPages($attributes->numberOfPages);
        $serialdata->setNumberOfVolumes($attributes->numberOfVolumes);
        $serialdata->setDigitizationCost($attributes->digitizationCost);
        $serialdata->setNumberOfTB($attributes->numberOfTB);

        return array($serialdata);
    }
     * 
     */

}
