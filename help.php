<?php include('partials/header.php');
if( $_SESSION['access_level'] == 1 ) {
    $level = 'admin';
} else {
    $level = 'employee';
}
?>
    <div class="row">
        <div class="medium-12 columns">
            <h3>Help</h3>
            <p>
                Welcome to the Employee Directory Application. You are registered as an <?php echo $level; ?>.
            </p>
            <ul>
                <li><a href="">Dashboard</a></li>
                <li><a href="">My Info</a></li>
                <li>
                    <a href="">Employees</a>
                    <ul>
                        <li><a href="">Add Employee</a></li>
                    </ul>
                </li>
                <li><a href="">Reports</a></li>
                <li>
                    <a href="">Users</a>
                    <ul>
                        <li><a href="">Add User</a></li>
                    </ul>
                </li>

            </ul>
            <?php if( is_admin() ) : ?>
                <h4>Admin Pages:</h4>
                <ul>
                    <li><a href="">Add Employee</a></li>
                    <li><a href="">Add User</a></li>
                    <li><a href="">Add Job</a></li>
                    <li><a href="">Add Department</a></li>
                    <li><a href=""></a></li>
                </ul>
            <?php endif; ?>


        </div>
    </div>
<?php include('partials/footer.php'); ?>