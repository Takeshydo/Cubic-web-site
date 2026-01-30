<?php
namespace web\src\arme;

use web\src\produit\Produit;

class arme extends Produit {

	protected $type;
	protected $degat;

    public function getDamage() {
        return $this->degat;
    }

    public function setDamage($degat) {
        return $this->degat = $degat;
    }
}