//index.html
let Nome = document.getElementById("Nome")
let Cognome = document.getElementById("Cognome")
let Data = document.getElementById("DatadiNascita")
const Invia = document.getElementById("Invia")
//NomeUtente.html
let NomeUtente = document.getElementById("NomeUtente")
let Password = document.getElementById("Password")
const Registrati = document.getElementById("SignIn")
// localStorage.setItem("Nome", "Cognome", "DatadiNascita")
// ulTag.innerHTML = localStorage.getItem("Nome", "Cognome", "DatadiNascita")
localStorage;
Invia.onclick;
Registrati.onclick;

Invia.onclick = function () {
    localStorage.setItem("Nome", "Cognome", "DatadiNascita")
    console.log(Nome, Cognome, Data)
}
Registrati.onclick = function () {
    localStorage.setItem("NomeUtente", "Password")
    console.log(NomeUtente, Password)
}

Element.innerHTML = localStorage.getItem("Nome", "Cognome", "DatadiNascita")
Element.innerHTML = localStorage.getItem("NomeUtente", "Password")