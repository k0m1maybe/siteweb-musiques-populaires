<div class="mainpart">
    <div class="signinresult">
        <?php
        require('data/Database.php');
        $dbh = Database::connect();
        $sql0 = 'SELECT * FROM user WHERE login = ? AND password = ?';
        $sth = $dbh->prepare($sql0);
        $sth->execute(array($_POST['login'], $_POST['password']));
        if ($sth->rowCount() != 0) {
            $rep = $sth->fetch();
            $_SESSION['login'] = htmlspecialchars($rep['login']);
            $_SESSION['first_name'] = htmlspecialchars($rep['first_name']);
            $_SESSION['last_name'] = htmlspecialchars($rep['last_name']);
            $_SESSION['role'] = htmlspecialchars($rep['role']);
            echo "<h1>Bienvenue " . $_SESSION['first_name'] . ", vous vous êtes bien connecté!<h1>";
        } else {
            echo "<h1>Votre login ou votre mot de passe n'est pas valable.<br>Veuillez vérifier que vos informations soient correctes ou vous inscrire ";
            echo "<a class='normal' href='index.php?page=sign_up'>ici</a>.<h1>";
        }
        ?>
    </div>
</div>