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
        <div class="medium-12 columns">
            <h3>Employee Name</h3>
            <?php print_r($employee_profile); ?>
        </div>
    </div>

<?php include('partials/footer.php'); ?>