<?php include('partials/header.php'); ?>
<?php
/*
 * check logged-in user's permission level
 *
 * if admin-level
 *  check for query string
 *  if query string exists,
 *      get user data based off the user's id #
 *  if no query string, just display current user's profile
 *
 * else if not admin,
 *  just display the current user's profile page regardless of query string
 *
 */
$user_profile = [];
$has_query = check_query_string();
if( $session->access_level == 1 && $has_query ) {
    $user_id = $_GET['user'];
    $user_profile = User::find_user_by_id($user_id);
} else {
    $user_profile = User::find_user_by_id($session->user_id);
}

print_R($user_profile);
?>
<div class="row" style="padding-top:50px;">
    <div class="medium-12 columns">
        <h3>Profile <small>Update Your Information</small></h3>
    </div>
</div>
<div class="row">
    <div class="medium-6 columns">
        <form id="profile-form" action="" method="post">
            <div class="row">
                <div class="columns">
                    <label>Username
                        <input type="text" name="username" disabled value="<?php echo htmlentities($user_profile['username']); ?>">
                        <em>Username cannot be changed</em>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="columns">
                    <label>First Name
                        <input type="text" name="first_name" value="<?php echo htmlentities($user_profile['first_name']); ?>">
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="columns">
                    <label>Last Name
                        <input type="text" name="last_name" value="<?php echo htmlentities($user_profile['last_name']); ?>">
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="columns">
                    <label>Email
                        <input type="text" name="email" value="<?php echo htmlentities($user_profile['email']); ?>">
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="columns">
                    <button type="submit" name="submit" class="button">Submit</button>
                </div>
            </div>
        </form>

    </div>
</div>
<?php include('partials/footer.php'); ?>