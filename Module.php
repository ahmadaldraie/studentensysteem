<?php
    declare(strict_types=1);

    require_once 'db.php';

    class Module {
        private int $id;
        private string $naam;
        private Db $db;

        public function __construct() {
            $this->db = new Db();
        }

        //Getters
        public function getId(): int { return $this->id; } 
        public function getNaam(): string { return $this->naam; }

        //Setters
        public function setId($id) { $this->id = $id; }
        public function setNaam($naam) { $this->naam = $naam; }

        //functie om een module te zoeken via de id of de naam
        public function moduleZoeken($module) {
        $sql = 'select * from modules_studentensysteem where id = :id or naam = :module';
        $dbh = new PDO($this->db->getDBConnection(), $this->db->getDBUsername(), $this->db->getDBPassword());
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array('id' => $module, 'module' => $module));
        $dbh = null;
        $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $this->id = $resultSet[0]['id'];
        $this->naam = $resultSet[0]['naam'];
    }

    public function getAlleModules(): array {
        $modules = array();
        $sql = 'select naam from modules_studentensysteem';
        $dbh = new PDO($this->db->getDBConnection(), $this->db->getDBUsername(), $this->db->getDBPassword());
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $rij) {
            array_push($modules, $rij['naam']);
        }
        return $modules;
    }
}
?>