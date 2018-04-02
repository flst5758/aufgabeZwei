<?php
require_once 'SqlConnector.php';
require_once 'SidService.php';

/**
 * DBCacheService Cachlayer implementation - retrieves requested Serials from db or from dataServices
 *
 * @author Florian Steffen
 */
class DBCacheService implements SidService {

    private $_dataService = null;

    public function __construct($dataService) {
        $this->_dataService = $dataService;
    }

    public function getData($sid = "SLZ", $title = "Lehrerzeitung", $numberOfPages = 300, $numberOfVolumes = 2) {
        $dbConnection = new SqlConnector("localhost", "root", "", "aufgabe_zwei");
        
        $stm=$dbConnection->prepare('SELECT `id`, `sid`, `title`, `numberOfPages`, `numberOfVolumes`, `digitizationCost`, `numberOfTB` FROM `Serialdata` WHERE sid = ?');
        $stm->bind_param("s", $sid);
        $stm->execute();
        $result = $stm->get_result();
        if($result->num_rows > 0){
            return $this->convertToSerialdata($result);
        }
//!
        $serials = $this->_dataService->getData($sid, $title, $numberOfPages, $numberOfVolumes);
        foreach ($serials as $Serialdata) {
            $stm=$dbConnection->prepare("INSERT INTO `Serialdata` (`id`, `sid`,`title`, `numberOfPages`, `numberOfVolumes`, `digitizationCost`, `numberOfTB`) VALUES (NULL, ?, ?, ?, ?, ?, ?);");
            $stm->bind_param("ssssss", $Serialdata->getSid(), 
                $Serialdata->getTitle(), 
                $Serialdata->getNumberOfPages(),
                $Serialdata->getNumberOfVolumes(),
                $Serialdata->getDigitizationCost(),
                $Serialdata->getNumberOfTB());    
            $stm->execute();    
        }
        
        return $serials;
    }
    
    public function findByTitle($title)
    {
        $dbConnection = new SqlConnector("localhost", "root", "", "aufgabe_zwei");
        
        $stm=$dbConnection->prepare('SELECT `id`, `sid`, `title`, `numberOfPages`, `numberOfVolumes`, `digitizationCost`, `numberOfTB` FROM `Serialdata` WHERE title like ?');
        $title = "%".$title."%";
        $stm->bind_param("s", $title);
        $stm->execute();
        $result = $stm->get_result();
        
        return $this->convertToSerialdata($result);
    }
    
    public function findBySid($sid)
    {
        $dbConnection = new SqlConnector("localhost", "root", "", "aufgabe_zwei");
        
        $stm=$dbConnection->prepare('SELECT `id`, `sid`, `title`, `numberOfPages`, `numberOfVolumes`, `digitizationCost`, `numberOfTB` FROM `Serialdata` WHERE sid = ?');
        $stm->bind_param("s", $sid);
        $stm->execute();
        $result = $stm->get_result();
        
        return $this->convertToSerialdata($result);

    }
            
    private function convertToSerialdata($result){
        $serials = array();
        while($row = $result->fetch_assoc())
        {
            $serialdata = new Serialdata();

            $serialdata->_SID=$row['sid'];
            $serialdata->_Title=$row['title'];
            $serialdata->_numberOfPages=$row['numberOfPages'];
            $serialdata->_numberOfTB=$row['numberOfTB'];
            $serialdata->_numberOfVolumes=$row['numberOfVolumes'];
            $serialdata->_digitizationCost=$row['digitizationCost'];
            
//            $Serialdata->setSID($row['sid']);
//            $Serialdata->setTitle($row['title']);
//            $Serialdata->setNumberOfPages($row['numberOfPages']);
//            $Serialdata->setNumberOfVolumes($row['numberOfVolumes']);
//            $Serialdata->setDigitizationCost($row['digitizationCost']);
//            $Serialdata->setNumberOfTB($row['numberOfTB']);
            
            $serials[] = $serialdata;
        }
        return $serials;
    }
    

    

}
