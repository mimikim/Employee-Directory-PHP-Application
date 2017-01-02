<?php
// Employee Class
class Employee {
    protected static $db_table = "ed_employee";

    // find all employees
    public static function find_all_employees() {
        global $database;
        $sql = 'SELECT * FROM ' . self::$db_table;
        $database->run_query($sql);
        if( $database->query_success ) {
            $results = $database->return_results();
        }
        return $results;
    }


    // find employee by id
    public static function find_employee_by_id( $user_id ) {
        global $database;
        $sql = 'SELECT * FROM ' . self::$db_table . ' WHERE employee_id = :employee_id LIMIT 1';
        $bind_array = array( ':employee_id' => $user_id );
        $database->run_query($sql, $bind_array);
        return $database->return_results(true);
    }

    // update employee data

    // create employee

    // delete employee

}