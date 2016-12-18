<?php include('partials/header.php'); ?>
<?php
    $all_users = User::find_all_users();
?>
    <div class="row" style="padding-top:50px;">
        <div class="medium-12 columns">
            <h3>Users</h3>
            <?php if( !empty( $all_users) ) : ?>
                <table class="hover stack">
                    <thead>
                        <th>Username</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </thead>
                    <tbody>
                    <?php foreach( $all_users as $account ) : ?>
                        <tr>
                            <td>
                                <?php echo $account['username']; ?>
                                <br><a href="user-profile?user=<?php echo $account['id']; ?>">Edit User</a>
                            </td>
                            <td><?php echo "{$account['first_name']} {$account['last_name']}"; ?></td>
                            <td><?php echo $account['email']; ?></td>
                            <td><?php echo $account['access_level']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                NO USERS FOUND!
            <?php endif; ?>
        </div>
    </div>
<?php include('partials/footer.php'); ?>