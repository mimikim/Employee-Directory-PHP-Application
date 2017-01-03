<?php include('partials/header.php');

$has_query = has_query_string();
if( is_admin() && $has_query ) {
    $employee_id = $_GET['user'];
    $employee_profile = Employee::find_employee_by_id($employee_id);
} else {
    $employee_id = $_SESSION['user'];
    $employee_profile = Employee::find_employee_by_id($employee_id);
}

/*
 * if submitted, check to see if any of the inputs have been changed by
 * comparing them
 *
 */
if(isset($_POST['submit'])) {
    echo 'submitted';

}
?>
    <div class="row">
        <div class="column">
            <pre><?php #print_r($employee_profile); ?></pre>
        </div>
        <div class="medium-3 columns">
            <div>
                <div style="width:200px; height:200px; max-width: 100%; border:2px solid black;"></div>
            </div>
            <hr>
            <div>
                Job Title
                <br>
                Job Department
                <br>
                Salary
            </div>
            <hr>
            <div>
                Hire Date
                <br>
                End Date
            </div>
        </div>
        <div class="medium-9 columns">
            <h3>
                <?php echo $employee_profile['first_name'] . ' ' . $employee_profile['last_name']; ?>
                <br>
                <small>Job Title</small>
            </h3>
            <hr>
            <div>
                Employee Number
                <br>
                Nickname
                <br>
                Birth Date
                <br>
                Gender
            </div>
            <hr>
            <div>
                Email
                <br>
                Phone
                <br>
                Address
            </div>
            <hr>
            <div>
                Notes
            </div>
        </div>
    </div>


<?php include('partials/footer.php'); ?>