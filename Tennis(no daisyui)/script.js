const btn1 = document.getElementById("btn-1")
let p1 = document.getElementsByClassName("g1-punteggio")

const reset = document.getElementsByClassName("reset")

reset.onclick=function(){
    p1.innerHTML = "";
}