<!DOCTYPE html>
<html lang=it>
    <head>
    <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
        <title>Modifica dati</title>
        <style>

    .mainDiv {
    display: flex;
    min-height: 100%;
    align-items: center;
    justify-content: center;
    background-color: #f9f9f9;
    font-family: 'Open Sans', sans-serif;
  }
 .cardStyle {
    width: 500px;
    border-color: white;
    background: #fff;
    padding: 36px 0;
    border-radius: 4px;
    margin: 30px 0;
    box-shadow: 0px 0 2px 0 rgba(0,0,0,0.25);
  }
#signupLogo {
  max-height: 100px;
  margin: auto;
  display: flex;
  flex-direction: column;
  align-items: center;
}
.formTitle{
  font-weight: 600;
  margin-top: 20px;
  color: #2F2D3B;
  text-align: center;
}
.inputLabel {
  font-size: 12px;
  color: #555;
  margin-bottom: 6px;
  margin-top: 24px;
}
  .inputDiv {
    width: 70%;
    display: flex;
    flex-direction: column;
    margin: auto;
  }
input {
  height: 40px;
  font-size: 16px;
  border-radius: 4px;
  border: none;
  border: solid 1px #ccc;
  padding: 0 11px;
}

.buttonWrapper {
  margin-top: 40px;
}
  .submitButton {
    width: 70%;
    height: 40px;
    margin: auto;
    display: block;
    color: #fff;
    background-color: #065492;
    border-color: #065492;
    text-shadow: 0 -1px 0 rgba(0, 0, 0, 0.12);
    box-shadow: 0 2px 0 rgba(0, 0, 0, 0.035);
    border-radius: 4px;
    font-size: 14px;
    cursor: pointer;
  }

  .material-symbols-outlined{
    font-size: 50px;
  }



    </style>
    <body>




    <div class="mainDiv">
  <div class="cardStyle">
    <form action="modify_email.php" method="post" name="signupForm" id="signupForm">
      
      <span id="signupLogo" class="material-symbols-outlined">
        manage_accounts
        </span>
      
      <h2 class="formTitle">
        Cambia la tua email
      </h2>
      
    <div class="inputDiv">
      <label class="inputLabel" for="password">Vecchia email</label>
      <input type="email" id="password" name="email" required>
    </div>
      
    <div class="inputDiv">
      <label class="inputLabel" for="confirmPassword">Nuova email</label>
      <input type="emial" id="confirmPassword" name="confirmEmail" required>
    </div>
    
    <div class="buttonWrapper">
      <button type="submit" id="submitButton" name="submitButton" class="submitButton pure-button pure-button-primary">
        <span>Continua</span>
      </button>
    </div>
      
  </form>
  </div>
</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<footer class="w3-center w3-black w3-padding-16">
    <br><br>
    <h1> .. oppure puoi tornare indietro, cliccando <a href=account.php> qui </a>: 
        </footer>

<?php
error_reporting(-1);
ini_set('display_errors', 'On');
set_error_handler("var_dump");
session_start();
?>
</body>
</html>
