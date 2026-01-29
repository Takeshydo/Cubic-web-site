<?php

spl_autoload_register(function ($class){
    $file = str_replace('\\', '/', $class) . '.php';
    if(file_exists($file)) require $file;
});

require_once '../src/connection/login.php';
require_once '../src/connection/registrer.php';
require_once '../src/connection/user.php';

try {
    $db = new \PDO('mysql:host=localhost;dbname=utilisateurs;charset=utf8', 'root', '');
} catch (\Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//code connection
if(!empty($_POST['Lemail']) && $_POST['Lpassword']) {
    $login = new \src\connection\login($db);
    $login->connection($_POST['Lemail'], $_POST['Lpassword']);
}

//code d'enregistrement
if(!empty($_POST['Rpseudo']) && !empty($_POST['Remail']) && !empty($_POST['Rpassword'])) {
    $registrer = new registrer($db);

    $NewUser = new user();
    $NewUser->setPseudo($_POST['Rpseudo']);
    $NewUser->setMail($_POST['Remail']);
    $NewUser->setPassword($_POST['Rpassword']);
    $NewUser->setRole("USER");

    $registrer->registrer($NewUser);
}

?>
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