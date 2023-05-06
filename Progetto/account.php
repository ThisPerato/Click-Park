<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Il mio account</title>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Gentium+Plus&display=swap" rel="stylesheet"> 
        <style>
        html{
            background-color: #f2eee3;
        }

        h1 {
    font-family: "Proza Libre", sans-serif;
    display: block;
    margin: 0 auto 25px auto;
    text-align: center;
    font-size: 1.92em;
    font-weight: 600;
    letter-spacing: -0.055em;
  }
  h2 {
    font-family: "Roboto", sans-serif;
    display: block;
    margin: 0 auto 60px auto;
    text-align: center;
    font-weight: 400;
    font-size: 1.25em;
    letter-spacing: -0.015em;
  }
  h3 {
    font-family: "Raleway", sans-serif;
    display: block;
    margin: 0 auto 25px auto;
    text-align: center;
    font-size: 1.92em;
    font-weight: 600;
    letter-spacing: -0.055em;
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

    #menu__toggle {
  opacity: 0;
}
#menu__toggle:checked + .menu__btn > span {
  transform: rotate(45deg);
}
#menu__toggle:checked + .menu__btn > span::before {
  top: 0;
  transform: rotate(0deg);
}
#menu__toggle:checked + .menu__btn > span::after {
  top: 0;
  transform: rotate(90deg);
}
#menu__toggle:checked ~ .menu__box {
  left: 0 !important;
}
.menu__btn {
  position: fixed;
  top: 20px;
  left: 20px;
  width: 26px;
  height: 26px;
  cursor: pointer;
  z-index: 1;
}
.menu__btn > span,
.menu__btn > span::before,
.menu__btn > span::after {
  display: block;
  position: absolute;
  width: 100%;
  height: 2px;
  background-color: #616161;
  transition-duration: .25s;
}
.menu__btn > span::before {
  content: '';
  top: -8px;
}
.menu__btn > span::after {
  content: '';
  top: 8px;
}
.menu__box {
  display: block;
  position: fixed;
  top: 0;
  left: -100%;
  width: 300px;
  height: 100%;
  margin: 0;
  padding: 80px 0;
  list-style: none;
  background-color: #ECEFF1;
  box-shadow: 2px 2px 6px rgba(0, 0, 0, .4);
  transition-duration: .25s;
}
.menu__item {
  display: block;
  padding: 12px 24px;
  color: #333;
  font-family: 'Roboto', sans-serif;
  font-size: 20px;
  font-weight: 600;
  text-decoration: none;
  transition-duration: .25s;
}
.menu__item:hover {
  background-color: #CFD8DC;
}

button {
    padding: 10px 60px;
    background: #fff;
    border: 0;
    outline: none;
    cursor: pointer;
    font-size: 22px;
    font-weight: 500;
    border-radius: 30px;
    display: inline-block;
    transition-duration: 0.8s;
    text-align: center;


  }
  button:hover {
    background-color: #17ac4e;
    color:white;
  }

  form{
    display: flex;
    align-items: center;
    flex-direction: column;
    flex-wrap: wrap;
    align-content: center;
    justify-content: flex-start;
  }

 

        </style>

    </head>

    <body>

    <?php
    error_reporting(-1);
    ini_set('display_errors', 'On');
    set_error_handler("var_dump");
    session_start();

    $dbconn=pg_connect("host=localhost user=postgres password=250900 port=5432 dbname=Progetto") or die("Si è verificato un errore di connessione!". pg_last_error());
    $nome=$_SESSION['nome'];
    $user_id=$_SESSION['user_id'];
    $query= "SELECT * FROM utenti where nome='$nome' and user_id=$user_id";
    $result = pg_query($dbconn, $query);
        if ($line=pg_fetch_array($result)){
            $cognome=$line['cognome'];
            $email=$line['email'];
            echo "<h1> Ciao $nome! </h1>";
            echo "<h2>Ecco i tuoi dati inseriti:</h2>";
            echo "<br>";
            echo "<h3> Nome:</h3><h2>$nome</h2>";
            echo "<h3> Cognome:</h3><h2>$cognome</h2>";
            echo "<h3> Indirizzo e-mail:</h3><h2>$email</h2>";
            echo "<h3> ID utente:</h3><h2> $user_id</h2>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<br>";
            echo "<h1>In basso, potrai trovare tutte le tue operazioni effettuate su Click & Park.</h1>";
            $query= "SELECT * FROM storico where user_id='$user_id'";
            $result = pg_query($dbconn, $query);
            echo "<table>";
            $firstline= true;
            while ($tuple=pg_fetch_array($result,null,PGSQL_ASSOC)){
                if ($firstline){
                    echo "<tr>";
                    foreach ($tuple as $colname => $value){
                        if ($colname=="user_id"){
                            echo "<th>";
                            print "ID utente";
                            echo "</th>";
                        }
                        if ($colname=="id_tran"){
                            echo "<th>";
                            print "ID transazione";
                            echo "</th>";
                        }
                        if ($colname=="via"){
                            echo "<th>";
                            print "Via";
                            echo "</th>";
                        }
                        if ($colname=="ora_arrivo"){
                            echo "<th>";
                            print "Orario di arrivo";
                            echo "</th>";
                        }
                        if ($colname=="ora_partenza"){
                            echo "<th>";
                            print "Orario di Partenza";
                            echo "</th>";
                        }
                        if ($colname=="targa"){
                            echo "<th>";
                            print "Targa";
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

<div class="hamburger-menu">
                    <input id="menu__toggle" type="checkbox" />
                        <label class="menu__btn" for="menu__toggle">
                          <span></span>
                        </label>
                    
                        <ul class="menu__box">
                          <li><a class="menu__item" href="index.php">Home</a></li>
                          <li><a class="menu__item" href="search.html">Cerca parcheggio</a></li>
                          <li><a class="menu__item" href="account.php">Il mio account</a></li>
                          <li><a class="menu__item" href="insert.html">Aggiungi un parcheggio </a></li>
                          <li><a class="menu__item" href="contact-us.html">Contattaci</a></li>
                          <li><a class="menu__item" href="index.html">Logout</a></li>
                        </ul>
                      </div>
<footer class="w3-center w3-black w3-padding-16">
<div class="buttons">
    <form action="modify.php" method="post" name="buttons">
                <button type="submit" name="btn_2" id="btn_2">Clicca qui per modificare la password</button>
    </form>
    <form action="change.php" method="post" name="buttons1">
    <button type="submit" name="btn_2" id="btn_2">Clicca qui per modificare l'email</button>
    </form>
    </div>
    </div>
 



    </body>
    </html>
   