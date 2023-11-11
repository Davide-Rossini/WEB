const W = 600;
const H = 600;


const TILE_SIZE = 100;
const canvas = document.getElementById("canvas");
const ctx = canvas.getContext("2d");
canvas.width = W;
canvas.height = H;

const drawText = (txt, x, y) =>{
    ctx.font = "48px serif";
    ctx.fillText(txt, x, y);
}

const shuffle = (arr) =>{
    let i = 0, j = 0, tmp = null;
    for(i=arr.length-1; i>0; i--){
        j = Math.floor(Math.random()*(i+1));
        tmp = arr[i];
        arr[i] = arr[j];
        arr[j] = tmp;
    }
}

const swap = (arr, i, j) =>{
    const tmp = arr[i];
    arr[i] = arr[j];
    arr[j] = tmp;
}

const tiles = [];
const tilepos = [];
for(let i = 0; i < 15; i++){
    tiles.push(new Tile(i));
    tilepos.push(i);
}   

shuffle(tilepos);

const idxToCoords = (idx) =>{
    return {r: TILE_SIZE*Math.floor(idx/4), c: TILE_SIZE*(idx%4)}
};

const show = () =>{
    ctx.clearRect(0,0,W,H);
    drawText("Gioco del 15", 10, 50);
    tilepos.forEach((tilepos, idx)=> {
        const {r, c} = idxToCoords(idx);
        console.log(r,c);
        drawText(tiles[tilepos].getNum()-1,c + TILE_SIZE, r+TILE_SIZE);
    });
    requestAnimationFrame(show);
}

show();

