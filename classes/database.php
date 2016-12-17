<?php
require_once('/config/config.php');

// create Database class which will contain all methods relating to the DB
class Database {

    // db creds
    private $host = DB_HOST;
    private $dbname = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;

    // query statement
    private $statement;

    // database connection
    public $connection;

    // constructor, run on instantiation
    public function __construct() {
        $this->connect_to_db();
    }

    public function connect_to_db() {
        // data source name
        $dsn = sprintf('mysql:dbname=%s;host=%s', $this->dbname, $this->host);

        // connect to database
        try {
            $this->connection = new PDO($dsn, $this->user, $this->pass);
        } catch( PDOException $error ) {
            die( 'Connection failed: ' . $error->getMessage() );
        }
    }

    // prepare, bind, and execute query.
    public function run_query( $sql ) {
        // prepare statement
        $this->statement = $this->connection->prepare( $sql );
    }

    // bind value to a corresponding parameter in the sql statement (data type string by default)
    public function bind_value( $parameter, $value, $data_type = PDO::PARAM_STR ) {
        $this->statement->bindValue( $parameter, $value, $data_type );
    }

    // execute statement
    public function execute_query() {
        // return true on success, false on failure
        return $this->statement->execute();
    }



}

$database = new Database();