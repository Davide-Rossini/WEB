let set = document.getElementById("set")
let giochi = document.getElementById("giochi")
let punteggi = document.getElementById("punteggi")
let set2 = document.getElementById("set2")
let giochi2 = document.getElementById("giochi2")
let punteggi2 = document.getElementById("punteggi2")
const aggiungi = document.getElementById("btnAdd")
const aggiungi2 = document.getElementById("btnAdd2")
var punto = 15;
var puntodiv = 10;
/*
btnAdd.onclick=function(){
    if (punteggi.value= "0") {
    punteggi.innerHTML = "15";
    }
    else if (punteggi=15) {
        punteggi.innerHTML = 30;
    }
    else if (punteggi = 30) {
        punteggi.innerHTML = 40;
    }
    else if (punteggi.value = 40 && punteggi2.value == 40){
        punteggi.value = "Additional";
    }
}
*/
/*
while(punteggi.value<30) {
    punteggi.value = punteggi.value+15;
}
*/
/*
set.value = document.getElementById("0").value;
giochi.value = document.getElementById("0").value;
punteggi.value = document.getElementById("0").value;
set2.value = document.getElementById("0").value;
giochi2.value = document.getElementById("0").value;
punteggi2.value = document.getElementById("0").value;
*/
btnAdd.onclick=function(){
    if (punteggi.value <10) {
    punteggi.value= document.getElementById("15").value;
    }
    else if (punteggi.value <20) {
        punteggi.value = document.getElementById("30").value; 
    }
    else if (punteggi.value < 35) {
        punteggi.value = document.getElementById("40").value;
    }
    else if (punteggi.value = punteggi2.value) {
        punteggi.value = document.getElementById("Additional").value;
    }
    else {
        punteggi.value = document.getElementById("0").value;
    }
    }
    
/*
if (punteggi.value = "40" && punteggi2.value == "40"){
    punteggi.value = "Additional";
}
*/