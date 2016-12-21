<?php
require_once('/config/config.php');

// create Database class which will contain all methods relating to the DB
class Database {

    // db creds
    private $host = DB_HOST;
    private $dbname = DB_NAME;
    private $user = DB_USER;
    private $pass = DB_PASS;

    private $statement; // query statement
    private $connection; // database connection
    private $query_results = []; // variable to hold query results
    public $query_success = false; // stores whether query was successfully run

    // constructor, run on instantiation
    public function __construct() {
        $this->connect_to_db();
    }

    // connect to db
    public function connect_to_db() {
        // data source name
        $dsn = sprintf('mysql:dbname=%s;host=%s', $this->dbname, $this->host);

        // connect to database
        try {
            $this->connection = new PDO($dsn, $this->user, $this->pass);

            // check if empty, if empty run user set-up script
            if( $this->check_if_empty() ) {
                redirect('config/install?step=2');
            }
        } catch( PDOException $error ) {
            $error_code = $error->getCode();
            //echo $error_code;
            // if db connection fails because of the following codes, run install
            if( $error_code == 1049 || $error_code == 1045 || $error_code == 2002 ) {
                redirect('config/install');
            } else {
                die( 'Connection failed' );
            }
        }
    }

    // check if the database is empty
    private function check_if_empty() {
        $sql = "SELECT * FROM information_schema.tables WHERE table_schema = '" . DB_NAME . "'";
        $this->run_query($sql);
        $results = $this->return_results();

        if( empty( $results ) ) {
            return true;
        } else {
            //print_r( $results );
            return false;
        }
    }

    // prepare statement
    private function prepare_query( $sql ) {
        $this->statement = $this->connection->prepare( $sql );
    }

    // bind value to a corresponding parameter in the sql statement (data type string by default)
    private function bind_value( $bind_array ) {
        foreach( $bind_array as $key => $value ) {
            $data_type = $this->get_data_type($value);
            $this->statement->bindValue( $key, $value, $data_type );
        }
    }

    private function get_data_type( $value ) {
        switch ($value) {
            case is_int($value):
                $type = PDO::PARAM_INT;
                break;
            case is_bool($value):
                $type = PDO::PARAM_BOOL;
                break;
            case is_null($value):
                $type = PDO::PARAM_NULL;
                break;
            default:
                $type = PDO::PARAM_STR;
        }
        return $type;
    }

    // execute statement
    private function execute_query() {
        // return true on success, false on failure
        return $this->statement->execute();
    }

    // display results
    public function return_results( $is_single = false ) {
        if ( $is_single ) {
            $results = $this->query_results = $this->statement->fetch(PDO::FETCH_ASSOC);
        } else {
            $results = $this->query_results = $this->statement->fetchAll(PDO::FETCH_ASSOC);
        }
        return $results;
    }

    // check if results exist
    public function result_exists() {
        if( !empty($this->query_results) ) {
            return true;
        } else {
            return false;
        }
    }

    // prepare, bind, and execute query. returns success or fail message
    public function run_query( $sql, $bind_array = null ) {
        // return variable
        $return = null;

        // prepare statement
        $this->prepare_query( $sql );

        // bind values if provided
        if( !empty($bind_array) ) {
            $this->bind_value( $bind_array );
        }

        // execute
        $execute = $this->execute_query();
        if( $execute ) {
            $return = 'Query successfully run';
            $this->query_success = true;
        } else {
            $return = 'Query failed to execute';
            $this->query_success = false;
        }
        //return $return;
    }

}

$database = new Database();