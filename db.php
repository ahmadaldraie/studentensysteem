<?php
declare(strict_types=1);

class Db {
    private string $dbConn;
    private string $dbUsername;
    private string $dbPassword;

    public function __construct() {
        $this->dbConn = "";
        $this->dbUsername = "";
        $this->dbPassword = "";
    }

    public function getDBConnection(): string { return $this->dbConn; }
    public function getDBUsername(): string { return $this->dbUsername; }
    public function getDBPassword(): string { return $this->dbPassword; }

    public function setDBConnection($dbConn) { $this->dbConn = $dbConn; }
    public function setDBUsername($dbUsername) { $this->dbUsername = $dbUsername; }
    public function setDBPassword($dbPassword) { $this->dbPassword = $dbPassword; }
}
?>

