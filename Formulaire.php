<?php ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Chat</title>
    <style>
        form {
            text-align: center;
        }
    </style>
</head>

<body>

    <form method="POST" action="Formulaire_Post.php">
        <p>
            <label for="pseudo">Pseudo</label>
            <input type="text" name="pseudo" id="pseudo">
            <br/>
            <label for="message">Message</label>
            <input type="text" name="message" id="message" />
            <br/>
            <input type="submit" value="Envoyer">
        </p>
    </form>


<?php

try{
    $db = new PDO('mysql:host=localost;dbname=chat;charset=utf8','root','hlol');
    
}
catch(Exception $e){
    die('Erreur : '.$e->getMessage());

}

//récuperer les 10 dernier messages
$response = $db->query('SELECT pseudo , message FROM chat ORDER BY id DESC LIMIT 0, 10');

//Afficher chaque message les données sont protégées par htmlspecialchars

while($donnees = $response->fetch()){

    echo '<p><strong>' . htmlspecialchars($donnees['pseudo']).'</strong> : ' . htmlspecialchars($donnees['message']) . '</p>';


}

$response->closeCursor();

?>
</body>

</html>