<?php

namespace src\armure;

use src\Produit\Produit;

class armure extends Produit {

	protected $type;
	protected $defense;

    public function getDefense(){
        return $this->defense;
    }
    public function setDefense($defense){
        return $this->defense = $defense;
    }
}


?>