<?php
    class Pointage
    {
        private $id_pointage;
        private $date_add;
        private $heure_begin;
        private $heure_end;
        private $id_collaborateur;

        //getters
        public function getId(){  return $this->id_pointage;}
        public function getDate(){  return $this->date_add; }
        public function getHeure_begin(){ return $this->heure_begin; }
        public function getHeure_end(){ return $this->heure_end; }
        public function getId_collaborateur(){ return $this->id_collaborateur;}
        //setters
        public function setId($id_pointage)
        {
            $this->id_pointage=$id_pointage;
        }
        public function setDate($date)
        {
            $this->date_add= $date;
        }
        public function setHeure_begin($begin)
        {
            $this->heure_begin=$begin;
        }
        public function setHeure_end($end)
        {
            $this->heure_end=$end;
        }
        public function setId_collaborateur($id_collaborateur)
        {
            $this->id_collaborateur = $id_collaborateur;
        }
    }
?>