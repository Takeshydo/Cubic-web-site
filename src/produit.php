<?php

namespace CubicWeb\Site\Produit;
class Produit {

	private $id;
	protected $nom;

	protected $description;
	protected $prix;
	protected $image;

	public function getId() {
		return $this->id;
	}
}


?>