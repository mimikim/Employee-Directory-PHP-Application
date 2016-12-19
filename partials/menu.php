<div data-sticky-container>
    <div data-sticky data-options="marginTop: 0;" class="navigation">
        <div class="title-bar">
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
                <ul class="col-large-12 columns sub-nav">
                    <li><a href="index" title="Return to Dashboard">Dashboard</a></li>
                    <li><a href="employees" title="See Employees">Employees</a></li>
                    <?php if( $session->access_level == 1 ) : ?>
                    <li><a href="reports" title="See Reports">Reports</a></li>
                    <li><a href="users" title="See Users">Users</a></li>
                    <?php endif; ?>
                    <li class="float-right">
                        <a href="https://github.com/mimikim/Employee-Directory-PHP-Application" class="icon-font-github" target="_blank" title="View Code on Github">Github</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>