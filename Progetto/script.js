const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');


signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
});

function checkDatiSignUp(){
    if ((document.signup.nome.value == "")){
        window.alert("Inserisci un nome corretto!");
        return false;
    }
    if (document.signup.cognome.value==""){
        window.alert("Inserisci un cognome corretto!");
        return false;
    }
    if (document.signup.email.value==""){
        window.alert("Inserisci un'email corretta!");
        return false;
    }
    if (document.signup.password.value==""){
        window.alert("Inserisci una password corretta!");
        return false;
    }
    return true;
}


function checkDatiSignIn(){
    if ((document.signin.nome.value == "")){
        window.alert("Inserisci un nome corretto!");
        return false;
    }
    if (document.signin.cognome.value==""){
        window.alert("Inserisci un cognome corretto!");
        return false;
    }
    if (document.signin.email.value==""){
        window.alert("Inserisci un'email corretta!");
        return false;
    }
    if (document.signin.password.value==""){
        window.alert("Inserisci una password corretta!");
        return false;
    }
    return true;
}

