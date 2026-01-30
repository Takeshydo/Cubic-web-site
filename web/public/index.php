<?php

use web\src\connection\login;
use web\src\connection\registrer;
use web\src\produit\produitmanager;
use web\src\utilisateurs\User;


spl_autoload_register(function ($class) {
    $baseDir = dirname(__DIR__) . 'index.php/';
    $path = str_replace('\\', '/', $class) . '.php';
    $file = $baseDir . $path;
    if (file_exists($file)) {
        require_once $file;
    } else {
        echo "Recherche échouée pour : " . $file;
    }
});
try {
    $db = new PDO('mysql:host=localhost;dbname=database;charset=utf8', 'root', '');
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$manager = new produitmanager($db);
$productAll =$manager->getAll();

//code connection
if(!empty($_POST['Lemail']) && $_POST['Lpassword']) {
    $login = new login($db);
    $login->connection($_POST['Lemail'], $_POST['Lpassword']);
}

//code d'enregistrement
if(!empty($_POST['Rpseudo']) && !empty($_POST['Remail']) && !empty($_POST['Rpassword'])) {
    $registrer = new registrer($db);
    $NewUser = new User();
    $NewUser->setPseudo($_POST['Rpseudo']);
    $NewUser->setMail($_POST['Remail']);
    $NewUser->setPassword($_POST['Rpassword']);
    $NewUser->setRole("ROLE_USER");
    $registrer->registrer($NewUser);
}

?>

<h1></h1>

<div id="LOGIN">
    <h2>LOGIN</h2>
    <form method="POST">
        <input type="email" name="Lemail" placeholder="Entrez votre adresse mail" required>
        <input type="password" name="Lpassword" placeholder="Entrez votre mot de passe">
        <button type="submit">Connection</button>
    </form>
</div>
<br>
<br>
<br>
<div id="REGISTRER">
    <h2>REGISTRER</h2>
    <form method="POST">
        <input type="text" name="Rpseudo" placeholder="Entrez votre Pseudo" required>
        <input type="email" name="Remail" placeholder="Entrez votre email" required>
        <input type="password" name="Rpassword" placeholder="Entrez votre mot de passe" required>
        <button type="submit">Enregistrement</button>
    </form>
</div>



<div>
    <h2> BOUTIQUE</h2>
        <?php foreach ($productAll as $product) { ?>
            <div><img src="<?= $product->getImage()?>" alt="Image du produit"/></div>
            <div><h4>Nom : </h4><p><?= htmlspecialchars($product->getNom()) ?> </p></div><br>
            <div>
                <?php if($product->getElement() === "arme") {?>
                        <h4>Damage : </h4><?= htmlspecialchars($product->getDamage()) ?>
                <?php } else {?>
                        <h4>Defense : </h4><?= htmlspecialchars($product->getDefense()) ?>
                <?php } ?>
            </div>
            <div><h4>Prix : </h4><p><?= htmlspecialchars($product->getPrix())?></p></div><br>
            <div><h4>Description : </h4><?=htmlspecialchars($product->getDescription()) ?></div><br>
            <br>
        <?php } ?>
</div>