<?php
// manages sessions (login/logouts)
class Session {

    private $signed_in;

    public function __construct() {
        // on website load, start session
        session_start();

        // check if the user is logged in
        if( isset($_SESSION['user']) ) {
            $this->signed_in = true;
        } else {
            $this->signed_in = false;
        }
    }

    // check if logged in
    public function is_logged_in() {
        return $this->signed_in;
    }

    // function to log in user
    public function login($user) {
        // assign $user_id to current session, and to User Class' id property
        $_SESSION['user'] = $user['id'];
        $_SESSION['access_level'] = $user['access_level'];
        $_SESSION['display_name'] = $user['display_name'];
        $this->signed_in = true;
    }

    // function to log out
    public function logout() {
        // unset/destroys variables
        unset($_SESSION['user']);
        unset($_SESSION['access_level']);
        unset($_SESSION['display_name']);
        $this->signed_in = false;
    }

}

$session = new Session;