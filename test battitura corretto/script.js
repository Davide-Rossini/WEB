let parole = document.getElementById("parole")
let scrittore = document.getElementById("scrittore")
let risultati = document.getElementById("risultati")
let timer = document.getElementById("timer")
const btnRestart = document.getElementById("restart")
var parolecorrette = 0;
var n = 1;
var secondi = 60;
var corretto = 0;
var contenitore = ["non","servire", "per", "astronave", "aspirapolvere","falciare", "lettere", "ospite", "pasta", "rotaie", "televisore", "cassa", "scheda", "audio", "video", "altoparlante", "generatore", "cane", "prosciutto", "tappeto", "carta","microfono", "videocamera", "luci", "di", "da", "su", "telefono", "tastiera", "cuffie", "letto", "gioco", "cestino", "caricatore", "fazzoletto", "cavo", "corrente", "aria", "vento", "ossigeno", "acqua","succede","sedia", "tavolo", "paralume", "lampada", "letto", "poltrona", "lampadario", "giardino", "erba", "altalena", "orto", "automobile", "albicocca", "insalata", "pavimento", "porta", "vetro", "giocattolo", "orologio", "bottiglia", "borraccia", "maglia", "libro", "coppa", "delfino", "calice", "scopa", "straccio", "sapone","poste","ciotola", "piatto", "bicchiere", "teschio", "legna", "fiore", "mattone", "panca", "boccia", "dito", "piede", "ruota", "faro","gatto", "scarpa", "occhio", "bocca", "naso", "baffi", "mano", "collo", "insetto", "foto", "collana", "guancia", "vento", "cielo", "terra", "sole", "pianeta", "sasso", "carta"];

risultati.value = "Risultati: "+parolecorrette+"p/m"; //Metto il valore di default così non si vede NaN
scrittore.disabled = true; //Disabilito il campo di testo per scrivere solo quando si avvia il timer
random(); //Sceglie una parola random dal contenitore


function tick(){
    secondi--;
    timer.value = "0:" + (secondi<10 ? "0":"") + String(secondi);
    if (secondi > 0) {
        setTimeout(tick,1000);
    }
    else{
        risultati.value = "Risultati: "+parolecorrette+"p/m"
        scrittore.disabled = true;
        timer.value = "0:00";
    }
}
btnRestart.onclick=function () {
    secondi = 60;
    parolecorrette = 0;
    tick();
    risultati.value = "Risultati: "+parolecorrette+"p/m"
    scrittore.disabled = false; //Abilita il campo di testo per scrivere quando si avvia il timer
}
//Verifica se la parola è corretta e la sostituisce con una nuova (quando si preme il pulsante)
function checkParola() {
    if (scrittore.value.trim() == parole.value.trim()) {
        scrittore.style.backgroundColor = "green";
    } else {
        scrittore.style.backgroundColor = "red";
    }
}

//Sceglie una parola random dal contenitore
function random(){
    parole.value = contenitore[Math.floor(Math.random()*contenitore.length)];
}

//Calcola il numero di parole scritte al minuto
function calcolo(){
    parolecorrette++;
    risultati.value = "Risultati: "+parolecorrette+"p/m"
}


//Verifica se la parola è corretta e la sostituisce con una nuova (quando si preme invio)
scrittore.onkeypress = function(e){  
    if(e.keyCode == 13){
        if(scrittore.value == parole.value){
            checkParola();
            random();
            scrittore.value = "";
            calcolo();
        }
        else{
            checkParola();
            random();
            scrittore.value = "";
        }
    }
}
