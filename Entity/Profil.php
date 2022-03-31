<?php
    class Profil
    {
        private $id_profil ;
        private $designation ;
        private $date_add ;
        private $date_update ;
        
        public function getId_profil() {
            return $this->id_profil;
        }

        public function getDesignation() {
            return $this->designation;
        }

        public function getDate_add() {
            return $this->date_add;
        }

        public function getDate_update() {
            return $this->date_update;
        }

        public function setId_profil($id_profil) {
            $this->id_profil = $id_profil;
        }

        public function setDesignation($designation) {
            $this->designation = $designation;
        }

        public function setDate_add($date_add) {
            $this->date_add = $date_add;
        }

        public function setDate_update($date_update) {
            $this->date_update = $date_update;
        }


    }
?>