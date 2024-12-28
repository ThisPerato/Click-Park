function checkKeywords(input){
    var keywords = ["Piazza", "Via", "Largo", "Viale", "Vicolo"];

    for (var i=0; i<keywords.length; i++){
        if (input.includes(keywords[i])){
            return true;
        }
    }
    return false;
}

function validateForm(){
    var viaInput= document.getElementById("via");
    var inputValue= viaInput.value;
    var containsKeyword=checkKeywords(inputValue);
    if (!containsKeyword){
        showCustomAlert("Per inserire un suggerimento valido bisogna inserire una tra queste parole chiavi: 'Piazza', 'Via', 'Largo', 'Viale', 'Vicolo'");
        return false;
    }
}

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
  
  
  