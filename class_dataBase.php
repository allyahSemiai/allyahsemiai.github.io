<?php 

class dataBase{
    protected $server;
    protected $dataBaseName;
    private $identifiant;
    private $password;

    function __construct($server, $dataBaseName,$identifiant,$password){
        $this->server=$server;
        $this->dataBaseName=$dataBaseName;
        $this->identifiant=$identifiant;
        $this->password=$password;
        $this->connection=new PDO("mysql:host=".$this->server.";dbname=".$this->dataBaseName .";charset=UTF8", $this->identifiant, $this->password);;    
    }

    public function interaction_dataBase_without_arguments($request){ 
        $get_elements=$this->connection->prepare($request);
        $get_elements->execute();
        $response=$get_elements->fetchAll(PDO::FETCH_ASSOC);
        return $response;
    }

    public function interaction_dataBase_with_arguments_fetch($request, array $arguments=array()){
        $get_elements=$this->connection->prepare($request);
        $get_elements->execute($arguments);
        $response=$get_elements->fetch(PDO::FETCH_ASSOC);
        return $response;
    }
    public function interaction_dataBase_with_arguments_fetchAll($request, array $arguments=array()){
        $get_elements=$this->connection->prepare($request);
        $get_elements->execute($arguments);
        $response=$get_elements->fetchAll(PDO::FETCH_ASSOC);
        return $response;
    }

    public function interaction_dataBase_without_fetch($request, array $arguments=array()){
        $get_elements=$this->connection->prepare($request);
        $get_elements->execute($arguments);
    }
   
}