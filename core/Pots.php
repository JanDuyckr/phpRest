<?php


class Pots{
    //db stuff

    private $conn;
    private $Pots = 'Pots';
    private $Plants = 'Plants';

    //post properties
    public $potNumber;
    public $nextScan;
    public $nextWater;
    public $temperatureTreshold;
    public $isDeleted;

    //constructor with db connection
    public function __construct($db){
        $this->conn = $db;
    }

    // getting posts from our database
    public function get_pot_numbers(){
        //create query
        $query = 'SELECT potNumber FROM' . $this->Pots . 'WHERE potNumber NOT IN (
            SELECT potNumber FROM ' . $this->Plants . ' WHERE isDeleted != 1)';
        
        //prepare statement
        $stmt = $this->conn->prepare($query);

        //execute query
        $stmt->execute();

        return $stmt;

    }
} 