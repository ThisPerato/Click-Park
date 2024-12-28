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
  