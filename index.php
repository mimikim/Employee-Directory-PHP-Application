<?php include('partials/header.php'); ?>

<div class="row" id="content" style="padding-top:50px;">
    <div class="medium-12 columns">
        <?php

        /*$id = 1;
        $stmt = $dbh->prepare('SELECT * FROM admin_users WHERE id = :id');
        $stmt->execute( array('id' => $id) );

        while( $row = $stmt->fetchAll(PDO::FETCH_ASSOC) ) {
            echo '<pre>' . print_r( $row, true ) . '</pre>';
        }*/

        $sql = 'SELECT * FROM admin_users WHERE id = :id';
        $database->run_query($sql);
        $database->bind_value( ':id', 5 );
        $result = $database->execute_query();

        echo $result;

        ?>

    </div>
</div>

<?php include('partials/footer.php'); ?>