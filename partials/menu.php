<div data-sticky-container>
    <div data-sticky data-options="marginTop: 0;" style="width: 100%;">
        <div class="title-bar" style="width:100%">
            <div class="row">
                <div class="title-bar-left">
                    Employee Directory Application
                </div>
                <div class="title-bar-right">
                    <ul class="dropdown menu" data-dropdown-menu>
                        <li>
                            <a href="#"><?php echo $session->display_name; ?></a>
                            <ul class="menu" style="text-align: left;">
                                <li><a href="user-profile">Settings</a></li>
                                <li><a href="logout">Log Out</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div style="background: #5eb4ed;">
            <div class="row">
                <ul class="col-large-12 columns" style="list-style:none; margin: 10px auto;">
                    <li style="display: inline-block; margin-right: 40px;"><a href="index" style="color:#fff;">Dashboard</a></li>
                    <li style="display: inline-block; margin-right: 40px;"><a href="employees" style="color:#fff;">Employees</a></li>
                    <?php if( $session->access_level == 1 ) : ?>
                    <li style="display: inline-block; margin-right: 40px;"><a href="reports" style="color:#fff;">Reports</a></li>
                    <li style="display: inline-block;"><a href="users" style="color:#fff;">Users</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</div>