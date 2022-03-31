<?php
    class Fonction
    {
        private $id_fonction ;
        private $designation ;
        private $date_add;
        private $date_update ;
        private $date_delete ;
        private $status ;
        
        //getters
        public function getId_fonction() {
            return $this->id_fonction;
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

        public function getDate_delete() {
            return $this->date_delete;
        }

        public function getStatus() {
            return $this->status;
        }
        //setters
        public function setId_fonction($id_fonction) {
            $this->id_fonction = $id_fonction;
            return $this;
        }

        public function setDesignation($designation) {
            $this->designation = $designation;
            return $this;
        }

        public function setDate_add($date_add) {
            $this->date_add = $date_add;
            return $this;
        }

        public function setDate_update($date_update) {
            $this->date_update = $date_update;
            return $this;
        }

        public function setDate_delete($date_delete) {
            $this->date_delete = $date_delete;
            return $this;
        }

        public function setStatus($status) {
            $this->status = $status;
            return $this;
        }


    }
?>