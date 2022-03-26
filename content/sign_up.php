<div class="mainpart">
    <div class="signupandin">
        <h1>Veuillez mettre votre nom, prénom, login et mot de passe</h1>
        <form method="post" action="index.php?page=sign_up_info">
            <ul>
                <li><input type="text" name="ln" placeholder="nom" /></li>
                <li><input type="text" name="fn" placeholder="prénom" /></li>
                <li><input required type="text" name="login" placeholder="login" /></li>
                <li><input required type="password" name="password" placeholder="mot de passe" /></li>
                <li>Je suis un <select name="role">
                        <optgroup label="polytechnicien">
                            <?php
                            for ($i = 10; $i < 21; $i++) {
                                echo '<option value=' . $i . '>X' . (2000 + $i) . '</option>';
                            }
                            ?>
                        </optgroup>
                        <optgroup label="Visiteur">
                            <option value="visitor">visiteur</option>
                    </select>
                </li>
            </ul>
            <input class="signupbuttom" type="submit" value="S'inscrire" />
        </form>
    </div>
</div>