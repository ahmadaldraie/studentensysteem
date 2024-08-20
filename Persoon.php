<?php
    declare(strict_types=1);

    require_once 'db.php';

    class Persoon {
        private string $familienaam;
        private string $voornaam;
        private int $id;
        private string $geboortedatum;
        private string $geslacht;
        private Db $db;

        public function __construct() {
            $this->db = new Db();
        }

        //Getters
        public function getFamilienaam(): string { return $this->familienaam; }
        public function getVoornaam(): string { return $this->voornaam; }
        public function getFullname(): string { return "$this->voornaam $this->familienaam"; }
        public function getId(): int { return $this->id; } 
        public function getGeboortedatum(): string { return $this->geboortedatum; }
        public function getGeslacht(): string { return $this->geslacht; }

        //Setters
        public function setId($id) { $this->id = $id; }
        public function setFamilienaam($familienaam) { $this->familienaam = $familienaam; }
        public function setVoornaam($voornaam) { $this->voornaam = $voornaam; }
        public function setGeboortedatum($geboortedatum) { $this->geboortedatum = $geboortedatum; }
        public function setGeslacht($geslacht) { $this->geslacht = $geslacht; }

        //functie om een student te zoeken via de id of de naam
        public function studentZoeken($student) {
        $sql = 'select * from personen_studentensysteem where id= :id or (select CONCAT(voornaam," ", familienaam)) = :student';
        $dbh = new PDO($this->db->getDBConnection(), $this->db->getDBUsername(), $this->db->getDBPassword());
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array('id' => $student, 'student' => $student));
        $dbh = null;
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->id = $resultSet[0]['id'];
        $this->familienaam = $resultSet[0]['familienaam'];
        $this->voornaam = $resultSet[0]['voornaam'];
        $this->geboortedatum = $resultSet[0]['geboortedatum'];
        $this->geslacht = $resultSet[0]['geslacht'];
    }

    public function getAlleStudenten(): array {
        $studenten = array();
        $sql = 'select CONCAT(voornaam," ", familienaam) as naam from personen_studentensysteem';
        $dbh = new PDO($this->db->getDBConnection(), $this->db->getDBUsername(), $this->db->getDBPassword());
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            array_push($studenten, $rij['naam']);
        }
        return $studenten;
    }
}

/*$persoon = new Persoon();
$pp = $persoon->getAlleStudenten();
var_dump($pp);
*/
?>