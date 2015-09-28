<?php
class Model
{
    protected $db;
    public function __construct() {
        $host        = "anton.hadver.ru";
        $port        = "5432";
        $dbname      = "anton";
        $user        = "anton";
        $password    = "dUfEdEcH7cat";

//        $db = pg_connect( "$host $port $dbname $credentials"  );
//        if(!$db){
//            echo "Error : Unable to open database\n";
//        }


        $dsn = "pgsql:host=$host;port=$port;dbname=$dbname;user=$user;password=$password";
        $opt = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        );
        $pdo = new PDO($dsn, $user, $password, $opt);

        $this->db = $pdo;

    }
    public function get_data()
    {

    }
    public function set_data()
    {

    }

    public function __destructor() {
        $this->db = null;
    }
}