document.addEventListener("DOMContentLoaded", function () {
  var howItWorksBtn = document.getElementById("how-it-works-btn");
  var howItWorksPopup = document.getElementById("how-it-works-popup");
  var closeBtn = document.getElementById("close-btn");
  var passwordInput = document.getElementById("confirmPassword");
  var submitButton = document.getElementById("submitButton");

  // Mostra il popup al clic del pulsante "Come funziona?"
  howItWorksBtn.addEventListener("click", function () {
    howItWorksPopup.style.display = "block";
  });

  // Chiudi il popup al clic del pulsante "Chiudi"
  closeBtn.addEventListener("click", function () {
    howItWorksPopup.style.display = "none";
  });

  // Aggiungi un evento di submit al form
  submitButton.addEventListener("click", function (event) {
    var password = passwordInput.value.trim();
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

    // Se ci sono errori, visualizza l'alert personalizzato con i messaggi di errore
    if (passwordErrors.length > 0) {
      event.preventDefault(); // Previeni l'invio del form
      var lastErrorIndex = passwordErrors.length - 1;
      passwordErrors[lastErrorIndex] = passwordErrors[lastErrorIndex].replace(",", ".");
      var errorMessage = "La password deve contenere almeno:\n\n" + passwordErrors.join(" ");
      showCustomAlert(errorMessage);
    }
  });
});

function showCustomAlert(message) {
  var overlay = document.createElement('div');
  overlay.classList.add('overlay');

  var alertContainer = document.createElement('div');
  alertContainer.classList.add('alert-container');

  var messageContainer = document.createElement('div');
  messageContainer.classList.add('message-container');
  messageContainer.textContent = message;

  var closeBtn = document.createElement('button');
  closeBtn.classList.add('close-btn');
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

  disableScroll();
}

// Disabilita lo scroll quando l'alert è aperto
function disableScroll() {
  document.body.style.overflow = 'hidden';
}

// Abilita lo scroll quando l'alert è chiuso
function enableScroll() {
  document.body.style.overflow = '';
}
