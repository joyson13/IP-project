
<body>
<?php
include("mysqlconnection.php");
$sql = "select * from client";
$sqlcolumns = "Describe client";
if(($result = $conn->query($sql))->num_rows>0)
{   echo "<h1>Registered users on the site</h1>";
    echo "<table border=1 style='border-spacing=5pc;'><tr>";
    $resultcolumns = $conn->query($sql);

    $columns = $resultcolumns->fetch_assoc();
    $columns = array_keys($columns);
    foreach($columns AS $columns)
    {
     echo "<th>".$columns."</th>";
    }
    //$columnnames = array_keys($columns);
    //echo "<th>".$columnnames[0]."</th><th>".$columnnames[2]."</th>";
    echo "</tr>";

    while($row = $result->fetch_assoc() )
    {   echo "<tr>";
        foreach($row AS $row=>$value)
        {
            echo "<td>".$value."</td>";
        }
        //echo "<tr><td>".$row['name']."</td><td>".$row['username']."</td></tr>";
        echo "</tr>";
    }
    
    echo "</table>";
}
else{
    echo "<h1>No rows returned by the query</h1>";
}

$conn->close();

?>
</body>