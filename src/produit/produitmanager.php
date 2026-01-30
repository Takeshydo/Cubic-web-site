<?php

namespace src\produit;

use src\arme\arme;
use src\armure\armure;

class produitmanager {
	private $produits;
	private $db;

	public function __construct(\PDO $db){
		$this->db = $db;
	}

	public function add(Produit $db){
		$request = "INSERT INTO product (nom, content, prix) VALUES (:nom, :content, :prix)";
		$stmt = $this->produits->prepare($request);
		$stmt->execute([
			':nom' => $db->getNom(),
			':content' => $db->getDescription(),
			':prix' => $db->getPrix()
		]);
	}
	public function getAll(){
		$produitAll = [];
		$request = "SELECT * FROM product ORDER BY id DESC";
		$stmt = $this->db->query($request);

		//tableau associatif
		$data_all = $stmt->fetchAll(\PDO::FETCH_ASSOC);

		//boucle pour chaque tache
		foreach ($data_all as $dataONE){
			if($dataONE['element'] === "arme"){
				$produit= new arme();
				$produit->setId($dataONE['ID']);
				$produit->setNom($dataONE['name']);
				$produit->setDescription($dataONE['content']);
				$produit->setPrix($dataONE['price']);
				$produit->setDamage($dataONE['damage']);
				$produit->SetElement($dataONE['element']);
				$produitAll[]=$produit;
			}else{
				 $produit = new armure();
				 $produit->setId($dataONE['ID']);
				 $produit->setNom($dataONE['name']);
				 $produit->setDescription($dataONE['content']);
				 $produit->setPrix($dataONE['price']);
				 $produit->setDefense($dataONE['defense']);
				 $produit->SetElement($dataONE['element']);
				 $produitAll[] = $produit;}
				}

		return $produitAll;

	}
	public function supprimer($id){
		$request = "DELETE FROM product WHERE id = :id";
		$stmt = $this->produits->prepare($request);
		$stmt->execute([
			':id' => $id
		]);
	}

}


