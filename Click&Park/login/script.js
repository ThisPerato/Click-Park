const registerButton = document.getElementById("register");
const loginButton = document.getElementById("login");
const container = document.getElementById("container");
const accessoButton = document.getElementById("accesso");

function isValidPassword(password) {
  var passwordErrors = [];

  // Verifica il primo requisito: almeno 8 caratteri
  if (password.length < 8) {
    passwordErrors.push("8 caratteri,");
  }

  // Verifica il secondo requisito: almeno 1 maiuscola
  if (!/[A-Z]/.test(password)) {
    passwordErrors.push("1 lettera maiuscola,");
  }

  // Verifica il terzo requisito: almeno 1 minuscola
  if (!/[a-z]/.test(password)) {
    passwordErrors.push("1 lettera minuscola,");
  }

  // Verifica il quarto requisito: almeno 1 numero
  if (!/\d/.test(password)) {
    passwordErrors.push("1 numero,");
  }

  // Verifica il quinto requisito: almeno 1 carattere speciale
  if (!/[@$!%*?&]/.test(password)) {
    passwordErrors.push("1 dei seguenti caratteri speciale (@ $ ! % * ? &),");
  }

  // Se ci sono errori, restituisce false e visualizza un avviso personalizzato
  if (passwordErrors.length > 0) {
    var lastErrorIndex = passwordErrors.length - 1;
    passwordErrors[lastErrorIndex] = passwordErrors[lastErrorIndex].replace(",", ".");
    var errorMessage = "La password deve contenere almeno:\n\n" + passwordErrors.join(" ");
    showCustomAlert(errorMessage);
    return false;
  }

  return true;
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

passwordRegBox.addEventListener("click", function () {
  if (passwordReg.type === "password") {
    passwordReg.type = "text";
  } else {
    passwordReg.type = "password";
  }
});
passwordLogBox.addEventListener("click", function () {
  if (passwordLog.type === "password") {
    passwordLog.type = "text";
  } else {
    passwordLog.type = "password";
  }
});

formReg.addEventListener('submit', (event) => {
  if (nome.value === '' || nome.value == null) {
    showCustomAlert("Bisogna inserire un nome");
    event.preventDefault(); // Interrompe l'invio del modulo
  }

  else if (!validateEmail(emailReg.value)) {
    showCustomAlert("Il dominio di questa email non è presente nel database");
    event.preventDefault(); // Interrompe l'invio del modulo
  }

  else if (passwordReg.value === '' || passwordReg.value == null) {
    showCustomAlert("Bisogna inserire una password");
    event.preventDefault(); // Interrompe l'invio del modulo
  }
  else if (!isValidPassword(passwordReg.value)) {
    event.preventDefault(); // Interrompe l'invio del modulo
  }
});



formLog.addEventListener('submit', (event) => {
  if (emailLog.value === '' || emailLog.value == null) {
    showCustomAlert("Bisogna inserire un nome");
    event.preventDefault(); // Interrompe l'invio del modulo
  }
  else if (!validateEmail(emailLog.value)) {
    showCustomAlert("Il dominio di questa email non è presente nel database");
    event.preventDefault(); // Interrompe l'invio del modulo
  }
  else if (passwordLog.value === '' || passwordLog.value == null) {
    showCustomAlert("Bisogna inserire una password");
    event.preventDefault(); // Interrompe l'invio del modulo
  }
});

registerButton.addEventListener("click", () => {
  container.classList.add("right-panel-active");
});

loginButton.addEventListener("click", () => {
  container.classList.remove("right-panel-active");
});


function showCustomAlert(message) {
  disableScroll(); // Disabilita lo scroll del corpo della pagina

  var overlay = document.createElement('div');
  overlay.classList.add('alert_overlay');

  var alertContainer = document.createElement('div');
  alertContainer.classList.add('alert-container');

  var messageContainer = document.createElement('div');
  messageContainer.classList.add('message-container');
  messageContainer.textContent = message;

  var closeBtn = document.createElement('button');
  closeBtn.classList.add('alert_close-btn');
  closeBtn.innerHTML = '&times;';
  closeBtn.addEventListener('click', function () {
    document.body.removeChild(alertContainer);
    document.body.removeChild(overlay);
    enableScroll();
  });

  alertContainer.appendChild(messageContainer);
  alertContainer.appendChild(closeBtn);
  document.body.appendChild(overlay);
  document.body.appendChild(alertContainer);
}

function disableScroll() {
  document.body.style.overflow = 'hidden';
}

// Abilita lo scroll quando l'alert è chiuso
function enableScroll() {
  document.body.style.overflow = '';
}
