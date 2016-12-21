<?php
// installation class
class SetUp {
    // create config.php file
    static function create_config_file($name, $user, $pass, $host) {
        $fp=fopen('config.php','w');
        $content = "<?php\r\n// defines database connection constants\r\n";
        $content .= "define('DB_HOST','" . addcslashes( $host, "\\'" ) . "');\r\n";
        $content .= "define('DB_USER','" . addcslashes( $user, "\\'" ) . "');\r\n";
        $content .= "define('DB_PASS','" . addcslashes( $pass, "\\'" ) . "');\r\n";
        $content .= "define('DB_NAME','" . addcslashes( $name, "\\'" ) . "');";
        fwrite($fp, $content);
        fclose($fp);
    }

    // create db tables
    static function create_tables() {



    }


}

