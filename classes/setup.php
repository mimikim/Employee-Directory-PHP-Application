<?php
// installation class
class SetUp {
    private static $user_table = 'ed_user';
    private static $employee_table = 'ed_employee';
    private static $job_table = 'ed_job';
    private static $salary_table = 'ed_salary';
    private static $department_table = 'ed_department';

    public $first_name;
    public $last_name;
    public $email;
    public $username;
    public $password;

    // create config.php file
    static public function create_config_file($name, $user, $pass, $host) {
        $fp=fopen('config.php','w');
        $content = "<?php\r\n// defines database connection constants\r\n";
        $content .= "define('DB_HOST','" . addcslashes( $host, "\\'" ) . "');\r\n";
        $content .= "define('DB_USER','" . addcslashes( $user, "\\'" ) . "');\r\n";
        $content .= "define('DB_PASS','" . addcslashes( $pass, "\\'" ) . "');\r\n";
        $content .= "define('DB_NAME','" . addcslashes( $name, "\\'" ) . "');";
        fwrite($fp, $content);
        fclose($fp);
    }

    // create ed_user, ed_employee, ed_job, ed_salary, ed_department
    static public function create_tables() {
        global $database;

        $employee_sql = 'CREATE TABLE IF NOT EXISTS ' . self::$employee_table . ' (
            employee_id INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
            first_name VARCHAR(150) NOT NULL,
            last_name VARCHAR(150) NOT NULL,
            email VARCHAR(150) NOT NULL,
            start_date DATE NOT NULL,
            end_date DATE NULL,
            birth_date DATE NOT NULL,
            phone_number CHAR(10) NOT NULL,
            address VARCHAR(150) NOT NULL,
            notes VARCHAR(255) NULL,
            picture VARCHAR(255) NULL
            )';
        $user_sql = 'CREATE TABLE IF NOT EXISTS ' . self::$user_table . ' (
            id INT(11) AUTO_INCREMENT PRIMARY KEY NOT NULL,
            username VARCHAR(150) NOT NULL,
            password VARCHAR(150) NOT NULL,
            access_level INT(1) DEFAULT 0,
            employee_id INT NULL,
            FOREIGN KEY (employee_id) REFERENCES '. self::$employee_table . '(employee_id)
            ON DELETE CASCADE
            ON UPDATE CASCADE
            )';
        $dept_sql = 'CREATE TABLE IF NOT EXISTS ' . self::$department_table . ' (
            department_id INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
            department_title VARCHAR(150) NOT NULL
            )';
        $job_sql = 'CREATE TABLE IF NOT EXISTS ' . self::$job_table . ' (
            job_id INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
            employee_id INT NULL,
            FOREIGN KEY (employee_id) REFERENCES '. self::$employee_table . '(employee_id)
            ON DELETE CASCADE
            ON UPDATE CASCADE,
            job_title VARCHAR(150) NOT NULL,
            job_department INT NOT NULL,
            FOREIGN KEY (job_department) REFERENCES '. self::$department_table . '(department_id)
            ON DELETE CASCADE
            ON UPDATE CASCADE,
            effective_date DATE NOT NULL
            )';
        $salary_sql = 'CREATE TABLE IF NOT EXISTS ' . self::$salary_table . ' (
            salary_id INT(10) AUTO_INCREMENT PRIMARY KEY NOT NULL,
            employee_id INT NULL,
            FOREIGN KEY (employee_id) REFERENCES '. self::$employee_table . '(employee_id)
            ON DELETE CASCADE
            ON UPDATE CASCADE,
            salary INT(10),
            effective_date DATE NOT NULL
            )';

        $database->run_query($employee_sql);
        $database->run_query($user_sql);
        $database->run_query($dept_sql);
        $database->run_query($job_sql);
        $database->run_query($salary_sql);
        //return $database->query_success;
    }

    public function create_first_user() {
        global $database;

        // insert first record into employee
        $insert_employee = 'INSERT INTO ' .  self::$employee_table . ' ( first_name, last_name, email )
VALUES ( :first_name, :last_name, :email )';
        $employee_value_array = array(
            ':first_name'   => $this->first_name,
            ':last_name'    => $this->last_name,
            ':email'        => $this->email
        );
        $database->run_query($insert_employee, $employee_value_array);
        $employee_entry = $database->get_insert_id();

        $sql = 'INSERT INTO ' .  self::$user_table . ' SET username = :username,
            password = :password,
            access_level = :access_level,
            employee_id = (SELECT employee_id FROM ' . self::$employee_table . ' WHERE employee_id = ' . $employee_entry . ')';

        $user_value_array = array(
            ':username'     => $this->username,
            ':password'     => $this->password,
            ':access_level' => 1
        );
        $database->run_query($sql, $user_value_array);

        return $database->query_success;
    }

    public function send_mail() {
        $to      = $this->email;
        $subject = 'Your login credentials for the Employee Directory Application!';
        ob_start() ?>
            <h1>Your Login Credentials:</h1>
            <div>
                <strong>Username:</strong> <?php echo $this->username; ?><br>
                <strong>Password:</strong> <?php echo $this->password; ?><br>
                <strong>First Name:</strong> <?php echo $this->first_name; ?><br>
                <strong>Last Name:</strong> <?php echo $this->last_name; ?>
            </div>
        <?php
        $message= ob_get_contents();
        ob_end_clean();
        mail($to, $subject, $message);
    }

    public function is_db_empty() {
        global $database;
        $sql = "SELECT * FROM information_schema.tables WHERE table_schema = '" . DB_NAME . "'";
        $database->run_query($sql);
        $results = $database->return_results();
        // if is empty, return true (is empty)
        if( empty($results) ) {
            return true;
        } else {
            return false;
        }
    }

}

