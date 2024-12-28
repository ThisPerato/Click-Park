document.addEventListener("DOMContentLoaded", function () {
  var howItWorksBtn = document.getElementById("how-it-works-btn");
  var howItWorksPopup = document.getElementById("how-it-works-popup");
  var closeBtn = document.getElementById("close-btn");
  var emailInput = document.getElementById("confirmPassword");
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
    var email = emailInput.value.trim();
    var emailRegex = /^[\w.-]+@[\w.-]+\.[A-Za-z]{2,4}$/;

    // Verifica se l'email inserita corrisponde all'espressione regolare
    if (!emailRegex.test(email)) {
      event.preventDefault(); // Previeni l'invio del form
      showCustomAlert("La nuova email inserita non risulta essere un indirizzo valido");
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
