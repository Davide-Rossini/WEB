const canc = document.getElementById("cancella");
let screen = document.getElementById("input");
const rad = document.getElementById("rad");
const pot = document.getElementById("pot");

rad.onclick=function(){
    var a = screen.value;
    a = Math.sqrt(a);
    screen.value = a;
}

pot.onclick = function(){
    var b = screen.value;
    b = Math.pow(b,2);
    screen.value = b;
}

function append(input) {
    document.getElementById('input').value += input;
  }
  canc.onclick = function(){
    screen.value = "";
    
  }

  function compute() {
    var input = document.getElementById('input').value;
    var result = eval(input);
    document.getElementById('input').value = result;
}