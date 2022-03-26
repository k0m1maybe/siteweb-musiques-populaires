<div class="mainpart">
  <div class="biblio">
    <h1>Bienvenue à la bibliothèque!</h1>
    <h3>Vous trouvez ici le <a href="poly/poly.pdf">poly</a> du cours de la musique populaire ainsi que tous les chorniques au dessous.</h3>
    <div class="searchbox">
      <b>Vous cherchez les chroniques de quel genre d'album?</b>
      <br><br>
      <form method="post" action="index.php?page=library">
        <table class="none">
          <tr>
            <td>
              Sa date de sortie:
            </td>
            <td>du <input type="date" name="startdate" /> au <input type="date" name="enddate" /></td>
          </tr>
          <tr>
            <td>
              Sa langue principale:
            </td>
            <td>
              <table class="none">
                <tr>
                  <td><input type="checkbox" name="French"> français</input></td>
                  <td><input type="checkbox" name="English"> anglais</input></td>
                  <td><input type="checkbox" name="Chinese"> chinois</input></td>
                  <td><input type="checkbox" name="German"> allemand</input></td>
                </tr>
                <tr>
                  <td><input type="checkbox" name="Japanese"> japonais</input></td>
                  <td><input type="checkbox" name="Korean"> coréen</input></td>
                  <td><input type="checkbox" name="Spanish"> espangnol</input></td>
                  <td><input type="checkbox" name="Others"> Autres</input></td>

                </tr>
              </table>
            </td>
          </tr>
          <tr>
            <td>
              Ou plus spécifiquement:
            </td>
            <td><input type="text" name="album" placeholder="nom de l'album" /> ou <input type="text" name="author" placeholder="nom de l'auteur" /></td>
          </tr>
        </table>
        <input class="signupbuttom" type="submit" name="find" value="Chercher" />
      </form>
    </div>
    <br><br>
    <?php
    if (isset($_POST["find"])) {
      require('data/Database.php');
      $dbh = Database::connect();

      $startd = "";
      if ($_POST['startdate'] != "") {
        $startd = " AND release_date >'" . $_POST['startdate'] . "'";
      }
      $endd = "";
      if ($_POST['enddate'] != "") {
        $endd = " AND release_date <'" . $_POST['enddate'] . "'";
      }
      $langs = array("French", "English", "Chinese", "German", "Japanese", "Korean", "Spanish", "Others");
      $on = "";
      $langnum = 0;
      foreach ($langs as $lang) {
        if (isset($_POST[$lang])) {
          if ($langnum == 0) {
            $on = "main_language = '" . $lang . "'";
          } else {
            $on = $on . " OR main_language = '" . $lang . "'";
          }
          $langnum++;
        }
      }
      if ($langnum != 0) {
        $on = " AND (" . $on . ")";
      }
      $ab = "";
      if ($_POST['album'] != "") {
        $ab = " AND name ='" . $_POST['album'] . "'";
      }

      $at = "";
      if ($_POST['author'] != "") {
        $at = " AND author ='" . $_POST['author'] . "'";
      }

      $sql0 = "SELECT name, author, release_date, main_language, last_name, first_name
        FROM chronique,album,student
        WHERE id=id_of_album AND login_of_author=login" . $startd . $endd . $on . $ab . $at;
      $sth = $dbh->prepare($sql0);
      $sth->execute();
      $number = $sth->rowCount();
      if ($number != 0) {
        echo "<table>
            <tr>
                <th>Nom de l'album</th>
                <th>Auteur de l'album</th>
                <th>Date de Sortie</th>
                <th>Language</th>
                <th>Auteur de ce chronique</th>
            </tr>";
        for ($i = 0; $i < $number; $i++) {
          $rep = $sth->fetch();
          echo '<tr>
                <td><a href="chronique/' . $rep["first_name"] . '_' . $rep['last_name'] . '_' . $rep['name'] . '.pdf">' . $rep['name'] . '</a></td>
                <td>' . $rep['author'] . '</td>
                <td>' . $rep['release_date'] . '</td>
                <td>' . $rep['main_language'] . '</td>
                <td>' . $rep['last_name'] . ' ' . $rep['first_name'] . '</td>';
        }
        echo "</table>";
      } else {
        echo "<h3>Personne a uploadé ce gerne d'album.</h3>";
      }
    }

    ?>
  </div>
</div>