<?php

    require_once('./db.php');
    class Prijava{
        public $id;
        public $ime;
        public $prezime;
        public $smer_id;
        public $datum_prijave;
        public $bodova;

        public function __construct(){
            $this->id = null;
        }

        public function save() {
            global $pdo;
            //insert
            if($this->id === null) {                
                $upit = $pdo->prepare("insert into prijava values (?, ?, ?, ?, NOW(), ?)");
                $upit->execute([
                    $this->id,
                    $this->ime,
                    $this->prezime,
                    $this->smer_id,                    
                    $this->bodova
                ]);
            }
            //update
            else {                
                $upit = $pdo->prepare("update prijava set ime=?, prezime=?, smer_id=?, bodova=? where id=?");
                $upit->execute([                    
                    $this->ime,
                    $this->prezime,
                    $this->smer_id,                    
                    $this->bodova,
                    $this->id
                ]);                
            }
        }

        public static function getOne($id){
            global $pdo;
            $upit = $pdo->prepare('select * from prijava where id=?');
            $upit->execute([$id]);
            $pr = $upit->fetch();
            $p = new Prijava();
            $p->id = $pr->id;
            $p->ime = $pr->ime;
            $p->prezime = $pr->prezime;
            $p->smer_id = $pr->smer_id;
            $p->datum_prijave = $pr->datum_prijave;
            $p->bodova = $pr->bodova; 

            return $p;
        }

        public function unesiRezultat($bodovi) {
            $this->bodova = $bodovi;
            echo $this->bodova;
            $this->save();
        }

        public static function rezultatiZaSmer($smer_id){
            global $pdo;
            $upit = $pdo->prepare("select * from prijava where smer_id=? and bodova is not null order by bodova desc");
            $upit->execute([$smer_id]);
            $prijave = $upit->fetchAll();

            foreach($prijave as $prijava) {
                $p = new Prijava();
                $p->id = $prijava->id;
                $p->ime = $prijava->ime;
                $p->prezime = $prijava->prezime;
                $p->smer_id = $prijava->smer_id;
                $p->datum_prijave = $prijava->datum_prijave;
                $p->bodova = $prijava->bodova; 
            }
            return $prijave;

        }

    }
?>