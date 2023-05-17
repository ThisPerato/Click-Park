const registerButton = document.getElementById("register");
const loginButton = document.getElementById("login");
const container = document.getElementById("container");
const accessoButton = document.getElementById("accesso");

function isValidPassword(password) {
  // Controlla la lunghezza della password
  if (password.length < 8) {
    return false;
  }

  // Controlla la presenza di lettere maiuscole e minuscole, numeri e simboli
  var regex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]+$/;
  return regex.test(password);
}

function validateEmail(email) {
  const emailRegex = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/; // espressione regolare per il formato dell'email

  if (!emailRegex.test(email)) { // verifica il formato dell'email
    return false;
  }

  

  return true;
}

//Campo Mostra Password
var passwordReg = document.getElementById("password-reg");
var passwordRegBox = document.getElementById("passwordReg-box");
var passwordLog = document.getElementById("password-log");
var passwordLogBox = document.getElementById("passwordLog-box");
var emailReg = document.getElementById("email-reg")
var emailLog = document.getElementById("email-log")

passwordRegBox.addEventListener("click", function() {
  if (passwordReg.type === "password") {
    passwordReg.type = "text";
  } else {
    passwordReg.type = "password";
  }
});
passwordLogBox.addEventListener("click", function() {
  if (passwordLog.type === "password") {
    passwordLog.type = "text";
  } else {
    passwordLog.type = "password";
  }
});

formReg.addEventListener('submit', () => {
  if (nome.value === '' || nome.value == null){
    alert("Bisogna inserire un nome")
  }

  else if (!validateEmail(emailReg.value)){
    alert("Il dominio di questa email non e' presente nel database")
  }

  else if (passwordReg.value === '' || passwordReg.value == null){
    alert("Bisogna inserire una password")
  }


}); 

formLog.addEventListener('submit', () => {
  if (emailLog.value === '' || emailLog.value == null){
    alert("Bisogna inserire un nome")
  }
  else if (!validateEmail(emailLog.value)){
    alert("Il dominio di questa email non e' presente nel database")
  }
  else if (passwordLog.value === '' || passwordLog.value == null){
    alert("Bisogna inserire una password")
  }
  


});      

registerButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

loginButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});



