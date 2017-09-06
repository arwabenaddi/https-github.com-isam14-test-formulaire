<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
<title>Formulaire_utilisateur</title>
</head>
<body>

<div class="container">
<p>
<form action="formulaire_uti.php" method="get">
<label for="prenom">Prénom</label>
<input type="text" name="prenom"  placeholder="Prenom">

<label for="nom">Nom</label>
<input type="text" name="nom" placeholder="Nom">
<label for="age">Age</label>
<input type="text" name="age" placeholder="age">
<input type="submit" value="Rechercher">
</form>

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

$prenom = "";
$nom = "";
$age="";
//isset= Is Set = "si la variable a été 'rempli'"
if(!isset($_GET['prenom']) || !isset($_GET['nom'])) {
    echo 'formulaire non soumis';
} else {
    $prenom = $_GET['prenom'];
    $nom = $_GET['nom'];
    $age=$_GET['age'];
    
    
    if  (($_GET['prenom'] == '' && $_GET['nom'] == '')) {
        echo 'formulaire soumis avec champ vide ou erreur';
    }else {
        echo "formulaire soumis avec valeurs valides prenom et nom : ".htmlspecialchars($_GET['prenom'] && $_GET['nom']);
    }
}
//methode qui fonctionne mais que l'on remplace par 'sprintf' ---ligne du dessous $sql1
// $req = $bdd->query("select * from uti_utilisateur where uti_prenom like '%$prenom%' and uti_nom like '%$nom%'");


//le LIKE avec %% va chercher ds le input la lettre que l'on saisi, dans toute la table
$sql=sprintf("select * from uti_utilisateur where uti_prenom like '%%%s%%' and uti_nom like '%%%s%%' and (uti_age = %d  or %d = 0)" ,$prenom, $nom, $age, $age);

// $sql=sprintf("select * from uti_utilisateur where uti_nom = '%s' and uti_age = %d", $nom, $age);

// $result = $bdd->query($sql);
$result = $bdd->query($sql);

?>

</p>
</div>


<div class="container">
<table class="table table-{1:striped|sm|bordered|hover|bg-fade} table-bg-fade">
<thead class="thead-bg-fade|thead-default">
<tr>
<th>ID UTILISATEUR</th>
<th>NOM</th>
<th>PRENOM</th>
<th>AGE</th>
</tr>
</thead>
<tbody>

<?php


while ($donnees = $result->fetch())

{
    ?>
    <tr>
    <td><?= $donnees['uti_oid'];?></td>
    <td><?= $donnees['uti_nom']; ?></td>
    <td><?= $donnees['uti_prenom']; ?></td>
    <td><?= $donnees['uti_age']; ?></td>
    
    </tr>
    <?php
}

$result->closeCursor();



?>
</tbody>
</table>


<?php

// exemple de sprintf:
// $num = 5;
// $location = 'bananier';

// $format = 'Il y a %d singes dans le %s';
// echo sprintf($format, $num, $location);
?>



</div>
</p>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>