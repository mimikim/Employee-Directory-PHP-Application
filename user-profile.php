<?php include('partials/header.php');
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

//print_R($user_profile);
?>
<div class="row">
    <div class="medium-12 columns">
        <h3>Profile <small>Update Your Information</small></h3>
    </div>
</div>
    <form id="profile-form" action="" method="post">
        <div class="row">
            <div class="large-7 medium-8 columns">
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
            </div>
            <div class="large-5 medium-4 columns">
                <div class="row">
                    <div class="columns">
                        <label>Profile Picture</label>
                        <img class="thumbnail" src="http://placehold.it/150x150">
                        <br>
                        <label for="exampleFileUpload" class="button">Upload File</label>
                        <input type="file" id="exampleFileUpload" class="show-for-sr">
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="columns"><h5>Admin</h5></div>
        </div>
        <div class="row">
            <div class="large-7 medium-8 columns">
                <div class="row">
                    <div class="columns">
                        <label>Assign Employee to User
                            <select>
                                <option value="husker">Husker</option>
                                <option value="starbuck">Starbuck</option>
                                <option value="hotdog">Hot Dog</option>
                                <option value="apollo">Apollo</option>
                            </select>
                        </label>
                    </div>
                </div>
                <div class="row">
                    <fieldset class="columns">
                        <legend>Change Access Level</legend>
                        <input type="radio" name="pokemon" value="Red" id="pokemonRed" required checked><label for="pokemonRed">Employee</label>
                        <input type="radio" name="pokemon" value="Blue" id="pokemonBlue"><label for="pokemonBlue">Admin</label>
                    </fieldset>
                </div>
            </div>
        </div>

        <?php if( is_admin() && $user_profile['id'] != $session->user_id ) : ?>

        <?php endif; ?>

        <div class="row" style="margin:40px auto;">
            <div class="columns">
                <button type="submit" name="submit" class="button" style="padding-left:50px; padding-right:50px;">Submit</button>
            </div>
        </div>
    </form>

<?php include('partials/footer.php'); ?>