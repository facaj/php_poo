<?php
namespace Classes;
require_once "autoload.php";
use \PDO;
class DatabaseConfig
{
    
    private $pdo;

    public function __construct()
    {     
        include(__DIR__ . '/../includes/config.php');
        try {
            $this->pdo = new PDO($dsn, $username, $password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Erro na conexão com o banco de dados: ' . $e->getMessage());
        }
    }

    public function createConfig($data)
    {
        $sql = 'INSERT INTO configs (host, username, password, database_name, owner, driver, application, informations) VALUES (?, ?, ?, ?, ?, ?, ?, ?)';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $data['host'],
            $data['username'],
            $data['password'],
            $data['database_name'],
            $data['owner'],
            $data['driver'],
            $data['application'],
            $data['informations']
        ]);

        return $this->pdo->lastInsertId();
    }

    public function getAllConfigs()
    {
        $sql = 'SELECT * FROM configs';
        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getConfig($id)
    {
        $sql = 'SELECT * FROM configs WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getConfigById($id)
    {
        $query = "SELECT * FROM configs WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateConfig($id, $data)
    {
        $sql = 'UPDATE configs SET host = ?, username = ?, password = ?, database_name = ?, owner = ?, driver = ?, application = ?, informations = ? WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            $data['host'],
            $data['username'],
            $data['password'],
            $data['database_name'],
            $data['owner'],
            $data['driver'],
            $data['application'],
            $data['informations'],
            $id
        ]);

        return $stmt->rowCount();
    }

    public function deleteConfig($id)
    {
        $sql = 'DELETE FROM configs WHERE id = ?';
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$id]);

        return $stmt->rowCount();
    }
}
