<?php

    class Rettangolo{
        private $base;
        private $altezza;

        public function __construct($b, $a){
            $this ->base = $b;
            $this ->altezza = $a;
        }

        public function getBase(){
            return $this -> base;
        }

        public function getAltezza(){
            return $this -> altezza;
        }

        public function getArea(){
            return $this ->base*$this->altezza;
        }
    }

    class Quadrato extends Rettangolo{

        public function __construct($lato){
            parent::__construct($lato, $lato);
        }

        public function getLato(){
            return parent::getBase();
        }

        public function stampa($lingua){
            $frase= "";
            switch ($lingua) {
                case "ENG":
                    $frase = "the square area is: ".$this->getArea();
                    break;
                case "ITA":
                    $frase = "l'area del quadrato è: ".$this->getArea();
                    break;
                default:
                    $frase = "lingua non riconosciuta";
                    break;
            }
            return "<h1>$frase";
        }

        public function esempio($p1,$p2,$p3){
            
        }
    }

?>