let ris = document.getElementById("ris")
let var1 = document.getElementById("var1")
let var2 = document.getElementById("var2")
const add = document.getElementById("add")
const sot = document.getElementById("sot")
const mol = document.getElementById("mol")
const div = document.getElementById("div")



add.onclick = function(){
    ris.value = parseFloat(var1.value) + parseFloat(var2.value);
}

sot.onclick = function(){
    ris.value = parseFloat(var1.value) - parseFloat(var2.value);
}

div.onclick = function(){
    ris.value = parseFloat(var1.value) / parseFloat(var2.value);
}

mol.onclick = function(){
    ris.value = parseFloat(var1.value) * parseFloat(var2.value);
}

