<?php

namespace src\Produit;

class ProduitManager {

	private $produits;

	public function __construct(\PDO $produits){

		$this->produits = $produits;

	}

	public function add(Produit $produit){
		$request = "INSERT INTO product (nom, content, prix) VALUES (:nom, :content, :prix)";
		$stmt = $this->produits->prepare($request);
		$stmt->execute([
			':nom' => $produit->getNom(),
			':content' => $produit->getDescription(),
			':prix' => $produit->getPrix()
		]);
	}
	public function getAll(){
		$produitAll = [];
		$request = "SELECT * FROM product ORDER BY id DESC";
		$stmt = $this->produits->query($request);

		//tableau associatif
		$data_all = $stmt->fetchAll(\PDO::FETCH_ASSOC);

		//boucle pour chaque tache
		foreach ($data_all as $dataONE){
			$produit = new Produit();
			$produit->setId($dataONE['id']);
			$produit->setNom($dataONE['nom']);
			$produit->setDescription($dataONE['content']);
			$produit->setPrix($dataONE['prix']);
			$produitAll[] = $produit;
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








?>
