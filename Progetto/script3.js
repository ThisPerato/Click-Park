const nameEl = document.querySelector("#name");
const emailEl = document.querySelector("#email");
const idEl = document.querySelector("#id");
const messageEl = document.querySelector("#message");

const form = document.querySelector("#submit-form");

function checkValidations() {
  let letters = /^[a-zA-Z\s]*$/;
  const name = nameEl.value.trim();
  const email = emailEl.value.trim();
  const id = idEl.value.trim();
  const message = messageEl.value.trim();
  if (name === "") {
     document.querySelector(".name-error").classList.add("error");
      document.querySelector(".name-error").innerText =
        "Questo campo non può essere vuoto.";
  } else {
    if (!letters.test(name)) {
      document.querySelector(".name-error").classList.add("error");
      document.querySelector(".name-error").innerText =
        "Inserire solamente caratteri.";
    } else {
      
    }
  }
  if (email === "") {
     document.querySelector(".name-error").classList.add("error");
      document.querySelector(".name-error").innerText =
        "Questo campo non può essere vuoto.";
  } else {
    if (!letters.test(name)) {
      document.querySelector(".name-error").classList.add("error");
      document.querySelector(".name-error").innerText =
        "Inserire solamente caratteri.";
    } else {
      
    }
  }
}

function reset() {
  nameEl = "";
  emailEl = "";
  idEl = "";
  messageEl = "";
  document.querySelector(".name-error").innerText = "";
}
