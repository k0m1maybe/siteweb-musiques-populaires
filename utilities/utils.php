<?php

$page_list = array(
    array(
        "name" => "home",
        "title" => "Accueil"
    ),
    array(
        "name" => "library",
        "title" => "Bibliothèque"
    ),
    array(
        "name" => "myspace",
        "title" => "Mon Espace"
    ),
    array(
        "name" => "error",
        "title" => "Erreur"
    ),
    array(
        "name" => "sign_in",
        "title" => "Se Connecter"
    ),
    array(
        "name" => "sign_up",
        "title" => "S'inscrire"
    ),
    array(
        "name" => "sign_up_info",
        "title" => "Résultat de l'inscription"
    ),
    array(
        "name" => "sign_in_info",
        "title" => "Résultat de la connection"
    ),
    array(
        "name" => "upload",
        "title" => "Soumettre votre chornique"
    ),
    array(
        "name" => "upload_info",
        "title" => "Résultat de upload"
    )
);

function checkPage($askedPage, $page_list)
{
    foreach ($page_list as $page) {
        if ($page["name"] == $askedPage) {
            return $askedPage;
        }
    }
    return "error";
}

function getPageTitle($askedPage, $page_list)
{
    foreach ($page_list as $page) {
        if ($page["name"] == $askedPage) {
            return $page["title"];
        }
    }
    return "Error";
}

function generatorHTMLHeader($title)
{
    echo <<<FIN

    <!DOCTYPE html>
    <html lang="en">
    
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="css\style.css">
      <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">
      <script type="text/javascript" src="js/jquery-3.6.0.min.js"></script>
      <script src="js/x.js"></script>
      <title>$title</title>
    </head>
    
    <body>
    FIN;
}

function generatorHTMLFooter()
{
    echo <<<FIN
    </body>

    </html>
    FIN;
}
