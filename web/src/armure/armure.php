<?php

namespace web\src\armure;

use web\src\produit\Produit;

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