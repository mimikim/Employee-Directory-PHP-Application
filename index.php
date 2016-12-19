<?php include('partials/header.php'); ?>
<div class="row">
    <div class="medium-12 columns">

        <?php

        /*
        while( $row = $stmt->fetchAll(PDO::FETCH_ASSOC) ) {
            echo '<pre>' . print_r( $row, true ) . '</pre>';
        }*/

        $sql = 'SELECT * FROM ed_admin_user WHERE id = :id';
        //$sql = 'INSERT INTO ed_admin_user (id, username) VALUES (:id, :username)';
        //$sql = 'UPDATE ed_admin_user SET password = :password WHERE id = :id ';
        $bind_array = array(
            ':id' => 555,
            //':username' => 'test'
            //':password' => 'password'
        );

        $return = $database->run_query( $sql, $bind_array );

        if ( $database->query_success ) {
            $variable = $database->return_results( true );
            print_r( $variable );
        }

        ?>
        <div class="blog-post">
            <h3>Awesome blog post title <small>3/6/2016</small></h3>
            <img class="thumbnail" src="http://placehold.it/850x350">
            <p>Praesent id metus massa, ut blandit odio. Proin quis tortor orci. Etiam at risus et justo dignissim congue. Donec congue lacinia dui, a porttitor lectus condimentum laoreet. Nunc eu ullamcorper orci. Quisque eget odio ac lectus vestibulum faucibus eget in metus. In pellentesque faucibus vestibulum. Nulla at nulla justo, eget luctus.</p>
            <div class="callout">
                <ul class="menu simple">
                    <li><a href="#">Author: Mike Mikers</a></li>
                    <li><a href="#">Comments: 3</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php include('partials/footer.php'); ?>