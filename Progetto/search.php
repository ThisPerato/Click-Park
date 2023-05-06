<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Cerca parcheggio</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="style3.css">
    <title>Ricerca in corso..</title>
</head>

<style>
    body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", sans-serif}

    html{
        background-color: #f2eee3;
    }

    table { 
	width: 750px; 
	border-collapse: collapse; 
	margin:50px auto;
	}

/* Zebra striping */
tr:nth-of-type(odd) { 
	background: #eee; 
	}

th { 
	background: #3498db; 
	color: white; 
	font-weight: bold; 
	}

td, th { 
	padding: 10px; 
	border: 1px solid #ccc; 
	text-align: left; 
	font-size: 18px;
	}

    .final_choice{
	display: flex;
	justify-content: center;
	align-items: center;
	flex-direction: column;
	font-family: 'Montserrat', sans-serif;
    }


    </style>

<body>



<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
session_start();



$municipio="";
$via="";

$dbconn=pg_connect("host=localhost user=postgres password=250900 port=5432 dbname=Progetto") or die("Si è verificato un errore di connessione!". pg_last_error());

if (isset($_POST['btn_1'])){
    $municipio = $_POST['municipio'];
    $mun_check_query = "SELECT * FROM parcheggi WHERE $municipio is not null";
    $result = pg_query($dbconn, $mun_check_query);
    echo "<table>";
    $firstline= true;
    while ($tuple=pg_fetch_array($result,null,PGSQL_ASSOC)){
        if ($firstline){
            echo "<tr>";
            foreach ($tuple as $colname => $value){
                if ($colname=="municipio_i"){
                    echo "<th>";
                    print "Municipio I";
                    echo "</th>";
                }
                if ($colname=="municipio_ii"){
                    echo "<th>";
                    print "Municipio II";
                    echo "</th>";
                }
                if ($colname=="municipio_iii"){
                    echo "<th>";
                    print "Municipio III";
                    echo "</th>";
                }
                if ($colname=="municipio_iv"){
                    echo "<th>";
                    print "Municipio IV";
                    echo "</th>";
                }
                if ($colname=="municipio_v"){
                    echo "<th>";
                    print "Municipio V";
                    echo "</th>";
                }
                if ($colname=="municipio_vi"){
                    echo "<th>";
                    print "Municipio VI";
                    echo "</th>";
                }
                if ($colname=="municipio_vii"){
                    echo "<th>";
                    print "Municipio I";
                    echo "</th>";
                }
                if ($colname=="municipio_viii"){
                    echo "<th>";
                    print "Municipio VIII";
                    echo "</th>";
                }
                if ($colname=="municipio_ix"){
                    echo "<th>";
                    print "Municipio IX";
                    echo "</th>";
                }
                if ($colname=="municipio_x"){
                    echo "<th>";
                    print "Municipio X";
                    echo "</th>";
                }
                if ($colname=="municipio_xi"){
                    echo "<th>";
                    print "Municipio XI";
                    echo "</th>";
                }
                if ($colname=="municipio_xii"){
                    echo "<th>";
                    print "Municipio XII";
                    echo "</th>";
                }
                if ($colname=="municipio_xiii"){
                    echo "<th>";
                    print "Municipio XIII";
                    echo "</th>";
                }
                if ($colname=="municipio_xiv"){
                    echo "<th>";
                    print "Municipio XIV";
                    echo "</th>";
                }
                if ($colname=="municipio_xv"){
                    echo "<th>";
                    print "Municipio XV";
                    echo "</th>";
                }
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
}
?>

<footer class="w3-center w3-black w3-padding-64">
    <div class=final_choice>
        <div class=option_1>
            <h1> Puoi confermare la tua scelta, inserendo la via..</h1>
        <form name="via" method="post" action="confirm.php">
        <select name="municipio" id="selectmunicipio1" required>
                  <option value="">Seleziona un municipio</option>
                  <option value="municipio_i">Municipio I</option>
                  <option value="municipio_ii">Municipio II</option>
                  <option value="municipio_iii">Municipio III</option>
                  <option value="municipio_iv">Municipio IV</option>
                  <option value="municipio_v">Municipio V</option>
                  <option value="municipio_vi">Municipio VI</option>
                  <option value="municipio_vii">Municipio VII</option>
                  <option value="municipio_viii">Municipio VIII</option>
                  <option value="municipio_ix">Municipio IX</option>
                  <option value="municipio_x">Municipio X</option>
                  <option value="municipio_xi">Municipio XI</option>
                  <option value="municipio_xii">Municipio XII</option>
                  <option value="municipio_xiii">Municipio XIII</option>
                  <option value="municipio_xiv">Municipio XIV</option>
                  <option value="municipio_xv">Municipio XV</option>
                </select>
        <input type="text" id="via_ricerca" name="via_ricerca" placeholder="Inserisci una via" required>
        <br><br>
        <button class="modal_button" type="submit" name="btn_3" >Invia</button>
</form>
</div>
<div class=option_2>
    <br><br>
    <h1> .. oppure puoi tornare indietro, cliccando <a href=search.html> qui </a>: 

</footer>
</body>
</html>
