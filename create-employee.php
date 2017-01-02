<?php include('partials/header.php');

/*
 * If DEPARTMENT table is empty, redirect to create department first
 *
 */

?>
    <div class="row">
        <div class="medium-12 columns">
            <h3>Create Employee</h3>

            <form id="profile-form" action="" method="post">
                <div class="row">
                    <div class="large-7 medium-8 columns">
                        <div class="row">
                            <div class="columns">
                                <label>First Name
                                    <input type="text" name="first_name">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="columns">
                                <label>Last Name
                                    <input type="text" name="last_name">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="columns">
                                <label>Email
                                    <input type="text" name="email">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="columns">
                                <label>Birth Date
                                    <input type="text" name="email">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="columns">
                                <label>Phone Number
                                    <input type="text" name="email">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="columns">
                                <label>Address
                                    <textarea></textarea>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="columns">
                                <label>State Date
                                    <input type="text" name="email">
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
                        <div class="row">
                            <div class="columns">
                                <label>Notes
                                    <textarea></textarea>
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="columns">
                                <label>Department
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
                            <div class="columns">
                                <label>Job Title
                                    <input type="text" name="email">
                                </label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="columns">
                                <label>Starting Salary
                                    <input type="text" name="email">
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row" style="margin:40px auto;">
                    <div class="columns">
                        <button type="submit" name="submit" class="button" style="padding-left:50px; padding-right:50px;">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

<?php include('partials/footer.php'); ?>