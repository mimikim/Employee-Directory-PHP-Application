<?php include('partials/header.php'); ?>

    <div class="row">
        <div class="medium-12 columns">
            <h3>Employees</h3>
            <?php if( is_admin() ) : ?>
            <div class="table-functions">
                <a class="button success" href="#">Add Employee</a>
            </div>
            <?php endif; ?>
            <table class="hover stack" id="employee-table">
                <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name <small>(Last, First)</small></th>
                    <th>Job Title</th>
                    <th>Department</th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td valign="top"><img class="thumbnail" src="http://placehold.it/50x50"></td>
                        <td valign="top"><a href="employee-profile?user=">Doe, John</a></td>
                        <td valign="top">Web Engineer</td>
                        <td valign="top">Engineering</td>
                    </tr>
                    <tr>
                        <td valign="top"><img class="thumbnail" src="http://placehold.it/50x50"></td>
                        <td valign="top"><a href="employee-profile?user=">Doe, John</a></td>
                        <td valign="top">Web Engineer</td>
                        <td valign="top">Engineering</td>
                    </tr>
                    <tr>
                        <td valign="top"><img class="thumbnail" src="http://placehold.it/50x50"></td>
                        <td valign="top"><a href="employee-profile?user=">Doe, John</a></td>
                        <td valign="top">Web Engineer</td>
                        <td valign="top">Engineering</td>
                    </tr>
                    <tr>
                        <td valign="top"><img class="thumbnail" src="http://placehold.it/50x50"></td>
                        <td valign="top"><a href="employee-profile?user=">Doe, John</a></td>
                        <td valign="top">Web Engineer</td>
                        <td valign="top">Engineering</td>
                    </tr>
                    <tr>
                        <td valign="top"><img class="thumbnail" src="http://placehold.it/50x50"></td>
                        <td valign="top"><a href="employee-profile?user=">Doe, John</a></td>
                        <td valign="top">Web Engineer</td>
                        <td valign="top">Engineering</td>
                    </tr>
                    <tr>
                        <td valign="top"><img class="thumbnail" src="http://placehold.it/50x50"></td>
                        <td valign="top"><a href="employee-profile?user=">Doe, John</a></td>
                        <td valign="top">Web Engineer</td>
                        <td valign="top">Engineering</td>
                    </tr>
                    <tr>
                        <td valign="top"><img class="thumbnail" src="http://placehold.it/50x50"></td>
                        <td valign="top"><a href="employee-profile?user=">Doe, John</a></td>
                        <td valign="top">Web Engineer</td>
                        <td valign="top">Engineering</td>
                    </tr>
                    <tr>
                        <td valign="top"><img class="thumbnail" src="http://placehold.it/50x50"></td>
                        <td valign="top"><a href="employee-profile?user=">Doe, John</a></td>
                        <td valign="top">Web Engineer</td>
                        <td valign="top">Engineering</td>
                    </tr>
                    <tr>
                        <td valign="top"><img class="thumbnail" src="http://placehold.it/50x50"></td>
                        <td valign="top"><a href="employee-profile?user=">Doe, John</a></td>
                        <td valign="top">Web Engineer</td>
                        <td valign="top">Engineering</td>
                    </tr>
                    <tr>
                        <td valign="top"><img class="thumbnail" src="http://placehold.it/50x50"></td>
                        <td valign="top"><a href="employee-profile?user=">Doe, Jane</a></td>
                        <td valign="top">Web Engineer</td>
                        <td valign="top">Engineering</td>
                    </tr>
                    <tr>
                        <td valign="top"><img class="thumbnail" src="http://placehold.it/50x50"></td>
                        <td valign="top"><a href="employee-profile?user=">Doe, John</a></td>
                        <td valign="top">Web Engineer</td>
                        <td valign="top">Marketing</td>
                    </tr>
                    <tr>
                        <td valign="top"><img class="thumbnail" src="http://placehold.it/50x50"></td>
                        <td valign="top"><a href="employee-profile?user=">Doe, John</a></td>
                        <td valign="top">Web Engineer</td>
                        <td valign="top">Marketing</td>
                    </tr>
                    <tr>
                        <td valign="top"><img class="thumbnail" src="http://placehold.it/50x50"></td>
                        <td valign="top"><a href="employee-profile?user=">Doe, John</a></td>
                        <td valign="top">Web Engineer</td>
                        <td valign="top">Marketing</td>
                    </tr>
                    <tr>
                        <td valign="top"><img class="thumbnail" src="http://placehold.it/50x50"></td>
                        <td valign="top"><a href="employee-profile?user=">Doe, John</a></td>
                        <td valign="top">Web Engineer</td>
                        <td valign="top">Marketing</td>
                    </tr>
                    <tr>
                        <td valign="top"><img class="thumbnail" src="http://placehold.it/50x50"></td>
                        <td valign="top"><a href="employee-profile?user=">Alpha, John</a></td>
                        <td valign="top">Web Engineer</td>
                        <td valign="top">Marketing</td>
                    </tr>
                </tbody>
            </table>
            <?php if( is_admin() ) : ?>
            <div class="table-buttons"></div>
            <?php endif; ?>
        </div>

    </div>


<?php include('partials/footer.php'); ?>