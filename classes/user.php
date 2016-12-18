<?php
// User class
class User {
    protected static $db_table = "ed_admin_user";

    // get all users in the table
    public static function find_all_users() {
        global $database;
        $sql = 'SELECT id, username, email, access_level, first_name, last_name FROM ' . self::$db_table;
        $database->run_query($sql);
        if( $database->query_success ) {
            $results = $database->return_results();
        }
        return $results;
    }

    // get user by their id
    public static function find_user_by_id( $user_id ) {
        global $database;
        $sql = 'SELECT * FROM ' . self::$db_table . ' WHERE id = :id LIMIT 1';
        $bind_array = array( ':id' => $user_id );
        $database->run_query($sql, $bind_array);

        if( $database->query_success ) {
            $results = $database->return_results( true );
        } else {
            $results = 'query failed';
        }
        return $results;
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

}