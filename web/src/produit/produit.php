<?php

namespace web\src\produit;

class Produit {

	private $id;
	protected $nom;

	protected $description;
	protected $prix;
	protected $image;
    protected $element;

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
    public function getElement(){
        return $this->element;
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

    public function setElement($element) {
     $this->element = $element;
    }
}


?>