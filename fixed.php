<?php

if( isset( $_GET[ 'Submit' ] ) ) {
    $id = $_GET[ 'id' ];

    if(is_numeric( $id )) {
        $data = $db->prepare( 'SELECT first_name, last_name FROM users WHERE user_id = (:id) LIMIT 1;' );
        $data->bindParam( ':id', $id, PDO::PARAM_INT );
        $data->execute();

        if( $data->rowCount() == 1 ) {
            echo '<pre>User ID exists in the database.</pre>';
        }
        else {
            header( $_SERVER[ 'SERVER_PROTOCOL' ] . ' 404 Not Found' );

            echo '<pre>User ID is MISSING from the database.</pre>';
        }
    }
}

?>