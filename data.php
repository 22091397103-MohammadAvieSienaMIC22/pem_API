<?php
    require_once('connection.php');

        if (empty($_GET)) {
            $query = mysqli_query( $connection, "SELECT * FROM data" ); 
       
            $result = array();
            while($row = mysqli_fetch_array($query)) {
                array_push( $result, array (
                    'id' => $row['id'],
                    'title' => $row['title'],    
                    'image' => $row['image'],
    
                ) );
        };
    
            echo json_encode (
                array( 'result' => $result)
            );
        } else {
            $query = mysqli_query( $connection, "SELECT * FROM data WHERE id=". $_GET ['id']);
            
            $result = array();
            while($row = $query->fetch_assoc()) {
                $result = array (
                    'id' => $row['id'],
                    'title' => $row['title'],    
                    'image' => $row['image'],
                    'summary' => $row['summary'],
                    'release_at' => $row['release_at'],
                );
        }
        echo json_encode (
            $result
        );

        }
        
 ?>