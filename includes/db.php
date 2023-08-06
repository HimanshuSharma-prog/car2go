<?php
    $dbhost = "localhost:3306";
    $dbuser = "root";
    $dbpass = "admin123";
    $db = "car2go";
    $conn = mysqli_connect($dbhost, $dbuser, $dbpass,$db);

    if($conn){
        echo "Connected";
    }else{
        echo "not Connected";
    }

    // if($conn){
    //     echo `
    //         <script>
    //             alert('Connected')
    //         </script>
    //     `;
    // }else{
    //     echo `
    //         <script>
    //             alert('not Connected')
    //         </script>
    //     `;
    // }
?>