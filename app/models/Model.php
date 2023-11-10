<?php
class Model
{
    public $pdo;
    public $value;
    public $values;
    function __construct()
    {
        $db_connection = DB_CONNECTION;
        $db_name = DB_DATABASE;
        $db_host = DB_HOST;
        $db_port = DB_HOST;
        $db_user = DB_USERNAME;
        $db_password = DB_PASSWORD;

        $dsn = "{$db_connection}:dbname={$db_name};host={$db_host};charset=utf8;port={$db_port}";
        try {
            $this->pdo = new PDO($dsn, $db_user, $db_password);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $e) {
            echo "接続失敗: " . $e->getMessage();
            exit;
        }
    }

    public function check($data)
    {
        if (empty($data)) return;
        foreach ($data as $column => $value) {
            $data[$column] = htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
        }
        return $data;
    }

    public function bind($data)
    {
        $data = $this->check($data);
        $this->value = $data;
    }

}