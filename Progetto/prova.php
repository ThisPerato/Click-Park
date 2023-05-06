<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Prova </title>
        <style>
            td{
                border: 2px solid;
                margin: 4px;
            }
        </style>
</head>
<body>
    <?php
       $dbconn=pg_connect("host=localhost password=250900 user=postgres port=5432 dbname=Progetto") or die("Si è verificato un errore di connessione!". pg_last_error());
       $query = "SELECT municipio_i FROM parcheggi where municipio_i is not null;";
       $result = pg_query($dbconn,$query);
       echo "<table>";
       $firstline=true;
       while ($tuple=pg_fetch_array($result,null,PGSQL_ASSOC)){
        if ($firstline){
           echo "<tr>";
           foreach ($tuple as $colname => $value){
            echo "<th>";
            print "Municipio I";
            echo "</th>";
           }
            echo "</tr>";
            $firstline=false;
        }
        echo "<tr>";
        foreach ($tuple as $colname => $value){
            echo "<td>";
            print $value;
            echo "</td>";
        }
        echo "</tr>";
       }
       echo "</table>";
       ?>
</body>
</html>