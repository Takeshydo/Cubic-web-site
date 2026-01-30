<?php
namespace src\arme;

use src\Produit\Produit;

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