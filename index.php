<?php

// La zone des sessions
session_start();

// La zone où mettre tous les require
require("utilities\utils.php");

// Les test 
if (array_key_exists('page', $_GET)) {
  $askedPage = $_GET['page'];
} else {
  $askedPage = "home";
}
$authorized = checkpage($askedPage, $page_list);

//header
generatorHTMLHeader(getPageTitle($askedPage, $page_list));

if (array_key_exists('logout', $_POST)) {
  session_unset();
  session_destroy();
}
?>

<!--Partie HTML-->
<div class="header">
  <h1>MUSIQUES ACTUELLES</h1>

  <ul class="nav">
    <li><a class="nava" href="index.php?page=home">Accueil</a></li>

    <?php
    if (array_key_exists('first_name', $_SESSION)) {
      echo '<li><a class="nava" href="index.php?page=library">Bibliothèque</a></li>';
      if ($_SESSION['role'] != "visitor") {
        echo '<li><a class="nava" href="index.php?page=myspace">Mon Espace</a></li>';
      }
      echo '<li></li>';
      echo '<li>Bonjour, ' . $_SESSION['first_name'] . '</li>';
      echo '<li><form method="post" action="index.php?page=home"><input class="logoutbutton" type="submit" name="logout" value="Se Deconnecter" /></form></li>';
    }
    ?>
  </ul>
</div>

<div class="mainpart" id="content">
  <?php require("content\\$authorized.php")
  ?>
</div>

<!--Get page-->
<div class="footer">
  <p>&copy; 2022 Jyh-Chwen KO, X2020</p>
</div>

<!--footer-->
<?php
generatorHTMLFooter()
?>