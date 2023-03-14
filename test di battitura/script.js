let parole = document.getElementById("parole")
let scrittore = document.getElementById("scrittore")
let risultati = document.getElementById("risultati")
let timer = document.getElementById("timer")
const btnRestart = document.getElementById("restart")
var parolecorrette = 0;
var n = 1;
var secondi = 60;
var corretto = 0;
var contenitore = ["non","servire", "per", "astronave", "aspirapolvere","falciare", "lettere", "ospite", "pasta", "rotaie", "televisore", "cassa", "scheda", "audio", "video", "altoparlante", "generatore", "cane", "prosciutto", "tappeto", "carta", "caricatore", "fazzoletto", "cavo", "corrente", "aria", "vento", "ossigeno", "acqua","succede","sedia", "tavolo", "paralume", "lampada", "letto", "poltrona", "lampadario", "giardino", "erba", "altalena", "orto", "automobile", "albicocca", "insalata", "pavimento", "porta", "vetro", "giocattolo", "orologio", "bottiglia", "borraccia", "maglia", "libro", "coppa", "delfino", "calice", "scopa", "straccio", "sapone","poste","ciotola", "piatto", "bicchiere", "teschio", "legna", "fiore","microfono", "videocamera", "luci", "di", "da", "su", "telefono", "tastiera", "cuffie", "letto", "gioco", "cestino", "mattone", "panca", "boccia", "dito", "piede", "ruota", "faro","gatto", "scarpa", "occhio", "bocca", "naso", "baffi", "mano", "collo", "insetto", "foto", "collana", "guancia", "vento", "cielo", "terra", "sole", "pianeta", "sasso", "carta"];
function tick(){
    secondi--;
    timer.value = "0:" + (secondi<10 ? "0":"") + String(secondi);
    if (secondi > 0) {
        setTimeout(tick,1000);
    }
    else{
        timer.value = "0:00";
    }
    }

function controllo(){
    if(scrittore.value == parole.value){
        corretto = 2;
        parolecorrette++;
        scrittore = "";
    }
    else{corretto = 1}
}

btnRestart.onclick=function () {
    tick();
    while(timer.value != "0:00"){
        if (corretto != 0){
            controllo();
            var s = Math.random()*100;
            var g = Math.floor(s);
            parole.value = contenitore[g];
            corretto = 1;
            risultati.value = "Risultati: "+parolecorrette+"p/m"
        }
        else{
            var s = Math.random()*100;
            var g = Math.floor(s);
            parole.value = contenitore[g];
            controllo();
            corretto = 1;
            risultati.value = "Risultati: "+parolecorrette+"p/m"
        }
    }
    
}





