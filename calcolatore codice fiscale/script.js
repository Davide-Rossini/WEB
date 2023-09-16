let nome = document.getElementById("nome")
let cognome = document.getElementById("cognome")
let data = document.getElementById("data")
let sesso = document.getElementById("sesso")
let luogonascita = document.getElementById("luogo-nascita")
let risultato = document.getElementById("risultato")
const btn_calcola = document.getElementById("calcola")
var count
var g

function contaConsonanti(s){
    for(i = 0; i < s.length; i++){
        if(s.toLowerCase().contains("b","c","d","f","g","h","j","k","l","m","n","p","q","r","s","t","v","w","x","y","z")){
            count++
        }
    }
    return count
}

function estraiConsonanti(s, f){
    for(i = 0; i < f; i++){
        if(s.toLowerCase().contains("b","c","d","f","g","h","j","k","l","m","n","p","q","r","s","t","v","w","x","y","z")){
           
        }
    }
}

function trasf_cognome(s){
    if(s.contains(" ")){
        s.replace(" ", "")
    }
    if(contaConsonanti(s) >= 3){

    }

}

btn_calcola.onclick = function(){
    var nome_u = nome.toUpperCase()
    var cognome_u = cognome.toUpperCase()
}
