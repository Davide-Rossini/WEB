class Tile {
    constructor(pos) {
        this.idx = pos;
    }

    getNum() {
        return this.idx !== -1 ? this.idx + 1:"";
    }
}