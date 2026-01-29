<?php

namespace src\grade;

use src\Grade\Grade;

class Peon extends Grade {

	protected $grade = "peon";

	protected $nom = "peon";

	protected $description = "Tu deviens un péon, c'est mieux que rien !";

	protected $prix = 1000;

	protected $image; //image a ajouter;
}


?>