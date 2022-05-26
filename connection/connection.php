<?php 


class Conexion extends PDO {


    private $hostname = "localhost";
    private $bd_name = "c_operacional";
    private $username =  "root";
    private $password =  "";

public function __construct()
{

try {

    parent::__construct('mysql:host='.$this->hostname.
                        ';dbname='   .$this->bd_name.
                        ';charset=utf8',
                        $this->username,
                        $this->password,
                        array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));

}catch(PDOException $e){

    echo "error: ". $e->getMessage();
}
    
}




}

?>