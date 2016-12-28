<?php
// User class
class User {
    protected static $db_table = "ed_user";

    // get all users in the table (plus name & email)
    public static function find_all_users() {
        global $database;
        $sql = 'SELECT id, username, access_level, employee_id FROM ' . self::$db_table;
        $database->run_query($sql);
        if( $database->query_success ) {
            $results = $database->return_results();
        }

        // get employee data for each
        return self::get_associated_info($results);
    }

    // get user by their id
    public static function find_user_by_id( $user_id ) {
        global $database;
        $sql = 'SELECT * FROM ' . self::$db_table . ' WHERE id = :id LIMIT 1';
        $bind_array = array( ':id' => $user_id );
        $database->run_query($sql, $bind_array);

        if( $database->query_success ) {
            $results = $database->return_results(true);
            $employee_info = Employee::find_employee_by_id( $results['employee_id'] );
            $results = array_merge($results, $employee_info);
        } else {
            $results = 'No Results';
        }
        return $results;
    }

    // grab associated employee data
    private static function get_associated_info( $result_set ) {
        $return_array = [];
        foreach( $result_set as $result ) {
            // if employee_id is not empty
            if( !empty($result['employee_id']) ) {
                $employee_info = Employee::find_employee_by_id( $result['employee_id'] );
                array_push( $return_array, array_merge($result, $employee_info) );
            }
        }
        return $return_array;
    }

    // verify that the user exists in the table
    public static function verify_user($username, $password) {
        global $database;
        $sql = 'SELECT * FROM ' . self::$db_table . ' WHERE username = :username AND password = :password LIMIT 1';
        $bind_array = array(
            ':username' => $username,
            ':password' => $password
        );
        $database->run_query( $sql, $bind_array );
        $results = $database->return_results( true );
        return $results;
    }


    // update user info
    public function update_user() {
        global $database;

    }

}