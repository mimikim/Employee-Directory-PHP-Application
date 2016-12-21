<?php include('partials/header.php');

$user_profile = [];
$has_query = has_query_string();

if( is_admin() && $has_query ) {
    $user_id = $_GET['user'];
    $user_profile = User::find_user_by_id($user_id);
} else {
    $user_id = $session->user_id;
    $user_profile = User::find_user_by_id($user_id);
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
        </div>
    </div>

<?php include('partials/footer.php'); ?>