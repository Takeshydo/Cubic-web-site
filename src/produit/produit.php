<?php

namespace src\Produit;

class Produit {

	private $id;
	protected $nom;

	protected $description;
	protected $prix;
	protected $image;

	//get
	public function getId() {
		return $this->id;
	}

	public function getNom() {
		return $this->nom;
	}

	public function getDescription() {
		return $this->description;
	}

	public function getPrix() {
		return $this->prix;
	}

	public function getImage() {
		return $this->image;
	}

	//set 
	public function setId($id) {
		$this->id = $id;
	}

	public function setNom($nom) {
		$this->nom = $nom;
	}

	public function setDescription($description) {
		$this->description = $description;
	}

	public function setPrix($prix) {
		$this->prix = $prix;
	}

	public function setImage($image) {
		$this->image = $image;
	}
}


?>