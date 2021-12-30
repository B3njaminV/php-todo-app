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


        /*public function connection($userName, $password){
            validation::nettoyageChaine($userName);
            validation::nettoyageChaine($password);
            $userNameDB=$this->userGw->getUserName();
            $passwordDB=$this->userGw->getPassword();
            if(($userName==$userNameDB) && (password_verify($password,$passwordDB))){
                //$_SESSION['status']="membre";
                $_SESSION['userName']=$userName;
            }else{
                require $rep.$vue['erreur'];
                throw new Exception{"Erreur a la connection"};
            }

        }*/

        public function Reinit(){
            session_reset();
        }

        public function isConnected(){
            if(isset($_SESSION['userName'])){
                return true;
            }else{
                return false;
            }
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
