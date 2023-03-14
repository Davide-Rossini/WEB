//inserisco gli elementi html
let num = document.getElementById("num")
const btnGen = document.getElementById("genera")
const ulNum = document.getElementById("listaNumeri")

// funzioni:

function ClearList(){ // cancellazione della lista
    let liTags = document.querySelectorAll("ul>li"); 
    for(let i = 0; i < liTags.length; i++){
    ulNum.removeChild(liTags[i]); //rimuovo gli elementi del "vettore" della lista
    }
}

btnGen.onclick = function (){ //genera numeri casuali 
    ClearList(); // cancellazione della lista alla pressione
    for(var i = 0; i < num.value; i++){ // genera la quantita di numeri richiesta nell'input text
        let elementToAdd = document.createElement("li"); //creo l'elemento li
        var s = Math.random() * 100; // genera un numero reale casuale tra 0 e 1 e lo moltiplico per 100 (cosi da avere un numero da 0 a 100)
        elementToAdd.innerHTML = Math.round(s); //arrotondo il numero ottenuto
        if (elementToAdd.innerHTML == 0){ // controllo se il valore è 0
            i--; //decremento i di 1 in caso fosse 0 
        }
        else { //se è diverso da 0
            ulNum.appendChild(elementToAdd); // attacco il risultato alla lista
        }    
    }
    num.value=""; //resetto la casella di testo
}
