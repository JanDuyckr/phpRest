<?php
    class config{
        //DB params
        
        private $db_name = 'a21iot08';
        private $username = 'a21iot08';
        private $password = '5qlnvvTo';
        private $conn;

        //DB connect
        public function connect(){
            $this->conn = null;
            try{
                $this->conn = new PDO('mysql:host=mysql.studev.groept.be' . ';dbname=' . $this->db_name,
                $this->username, $this->password);  //take in all the things needed to connect
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }catch (PDOException $e){
                echo 'Connection Error:' . $e->getMessage();
            }

            return $this->conn;
        }
}
?>

