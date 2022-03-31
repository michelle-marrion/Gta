<?php
    class Collaborateur
    {
        private $id_collaborateur;
        private $nom;
        private $prenom;
        private $mail;
        private $password;
        private $tel;
        private $date_add;
        private $date_update;
        private $date_delete;
        private $status;
        private $id_profil;
        private $id_fonction;

        //getters
        function getId_collaborateur() {
            return $this->id_collaborateur;
        }
        function getNom()
        {
            return $this->nom;
        }
        function getPrenom()
        {
            return $this->prenom;
        }
        function getMail()
        {
            return $this->mail;
        }
        function getPassword()
        {
            return $this->password;
        }
        function getTel()
        {
            return $this->tel;
        }
        function getDate_add() {
            return $this->date_add;
        }

        function getDate_update() {
            return $this->date_update;
        }

        function getDate_delete() {
            return $this->date_delete;
        }

        function getId_profil() {
            return $this->id_profil;
        }

        function getId_fonction() {
            return $this->id_fonction;
        }
        //setters
        public function setId_collaborateur($id_collaborateur)
        {
            $this->id_collaborateur =$id_collaborateur;
        }
        public function setDateAdd($date)
        {
            $this->date_add= $date;
        }
        public function setNom($nom) {
            $this->nom = $nom;
        }

        public function setPrenom($prenom) {
            $this->prenom = $prenom;
        }

        public function setMail($mail) {
            $this->mail = $mail;
        }
        public function setPassword($password)
        {
            $this->password =$password;
        }
        public function setTel($tel) {
            $this->tel = $tel;
        }

        public function setDate_update($date_update) {
            $this->date_update = $date_update;
        }

        public function setDate_delete($date_delete) {
            $this->date_delete = $date_delete;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

        public function setId_profil($id_profil) {
            $this->id_profil = $id_profil;
        }

        public function setId_fonction($id_fonction) {
            $this->id_fonction = $id_fonction;
        }


    }
?>