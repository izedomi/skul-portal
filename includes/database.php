<?php

    //load config file since the declared class will require database connection
    require_once("config.php");

    // class declaration
    class my_database{

        public  $lastQuery;
        private $realEscapeString;
        private $connection;
        

        
        public function  __construct(){$this->open_connection(); }
            
        private function open_connection(){
            //establish mysqli connection
            $this->connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS);
            if(!$this->connection){die("failed to create connection". mysqli_error($this->connection));}
            
            //select database
            $this->db = mysqli_select_db($this->connection, DB_NAME);
            if(!$this->db){die("database selection failed". mysqli_error($this->connection));}
        }
            
        public function escape_string($value){
            //no need to check for PHP magic quotes since my 
             //of PHP is greater version 5
           return  mysqli_real_escape_string($this->connection, $value);
           
        }
        
        public function query($sql){
            $queryResult = mysqli_query($this->connection, $sql);  
            $this->confirm_query($queryResult);
            //$this->lastQuery = $this->query;
            return $queryResult;
        }
        
        public function close_connection(){ 
            if(isset($this->connection)):
                mysqli_close($this->connection);
                unset($this->connection);
            endif;
        }

        private function confirm_query($query){
            if(!$query){die("database query failed". mysqli_error($this->connection));}   
        }
        
        //database neutral methods
        public function fetch_array($row){
            return mysqli_fetch_array($row);       
        }

        public function number_of_rows($row){
            return mysqli_num_rows($row);
        }
        
        public function affected_rows(){
            return mysqli_affected_rows($this->connection);
        }
        
        public function insert_id(){
           return mysqli_insert_id($this->connection);
        }
        
        
    }   

// class instantiation

//by instantiating, database connection is established
$database = new my_database();








?>

