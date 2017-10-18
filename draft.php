<!doctype html>
<html>
    <head>
        <title>Mai Tram</title>
        <style>
            table, td, th {    
                border: 1px solid #ddd;
                text-align: left;
            }

            table {
                border-collapse: collapse;
                width: 100%;
            }

            th, td {
                padding: 15px;
            }
        </style>
    </head>
    <body align="center">
        <h2>Problem Based Learning</h2>
        <?php
            //$server = "LAPTOP-N287OJJ0";
            $server = "localhost";
            $database = array("Database" => "start_db");
            $conn = sqlsrv_connect($server,$database);

            if( $conn ) {
                echo "<p>Connection established</p>";
           }else{
                echo "Connection could not be established.<br />";
                //die( print_r( sqlsrv_errors(), true));
           }

           $sql = "SELECT * FROM Employees";
           $result = sqlsrv_query($conn,$sql,array(),array( "Scrollable" => SQLSRV_CURSOR_KEYSET));
           $total = sqlsrv_num_rows($result);
           if($total != false)
                echo ("<p>Total employees: " . $total . "</p>");
           echo "<table>";
           echo "<tr>";
           echo "<th style='width:25%'>Employees Id</th>";
           echo "<th>Name</th>";
           echo "<th>Gender</th>";
           while($row = sqlsrv_fetch_array($result)) {
               echo "<tr>";
               echo "<td>" . $row['EmployeesId'] . "</td>";
               echo "<td>" . $row['Name'] . "</td>";
               echo "<td>" . $row['Gender'] . "</td>";
               echo "</tr>";
           }
           echo "</table>";
        ?>
    </body>
</html>
