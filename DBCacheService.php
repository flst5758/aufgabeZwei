<?php
require_once 'SqlConnector.php';

/**
 * DBCacheService Cachlayer implementation - retrieves requested isbn-infos from db or from dataServices
 *
 * @author Florian Steffen
 */
class DBCacheService implements SidService {

    private $_dataService = null;

    public function __construct($dataService) {
        $this->_dataService = $dataService;
    }

    public function getData($sid = null) {
        $dbConnection = new SqlConnector("localhost", "root", "", "aufgabe_zwei");
        
        $stm=$dbConnection->prepare('SELECT `id`, `sid`, `title`, `numberOfPages`, `numberOfVolumes`, `digitizationCost`, `numberOfTB` FROM `Serialdata` WHERE sid = ?');
        $stm->bind_param("s", $sid);
        $stm->execute();
        $result = $stm->get_result();
        if($result->num_rows > 0){
            return $this->convertToSerialdata($result);
        }
//!
        $serials = $this->_dataService->getData($sid);
        foreach ($serials as $Serialdata) {
            $stm=$dbConnection->prepare("INSERT INTO `Serialdata` (`id`, `sid`,`title`, `numberOfPages`, `numberOfVolumes`, `digitizationCost`, `numberOfTB`) VALUES (NULL, ?, ?, ?, ?, ?, ?);");
            $stm->bind_param("sssss", $Serialdata->getSid(), 
                $Serialdata->getTitle(), 
                $Serialdata->getNumberOfPages(),
                $Serialdata->getNumberOfVolumes(),
                $Serialdata->getDigitizationCost(),
                $Serialdata->getNumberOfTB());
            $stm->execute();    
        }
        
        return $serials;
    }
    
    private function convertToSerialdata($result){
        $serials = array();
        while($row = $result->fetch_assoc())
        {
            $Serialdata = new Serialdata();

            $Serialdata->setSid($row['sid']);
            $Serialdata->setTitle($row['title']);
            $Serialdata->setNumberOfPages($row['numberOfPages']);
            $Serialdata->setNumberOfVolumes($row['numberOfVolumes']);
            $Serialdata->setDigitizationCost($row['digitizationCost']);
            $Serialdata->setNumberOfTB($row['numberOfTB']);
            
            $serials[] = $Serialdata;
        }
        return $serials;
    }
    

    

}
