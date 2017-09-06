
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<title>Ajout_Utilisateur.php</title>
</head>
<body>
<div class="container">
<h1>Ajout d'un utilisateur</h1>
<?php
if (isset($_POST['valider'])){
    // echo "<p>".var_dump($_POST)."</p>";
}
?>
<div class="container">
<p>

<form action="ajout_utilisateur.php" method="post">
<input type="prenom" placeholder="prenom" name"prenom">
<input type="nom" placeholder="nom" name="nom">
<input type="age" placeholder="age" name="age">
<input type="pseudo" placeholder="pseudo" name="pseudo">
<input type="email" placeholder="email" name="email" id="email" pattern="^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]{2,}\.[a-z]{2,4}$" required>

<input type="password" placeholder="password" name="password" id="password" size="20" pattern=".{8,}"   required title="8 caracteres minimum">
<label for="password2">Ressaisir votre mot de passe:</label>		
<input type="password" placeholder="confirm password" name="password2" id="password2" size="20" pattern=".{8,}"   required title="8 caracteres minimum">
<input type="submit" name='valider' value="Envoyer">
</form>
</p>
</div>

<?php
try
{
    //on se connecte à MySQL
    $bdd = new PDO('mysql:host=localhost;dbname=annonces_immo;charset=utf8', 'root', 'admin');
    // var_dump($bdd);
}
catch (Exception $e)
{
    // En cas d'erreur, on affiche un message et on arrête tout
    die('Erreur : ' . $e->getMessage());
}
// Si tout va bien, on peut continuer

$prenom="";
$nom="";
$age="";
$pseudo="";
$password="";
$password2="";
$email="";

if (!isset ($_POST['prenom']) || !isset ($_POST['nom']) || !isset ($_POST['age']) || !isset($_POST['pseudo']) || !isset ($_POST['email'])) {
    // echo "Saisir tous les champs";
    // var_dump($_POST);
}else{
    $prenom=$_POST['prenom'];
    $nom=$_POST['nom'];
    $age=$_POST['age'];
    $pseudo=$_POST['pseudo'];
    $password=$_POST['password'];
    $password2=$_POST['password2'];
    $email=$_POST['email'];
    
}

// $longueur = strlen($password);
// $longueur1 = strlen($password2);


// if ($longueur < 8 && $longueur1 < 8) {
    
    //     echo "Mot de passe trop court !";
    
    // }
    
    if ($_POST['password'] ==  $_POST['password2']) {
        echo "le mot de passe est valide";
    }else{
        echo "Veuillez ressaisir votre mot de passe";
    }
    
    $sql=sprintf("insert into uti_utilisateur (uti_oid, uti_prenom, uti_nom, uti_age, uti_pseudo, uti_password, uti_email)  values ('','%s', '%s', %d, '%s', %s, '%s')",  $prenom, $nom, $age, $pseudo, $password, $email );
    
    $result=$bdd->query($sql);
    // var_dump($_POST);
    
    ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
    
    </body>
    </html>