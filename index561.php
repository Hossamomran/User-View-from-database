<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
     rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
     crossorigin="anonymous">
    <title>Data</title>
</head>
<body>
    <h2>Users Details </h2>
  <a class="btn btn-primary" data-bs-toggle="collapse" href="#collapseExample" role="button" 
  aria-expanded="false" aria-controls="collapseExample" style="background-color:green " >
    Add new User
  </a>
</body>
</html>
<?php
    include "connect.php";

    $sql = 'SELECT ID, emp_name,email,gender  FROM emp';
    mysqli_select_db($conn,$dbname);
    $result = mysqli_query($conn,$sql );
    
    if(! $result ) {
       die('Could not get data: ' . mysqli_error($conn));
    }
 
 
    if (mysqli_num_rows($result) > 0) {
       // output data of each row
 
        echo "<table class='table'>";
        echo "<tr>
        <th>#</th>
        <th scope='col'>Name</th>
        <th scope='col'>Email</th>
        <th scope='col'>Gender</th>
        <th scope='col'>Action</th>
        </tr scope='col'>";
       while($row = mysqli_fetch_assoc($result)) {
          echo 
          "<tr>".
          "<td> {$row['ID']}  </td> ".
          "<td> {$row['emp_name']} </td> ".
          "<td>  {$row['email']} </td> ".
          "<td> {$row['gender']} </td> ".
          "<td>".
          " <a href='view.php'><img src='./images/eye.png' style='width: 20px '> <a/>".
          " <a href=#><img src='./images/pencil.png' style='width: 20px '> <a/>".
          " <a href=#><img src='./images/delete.png' style='width: 20px '> <a/>".
          "</td>".
          "</tr>"
          ;
         
       }
        echo "</table>";
 
     } else {
       echo "0 results";
     }
     /* //Its a good practice to release cursor memory
     */
    mysqli_free_result($result);

    //echo "Fetched data successfully\n";

    mysqli_close($conn);
?>