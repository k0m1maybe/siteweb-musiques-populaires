<div class="mainpart">
    <div class="signinresult">
        <?php
        require('data/Database.php');
        $dbh = Database::connect();
        $sql0 = 'SELECT * FROM user WHERE login = ?';
        $sth = $dbh->prepare($sql0);
        $sth->execute(array($_POST['login']));
        if ($sth->rowCount() == 0) {
            $rle = htmlspecialchars($_POST['role']);
            if ($_POST['role'] != "visitor") {
                $rle = "polytechnicien";
            }
            $sql1 = 'INSERT INTO `user` (`last_name`, `first_name`, `login`, `password`, `role`) VALUES("' . $_POST['ln'] . '","' . $_POST['fn'] . '","' . $_POST['login'] . '","' . $_POST['password'] . '","' . $rle . '")';
            $dbh->query($sql1);
            if ($_POST['role'] != "visitor") {
                $sql2 = 'INSERT INTO `student` (`last_name`, `first_name`, `login`, `promo`) VALUES("' . $_POST['ln'] . '","' . $_POST['fn'] . '","' . $_POST['login'] . '",' . (int)$_POST['role'] . ')';
                $dbh->query($sql2);
            }
            echo '<h1>Vous vous êtes bien inscris!<br>Veuillez revenir en <a class="normal" href="index.php">Accueil</a> pour vous connecter!</h1>';
        } else {
            echo '<h1>Ce login était déjà inscrit! Veuillez chosir un autre login svp!<br>Revenir en <a href = index.php>Accueil</a>.</h1>';
        }
        ?>
    </div>
</div>