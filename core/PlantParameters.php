<?php


class PlantParameters{
    //db stuff

    private $conn;
    private $table = 'PlantParameters';

    //post properties
    public $plantType;
    public $plantGenus;
    public $optimalLight;
    public $waterEveryHour;
    public $optimalTemp;

    //constructor with db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // getting posts from our database
    public function get_parameters(){
        //create query
        $query = 'SELECT * FROM ' . $this->table ;

        //prepare statement
        $stmt = $this->conn->prepare($query);

        //execute query
        $stmt->execute();

        return $stmt;

    }

    public function add_plant_parameters(){
        //create query
        $query = 'INSERT INTO' . $this->table . 'SET plantGenus = :genus, optimalLight = :light, waterEveryHour = :water,optimalTemp = :temp';
        //prepare statement
        $stmt = $this->conn->prepare($query);
        //clean data
        $this->plantGenus = htmlspecialchars(strip_tags($this->plantGenus));
        $this->optimalLight = htmlspecialchars(strip_tags($this->optimalLight));
        $this->waterEveryHour = htmlspecialchars(strip_tags($this->waterEveryHour));
        $this->optimalTemp = htmlspecialchars(strip_tags($this->optimalTemp));
        //binding param
        $stmt->bindParam('genus',$this->plantGenus);
        $stmt->bindParam(':light',$this->optimalLight);
        $stmt->bindParam(':water',$this->waterEveryHour);
        $stmt->bindParam(':temp',$this->optimalTemp);
        //execute Query
        if($stmt->execute()){
            return true;
        }
        printf('error');
        return false;
    }
} 