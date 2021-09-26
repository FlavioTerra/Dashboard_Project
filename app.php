<?php

    class Dashboard {
        public $startDate;
        public $endDate;
        public $salesNum;
        public $totalSales;

        public function __get($attribute) {
            return $this->$attribute;
        }

        public function __set($attribute, $value) {
            $this->$attribute = $value;
            return $this;
        }
    }
    
    class Connection  {
        private $host = 'localhost';
        private $dbname = 'dashboard';
        private $user = 'root';
        private $pass = '';

        public function connect() {

            try {
                $connection = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->dbname, $this->user, $this->pass);

                $connection->exec('set charset utf8');

                return $connection;
            } catch(PDOException $e) {
                echo '<p>Erro: ' . $e->getCode() . '<br>Mensagem: ' . $e->getMessage() . '</p>';
                echo '<p><br>Linha: ' . $e->getLine() . '<br>Arquivo: ' . $e->getFile() . '</p>';
            }
        }
    }

    class Bd {
        private $connection;
        private $dashboard;

        public function __construct(Connection $connection, Dashboard $dashboard) {
            $this->$connection = $connection->connect();
            $this->$dashboard = $dashboard;
        }
    }

    $dashboard = new Dashboard();
    $connection = new Connection();

    $bd = new Bd($connection, $dashboard);

?>