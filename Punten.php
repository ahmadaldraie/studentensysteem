<?php
    declare(strict_types=1);

    require_once 'Module.php';
    require_once 'Persoon.php';

    class Punten {
        private Db $db;


        public function __construct() {
            $this->db = new Db();
        }

        //Functie om een puntenlijst op te vragen van een specifieke student of module
        public function lijstPuntenVragen($param): array {
        $persoon = new Persoon();
        $module = new Module();
        $persoonId = -1;
        $moduleId = -1;
        if ($param instanceof Persoon)
            $persoonId = $param->getId();
        else if($param instanceof Module)
            $moduleId = $param->getId(); 
        $sql = 'select * from punten_studentensysteem where persoonID = :persoonID or moduleID = :moduleID';
        $dbh = new PDO($this->db->getDBConnection(), $this->db->getDBUsername(), $this->db->getDBPassword());
        $stmt = $dbh->prepare($sql);
        $dbh = null;
        $stmt->execute(array('persoonID' => $persoonId, 'moduleID' => $moduleId));
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $lijst = array();
        foreach($resultSet as $rij) {
            $persoon->studentZoeken($rij['persoonID']);
            $studentNaam = $persoon->getFullname();
            $module->moduleZoeken($rij['moduleID']);
            $moduleNaam = $module->getNaam();
            array_push($lijst, array('student' => $studentNaam, 'module' => $moduleNaam, 'punten' => $rij['punten']));
        }
        return $lijst;
    }

    //Functie wordt gebruikt om een control te maken of een student al een punten heeft voor een bepaalde module
    //Het wordt ook gebruikt om de punten van een student voor een specifieke module op te vragen.
    public function puntenVanEenStudentPerModuleVragen(Persoon $student, Module $module): int {

        $sql = 'select punten from punten_studentensysteem where persoonID = :persoonID and moduleID = :moduleID';
        $dbh = new PDO($this->db->getDBConnection(), $this->db->getDBUsername(), $this->db->getDBPassword());
        $stmt = $dbh->prepare($sql);
        $dbh = null;
        $stmt->execute(array('persoonID' => $student->getId(), 'moduleID' => $module->getId()));
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if (count($resultSet) > 0)
            $punten = $resultSet[0]['punten'];
        else $punten = -1;

        // als de return waarde -1 is dan zijn er geen resultaten van die student voor deze module
        return $punten;
    }

    //Functie om een studen punten geven voor een module
    public function puntenGeven(int $punten, Persoon $student, Module $module) {
        $sql = 'insert into punten_studentensysteem (persoonID, moduleID, punten) values (:persoonID, :moduleID, :punten)';
        $dbh = new PDO($this->db->getDBConnection(), $this->db->getDBUsername(), $this->db->getDBPassword());
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array('persoonID' => $student->getId(), 'moduleID' => $module->getId(), 'punten' => $punten));
        $dbh = null;

    }

}
?>