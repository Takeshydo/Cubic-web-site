<?php

namespace src\produit;

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
			$produit = new Produit();
			$produit->setId($dataONE['ID']);
			$produit->setNom($dataONE['name']);
			$produit->setDescription($dataONE['content']);
			$produit->setPrix($dataONE['price']);
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


