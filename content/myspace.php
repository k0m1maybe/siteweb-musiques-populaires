<div class="mainpart">
    <div class="myspace">
        <?php
        echo '<h1>Bonjour, ' . $_SESSION['first_name'] . '.</h1>';
        if ($_SESSION['role'] != "admin") { //cas polytechnicien
            require('data/Database.php');
            $dbh = Database::connect();
            $sql0 = 'SELECT name, author, score, comment FROM chronique,album WHERE album.id=chronique.id_of_album AND login_of_author="' . $_SESSION['login'] . '"';
            $sth = $dbh->prepare($sql0);
            $sth->execute();
            $number = $sth->rowCount();
            if ($number != 0) {
                echo '<h3>Voici le(s) ' . $number . ' chornique(s) que vous avez uploadé.</h3>';
                echo "<table>
                <tr>
                    <th>Nom de l'album</th>
                    <th>Auteur de l'album</th>
                    <th>Note</th>
                    <th>Commentaire</th>
                </tr>";
                for ($i = 0; $i < $number; $i++) {
                    $rep = $sth->fetch();
                    echo '<tr>
                    <td><a href="chronique/' . $_SESSION["first_name"] . '_' . $_SESSION['last_name'] . '_' . $rep['name'] . '.pdf">' . $rep['name'] . '</a></td>
                    <td>' . $rep['author'] . '</td>
                    <td>' . $rep['score'] . '</td>
                    <td>' . $rep['comment'] . '</td>';
                }
                echo "</table>";
            } else {
                echo '<h3>Vous avez jamais uploadé de chronique.</h3>';
            }
            echo '<br><br><h3>Vous voulez uploader un nouveau chronique? Cliquez <a href="index.php?page=upload">ici</a>.</h3>';
        } else { //cas admin
            require('data/Database.php');
            $dbh = Database::connect();

            $sql0 = "SELECT name, author, last_name, first_name
        FROM chronique,album,student
        WHERE id=id_of_album AND login_of_author=login AND score IS NULL";
            $sth = $dbh->prepare($sql0);
            $sth->execute();
            $number = $sth->rowCount();
            if ($number != 0) {
                echo '<h3>Voici le(s) ' . $number . ' chornique(s) que vous avez pas encore noté.</h3>';
                echo "<table>
            <tr>
                <th>Nom de l'album</th>
                <th>Auteur de l'album</th>
                <th>Auteur de ce chronique</th>
            </tr>";
                for ($i = 0; $i < $number; $i++) {
                    $rep = $sth->fetch();
                    echo '<tr>
                <td><a href="chronique/' . $rep["first_name"] . '_' . $rep['last_name'] . '_' . $rep['name'] . '.pdf">' . $rep['name'] . '</a></td>
                <td>' . $rep['author'] . '</td>
                <td>' . $rep['last_name'] . ' ' . $rep['first_name'] . '</td>';
                }
                echo "</table>";
            } else {
                echo "<h3>Vous avez noté tous les chroniques!.</h3>";
            }

            echo <<<FIN
            <h3><br>Vous voulez donner une note et un commentaire à un chronique? Veuillez entrer:</h3>
            <form method="post" action="index.php?page=myspace">
            <ul>
                <li><input class="x" type="text" name="album" placeholder=" Nom de l'album" />
                    <input class="x" type="text" name="pn" placeholder=" Prènom de l'étudiant(e)" />
                    <input class="x" type="text" name="n" placeholder=" Nom de l'étudiant(e)" />
                    <input class="y" type="int" name="score" placeholder=" Note" />
                </li>
                <li> <textarea name="commentaire" placeholder="Commentiare"></textarea> </li>
            </ul>
            <input class="signupbuttom" type="submit" name="noter" value="Envoyer" />
            </form>
            FIN;
        }
        ?>

    </div>
</div>