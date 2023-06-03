<?php

namespace Classes;
use \PDO;
class DatabaseLGPD extends DatabaseConnection
{
    private $hasSensitiveData;

    public function __construct($host, $username, $password, $database, $hasSensitiveData = false,$driver = 'mysql')
    {
        parent::__construct($host, $username, $password, $database);
        $this->hasSensitiveData = $hasSensitiveData;
        parent::connect($driver);
    }


    public function LGPD()
    {
        if ($this->hasSensitiveData || $this->checkSensitiveTables()) {
            return "Contém dados sensíveis";
        } else {
            return "Dados sensíveis não encontrados";
        }
    }

    private function checkSensitiveTables()
    {
        $tables = $this->getTables();

        foreach ($tables as $table) {
            $columns = $this->getTableColumns($table);

            foreach ($columns as $column) {
                if ($this->isSensitiveColumn($column)) {
                    return true;
                }
            }
        }

        return false;
    }

    private function getTables()
    {
        $query = "SHOW TABLES";
        $statement = $this->pdo->query($query);
        $tables = $statement->fetchAll(PDO::FETCH_COLUMN);
        return $tables;
    }

    private function getTableColumns($table)
    {
        $query = "DESCRIBE {$table}";
        $statement = $this->pdo->query($query);
        $columns = $statement->fetchAll(PDO::FETCH_COLUMN);
        return $columns;
    }

    private function isSensitiveColumn($column)
    {
        $sensitiveKeywords = ['senha', 'cpf', 'rg', 'cartao', 'telefone'];

        foreach ($sensitiveKeywords as $keyword) {
            if (strpos($column, $keyword) !== false) {
                return true;
            }
        }    
        return false;
    }
}
