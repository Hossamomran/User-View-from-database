<?php

include "connect.php";



function RecordNum($ID){
    while($row = mysqli_fetch_assoc($result)){
        if ($row['ID']== $ID){
            foreach($row as $user){
                $user_ID= $user['ID'];
                $user_Name=$user['name'];
                $user_email=$user['email'];
                $user_gender=$user['gender'];
            }
        }
    }
}

    $sql = 'SELECT emp_name ,email, gender  FROM emp';
    mysqli_select_db($conn,$dbname);
    $result = mysqli_query($conn,$sql );
    
    if(! $result ) {
       die('Could not get data: ' . mysqli_error($conn));
    }
 
 
    if (mysqli_num_rows($result) > 0) {
       // output data of each row
       foreach($result as $row) {
        echo "<H2>View Record</H2> <br> ".
        "<label> Name </label><br>".
        "{$row['emp_name']} <br>".
        "<label> Email </label><br>".
        "{$row['email']} <br>".
        "<label> Gender </label><br>".
        "{$row['gender']}<br>".
        "<p> You will recieve a message </p>";





       }


    }



 ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   
</body>
</html>