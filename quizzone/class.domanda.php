<?php 
    class Domanda{
        private $testo;
        private $rispGiusta;
        private $rispErrate;

        public function __construct($testo, $giusta, $errate){
            $this->testo = $testo;
            $this->rispGiusta = $giusta;
            $this->rispErrate = $errate;
        }

        public function getTesto(){
            return $this->testo;
        }

        public function getRisposte(){
            $risposte = $this->rispErrate;
            $risposte[] = $this->rispGiusta;
            shuffle($risposte);
            return $risposte;
        }

        public function isGiusta($risp){
            if($risp == $this->rispGiusta) return true;
            else return false;
        }

    }

    $domande = array(
        new Domanda("Che anno è?", "2023", array("1990", "2002", "2030")),
        new Domanda("Quando è stata scoperta l'America?", "1492", array("1990", "2002", "2030")),
        new Domanda("Che colore è il limone?", "Giallo", array("Rosso", "Blu", "Verde")),
        new Domanda("Qual è la prima lettera dell'alfabeto?", "A", array("C", "G", "L"))
    );
?>