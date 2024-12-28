
document.addEventListener("DOMContentLoaded", function () {
  var howItWorksBtn = document.getElementById("how-it-works-btn");
  var howItWorksPopup = document.getElementById("how-it-works-popup");
  var closeBtn = document.getElementById("close-btn");

  // Mostra il popup al clic del pulsante "Come funziona?"
  howItWorksBtn.addEventListener("click", function () {
    howItWorksPopup.style.display = "block";
  });

  // Chiudi il popup al clic del pulsante "Chiudi"
  closeBtn.addEventListener("click", function () {
    howItWorksPopup.style.display = "none";
  });
});


function showCustomAlert(message) {
  disableScroll(); // Disabilita lo scroll del corpo della pagina

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
}

function disableScroll() {
  document.body.style.overflow = 'hidden';
}

// Abilita lo scroll quando l'alert è chiuso
function enableScroll() {
  document.body.style.overflow = '';
}

document.getElementById("signupForm").addEventListener("submit", function (event) {
  // Ottieni il valore dell'opzione selezionata
  var typeOp = document.getElementById("typeOp").value;

  // Ottieni il valore dell'input corrispondente all'opzione selezionata
  var valueOp = document.getElementById("valueOp").value;

  // Esegui la validazione in base all'opzione selezionata
  if (typeOp === "targa") {
    var targaRegex = /^[A-Z]{2}\d{3}[A-Z]{2}$/;
    if (!targaRegex.test(valueOp)) {
      // Mostra un messaggio di errore o fai qualsiasi altra azione di gestione dell'errore
      showCustomAlert("La targa inserita non è valida. Assicurati di inserire una targa nel formato corretto.");
      event.preventDefault(); // Previeni l'invio del modulo
      return;
    }
  } else if (typeOp === "ora_arrivo") {
    var oraRegex = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;
    if (!oraRegex.test(valueOp)) {
      // Mostra un messaggio di errore o fai qualsiasi altra azione di gestione dell'errore
      showCustomAlert("L'ora di arrivo inserita non è valida. Assicurati di inserire un orario nel formato 24h corretto.");
      event.preventDefault(); // Previeni l'invio del modulo
      return;
    }
  }
});