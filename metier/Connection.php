<?php
class connection extends PDO {

    private $stmt;

    public function __construct($dsn,$username,$password) {

        parent::__construct($dsn,$username,$password);
        $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    public function executeQuery($query, array $parameters = []){
        $this->stmt = parent::prepare($query);
        foreach ($parameters as $name => $value) {
            $this->stmt->bindValue($name, $value[0], $value[1]);
        }

        return $this->stmt->execute();
    }

    public function getResults(){
        return $this->stmt->fetchall();

    }
}

$user= 'root';
$pass='root';
$dsn='mysql:host=localhost;dbname=bdd';
try{
    $con=new connection($dsn,$user,$pass);
}
catch( PDOException $Exception ) {
    echo 'ERREUR DE CONNEXION A LA BDD !';
    echo $Exception->getMessage();
}

?>
