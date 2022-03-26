<div class="mainpart">
    <div class="uploadbox">
        <?php
        if (isset($_POST["upload"])) {
            $album = htmlspecialchars($_POST["album"]);
            $author = htmlspecialchars($_POST["author"]);
            $rd = htmlspecialchars($_POST["rd"]);
            $lng = htmlspecialchars($_POST["lng"]);

            require('data/Database.php');
            $dbh = Database::connect();
            $sql0 = 'SELECT * FROM album WHERE name = ? AND author = ?';
            $sth = $dbh->prepare($sql0);
            $sth->execute(array($album, $author));
            if ($sth->rowCount() == 0) {
                $sql1 = 'INSERT INTO `album` (`name`, `author`, `release_date`, `main_language`) VALUES("' . $album . '","' . $author . '","' . $rd . '","' . $lng . '")';
                $dbh->query($sql1);
            }
            $sql2 = 'SELECT `id` FROM album WHERE name = ? AND author = ?';
            $sth = $dbh->prepare($sql2);
            $sth->execute(array($album, $author));
            $rep = $sth->fetch();
            $id = $rep['id'];
            $sql3 = 'INSERT INTO `chronique` (`id_of_album`, `login_of_author`) VALUES("' . $id . '","' . $_SESSION['login'] . '")';
            $dbh->query($sql3);
            move_uploaded_file($_FILES["file"]["tmp_name"], "chronique/" . $_SESSION['first_name'] . "_" . $_SESSION['last_name'] . "_" . $album . ".pdf");
        }

        echo '<h1>Vous avez bien uploadé votre chronique! Revenir en <a href="index.php?page=myspace">Mon Espace</a></h1>';
        ?>

    </div>

</div>


move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);