<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulaire1</title>
</head>
<body>
<p>
<?php
// isset= Is Set = "si la variable a été 'rempli'"
if(!isset ($_POST['nom'])) {
echo 'formulaire non soumis';
} else {
    if  (($_POST['nom'] == '')) {
echo 'formulaire soumis avec champ vide ou erreur';
}else {
    echo "formulaire soumis avec valeurs valides prenom : ".htmlspecialchars($_POST['nom']);
    // echo "<br>";
    $sql = "select * from ann_annonce where ann_titre like '%nom%'";

}
}
?>

</p>



    <form action="formulaire1.php" method="post">
    <input type="text" name="nom" placeholder="nom">
    <input type="submit" value="valider">
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




?>
</body>
</html>