<div class="mainpart">
  <div class="homepage">
    <h1>Bienvenue sur le site du seminaire "Musiques Actuelles"</h1>
    <p>
      Ce cours est enseigné par Madame Solveig SERRE à l'École Polytechnique.<br><br>
      Vous trouvez ici le polycopié du cours ainsi que les chorniques d'album faites par les étudiants.
    </p>
    <?php
    if (!array_key_exists('login', $_SESSION)) {
      echo '<a href="index.php?page=sign_up" class="button">Inscrivez-vous maintenant</a>';
      echo '<a href="index.php?page=sign_in" class="button">Vous avez déjà un compte?</a>';
    }
    ?>

  </div>
</div>