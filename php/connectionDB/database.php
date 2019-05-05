<?php
require_once('config.php');

class database
{
    protected $connection;

    function __construct()
    {
        $this->open_db_connection();
    }

    private function open_db_connection()//open the connection with the database
    {
        $this->connection= mysqli_connect('localhost','amitsl_progan','xiiK;w(=Eu7!');
        if ($this->connection->connect_error) {
            die("Connection failed: " . mysqli_connect_error());
}

        if (!mysqli_select_db($this->connection,'amitsl_progan'))
        {
            echo 'Database Not Selected';
        }
        /*

        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if ($this->connection->connect_error) {
            die("Connection failed: ".$this->connection->connect_error);
        } */
    }

    public function get_connection(){
        return $this->connection;
    }

    public function query($sql)//function that check the query if there is a result inside or not and return the result.
    {

        $result = $this->connection->query($sql);
        if (!$result) {
            echo 'Query failed<br>';
            echo 'SQL='.$sql;
            echo '<br>';
            die($this->connection->error);

        }
        else{
            return $result;
        }
    }

    public function escape_string($string){
        return $this->$connection->real_escape_string($string);
    }
}

$database= new database();


    ?>